<?php


class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('dashboard/M_hrd', 'M_hrd');
        $this->load->model('dashboard/M_dir', 'M_dir');
		$this->load->model('hrd/M_pembayaran_karyawan', 'M_pembayaran_karyawan');
		$this->M_login->isLogin();
	}

	public function index(){
	    $data['order']=$this->M_dir->tot_order();
        $data['progress']=$this->M_dir->tot_onprogress();
        $data['finish']=$this->M_dir->tot_finish();

        $data['cust_contacted']=$this->M_dir->cust_contacted();
        $data['cust_deal']=$this->M_dir->cust_deal();
        $data['cust_lost']=$this->M_dir->cust_lost();

		$data['target']=$this->M_login->target_today();
		$data['pages']='dashboard/chart';
		$this->load->view('layout',$data);
	}

	public function hrd(){
		$data['tot_karyawan']=$this->M_hrd->get_totkaryawan();
		$data['jml_piutang_karyawan']=$this->M_hrd->get_piutang();
		$data['tot_kerja']=$this->M_hrd->get_totkaryawan_kerja();
		$data['tot_resign']=$this->M_hrd->get_totkaryawan_resign();

		$data['pages']='dashboard/hrd';
		$this->load->view('layout',$data);
	}

	public function ajax_pembayaran()
	{
		$this->load->helper('url');

		$list = $this->M_pembayaran_karyawan->get_data();
		$data = array();

		foreach ($list as $d) {


			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
			$row[] = number_format($d->jml_piutang-$d->jml_bayar);
			$row[] = number_format($d->jml_bayar);



			//add html for action

			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_pembayaran_karyawan->count_all(),
						"recordsFiltered" => $this->M_pembayaran_karyawan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}
