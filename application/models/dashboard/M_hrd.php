<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hrd extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_totkaryawan(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		    select * from m_karyawan where kd_cabang='$cabang'
			");
		return $query->num_rows();
	}

  public function get_totkaryawan_kerja(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		    select * from m_karyawan where kd_cabang='$cabang' and status_karyawan='1'
			");
		return $query->num_rows();
	}

  public function get_totkaryawan_resign(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		    select * from m_karyawan where kd_cabang='$cabang' and status_karyawan='0'
			");
		return $query->num_rows();
	}

  public function get_piutang(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select sum(b.jml_piutang-b.jml_bayar) as sisa_piutang,sum(b.jml_bayar) as jumlah_bayar
		from m_karyawan b,m_jabatan c
		where b.id_jabatan=c.id_jabatan and b.kd_cabang='$cabang'
			");
		return $query->row();
	}



}
