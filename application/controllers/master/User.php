<?php


class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['employee']= $this->M_user->get_employee();
		$data['employe']= $this->M_user->get_employee();
		$data['pages']='master/user/list';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_user->get_user();
		$data = array();

		foreach ($list as $d) {
			if ($d->status_user=='A') {
				$status= '<p class="badge badge-success" style="font-size: 15px;">'."Aktif";
			}elseif ($d->status_user=='N') {
				$status= '<p class="badge badge-danger" style="font-size: 15px;">'."Non Aktif";
			}

			$row = array();
					$row[] = '<h5 class="text-bold-500">'.$d->id_user;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
			$row[] = $status;
			// $row[] = '<h5 class="text-bold-500">'.$d->password;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_user."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_user."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						
						"recordsTotal" => $this->M_user->count_all(),
						"recordsFiltered" => $this->M_user->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_user->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'id_karyawan' => $this->input->post('id_karyawan'),
			'nama_user' => $this->input->post('nama_user'),
			'status_user' => $this->input->post('status_user'),
			'password' => $this->input->post('password'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_user->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
			'id_karyawan' => $this->input->post('id_karyawan'),
			'nama_user' => $this->input->post('nama_user'),
			'status_user' => $this->input->post('status_user'),
			'password' => $this->input->post('password'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_user->update(array('id_user' => $this->input->post('id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
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




}
