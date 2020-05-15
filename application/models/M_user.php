<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
    //Models
    const id_user = "id_user";
    const id_karyawan = "id_karyawan";
    const kd_cabang = "kd_cabang";
    const nama_user = "nama_user";
    const status_user = "status_user";
    const password = "password";
    const tgl_input = "tgl_input";
    const inputby = "inputby";
    const akses = "akses";
    const TABLE = "m_user";

//for inisialisasi.
    public $id_user;
    public $id_karyawan;
    public $kd_cabang;
    public $nama_user;
    public $status_user;
    public $password;
    public $tgl_input;
    public $inputby;
    public $akses;

    var $table = 'm_user';
    var $primary_key = 'id_user';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user()
    {
        $query = $this->db->query("
			select a.*,b.nama_karyawan 
			from m_user a
			left join m_karyawan b  on  a.id_karyawan=b.id_karyawan
			");
        return $query->result();
    }

    public function get_employee()
    {
        $query = $this->db->query("
			select * from m_karyawan
			");
        return $query->result();
    }

    function count_filtered()
    {
        $query = $this->db->query("
			select * from m_user
			");
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('m_user');
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from('m_user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert('m_user', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update('m_user', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('m_user');
    }

    public function update_where($where,$data)
    {
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_user
     */
    public function find($where = null, $order = []){
        //cek order
        if($order){
            foreach ($order as $key => $value) {
                $this->db->order_by($key,$value);
            }
        }

        //cek where
        if($where){
            $data 	= $this->db->get_where($this->table,$where);
        }else{
            $data 	= $this->db->get($this->table);
        }

        $result	= $data->num_rows();
        if(empty($result)){
            return false;
        }else{
            return $data->result();
        }
    }

    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_user
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
     * @param null $where
     * @param array $order
     * @return int
     */
    public function count($where = null){
        //cek where
        if($where){
            $data 	= $this->db->get_where($this->table,$where);
        }else{
            $data 	= $this->db->get($this->table);
        }
        return $data->num_rows();
    }
}
