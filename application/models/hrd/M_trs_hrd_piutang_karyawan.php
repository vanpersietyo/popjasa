<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_trs_hrd_piutang_karyawan extends CI_Model
{
//Models
    const id_piut_krywn = "id_piut_krywn";
    const id_karyawan = "id_karyawan";
    const jumlah_piutang = "jumlah_piutang";
    const keterangan = "keterangan";
    const tgl_input = "tgl_input";
    const input_by = "input_by";
    const jumlah_bayar = "jumlah_bayar";
    const st_data = "st_data";
    const TABLE = "trs_hrd_piutang_karyawan";

//for inisialisasi.
    public $id_piut_krywn;
    public $id_karyawan;
    public $jumlah_piutang;
    public $keterangan;
    public $tgl_input;
    public $input_by;
    public $jumlah_bayar;
    public $st_data;

    var $table = 'trs_hrd_piutang_karyawan';
    var $primary_key = 'id_piut_krywn';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Insert, Update, Delete
	/**
	 * @param $data
	 * @return bool
	 */
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return !$this->find($data) ? FALSE : TRUE;
	}

	public function update($valueid,$data)
	{
		$this->db->where($this->primary_key,$valueid);
		$this->db->update($this->table,$data);
	}
	
	public function update_where($where, $data)
	{
		$this->db->update($this->table, $data, $where);
	}
	
	public function delete_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table);
	}

	/**
	 * @param $where
	 */
	public function delete_where($where = [])
	{
		$this->db->where($where);
		$this->db->delete($this->table);
	}

	//Selecting Data

	/**
	 * @param int $id
	 * @return bool|M_trs_hrd_pembayaran_karyawan
	 */
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key,$id);
		$query = $this->db->get();
		return $query->num_rows() == 0 ? FALSE : $query->row();
	}
	/**
	 * @param array $data
	 * @return CI_DB | M_trs_hrd_pembayaran_karyawan
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
				$i = 0;
				foreach ($data['join'] as $key => $value) {
					if (isset($data['type_join'])) {
						$type = $data['type_join'][$i];
						if($type){
							$this->db->join($key, $value,$type);
						}else{
							$this->db->join($key, $value);
						}
					}else{
						$this->db->join($key, $value);
					}
					$i = $i + 1;
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
	 * @return array | M_trs_hrd_pembayaran_karyawan
	 */
	public function select_first($data = []){
		if(empty($data)){
			$data = $this->db->get($this->table);
		}else{
			if(isset($data['column'])){
				$this->db->select($data['column']);
			}

			if(isset($data['order'])){
				foreach ($data['order'] as $key => $value) {
					$this->db->order_by($key,$value);
				}
			}
			$this->db->limit(1);
			$data = $data['where'] ? $this->db->get_where($this->table, $data['where']) : $this->db->get($this->table);
		}
		return $data->row();
	}

	/**
	 * @param null|array|string $where
	 * @param array $order
	 * @return array|bool|M_trs_hrd_pembayaran_karyawan
	 */
	public function find_first($where = null, $order = []){
		//cek order
		if($order){
			foreach ($order as $key => $value) {
				$this->db->order_by($key,$value);
			}
		}
		//cek where
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
		return $data->row();
	}

	/**
	 * @param null|array|string $where
	 * @param array $order
	 * @return array|bool|M_trs_hrd_pembayaran_karyawan
	 */
	public function find($where = null, $order = [],$limit = null){
		//cek order
		if($order){
			foreach ($order as $key => $value) {
				$this->db->order_by($key,$value);
			}
		}

		if(!empty($limit)){
			$this->db->limit($limit);
		}

		//cek where
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
		return $data->result();
	}

	/**
	 * @param null $where
	 * @param array $order
	 * @return int
	 */
	public function count($where = null){
		//cek where
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
		//return
		return $data->num_rows();
	}

	/**
	 * @param null 	$column
	 * @param null 	$where
	 * @return int
	 */
	public function sum($column = null,$where = null){
		//cek where
		$this->db->select_sum($column,'total');
		$data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
		//return
		return $data->row()->total;
	}

	public function get_comment($column,$type = NULL){
		$database 	= $this->db->database;
		$result 	= $this->db->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = '{$database}' and TABLE_NAME = '{$this->table}' and COLUMN_NAME = '{$column}' ");
		if($result->num_rows() == 0){
			return '';
		}
		$comment 	= $result->row()->COLUMN_COMMENT;
		$pos 		= strpos($comment,'|');
		if(!empty($pos)){
			list($comment1,$comment2) = explode('|',$comment);
			if($type==null){
				return ucwords($comment1);
			}
			if($comment2){
				return ucwords($comment2);
			}
			return ucwords($comment);
		}
		return ucwords($comment);
	}

	//custom function
	//custom function

	/**
	 * @return string
	 */
	function generate_kode_trans($tanggal = null){
		$kd_cnfg = $this->conversion->getConfigByName('KODE RETUR PEMBELIAN');
		$tanggal = empty($tanggal) ? date('Ymd') : Conversion::convert_date($tanggal,'Ymd');
		$kode 	= $kd_cnfg ? $kd_cnfg.$tanggal : "RB".$tanggal;
		$query	= "select MAX(RIGHT(kd_trans,4)) as kd_max from {$this->table} where kd_trans like '{$kode}%' ";
		$q      = $this->db->query($query);
		$kd     = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%04s",$tmp);
			}
		}else{
			$kd = "00001";
		}
		return $kode.$kd;
	}

}
