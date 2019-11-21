<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$query=$this->db->query("
			select *
			from m_customer
			");
		return $query->result();
	}

	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_customer
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_customer');
		return $this->db->count_all_results();
	}

	public function get_user_contacted(){
		$query=$this->db->query("
			select *
			from m_customer where status=1
			");
		return $query->result();
	}

	function count_filtered_contacted(){
		$query=$this->db->query("
			select *
			from m_customer where status=1
			");
		return $query->num_rows();
	}

	public function count_all_contacted(){
		$query=$this->db->query("
			select *
			from m_customer where status=1
			");
		return $query->num_rows();
	}

	public function get_user_deals(){
		$query=$this->db->query("
			select *
			from m_customer where status=2
			");
		return $query->result();
	}

	function count_filtered_deals(){
		$query=$this->db->query("
			select *
			from m_customer where status=2
			");
		return $query->num_rows();
	}

	public function count_all_deals(){
		$query=$this->db->query("
			select *
			from m_customer where status=2
			");
		return $query->num_rows();
	}

	public function get_user_lost(){
		$query=$this->db->query("
			select *
			from m_customer where status=3
			");
		return $query->result();
	}

	function count_filtered_lost(){
		$query=$this->db->query("
			select *
			from m_customer where status=3
			");
		return $query->num_rows();
	}

	public function count_all_lost(){
		$query=$this->db->query("
			select *
			from m_customer where status=3
			");
		return $query->num_rows();
	}

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_customer,5)) as kd_max from m_customer");
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




	public function get_by_id($id)
	{
		$this->db->from('m_customer');
		$this->db->where('id_customer',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_customer', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_customer', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete('m_customer');
	}


}
