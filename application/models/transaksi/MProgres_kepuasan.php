<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MProgres_kepuasan extends CI_Model
{

    public $table = 'progres_kepuasan';
    public $id = 'id';
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
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nama_pelanggan', $q);
	$this->db->or_like('nama_perusahaan', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('info_order', $q);
	$this->db->or_like('info_order2', $q);
	$this->db->or_like('info_kepuasan', $q);
	$this->db->or_like('status_photo', $q);
	$this->db->or_like('status_photo_tgl', $q);
	$this->db->or_like('status_fb', $q);
	$this->db->or_like('status_ig', $q);
	$this->db->or_like('referensi_nama', $q);
	$this->db->or_like('referensi_no_telp', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama_pelanggan', $q);
	$this->db->or_like('nama_perusahaan', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('info_order', $q);
	$this->db->or_like('info_order2', $q);
	$this->db->or_like('info_kepuasan', $q);
	$this->db->or_like('status_photo', $q);
	$this->db->or_like('status_photo_tgl', $q);
	$this->db->or_like('status_fb', $q);
	$this->db->or_like('status_ig', $q);
	$this->db->or_like('referensi_nama', $q);
	$this->db->or_like('referensi_no_telp', $q);
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

/* End of file MProgres_kepuasan.php */
/* Location: ./application/models/MProgres_kepuasan.php */
