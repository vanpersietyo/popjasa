<?php


class Gaji extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_gaji', 'M_gaji');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['jabatan']= $this->M_gaji->get_jabatan();
		$data['jabataan']= $this->M_gaji->get_jabatan();
		$data['pages']='master/hrd/gaji/list_gaji';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_gaji->get_user();
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
      $row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Setup Gaji" onclick="edit_person('."'".$d->id_karyawan."'".')"><i class="ft-credit-card"></i></a>
                <a class="btn btn-sm btn-info" href="javascript:void(0)" title="History Kenaikan Gaji" onclick="detail('."'".$d->id_karyawan."'".')"><i class="ft-file"></i></a>';

			$row[] = '<h5 class="text-bold-500">'.$d->id_karyawan;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_jabatan;
			$row[] = $status;
      $row[] = '<h5 class="text-bold-500">'.number_format($d->jml_gaji);
			// $row[] = '<h5 class="text-bold-500">'.$d->password;
			$date=date("d/m/Y H:i", strtotime($d->updated_gaji));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->updated_gaji_by;

			//add html for action

			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_gaji->count_all(),
						"recordsFiltered" => $this->M_gaji->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

  public function history($id){
    $data['id']=$id;
    $data['pages']='master/hrd/gaji/list_history';
    $this->load->view('layout',$data);
  }

  public function ajax_history($id)
  {
    $this->load->helper('url');

    $list = $this->M_gaji->get_history($id);
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
      $row[] = '<h5 class="text-bold-500">'.number_format($d->jml_gaji);
      // $row[] = '<h5 class="text-bold-500">'.$d->password;
      $date=date("d/m/Y H:i", strtotime($d->updated_gaji));
      $row[] = '<h5 class="text-bold-500">'.$date	;
      $row[] = '<h5 class="text-bold-500">'.$d->updated_gaji_by;

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_gaji->count_all_history($id),
            "recordsFiltered" => $this->M_gaji->count_filtered_history($id),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_edit($id)
	{
		$data = $this->M_gaji->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
			'jml_gaji' => str_replace(".", "", $this->input->post('jml_gaji')),
      'keterangan_gaji' => $this->input->post('keterangan'),
			'st_data' =>1,
			'updated_gaji' => date('Y-m-d H:i:s'),
			'updated_gaji_by' => $this->session->userdata('yangLogin')
			);

      $data_insert = array(
  			'jml_gaji' => str_replace(".", "", $this->input->post('jml_gaji')),
        'keterangan_gaji' => $this->input->post('keterangan'),
        'id_karyawan' => $this->input->post('id'),
  			'updated_gaji' => date('Y-m-d H:i:s'),
  			'updated_gaji_by' => $this->session->userdata('yangLogin')
  			);

		$this->M_gaji->update(array('id_karyawan' => $this->input->post('id')), $data, $data_insert);
    // var_dump($this->db->last_query());
    // exit();
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

			if (empty($this->input->post('jml_gaji'))) {
					$error                  = 'Jumlah Gaji Tidak Boleh Kosong';
					$data['inputerror'][]   = 'jml_gaji';
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
