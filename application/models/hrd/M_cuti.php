<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cuti extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_data(){
			$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,c.nama_jabatan,b.jns_kelamin,b.status_karyawan,b.jml_piutang,b.jml_bayar
		from m_karyawan b,m_jabatan c
		where b.id_jabatan=c.id_jabatan and b.kd_cabang='$cabang'
			");
		return $query->result();
	}

	public function get_detail(){
		$user=$this->session->userdata('yangLogin');
    $date=date("Y-m-d");
		$query=$this->db->query("
    select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,
		c.tgl_cuti,c.tgl_cuti2,c.keterangan,c.jml_cuti,c.id_cuti,c.st_konfirmasi
		from m_karyawan b,trs_hrd_cuti c
		where b.id_karyawan=c.id_karyawan
			");
		return $query->result();
	}

  function count_filtered_detail()
	{
    $user=$this->session->userdata('yangLogin');
    $date=date("Y-m-d");
    $query=$this->db->query("
    select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.status as status_masuk,c.tgl_absen,c.id_absen
    from m_karyawan b,trs_hrd_absensi c
    where b.id_karyawan=c.id_karyawan and tgl_absen2='$date'
      ");
		return $query->num_rows();
	}

	public function count_all_detail()
	{
    $user=$this->session->userdata('yangLogin');
    $date=date("Y-m-d");
		$query=$this->db->query("
    select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.status as status_masuk,c.tgl_absen,c.id_absen
		from m_karyawan b,trs_hrd_absensi c
		where b.id_karyawan=c.id_karyawan and tgl_absen2='$date'
			");
    return $query->num_rows();
	}

	public function get_history($id){
		$query=$this->db->query("
		select *
		from kartu_piutang_karyawan
			");
		return $query->result();
	}

  function count_filtered_history($id)
	{
		$query=$this->db->query("
		select *
		from kartu_piutang_karyawan
			");
		return $query->num_rows();
	}

	public function count_all_history($id)
	{
		$query=$this->db->query("
		select *
		from kartu_piutang_karyawan
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
		$q = $this->db->query("select MAX(RIGHT(id_cuti,5)) as kd_max from trs_hrd_cuti");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "CTI-$tahun$bulan".$kd;
	}


	function count_filtered()
	{
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,c.nama_jabatan,b.jns_kelamin,b.status_karyawan,b.jml_piutang,b.jml_bayar
		from m_karyawan b,m_jabatan c
		where b.id_jabatan=c.id_jabatan and b.kd_cabang='$cabang'
		");
		return $query->num_rows();
	}

	public function count_all()
	{
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,c.nama_jabatan,b.jns_kelamin,b.status_karyawan,b.jml_piutang,b.jml_bayar
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

	public function get_by_id_cuti($TGL01,$TGL02,$id_karyawan)
	{
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select *
		from trs_hrd_cuti a, m_karyawan b
		where a.id_karyawan=b.id_karyawan
		and STR_TO_DATE(a.tgl_cuti,'%Y-%m-%d') >= DATE('$TGL01')
		and STR_TO_DATE(a.tgl_cuti,'%Y-%m-%d') <= DATE('$TGL02')
		and b.kd_cabang='$cabang'
		and a.id_karyawan='$id_karyawan'
		order by a.id_karyawan
		");
		return $query->result();
	}

  public function get_by_id_absensi_m($id,$status){
		$date=date("Y-m-d");
		$query=$this->db->query("select * from trs_hrd_absensi where id_karyawan='$id' and status='$status' and tgl_absen2='$date' ");
		return $query->num_rows();
	}


	public function save($data)
	{
		$this->db->insert('m_karyawan', $data);
		return $this->db->insert_id();
	}

	public function update($data)	{
    $this->db->insert('trs_hrd_cuti', $data);
		return $this->db->affected_rows();
	}

	public function update_delete($where, $data)
	{
		$this->db->update('m_karyawan', $data, $where);
		return $this->db->affected_rows();
	}

	public function konfirmasi($where, $data)
	{
		$this->db->update('trs_hrd_piutang_karyawan', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_cuti', $id);
		$this->db->delete('trs_hrd_cuti');

	}

	public function konfirmasi_by_id($where, $data)
	{
		$this->db->update('trs_hrd_cuti', $data, $where);
		return $this->db->affected_rows();
	}


}
