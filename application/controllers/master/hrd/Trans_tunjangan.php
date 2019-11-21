<?php


class Trans_tunjangan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_trans_tunjangan', 'M_trans_tunjangan');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
    $data['jabatan']= $this->M_trans_tunjangan->get_jabatan();
    $data['jabataan']= $this->M_trans_tunjangan->get_jabatan();
    $data['tunjangan']= $this->M_trans_tunjangan->get_tunjangan();
		$data['conf']=$this->M_trans_tunjangan->get_konf();
		$data['pages']='master/hrd/trans_tunjangan/list_tunjangan';
		$this->load->view('layout',$data);
	}

  public function ajax_list()
  {
    $this->load->helper('url');

    $list = $this->M_trans_tunjangan->get_data();
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
			$row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="edit_person('."'".$d->id_karyawan."'".')"><i class="ft-plus"></i></a>';



      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_trans_tunjangan->count_all(),
            "recordsFiltered" => $this->M_trans_tunjangan->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_list2()
  {
    $this->load->helper('url');

    $list = $this->M_trans_tunjangan->get_detail();
    $data = array();

    foreach ($list as $d) {
      $row = array();
			$row['nm_karyawan'] = $d->nama_karyawan;
      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
      $row[] = $d->keterangan;
			 $row[] = $d->jumlah;
			 if ($d->st_data==1) {
				 $row[] = '<a class="btn btn-sm btn-danger disabled" title="Tambah Piutang Karyawan" "><i class="ft-trash"></i></a>';
			}else {
				$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="delete_person('."'".$d->id_trans_tunjangan."'".')"><i class="ft-trash"></i></a>';
			}

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_trans_tunjangan->count_all_detail(),
            "recordsFiltered" => $this->M_trans_tunjangan->count_filtered_detail(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_edit($id)
	{
		$data = $this->M_trans_tunjangan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
    $insert = array(
        'id_tunjangan' => $this->input->post('id_tunjangan'),
        'id_karyawan' => $this->input->post('id'),
        'periode' => date('Ym'),
        'jumlah' => str_replace(".", "", $this->input->post('jumlah')),
        'keterangan' =>  $this->input->post('keterangan'),
        'tgl_trans' => date('Y-m-d'),
        'operator' => $this->session->userdata('yangLogin'),
				'st_data' => 0
  			);
		$this->M_trans_tunjangan->save_detail($insert);
		echo json_encode(array("status" => TRUE));
	}

	public function konfirmasi(){
			$get_data=$this->M_trans_tunjangan->get_detail();
			foreach ($get_data as $data) {
				$update = array(
					'st_data' => 1,
					);
				$this->M_trans_tunjangan->konfirmasi(array('id_trans_tunjangan' => $data->id_trans_tunjangan), $update);
			}
			redirect('master/hrd/trans_tunjangan');
	}

	public function unkonfirmasi(){
			$get_data=$this->M_trans_tunjangan->get_detail();
			foreach ($get_data as $data) {
				$update = array(
					'st_data' => 0,
					);
				$this->M_trans_tunjangan->konfirmasi(array('id_trans_tunjangan' => $data->id_trans_tunjangan), $update);
			}
			redirect('master/hrd/trans_tunjangan');
	}

	public function ajax_delete($id)
	{
	  $this->M_trans_tunjangan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

  public function history($id){
    $data['id']=$id;
    $data['get_karyawan']=$this->M_trans_tunjangan->get_by_id($id);
    $data['pages']='master/hrd/pembayaran_karyawan/list_history_pembayaran';
    $this->load->view('layout',$data);
  }

  public function ajax_history($id)
  {
    $this->load->helper('url');

    $list = $this->M_trans_tunjangan->get_history($id);
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

      $row[] = '<h5 class="text-bold-500">'.$d->id_karyawan;
      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
      $row[] = $status;
      $row[] = $d->jumlah_piutang;
    //  $row[] = $d->jumlah_bayar;
      // $row[] = '<h5 class="text-bold-500">'.$d->password;
      $date=date("d/m/Y H:i", strtotime($d->tgl_input));
      $row[] = '<h5 class="text-bold-500">'.$date	;
      $row[] = '<h5 class="text-bold-500">'.$d->input_by;

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_trans_tunjangan->count_all_history($id),
            "recordsFiltered" => $this->M_trans_tunjangan->count_filtered_history($id),
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

	private function _validate_update($piutang)
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
			// var_dump($this->input->post('jml_bayar'));
			// exit();

			if (str_replace(".", "", $this->input->post('jml_bayar')) > $piutang) {
			$error                  = 'Jumlah bayar Melebihi Piutang';
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




}
