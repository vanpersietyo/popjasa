<?php


class Hari_kerja extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_hari_kerja', 'M_hari_kerja');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['jabatan']= $this->M_hari_kerja->get_jabatan();
		$data['jabataan']= $this->M_hari_kerja->get_jabatan();
		$data['pages']='master/hrd/hari_kerja/list_harikerja';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_hari_kerja->get_user();
		$data = array();

		foreach ($list as $d) {

			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->periode;
			$row[] = '<h5 class="text-bold-500">'.$d->jml_harikerja.' Hari';
			$row[] = '<h5 class="text-bold-500">'.$d->jml_libur.' Hari';
      	$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			$date=date("d/m/Y H:i:s", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			if ($d->st_konfirm==0) {
				$row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->periode."'".')"><i class="ft-edit"></i></a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->periode."'".')"><i class="ft-trash"></i></a>
             <a class="btn btn-sm btn-dark" href="#" title="Konfirmasi" onclick="konfirmasi('."'".$d->periode."'".')"><i class="ft-check"></i></a>';
			}else {
				$row[] = '<a class="btn btn-sm btn-info disabled" href="#" title="Edit" onclick="edit_person('."'".$d->periode."'".')"><i class="ft-edit"></i></a>
					  <a class="btn btn-sm btn-danger disabled" href="#" title="Hapus" onclick="delete_person('."'".$d->periode."'".')"><i class="ft-trash"></i></a>
             <a class="btn btn-sm btn-dark disabled" href="#" title="Konfirmasi"><i class="ft-check"></i></a>';
			}
			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_hari_kerja->count_all(),
						"recordsFiltered" => $this->M_hari_kerja->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_hari_kerja->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'periode' => strtoupper(date("Fy")),
			'jml_harikerja' =>  $this->input->post('jml_harikerja'),
			'jml_libur' => $this->input->post('jml_libur'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_hari_kerja->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
      'jml_harikerja' =>  $this->input->post('jml_harikerja'),
			'jml_libur' => $this->input->post('jml_libur'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_hari_kerja->update(array('periode' => $this->input->post('id')), $data);
    // var_dump($this->input->post('id'));
    // exit();
		echo json_encode(array("status" => TRUE));
	}

  public function konfirm($id)	{
		$data = array(
      'st_konfirm' =>  1,
			);
		$this->M_hari_kerja->update(array('periode' => $id), $data);
    //var_dump($this->db->las)
    echo json_encode(array("status" => TRUE));

	}

	public function ajax_delete($id)
	{
		$this->M_hari_kerja->delete_by_id($id);
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

			if (empty($this->input->post('jml_harikerja'))) {
					$error                  = 'Jumlah Hari Kerja Tidak Boleh Kosong';
					$data['inputerror'][]   = 'jml_harikerja';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}

			if (empty($this->input->post('jml_libur'))) {
					$error                  = 'Jumlah Libur Tidak Boleh Kosong';
					$data['inputerror'][]   = 'jml_libur';
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
