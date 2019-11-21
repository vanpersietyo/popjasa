<?php
class Rekeningbiaya extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_rekeningbiaya');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['nm_jns_rekbiaya']=$this->M_rekeningbiaya->select_jenis_rekening_biaya();
		$data['jumlah']=$this->M_rekeningbiaya->count_all();
		$data['pages']='master/rekeningbiaya/list';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_rekeningbiaya->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) {
			$no++;
			$row = array();
			$row[] = '<p class="badge badge-dark" style="font-size: 15px;">'.$d->id_rekbiaya;
			$row[] = '<p class="badge badge-dark" style="font-size: 15px;">'.$d->id_jns_rekbiaya;
			$row[] = '<h5 class="text-bold-500">'.$d->nm_rekbiaya;
			$row[] = '<h5 class="text-bold-500">'.$d->tgl_input;
			$row[] = '<p class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_rekbiaya."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_rekbiaya."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_rekeningbiaya->count_all(),
						"recordsFiltered" => $this->M_rekeningbiaya->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_rekeningbiaya->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_rekbiaya' => $this->M_rekeningbiaya->get_ID('id_rekbiaya'),
			'id_jns_rekbiaya' => $this->input->post('id_jns_rekbiaya'),
			'nm_rekbiaya' => $this->input->post('nm_rekbiaya'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_rekeningbiaya->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
			'id_jns_rekbiaya' => $this->input->post('id_jns_rekbiaya'),
			'nm_rekbiaya' => $this->input->post('nm_rekbiaya'),
			'keterangan' => $this->input->post('keterangan'),
			'lastmodify' => date('Y-m-d H:i:s'),
			);
		// var_dump($data);
		// exit();
		$this->M_rekeningbiaya->update(array('id_rekbiaya' => $this->input->post('id_rekbiaya')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_rekeningbiaya->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_jns_rekbiaya') == '')
		{
			$data['inputerror'][] = 'nm_rekbiaya';
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
