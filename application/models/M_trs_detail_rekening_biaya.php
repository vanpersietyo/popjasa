<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_trs_detail_rekening_biaya extends CI_Model
{//Models
    const id_dtlrekbiaya = "id_dtlrekbiaya";
    const id_trs_rekbiaya = "id_trs_rekbiaya";
    const id_rekbiaya = "id_rekbiaya";
    const harga = "harga";
    const qty = "qty";
    const tgl_input = "tgl_input";
    const inputby = "inputby";
    const keterangan = "keterangan";
    const kd_bank = "kd_bank";
    const TABLE = "trs_detail_rekening_biaya";

//for inisialisasi.
    public $id_dtlrekbiaya;
    public $id_trs_rekbiaya;
    public $id_rekbiaya;
    public $harga;
    public $qty;
    public $tgl_input;
    public $inputby;
    public $keterangan;
    public $kd_bank;

    var $table = 'trs_detail_rekening_biaya';
    var $primary_key = 'id_dtlrekbiaya';

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

    public function update_where($where,$data)
    {
        $this->db->where($where);
        $this->db->update($this->table,$data);
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
     * @return bool|M_trs_detail_rekening_biaya
     */
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->primary_key,$id);
        $query = $this->db->get();
        return $query->num_rows() == 0 ? FALSE : $query->row();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_trs_pengeluaran
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
     * @return array|bool|M_trs_pengeluaran
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
     * @return array | M_trs_pengeluaran
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
     * @return array | M_trs_pengeluaran
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
