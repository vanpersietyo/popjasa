<?php


class Deal extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('sales/M_reason_deal', 'M_reason_deal');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['pages']='sales/reason/deal';
		$this->load->view('layout',$data);
	}


		public function ajax_list()
		{
			$this->load->helper('url');

			$list = $this->M_reason_deal->get_data();
			$data = array();

			foreach ($list as $d) {

				$row = array();
	      $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
	                  aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
	                  <div class="dropdown-menu">
	                    <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_reason_deal."'".')"><i class="ft-edit"></i> Update</a>
	                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_reason_deal."'".')"><i class="ft-trash"></i> Delete</a>
	                  </div>';
				$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
				$row[] = '<h5 class="text-bold-500">'.$d->tgl_input;
				$row[] = '<h5 class="text-bold-500">'.$d->inputby;

				//add html for action

				$data[] = $row;
			}

			$output = array(

							"recordsTotal" => $this->M_reason_deal->count_all(),
							"recordsFiltered" => $this->M_reason_deal->count_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output);
		}

		public function ajax_edit($id)
		{
			$data = $this->M_reason_deal->get_by_id($id);
			//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
			echo json_encode($data);
		}

		public function ajax_add()
		{
			//$this->_validate();
			$kode=date('Ymds');
			$data = array(
				'keterangan' => $this->input->post('keterangan'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'inputby' => $this->session->userdata('yangLogin'),
				);

			$insert = $this->M_reason_deal->save($data);

			echo json_encode(array("status" => TRUE));
		}

		public function ajax_update()
		{
			//$this->_validate();
			$data = array(
				'keterangan' => $this->input->post('keterangan'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'inputby' => $this->session->userdata('yangLogin'),
				);
			$this->M_reason_deal->update(array('id_reason_deal' => $this->input->post('id_reason_deal')), $data);
			echo json_encode(array("status" => TRUE));
		}

		public function ajax_delete($id)
		{
			$this->M_reason_deal->delete_by_id($id);
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
