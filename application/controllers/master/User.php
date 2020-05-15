<?php


class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['employee']= $this->M_user->get_employee();
		$data['employe']= $this->M_user->get_employee();
		$data['pages']='master/user/list';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_user->get_user();
		$data = array();

		foreach ($list as $d) {
			if ($d->status_user=='A') {
				$status= '<p class="badge badge-success" style="font-size: 15px;">'."Aktif";
			}elseif ($d->status_user=='N') {
				$status= '<p class="badge badge-danger" style="font-size: 15px;">'."Non Aktif";
			}

			$row = array();
					$row[] = '<h5 class="text-bold-500">'.$d->id_user;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_karyawan;
			$row[] = $status;
			// $row[] = '<h5 class="text-bold-500">'.$d->password;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_user."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_user."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						
						"recordsTotal" => $this->M_user->count_all(),
						"recordsFiltered" => $this->M_user->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_user->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'id_karyawan' => $this->input->post('id_karyawan'),
			'nama_user' => $this->input->post('nama_user'),
			'status_user' => $this->input->post('status_user'),
			'password' => $this->input->post('password'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_user->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
			'id_karyawan' => $this->input->post('id_karyawan'),
			'nama_user' => $this->input->post('nama_user'),
			'status_user' => $this->input->post('status_user'),
			'password' => $this->input->post('password'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_user->update(array('id_user' => $this->input->post('id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_user->delete_by_id($id);
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

    public function change_password(){
        $pwd_baru 	= $this->input->post('password_baru');
        $id_user	= $this->conversion->get_user_login();

        $this->_validate_change_password();

        $this->db->trans_begin();
        $this->M_user->update([M_user::id_user => $id_user],[M_user::password => $pwd_baru]);
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $status    = false;
            $message   = 'Proses Gagal. Silahkan Ulangi.';
            $sw_alert  = true;
        }
        else
        {
            $this->db->trans_commit();
            $status    = true;
            $message   = 'Password Anda Berhasil Diubah';
        }

        $data = [
            'status' 	=> $status,
            'message' 	=> $message,
            'sw_alert'	=> isset($sw_alert) ? $sw_alert : FALSE
        ];
        echo json_encode($data);
    }

    private function _validate_change_password()
    {
        $this->conversion->translate_error_form_validation();
        //inisialisasi
        $data = $data['inputerror'] = $data['notiferror'] = $data['notiferror'] = [];
        $data['status']		= TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']   = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

        //FORM VALIDATION CODEIGNITER
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[5]|alpha_numeric|max_length[20]');
        $this->form_validation->set_rules('konfirm_password_baru', 'Konfirm Password', 'required|trim|matches[password_baru]|min_length[5]|alpha_numeric|max_length[20]');

        //CATCH VALIDATION CODEIGNITER
        if ($this->form_validation->run() == FALSE){
            $data['status'] = FALSE;
            foreach ($this->form_validation->error_array() as $dtl => $value) {
                $data['inputerror'][]   = $dtl;
                $data['notiferror'][]   = Conversion::template_error($value);
            }
        }

        // Custom validation
        $pwd_lama	= $this->input->post('password_lama');
        $pwd_baru	= $this->input->post('password_baru');
        $id_user	= $this->conversion->get_user_login();
        if($user = $this->M_user->get_by_id($id_user)){
            if($pwd_lama != $user->password){
                $data['inputerror'][]   = 'password_lama';
                $data['notiferror'][]   = Conversion::template_error('Password Lama Salah');
                $data['status']         = FALSE;
            }elseif($pwd_baru == $pwd_lama){
                $data['inputerror'][]   = 'password_baru';
                $data['notiferror'][]   = Conversion::template_error('Password Baru Tidak Boleh Sama Dengan Password Lama');
                $data['status']         = FALSE;
            }
        }else{
            $data['message']        = 'Data User Tidak Ditemukan';
            $data['sw_alert']       = TRUE;
            $data['status']         = FALSE;
        }

        if(!$data['status'])
        {
            echo json_encode($data);
            exit();
        }
    }
}
