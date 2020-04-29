<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Trs_fix_asset_dtl extends CI_Model
{

    public $table = 'trs_fix_asset_dtl';
    public $table2 = 'v_fix_asset';
    public $id = 'TrNo';
    public $id2 = 'Line_No';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('TrNo,Line_No,Fa_Id,Jenis,Date_beli,Estimasi,Date_penyusutan,Hrg_beli,Penyusutan_thn,Penyusutan_bln,Pembulatan,Added_by,Entry_time,Changed_by,Last_Modified');
        $this->datatables->from('trs_fix_asset_dtl');
        //add this line for join
        //$this->datatables->join('table2', 'trs_fix_asset_dtl.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('trs_fix_asset_dtl/read/$1'), 'Read') . " | " . anchor(site_url('trs_fix_asset_dtl/update/$1'), 'Update') . " | " . anchor(site_url('trs_fix_asset_dtl/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'TrNo');
        return $this->datatables->generate();
    }

    // datatables
    function json2($id, $id2 = 0)
    {
        $this->datatables->select('TrNo,Line_No,Fa_Id,Jenis,Date_beli,Estimasi,Date_penyusutan,Hrg_beli,Penyusutan_thn,Penyusutan_bln,Pembulatan,Added_by,Entry_time,Changed_by,Last_Modified');
        $this->datatables->from('trs_fix_asset_dtl');
        $this->datatables->where('TrNo', $id);
        //add this line for join
        //$this->datatables->join('table2', 'trs_fix_asset_dtl.field = table2.field');
        //$this->datatables->add_column('action', anchor(site_url('transaksi/fixAsset_dtl/update/'.$id.'/'.$id2), 'Update') . " | " . anchor(site_url('transaksi/fixAsset_dtl/delete/$1/$2'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'TrNo');
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

    function get_by_pk($id, $lineNo)
    {
        $this->db->where($this->id, $id);
        $this->db->where($this->id2, $lineNo);
        return $this->db->get($this->table)->row();
    }

    function get_by_trno($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('TrNo', $q);
        $this->db->or_like('Fa_Id', $q);
        $this->db->or_like('Jenis', $q);
        $this->db->or_like('Date_beli', $q);
        $this->db->or_like('Estimasi', $q);
        $this->db->or_like('Date_penyusutan', $q);
        $this->db->or_like('Hrg_beli', $q);
        $this->db->or_like('Penyusutan_thn', $q);
        $this->db->or_like('Penyusutan_bln', $q);
        $this->db->or_like('Pembulatan', $q);
        $this->db->or_like('Added_by', $q);
        $this->db->or_like('Entry_time', $q);
        $this->db->or_like('Changed_by', $q);
        $this->db->or_like('Last_Modified', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('TrNo', $q);
        $this->db->or_like('Fa_Id', $q);
        $this->db->or_like('Jenis', $q);
        $this->db->or_like('Date_beli', $q);
        $this->db->or_like('Estimasi', $q);
        $this->db->or_like('Date_penyusutan', $q);
        $this->db->or_like('Hrg_beli', $q);
        $this->db->or_like('Penyusutan_thn', $q);
        $this->db->or_like('Penyusutan_bln', $q);
        $this->db->or_like('Pembulatan', $q);
        $this->db->or_like('Added_by', $q);
        $this->db->or_like('Entry_time', $q);
        $this->db->or_like('Changed_by', $q);
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
    function update($id, $id2, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->where($this->id2, $id2);
        $this->db->update($this->table, $data);

    }

    // delete data
    function delete($id, $id2)
    {
        $this->db->where($this->id, $id);
        $this->db->where($this->id2, $id2);
        $this->db->delete($this->table);
    }

    function getMaxLineNo($id)
    {
        $q = $this->db->query("select MAX(Line_No) as kd_max from trs_fix_asset_dtl where TrNo='$id'");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%s", $tmp);
            }
        } else {
            $kd = "1";
        }
        return $kd;
    }

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

    function get_all_report()
    {
        $this->db->order_by($this->Fa_Id, $this->order);
        return $this->db->get($this->table2)->result();
    }
}

/* End of file M_Trs_fix_asset_dtl.php */
/* Location: ./application/models/M_Trs_fix_asset_dtl.php */
