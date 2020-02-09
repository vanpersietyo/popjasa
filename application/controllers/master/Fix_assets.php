<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fix_assets extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Fix_assets');
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $data['pages']='master/fix_assets/list';
        $this->load->view('layout',$data);
    }

    // datatables
    public function json()
    {
        $list = $this->M_Fix_assets->get_all();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
                                                        <div class="dropdown-menu">
                                                        <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_setup(' . "'" . $d->Fa_ID . "'" . ')"><i class="ft-file"></i> Lihat</a>                                                        
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="destroy(' . "'" . $d->Fa_ID . "'" . ')"><i class="ft-trash"></i> Delete</a>
                                                        </div>';


            $row[] = '<h5 class="text-bold-500">' . $d->Barcode;
            $row[] = '<h5 class="text-bold-500">' . $d->Nama_FA;
            $row[] = '<h5 class="text-bold-500">' . $d->Divisi;
            $row[] = '<h5 class="text-bold-500">' . $d->Lokasi;
            $row[] = '<h5 class="text-bold-500">' . $d->Cabang;

            //add html for action
            $data[] = $row;
        }

        $output = [
            "data" => $data
        ];
        //output to json format
        echo json_encode($output);
    }

    public function read($id)
    {
        $row = $this->M_Fix_assets->get_by_id($id);
        if ($row) {
            $data = array(
                'Fa_ID' => $row->Fa_ID,
                'Barcode' => $row->Barcode,
                'Nama_FA' => $row->Nama_FA,
                'Divisi' => $row->Divisi,
                'Lokasi' => $row->Lokasi,
                'Cabang' => $row->Cabang,
                'Register_Date' => $row->Register_Date,
                'Date_Akuisisi' => $row->Date_Akuisisi,
                'Date_FA' => $row->Date_FA,
                'Date_Disposed' => $row->Date_Disposed,
                'Penerima' => $row->Penerima,
            );
            $this->load->view('master/fix_assets/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/fix_assets'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master/fix_assets/create_action'),
            'Fa_ID' => set_value('Fa_ID'),
            'Barcode' => set_value('Barcode'),
            'Nama_FA' => set_value('Nama_FA'),
            'Divisi' => set_value('Divisi'),
            'Lokasi' => set_value('Lokasi'),
            'Cabang' => set_value('Cabang'),
            'Register_Date' => set_value('Register_Date'),
            'Date_Akuisisi' => set_value('Date_Akuisisi'),
            'Date_FA' => set_value('Date_FA'),
            'Date_Disposed' => set_value('Date_Disposed'),
            'Penerima' => set_value('Penerima'),
            'Harga' => set_value('Harga'),
        );
        $this->load->view('master/fix_assets/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'Barcode' => $this->input->post('Barcode', TRUE),
                'Nama_FA' => $this->input->post('Nama_FA', TRUE),
                'Divisi' => $this->input->post('Divisi', TRUE),
                'Lokasi' => $this->input->post('Lokasi', TRUE),
                'Cabang' => $this->input->post('Cabang', TRUE),
                'Register_Date' => $this->input->post('Register_Date', TRUE),
                'Date_Akuisisi' => $this->input->post('Date_Akuisisi', TRUE),
                'Date_FA' => $this->input->post('Date_FA', TRUE),
                'Date_Disposed' => $this->input->post('Date_Disposed', TRUE),
                'Penerima' => $this->input->post('Penerima', TRUE),
                'Harga' => $this->input->post('Harga', TRUE),
            );

            $this->M_Fix_assets->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('master/fix_assets'));
        }
    }

    public function update($id)
    {
        $row = $this->M_Fix_assets->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master/fix_assets/update_action'),
                'Fa_ID' => set_value('Fa_ID', $row->Fa_ID),
                'Barcode' => set_value('Barcode', $row->Barcode),
                'Nama_FA' => set_value('Nama_FA', $row->Nama_FA),
                'Divisi' => set_value('Divisi', $row->Divisi),
                'Lokasi' => set_value('Lokasi', $row->Lokasi),
                'Date_Akuisisi' => set_value('Date_Akuisisi', $row->Date_Akuisisi),
                'Date_FA' => set_value('Date_FA', $row->Date_FA),
                'Date_Disposed' => set_value('Date_Disposed', $row->Date_Disposed),
                'Penerima' => set_value('Penerima', $row->Penerima),
                'pages' => 'master/fix_assets/form',
                'Harga' => set_value('Harga', $row->Harga),
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/fix_assets'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Fa_ID', TRUE));
        } else {
            $data = array(
                'Barcode' => $this->input->post('Barcode', TRUE),
                'Nama_FA' => $this->input->post('Nama_FA', TRUE),
                'Divisi' => $this->input->post('Divisi', TRUE),
                'Lokasi' => $this->input->post('Lokasi', TRUE),
                'Date_Akuisisi' => $this->input->post('Date_Akuisisi', TRUE),
                'Date_FA' => $this->input->post('Date_FA', TRUE),
                'Date_Disposed' => $this->input->post('Date_Disposed', TRUE),
                'Penerima' => $this->input->post('Penerima', TRUE),
                'Harga' => $this->input->post('Harga', TRUE),
            );

            $this->M_Fix_assets->update($this->input->post('Fa_ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('master/fix_assets'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_Fix_assets->get_by_id($id);
        if ($row) {
            $this->M_Fix_assets->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('master/fix_assets'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/fix_assets'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Barcode', 'barcode', 'trim|required');
        $this->form_validation->set_rules('Nama_FA', 'nama fa', 'trim|required');
        $this->form_validation->set_rules('Divisi', 'divisi', 'trim|required');
        $this->form_validation->set_rules('Lokasi', 'lokasi', 'trim|required');
        $this->form_validation->set_rules('Date_Akuisisi', 'date akuisisi', 'trim|required');
        $this->form_validation->set_rules('Date_FA', 'date fa', 'trim|required');
        $this->form_validation->set_rules('Date_Disposed', 'date disposed', 'trim|required');
        $this->form_validation->set_rules('Penerima', 'penerima', 'trim|required');

        $this->form_validation->set_rules('Fa_ID', 'Fa_ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    /**
     * created_at: 2019-12-08
     * created_by: Afes Oktavianus
     * function create fix_assets (m_fix_assets)
     */
    public function simpan_fa()
    {
        $id = $this->M_Fix_assets->get_ID();
        $input = array(
            'Barcode' => $this->input->post('Barcode'),
            'Cabang' => $this->session->userdata('cabang'),
            'Nama_FA' => $this->input->post('Nama_FA', TRUE),
            'Divisi' => $this->input->post('Divisi', TRUE),
            'Lokasi' => $this->input->post('Lokasi', TRUE),
            'Register_Date' => date('Y-m-d H:i:s'),
            'Date_Akuisisi' => $this->input->post('Date_Akuisisi', TRUE),
            'Date_FA' => $this->input->post('Date_FA', TRUE),
            'Date_Disposed' => $this->input->post('Date_Disposed', TRUE),
            'Penerima' => $this->input->post('Penerima', TRUE),
            'FA_ID'=> $id,
            'Harga' => $this->input->post('Harga', TRUE),
        );
        $this->M_Fix_assets->insert($input);

        echo json_encode(array("status" => TRUE));
    }

}

/* End of file Fix_assets.php */
/* Location: ./application/controllers/Fix_assets.php */
