<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_bank', 'M_bank');
        $this->load->model('M_login');
        $this->M_login->isLogin();
    }

    public function index(){
        $data['pages']='master/bank/index';
        $this->load->view('layout',$data);
    }
    public function ajax_data()
    {
        $this->load->helper('url');
        $list = $this->M_bank->get_data();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            if ($d->st_data==0) {
                $row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item"  href="javascript:void(0)" onclick="edit_person('."'".$d->kd_bank."'".')"><i class="ft-edit"></i> Edit Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="delete_person('."'".$d->kd_bank."'".')"><i class="ft-trash"></i> Hapus Data</a>
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->kd_bank."'".')"><i class="ft-file"></i> View Data</a>
															</div>';
            }else {
                $row[] = '<button type="button" class="btn btn-blue bg-accent-4 dropdown-toggle btn-sm" data-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="javascript:void(0)" onclick="lookup('."'".$d->kd_bank."'".')"><i class="ft-file"></i> View Data</a>
															</div>';
            }
            $row[] = $d->kd_bank;
            $row[] = $d->nm_bank;
            $row[] = $d->tgl_trans;
            $row[] = $d->operator;

            $data[] = $row;
        }

        $output = array(

            "recordsTotal" => $this->M_bank->count_all(),
            "recordsFiltered" => $this->M_bank->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }


    public function ajax_edit($id)
    {
        $data = $this->M_kategori_produk->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();
        $kode=date('Ymds');
        $data = array(
            'kd_bank' => $this->input->post('kd_bank'),
            'nm_bank' => $this->input->post('nm_bank'),
            'st_data' => 0,
            'tgl_trans' => date('Y-m-d H:i:s'),
            'operator' => $this->session->userdata('yangLogin'),
        );

        $insert = $this->M_bank->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'kd_bank' => $this->input->post('kd_bank'),
            'nm_bank' => $this->input->post('nm_bank'),
            'st_data' => 0,
            'tgl_trans' => date('Y-m-d H:i:s'),
            'operator' => $this->session->userdata('yangLogin'),
        );
        $this->M_bank->update(array('kd_bank' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->M_bank->delete_by_id($id);
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

        if (empty($this->input->post('kd_bank'))) {
            $error                  = 'Kode Bank tidak boleh kosong';
            $data['inputerror'][]   = 'kd_bank';
            $data['notiferror'][]   = $prefix.$error.$suffix;
            $data['error_string'][] = $error;
            $data['status']         = FALSE;
        }

        if (empty($this->input->post('nm_bank'))) {
            $error                  = 'Nama Bank tidak boleh kosong';
            $data['inputerror'][]   = 'nm_bank';
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
