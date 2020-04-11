<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dir extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tot_order(){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    select count(id_project)  as tot_order
		    from trs_project
		    where st_data='1' and kd_cabang='$cabang'
			");
        return $query->row();
    }

    function tot_onprogress(){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    SELECT count(b.Project_id) as on_progress
                FROM `v_project_logs` b
                JOIN trs_project a ON a.id_project=b.Project_id
                WHERE b.Status_log!='finish' and a.kd_cabang='$cabang'
                GROUP BY b.Project_id
			");
        return $query->row();
    }

    function tot_finish(){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    SELECT count(b.Project_id) as finish
                FROM `v_project_logs` b
                JOIN trs_project a ON a.id_project=b.Project_id
                WHERE b.Status_log='finish' and a.kd_cabang='$cabang'
                GROUP BY b.Project_id
			");
        return $query->row();
    }

    function cust_contacted(){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    select count(id_customer)  as contacted
		    from m_customer
		    where kd_cabang='$cabang' and status='1'
			");
        return $query->row();
    }

    function cust_deal(){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		   select count(id_customer)  as contacted
		    from m_customer
		    where kd_cabang='$cabang' and status='2'
			");
        return $query->row();
    }

    function cust_lost(){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
		    select count(id_customer)  as contacted
		    from m_customer
		    where kd_cabang='$cabang' and status='3'
			");
        return $query->row();
    }

    function omzet_group_day(){
      $cabang=$this->session->userdata('cabang');
      $query=$this->db->query("
        SELECT SUM(profit) AS OMZET,STR_TO_DATE(tgl_input,'%Y-%m-%d') AS PERIODE
        FROM v_paybyproject
        WHERE STR_TO_DATE(tgl_input,'%Y-%m')=DATE('2020-03-00')
        GROUP BY STR_TO_DATE(tgl_input,'%Y-%m-%d')
      ");
      return $query->result();
    }

    function omzet_group_month($month){
      $cabang=$this->session->userdata('cabang');
      $query=$this->db->query("
        SELECT SUM(profit) AS OMZET,STR_TO_DATE(tgl_input,'%Y-%m-%d') AS PERIODE
        FROM v_paybyproject
        WHERE STR_TO_DATE(tgl_input,'%Y-%m')=DATE('$month')
        GROUP BY STR_TO_DATE(tgl_input,'%Y-%m')
      ");
      if ($query->num_rows() >= '1') {
  			$get = $query->row();
  			return $get->OMZET;
  		} else {
  			return 0;
  		}

    }

    function penjualan_popjasa(){
      $cabang=$this->session->userdata('cabang');
      $date=date('Y-m-00');
      $query=$this->db->query("
      SELECT STR_TO_DATE(tgl_input,'%Y-%m-%d') AS PERIODE,SUM(profit) AS OMZET,COUNT(id_layanan) as QTY
      FROM v_paybyproject
      WHERE STR_TO_DATE(tgl_input,'%Y-%m')=DATE('$date') AND st_project=1
      GROUP BY STR_TO_DATE(tgl_input,'%Y-%m-%d')
      ");
      return $query->result();
    }

    function penjualan_jasamurah(){
      $date=date('Y-m-00');
      $cabang=$this->session->userdata('cabang');
      $query=$this->db->query("
      SELECT STR_TO_DATE(tgl_input,'%Y-%m-%d') AS PERIODE,SUM(profit) AS OMZET,COUNT(id_layanan) as QTY
      FROM v_paybyproject
      WHERE STR_TO_DATE(tgl_input,'%Y-%m')=DATE('$date') AND st_project=2
      GROUP BY STR_TO_DATE(tgl_input,'%Y-%m-%d')
      ");
      return $query->result();
    }

    function outstanding_not_finish_findByMonth($month){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
        SELECT Periode, nm_customer, nama_layanan, jml_order, harga_jual, jumlah_pay, sisa
        FROM v_outstanding_doc_not_finish
        WHERE STR_TO_DATE(tgl_input,'%Y-%m')=DATE('$month')
        GROUP BY STR_TO_DATE(tgl_input,'%Y-%m')
      ");
        return $query->result();
    }

    function outstanding_finish_findByMonthFinish($month){
        $cabang=$this->session->userdata('cabang');
        $query=$this->db->query("
        SELECT Periode, nm_customer, nama_layanan, jml_order, harga_jual, jumlah_pay, sisa
        FROM v_outstanding_doc_finish
        WHERE STR_TO_DATE(tgl_input,'%Y-%m')=DATE('$month')
        GROUP BY STR_TO_DATE(tgl_input,'%Y-%m')
      ");
        return $query->result();
    }

    function outstanding_finish(){
        $date=date('Y-m-00');
        $cabang=$this->session->userdata('cabang');
        $sql ="
        SELECT Periode, nm_customer, nama_layanan, sum(jml_order) as qty, harga_jual, sum(jumlah_pay) as bayar, sum(sisa) as outstanding
        FROM v_outstanding_doc_not_finish
        WHERE DATE_FORMAT(tgl_input,'%Y-%m')='$date' and kd_cabang = '$cabang'
        GROUP BY nm_customer, nama_layanan
       ";
        $query=$this->db->query($sql);
        return $query->result();
    }

    function outstanding_not_finish(){
        $date=date('Y-m');
        $cabang=$this->session->userdata('cabang');
        $sql ="
        SELECT Periode, nm_customer, nama_layanan, sum(jml_order) as qty, harga_jual, sum(jumlah_pay) as bayar, sum(sisa) as outstanding
        FROM v_outstanding_doc_not_finish
        WHERE DATE_FORMAT(tgl_input,'%Y-%m')='$date' and kd_cabang = '$cabang'
        GROUP BY nm_customer, nama_layanan
       ";
        $query=$this->db->query($sql);
        return $query->result();
    }

}
