<?php


class Tunjangan extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
		$this->M_login->isLogin();
		$this->load->model('hrd/M_tunjangan', 'M_tunjangan');
	}

	public function index(){
		$data['pages']='master/hrd/tunjangan/list_tunjangan';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_tunjangan->get_data();
		$data = array();

		foreach ($list as $d) {
			$row = array();
      $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_tunjangan."'".')"><i class="ft-edit"></i> Update</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_tunjangan  ."'".')"><i class="ft-trash"></i> Delete</a>
                  </div>';
			$row[] = '<h5 class="text-bold-500">'.$d->nm_tunjangan;
			$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			$date=date("d/m/Y", strtotime($d->tgl_trans));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->operator;
			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_tunjangan->count_all(),
						"recordsFiltered" => $this->M_tunjangan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_tunjangan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'nm_tunjangan' => $this->input->post('nm_tunjangan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_trans' => date('Y-m-d H:i:s'),
			'operator' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_tunjangan->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
      'nm_tunjangan' => $this->input->post('nm_tunjangan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_trans' => date('Y-m-d H:i:s'),
			'operator' => $this->session->userdata('yangLogin'),
			);
		$this->M_tunjangan->update(array('id_tunjangan' => $this->input->post('id_tunjangan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_tunjangan->delete_by_id($id);
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

			if (empty($this->input->post('nm_tunjangan'))) {
					$error                  = 'Nama Tunjangan Tidak Boleh Kosong';
					$data['inputerror'][]   = 'nm_tunjangan';
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
