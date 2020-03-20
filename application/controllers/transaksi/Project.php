<?php

class Project extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Customer');
        $this->load->model('M_layanan');
        $this->load->model('M_project');
        $this->load->model('M_login');
        $this->load->model('M_master_agen');
        $this->load->model('sales/M_area', 'M_area');
        $this->load->model('M_Project_ket');
        $this->load->model('M_Project_izin');
        $this->load->model('M_Project_uraian');
        $this->load->model('M_Project_terima');
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_labarugi', 'M_labarugi');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $data['pages'] = 'transaksi/project/index_adit';
        $this->load->view('layout', $data);
    }

    public function ajax_list()
    {
        $list = $this->M_project->get_trs_project_hdr();
        $data = array();

        foreach ($list as $d) {
            $row = array();
            if ($d->st_data == 1) {
                $status = '<h5 class="text-bold-500 text-info">Confirmed';
                $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="create(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-file"></i> Lihat Project</a>
															<a class="dropdown-item"  href="javascript:void(0)" onclick="invoice(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-printer"></i> Cetak Invoice</a>
															</div>';
            } else {
                $status = '<h5 class="text-bold-500 text-red">Not Confirmed';
                $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="create(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-file"></i> Lihat Project</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="delete_project(' . "'" . $d->id_hdr_project . "'" . ')"><i class="ft-trash"></i> Delete Project</a>
															</div>';
            }

            $row[] = '<h5 class="text-bold-500">' . $d->id_project;
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
        if ($this->input->post('id_customer') == '') {
            $data['inputerror'][] = 'id_customer';
            $data['error_string'][] = 'Nama Customer Belum di Isi ..';
            $data['status'] = FALSE;
        }
        if ($this->input->post('layanan') == '') {
            $data['inputerror'][] = 'layanan';
            $data['error_string'][] = 'Layanan Belum di Isi ..';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
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

        foreach ($list as $d) {
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
        $data['produk'] = $this->M_project->get_trs_project_by_project($id);
        $hdr = $this->M_project->get_trs_project_by_project($id);
        $data['id_customer'] = $hdr->id_customer;
        $data['customer'] = $this->M_Customer->get_by_id($hdr->id_customer);
        $data['produk'] = $this->M_project->get_produk();
        if ($hdr->st_data == 1) {
            $data['status'] = 'disabled';
        } else {
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

        foreach ($list as $d) {
            $row = array();
            $row[] = '<h5 class="text-bold-500">' . $d->nama_layanan;
            $row[] = $d->harga;
            $row[] = $d->harga_jual;
            $date = date("d/m/Y", strtotime($d->tgl_input));
            //$row[] = '<h5 class="text-bold-500">'.$date	;

            if ($d->st_data == 1) {
                $row[] = '<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false" disabled><i class="ft-menu" ></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"><i class="ft-edit"></i>Update</a>
																<a class="dropdown-item"><i class="ft-trash"></i>Delete</a>
															</div>';
            } else {
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

    public function ajax_project2($id)
    {
        $this->load->helper('url');

        $list = $this->M_project->get_user_project($id);
        $data = array();

        foreach ($list as $d) {
            $row = array();
            $row[] = '<h5 class="text-bold-500">' . $d->nama_layanan;
            if ($this->session->userdata('akses_user')=='OPS' | $this->session->userdata('akses_user')=='ops'){
                $row[] = $d->keterangan;
                //$row[] = $d->keterangan;
            }else{
                $row[] = $d->harga;
                $row[] = $d->harga_jual;
            }

            $date = date("d/m/Y", strtotime($d->tgl_input));
            //$row[] = '<h5 class="text-bold-500">'.$date	;

            if ($d->st_data == 1) {
                $row[] = '<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false" disabled><i class="ft-menu" ></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"><i class="ft-edit"></i>Update</a>
																<a class="dropdown-item"><i class="ft-trash"></i>Delete</a>
															</div>';
            } else {
                $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
															    <a class="dropdown-item"  href="javascript:void(0)" onclick="confirm_project(' . "'" . $d->id_project . "'" . ')"><i class="ft-check"></i> Confirm Project</a>																
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
        $hdr = $this->M_project->get_trs_project_by_project($id);

        foreach ($list as $d) {
            $row = array();
            $row[] = '<h5 class="text-bold-500">' . $d->nama_layanan;
            $row[] = '<h5 class="text-bold-500">' . number_format($d->harga);
            if ($hdr->st_data == 1) {
                $row[] = '<a class="btn btn-sm btn-dark disabled" href="javascript:void(0)" title="Tambah Penjualan" onclick="add_person(' . "'" . $d->id_layanan . "'" . ')"><i class="ft-plus"></i></a>';
            } else {
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
    public function index_adit()
    {
        $data['pages'] = 'transaksi/project/index_adit';
        $this->load->view('layout', $data);
    }

    public function create_project()
    {
        $data = [
            'pages' => 'transaksi/project/create_project',
            'customer' => $this->M_Customer->find(),
            'layanan' => $this->M_layanan->find(),
        ];
        $this->load->view('layout', $data);
    }

    /**
     * created_at: 2019-12-08
     * created_by: Afes Oktavianus
     * function create project (tbl_project)
     */
    public function simpan_project()
    {
        $this->_validate();
        $id = $this->M_project->get_ID();
        $input = array(
            'id_project' => $id,
            'id_hdr_project' => $this->input->post('layanan'),
            'kd_cabang' => $this->session->userdata('cabang'),
            'id_customer' => $this->input->post('id_customer'),
            'id_layanan' => $this->input->post('layanan'),
            'harga_jual' => str_replace(".", "", $this->input->post('hrg_pokok')),
            'nm_project' => $this->input->post('nm_project'),
            'st_project' => $this->input->post('st_project'),
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
    public function edit_project($id)
    {
        $project = $this->M_project->find_first(['id_project' => $id]);
        if (!empty($project)) {
            $pjr_customer = $this->M_Customer->find_first(['id_customer' => $project->id_customer]);
            $layanan = $this->M_layanan->find_first(['id_layanan' => $project->id_layanan]);
            $data = [
                'pages' => 'transaksi/project/edit_project',
                'customer' => $pjr_customer,
                'layanan' => $layanan,
                'project' => $project,
            ];
            $this->load->view('layout', $data);
        } else {
            $data =
                ['pages' => 'transaksi/project/index_adit'];
            $this->load->view('layout', $data);
        }
    }

    /**
     * created_at: 2019-12-14
     * created_by: Afes Oktavianus
     * return Ajax list to page index_adit.php
     */
    public function ajax_list2()
    {
        $list = $this->M_project->get_trs_project();
        $data = array();

        foreach ($list as $d) {
            $row = array();
            if ($d->st_data) {
                $status ='<span class="badge badge-success badge-md">Confirmed</span>';
                $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="reconfirm_project(' . "'" . $d->id_project . "'" . ')"><i class="ft-x"></i> Batalkan Confirm Project</a>
															<a class="dropdown-item"  href="javascript:void(0)" onclick="create(' . "'" . $d->id_project . "'" . ')"><i class="ft-file"></i> Lihat Project</a>
															<a class="dropdown-item"  href="javascript:void(0)" onclick="invoice(' . "'" . $d->id_project . "'" . ')"><i class="ft-printer"></i> Cetak Invoice</a>
															</div>';
            } else {
                $status ='<span class="badge badge-danger badge-md">Not Confirmed</span>';
                $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
															<a class="dropdown-item"  href="javascript:void(0)" onclick="create(' . "'" . $d->id_project . "'" . ')"><i class="ft-file"></i> Lihat Project</a>
															<a class="dropdown-item"  href="javascript:void(0)" onclick="confirm_project(' . "'" . $d->id_project . "'" . ')"><i class="ft-check"></i> Confirm Project</a>
															<a class="dropdown-item" href="javascript:void(0)" onclick="delete_project(' . "'" . $d->id_project . "'" . ')"><i class="ft-trash"></i> Delete Project</a>
															</div>';
            }

            $row[] = '<h5 class="text-bold-500">' . $d->id_project;
            $row[] = '<h5 class="text-bold-500">' . $d->nm_project;
            $row[] = '<h5 class="text-bold-500">' . $d->nm_customer;
            $row[] = '<h5 class="text-bold-500">' . number_format($d->harga_jual);
            $row[] = $status;
            $row[] =  '<h5 class="text-bold-500">' .Conversion::convert_date($d->tgl_input,'d-m-Y');
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

    /**
     * function to save records
     * @param type $comp
     * @param type $data
     */
    private function save_edit($comp, $data)
    {
        $project = $data['id_project'];
        if ($comp == 1) {
            $keterangan_values = $this->M_project_ket->find(['id_project' => $project]);
            if (empty($keterangan_values)) {
                $this->M_project_ket->save($data);
            } else {
                $this->M_project_ket->update(['id_project' => $keterangan_values->id_project], $data);
            }
        } elseif ($comp == 2) {
            $izin_values = $this->M_project_izin->find(['id_project' => $project]);
            if (empty($izin_values)) {
                $this->M_project_izin->save($data);
            } else {
                $this->M_project_izin->update(['id_project' => $izin_values->id_project], $data);
            }
        } elseif ($comp == 3) {
            $izin_values = $this->M_project_uraian->find(['id_project' => $project]);
            if (empty($izin_values)) {
                $this->M_project_uraian->save($data);
            } else {
                $this->M_project_uraian->update(['id_project' => $izin_values->id_project], $data);
            }
        } else {
            $izin_values = $this->M_project_terima->find(['id_project' => $project]);
            if (empty($izin_values)) {
                $this->M_project_terima->save($data);
            } else {
                $this->M_project_terima->update(['id_project' => $izin_values->id_project], $data);
            }
        }
    }

    public function save_keterangan()
    {
        $id = $this->M_project->get_ID();
        $input = array(
            'id_project' => $id,
            'id_hdr_project' => $this->input->post('layanan'),
            'kd_cabang' => $this->session->userdata('cabang'),
            'id_customer' => $this->input->post('id_customer'),
            'id_layanan' => $this->input->post('layanan'),
            'harga_jual' => str_replace(".", "", $this->input->post('hrg_pokok')),
            'nm_project' => $this->input->post('nm_project'),
            'st_project' => $this->input->post('st_project'),
            'keterangan' => $this->input->post('note_project'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'input_by' => $this->session->userdata('yangLogin'),
            'st_data' => 0,
        );
        return save_edit(1, $input);
    }
    
    public function confirm($id)
    {        
        $detail = array(
            'st_data' => 1,
            'id_project' => $id,
        );
        $this->M_project->update(array('id_project' => $id), $detail);

        echo json_encode(array("status" => TRUE));
    }

    public function reconfirm($id)
    {
        $detail = array(
            'st_data' => 0,
            'id_project' => $id,
        );
        $this->M_project->update(array('id_project' => $id), $detail);

        echo json_encode(array("status" => TRUE));
    }

    public function simpan_edit_project()
    {
        $id = $this->input->post('id_project');

        $data = [
            'nm_project' => $this->input->post('nm_project'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->M_project->update(array('id_project' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function cetak_invoice($id_project){
            $cabang=$this->session->userdata('nm_cabang');
            $sysdate=date('d/m/Y H:i');

            $pdf = new FPDF('l','mm','A4');
            // membuat halaman baru
            $pdf->AddPage('P');
            // setting jenis font yang akan digunakan
            $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',180,10,0,20);
            $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,10,0,20);
            $pdf->SetFont('Times','B',16);
            // mencetak string
            $sysdate=date('d/m/Y H:i');
            $pdf->Cell(0,7,"INVOICE PEMBAYARAN PROJECT",0,2,'C');
            $pdf->Cell(0,5,"POPJASA",0,2,'C');
            $pdf->SetFont('Times','B',8);
            $pdf->Cell(10,5,'',0,1);
            $pdf->Cell(0,1,"KANTOR CABANG : $cabang",0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(2,5,'________________________________________________________________________________',0,1,'L');
            $pdf->SetFont('Times','B',8);
            $pdf->Cell(280,5,"Tgl Cetak                      : $sysdate",0,2,'L');
        $pdf->Cell(280,5,"No Invoice / Id Project : $id_project",0,2,'L');
            $pdf->Cell(10,5,'',0,1);
            $pdf->SetFont('Arial','B',12);
            // Memberikan space kebawah agar tidak terlalu rapat
            //header
            $pdf->Cell(10,5,'',0,1);
            $pdf->SetFont('Arial','B',8);

            //value
            $pdf->Cell(40,5,'RINCIAN PEMBELIAN :',0,1,'L');
                $pdf->SetFont('Arial','',7);
                $pdf->Cell(10,5,'No',1,0,'C');
                $pdf->Cell(110,5,'Nama Produk Jasa',1,0,'L');
                $pdf->Cell(35,5,'Jumlah Tagihan',1,0,'R');
                $pdf->Cell(35,5,'Jumlah Bayar',1,0,'R');
                $pdf->Cell(10,5,'',0,1);
                $list = $this->M_labarugi->v_paybyproject($id_project);
                $i='1';
                foreach ($list as $row){
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(10,5,$i,1,0,'C');
                    $pdf->Cell(110,5,$row->nama_layanan,1,0,'L');
                    $pdf->Cell(35,5,number_format($row->profit),1,0,'R');
                    $pdf->Cell(35,5,number_format($row->jumlah_byr),1,0,'R');
                    $pdf->Cell(0,5,'',0,1,'C');
                    $SUM_TAGIHAN[]=$row->profit;
                    $SUM_BAYAR[]=$row->jumlah_byr;
                    $i='1'+ $i;
                }

                $pdf->Cell(120,5,'TOTAL ',1,0,'R');
                $pdf->Cell(35,5,number_format(array_sum($SUM_TAGIHAN)),1,0,'R');
                $pdf->Cell(35,5,number_format(array_sum($SUM_BAYAR)),1,0,'R');
                $pdf->Cell(0,5,'',0,1,'C');

                $pdf->Cell(10,5,'',0,1);
                $pdf->Cell(10,5,'',0,1);
                 $pdf->SetFont('Arial','B',8);
                $pdf->Cell(40,5,'RINCIAN PEMBAYARAN :',0,1,'L');
                $pdf->SetFont('Arial','',7);
                $pdf->Cell(10,5,'No',1,0,'C');
                $pdf->Cell(35,5,'Tgl Pembayaran',1,0,'C');
                $pdf->Cell(35,5,'Tipe Pembayaran',1,0,'C');
                $pdf->Cell(35,5,'Jumlah Pembayaran',1,0,'R');
                $pdf->Cell(10,5,'',0,1);
                $pembayaran = $this->M_labarugi->trs_pembayaran($id_project);
                $i='1';
                foreach ($pembayaran as $pembayaran){
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(10,5,$i,1,0,'C');
                    $pdf->Cell(35,5, $pembayaran->tgl_input,1,0,'C');
                    $pdf->Cell(35,5, $pembayaran->tipe_pay,1,0,'C');
                    $pdf->Cell(35,5,number_format($pembayaran->jumlah_pay),1,0,'R');
                    $pdf->Cell(0,5,'',0,1,'C');
                    $SUM_PAY[]=$pembayaran->jumlah_pay;
                    $i='1'+ $i;
                }
                $pdf->Cell(80,5,'TOTAL ',1,0,'R');
                $A=number_format(array_sum($SUM_PAY));
                $pdf->Cell(35,5,$A,1,0,'R');
                $pdf->Cell(0,5,'',0,1,'C');
            $pdf->Output();
    }
}
