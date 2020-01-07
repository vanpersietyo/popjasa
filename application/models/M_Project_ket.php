<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Project_ket extends CI_Model
{

    //Models
    const Ket_Email = "Ket_Email";
    const Email_Pengurus = "Email_Pengurus";
    const No_Telp = "No_Telp";
    const Ket_Luas = "Ket_Luas";
    const Ket_Bidang_Usaha = "Ket_Bidang_Usaha";
    const Ket_Bidang_Usaha_Utama = "Ket_Bidang_Usaha_Utama";
    const Ket_Informasi = "Ket_Informasi";
    const ID_Project_Ket = "ID_Project_Ket";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_By = "Created_By";
    const EntryTime = "EntryTime";
    const Modified_By = "Modified_By";
    const Last_Mofidified = "Last_Mofidified";
    const TABLE = "trs_projects_Ket";

//for inisialisasi.
    public $Ket_Email;
    public $Email_Pengurus;
    public $No_Telp;
    public $Ket_Luas;
    public $Ket_Bidang_Usaha;
    public $Ket_Bidang_Usaha_Utama;
    public $Ket_Informasi;
    public $ID_Project_Ket;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_By;
    public $EntryTime;
    public $Modified_By;
    public $Last_Mofidified;

    var $table = 'trs_projects_Ket';
    var $id = 'ID_Project_Ket';
    var $id_project = 'ID_Project';
    var $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('Ket_Email,Email_Pengurus,No_Telp,Ket_Luas,Ket_Bidang_Usaha,Ket_Bidang_Usaha_Utama,Ket_Informasi,ID_Project_Ket,ID_Hdr_Project,ID_Project,Created_By,EntryTime,Modified_By,Last_Mofidified');
        $this->datatables->from('_projects_ket');
        //add this line for join
        //$this->datatables->join('table2', 'trs_projects_Ket.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('projects_ket/read/$1'), 'Read') . " | " . anchor(site_url('projects_ket/update/$1'), 'Update') . " | " . anchor(site_url('projects_ket/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_Project_Ket');
        return $this->datatables->generate();
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

    // get data by id
    function get_by_project($id)
    {
        $this->db->where($this->id_project, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('ID_Project_Ket', $q);
        $this->db->or_like('Ket_Email', $q);
        $this->db->or_like('Email_Pengurus', $q);
        $this->db->or_like('No_Telp', $q);
        $this->db->or_like('Ket_Luas', $q);
        $this->db->or_like('Ket_Bidang_Usaha', $q);
        $this->db->or_like('Ket_Bidang_Usaha_Utama', $q);
        $this->db->or_like('Ket_Informasi', $q);
        $this->db->or_like('ID_Hdr_Project', $q);
        $this->db->or_like('ID_Project', $q);
        $this->db->or_like('Created_By', $q);
        $this->db->or_like('EntryTime', $q);
        $this->db->or_like('Modified_By', $q);
        $this->db->or_like('Last_Mofidified', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_Project_Ket', $q);
        $this->db->or_like('Ket_Email', $q);
        $this->db->or_like('Email_Pengurus', $q);
        $this->db->or_like('No_Telp', $q);
        $this->db->or_like('Ket_Luas', $q);
        $this->db->or_like('Ket_Bidang_Usaha', $q);
        $this->db->or_like('Ket_Bidang_Usaha_Utama', $q);
        $this->db->or_like('Ket_Informasi', $q);
        $this->db->or_like('ID_Hdr_Project', $q);
        $this->db->or_like('ID_Project', $q);
        $this->db->or_like('Created_By', $q);
        $this->db->or_like('EntryTime', $q);
        $this->db->or_like('Modified_By', $q);
        $this->db->or_like('Last_Mofidified', $q);
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

    function get_id(){
        $tahun=date('Y');
        $bulan=date('m');
        $q = $this->db->query("select MAX(RIGHT($this->id,5)) as kd_max from $this->table");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s",$tmp);
            }
        }else{
            $kd = "00001";
        }
        return "DKK$tahun$bulan".$kd;
    }



    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_project_ket
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
     * @return array|bool|M_project_ket
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

}

/* End of file M_Project_ket.php */
/* Location: ./application/models/M_Project_ket.php */