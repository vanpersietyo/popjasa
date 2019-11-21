<?php


class Trans_potongan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_trans_potongan', 'M_trans_potongan');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
    $data['jabatan']= $this->M_trans_potongan->get_jabatan();
    $data['jabataan']= $this->M_trans_potongan->get_jabatan();
    $data['potongan']= $this->M_trans_potongan->get_potongan();
		$data['conf']=$this->M_trans_potongan->get_konf();
		$data['pages']='master/hrd/trans_potongan/list_potongan';
		$this->load->view('layout',$data);
	}

  public function ajax_list()
  {
    $this->load->helper('url');

    $list = $this->M_trans_potongan->get_data();
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

            "recordsTotal" => $this->M_trans_potongan->count_all(),
            "recordsFiltered" => $this->M_trans_potongan->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_list2()
  {
    $this->load->helper('url');

    $list = $this->M_trans_potongan->get_detail();
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
				$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="delete_person('."'".$d->id_trans_potongan."'".')"><i class="ft-trash"></i></a>';
			}

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_trans_potongan->count_all_detail(),
            "recordsFiltered" => $this->M_trans_potongan->count_filtered_detail(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_edit($id)
	{
		$data = $this->M_trans_potongan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
    $insert = array(
        'id_potongan' => $this->input->post('id_potongan'),
        'id_karyawan' => $this->input->post('id'),
        'periode' => date('Ym'),
        'jumlah' => str_replace(".", "", $this->input->post('jumlah')),
        'keterangan' =>  $this->input->post('keterangan'),
        'tgl_trans' => date('Y-m-d'),
        'operator' => $this->session->userdata('yangLogin'),
				'st_data' => 0
  			);
        // var_dump($insert);
        // exit();
		$this->M_trans_potongan->save_detail($insert);
		echo json_encode(array("status" => TRUE));
	}

	public function konfirmasi(){
			$get_data=$this->M_trans_potongan->get_detail();
			foreach ($get_data as $data) {
				$update = array(
					'st_data' => 1,
					);
				$this->M_trans_potongan->konfirmasi(array('id_trans_tunjangan' => $data->id_trans_tunjangan), $update);
			}
			redirect('master/hrd/trans_potongan');
	}

	public function unkonfirmasi(){
			$get_data=$this->M_trans_potongan->get_detail();
			foreach ($get_data as $data) {
				$update = array(
					'st_data' => 0,
					);
				$this->M_trans_potongan->konfirmasi(array('id_trans_tunjangan' => $data->id_trans_tunjangan), $update);
			}
			redirect('master/hrd/trans_potongan');
	}

	public function ajax_delete($id)
	{
	  $this->M_trans_potongan->delete_by_id($id);
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
