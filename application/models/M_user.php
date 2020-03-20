<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$query=$this->db->query("
			select a.*,b.nama_karyawan 
			from m_user a
			left join m_karyawan b  on  a.id_karyawan=b.id_karyawan
			");
		return $query->result();
	}

	public function get_employee(){
		$query=$this->db->query("
			select * from m_karyawan
			");
		return $query->result();
	}


	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_user
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_user');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from('m_user');
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_user', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_user', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('m_user');
	}


}
