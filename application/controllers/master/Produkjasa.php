<?php


class Produkjasa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_produkjasa');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['pages']='master/produk_jasa/list_produk';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_produkjasa->get_user();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->id_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->jenis_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '
			<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail('."'".$d->id_layanan."'".')"><i class="la la-ellipsis-h"></i></a>
				  <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_layanan."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_layanan."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						
						"recordsTotal" => $this->M_produkjasa->count_all(),
						"recordsFiltered" => $this->M_produkjasa->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function detail($id){
		$data['syarat']=$this->M_produkjasa->get_syarat();
		$data['id_header']=$id;
		$data['pages']='master/produk_jasa/detail_produk';
		$this->load->view('layout',$data);
	}

	public function ajax_list_detail($id)
	{
		$this->load->helper('url');

		$list = $this->M_produkjasa->get_detail($id);
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->id_detail_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->nm_syrt_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '
				  
				  <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_detail_layanan."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_detail_layanan."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						
						"recordsTotal" => $this->M_produkjasa->count_all_detail($id),
						"recordsFiltered" => $this->M_produkjasa->count_filtered_detail($id),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_produkjasa->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_edit_detail($id)
	{
		$data = $this->M_produkjasa->get_by_id_detail($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_layanan' => $this->M_produkjasa->get_ID('id_layanan'),
			'nama_layanan' => $this->input->post('nama_layanan'),
			'jenis_layanan' => $this->input->post('jenis_layanan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_produkjasa->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_add_detail($id)
	{
		//$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_detail_layanan' => $this->M_produkjasa->get_ID_detail('id_detail_layanan'),
			'id_layanan' => $id,
			'id_syrt_layanan' => $this->input->post('id_syrt_layanan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_produkjasa->save_detail($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
			'nama_layanan' => $this->input->post('nama_layanan'),
			'jenis_layanan' => $this->input->post('jenis_layanan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_produkjasa->update(array('id_layanan' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update_detail()
	{
		//$this->_validate();
		$data = array(
			//'id_detail_layanan' => $this->M_produkjasa->get_ID_detail('id_detail_layanan'),
			//'id_layanan' => $id,
			'id_syrt_layanan' => $this->input->post('id_syrt_layanan'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_produkjasa->update_detail(array('id_detail_layanan' => $this->input->post('id')), $data);
		//var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete_detail($id)
	{
		$this->M_produkjasa->delete_by_id_detail($id);
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
