<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_target extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
			select *
			from m_target where kd_cabang='$cabang'
			");
		return $query->result();
	}

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_customer,5)) as kd_max from m_target");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "CUS-$tahun$bulan".$kd;
	}


	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_target where kd_cabang='$cabang'
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_target');
		$this->db->where('kd_cabang', $cabang);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from('m_target');
		$this->db->where('periode',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_target', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_target', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('periode', $id);
		$this->db->delete('m_target');
	}


}
