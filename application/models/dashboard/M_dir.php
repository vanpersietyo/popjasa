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



}
