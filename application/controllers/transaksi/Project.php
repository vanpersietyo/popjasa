<?php

class Project extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Customer');
		$this->load->model('M_layanan');
		$this->load->model('M_project');
		$this->load->model('M_login');
		$this->load->model('M_master_agen');
		$this->load->model('sales/M_area', 'M_area');
		$this->M_login->isLogin();
	}

	public function index()
	{
		$data['pages'] = 'transaksi/project/list_customer';
		$this->load->view('layout', $data);
	}

	public function ajax_list()
	{
		$list = $this->M_project->get_trs_project_hdr();
		$data = array();

		foreach ($list as $d)
		{
			$row = array();
			if ($d->st_data == 1)
			{
				$status = '<h5 class="text-bold-500 text-info">Confirmed';
				$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="create(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-file"></i> Lihat Project</a>
															<a class="dropdown-item"  href="javascript:void(0)" onclick="invoice(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-printer"></i> Cetak Invoice</a>
															</div>';
			} else
			{
				$status = '<h5 class="text-bold-500 text-red">Not Confirmed';
				$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="create(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-file"></i> Lihat Project</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="delete_project(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-trash"></i> Delete Project</a>
															</div>';
			}

			$row[] = '<h5 class="text-bold-500">' . $d->id_hdr_project;
			$row[] = '<h5 class="text-bold-500">' . $d->nm_project;
			$row[] = '<h5 class="text-bold-500">' . $d->nm_customer;
			$row[] = '<h5 class="text-bold-500">' . number_format($d->jml_penjualan);
			$date = date("d/m/Y", strtotime($d->tgl_input));
			$row[] = $status;
			$row[] = '<h5 class="text-bold-500">' . $date;
			$row[] = '<h5 class="text-bold-500">' . $d->input_by;

			//add html for action
			$data[] = $row;
		}

		$output = [
			"data" => $data
		];
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_Customer->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		$kode = date('Ymds');
		$data = array(
			'id_customer' => $this->M_Customer->get_ID('id_customer'),
			'kd_cabang' => $this->session->userdata('cabang'),
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

	public function ajax_update()
	{
		//$this->_validate();
		$data = array(
			'nm_customer' => $this->input->post('nm_customer'),
			'tlp_customer' => $this->input->post('tlp_customer'),
			'telp2_customer' => $this->input->post('telp2_customer'),
			'email_customer' => $this->input->post('email_customer'),
			'kota_customer' => $this->input->post('kota_customer'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'inputby' => $this->session->userdata('yangLogin'),
		);

		$this->M_Customer->update(array('id_customer' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_Customer->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_project($id)
	{
		$this->M_project->delete_project_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('categoryname') == '')
		{
			$data['inputerror'][] = 'categoryname';
			$data['error_string'][] = 'Nama Kategori Belum di Isi ..';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


	//create Project
	function create($id)
	{
		$data['id_customer'] = $id;
		$data['customer'] = $this->M_Customer->get_by_id($id);
		$data['produk'] = $this->M_project->get_produk();
		$data['pages'] = 'transaksi/project/list_project1';
		$this->load->view('layout', $data);
	}

	function create_new()
	{
		$data['agen'] = $this->M_master_agen->get_data();
		$data['area'] = $this->M_area->get_user();
		$data['pages'] = 'transaksi/project/list_create_new';
		$this->load->view('layout', $data);
	}

	public function ajax_create_new()
	{
		$this->load->helper('url');

		$list = $this->M_Customer->get_user_deals();
		$data = array();

		foreach ($list as $d)
		{
			$row = array();
			$row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Add Project" onclick="project(' . "'" . $d->id_customer . "'" . ')"><i class="ft-plus"></i></a>';
			// $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
			//                       aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
			//                       <div class="dropdown-menu">
			// 												<a class="dropdown-item" href="javascript:void(0)" onclick="project('."'".$d->id_customer."'".')"><i class="ft-save"></i> Generate To Project</a>
			// 												<a class="dropdown-item" href="javascript:void(0)" onclick="view('."'".$d->id_customer."'".')"><i class="ft-file"></i> View Detail</a>
			//                       </div>';
			// <a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_customer."'".')"><i class="ft-trash"></i> Delete</a>
			$row[] = $d->id_customer;
			$row[] = $d->nm_customer;
			$row[] = $d->tlp_customer;
			$row[] = $d->telp2_customer;
			$row[] = $d->email_customer;
			$row[] = $d->kota_customer;;
			$date = date("d/m/Y", strtotime($d->tgl_input));
			$row[] = $date;
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


	function detail($id)
	{
		$data['id_header'] = $id;
		$data['produk'] = $this->M_project->get_trs_project_hdr_id($id);
		$hdr = $this->M_project->get_trs_project_hdr_id($id);
		$data['id_customer'] = $hdr->id_customer;
		$data['customer'] = $this->M_Customer->get_by_id($hdr->id_customer);
		$data['produk'] = $this->M_project->get_produk();
		if ($hdr->st_data == 1)
		{
			$data['status'] = 'disabled';
		} else
		{
			$data['status'] = '';
		}

		$data['pages'] = 'transaksi/project/list_project2';
		$this->load->view('layout', $data);
	}

	public function ajax_project($id)
	{
		$this->load->helper('url');

		$list = $this->M_project->get_user($id);
		$data = array();

		foreach ($list as $d)
		{
			$row = array();
			$row[] = '<h5 class="text-bold-500">' . $d->nama_layanan;
			$row[] = $d->harga;
			$row[] = $d->harga_jual;
			$date = date("d/m/Y", strtotime($d->tgl_input));
			//$row[] = '<h5 class="text-bold-500">'.$date	;

			if ($d->st_data == 1)
			{
				$row[] = '<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false" disabled><i class="ft-menu" ></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"><i class="ft-edit"></i>Update</a>
																<a class="dropdown-item"><i class="ft-trash"></i>Delete</a>
															</div>';
			} else
			{
				$row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person(' . "'" . $d->id_project . "'" . ')"><i class="ft-edit"></i>Update</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person(' . "'" . $d->id_project . "'" . ')"><i class="ft-trash"></i>Delete</a>
															</div>';
			}
			//add html for action
			// $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
			//                       aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
			// 											<div class="dropdown-menu">
			// 												<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_project."'".')"><i class="ft-edit"></i>Update</a>
			// 												<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_project."'".')"><i class="ft-trash"></i>Delete</a>
			// 											</div>';

			$data[] = $row;
		}

		$output = array(

			"recordsTotal" => $this->M_project->count_all_project($id),
			"recordsFiltered" => $this->M_project->count_filtered_project($id),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_project_produk($id)
	{
		$this->load->helper('url');

		$list = $this->M_project->get_produk();
		$data = array();
		$hdr = $this->M_project->get_trs_project_hdr_id($id);

		foreach ($list as $d)
		{
			$row = array();
			$row[] = '<h5 class="text-bold-500">' . $d->nama_layanan;
			$row[] = '<h5 class="text-bold-500">' . number_format($d->harga);
			if ($hdr->st_data == 1)
			{
				$row[] = '<a class="btn btn-sm btn-dark disabled" href="javascript:void(0)" title="Tambah Penjualan" onclick="add_person(' . "'" . $d->id_layanan . "'" . ')"><i class="ft-plus"></i></a>';
			} else
			{
				$row[] = '<a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Tambah Penjualan" onclick="add_person(' . "'" . $d->id_layanan . "'" . ')"><i class="ft-plus"></i></a>';
			}
			//add html for action
			// $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
			// 											aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
			// 											<div class="dropdown-menu">
			// 												<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_layanan."'".')"><i class="ft-edit"></i>Update</a>
			// 												<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_layanan."'".')"><i class="ft-trash"></i>Delete</a>
			// 											</div>';

			$data[] = $row;
		}

		$output = array(

			"recordsTotal" => $this->M_project->count_produk(),
			"recordsFiltered" => $this->M_project->count_produk(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add_project()
	{
		//$this->_validate();
		$kode = date('Ymds');
		$data = array(
			'id_project' => $this->M_project->get_ID('id_project'),
			'id_hdr_project' => $this->input->post('id_hdr_project'),
			'kd_cabang' => $this->session->userdata('cabang'),
			'id_customer' => $this->input->post('id_customer'),
			'id_layanan' => $this->input->post('id_layanan2'),
			'harga_jual' => str_replace(".", "", $this->input->post('harga_jual')),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'input_by' => $this->session->userdata('yangLogin'),
		);


		$insert = $this->M_project->save($data);
		// var_dump($this->db->last_query());
		//	exit();
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit_project($id)
	{
		$data = $this->M_project->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update_project()
	{
		//$this->_validate();
		$data = array(
			//'id_layanan' => $this->input->post('id_layanan'),
			'harga_jual' => str_replace(".", "", $this->input->post('harga_jual')),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_input' => date('Y-m-d H:i:s'),
			'input_by' => $this->session->userdata('yangLogin'),
		);
		$this->M_project->update(array('id_project' => $this->input->post('id')), $data);
		// var_dump( $this->input->post('id'));
		echo json_encode(array("status" => TRUE));
	}

	public function simpan_transaksi($id)
	{
		$jml_penjualan = $this->M_project->get_jml_penjualan($id);
		$hdr = array(
			'id_hdr_project' => $id,
			'kd_cabang' => $this->session->userdata('cabang'),
			'jml_penjualan' => $jml_penjualan->jml_penjualan,
			'keterangan' => 'PENJUALAN PRODUK',
			'st_data' => 1,
		);
		$detail = array(
			'st_data' => 1,
			'id_hdr_project' => $id,
		);
		$this->M_project->simpan_transaksi(array('id_hdr_project' => $id), $hdr, $detail);
		// var_dump($this->db->last_query());
		// exit();

		redirect('transaksi/project/');
	}

	function input_header()
	{
		$jml_penjualan = $this->M_project->get_jml_penjualan($this->input->post('id_customer'));
		$input = array(
			'id_hdr_project' => $this->M_project->get_ID_hdr('id_project'),
			'kd_cabang' => $this->session->userdata('cabang'),
			'nm_project' => $this->input->post('nm_project'),
			'id_customer' => $this->input->post('id_customer'),
			'jml_penjualan' => $jml_penjualan->jml_penjualan,
			'keterangan' => 'PENJUALAN PRODUK',
			'tgl_input' => date('Y-m-d H:i:s'),
			'input_by' => $this->session->userdata('yangLogin'),
			'st_data' => 0,
			'note_project' => $this->input->post('note_project'),
		);
		$id = $this->M_project->get_ID_hdr('id_project');
		$this->M_project->input_header($input);
		redirect('transaksi/project/detail/' . $id);
	}

	public function ajax_delete_project($id)
	{
		$this->M_project->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	// fungsi adit
	public function index_adit(){
		$data['pages'] = 'transaksi/project/index_adit';
		$this->load->view('layout', $data);
	}

	public function create_project(){
		$data = [
			'pages'		=> 'transaksi/project/create_project',
			'customer'	=> $this->M_Customer->find(),
			'layanan'   => $this->M_layanan->find(),
		];
		$this->load->view('layout', $data);
	}

    /**
     * created_at: 2019-12-08
     * created_by: Afes Oktavianus
     * function create project (tbl_project)
     */
	public function simpan_project() {
	    $id = $this->M_project->get_ID();
        $input = array(
            'id_project' => $id,
            'id_hdr_project' => $this->input->post('layanan'),
            'kd_cabang' => $this->session->userdata('cabang'),
            'id_customer' => $this->input->post('id_customer'),
            'id_layanan' => $this->input->post('layanan'),
            'harga_jual' => str_replace(".", "", $this->input->post('hrg_pokok')),
            'nm_project' => $this->input->post('nm_project'),
            'keterangan' => $this->input->post('note_project'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'input_by' => $this->session->userdata('yangLogin'),
            'st_data' => 0,
        );
        $this->M_project->save($input);

        $data = [
            'status' => true,
            'id_project' => $id,
        ];
        echo json_encode($data);
    }

    /**
     * created_at: 2019-12-08
     * created_by: Afes Oktavianus
     * return edit projects for input detail from document
     */
    public function edit_project($id) {
        $project = $this->M_project->find_first(['id_project',$id]);
        if ($project) {
            $customer = $this->M_Customer->find_first(['id_customer',$project->id_customer]);
            $layanan = $this->M_layanan->find_first(['id_layanan',$project->id_layanan]);
            $data = [
                'pages'		=> 'transaksi/project/edit_project',
                'customer'  => $customer,
                'layanan'   => $layanan,
            ];
            $this->load->view('layout', $data);
        }else {
            $data =
            ['pages' => 'transaksi/project/index_adit'];
            $this->load->view('layout', $data);
        }
    }
}
