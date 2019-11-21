<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_payment extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user($id){
		// $query=$this->db->query("
    //   SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input
    //   FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
    //   WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan AND a.id_customer='$id'
		// 	");

			$query=$this->db->query("
				SELECT *
				FROM v_paybycustomers
				");
		return $query->result();
	}

	public function get_customer(){
		$query=$this->db->query("
			SELECT *
			FROM v_paybycustomers
			");
		return $query->result();
	}

	function get_project($id){
		$query=$this->db->query("
			SELECT * FROM v_paybyproject where id_customer='$id'
		");
		return $query->result();
	}

	public function get_totalbayar($id){
		$query=$this->db->query("
      select sum(jumlah_pay) as total_bayar from trs_pembayaran where id_project='$id'
			");
		return $query->row();
	}

  public function get_harga($id){
		$query=$this->db->query("
        select harga_jual
        from trs_project
        where id_project='$id'
			");
		return $query->row();
	}

  function get_produk(){
    $query=$this->db->query("
      SELECT *
      FROM m_layanan
			");
		return $query->result();
  }

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_pay,5)) as kd_max from trs_pembayaran");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "PAY$tahun$bulan".$kd;
	}


	function count_filtered()
	{
    $query=$this->db->query("
      SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input
      FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
      WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan AND a.id_customer='$id'
      ");
		return $query->num_rows();
	}

	public function count_all()
	{
    $query=$this->db->query("
      SELECT a.id_project,a.id_layanan,c.nama_layanan,d.harga,a.id_customer,b.nm_customer,a.harga_jual,a.keterangan,a.input_by,a.tgl_input
      FROM trs_project a,m_customer b, m_layanan c, m_harga_layanan d
      WHERE a.id_customer=b.id_customer AND a.id_layanan=c.id_layanan AND a.id_layanan=d.id_layanan AND a.id_customer='$id'
      ");
		return $query->num_rows();
	}

	public function get_by_id($id)
	{
		$this->db->from('trs_project');
		$this->db->where('id_project',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('trs_pembayaran', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('trs_project', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_project', $id);
		$this->db->delete('trs_project');
	}


}
