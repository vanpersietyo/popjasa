<?php


class Today extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['target']=$this->M_login->target_today();
		var_dump($data);
		exit();
		$data['pages']='dashboard/monthly';
		$this->load->view('layout',$data);
	}

	// function data_stock_minimum(){
	// 	$data['data']=$this->M_dashboard->data_stock_minimum();
	// 	$data['pages']='dashboard/pusat/stock_minimum/index';
	// 	$this->load->view('layout',$data);
	// }

	// function data_stock_minimum_retur(){
	// 	$data['data']=$this->M_dashboard->data_stock_minimum_retur();
	// 	$data['pages']='dashboard/pusat/stock_minimum_retur/index';
	// 	$this->load->view('layout',$data);
	// }

	// function data_aset_gudang(){
	// 	$data['jumlah_aset']=$this->M_dashboard->total_aset_gudang();
	// 	$data['pages']='dashboard/pusat/data_aset_gudang/index';
	// 	$this->load->view('layout',$data);
	// }

	// function data_aset_gudang_retur(){
	// 	$data['jumlah_aset_retur']=$this->M_dashboard->total_aset_gudang_retur();
	// 	$data['pages']='dashboard/pusat/data_aset_gudang_retur/index';
	// 	$this->load->view('layout',$data);
	// }

	// function data_giro_masuk(){
	// 	$data['total_giro_masuk']=$this->M_dashboard->total_giro_masuk();
	// 	$data['pages']='dashboard/pusat/data_giro_masuk/index';
	// 	$this->load->view('layout',$data);
	// }

	// function data_giro_keluar(){
	// 	$data['total_giro_keluar']=$this->M_dashboard->total_giro_keluar();
	// 	$data['pages']='dashboard/pusat/data_giro_keluar/index';
	// 	$this->load->view('layout',$data);
	// }

	// function data_piutang(){
	// 	$data['total_piutang']=$this->M_dashboard->total_piutang();
	// 	$outlet=$this->M_dashboard->data_outlet();
	// 	foreach ($outlet as $data) {
	// 		$KD_OUTLET=$data->KD_OUTLET;
	// 		$PIUTANG=$this->M_dashboard->find_piutang($KD_OUTLET);
	// 		$this->M_dashboard->update_piutang($KD_OUTLET,$PIUTANG);

	// 	}

	// 	$data['pages']='dashboard/pusat/data_piutang/index';
	// 	$this->load->view('layout',$data);
	// }

	// 	function data_hutang(){
	// 	$data['total_hutang']=$this->M_dashboard->total_hutang();
	// 	$data['pages']='dashboard/pusat/data_hutang/index';
	// 	$this->load->view('layout',$data);
	// }


}
