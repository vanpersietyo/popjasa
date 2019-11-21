<?php
class Area extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('sales/M_area', 'M_area');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['pages']='sales/master/list_area';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_area->get_user();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			//add html for action
			if ($d->st_data==0) {
				$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_kota."'".')"><i class="ft-edit"></i> Edit Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_kota."'".')"><i class="ft-trash"></i> Hapus Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->id_kota."'".')"><i class="ft-file"></i> View Data</a>
															</div>';
			}else {
				$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_kota."'".')"><i class="ft-edit"></i> Edit Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_kota."'".')"><i class="ft-trash"></i> Hapus Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->id_kota."'".')"><i class="ft-file"></i> View Data</a>
															</div>';
			}

			$row[] = '<h5 class="text-bold-500">'.$d->id_kota;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_kota;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;



			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_area->count_all(),
						"recordsFiltered" => $this->M_area->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_area->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_kota' => $this->M_area->get_ID('id_karyawan'),
			'kd_cabang' =>  $this->session->userdata('cabang'),
			'nama_kota' => $this->input->post('nama_kota'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_area->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
			'kd_cabang' =>  $this->session->userdata('cabang'),
			'nama_kota' => $this->input->post('nama_kota'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_area->update(array('id_kota' => $this->input->post('id')), $data);
    // var_dump($data);
    // exit();
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_area->delete_by_id($id);
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

			if (empty($this->input->post('nama_kota'))) {
					$error                  = 'Nama Area Kota Tidak Boleh Kosong';
					$data['inputerror'][]   = 'nama_kota';
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
