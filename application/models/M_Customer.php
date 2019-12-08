<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Customer extends CI_Model {

	//Models
	const id_customer = "id_customer";
	const kd_cabang = "kd_cabang";
	const Agen = "Agen";
	const nm_customer = "nm_customer";
	const alamat = "alamat";
	const nm_perusahaan = "nm_perusahaan";
	const alamat_perusahaan = "alamat_perusahaan";
	const jns_usaha = "jns_usaha";
	const bidang_usaha = "bidang_usaha";
	const tlp_customer = "tlp_customer";
	const telp2_customer = "telp2_customer";
	const email_customer = "email_customer";
	const kota_customer = "kota_customer";
	const keterangan = "keterangan";
	const inputby = "inputby";
	const tgl_input = "tgl_input";
	const status = "status";
	const keterangan_deals = "keterangan_deals";
	const keterangan_lost = "keterangan_lost";
	const st_data = "st_data";
	const TABLE = "m_customer";

//for inisialisasi.
	public $id_customer;
	public $kd_cabang;
	public $Agen;
	public $nm_customer;
	public $alamat;
	public $nm_perusahaan;
	public $alamat_perusahaan;
	public $jns_usaha;
	public $bidang_usaha;
	public $tlp_customer;
	public $telp2_customer;
	public $email_customer;
	public $kota_customer;
	public $keterangan;
	public $inputby;
	public $tgl_input;
	public $status;
	public $keterangan_deals;
	public $keterangan_lost;
	public $st_data;

	var $table = 'm_customer';
	var $primary_key = 'id_customer';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$query=$this->db->query("
			select *
			from m_customer
			");
		return $query->result();
	}

	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_customer
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_customer');
		return $this->db->count_all_results();
	}

	public function get_user_contacted(){
		$query=$this->db->query("
			select *
			from m_customer where status=1
			");
		return $query->result();
	}

	function count_filtered_contacted(){
		$query=$this->db->query("
			select *
			from m_customer where status=1
			");
		return $query->num_rows();
	}

	public function count_all_contacted(){
		$query=$this->db->query("
			select *
			from m_customer where status=1
			");
		return $query->num_rows();
	}

	public function get_user_deals(){
		$query=$this->db->query("
			select *
			from m_customer where status=2
			");
		return $query->result();
	}

	function count_filtered_deals(){
		$query=$this->db->query("
			select *
			from m_customer where status=2
			");
		return $query->num_rows();
	}

	public function count_all_deals(){
		$query=$this->db->query("
			select *
			from m_customer where status=2
			");
		return $query->num_rows();
	}

	public function get_user_lost(){
		$query=$this->db->query("
			select *
			from m_customer where status=3
			");
		return $query->result();
	}

	function count_filtered_lost(){
		$query=$this->db->query("
			select *
			from m_customer where status=3
			");
		return $query->num_rows();
	}

	public function count_all_lost(){
		$query=$this->db->query("
			select *
			from m_customer where status=3
			");
		return $query->num_rows();
	}

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_customer,5)) as kd_max from m_customer");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "CUS-$tahun$bulan".$kd;
	}

	public function get_by_id($id)
	{
		$this->db->from('m_customer');
		$this->db->where('id_customer',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_customer', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_customer', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete('m_customer');
	}


	/**
	 * @param null|array|string $where
	 * @param array $order
	 * @return array|bool|M_Customer
	 */
	public function find_first($where = null, $order = [])
	{
		//cek order
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		//cek where
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
		$result = $data->num_rows();
		return empty($result) ? FALSE : $data->row();
	}

	/**
	 * @param null|array|string $where
	 * @param array $order
	 * @return array|bool|M_Customer
	 */
	public function find($where = null, $order = [])
	{
		//cek order
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		//cek where
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);

		$result = $data->num_rows();
		//return
		return empty($result) ? FALSE : $data->result();
	}

	/**
	 * @param null $where
	 * @param array $order
	 * @return int
	 */
	public function count($where = null)
	{
		//cek where
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
		//return
		return $data->num_rows();
	}

	/**
	 * @param null $column
	 * @param null $where
	 * @return int
	 */
	public function sum($column = null, $where = null)
	{
		//cek where
		$this->db->select_sum($column, 'total');
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
		//return
		return $data->row()->total ?: 0;
	}

	/**
	 * @param array $data
	 * @return array | M_Customer
	 */
	public function select($data = [])
	{
		if (empty($data)) {
			$data = $this->db->get($this->table);
		} else {
			if (isset($data['column'])) {
				$this->db->select($data['column']);
			}

			if (isset($data['group'])) {
				$this->db->group_by($data['group']);  // Produces: GROUP BY title, date
			}

			if (isset($data['join'])) {
				foreach ($data['join'] as $key => $value) {
					$this->db->join($key, $value);
				}
			}

			if (isset($data['order'])) {
				foreach ($data['order'] as $key => $value) {
					$this->db->order_by($key, $value);
				}
			}

			if (isset($data['limit'])) {
				$this->db->limit($data['limit']);
			}

			$data = isset($data['where']) ? $this->db->get_where($this->table . " a", $data['where']) : $this->db->get($this->table . " a");
		}
		return $data->result();
	}

	/**
	 * @param array $data
	 * @return array | M_Customer
	 */
	public function select_first($data = [])
	{
		if (empty($data)) {
			$data = $this->db->get($this->table);
		} else {
			if (isset($data['column'])) {
				$this->db->select($data['column']);
			}

			if (isset($data['order'])) {
				foreach ($data['order'] as $key => $value) {
					$this->db->order_by($key, $value);
				}
			}
			$this->db->limit(1);
			$data = $data['where'] ? $this->db->get_where($this->table, $data['where']) : $this->db->get($this->table);
		}
		return $data->row();
	}

}
