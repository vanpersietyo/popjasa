<?php


class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('dashboard/M_hrd', 'M_hrd');
        $this->load->model('dashboard/M_dir', 'M_dir');
				$this->load->model('report/M_labarugi', 'M_labarugi');
		$this->load->model('hrd/M_pembayaran_karyawan', 'M_pembayaran_karyawan');
		$this->M_login->isLogin();
	}

	public function index(){
		if ($this->session->userdata('akses_user')=='hrd') {
			$this->hrd();
		}else{
			$data['order']=$this->M_dir->tot_order();
        $data['progress']=$this->M_dir->tot_onprogress();
        $data['finish']=$this->M_dir->tot_finish();

        $data['cust_contacted']=$this->M_dir->cust_contacted();
        $data['cust_deal']=$this->M_dir->cust_deal();
        $data['cust_lost']=$this->M_dir->cust_lost();

		$data['target']=$this->M_login->target_today();
		//omzet
		$param=date('01-m-Y');
		$param2=date('31-m-Y');
		$TGL01=date("Y-m-d", strtotime($param));
		$TGL02=date("Y-m-d", strtotime($param2));
		$pj=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'1');
		foreach ($pj as $pj ) {
				$SUMPOPJASA[]=$pj->jumlah_byr;
		}
		$jm=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'2');
		foreach ($jm as $jm ) {
				$SUMJASAMURAH[]=$jm->jumlah_byr;
		}
		$data['omz_popjasa']=array_sum($SUMPOPJASA);
			$data['omz_jasamurah']=array_sum($SUMJASAMURAH);
			$data['omzet']=array_sum($SUMJASAMURAH)+array_sum($SUMPOPJASA);


			$penjualan_days					= $this->M_dir->omzet_group_day();
			$x=1;
			$jml_penjualan 	= [];
			$jum_data 		= [];
			$tgl_penjualan 	= [];
			foreach ($penjualan_days as $tgl) {
				$date_period	= date('d', strtotime($tgl->PERIODE));
				$tgl_penjualan[]= number_format($date_period);
				$jml_penjualan[]= $tgl->OMZET;
				$jum_data[]		= $x;
				$x				= $x+1;
			}

			if (array_sum($jum_data)==1) {
				$a = number_format($tgl_penjualan[0]);
				$b = $jml_penjualan[0];
			}else {
				$a = implode(",",$tgl_penjualan);
				$b = implode(",",$jml_penjualan);
			}
			$data['tgl_penjualan']=$a;
			$data['jml_penjualan']=$b;

			for ($i=1; $i <= 12; $i++){
				$d_month 	= $i < 10 ? sprintf("%02d", $i) : $i;
				$date_month	= date("Y-$d_month-00");
				$omz_penjualan_month[]=$this->M_dir->omzet_group_month($date_month);
			};

			$data['omz_penjualan_month']	= implode(",",$omz_penjualan_month);


		$data['pages']='dashboard/chart';
		$this->load->view('layout',$data);
		}

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

	function ajax_penjualan_popjasa(){
		$list 	= $this->M_dir->penjualan_popjasa();
		$data 	= [];
		$no		= 1;
		foreach ($list as $d) {
			$row 	= [];
			$qty	= $d->QTY+0;
			$row[] 	= $d->PERIODE;
			$row[] 	= $qty;
			$row[] 	= $d->OMZET;

			$data[] = $row;
		}

		$output = [
			"data"	=> $data,
		];
		echo json_encode($output);
	}

	function ajax_penjualan_jasamurah(){
		$list 	= $this->M_dir->penjualan_jasamurah();
		$data 	= [];
		$no		= 1;
		foreach ($list as $d) {
			$row 	= [];
			$qty	= $d->QTY+0;
			$row[] 	= $d->PERIODE;
			$row[] 	= $qty;
			$row[] 	= $d->OMZET;

			$data[] = $row;
		}

		$output = [
			"data"	=> $data,
		];
		echo json_encode($output);
	}

}
