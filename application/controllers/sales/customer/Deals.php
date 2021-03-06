<?php


class Deals extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
			$this->load->model('M_master_agen');
		$this->M_login->isLogin();
		$this->load->model('M_Customer');
	}

	public function index(){
		$data['agen']=$this->M_master_agen->get_data();
		$data['pages']='sales/customer/list_deals';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_Customer->get_user_deals();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
			                      aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
			                      <div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0)" onclick="project('."'".$d->id_customer."'".')"><i class="ft-save"></i> Generate To Project</a>
                                                            <a class="dropdown-item" href="javascript:void(0)" onclick="perbarui('."'".$d->id_customer."'".')"><i class="ft-edit"></i> Update</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="view('."'".$d->id_customer."'".')"><i class="ft-file"></i> View Detail</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="perbarui('."'".$d->id_customer."'".')"><i class="ft-edit"></i> Update</a>
			                      </div>';
														// <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_customer."'".')"><i class="ft-trash"></i> Delete</a>
			$row[] = $d->id_customer;
			$row[] = $d->nm_customer;
            $row[] = $d->nm_perusahaan;
			$row[] = $d->tlp_customer;
			$row[] = $d->telp2_customer;
			$row[] = $d->email_customer;
			$row[] = $d->kota_customer;;
			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = $date	;
			$row[] = $d->inputby;




			$data[] = $row;
		}

		$output = array(

						"recordsTotal" => $this->M_Customer->count_all_deals(),
						"recordsFiltered" => $this->M_Customer->count_filtered_deals(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_Customer->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_customer' => $this->M_Customer->get_ID('id_customer'),
			'nm_customer' => $this->input->post('nm_customer'),
			'tlp_customer' => $this->input->post('tlp_customer'),
			'telp2_customer' => $this->input->post('telp2_customer'),
			'email_customer' => $this->input->post('email_customer'),
			'kota_customer' => $this->input->post('kota_customer'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_Customer->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_lost()
	{
		//$this->_validate();
		$data = array(
			'status' => 3,
			'keterangan_deals' => $this->input->post('keterangan_deals'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_Customer->update(array('id_customer' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_deals()
	{
		//$this->_validate();
		$data = array(
			'status' => 2,
			'keterangan_deals' => $this->input->post('keterangan_deals'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_Customer->update(array('id_customer' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

    public function ajax_perbarui()
    {
        $this->_validate();
        $kode=date('Ymds');
        $data = array(
            'id_customer' => $this->M_Customer->get_ID('id_customer'),
            'kd_cabang' => $this->session->userdata('cabang'),
            'nm_customer' => $this->input->post('nm_customer'),
            'alamat' => $this->input->post('alamat'),
            'nm_perusahaan' => $this->input->post('nm_perusahaan'),
            'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
            'jns_usaha' => $this->input->post('jns_usaha'),
            'bidang_usaha' => $this->input->post('bidang_usaha'),
            'Agen' => $this->input->post('Agen'),
            'nm_customer' => $this->input->post('nm_customer'),
            'tlp_customer' => $this->input->post('tlp_customer'),
            'telp2_customer' => $this->input->post('telp2_customer'),
            'email_customer' => $this->input->post('email_customer'),
            'kota_customer' => $this->input->post('kota_customer'),
            'status' => 2,
            'keterangan' => $this->input->post('keterangan'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'inputby' => $this->session->userdata('yangLogin'),
            'id_layanan' => $this->input->post('id_layanan'),
        );

//        var_dump($data);
//        exit();

        $this->M_Customer->update(array('id_customer' => $this->input->post('id')), $data);

        echo json_encode(array("status" => TRUE));
    }

	public function ajax_delete($id)
	{
		$this->M_Customer->delete_by_id($id);
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

			if (empty($this->input->post('nm_customer'))) {
					$error                  = 'Nama Customer Tidak Boleh Kosong';
					$data['inputerror'][]   = 'nm_customer';
					$data['notiferror'][]   = $prefix.$error.$suffix;
					$data['error_string'][] = $error;
					$data['status']         = FALSE;
			}

			if (empty($this->input->post('nm_perusahaan'))) {
					$error                  = 'Nama Perusahaan Tidak Boleh Kosong';
					$data['inputerror'][]   = 'Perusahaan';
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
