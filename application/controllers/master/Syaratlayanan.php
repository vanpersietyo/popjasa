<?php


class Syaratlayanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_syaratlayanan');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['pages']='master/syarat/list_syarat';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_syaratlayanan->get_user();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->id_syrt_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->nm_syrt_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->qty_syrt_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			// $row[] = '<h5 class="text-bold-500">'.$d->email_customer;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_syrt_layanan."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_syrt_layanan."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						
						"recordsTotal" => $this->M_syaratlayanan->count_all(),
						"recordsFiltered" => $this->M_syaratlayanan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_syaratlayanan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_syrt_layanan' => $this->M_syaratlayanan->get_ID('id_syrt_layanan'),
			'nm_syrt_layanan' => $this->input->post('nm_syrt_layanan'),
			'qty_syrt_layanan' => $this->input->post('qty_syrt_layanan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_syaratlayanan->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
			'nm_syrt_layanan' => $this->input->post('nm_syrt_layanan'),
			'qty_syrt_layanan' => $this->input->post('qty_syrt_layanan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_syaratlayanan->update(array('id_syrt_layanan' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_syaratlayanan->delete_by_id($id);
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
