<?php


class Cuti extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_cuti', 'M_cuti');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
    $data['jabatan']= $this->M_cuti->get_jabatan();
    $data['jabataan']= $this->M_cuti->get_jabatan();
		$data['pages']='master/hrd/cuti/list_cuti';
		$this->load->view('layout',$data);
	}

  public function ajax_list()
  {
    $this->load->helper('url');

    $list = $this->M_cuti->get_data();
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
      $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="History Absensi Karyawan" onclick="detail('."'".$d->id_karyawan."'".')"><i class="ft-file"></i></a>';
      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
			$row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Perbarui Absensi Karyawan" onclick="edit_person('."'".$d->id_karyawan."'".')"><i class="ft-user"></i></a>';



      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_cuti->count_all(),
            "recordsFiltered" => $this->M_cuti->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_list2()
  {
    $this->load->helper('url');

    $list = $this->M_cuti->get_detail();
    $data = array();

    foreach ($list as $d) {

      $row = array();

      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
			$row[] = '<h5 class="text-bold-500">'.$d->jml_cuti;
			  $date1=date("d/m/Y", strtotime($d->tgl_cuti));
      $row[] = '<h5 class="text-bold-500">'.$date1;
    	  $date2=date("d/m/Y", strtotime($d->tgl_cuti2));
		  $row[] = '<h5 class="text-bold-500">'.$date2;
			$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
      //add html for action
			if ($d->st_konfirmasi==1) {
				$row[] = '<a class="btn btn-sm btn-danger disabled" title="Delete" ><i class="ft-trash"></i></a>
				<a class="btn btn-sm btn-dark disabled" ><i class="ft-check"></i></a>';
			}else{
				$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$d->id_cuti."'".')"><i class="ft-trash"></i></a>
				<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="konfirmasi data" onclick="konfirmasi('."'".$d->id_cuti."'".')"><i class="ft-check"></i></a>';
			}

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_cuti->count_all_detail(),
            "recordsFiltered" => $this->M_cuti->count_filtered_detail(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_edit($id)
	{
		$data = $this->M_cuti->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate($this->input->post('id'));
			$hari=($this->input->post('jml_cuti'));
			$tgl_awal=date("Y-m-d", strtotime($this->input->post('tgl_cuti')));
			$tgl_akhir=date('Y-m-d', strtotime("+$hari days", strtotime($tgl_awal)));
    $insert = array(
  			'id_cuti' => $this->M_cuti->get_ID('id_absen'),
        'id_karyawan' => $this->input->post('id'),
        'jns_cuti' => $this->input->post('status'),
        'tgl_cuti' =>  $tgl_awal,
				'tgl_cuti2' => $tgl_akhir,
				'jml_cuti' =>  $this->input->post('jml_cuti'),
				'keterangan' =>  $this->input->post('keterangan'),
        'tgl_input' => date('Y-m-d H:i:s'),
        'operator' => $this->session->userdata('yangLogin')
  			);

		$this->M_cuti->update($insert);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
	  $this->M_cuti->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_konfirmasi($id)
	{
		$data = array(
			'st_konfirmasi' => 1,
				'konfirmasi_by' => $this->session->userdata('yangLogin'),
	 );
		$this->M_cuti->konfirmasi_by_id(array('id_cuti' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate($id)
	{
			$data                   = [];
			$data['error_string']   = array();
			$data['inputerror']     = array();
			$data['notiferror']     = array();
			$data['status']         = TRUE;

			$prefix ='<p class="badge-default badge-danger block-tag text-center">
									<small class="block-area white">';
			$suffix ='</small</p>';

			if (empty($this->input->post('tgl_cuti'))) {
					$error                  = 'Tgl Cuti Tidak Boleh Kosong';
					$data['inputerror'][]   = 'tgl_cuti';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}

			if (empty($this->input->post('jml_cuti'))) {
					$error                  = 'Jumlah Cuti Tidak Boleh Kosong';
					$data['inputerror'][]   = 'jml_cuti';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}

			if (empty($this->input->post('keterangan'))) {
					$error                  = 'Keterangan Anda Cuti Tidak Boleh Kosong';
					$data['inputerror'][]   = 'keterangan';
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
