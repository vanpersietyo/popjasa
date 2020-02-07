<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_bankin extends CI_Model
{

	//Models
	const ID_TRANS = "ID_TRANS";
	const KD_BANK = "KD_BANK";
	const SLD_MASUK = "SLD_MASUK";
	const TGL_BUAT = "TGL_BUAT";
	const ID_OPR = "ID_OPR";
	const ST_DATA = "ST_DATA";
	const TGL_TRANS = "TGL_TRANS";
	const KETERANGAN = "KETERANGAN";
	const TABLE = "trans_bank_in";

//for inisialisasi.
	public $ID_TRANS;
	public $KD_BANK;
	public $SLD_MASUK;
	public $TGL_BUAT;
	public $ID_OPR;
	public $ST_DATA;
	public $TGL_TRANS;
	public $KETERANGAN;

	var $table = 'trans_bank_in';
	var $primary_key = 'ID_TRANS';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//DATA TABLE
	public function get_user()
	{
		$query = $this->db->query("
    select * from trans_bank_in
		");
		return $query->result();
	}

	function count_filtered()
	{
		$query = $this->db->query("
		select * from trans_bank_in
		");
		return $query->num_rows();
	}

	public function count_all()
	{
		$query = $this->db->query("
		select * from trans_bank_in
		");
		return $query->num_rows();
	}

//GENERATE ID
	function get_ID()
	{
		$tahun = date('Y');
		$bulan = date('m');
		$q = $this->db->query("select MAX(RIGHT(ID_TRANS,5)) as kd_max from trans_bank_in");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int)$k->kd_max) + 1;
				$kd = sprintf("%05s", $tmp);
			}
		} else {
			$kd = "00001";
		}
		return "TBI$tahun$bulan$kd";
	}


//ALL FUNCTION

	public function get_by_id($id)
	{
		$this->db->from('trans_bank_in');
		$this->db->where('ID_TRANS', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('trans_bank_in', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('trans_bank_in', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('ID_TRANS', $id);
		$this->db->delete('trans_bank_in');
	}

	function sum_pengeluaran()
	{
		$query = $this->db->query("
      SELECT SUM(SLD_KELUAR) AS TOTAL_KELUAR
      FROM trans_bank_out
      WHERE ST_DATA=1
    ");
		return $query->row();
	}

	function sum_pemasukan()
	{
		$query = $this->db->query("
      SELECT SUM(SLD_MASUK) AS TOTAL_MASUK
      FROM trans_bank_in
      WHERE ST_DATA=1
    ");
		return $query->row();
	}

	function sum_rek_biaya()
	{
		$query = $this->db->query("
    SELECT SUM(harga) AS TOT_REKBIAYA
    FROM trs_detail_rekening_biaya
    ");
		return $query->row();
	}




}
