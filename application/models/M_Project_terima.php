<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Project_terima extends CI_Model
{
    //Models
    const bool_ktp = "bool_ktp";
    const bool_npwp = "bool_npwp";
    const bool_sertifikat = "bool_sertifikat";
    const bool_imb = "bool_imb";
    const bool_stempel = "bool_stempel";
    const jml_materai = "jml_materai";
    const bool_sk_domisili = "bool_sk_domisili";
    const bool_surat_sewa = "bool_surat_sewa";
    const ID_Project_terima = "ID_Project_terima";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_by = "Created_by";
    const EntryTime = "EntryTime";
    const Modified_by = "Modified_by";
    const Last_Modified = "Last_Modified";
    const TABLE = "trs_project_terima";

//for inisialisasi.
    public $bool_ktp;
    public $bool_npwp;
    public $bool_sertifikat;
    public $bool_imb;
    public $bool_stempel;
    public $jml_materai;
    public $bool_sk_domisili;
    public $bool_surat_sewa;
    public $ID_Project_terima;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_by;
    public $EntryTime;
    public $Modified_by;
    public $Last_Modified;

    var $table = 'trs_project_terima';
    var $id = 'ID_Project_terima';

    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('bool_ktp,bool_npwp,bool_sertifikat,bool_imb,bool_stempel,jml_materai,bool_sk_domisili,bool_surat_sewa,ID_Project_terima,ID_Hdr_Project,ID_Project,Created_by,EntryTime,Modified_by,Last_Modified');
        $this->datatables->from('trs_project_terima');
        //add this line for join
        //$this->datatables->join('table2', 'trs_project_terima.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi/project_terima/read/$1'), 'Read') . " | " . anchor(site_url('transaksi/project_terima/update/$1'), 'Update') . " | " . anchor(site_url('transaksi/project_terima/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_Project_terima');
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

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('ID_Project_terima', $q);
        $this->db->or_like('bool_ktp', $q);
        $this->db->or_like('bool_npwp', $q);
        $this->db->or_like('bool_sertifikat', $q);
        $this->db->or_like('bool_imb', $q);
        $this->db->or_like('bool_stempel', $q);
        $this->db->or_like('jml_materai', $q);
        $this->db->or_like('bool_sk_domisili', $q);
        $this->db->or_like('bool_surat_sewa', $q);
        $this->db->or_like('ID_Hdr_Project', $q);
        $this->db->or_like('ID_Project', $q);
        $this->db->or_like('Created_by', $q);
        $this->db->or_like('EntryTime', $q);
        $this->db->or_like('Modified_by', $q);
        $this->db->or_like('Last_Modified', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_Project_terima', $q);
        $this->db->or_like('bool_ktp', $q);
        $this->db->or_like('bool_npwp', $q);
        $this->db->or_like('bool_sertifikat', $q);
        $this->db->or_like('bool_imb', $q);
        $this->db->or_like('bool_stempel', $q);
        $this->db->or_like('jml_materai', $q);
        $this->db->or_like('bool_sk_domisili', $q);
        $this->db->or_like('bool_surat_sewa', $q);
        $this->db->or_like('ID_Hdr_Project', $q);
        $this->db->or_like('ID_Project', $q);
        $this->db->or_like('Created_by', $q);
        $this->db->or_like('EntryTime', $q);
        $this->db->or_like('Modified_by', $q);
        $this->db->or_like('Last_Modified', $q);
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



    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_project_terima
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
     * @return array|bool|M_project_terima
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
        return "DKT$tahun$bulan".$kd;
    }

}

/* End of file M_Project_terima.php */
/* Location: ./application/models/M_Project_terima.php */