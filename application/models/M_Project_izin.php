<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Project_izin extends CI_Model
{
    //Models
    const Bool_Izin_Akta_Notaris = "Bool_Izin_Akta_Notaris";
    const Izin_Akta_Notaris = "Izin_Akta_Notaris";
    const Bool_Izin_Pengesahan = "Bool_Izin_Pengesahan";
    const Izin_Pengesahan = "Izin_Pengesahan";
    const Bool_NPWP = "Bool_NPWP";
    const Bool_NPWP_Perusahaan = "Bool_NPWP_Perusahaan";
    const Bool_SKT_Perusahaan = "Bool_SKT_Perusahaan";
    const Bool_SIUP_TDP = "Bool_SIUP_TDP";
    const Bool_Registrasi = "Bool_Registrasi";
    const Bool_PKP = "Bool_PKP";
    const Bool_SK_Domisili = "Bool_SK_Domisili";
    const Izin_Lain = "Izin_Lain";
    const ID_Project_JNS = "ID_Project_JNS";
    const ID_Hdr_Project = "ID_Hdr_Project";
    const ID_Project = "ID_Project";
    const Created_by = "Created_by";
    const EntryTime = "EntryTime";
    const Modified_by = "Modified_by";
    const Last_Modified = "Last_Modified";
    const Keterangan = "Keterangan";
    const TABLE = "trs_projects_izin";

//for inisialisasi.
    public $Bool_Izin_Akta_Notaris;
    public $Izin_Akta_Notaris;
    public $Bool_Izin_Pengesahan;
    public $Izin_Pengesahan;
    public $Bool_NPWP;
    public $Bool_NPWP_Perusahaan;
    public $Bool_SKT_Perusahaan;
    public $Bool_SIUP_TDP;
    public $Bool_Registrasi;
    public $Bool_PKP;
    public $Bool_SK_Domisili;
    public $Izin_Lain;
    public $ID_Project_JNS;
    public $ID_Hdr_Project;
    public $ID_Project;
    public $Created_by;
    public $EntryTime;
    public $Modified_by;
    public $Last_Modified;
    public $Keterangan;

    var $table = 'trs_projects_izin';
    var $id = 'ID_Project_JNS';
    var $id_project = 'ID_Project';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('Bool_Izin_Akta_Notaris,Izin_Akta_Notaris,Bool_Izin_Pengesahan,Izin_Pengesahan,Bool_NPWP,Bool_NPWP_Perusahaan,Bool_SKT_Perusahaan,Bool_SIUP_TDP,Bool_Registrasi,Bool_PKP,Bool_SK_Domisili,Izin_Lain,ID_Project_JNS,ID_Hdr_Project,ID_Project,Created_by,EntryTime,Modified_by,Last_Modified');
        $this->datatables->from('_projects_izin');
        //add this line for join
        //$this->datatables->join('table2', 'projects_izin.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('projects_izin/read/$1'), 'Read') . " | " . anchor(site_url('projects_izin/update/$1'), 'Update') . " | " . anchor(site_url('projects_izin/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_Project_JNS');
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

    function get_by_project($id)
    {
        $this->db->where($this->id_project, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('ID_Project_JNS', $q);
        $this->db->or_like('Bool_Izin_Akta_Notaris', $q);
        $this->db->or_like('Izin_Akta_Notaris', $q);
        $this->db->or_like('Bool_Izin_Pengesahan', $q);
        $this->db->or_like('Izin_Pengesahan', $q);
        $this->db->or_like('Bool_NPWP', $q);
        $this->db->or_like('Bool_NPWP_Perusahaan', $q);
        $this->db->or_like('Bool_SKT_Perusahaan', $q);
        $this->db->or_like('Bool_SIUP_TDP', $q);
        $this->db->or_like('Bool_Registrasi', $q);
        $this->db->or_like('Bool_PKP', $q);
        $this->db->or_like('Bool_SK_Domisili', $q);
        $this->db->or_like('Izin_Lain', $q);
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
        $this->db->like('ID_Project_JNS', $q);
        $this->db->or_like('Bool_Izin_Akta_Notaris', $q);
        $this->db->or_like('Izin_Akta_Notaris', $q);
        $this->db->or_like('Bool_Izin_Pengesahan', $q);
        $this->db->or_like('Izin_Pengesahan', $q);
        $this->db->or_like('Bool_NPWP', $q);
        $this->db->or_like('Bool_NPWP_Perusahaan', $q);
        $this->db->or_like('Bool_SKT_Perusahaan', $q);
        $this->db->or_like('Bool_SIUP_TDP', $q);
        $this->db->or_like('Bool_Registrasi', $q);
        $this->db->or_like('Bool_PKP', $q);
        $this->db->or_like('Bool_SK_Domisili', $q);
        $this->db->or_like('Izin_Lain', $q);
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

    function get_id()
    {
        $tahun = date('Y');
        $bulan = date('m');
        $q = $this->db->query("select MAX(RIGHT($this->id,5)) as kd_max from $this->table");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "DKI$tahun$bulan" . $kd;
    }



    /**
     * @param null|array|string $where
     * @param array $order
     * @return array|bool|M_project_izin
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
     * @return array|bool|M_project_izin
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

/* End of file M_Project_izin.php */
/* Location: ./application/models/M_Project_izin.php */
