<?php


class Absensi_karyawan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('hrd/M_absensi_karyawan', 'M_absensi_karyawan');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
    $data['jabatan']= $this->M_absensi_karyawan->get_jabatan();
    $data['jabataan']= $this->M_absensi_karyawan->get_jabatan();
		$data['pages']='master/hrd/absensi/list_absensi';
		$this->load->view('layout',$data);
	}

  public function ajax_list()
  {
    $this->load->helper('url');

    $list = $this->M_absensi_karyawan->get_data();
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
      $row[] = $status;
			$row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Perbarui Absensi Karyawan" onclick="edit_person('."'".$d->id_karyawan."'".')"><i class="ft-user"></i></a>';



      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_absensi_karyawan->count_all(),
            "recordsFiltered" => $this->M_absensi_karyawan->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_list2()
  {
    $this->load->helper('url');

    $list = $this->M_absensi_karyawan->get_detail();
    $data = array();

    foreach ($list as $d) {
      if ($d->status_masuk=='M') {
        $status= '<p class="badge badge-success" style="font-size: 15px;">'."Masuk";
      }elseif ($d->status_masuk=='P') {
        $status= '<p class="badge badge-danger" style="font-size: 15px;">'."Pulang";
      }

      $row = array();

      $row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
      $row[] = '<h5 class="text-bold-500">'.$status;
      $date=date("d/m/Y H:i:s", strtotime($d->tgl_absen));
			 $row[] = '<h5 class="text-bold-500">'.$date;
			 //$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tambah Piutang Karyawan" onclick="delete_person('."'".$d->id_absen."'".')"><i class="ft-trash"></i></a>';

      //add html for action

      $data[] = $row;
    }

    $output = array(

            "recordsTotal" => $this->M_absensi_karyawan->count_all_detail(),
            "recordsFiltered" => $this->M_absensi_karyawan->count_filtered_detail(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

	public function ajax_edit($id)
	{
		$data = $this->M_absensi_karyawan->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate($this->input->post('id'));
    $insert = array(
  			'id_absen' => $this->M_absensi_karyawan->get_ID('id_absen'),
        'id_karyawan' => $this->input->post('id'),
        'status' => $this->input->post('status'),
        'keterangan' =>  $this->input->post('keterangan'),
        'tgl_absen' => date('Y-m-d H:i:s'),
        'tgl_absen2' => date('Y-m-d'),
        'operator' => $this->session->userdata('yangLogin')
  			);
		$this->M_absensi_karyawan->update($insert);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$get_jml_byr=$this->M_absensi_karyawan->get_bayar($id);
		$get_total_byr=$this->M_absensi_karyawan->get_total($id);
		// var_dump($get_total_byr->jml_piutang);
		// exit();
		$get_total_byr=$this->M_absensi_karyawan->get_total($id);
    $bayar=(($get_total_byr->jml_piutang)-($get_jml_byr->jumlah_piutang));

		$data = array(
			'jml_piutang' => $bayar,
			);

		$this->M_absensi_karyawan->update_delete(array('id_karyawan' => $get_jml_byr->id_karyawan), $data);
		// //var_dump($this->db->last_query());
	  $this->M_absensi_karyawan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function konfirmasi($user){
		if ($user=='') {
			redirect('master/hrd/piutang_karyawan');
		}else {
			$get_data=$this->M_absensi_karyawan->get_detail($user);
			foreach ($get_data as $data) {
				$update = array(
					'st_data' => 1,
					);
				$this->M_absensi_karyawan->konfirmasi(array('id_piut_krywn' => $data->id_piut_krywn), $update);
			}
			redirect('master/hrd/piutang_karyawan');
		}
	}

  public function history($id){
    $data['id']=$id;
    $data['get_karyawan']=$this->M_absensi_karyawan->get_by_id($id);
    $data['pages']='master/hrd/piutang_karyawan/list_history_piutang';
    $this->load->view('layout',$data);
  }

  public function ajax_history($id)
  {
    $this->load->helper('url');

    $list = $this->M_absensi_karyawan->get_history($id);
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

            "recordsTotal" => $this->M_absensi_karyawan->count_all_history($id),
            "recordsFiltered" => $this->M_absensi_karyawan->count_filtered_history($id),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
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

			if (empty($this->input->post('status'))) {
					$error                  = 'Jumlah Status Tidak Boleh Kosong';
					$data['inputerror'][]   = 'status';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}

			$absen_masuk=$this->M_absensi_karyawan->get_by_id_absensi_m($id, $this->input->post('status'));

			if ($absen_masuk!=0) {
				$error                  = 'Sudah Absen';
				$data['inputerror'][]   = 'status';
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
