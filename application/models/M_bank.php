<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bank extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data(){
        $query=$this->db->query("
		select * from bank
			");
        return $query->result();
    }


    function get_ID(){
        $tahun=date('Y');
        $bulan=date('m');
        $q = $this->db->query("select MAX(RIGHT(kd_bank,5)) as kd_max from bank");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s",$tmp);
            }
        }else{
            $kd = "00001";
        }
        return "BNK-$tahun$bulan".$kd;
    }


    function count_filtered(){
        $query=$this->db->query("
		select * from bank
			");
        return $query->num_rows();
    }

    public function count_all()
    {
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		select * from bank
			");
        return $query->num_rows();
    }

    public function get_by_id($id)
    {
        $this->db->from('bank');
        $this->db->where('kd_bank',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert('bank', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update('bank', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('kd_bank', $id);
        $this->db->delete('bank');
    }


}
