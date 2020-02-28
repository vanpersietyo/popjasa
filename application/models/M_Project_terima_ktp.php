<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Project_terima_ktp extends CI_Model
{
    //Models
    const id = "id";
    const id_project = "id_project";
    const no_ktp = "no_ktp";
    const nama_ktp = "nama_ktp";
    const TABLE = "trs_project_terima_ktp";

    //for inisialisasi.
    public $id;
    public $id_project;
    public $no_ktp;
    public $nama_ktp;

    var $table = 'trs_project_terima_ktp';
    var $primary_key = 'id';

    public $order = 'DESC';



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
     * @return bool|M_project_terima_ktp
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
     * @return CI_DB | M_project_terima_ktp
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
     * @return array | M_project_terima_ktp
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
     * @return array|bool|M_project_terima_ktp
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
     * @return array|bool|M_project_terima_ktp
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
}

/* End of file M_Project_terima.php */
/* Location: ./application/models/M_Project_terima.php */