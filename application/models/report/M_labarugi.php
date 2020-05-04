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
}
