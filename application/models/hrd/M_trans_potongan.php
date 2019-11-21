<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trans_potongan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


  function get_potongan(){
    $cabang=$this->session->userdata('cabang');
    $query=$this->db->query("
    select * FROM m_potongan
      ");
    return $query->result();
  }

  public function get_jabatan(){
		$query=$this->db->query("
			select * from m_jabatan
			");
		return $query->result();
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


	public function get_detail(){
		$user=$this->session->userdata('yangLogin');
		$m=date('m');
		$y=date('Y');
		$query=$this->db->query("
    select a.id_trans_potongan,b.nama_karyawan,c.keterangan,a.jumlah,a.tgl_trans,a.operator,a.st_data
      from trs_hrd_potongan_karyawan a
      join m_karyawan b on a.id_karyawan=b.id_karyawan
      join m_potongan c on a.id_potongan=c.id_potongan
				where MONTH(a.tgl_trans) = '$m' and YEAR(a.tgl_trans)='$y'
		");
		return $query->result();
	}

	public function get_konf(){
		$user=$this->session->userdata('yangLogin');
		$m=date('m');
		$y=date('Y');
    $query=$this->db->query("
    select a.id_trans_potongan,b.nama_karyawan,c.keterangan,a.jumlah,a.tgl_trans,a.operator,a.st_data
      from trs_hrd_potongan_karyawan a
      join m_karyawan b on a.id_karyawan=b.id_karyawan
      join m_potongan c on a.id_potongan=c.id_potongan
        where MONTH(a.tgl_trans) = '$m' and YEAR(a.tgl_trans)='$y'
    ");
    $jml=$this->db->query("
    select a.id_trans_potongan,b.nama_karyawan,c.keterangan,a.jumlah,a.tgl_trans,a.operator,a.st_data
      from trs_hrd_potongan_karyawan a
      join m_karyawan b on a.id_karyawan=b.id_karyawan
      join m_potongan c on a.id_potongan=c.id_potongan
        where MONTH(a.tgl_trans) = '$m' and YEAR(a.tgl_trans)='$y'
    ");
    if ($jml<=0) {
      $dt_conf = array('st_data' => 0, );
      return $dt_conf;
    }else {
      return $query->row();
    }

	}

  function count_filtered_detail()
	{
			$user=$this->session->userdata('yangLogin');
			$m=date('m');
			$y=date('Y');
      $query=$this->db->query("
      select a.id_trans_potongan,b.nama_karyawan,c.keterangan,a.jumlah,a.tgl_trans,a.operator,a.st_data
        from trs_hrd_potongan_karyawan a
        join m_karyawan b on a.id_karyawan=b.id_karyawan
        join m_potongan c on a.id_potongan=c.id_potongan
  				where MONTH(a.tgl_trans) = '$m' and YEAR(a.tgl_trans)='$y'
  		");
		return $query->num_rows();
	}

	public function count_all_detail()
	{
		$user=$this->session->userdata('yangLogin');
		$m=date('m');
		$y=date('Y');
    $query=$this->db->query("
    select a.id_trans_potongan,b.nama_karyawan,c.keterangan,a.jumlah,a.tgl_trans,a.operator,a.st_data
      from trs_hrd_potongan_karyawan a
      join m_karyawan b on a.id_karyawan=b.id_karyawan
      join m_potongan c on a.id_potongan=c.id_potongan
				where MONTH(a.tgl_trans) = '$m' and YEAR(a.tgl_trans)='$y'
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

	public function save_detail($data_insert)
	{
    $this->db->insert('trs_hrd_potongan_karyawan', $data_insert);
		return $this->db->affected_rows();
	}



	public function konfirmasi($where, $data){
		$this->db->update('trs_hrd_potongan_karyawan', $data);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id){
		$this->db->where('id_trans_potongan', $id);
		$this->db->delete('trs_hrd_potongan_karyawan');
	}


}
