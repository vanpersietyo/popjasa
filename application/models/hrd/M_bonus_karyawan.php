<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bonus_karyawan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_data(){
		$date=strtoupper(date('MY'));

		$query=$this->db->query("
		SELECT a.id_karyawan,a.kd_cabang,a.id_jabatan,a.nama_karyawan,a.jml_gaji,a.updated_gaji,a.updated_gaji_by,a.keterangan_gaji,a.jml_piutang,a.jml_bayar,a.st_data,SUM(b.jumlah_bonus) AS total_bonus
	FROM m_karyawan a
	LEFT JOIN trs_hrd_bonus_karyawan b ON a.id_karyawan=b.id_karyawan
	GROUP BY a.id_karyawan

			");
		return $query->result();
	}

  function get_jml_piutang($id){
    $query=$this->db->query("SELECT jml_piutang,jml_bayar FROM m_karyawan WHERE id_karyawan='$id'");
    return $query->row();
  }

	public function get_detail(){
		$user=$this->session->userdata('yangLogin');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_bonus,c.tgl_input,c.input_by,c.st_data,c.id_bonus_krywn
		from m_karyawan b,trs_hrd_bonus_karyawan c
		where b.id_karyawan=c.id_karyawan and c.input_by='$user' and c.st_data=0
			");
		return $query->result();
	}

	public function get_bayar($id){
		$user=$this->session->userdata('yangLogin');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_bayar,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_pmbyrn_krywn
		from m_karyawan b,trs_hrd_pembayaran_karyawan c
		where b.id_karyawan=c.id_karyawan and c.id_pmbyrn_krywn='$id'
			");
		return $query->row();
	}

	public function get_total($id){
		$user=$this->session->userdata('yangLogin');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,.b.jml_bayar,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_pmbyrn_krywn
		from m_karyawan b,trs_hrd_pembayaran_karyawan c
		where b.id_karyawan=c.id_karyawan and c.id_pmbyrn_krywn='$id'
			");
		return $query->row();
	}

  function count_filtered_detail()
	{
			$user=$this->session->userdata('yangLogin');
			$query=$this->db->query("
			select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_bayar,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_pmbyrn_krywn
			from m_karyawan b,trs_hrd_pembayaran_karyawan c
			where b.id_karyawan=c.id_karyawan and c.input_by='$user' and c.st_data=0
				");
		return $query->num_rows();
	}

	public function count_all_detail()
	{
		$user=$this->session->userdata('yangLogin');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_bayar,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_pmbyrn_krywn
		from m_karyawan b,trs_hrd_pembayaran_karyawan c
		where b.id_karyawan=c.id_karyawan and c.input_by='$user' and c.st_data=0
			");
    return $query->num_rows();
	}

  public function get_history($user){
		$date=strtoupper(date('MY'));
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_bonus,c.tgl_input,c.input_by,c.st_data,c.id_bonus_krywn
		from m_karyawan b,trs_hrd_bonus_karyawan c
		where b.id_karyawan=c.id_karyawan and c.id_karyawan='$user' and c.periode='$date'
			");
		return $query->result();
	}

	public function get_total_bonus($id){
		$date=strtoupper(date('MY'));
		$query=$this->db->query("
		SELECT a.id_karyawan,a.kd_cabang,a.id_jabatan,a.nama_karyawan,a.jml_gaji,a.updated_gaji,a.updated_gaji_by,a.keterangan_gaji,a.jml_piutang,a.jml_bayar,a.st_data,SUM(b.jumlah_bonus) AS total_bonus,b.tgl_input,b.input_by
	FROM m_karyawan a
	LEFT JOIN trs_hrd_bonus_karyawan b ON a.id_karyawan=b.id_karyawan
	WHERE a.id_karyawan='$id' AND b.periode='$date'
	GROUP BY a.id_karyawan
			");
		return $query->row();
	}

  function count_filtered_history($user)
	{
			$date=strtoupper(date('MY'));
    $query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_bonus,c.tgl_input,c.input_by,c.st_data,c.id_bonus_krywn
		from m_karyawan b,trs_hrd_bonus_karyawan c
		where b.id_karyawan=c.id_karyawan and c.id_karyawan='$user' and c.periode='$date'
			");
		return $query->num_rows();
	}

	public function count_all_history($user)
	{
			$date=strtoupper(date('MY'));
    $query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_bonus,c.tgl_input,c.input_by,c.st_data,c.id_bonus_krywn
		from m_karyawan b,trs_hrd_bonus_karyawan c
		where b.id_karyawan=c.id_karyawan and c.id_karyawan='$user' and c.periode='$date'
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
		$q = $this->db->query("select MAX(RIGHT(id_bonus_krywn,5)) as kd_max from trs_hrd_bonus_karyawan");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "BNS-$tahun$bulan".$kd;
	}


	function count_filtered()
	{
		$query=$this->db->query("
		SELECT a.id_karyawan,a.kd_cabang,a.id_jabatan,a.nama_karyawan,a.jml_gaji,a.updated_gaji,a.updated_gaji_by,a.keterangan_gaji,a.jml_piutang,a.jml_bayar,a.st_data,SUM(b.jumlah_bonus) AS total_bonus
	FROM m_karyawan a
	LEFT JOIN trs_hrd_bonus_karyawan b ON a.id_karyawan=b.id_karyawan
	GROUP BY a.id_karyawan

			");
		return $query->num_rows();
	}

	public function count_all()
	{
    $query=$this->db->query("
		SELECT a.id_karyawan,a.kd_cabang,a.id_jabatan,a.nama_karyawan,a.jml_gaji,a.updated_gaji,a.updated_gaji_by,a.keterangan_gaji,a.jml_piutang,a.jml_bayar,a.st_data,SUM(b.jumlah_bonus) AS total_bonus
	FROM m_karyawan a
	LEFT JOIN trs_hrd_bonus_karyawan b ON a.id_karyawan=b.id_karyawan
	GROUP BY a.id_karyawan

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

	public function update($data_insert)
	{
    $this->db->insert('trs_hrd_bonus_karyawan', $data_insert);
		return $this->db->affected_rows();
	}

	public function update_delete($where, $data)
	{
		$this->db->update('m_karyawan', $data, $where);
		return $this->db->affected_rows();
	}

	public function konfirmasi($where, $data)
	{
		$this->db->update('trs_hrd_bonus_karyawan', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_bonus_krywn', $id);
		$this->db->delete('trs_hrd_bonus_karyawan');
	}


}
