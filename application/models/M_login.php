<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_login extends CI_Model {

		public function cek_user($userid,$password) {
			$query = $this->db->get_where('m_user',['id_user'=>$userid,'password'=>$password,'status_user'=>'A']);
			if($query->num_rows() > 0 ){
				return true;
			}else{
				return false;
			}
		}

		function isLogin(){
			if($this->session->userdata('isLogin') != true) redirect('auth');
		}

		function target_today(){
			$date=date('MY');
			$query=$this->db->query("select * from m_target where periode='$date'");
			return $query->row();
		}

		function get_cabang($userid){
			$date=date('MY');
			$query=$this->db->query("select kd_cabang from m_user where id_user='$userid'");
			return $query->row();
		}

		function get_akses($userid){
			$date=date('MY');
			$query=$this->db->query("select akses from m_user where id_user='$userid'");
			return $query->row();
		}

		function get_nmcabang($kd_cabang){
			$date=date('MY');
			$query=$this->db->query("select nm_cabang from m_cabang where kd_cabang='$kd_cabang'");
			return $query->row();
		}


	}

?>
