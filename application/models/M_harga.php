<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_harga extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$query=$this->db->query("
			select a.id_hrg_layanan,a.id_layanan,b.nama_layanan,a.harga,a.keterangan,a.tgl_input,a.inputby
			from m_harga_layanan a, m_layanan b
			where a.id_layanan=b.id_layanan
			");
		return $query->result();
	}

	public function get_layanan(){
		$query=$this->db->query("
			select *
			from m_layanan
			");
		return $query->result();
	}


	function get_ID(){
		$tahun=date('Y');
		$bulan=date('m');
		$q = $this->db->query("select MAX(RIGHT(id_hrg_layanan,5)) as kd_max from m_harga_layanan");
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
			select * from m_harga_layanan
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('m_harga_layanan');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from('m_harga_layanan');
		$this->db->where('id_hrg_layanan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_harga_layanan', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('m_harga_layanan', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_hrg_layanan', $id);
		$this->db->delete('m_harga_layanan');
	}


}
