<?php


class Track extends CI_Controller{

	public function index(){
  //  $data['pages']='customer/search_track';
		$this->load->view('customer/search_track');
	}


	public function order(){
		$id=$this->input->post('id_inv');
    // $data['pages']='customer/tracking';
			$this->load->view('customer/tracking_order');
	}


}
