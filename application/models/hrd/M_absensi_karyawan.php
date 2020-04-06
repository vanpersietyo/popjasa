<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi_karyawan extends CI_Model {
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
    select b.id_karyawan,b.nama_karyawan,b.jns_kelamin,b.keterangan,b.tgl_input,b.inputby,b.status_karyawan,c.status as status_masuk,c.tgl_absen,c.id_absen
		from m_karyawan b,trs_hrd_absensi c
		where b.id_karyawan=c.id_karyawan and tgl_absen2='$date'
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
		$q = $this->db->query("select MAX(RIGHT(id_absen,5)) as kd_max from trs_hrd_absensi");
		$kd = "";
		if($q->num_rows()>0){
				foreach($q->result() as $k){
						$tmp = ((int)$k->kd_max)+1;
						$kd = sprintf("%05s",$tmp);
				}
		}else{
				$kd = "00001";
		}
		return "ABS-$tahun$bulan".$kd;
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
    $this->db->insert('trs_hrd_absensi', $data);
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

	//report query

	function report_absensi($TGL01,$TGL02){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select *
		from trs_hrd_absensi a, m_karyawan b
		where a.id_karyawan=b.id_karyawan
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') >= DATE('$TGL01')
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') <= DATE('$TGL02')
		and b.kd_cabang='$cabang'
		order by a.id_karyawan
		");
		return $query->result();
	}

    function report_cutii($TGL01,$TGL02){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT *,a.keterangan as alasan
        FROM trs_hrd_cuti a, m_karyawan b
        WHERE a.id_karyawan=b.id_karyawan
        AND STR_TO_DATE(a.tgl_cuti2,'%Y-%m-%d') >= DATE('2020-04-01')
        AND STR_TO_DATE(a.tgl_cuti2,'%Y-%m-%d') <= DATE('2020-04-30')
        AND b.kd_cabang='SBY'
        ORDER BY a.id_karyawan
		");
        return $query->result();
    }



	function report_absensi_id($TGL01,$TGL02,$id){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select *
		from trs_hrd_absensi a, m_karyawan b
		where a.id_karyawan=b.id_karyawan
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') >= DATE('$TGL01')
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') <= DATE('$TGL02')
		and b.kd_cabang='$cabang'
		and a.id_karyawan='$id'
		order by a.id_karyawan
		");
		return $query->result();
	}

	function rpt_absensi_group_karyawan($TGL01,$TGL02){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select a.id_karyawan,b.nama_karyawan,a.status,a.tgl_absen,count(a.id_karyawan) as jml_masuk
			from trs_hrd_absensi a, m_karyawan b
			where a.id_karyawan=b.id_karyawan
			and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') >= DATE('$TGL01')
			and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') <= DATE('$TGL02')
			and b.kd_cabang='$cabang'
			group by a.id_karyawan
		");
		return $query->result();
	}

	function rpt_absensi_group_karyawan_id($TGL01,$TGL02,$id){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select a.id_karyawan,b.nama_karyawan,a.status,a.tgl_absen,count(a.id_karyawan) as jml_masuk
			from trs_hrd_absensi a, m_karyawan b
			where a.id_karyawan=b.id_karyawan
			and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') >= DATE('$TGL01')
			and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') <= DATE('$TGL02')
			and b.kd_cabang='$cabang'
			and b.id_karyawan='$id'
			group by a.id_karyawan
		");
		return $query->result();
	}

	function rpt_absensi_group_jmlmasuk($TGL01,$TGL02,$id){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select a.id_karyawan,b.nama_karyawan,count(a.id_karyawan) as jml_masuk
		from trs_hrd_absensi a
		JOIN m_karyawan b ON a.id_karyawan=b.id_karyawan
		where a.id_karyawan=b.id_karyawan
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') >= DATE('$TGL01')
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') <= DATE('$TGL02')
		and status='M'
		and b.kd_cabang='$cabang'
		and a.id_karyawan='$id'
		");
		return $query->row();
	}

	function rpt_absensi_group_jmlplg($TGL01,$TGL02,$id){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select a.id_karyawan,b.nama_karyawan,count(a.id_karyawan) as jml_pulang
		from trs_hrd_absensi a
		JOIN m_karyawan b ON a.id_karyawan=b.id_karyawan
		where a.id_karyawan=b.id_karyawan
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') >= DATE('$TGL01')
		and STR_TO_DATE(a.tgl_absen2,'%Y-%m-%d') <= DATE('$TGL02')
		and status='P'
		and b.kd_cabang='$cabang'
		and a.id_karyawan='$id'
		");
		return $query->row();
	}

	function rpt_absensi_cuti($TGL01,$TGL02,$id){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select a.id_karyawan,b.nama_karyawan,count(a.id_karyawan) as jml_cuti
			from trs_hrd_cuti a
			JOIN m_karyawan b ON a.id_karyawan=b.id_karyawan
			where a.id_karyawan=b.id_karyawan
			and STR_TO_DATE(a.tgl_cuti,'%Y-%m-%d') >= DATE('$TGL01')
			and STR_TO_DATE(a.tgl_cuti,'%Y-%m-%d') <= DATE('$TGL02')
			and b.kd_cabang='$cabang'
			and a.id_karyawan='$id'
		");
		return $query->row();
	}

	function rpt_absensi_harikerja($PRD_BLTH){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select * from m_harikerja where periode='$PRD_BLTH'
		");
		return $query->row();
	}

	function lookup_karyawan(){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select * from m_karyawan where kd_cabang='$cabang'
		");
		return $query->result();
	}

	function karyawan_id($id){
		$cabang=$this->session->userdata('cabang');
		$query=$this->db->query("
		select * from v_karyawan where id_karyawan='$id'
		");
		return $query->row();
	}

	function jml_kerja($periode){
		$query=$this->db->query("
		select * from m_harikerja where periode='$periode'
		");
		return $query->row();
	}

    function jml_cuti_id($id,$tgl1,$tgl2){
        $query=$this->db->query("
        SELECT
		sum(jml_cuti) AS jml
	    FROM
		trs_hrd_cuti
	    WHERE
		id_karyawan = '$id' and st_konfirmasi=1
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
		");
        return $query->row();
    }

	function get_tunjangan(){
		$query=$this->db->query("
		select * from m_tunjangan
		");
		return $query->result();
	}

	function get_jumlah_tunjangan($id,$karyawan,$tgl_awal){
		$date_1=$tgl_awal;
		$date_form=date("m", strtotime($tgl_awal));
		$query=$this->db->query("
		select sum(jumlah) as tunjangan from trs_hrd_tunjangan_karyawan
		where id_karyawan='$karyawan' and id_tunjangan='$id' and MONTH(tgl_trans)='$date_form' and st_data=1
		");
		return $query->row();
	}

	function get_potongan(){
		$query=$this->db->query("
		select * from m_potongan
		");
		return $query->result();
	}

	function get_jumlah_potongan($id,$karyawan,$tgl_awal){
		$date_1=$tgl_awal;
		$date_form=date("m", strtotime($tgl_awal));
		$query=$this->db->query("
		select sum(jumlah) as potongan from trs_hrd_potongan_karyawan
		where id_karyawan='$karyawan' and id_potongan='$id' and MONTH(tgl_trans)='$date_form' and st_data=1
		");
		return $query->row();
	}


}
