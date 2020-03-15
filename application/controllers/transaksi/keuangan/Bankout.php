<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bankout extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('transaksi/keuangan/M_bankout', 'M_bankout');
        $this->load->model('M_bank');
		$this->load->model('M_login');
	}

	public function index(){
        $data['bank']   = $this->M_bank->find();
		$data['pages']  = 'transaksi/keuangan/bankout/list_bankout';
		$this->load->view('layout',$data);
	}

	public function ajax_data(){
		$this->load->helper('url');
		$list = $this->M_bankout->get_user();
		$data = array();
		foreach ($list as $d) {
			$row = array();
			if ($d->ST_DATA==1) {
			$row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
														<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->ID_TRANS."'".')"><i class="ft-edit"></i> Edit Data</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->ID_TRANS."'".')"><i class="ft-file"></i> View Data</a>
														</div>';
			}else {
				$row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
                              	<a class="dropdown-item" href="javascript:void(0)" onclick="konfirmasi('."'".$d->ID_TRANS."'".')"><i class="fa fa-check info"></i><b class="info"> Konfirmasi Data</b></a>
																<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->ID_TRANS."'".')"><i class="ft-edit"></i> Edit Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->ID_TRANS."'".')"><i class="ft-trash"></i> Hapus Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->ID_TRANS."'".')"><i class="ft-file"></i> View Data</a>
															</div>';
		 }
       $row[] = $d->ID_TRANS;
      $row[] = $d->KD_BANK;
			$row[] = number_format($d->SLD_KELUAR);
			$row[] = $d->KETERANGAN;
      $row[] = strtoupper(date("d-m-Y", strtotime($d->TGL_BUAT)));
      $row[] = $d->ID_OPR;

			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_bankout->count_all(),
						"recordsFiltered" => $this->M_bankout->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}


		public function ajax_edit($id)
		{
			$data = $this->M_bankout->get_by_id($id);
			echo json_encode($data);
		}

		public function ajax_add()
		{
			$this->_validate();
			$kode=date('Ymds');
			$data = array(
          'ID_TRANS' => $this->M_bankout->get_ID(),
					'KD_BANK' => $this->input->post('KD_BANK'),
          'SLD_KELUAR' => str_replace(".", "", $this->input->post('SLD_KELUAR')),
          'ST_DATA' => 0,
					'TGL_BUAT' => strtoupper(date("Y-m-d H:i:s", strtotime($this->input->post('TGL_BUAT')))),
					'KETERANGAN' => $this->input->post('KETERANGAN'),
          'TGL_TRANS' => date('Y-m-d H:i:s'),
          'ID_OPR' => $this->session->userdata('yangLogin'),
				);

			$insert = $this->M_bankout->save($data);

			echo json_encode(array("status" => TRUE));
		}

		public function ajax_update()
		{
			$this->_validate();
			$data = array(
        'KD_BANK' => $this->input->post('KD_BANK'),
        'SLD_KELUAR' => str_replace(".", "", $this->input->post('SLD_KELUAR')),
				'TGL_BUAT' => strtoupper(date("Y-m-d H:i:s", strtotime($this->input->post('TGL_BUAT')))),
				'KETERANGAN' => $this->input->post('KETERANGAN'),
				);
			$this->M_bankout->update(array('ID_TRANS' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
		}

		public function ajax_delete($id)
		{
			$this->M_bankout->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}

    public function ajax_konfirmasi($id)
    {
    //  $this->_validate();
      $data = array(
        'ST_DATA' => 1,
        );
      $this->M_bankout->update(array('ID_TRANS' => $id), $data);
      echo json_encode(array("status" => TRUE));
    }

		private function _validate()
		{
				$data                   = [];
				$data['error_string']   = array();
				$data['inputerror']     = array();
				$data['notiferror']     = array();
				$data['status']         = TRUE;

				$prefix ='<p class="badge-default badge-danger block-tag text-center">
										<small class="block-area white">';
				$suffix ='</small</p>';

				if (empty($this->input->post('KD_BANK'))) {
						$error                  = 'Kode Bank tidak boleh kosong';
						$data['inputerror'][]   = 'KD_BANK';
						$data['notiferror'][]   = $prefix.$error.$suffix;
						$data['error_string'][] = $error;
						$data['status']         = FALSE;
				}

				if (empty($this->input->post('SLD_KELUAR'))) {
						$error                  = 'Saldo Keluar tidak boleh kosong';
						$data['inputerror'][]   = 'SLD_KELUAR';
						$data['notiferror'][]   = $prefix.$error.$suffix;
						$data['error_string'][] = $error;
						$data['status']         = FALSE;
				}

				if (empty($this->input->post('TGL_BUAT'))) {
						$error                  = 'Tanggal Transaksi tidak boleh kosong';
						$data['inputerror'][]   = 'TGL_BUAT';
						$data['notiferror'][]   = $prefix.$error.$suffix;
						$data['error_string'][] = $error;
						$data['status']         = FALSE;
				}

				if (empty($this->input->post('KETERANGAN'))) {
						$error                  = 'Keterangan tidak boleh kosong';
						$data['inputerror'][]   = 'KETERANGAN';
						$data['notiferror'][]   = $prefix.$error.$suffix;
						$data['error_string'][] = $error;
						$data['status']         = FALSE;
				}


			if($data['status'] === FALSE)
			{
				echo json_encode($data);
				exit();
			}


		}

		function detail_total_pemasukan(){
			$data['tot_pengeluaran']=$this->M_bankout->get_SUM_pengeluaran();
			$data['tot_operasional']=$this->M_bankout->get_SUM_pengeluaran2();
			$data['tot_period_pengeluaran']=$this->M_bankout->get_SUMPERIOD_pengeluaran();
			$data['tot_period_operasional']=$this->M_bankout->get_SUMPERIOD_pengeluaran2();
			$data['pages']='transaksi/keuangan/bankout/list_pemasukan';
			$this->load->view('layout',$data);
		}

		public function ajax_pemasukan(){
			$this->load->helper('url');
			$list = $this->M_bankout->get_pemasukan();
			$data = array();
			foreach ($list as $d) {
				$row = array();

				$row[] = $d->KD_TRANS;
				$row[] = $d->NM_OUTLET;
				$row[] = strtoupper(date("M-Y", strtotime($d->TGL_PEMBAYARAN)));
				$row[] = $d->NM_BANK;
				$row[] = $d->TOTAL_PENJUALAN;
				$row[] = $d->TOTAL_PEMBAYARAN;
				$row[] = $d->PIUTANG_PENJUALAN;
				$row[] = strtoupper(date("d-m-Y H:i", strtotime($d->TGL_PEMBAYARAN)));

				$data[] = $row;
			}

			$output = array(

							"recordsTotal" => $this->M_bankout->get_count_pemasukan(),
							"recordsFiltered" => $this->M_bankout->get_count_pemasukan(),
							"data" => $data,
					);
			echo json_encode($output);
		}

		public function ajax_saldo(){
			$this->load->helper('url');
			$list = $this->M_bankout->get_saldo();
			$data = array();
			foreach ($list as $d) {
				$row = array();

				$row[] = $d->NM_BANK;
				$row[] = $d->SALDO;

				$data[] = $row;
			}

			$output = array(

							"recordsTotal" => $this->M_bankout->get_count_saldo(),
							"recordsFiltered" => $this->M_bankout->get_count_saldo(),
							"data" => $data,
					);
			echo json_encode($output);
		}

		public function ajax_saldo_in(){
			$this->load->helper('url');
			$list = $this->M_bankout->sum_saldo_bi_group();
			$data = array();
			foreach ($list as $d) {
				$row = array();

				$row[] = $d->NM_BANK;
				$row[] = $d->SALDO;

				$data[] = $row;
			}

			$output = array(

							"recordsTotal" => $this->M_bankout->get_count_saldo(),
							"recordsFiltered" => $this->M_bankout->get_count_saldo(),
							"data" => $data,
					);
			echo json_encode($output);
		}

		function detail_total_pengeluaran(){
			$data['tot_pengeluaran']=$this->M_bankout->get_SUM_pengeluaran();
			$data['tot_operasional']=$this->M_bankout->get_SUM_pengeluaran2();
			$data['tot_period_pengeluaran']=$this->M_bankout->get_SUMPERIOD_pengeluaran();
			$data['tot_period_operasional']=$this->M_bankout->get_SUMPERIOD_pengeluaran2();

			$data['pages']='transaksi/keuangan/bankout/list_pengeluaran';
			$this->load->view('layout',$data);
		}

		public function ajax_pengeluaran(){
			$this->load->helper('url');
			$list = $this->M_bankout->get_pengeluaran();
			$data = array();
			foreach ($list as $d) {
				$row = array();
				$row[] = $d->KD_TRANS;
				$row[] = strtoupper(date("M-Y", strtotime($d->TGL_TRANS)));
				$row[] = $d->NM_SUPPLIER;
				$row[] = $d->TOTAL_PEMBELIAN;
				$row[] = $d->JUMLAH_PEMBAYARAN;
				$row[] = $d->SISA_PEMBAYARAN;


				$data[] = $row;
			}

			$output = array(

							"recordsTotal" => $this->M_bankout->get_count_pengeluaran(),
							"recordsFiltered" => $this->M_bankout->get_count_pengeluaran(),
							"data" => $data,
					);
			echo json_encode($output);
		}

		public function ajax_pengeluaran2(){
			$this->load->helper('url');
			$list = $this->M_bankout->get_pengeluaran2();
			$data = array();
			foreach ($list as $d) {
				$row = array();
				$row[] = $d->ID_TRANS_DETAIL;
				$row[] = $d->PRD_BLTH;
				$row[] = $d->NM_REKENING;
				$row[] = $d->JUM_BIAYA;

				$data[] = $row;
			}

			$output = array(

							"recordsTotal" => $this->M_bankout->get_count_pengeluaran2(),
							"recordsFiltered" => $this->M_bankout->get_count_pengeluaran2(),
							"data" => $data,
					);
			echo json_encode($output);
		}




}
