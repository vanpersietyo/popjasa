<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Project_uraian extends CI_Model
{
    //Models
    const nm_perusahaan = "nm_perusahaan";
    const modal = "modal";
    const presentase_shm = "presentase_shm";
    const hrg_saham = "hrg_saham";
    const No_Telp = "No_Telp";
    const No_Fax = "No_Fax";
    const alamat = "alamat";
    const kota = "kota";
    const kelurahan = "kelurahan";
    const kabupaten = "kabupaten";
    const izin_persetujuan = "izin_persetujuan";
    const signature_commander = "signature_commander";
    const penerima = "penerima";
    const ID_Project_Uraian = "ID_Project_Uraian";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_by = "Created_by";
    const EntryTime = "EntryTime";
    const Modified_by = "Modified_by";
    const Last_Modified = "Last_Modified";
    const TABLE = "trs_project_uraian";

//for inisialisasi.
    public $nm_perusahaan;
    public $modal;
    public $presentase_shm;
    public $hrg_saham;
    public $No_Telp;
    public $No_Fax;
    public $alamat;
    public $kota;
    public $kelurahan;
    public $kabupaten;
    public $izin_persetujuan;
    public $signature_commander;
    public $penerima;
    public $ID_Project_Uraian;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_by;
    public $EntryTime;
    public $Modified_by;
    public $Last_Modified;

    var $table = 'trs_project_uraian';
    var $id = 'ID_Project_Uraian';
    var $id_project = 'ID_Project';

    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('nm_perusahaan,modal,presentase_shm,hrg_saham,No_Telp,No_Fax,alamat,kota,kelurahan,kabupaten,izin_persetujuan,signature_commander,penerima,ID_Project_Uraian,ID_Hdr_Project,ID_Project,Created_by,EntryTime,Modified_by,Last_Modified');
        $this->datatables->from('_project_uraian');
        //add this line for join
        //$this->datatables->join('table2', 'project_uraian.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('project_uraian/read/$1'), 'Read') . " | " . anchor(site_url('project_uraian/update/$1'), 'Update') . " | " . anchor(site_url('project_uraian/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_Project_Uraian');
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
        $this->db->like('ID_Project_Uraian', $q);
        $this->db->or_like('nm_perusahaan', $q);
        $this->db->or_like('modal', $q);
        $this->db->or_like('presentase_shm', $q);
        $this->db->or_like('hrg_saham', $q);
        $this->db->or_like('No_Telp', $q);
        $this->db->or_like('No_Fax', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('kota', $q);
        $this->db->or_like('kelurahan', $q);
        $this->db->or_like('kabupaten', $q);
        $this->db->or_like('izin_persetujuan', $q);
        $this->db->or_like('signature_commander', $q);
        $this->db->or_like('penerima', $q);
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
        $this->db->like('ID_Project_Uraian', $q);
        $this->db->or_like('nm_perusahaan', $q);
        $this->db->or_like('modal', $q);
        $this->db->or_like('presentase_shm', $q);
        $this->db->or_like('hrg_saham', $q);
        $this->db->or_like('No_Telp', $q);
        $this->db->or_like('No_Fax', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('kota', $q);
        $this->db->or_like('kelurahan', $q);
        $this->db->or_like('kabupaten', $q);
        $this->db->or_like('izin_persetujuan', $q);
        $this->db->or_like('signature_commander', $q);
        $this->db->or_like('penerima', $q);
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
     * @return array|bool|M_Project_uraian
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
     * @return array|bool|M_Project_uraian
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
        return "DKU$tahun$bulan".$kd;
    }

}

/* End of file M_Project_uraian.php */
/* Location: ./application/models/M_Project_uraian.php */
