<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Project_logs extends CI_Model
{
//Models
    const Project_id = "Project_id";
    const LineNo = "LineNo";
    const Status_log = "Status_log";
    const tgl_log = "tgl_log";
    const keterangan = "keterangan";
    const created_by = "created_by";
    const created_at = "created_at";
    const modified_by = "modified_by";
    const modified_at = "modified_at";
    const TABLE = "trs_project_logs";

//for inisialisasi.
    public $Project_id;
    public $LineNo;
    public $Status_log;
    public $tgl_log;
    public $keterangan;
    public $created_by;
    public $created_at;
    public $modified_by;
    public $modified_at;

    public $table = 'trs_project_logs';
    public $id = 'Project_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($id)
    {
        $this->datatables->select('Project_id,LineNo, Status_log  ,tgl_log,keterangan');
        $this->datatables->from('v_project_logs');
        $this->datatables->where(array('Project_id' => $id));
        //add this line for join
        //$this->datatables->join('table2', 'trs_project_logs.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi/project_logs/update/$1'), 'Update') . " | " . anchor(site_url('transaksi/project_logs/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'Project_id');
        return $this->datatables->generate();
    }

    // datatables
    function json2($id)
    {
        $this->datatables->select('Project_id,LineNo, Status_log  ,tgl_log,keterangan, created_by');
        $this->datatables->from('v_project_logs');
        $this->datatables->where(array('Project_id' => $id));
        //add this line for join
        //$this->datatables->join('table2', 'trs_project_logs.field = table2.field');
//        $this->datatables->add_column();
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id_list($id)
    {
        $this->db->where($this->id, $id);
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
        $this->db->like('Project_id', $q);
        $this->db->or_like('Status_log', $q);
        $this->db->or_like('tgl_log', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('modified_by', $q);
        $this->db->or_like('modified_at', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('Project_id', $q);
        $this->db->or_like('Status_log', $q);
        $this->db->or_like('tgl_log', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('modified_by', $q);
        $this->db->or_like('modified_at', $q);
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

    function getLineNo($project_id)
    {
        $q = $this->db->query("select MAX(LineNo) as kd_max from $this->table where $this->id = '$project_id' ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $tmp;
            }
        } else {
            $kd = "1";
        }
        return $kd;
    }
}

/* End of file M_Project_logs.php */
/* Location: ./application/models/M_Project_logs.php */
