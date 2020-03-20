<?php


class Pembayaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_Customer');
		$this->load->model('M_project');
        $this->load->model('M_bank', 'M_bank');
		$this->load->model('M_payment');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['pages']='transaksi/pembayaran/list_customer';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_payment->get_customer();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			//									<a class="dropdown-item" href="javascript:void(0)" onclick="create('."'".$d->id_customer."'".')"> Detail Data Project</a>
			$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
									<div class="dropdown-menu">
									<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_customer."'".')"> Detail Data Customer</a>

									<a class="dropdown-item" href="javascript:void(0)" onclick="bayar('."'".$d->id_customer."'".')"> Bayar Project</a>
									</div>';

			$row[] = '<h5 class="text-bold-500">'.$d->id_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->nm_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->nm_perusahaan;
			$row[] = '<h5 class="text-bold-500">'.number_format($d->profit);
			$row[] = '<h5 class="text-bold-500">'.number_format($d->jumlah_byr);
			$row[] = '<h5 class="text-bold-500">'.number_format($d->profit - $d->jumlah_byr);

			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_Customer->count_all(),
						"recordsFiltered" => $this->M_Customer->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

    public function history($id){
        $data['id_project']=$id;
        $data['produk']=$this->M_project->get_produk();
        $data['pages']='transaksi/pembayaran/history_pembayaran';
        $this->load->view('layout',$data);
    }

    public function ajax_list_pembayaran($id_project)
    {
        $this->load->helper('url');

        $list = $this->M_payment->get_history($id_project);
        $data = array();

        foreach ($list as $d) {
            $row = array();
            $row[] = '<h5 class="text-bold-500">'.$d->id_pay;
            $row[] = '<h5 class="text-bold-500">'.number_format($d->jumlah_pay);
            $row[] = '<h5 class="text-bold-500">'.strtoupper(date("d-m-Y", strtotime($d->tgl_input)));

            $data[] = $row;
        }

        $output = array(

            "recordsTotal" => $this->M_payment->count_history($id_project),
            "recordsFiltered" => $this->M_payment->count_history($id_project),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('categoryname') == '')
		{
			$data['inputerror'][] = 'categoryname';
			$data['error_string'][] = 'Nama Kategori Belum di Isi ..';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


	//view Project
	function view_project($id){
		$data['id_customer']=$id;
		$data['customer']=$this->M_Customer->get_by_id($id);
		$data['produk']=$this->M_project->get_produk();
		$data['pages']='transaksi/pembayaran/list_project';
		$this->load->view('layout',$data);
	}

	public function ajax_project($id)
	{
		$this->load->helper('url');

		$list = $this->M_payment->get_project($id);
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
									<div class="dropdown-menu">
									<a class="dropdown-item"  href="javascript:void(0)" onclick="bayar('."'".$d->id_project."'".')"> <i class="ft-award"></i> Bayar</a>
									<a class="dropdown-item" href="javascript:void(0)" onclick="history('."'".$d->id_project."'".')"> <i class="ft-book"></i> Riwayat Pembayaran</a>
									</div>';
			$row[] = '<h5 class="text-bold-500">'.$d->id_project;
			//$row[] = '<h5 class="text-bold-500">'.$d->nm_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_layanan;
			$row[] = '<h5 class="text-bold-500">'.number_format($d->harga);
			$row[] = '<h5 class="text-bold-500">'.number_format($d->profit);
			$row[] = '<h5 class="text-bold-500">'.number_format($d->jumlah_byr);
			$row[] = '<h5 class="text-bold-500">'.number_format($d->profit - $d->jumlah_byr);
			// $row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			$date=date("d/m/Y", strtotime($d->tgl_input));

			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_project->count_all(),
						"recordsFiltered" => $this->M_project->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}


	//pembayaran
	function bayar($id){
		$data['id_project']=$id;
        $data['bank']= $this->M_bank->get_data();
		$data['project']=$this->M_project->get_projectid($id);
		$data['tot_bayar']=$this->M_payment->get_totalbayar($id);
		$data['jml_project']=$this->M_payment->get_harga($id);
		$jml_project=$this->M_payment->get_harga($id);
		$tot_bayar=$this->M_payment->get_totalbayar($id);
		$kurang_bayar=($jml_project-$tot_bayar);
		$data['kurang_bayar']=$kurang_bayar;
		$data['pages']='transaksi/pembayaran/bayar';
		$this->load->view('layout',$data);
	}
	public function simpan()
	{

		//$this->_validate();
		$kode=date('Ymds');
		$cek_project=$this->M_payment->cek_bayar($this->input->post('id_project'));
		$omz=$cek_project->profit;
		$byr=$cek_project->jumlah_byr;
		$cek=$omz-$byr;
		// var_dump($cek);
		// exit();
		if (str_replace(".", "", $this->input->post('jumlah_pay')) > $cek ) {
				echo "<script>alert('Eror! Maaf Pembayaran sudah Lunas');history.go(-1);</script>";
		}else{
			$data = array(
				'id_pay' => $this->M_payment->get_ID('id_pay'),
				'id_project' => $this->input->post('id_project'),
				'tipe_pay' => $this->input->post('tipe_pay'),
				'jumlah_pay' => str_replace(".", "", $this->input->post('jumlah_pay')),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'input_by' => $this->session->userdata('yangLogin'),
				);
			$insert = $this->M_payment->save($data);
			redirect('transaksi/pembayaran/view_project/'.$cek_project->id_customer);
		}


	}

	public function ajax_edit_project($id)
	{
		$data = $this->M_project->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update_project()
	{
		//$this->_validate();
		$data = array(
			'id_layanan' => $this->input->post('id_layanan'),
			'harga_jual' => str_replace(".", "", $this->input->post('harga_jual')),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'input_by' => $this->session->userdata('yangLogin'),
			);
		$this->M_project->update(array('id_project' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete_project($id)
	{
		$this->M_project->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}




}
