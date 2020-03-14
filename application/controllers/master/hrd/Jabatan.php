<?php


class Jabatan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_jabatan', 'M_jabatan');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['pages']='master/hrd/jabatan/list_jabatan';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_jabatan->get_jabatan();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->id_jabatan;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_jabatan;
			$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
				if ($d->st_data==0) {
					$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_jabatan."'".')"><i class="ft-edit"></i></a>
							<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_jabatan."'".')"><i class="ft-trash"></i></a>
							<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="View" onclick="lookup('."'".$d->id_jabatan."'".')"><i class="ft-search"></i></a>';
				}else {
					$row[] = '<a class="btn btn-sm btn-primary disabled" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_jabatan."'".')"><i class="ft-edit"></i></a>
							<a class="btn btn-sm btn-danger disabled" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_jabatan."'".')"><i class="ft-trash"></i></a>
							<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="View" onclick="lookup('."'".$d->id_jabatan."'".')"><i class="ft-search"></i></a>';
				}


			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_jabatan->count_all(),
						"recordsFiltered" => $this->M_jabatan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_jabatan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_jabatan' => $this->input->post('id_jabatan'),
			'nama_jabatan' => $this->input->post('nama_jabatan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$insert = $this->M_jabatan->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
      'id_jabatan' => $this->input->post('id_jabatan'),
			'nama_jabatan' => $this->input->post('nama_jabatan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_jabatan->update(array('id_jabatan' => $this->input->post('id')), $data);
    // var_dump($data);
    // exit();
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_jabatan->delete_by_id($id);
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

			if (empty($this->input->post('nama_jabatan'))) {
					$error                  = 'Nama Jabatan Tidak Boleh Kosong';
					$data['inputerror'][]   = 'nama_jabatan';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}

			if (empty($this->input->post('id_jabatan'))) {
					$error                  = 'ID Jabatan Tidak Boleh Kosong';
					$data['inputerror'][]   = 'id_jabatan';
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
