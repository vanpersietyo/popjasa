<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bankout extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//DATA TABLE
	public function get_user(){
		$query=$this->db->query("
    select * from trans_bank_out
		");
		return $query->result();
	}

	function count_filtered(){
		$query=$this->db->query("
		select * from trans_bank_out
		");
		return $query->num_rows();
	}

	public function count_all()
	{
		$query=$this->db->query("
		select * from trans_bank_out
		");
		return $query->num_rows();
	}

//GENERATE ID
	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(ID_TRANS,5)) as kd_max from trans_bank_out");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "TBO$tahun$bulan$kd";
	}


//ALL FUNCTION

	public function get_by_id($id)
	{
		$this->db->from('trans_bank_out');
		$this->db->where('ID_TRANS',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('trans_bank_out', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('trans_bank_out', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('ID_TRANS', $id);
		$this->db->delete('trans_bank_out');
	}

  function sum_pengeluaran(){
    $query=$this->db->query("
      SELECT SUM(SLD_KELUAR) AS TOTAL_KELUAR
      FROM trans_bank_out
      WHERE ST_DATA=1
    ");
    return $query->row();
  }

  function sum_rek_biaya(){
    $query=$this->db->query("
    SELECT SUM(JUM_BIAYA) AS TOT_REKBIAYA
    FROM trans_biaya_operasional_b
    WHERE ST_DATA=1
    ");
    return $query->row();
  }

  function sum_pembelian(){
    $query=$this->db->query("
    SELECT SUM(JUMLAH_PEMBAYARAN) AS TOT_PEMBELIAN
      FROM v_header_transaksi_pembelian
      WHERE STATUS_PEMBELIAN>1
    ");
    return $query->row();
  }

	function get_pengeluaran(){
		$query=$this->db->query("
			SELECT KD_TRANS,NM_SUPPLIER,TOTAL_PEMBELIAN,JUMLAH_PEMBAYARAN,TGL_TRANS,SISA_PEMBAYARAN
			FROM v_header_transaksi_pembelian
			WHERE ST_DATA=1
			ORDER BY DATE_CREATED
    ");
    return $query->result();
	}

	function get_SUM_pengeluaran(){
		$query=$this->db->query("
			SELECT SUM(JUMLAH_PEMBAYARAN) AS TOTAL_BAYAR_BELI
			FROM v_header_transaksi_pembelian
			WHERE ST_DATA=1
    ");
    return $query->row();
	}

	function get_SUMPERIOD_pengeluaran(){
		$tgl_awal=date('Y-m-01');
		$tgl_akhir=date('Y-m-31');
		$query=$this->db->query("
			SELECT SUM(JUMLAH_PEMBAYARAN) AS TOTAL_BAYAR_BELI
			FROM v_header_transaksi_pembelian
			WHERE ST_DATA=1
			AND STR_TO_DATE(TGL_TRANS,'%Y-%m-%d') >= DATE('$tgl_awal')
			AND STR_TO_DATE(TGL_TRANS,'%Y-%m-%d') <= DATE('$tgl_akhir')
    ");
    return $query->row();
	}

	function get_count_pengeluaran(){
		$query=$this->db->query("
			SELECT KD_TRANS,NM_SUPPLIER,TOTAL_PEMBELIAN,JUMLAH_PEMBAYARAN,TGL_TRANS
			FROM v_header_transaksi_pembelian
			WHERE ST_DATA=1
			ORDER BY DATE_CREATED
    ");
    return $query->num_rows();
	}


		function get_pengeluaran2(){
			$query=$this->db->query("
			SELECT A.*,B.NM_REKENING
			FROM trans_biaya_operasional_b A
			JOIN rekening_biaya B ON A.KD_REKENING=B.KD_REKENING
			AND A.ST_DATA=1
			");
			return $query->result();
		}

		function get_SUM_pengeluaran2(){
			$query=$this->db->query("
			SELECT SUM(JUM_BIAYA) AS TOTAL_OPS
			FROM trans_biaya_operasional_b A
			JOIN rekening_biaya B ON A.KD_REKENING=B.KD_REKENING
			AND A.ST_DATA=1
			");
			return $query->row();
		}

		function get_SUMPERIOD_pengeluaran2(){
			$tgl_awal=date('Y-m-01');
			$tgl_akhir=date('Y-m-31');
			$query=$this->db->query("
			SELECT SUM(JUM_BIAYA) AS TOTAL_OPS
			FROM trans_biaya_operasional_b A
			JOIN rekening_biaya B ON A.KD_REKENING=B.KD_REKENING
			AND A.ST_DATA=1
			AND STR_TO_DATE(A.TGL_BUAT,'%Y-%m-%d') >= DATE('$tgl_awal')
			AND STR_TO_DATE(A.TGL_BUAT,'%Y-%m-%d') <= DATE('$tgl_akhir')
			");
			return $query->row();
		}

		function get_count_pengeluaran2(){
			$query=$this->db->query("
			SELECT A.*,B.NM_REKENING
			FROM trans_biaya_operasional_b A
			JOIN rekening_biaya B ON A.KD_REKENING=B.KD_REKENING
			AND A.ST_DATA=1
			");
			return $query->num_rows();
		}

		function get_pemasukan(){
			$query=$this->db->query("
			SELECT B.KD_TRANS,B.NM_OUTLET,B.TOTAL_PENJUALAN,B.TOTAL_PEMBAYARAN,B.PIUTANG_PENJUALAN,A.NM_BANK,A.TGL_PEMBAYARAN
				FROM v_trans_pembayaran_penjualan A
				JOIN v_header_trans_penjualan B ON B.ID_TRANS=A.ID_TRANS_PENJUALAN
				ORDER BY NM_BANK
			");
			return $query->result();
		}

		function get_saldo(){
			$query=$this->db->query("
				SELECT SUM(B.TOTAL_PEMBAYARAN) AS SALDO,A.NM_BANK
				FROM v_trans_pembayaran_penjualan A
				JOIN v_header_trans_penjualan B ON B.ID_TRANS=A.ID_TRANS_PENJUALAN
				GROUP BY A.NM_BANK
			");
			return $query->result();
		}

		function get_count_saldo(){
			$query=$this->db->query("
				SELECT SUM(B.TOTAL_PEMBAYARAN) AS SALDO,A.NM_BANK
				FROM v_trans_pembayaran_penjualan A
				JOIN v_header_trans_penjualan B ON B.ID_TRANS=A.ID_TRANS_PENJUALAN
				GROUP BY A.NM_BANK
			");
			return $query->num_rows();
		}

		function sum_saldo(){
			$query=$this->db->query("
				SELECT SUM(B.TOTAL_PEMBAYARAN) AS SALDO,A.NM_BANK
				FROM v_trans_pembayaran_penjualan A
				JOIN v_header_trans_penjualan B ON B.ID_TRANS=A.ID_TRANS_PENJUALAN
			");
			return $query->row();
		}

		function sum_saldo_bi(){
			$query=$this->db->query("
				SELECT SUM(SLD_MASUK) AS SALDO
				FROM trans_bank_in
				WHERE ST_DATA=1
			");
			return $query->row();
		}

		function sum_saldo_bi_group(){
			$query=$this->db->query("
				SELECT SUM(A.SLD_MASUK) AS SALDO,B.NM_BANK
				FROM trans_bank_in A
				JOIN bank B ON A.KD_BANK=B.KD_BANK
				WHERE A.ST_DATA=1
				GROUP BY A.KD_BANK
			");
			return $query->result();
		}




}
