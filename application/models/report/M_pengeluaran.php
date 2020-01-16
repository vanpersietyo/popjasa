<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_rekap($tgl1,$tgl2){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT nm_rekbiaya,sum(harga) as pengeluaran,keterangan
		FROM v_pengeluaran
		WHERE kd_cabang='$cabang'
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
		GROUP BY nm_rekbiaya
			");
        return $query->result();
    }

    public function get_log($tgl1,$tgl2){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT nm_rekbiaya,harga as pengeluaran,keterangan
		FROM v_pengeluaran
		WHERE kd_cabang='$cabang'
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
		ORDER BY tgl_input desc
			");
        return $query->result();
    }

}
