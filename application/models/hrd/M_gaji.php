<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gaji extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,c.nama_jabatan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,b.jml_gaji,b.updated_gaji,updated_gaji_by,d.nm_bank
		from m_karyawan b,m_jabatan c, bank d
		where b.id_jabatan=c.id_jabatan and b.kd_bank=d.kd_bank and b.kd_cabang='$cabang'
			");
		return $query->result();
	}

  public function get_history($id){
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jml_gaji,c.updated_gaji,c.updated_gaji_by,d.nm_bank
		from m_karyawan b,trs_hrd_gaji c, bank d
		where b.id_karyawan=c.id_karyawan and b.kd_bank=d.kd_bank and b.id_karyawan='$id'
			");
		return $query->result();
	}

  function count_filtered_history($id)
	{
    $query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jml_gaji,c.updated_gaji,c.updated_gaji_by
		from m_karyawan b,trs_hrd_gaji c
		where b.id_karyawan=c.id_karyawan and b.id_karyawan='$id'
			");
		return $query->num_rows();
	}

	public function count_all_history($id)
	{
    $query=$this->db->query("
    select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jml_gaji,c.updated_gaji,c.updated_gaji_by
    from m_karyawan b,trs_hrd_gaji c
    where b.id_karyawan=c.id_karyawan and b.id_karyawan='$id'
      ");
    return $query->num_rows();
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
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,c.nama_jabatan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,b.jml_gaji,b.updated_gaji,updated_gaji_by
		from m_karyawan b,m_jabatan c
		where b.id_jabatan=c.id_jabatan and b.kd_cabang='$cabang'
			");
		return $query->num_rows();
	}

	public function count_all()
	{
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,c.nama_jabatan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,b.jml_gaji,b.updated_gaji,updated_gaji_by
		from m_karyawan b,m_jabatan c
		where b.id_jabatan=c.id_jabatan and b.kd_cabang='$cabang'
			");
		return $query->num_rows();
	}

	public function get_by_id($id)
	{
		$this->db->from('m_karyawan');
		$this->db->where('id_karyawan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('m_karyawan', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data,$data_insert)
	{
    // var_dump($data);
    // exit();
    $this->db->insert('trs_hrd_gaji', $data_insert);
		$this->db->update('m_karyawan', $data, $where);

		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_karyawan', $id);
		$this->db->delete('m_karyawan');
	}

	//Laporan
	public function get_bonus($id,$period)
	{
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select a.id_karyawan,b.nama_karyawan,a.periode,a.jumlah_bonus,a.keterangan,a.tgl_input
				from trs_hrd_bonus_karyawan a, m_karyawan b
				where a.id_karyawan=b.id_karyawan
				and a.periode='$period'
				and a.id_karyawan='$id'
			");
		return $query->result();
	}

	public function get_jumlah_bonus($id,$period)
	{
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select a.id_karyawan,b.nama_karyawan,a.periode,sum(a.jumlah_bonus) as bonus,a.keterangan,a.tgl_input
				from trs_hrd_bonus_karyawan a, m_karyawan b
				where a.id_karyawan=b.id_karyawan
				and a.periode='$period'
				and a.id_karyawan='$id'
			");
		return $query->row();
	}

	public function get_all_karyawan(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select * from m_karyawan where kd_cabang='$cabang'
			");
		return $query->result();
	}



}
