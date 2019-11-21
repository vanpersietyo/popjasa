<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_piutang_karyawan extends CI_Model {
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

  function get_jml_piutang($id){
    $query=$this->db->query("SELECT jml_piutang,jml_bayar FROM m_karyawan WHERE id_karyawan='$id'");
    return $query->row();
  }


		public function get_bayar($id){
			$user=$this->session->userdata('yangLogin');
			$query=$this->db->query("
			select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_piutang,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_piut_krywn
			from m_karyawan b,trs_hrd_piutang_karyawan c
			where b.id_karyawan=c.id_karyawan and c.id_piut_krywn='$id'
				");
			return $query->row();
		}

		public function get_total($id){
			$user=$this->session->userdata('yangLogin');
			$query=$this->db->query("
			select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,b.jml_piutang,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_piut_krywn
			from m_karyawan b,trs_hrd_piutang_karyawan c
			where b.id_karyawan=c.id_karyawan and c.id_piut_krywn='$id'
				");
			return $query->row();
		}

	public function get_detail(){
		$user=$this->session->userdata('yangLogin');
		$query=$this->db->query("
		select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_piutang,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_piut_krywn
		from m_karyawan b,trs_hrd_piutang_karyawan c
		where b.id_karyawan=c.id_karyawan and c.input_by='$user' and c.st_data=0
			");
		return $query->result();
	}

  function count_filtered_detail()
	{
			$user=$this->session->userdata('yangLogin');
    $query=$this->db->query("
    select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_piutang,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_piut_krywn
    from m_karyawan b,trs_hrd_piutang_karyawan c
    where b.id_karyawan=c.id_karyawan  and c.input_by='$user' and c.st_data=0
			");
		return $query->num_rows();
	}

	public function count_all_detail()
	{
		$user=$this->session->userdata('yangLogin');
    $query=$this->db->query("
    select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_piutang,c.tgl_input,c.input_by,c.jumlah_bayar,c.st_data,c.id_piut_krywn
    from m_karyawan b,trs_hrd_piutang_karyawan c
    where b.id_karyawan=c.id_karyawan  and c.input_by='$user' and c.st_data=0
      ");
    return $query->num_rows();
	}

  // public function get_history($id){
	// 	$query=$this->db->query("
	// 	select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.jumlah_piutang,c.tgl_input,c.input_by,c.jumlah_bayar
	// 	from m_karyawan b,trs_hrd_piutang_karyawan c
	// 	where b.id_karyawan=c.id_karyawan and b.id_karyawan='$id'
	// 		");
	// 	return $query->result();
	// }

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
		$q = $this->db->query("select MAX(RIGHT(id_piut_krywn,5)) as kd_max from trs_hrd_piutang_karyawan");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "PKR-$tahun$bulan".$kd;
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

	public function save($data)
	{
		$this->db->insert('m_karyawan', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data,$data_insert,$kartu)
	{
    // var_dump($data);
    // exit();
    $this->db->insert('trs_hrd_piutang_karyawan', $data_insert);
		$this->db->insert('kartu_piutang_karyawan', $kartu);
		$this->db->update('m_karyawan', $data, $where);

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
		$this->db->where('id_piut_krywn', $id);
		$this->db->delete('trs_hrd_piutang_karyawan');

		$this->db->where('id_trans', $id);
		$this->db->delete('kartu_piutang_karyawan');
	}


}
