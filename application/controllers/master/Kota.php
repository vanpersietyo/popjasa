<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_kota', 'M_kota');
        $this->load->model('M_login');
    }

    public function index(){
        $data['pages']='master/kota/index';
        $this->load->view('layout',$data);
    }
    public function ajax_data()
    {
        $this->load->helper('url');
        $list = $this->M_kota->get_data();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            if ($d->st_data==0) {
                $row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->id_kota."'".')"><i class="ft-edit"></i> Edit Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->id_kota."'".')"><i class="ft-trash"></i> Hapus Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->id_kota."'".')"><i class="ft-file"></i> View Data</a>
															</div>';
            }else {
                $row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->id_kota."'".')"><i class="ft-file"></i> View Data</a>
															</div>';
            }
            $row[] = $d->id_kota;
            $row[] = $d->nama_kota;
            $row[] = $d->tgl_input;
            $row[] = $d->inputby;

            $data[] = $row;
        }

        $output = array(

            "recordsTotal" => $this->M_kota->count_all(),
            "recordsFiltered" => $this->M_kota->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }


    public function ajax_edit($id)
    {
        $data = $this->M_kota->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();
        $kode=date('Ymds');
        $data = array(
            'id_kota' => $this->M_kota->get_ID(),
            'kd_cabang' => $this->session->userdata('cabang'),
            'nama_kota' => $this->input->post('nama_kota'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'inputby' => $this->session->userdata('yangLogin'),
        );

        $insert = $this->M_kota->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'nama_kota' => $this->input->post('nama_kota'),
            'kd_cabang' => $this->session->userdata('cabang'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'inputby' => $this->session->userdata('yangLogin'),
        );
        $this->M_kota->update(array('id_kota' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->M_kota->delete_by_id($id);
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


        if (empty($this->input->post('nama_kota'))) {
            $error                  = 'Nama Kota tidak boleh kosong';
            $data['inputerror'][]   = 'nama_kota';
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
