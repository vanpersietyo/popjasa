<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Project_logs extends CI_Model
{

    public $table = 'trs_project_logs';
    public $id = 'Project_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('Project_id,LineNo,Status_log,tgl_log,keterangan');
        $this->datatables->from('trs_project_logs');
        //add this line for join
        //$this->datatables->join('table2', 'trs_project_logs.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi/project_logs/update/$1'), 'Update') . " | " . anchor(site_url('transaksi/project_logs/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'Project_id');
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

}

/* End of file M_Project_logs.php */
/* Location: ./application/models/M_Project_logs.php */
