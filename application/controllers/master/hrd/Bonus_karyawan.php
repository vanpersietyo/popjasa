<?php


class Bonus_karyawan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_bonus_karyawan', 'M_bonus_karyawan');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
    $data['jabatan']= $this->M_bonus_karyawan->get_jabatan();
    $data['jabataan']= $this->M_bonus_karyawan->get_jabatan();
		$data['pages']='master/hrd/bonus/list_bonus';
		$this->load->view('layout',$data);
	}

  public function ajax_list()
  {
    $this->load->helper('url');

    $list = $this->M_bonus_karyawan->get_data();
    $data = array();

    foreach ($list as $d) {
      $row = array();
      $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Rekap Bonus Karyawan" onclick="detail('."'".$d->id_karyawan."'".')"><i class="ft-file"></i></a>';
      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
    //  $row[] = number_format($d->jml_piutang-$d->jml_bayar);
			$row[] = number_format($d->jml_gaji);
				// $row[] = number_format($d->total_bonus);
			$row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="edit_person('."'".$d->id_karyawan."'".')"><i class="ft-plus"></i></a>';



      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_bonus_karyawan->count_all(),
            "recordsFiltered" => $this->M_bonus_karyawan->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_list2()
  {
    $this->load->helper('url');

    $list = $this->M_bonus_karyawan->get_detail();
    $data = array();

    foreach ($list as $d) {
      if ($d->status_karyawan=='1') {
        $status= '<p class="badge badge-success" style="font-size: 15px;">'."Bekerja";
      }elseif ($d->status_karyawan=='2') {
        $status= '<p class="badge badge-danger" style="font-size: 15px;">'."Tidak Bekerja";
      }

      if ($d->jns_kelamin=='L') {
        $jk= '<p class="badge badge-success" style="font-size: 15px;">'."Laki - Laki";
      }elseif ($d->jns_kelamin=='P') {
        $jk= '<p class="badge badge-info" style="font-size: 15px;">'."Perempuan";
      }

      $row = array();

      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
      $row[] = $d->jumlah_bonus;
			 $row[] = '<h5 class="text-bold-500">'.$d->input_by;
			 $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="delete_person('."'".$d->id_bonus_krywn."'".')"><i class="ft-trash"></i></a>';

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_bonus_karyawan->count_all_detail(),
            "recordsFiltered" => $this->M_bonus_karyawan->count_filtered_detail(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_edit($id)
	{
		$data = $this->M_bonus_karyawan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate_update();

    $insert = array(
  			'id_bonus_krywn' => $this->M_bonus_karyawan->get_ID('id_karyawan'),
        'id_karyawan' => $this->input->post('id'),
				'periode'			=> strtoupper(date('MY')),
        'jumlah_bonus' => str_replace(".", "", $this->input->post('jumlah_bonus')),
        'keterangan' =>  $this->input->post('keterangan'),
        'tgl_input' => date('Y-m-d H:i:s'),
        'input_by' => $this->session->userdata('yangLogin'),
				'st_data' => 0
  			);
		$this->M_bonus_karyawan->update($insert);
		echo json_encode(array("status" => TRUE));
	}

	public function konfirmasi($user){
		if ($user=='') {
			redirect('master/hrd/bonus_karyawan');
		}else {
			$get_data=$this->M_bonus_karyawan->get_detail($user);
			foreach ($get_data as $data) {
				$update = array(
					'st_data' => 1,
					);
				$this->M_bonus_karyawan->konfirmasi(array('id_bonus_krywn' => $data->id_bonus_krywn), $update);
			}
			redirect('master/hrd/bonus_karyawan');
		}
	}

	public function ajax_delete($id)
	{

	  $this->M_bonus_karyawan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

  public function history($id){
    $data['id']=$id;
    $data['get_karyawan']=$this->M_bonus_karyawan->get_total_bonus($id);
    $data['pages']='master/hrd/bonus/list_history_bonus';
    $this->load->view('layout',$data);
  }

  public function ajax_history($id)
  {
    $this->load->helper('url');

    $list = $this->M_bonus_karyawan->get_history($id);
    $data = array();

    foreach ($list as $d) {

      $row = array();

      $row[] = '<h5 class="text-bold-500">'.$d->id_karyawan;
      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
      $row[] = '<h5 class="text-bold-500">'.number_format($d->jumlah_bonus);
      $date=date("d/m/Y H:i", strtotime($d->tgl_input));
      $row[] = '<h5 class="text-bold-500">'.$date	;
      $row[] = '<h5 class="text-bold-500">'.$d->input_by;

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_bonus_karyawan->count_all_history($id),
            "recordsFiltered" => $this->M_bonus_karyawan->count_filtered_history($id),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
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

			if (empty($this->input->post('jml_bayar'))) {
					$error                  = 'Jumlah bayar Tidak Boleh Kosong';
					$data['inputerror'][]   = 'jml_bayar';
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

	private function _validate_update()
	{
			$data                   = [];
			$data['error_string']   = array();
			$data['inputerror']     = array();
			$data['notiferror']     = array();
			$data['status']         = TRUE;

			$prefix ='<p class="badge-default badge-danger block-tag text-center">
									<small class="block-area white">';
			$suffix ='</small</p>';

			if (empty($this->input->post('jumlah_bonus'))) {
					$error                  = 'Jumlah bonus Tidak Boleh Kosong';
					$data['inputerror'][]   = 'jumlah_bonus';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}
			// var_dump($this->input->post('jml_bayar'));
			// exit();



		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}


	}




}
