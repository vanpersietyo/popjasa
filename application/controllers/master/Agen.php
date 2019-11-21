<?php


class Agen extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_master_agen');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['pages']='master/agen/list';
		$this->load->view('layout',$data);
	}


		public function ajax_list()
		{
			$this->load->helper('url');

			$list = $this->M_master_agen->get_data();
			$data = array();

			foreach ($list as $d) {

				$row = array();
	      $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
	                  aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
	                  <div class="dropdown-menu">
	                    <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_agen."'".')"><i class="ft-edit"></i> Update</a>
	                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_agen."'".')"><i class="ft-trash"></i> Delete</a>
	                  </div>';
				$row[] = '<h5 class="text-bold-500">'.$d->nm_agen;
        $row[] = '<h5 class="text-bold-500">'.$d->email_agen;
        $row[] = '<h5 class="text-bold-500">'.$d->telp_agen;
        $row[] = '<h5 class="text-bold-500">'.$d->hp_agen;
        $row[] = '<h5 class="text-bold-500">'.$d->alamat_agen;
				$row[] = '<h5 class="text-bold-500">'.$d->tgl_trans;
				$row[] = '<h5 class="text-bold-500">'.$d->operator;

				//add html for action

				$data[] = $row;
			}

			$output = array(

							"recordsTotal" => $this->M_master_agen->count_all(),
							"recordsFiltered" => $this->M_master_agen->count_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output);
		}

		public function ajax_edit($id)
		{
			$data = $this->M_master_agen->get_by_id($id);
			//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
			echo json_encode($data);
		}

		public function ajax_add()
		{
			//$this->_validate();
			$kode=date('Ymds');
			$data = array(
      	'nm_agen' => $this->input->post('nm_agen'),
      	'email_agen' => $this->input->post('email_agen'),
      	'telp_agen' => $this->input->post('telp_agen'),
      	'hp_agen' => $this->input->post('hp_agen'),
        'alamat_agen' => $this->input->post('alamat_agen'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_trans' => date('Y-m-d H:i:s'),
				'operator' => $this->session->userdata('yangLogin'),
				);

			$insert = $this->M_master_agen->save($data);

			echo json_encode(array("status" => TRUE));
		}

		public function ajax_update()
		{
			//$this->_validate();
			$data = array(
        'nm_agen' => $this->input->post('nm_agen'),
      	'email_agen' => $this->input->post('email_agen'),
      	'telp_agen' => $this->input->post('telp_agen'),
      	'hp_agen' => $this->input->post('hp_agen'),
        'alamat_agen' => $this->input->post('alamat_agen'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_trans' => date('Y-m-d H:i:s'),
				'operator' => $this->session->userdata('yangLogin'),
				);
			$this->M_master_agen->update(array('id_agen' => $this->input->post('id_agen')), $data);
			echo json_encode(array("status" => TRUE));
		}

		public function ajax_delete($id)
		{
			$this->M_master_agen->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}

		private function _validate()
		{
			$data = array();
			$data['error_string'] = array();
			$data['inputerror'] = array();
			$data['status'] = TRUE;

			if($this->input->post('keterangan') == '')
			{
				$data['inputerror'][] = 'keteraengan';
				$data['error_string'][] = 'Lost Reason Belum di Isi ..';
				$data['status'] = FALSE;
			}

			if($data['status'] === FALSE)
			{
				echo json_encode($data);
				exit();
			}
		}




}
