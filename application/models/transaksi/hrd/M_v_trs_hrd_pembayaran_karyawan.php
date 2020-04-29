<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_v_trs_hrd_pembayaran_karyawan extends CI_Model
{
//Models
    const id_pmbyrn_krywn = "id_pmbyrn_krywn";
    const id_karyawan = "id_karyawan";
    const jumlah_bayar = "jumlah_bayar";
    const kd_bank = "kd_bank";
    const keterangan = "keterangan";
    const tgl_input = "tgl_input";
    const input_by = "input_by";
    const st_data = "st_data";
    const nama_karyawan = "nama_karyawan";
    const status_karyawan = "status_karyawan";
    const jns_kelamin = "jns_kelamin";
    const keterangan_karyawan = "keterangan_karyawan";
    const st_data_karyawan = "st_data_karyawan";
    const kd_cabang = "kd_cabang";
    const nm_cabang = "nm_cabang";
    const id_jabatan = "id_jabatan";
    const nama_jabatan = "nama_jabatan";
    const TABLE = "v_trs_hrd_pembayaran_karyawan";

//for inisialisasi.
    public $id_pmbyrn_krywn;
    public $id_karyawan;
    public $jumlah_bayar;
    public $kd_bank;
    public $keterangan;
    public $tgl_input;
    public $input_by;
    public $st_data;
    public $nama_karyawan;
    public $status_karyawan;
    public $jns_kelamin;
    public $keterangan_karyawan;
    public $st_data_karyawan;
    public $kd_cabang;
    public $nm_cabang;
    public $id_jabatan;
    public $nama_jabatan;

    var $table = 'v_trs_hrd_pembayaran_karyawan';
    var $primary_key = 'id_pmbyrn_krywn';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * @param int $id
	 * @return bool|M_v_trs_hrd_pembayaran_karyawan
	 */
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key, $id);
		$query = $this->db->get();
		return $query->num_rows() == 0 ? FALSE : $query->row();
	}

	/**
	 * @param null|array|string $where
	 * @param array $order
	 * @return array|bool|M_v_trs_hrd_pembayaran_karyawan
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
	 * @return array|bool|M_v_trs_hrd_pembayaran_karyawan
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
	 * @return array | M_v_trs_hrd_pembayaran_karyawan
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
	 * @return array | M_v_trs_hrd_pembayaran_karyawan
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
