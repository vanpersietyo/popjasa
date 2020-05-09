<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_labarugi extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function uang_keluar($tgl1,$tgl2){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT nm_rekbiaya,sum(harga) as pengeluaran,keterangan
		FROM v_pengeluaran
		WHERE kd_cabang='$cabang'
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
        and id_jns_rekbiaya not in ('HPP01','HPP02','ZIS')
		GROUP BY nm_rekbiaya
			");
        return $query->result();
    }

    public function zis($tgl1,$tgl2){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT nm_rekbiaya,sum(harga) as pengeluaran,keterangan
		FROM v_pengeluaran
		WHERE kd_cabang='$cabang'
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
        and id_jns_rekbiaya in ('ZIS')
		GROUP BY nm_rekbiaya
			");
        return $query->result();
    }

    public function uang_masuk($tgl1,$tgl2,$param){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT *
		FROM v_paybycustomers
		WHERE kd_cabang='$cabang'
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
		and st_project='$param'
			");
        return $query->result();
    }

    public function pemasukanProject($tgl1,$tgl2,$param){

        $query = $this->db->query('
            SELECT
              `a`.`id_project`    AS `id_project`,
              `a`.`st_project`    AS `st_project`,
              `a`.`kd_cabang`     AS `kd_cabang`,
              `a`.`id_layanan`    AS `id_layanan`,
              `a`.`nama_layanan`  AS `nama_layanan`,
              `a`.`harga`         AS `harga`,
              `a`.`hpp`           AS `hpp`,
              `a`.`id_customer`   AS `id_customer`,
              `a`.`nm_customer`   AS `nm_customer`,
              `c`.`nm_perusahaan` AS `nm_perusahaan`,
              COALESCE(SUM(`a`.`harga_jual`),0) AS `profit`,
              COUNT(`a`.`id_project`) AS `jml_order`,
              COALESCE(SUM(`b`.`jumlah_pay`),0) AS `jumlah_byr`,
              `a`.`keterangan`    AS `keterangan`,
              `a`.`input_by`      AS `input_by`,
              `a`.`tgl_input`     AS `tgl_input`
            FROM ((`popjasa`.`v_project` `a`
                LEFT JOIN (SELECT
                             `popjasa`.`trs_pembayaran`.`id_project` AS `id_project`,
                             SUM(`popjasa`.`trs_pembayaran`.`jumlah_pay`) AS `jumlah_pay`
                           FROM `popjasa`.`trs_pembayaran`
                           GROUP BY `popjasa`.`trs_pembayaran`.`id_project`) `b`
                  ON (`b`.`id_project` = `a`.`id_project`))
               JOIN `popjasa`.`m_customer` `c`
                 ON (`c`.`id_customer` = `a`.`id_customer`))
                 WHERE DATE(a.`tgl_input`) >= ? AND DATE(a.`tgl_input`) <= ? and `a`.`st_project` = ?
            GROUP BY `a`.`id_customer`
        ',[$tgl1,$tgl2,$param]);
        return $query ? $query->result() : [];
    }

    function select_karyawan(){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT *
		FROM m_karyawan
		WHERE kd_cabang='$cabang' and status_karyawan=1
			");
        return $query->result();
    }

    function select_potongan($id){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    SELECT sum(jumlah) as potongan
            FROM trs_hrd_potongan_karyawan
            WHERE id_karyawan='$id'
			");
        return $query->row();
    }

    function selectGaji($id){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    SELECT sum(jml_gaji) as gaji
            FROM trs_hrd_gaji
            WHERE id_karyawan='$id' and year(tgl_gaji) = ? and month(tgl_gaji) = ?
			",[date('Y'),date('m')]);
        return $query->row() ? $query->row()->gaji : 0;
    }

    function select_tunjangan($id){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    SELECT sum(jumlah) as tunjangan
            FROM trs_hrd_tunjangan_karyawan
            WHERE id_karyawan='$id'
			");
        return $query->row();
    }

    function select_bonus($id){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    SELECT sum(jumlah_bonus) as bonus
            FROM trs_hrd_bonus_karyawan
            WHERE id_karyawan='$id'
			");
        return $query->row();
    }

    function v_paybyproject($id){
        $query=$this->db->query("
		    SELECT *
            FROM v_paybyproject
            WHERE id_project='$id'
			");
        return $query->result();
    }

    function trs_pembayaran($id){
        $query=$this->db->query("
		    SELECT *
            FROM trs_pembayaran
            WHERE id_project='$id'
			");
        return $query->result();
    }

//    Fungsi Adit
//    public function uang_masuk($tgl1,$tgl2,$param){
//        $cabang=$this->session->userdata('cabang');
//        $query=$this->db->query("
//		SELECT *
//		FROM v_paybycustomers
//		WHERE kd_cabang='$cabang'
//		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
//		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
//		and st_project='$param'
//			");
//        return $query->result();
//    }
    public function select_gaji($id_karyawan)
    {

    }
}
