<?php


class Piutang_karyawan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_piutang_karyawan', 'M_piutang_karyawan');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
    $data['jabatan']= $this->M_piutang_karyawan->get_jabatan();
    $data['jabataan']= $this->M_piutang_karyawan->get_jabatan();
		$data['pages']='master/hrd/piutang_karyawan/list_piutang_karyawan';
		$this->load->view('layout',$data);
	}

  public function ajax_list()
  {
    $this->load->helper('url');

    $list = $this->M_piutang_karyawan->get_data();
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
      $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Rekap Piutang Karyawan" onclick="detail('."'".$d->id_karyawan."'".')"><i class="ft-file"></i></a>';

      // $row[] = '<h5 class="text-bold-500">'.$d->id_karyawan;
      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
      // $row[] = '<h5 class="text-bold-500">'.$d->nama_jabatan;
      // $row[] = $jk;
      // $row[] = $status;
			  // $row[] = number_format($d->jml_piutang);
      $row[] = number_format($d->jml_piutang-$d->jml_bayar);
			$row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="edit_person('."'".$d->id_karyawan."'".')"><i class="ft-plus"></i></a>';



      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_piutang_karyawan->count_all(),
            "recordsFiltered" => $this->M_piutang_karyawan->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_list2()
  {
    $this->load->helper('url');

    $list = $this->M_piutang_karyawan->get_detail();
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
      $row[] = $d->jumlah_piutang;
			 $row[] = '<h5 class="text-bold-500">'.$d->input_by;
			 $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="delete_person('."'".$d->id_piut_krywn."'".')"><i class="ft-trash"></i></a>';

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_piutang_karyawan->count_all_detail(),
            "recordsFiltered" => $this->M_piutang_karyawan->count_filtered_detail(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_edit($id)
	{
		$data = $this->M_piutang_karyawan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate();
    $get_piutang=$this->M_piutang_karyawan->get_jml_piutang($this->input->post('id'));
    $piutang=(($get_piutang->jml_piutang)+str_replace(".", "", $this->input->post('jml_piutang')));
    // var_dump($piutang);
    // exit();
		$data = array(
			'jml_piutang' => $piutang,
			);

    $insert = array(
  			'id_piut_krywn' => $this->M_piutang_karyawan->get_ID('id_karyawan'),
        'id_karyawan' => $this->input->post('id'),
        'jumlah_piutang' => str_replace(".", "", $this->input->post('jml_piutang')),
        'keterangan' =>  $this->input->post('keterangan'),
        'tgl_input' => date('Y-m-d'),
        'input_by' => $this->session->userdata('yangLogin')
  			);

		$kartu = array(
  			'id_trans' => $this->M_piutang_karyawan->get_ID('id_karyawan'),
        'id_karyawan' => $this->input->post('id'),
        'jumlah' => str_replace(".", "", $this->input->post('jml_piutang')),
				'st_kartu'=>'K',
        'note_kartu' =>  $this->input->post('keterangan'),
        'tgl_buat' => date('Y-m-d H:i:s'),
        'id_opr' => $this->session->userdata('yangLogin')
  			);

		$this->M_piutang_karyawan->update(array('id_karyawan' => $this->input->post('id')), $data,$insert,$kartu);
    // var_dump($data);
    // exit();
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$get_jml_byr=$this->M_piutang_karyawan->get_bayar($id);
		$get_total_byr=$this->M_piutang_karyawan->get_total($id);
		// var_dump($get_total_byr->jml_piutang);
		// exit();
		$get_total_byr=$this->M_piutang_karyawan->get_total($id);
    $bayar=(($get_total_byr->jml_piutang)-($get_jml_byr->jumlah_piutang));

		$data = array(
			'jml_piutang' => $bayar,
			);

		$this->M_piutang_karyawan->update_delete(array('id_karyawan' => $get_jml_byr->id_karyawan), $data);
		// //var_dump($this->db->last_query());
	  $this->M_piutang_karyawan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function konfirmasi($user){
		if ($user=='') {
			redirect('master/hrd/piutang_karyawan');
		}else {
			$get_data=$this->M_piutang_karyawan->get_detail($user);
			foreach ($get_data as $data) {
				$update = array(
					'st_data' => 1,
					);
				$this->M_piutang_karyawan->konfirmasi(array('id_piut_krywn' => $data->id_piut_krywn), $update);
			}
			redirect('master/hrd/piutang_karyawan');
		}
	}

  public function history($id){
    $data['id']=$id;
    $data['get_karyawan']=$this->M_piutang_karyawan->get_by_id($id);
    $data['pages']='master/hrd/piutang_karyawan/list_history_piutang';
    $this->load->view('layout',$data);
  }

  public function ajax_history($id)
  {
    $this->load->helper('url');

    $list = $this->M_piutang_karyawan->get_history($id);
    $data = array();

    foreach ($list as $d) {
      if ($d->st_kartu=='D') {
        $status= '<p class="badge badge-success" style="font-size: 15px;">'."Bayar";
      }elseif ($d->st_kartu=='K') {
        $status= '<p class="badge badge-danger" style="font-size: 15px;">'."Piutang";
      }


      $row = array();

      $row[] = '<h5 class="text-bold-500">'.$d->id_trans;
      $row[] = '<h5 class="text-bold-500">'.$d->id_karyawan;
      $row[] = $status;
      $row[] = $d->jumlah;
      $date=date("d/m/Y H:i", strtotime($d->tgl_buat));
      $row[] = '<h5 class="text-bold-500">'.$date	;
      $row[] = '<h5 class="text-bold-500">'.$d->id_opr;

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_piutang_karyawan->count_all_history($id),
            "recordsFiltered" => $this->M_piutang_karyawan->count_filtered_history($id),
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

			if (empty($this->input->post('jml_piutang'))) {
					$error                  = 'Jumlah piutang Tidak Boleh Kosong';
					$data['inputerror'][]   = 'jml_piutang';
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
