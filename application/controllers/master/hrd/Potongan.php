<?php
class Potongan extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
		$this->M_login->isLogin();
		$this->load->model('hrd/M_potongan', 'M_potongan');
	}

	public function index(){
		$data['pages']='master/hrd/potongan/list_potongan';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_potongan->get_user();
		$data = array();

		foreach ($list as $d) {
			$row = array();
      $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_potongan."'".')"><i class="ft-edit"></i> Update</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_potongan  ."'".')"><i class="ft-trash"></i> Delete</a>
                  </div>';
      $row[] = '<h5 class="text-bold-500">'.$d->nm_potongan;
      $row[] = '<h5 class="text-bold-500">'.$d->keterangan;
      $date=date("d/m/Y", strtotime($d->tgl_trans));
      $row[] = '<h5 class="text-bold-500">'.$date	;
      $row[] = '<h5 class="text-bold-500">'.$d->operator;

			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_potongan->count_all(),
						"recordsFiltered" => $this->M_potongan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_potongan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
    $data = array(
      'nm_potongan' => $this->input->post('nm_potongan'),
      'keterangan' => $this->input->post('keterangan'),
      'tgl_trans' => date('Y-m-d H:i:s'),
      'operator' => $this->session->userdata('yangLogin'),
      );

		$insert = $this->M_potongan->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
    $data = array(
      'nm_potongan' => $this->input->post('nm_potongan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_trans' => date('Y-m-d H:i:s'),
			'operator' => $this->session->userdata('yangLogin'),
			);
		$this->M_potongan->update(array('id_potongan' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_potongan->delete_by_id($id);
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

			if (empty($this->input->post('nm_potongan'))) {
					$error                  = 'Nama Potongan Tidak Boleh Kosong';
					$data['inputerror'][]   = 'nm_potongan';
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
