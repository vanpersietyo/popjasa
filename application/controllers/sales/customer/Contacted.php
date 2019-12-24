<?php


class Contacted extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
		$this->M_login->isLogin();
		$this->load->model('M_Customer');
			$this->load->model('M_master_agen');
			$this->load->model('sales/M_reason_deal', 'M_reason_deal');
			$this->load->model('sales/M_reason_lost', 'M_reason_lost');
		$this->load->model('sales/M_area', 'M_area');
	}

	public function index(){
		$data['agen']=$this->M_master_agen->get_data();
		$data['area']=$this->M_area->get_user();
		$data['reason_deal']=$this->M_reason_deal->get_data();
		$data['reason_lost']=$this->M_reason_lost->get_data();
		$data['pages']='sales/customer/list_contacted';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_Customer->get_user_contacted();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
			                      aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
			                      <div class="dropdown-menu">
			                        <a class="dropdown-item"  href="javascript:void(0)" onclick="deals('."'".$d->id_customer."'".')"><i class="ft-thumbs-up"></i> Generate To Deals</a>
			                        <a class="dropdown-item" href="javascript:void(0)" onclick="lost('."'".$d->id_customer."'".')"><i class="ft-thumbs-down"></i> Generat To Lost</a>
			                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_customer."'".')"><i class="ft-trash"></i> Delete</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="view('."'".$d->id_customer."'".')"><i class="ft-file"></i> View Detail</a>
			                      </div>';
			$row[] = $d->id_customer;
			$row[] = $d->nm_customer;
			$row[] = $d->tlp_customer;
			$row[] = $d->telp2_customer;
			$row[] = $d->email_customer;
			$row[] = $d->kota_customer;;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = $date	;
			$row[] = $d->inputby;




			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_Customer->count_all_contacted(),
						"recordsFiltered" => $this->M_Customer->count_filtered_contacted(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_Customer->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_customer' => $this->M_Customer->get_ID('id_customer'),
			'kd_cabang' => $this->session->userdata('cabang'),
			'nm_customer' => $this->input->post('nm_customer'),
			'alamat' => $this->input->post('alamat'),
			'nm_perusahaan' => $this->input->post('nm_perusahaan'),
			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
			'jns_usaha' => $this->input->post('jns_usaha'),
			'bidang_usaha' => $this->input->post('bidang_usaha'),
			'Agen' => $this->input->post('Agen'),
			'nm_customer' => $this->input->post('nm_customer'),
			'tlp_customer' => $this->input->post('tlp_customer'),
			'telp2_customer' => $this->input->post('telp2_customer'),
			'email_customer' => $this->input->post('email_customer'),
			'kota_customer' => $this->input->post('kota_customer'),
			'status' => 1,
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

			// var_dump($data);
			// exit();

		$insert = $this->M_Customer->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_add_deal()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_customer' => $this->M_Customer->get_ID('id_customer'),
			'kd_cabang' => $this->session->userdata('cabang'),
			'nm_customer' => $this->input->post('nm_customer'),
			'alamat' => $this->input->post('alamat'),
			'nm_perusahaan' => $this->input->post('nm_perusahaan'),
			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
			'jns_usaha' => $this->input->post('jns_usaha'),
			'bidang_usaha' => $this->input->post('bidang_usaha'),
			'Agen' => $this->input->post('Agen'),
			'nm_customer' => $this->input->post('nm_customer'),
			'tlp_customer' => $this->input->post('tlp_customer'),
			'telp2_customer' => $this->input->post('telp2_customer'),
			'email_customer' => $this->input->post('email_customer'),
			'kota_customer' => $this->input->post('kota_customer'),
			'status' => 2,
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

			// var_dump($data);
			// exit();

		$insert = $this->M_Customer->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_lost()
	{
		//$this->_validate();
		$data = array(
			'status' => 3,
			'keterangan_lost' => $this->input->post('keterangan_lost'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
			// var_dump($data);
			// exit();
		$this->M_Customer->update(array('id_customer' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_deals()
	{
		//$this->_validate();
		$data = array(
			'status' => 2,
			'keterangan_deals' => $this->input->post('keterangan_deals'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
			// var_dump($data);
			// exit();

		$this->M_Customer->update(array('id_customer' => $this->input->post('id')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_Customer->delete_by_id($id);
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

			if (empty($this->input->post('nm_customer'))) {
					$error                  = 'Nama Kastemer Tidak Boleh Kosong';
					$data['inputerror'][]   = 'nm_customer';
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




}
