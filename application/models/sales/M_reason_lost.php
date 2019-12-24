<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reason_lost extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_data(){
		$query=$this->db->query("
			select *
			from m_reason_lost
			");
		return $query->result();
	}

	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_reason_lost
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_reason_lost');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from('m_reason_lost');
		$this->db->where('id_reason_lost',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_reason_lost', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_reason_lost', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_reason_lost', $id);
		$this->db->delete('m_reason_lost');
	}


}
