<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Trs_fix_asset_hdr extends CI_Model
{

    public $table = 'trs_fix_asset_hdr';
    public $id = 'TrNo';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('TrNo,Tgl,TrManualRef,Created_At,Modified_By,EntryTime,Last_Modified');
        $this->datatables->from('trs_fix_asset_hdr');
        //add this line for join
        //$this->datatables->join('table2', 'trs_fix_asset_hdr.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi/fixAsset_hdr/update/$1'), '<i class="ft-edit" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm')) . " | " . anchor(site_url('transaksi/fixAsset_hdr/delete/$1'), '<i class="ft-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'TrNo');
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
        $this->db->like('TrNo', $q);
        $this->db->or_like('Tgl', $q);
        $this->db->or_like('TrManualRef', $q);
        $this->db->or_like('Created_At', $q);
        $this->db->or_like('Modified_By', $q);
        $this->db->or_like('EntryTime', $q);
        $this->db->or_like('Last_Modified', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('TrNo', $q);
        $this->db->or_like('Tgl', $q);
        $this->db->or_like('TrManualRef', $q);
        $this->db->or_like('Created_At', $q);
        $this->db->or_like('Modified_By', $q);
        $this->db->or_like('EntryTime', $q);
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

    function getTrNo()
    {
        $tahun = date('y');
        $bulan = date('m');
        $q = $this->db->query("select MAX(RIGHT(TrNo,5)) as kd_max from trs_fix_asset_hdr");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "TRS-FA$tahun$bulan" . $kd;
    }
}

/* End of file M_Trs_fix_asset_hdr.php */
/* Location: ./application/models/M_Trs_fix_asset_hdr.php */