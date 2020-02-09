<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Fix_assets extends CI_Model
{

    //Models
    const Fa_ID = "Fa_ID";
    const Barcode = "Barcode";
    const Nama_FA = "Nama_FA";
    const Divisi = "Divisi";
    const Lokasi = "Lokasi";
    const Cabang = "Cabang";
    const Register_Date = "Register_Date";
    const Date_Akuisisi = "Date_Akuisisi";
    const Date_FA = "Date_FA";
    const Date_Disposed = "Date_Disposed";
    const Penerima = "Penerima";
    const TABLE = "m_fix_assets";

//for inisialisasi.
    public $Fa_ID;
    public $Barcode;
    public $Nama_FA;
    public $Divisi;
    public $Lokasi;
    public $Cabang;
    public $Register_Date;
    public $Date_Akuisisi;
    public $Date_FA;
    public $Date_Disposed;
    public $Penerima;

    var $table = 'm_fix_assets';
    var $id = 'Fa_ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('Fa_ID', $q);
        $this->db->or_like('Barcode', $q);
        $this->db->or_like('Nama_FA', $q);
        $this->db->or_like('Divisi', $q);
        $this->db->or_like('Lokasi', $q);
        $this->db->or_like('Cabang', $q);
        $this->db->or_like('Register_Date', $q);
        $this->db->or_like('Date_Akuisisi', $q);
        $this->db->or_like('Date_FA', $q);
        $this->db->or_like('Date_Disposed', $q);
        $this->db->or_like('Penerima', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('Fa_ID', $q);
        $this->db->or_like('Barcode', $q);
        $this->db->or_like('Nama_FA', $q);
        $this->db->or_like('Divisi', $q);
        $this->db->or_like('Lokasi', $q);
        $this->db->or_like('Cabang', $q);
        $this->db->or_like('Register_Date', $q);
        $this->db->or_like('Date_Akuisisi', $q);
        $this->db->or_like('Date_FA', $q);
        $this->db->or_like('Date_Disposed', $q);
        $this->db->or_like('Penerima', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_ID(){
        $tahun=date('Y');
        $bulan=date('m');
        $q = $this->db->query("select MAX(RIGHT(FA_ID,5)) as kd_max from m_fix_assets" );
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s",$tmp);
            }
        }else{
            $kd = "00001";
        }
        return "FA$tahun$bulan".$kd;
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_Fix_assets
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
     * @return array|bool|M_Fix_assets
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
}

/* End of file M_Fix_assets.php */
/* Location: ./application/models/M_Fix_assets.php */