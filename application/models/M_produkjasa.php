<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produkjasa extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$query=$this->db->query("
			select * 
			from m_layanan
			");
		return $query->result();
	}

	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_layanan,5)) as kd_max from m_layanan");
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

	function get_ID_detail(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_detail_layanan,5)) as kd_max from m_detail_layanan");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "DJS-$tahun$bulan".$kd;
	}


	function count_filtered()
	{
		$query=$this->db->query("
			select * from m_layanan
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_layanan');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from('m_layanan');
		$this->db->where('id_layanan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_by_id_detail($id)
	{
		$this->db->from('m_detail_layanan');
		$this->db->where('id_detail_layanan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_layanan', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_layanan', $data, $where);
		return $this->db->affected_rows();
	}

	public function update_detail($where, $data)
	{
		$this->db->update('m_detail_layanan', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_layanan', $id);
		$this->db->delete('m_layanan');
	}

	public function delete_by_id_detail($id)
	{
		$this->db->where('id_detail_layanan', $id);
		$this->db->delete('m_detail_layanan');
	}

	public function get_detail($id){
		$query=$this->db->query("
			select a.id_detail_layanan,a.id_layanan,b.nama_layanan,a.id_syrt_layanan,c.nm_syrt_layanan,a.keterangan,a.tgl_input,a.inputby
			from m_detail_layanan a,m_layanan b,m_syarat_layanan c
			where a.id_layanan=b.id_layanan and a.id_syrt_layanan=c.id_syrt_layanan and a.id_layanan='$id'
			");
		return $query->result();
	}

	function count_filtered_detail($id)
	{
		$query=$this->db->query("
			select a.id_detail_layanan,a.id_layanan,b.nama_layanan,a.id_syrt_layanan,c.nm_syrt_layanan,a.keterangan,a.tgl_input,a.inputby
			from m_detail_layanan a,m_layanan b,m_syarat_layanan c
			where a.id_layanan=b.id_layanan and a.id_syrt_layanan=c.id_syrt_layanan and a.id_layanan='$id'
			");
		return $query->num_rows();
	}

	public function count_all_detail($id)
	{
		$query=$this->db->query("
			select a.id_detail_layanan,a.id_layanan,b.nama_layanan,a.id_syrt_layanan,c.nm_syrt_layanan,a.keterangan,a.tgl_input,a.inputby
			from m_detail_layanan a,m_layanan b,m_syarat_layanan c
			where a.id_layanan=b.id_layanan and a.id_syrt_layanan=c.id_syrt_layanan and a.id_layanan='$id'
			");
		return $query->num_rows();
	}

	function get_syarat(){
		$query=$this->db->query("
			select * from m_syarat_layanan
			");
		return $query->result();
	}

	public function save_detail($data)
	{
		$this->db->insert('m_detail_layanan', $data);
		return $this->db->insert_id();
	}



}
