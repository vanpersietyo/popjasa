<?php


class Customer extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
		$this->M_login->isLogin();
		$this->load->model('M_Customer');
	}

	public function index(){
		$data['pages']='master/customer/list_customer';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_Customer->get_user();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->id_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->nm_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->tlp_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->telp2_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->email_customer;
			$row[] = '<h5 class="text-bold-500">'.$d->kota_customer;;
			// $row[] = '<h5 class="text-bold-500">'.$d->password;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_customer."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_customer."'".')"><i class="la la-close"></i></a>';

			// $row[] = '<button type="button" class="btn btn-icon btn-secondary dropdown-toggle" data-toggle="dropdown"
      //                       aria-haspopup="true" aria-expanded="false"><i class="la la-cogs"></i></button>
      //                       <div class="dropdown-menu">
      //                         <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_customer."'".')">Update</a>
      //                         <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_customer."'".')">Delete</a>
      //                         <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_customer."'".')">Create Project</a>
			//
			//
      //                       </div>';

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

	public function tabel_customer(){
		$list   = $this->M_Customer->find();
		$data   = [];
		/** @var M_Customer $detail */
		if($list){
			foreach ($list as $i => $detail) {
				$no     	= $i+1;
				$row    	= [];

				$row[] = $no;
				$row[] = $detail->id_customer;				
				$row[] = $detail->nm_customer;
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Tambah Customer" onclick="pilih_customer('."'".$detail->id_customer."','".$detail->nm_customer."'".')"><i class="ft-plus-square"></i></a>';

				$data[] = $row;
			}
		}
		$output = array(
			"data"              => $data,
		);
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_Customer->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_customer' => $this->M_Customer->get_ID('id_customer'),
			'kd_cabang' =>$this->session->userdata('cabang'),
			'nm_customer' => $this->input->post('nm_customer'),
			'tlp_customer' => $this->input->post('tlp_customer'),
			'telp2_customer' => $this->input->post('telp2_customer'),
			'email_customer' => $this->input->post('email_customer'),
			'kota_customer' => $this->input->post('kota_customer'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => $this->input->post('status'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_Customer->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
			'nm_customer' => $this->input->post('nm_customer'),
			'tlp_customer' => $this->input->post('tlp_customer'),
			'telp2_customer' => $this->input->post('telp2_customer'),
			'email_customer' => $this->input->post('email_customer'),
			'kota_customer' => $this->input->post('kota_customer'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_Customer->update(array('id_customer' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
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
					$error                  = 'Nama Customer Tidak Boleh Kosong';
					$data['inputerror'][]   = 'nm_customer';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}

			// if (empty($this->input->post('president'))) {
			// 		$error                  = 'Nama president Tidak Boleh Kosong';
			// 		$data['inputerror'][]   = 'president';
			// 		$data['notiferror'][]   = $prefix.$error.$suffix;
			// 		$data['error_string'][] = $error;
			// 		$data['status']         = FALSE;
			// }

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}


	}




}
