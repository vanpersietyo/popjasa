<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Trs_asset extends CI_Model
{

    //Models
    const trno = "trno";
    const fa_id = "fa_id";
    const jenis = "jenis";
    const date_beli = "date_beli";
    const estimasi = "estimasi";
    const date_penyusutan = "date_penyusutan";
    const hrg_beli = "hrg_beli";
    const penyusutan_thn = "penyusutan_thn";
    const penyusutan_bln = "penyusutan_bln";
    const pembulatan = "pembulatan";
    const added_by = "added_by";
    const entry_time = "entry_time";
    const changed_by = "changed_by";
    const last_modified = "last_modified";
    const TABLE = "trs_fix_asset";

//for inisialisasi.
    public $trno;
    public $fa_id;
    public $jenis;
    public $date_beli;
    public $estimasi;
    public $date_penyusutan;
    public $hrg_beli;
    public $penyusutan_thn;
    public $penyusutan_bln;
    public $pembulatan;
    public $added_by;
    public $entry_time;
    public $changed_by;
    public $last_modified;

    var $table = 'trs_fix_asset';
    public $id = 'trno';

    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('trno,fa_id,jenis,date_beli,estimasi,date_penyusutan,hrg_beli,penyusutan_thn,penyusutan_bln,pembulatan,added_by,entry_time,changed_by,last_modified');
        $this->datatables->from('trs_fix_asset');
        //add this line for join
        //$this->datatables->join('table2', 'trs_fix_asset.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('trs_asset/read/$1'), 'Read') . " | " . anchor(site_url('trs_asset/update/$1'), 'Update') . " | " . anchor(site_url('trs_asset/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'trno');
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
        $this->db->like('trno', $q);
        $this->db->or_like('fa_id', $q);
        $this->db->or_like('jenis', $q);
        $this->db->or_like('date_beli', $q);
        $this->db->or_like('estimasi', $q);
        $this->db->or_like('date_penyusutan', $q);
        $this->db->or_like('hrg_beli', $q);
        $this->db->or_like('penyusutan_thn', $q);
        $this->db->or_like('penyusutan_bln', $q);
        $this->db->or_like('pembulatan', $q);
        $this->db->or_like('added_by', $q);
        $this->db->or_like('entry_time', $q);
        $this->db->or_like('changed_by', $q);
        $this->db->or_like('last_modified', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('trno', $q);
        $this->db->or_like('fa_id', $q);
        $this->db->or_like('jenis', $q);
        $this->db->or_like('date_beli', $q);
        $this->db->or_like('estimasi', $q);
        $this->db->or_like('date_penyusutan', $q);
        $this->db->or_like('hrg_beli', $q);
        $this->db->or_like('penyusutan_thn', $q);
        $this->db->or_like('penyusutan_bln', $q);
        $this->db->or_like('pembulatan', $q);
        $this->db->or_like('added_by', $q);
        $this->db->or_like('entry_time', $q);
        $this->db->or_like('changed_by', $q);
        $this->db->or_like('last_modified', $q);
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
     * @return array|bool|M_Trs_asset
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
     * @return array|bool|M_Trs_asset
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

    function get_ID()
    {
        $tahun = date('Y');
        $bulan = date('m');
        $q = $this->db->query("select MAX(RIGHT(trno,5)) as kd_max from trs_fix_asset");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "TFA$tahun$bulan" . $kd;
    }
}

/* End of file M_Trs_asset.php */
/* Location: ./application/models/M_Trs_asset.php */
