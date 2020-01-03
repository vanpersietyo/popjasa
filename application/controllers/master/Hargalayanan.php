<?php


class Hargalayanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_harga');
		$this->load->model('M_login');
		$this->M_login->isLogin();
	}

	public function index(){
		$data['produk']=$this->M_harga->get_layanan();
		$data['pages']='master/harga/list_harga';
		$this->load->view('layout',$data);
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->M_harga->get_user();
		$data = array();

		foreach ($list as $d) {
			$row = array();
			$row[] = '<h5 class="text-bold-500">'.$d->id_hrg_layanan;
			$row[] = '<h5 class="text-bold-500">'.$d->nama_layanan;
			$row[] = '<h5 class="text-bold-500">'.number_format($d->harga);
			$row[] = '<h5 class="text-bold-500">'.$d->keterangan;
			// $row[] = '<h5 class="text-bold-500">'.$d->password;

			$date=date("d/m/Y", strtotime($d->tgl_input));
			$row[] = '<h5 class="text-bold-500">'.$date	;
			$row[] = '<h5 class="text-bold-500">'.$d->inputby;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$d->id_hrg_layanan."'".')"><i class="la la-edit"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$d->id_hrg_layanan."'".')"><i class="la la-close"></i></a>';

			$data[] = $row;
		}

		$output = array(
						
						"recordsTotal" => $this->M_harga->count_all(),
						"recordsFiltered" => $this->M_harga->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_harga->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		$kode=date('Ymds');
		$data = array(
			'id_hrg_layanan' => $this->M_harga->get_ID('id_hrg_layanan'),
			'id_layanan' => $this->input->post('id_layanan'),
			'harga' => $this->input->post('harga'),
            'hpp' => $this->input->post('hpp'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);

		$insert = $this->M_harga->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
			'id_layanan' => $this->input->post('id_layanan'),
			'harga' => $this->input->post('harga'),
            'hpp' => $this->input->post('hpp'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
			);
		$this->M_harga->update(array('id_hrg_layanan' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_harga->delete_by_id($id);
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

    /**
     * created_at: 2019-12-04
     * created_by: Afes Oktavianus
     * function: show filter with layanan in form create project
     */
    public function find_by_layanan($id){
        $list   = $this->M_harga->get_by_layanan_id($id);
        if ($list) {
            $data = [
                'status'=> true,
                'harga'=> $list->harga,
            ];
        }else {
            $data['status'] = FALSE;
        }

        echo json_encode($data);
    }




}
