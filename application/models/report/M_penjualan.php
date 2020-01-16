<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_customer($tgl1,$tgl2){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT *
		FROM v_paybycustomers
		WHERE kd_cabang='$cabang'
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
			");
        return $query->result();
    }

    public function get_project($tgl1,$tgl2){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		SELECT *
		FROM v_paybyproject
		WHERE kd_cabang='$cabang'
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') >= DATE('$tgl1')
		and STR_TO_DATE(tgl_input,'%Y-%m-%d') <= DATE('$tgl2')
		ORDER BY tgl_input desc
			");
        return $query->result();
    }

}
