<?php
class Jenisrekeningbiaya extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_jenisrekeningbiaya');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){

		$data['jumlah']=$this->M_jenisrekeningbiaya->count_all();
		$data['pages']='master/jenisrekeningbiaya/list';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_jenisrekeningbiaya->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) {
			$no++;
			$row = array();
			$row[] = '<p class="badge badge-dark" style="font-size: 15px;">'.$d->id_jns_rekbiaya;
			$row[] = '<h5 class="text-bold-500">'.$d->nm_jns_rekbiaya;
			$row[] = '<h5 class="text-bold-500">'.$d->tgl_input;
			$row[] = '<p class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_jns_rekbiaya."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_jns_rekbiaya."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_jenisrekeningbiaya->count_all(),
						"recordsFiltered" => $this->M_jenisrekeningbiaya->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_jenisrekeningbiaya->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_jns_rekbiaya' => $this->M_jenisrekeningbiaya->get_ID('id_jns_rekbiaya'),
			'nm_jns_rekbiaya' => $this->input->post('nm_jns_rekbiaya'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_jenisrekeningbiaya->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
      'nm_jns_rekbiaya' => $this->input->post('nm_jns_rekbiaya'),
			'keterangan' => $this->input->post('keterangan'),
			'lastmodify' => date('Y-m-d H:i:s'),
			);
		$this->M_jenisrekeningbiaya->update(array('id_jns_rekbiaya' => $this->input->post('id_jns_rekbiaya')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_jenisrekeningbiaya->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nm_jns_rekbiaya') == '')
		{
			$data['inputerror'][] = 'nm_jns_rekbiaya';
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
