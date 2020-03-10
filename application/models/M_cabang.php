<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cabang extends CI_Model {

//Models
    const kd_cabang = "kd_cabang";
    const nm_cabang = "nm_cabang";
    const status = "status";
    const inputby = "inputby";
    const tgl_input = "tgl_input";
    const extra_field = "extra_field";
    const TABLE = "m_cabang";

//for inisialisasi.
    public $kd_cabang;
    public $nm_cabang;
    public $status;
    public $inputby;
    public $tgl_input;
    public $extra_field;

    var $table          = 'm_cabang';
    var $primary_key    = 'kd_cabang';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
//CRUD

    /**
     * @param $data
     * @return bool
     */
    public function save($data)
    {
        $this->db->insert('bank', $data);
        return $this->find_first($data) ? true : false;
    }

    /**
     * @param $where
     * @param $data
     * @return mixed
     */
    public function update($where, $data)
    {
        $this->db->update('bank', $data, $where);
        return $this->db->affected_rows();
    }

    /**
     * @param $id
     */
    public function delete_by_id($id)
    {
        $this->db->where('KD_BANK', $id);
        $this->db->delete('bank');
    }

    /**
     * @param int $id
     * @return bool|M_cabang
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
     * @return array|bool|M_cabang
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
        $result	= $data->num_rows();
        return empty($result) ? FALSE : $data->row();
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_cabang
     */
    public function find($where = null, $order = []){
        //cek order
        if($order){
            foreach ($order as $key => $value) {
                $this->db->order_by($key,$value);
            }
        }
        //cek where
        $data = $where ? $this->db->get_where($this->table, $where) : $this->db->get($this->table);
        $result	= $data->num_rows();
        //return
        return empty($result) ? FALSE : $data->result();
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

}