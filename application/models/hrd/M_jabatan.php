<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_jabatan(){
		$query=$this->db->query("
			select * from m_jabatan
			");
		return $query->result();
	}

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_karyawan,5)) as kd_max from m_karyawan");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "PJS-$tahun$bulan".$kd;
	}


	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_jabatan
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_jabatan');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from('m_jabatan');
		$this->db->where('id_jabatan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_jabatan', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_jabatan', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_jabatan', $id);
		$this->db->delete('m_jabatan');
	}


}
