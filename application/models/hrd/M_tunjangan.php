<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tunjangan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_data(){
		$query=$this->db->query("
			select *
			from m_tunjangan
			");
		return $query->result();
	}

	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_tunjangan
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_tunjangan');
		return $this->db->count_all_results();
	}

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_potongan,5)) as kd_max from m_tunjangan");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "POT-$tahun$bulan".$kd;
	}




	public function get_by_id($id)
	{
		$this->db->from('m_tunjangan');
		$this->db->where('id_tunjangan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_tunjangan', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_tunjangan', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_tunjangan', $id);
		$this->db->delete('m_tunjangan');
	}


}
