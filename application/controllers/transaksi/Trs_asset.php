<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trs_asset extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Trs_asset');
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $data['pages'] = 'transaksi/trs_asset/list';
        $this->load->view('layout', $data);
    }

    public function json()
    {

//        header('Content-Type: application/json');
//        echo $this->M_Trs_asset->json();
        $list = $this->M_Trs_asset->get_all();
        $data = array();
        foreach ($list as $d) {
            $row = array();
            $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
                                                        <div class="dropdown-menu">
                                                        <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_setup(' . "'" . $d->trno . "'" . ')"><i class="ft-file"></i> Lihat</a>                                                        
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="destroy(' . "'" . $d->trno . "'" . ')"><i class="ft-trash"></i> Delete</a>
                                                        </div>';

            $row[] = '<h5 class="text-bold-500">' . $d->trno;
            $row[] = '<h5 class="text-bold-500">' . $d->fa_id;
            $row[] = '<h5 class="text-bold-500">' . $d->jenis;
            $row[] = '<h5 class="text-bold-500">' . $d->date_beli;
            $row[] = '<h5 class="text-bold-500">' . $d->estimasi;
            $row[] = '<h5 class="text-bold-500">' . $d->date_penyusutan;
            $row[] = '<h5 class="text-bold-500">' . $d->hrg_beli;
            $row[] = '<h5 class="text-bold-500">' . $d->penyusutan_thn;
            $row[] = '<h5 class="text-bold-500">' . $d->penyusutan_bln;
            $row[] = '<h5 class="text-bold-500">' . $d->pembulatan;

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
        $row = $this->M_Trs_asset->get_by_id($id);
        if ($row) {
            $data = array(
                'trno' => $row->trno,
                'fa_id' => $row->fa_id,
                'jenis' => $row->jenis,
                'date_beli' => $row->date_beli,
                'estimasi' => $row->estimasi,
                'date_penyusutan' => $row->date_penyusutan,
                'hrg_beli' => $row->hrg_beli,
                'penyusutan_thn' => $row->penyusutan_thn,
                'penyusutan_bln' => $row->penyusutan_bln,
                'pembulatan' => $row->pembulatan,
                'added_by' => $row->added_by,
                'entry_time' => $row->entry_time,
                'changed_by' => $row->changed_by,
                'last_modified' => $row->last_modified,
            );
            $this->load->view('trs_asset/trs_fix_asset_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trs_asset'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/trs_asset/create_action'),
            'trno' => set_value('trno'),
            'fa_id' => set_value('fa_id'),
            'jenis' => set_value('jenis'),
            'date_beli' => set_value('date_beli'),
            'estimasi' => set_value('estimasi'),
            'date_penyusutan' => set_value('date_penyusutan'),
            'hrg_beli' => set_value('hrg_beli'),
            'penyusutan_thn' => set_value('penyusutan_thn'),
            'penyusutan_bln' => set_value('penyusutan_bln'),
            'pembulatan' => set_value('pembulatan'),
            'pages' => 'transaksi/trs_asset/form',
        );
        $this->load->view('layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'fa_id' => $this->input->post('fa_id', TRUE),
                'jenis' => $this->input->post('jenis', TRUE),
                'date_beli' => $this->input->post('date_beli', TRUE),
                'estimasi' => $this->input->post('estimasi', TRUE),
                'date_penyusutan' => $this->input->post('date_penyusutan', TRUE),
                'hrg_beli' => $this->input->post('hrg_beli', TRUE),
                'penyusutan_thn' => $this->input->post('penyusutan_thn', TRUE),
                'penyusutan_bln' => $this->input->post('penyusutan_bln', TRUE),
                'pembulatan' => $this->input->post('pembulatan', TRUE),
                'added_by' => $this->input->post('added_by', TRUE),
                'entry_time' => $this->input->post('entry_time', TRUE),
                'changed_by' => $this->input->post('changed_by', TRUE),
                'last_modified' => $this->input->post('last_modified', TRUE),
            );

            $this->M_Trs_asset->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('trs_asset'));
        }
    }

    public function update($id)
    {
        $row = $this->M_Trs_asset->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('trs_asset/update_action'),
                'trno' => set_value('trno', $row->trno),
                'fa_id' => set_value('fa_id', $row->fa_id),
                'jenis' => set_value('jenis', $row->jenis),
                'date_beli' => set_value('date_beli', $row->date_beli),
                'estimasi' => set_value('estimasi', $row->estimasi),
                'date_penyusutan' => set_value('date_penyusutan', $row->date_penyusutan),
                'hrg_beli' => set_value('hrg_beli', $row->hrg_beli),
                'penyusutan_thn' => set_value('penyusutan_thn', $row->penyusutan_thn),
                'penyusutan_bln' => set_value('penyusutan_bln', $row->penyusutan_bln),
                'pembulatan' => set_value('pembulatan', $row->pembulatan),
                'added_by' => set_value('added_by', $row->added_by),
                'entry_time' => set_value('entry_time', $row->entry_time),
                'changed_by' => set_value('changed_by', $row->changed_by),
                'last_modified' => set_value('last_modified', $row->last_modified),
            );
            $this->load->view('trs_asset/trs_fix_asset_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trs_asset'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('trno', TRUE));
        } else {
            $data = array(
                'fa_id' => $this->input->post('fa_id', TRUE),
                'jenis' => $this->input->post('jenis', TRUE),
                'date_beli' => $this->input->post('date_beli', TRUE),
                'estimasi' => $this->input->post('estimasi', TRUE),
                'date_penyusutan' => $this->input->post('date_penyusutan', TRUE),
                'hrg_beli' => $this->input->post('hrg_beli', TRUE),
                'penyusutan_thn' => $this->input->post('penyusutan_thn', TRUE),
                'penyusutan_bln' => $this->input->post('penyusutan_bln', TRUE),
                'pembulatan' => $this->input->post('pembulatan', TRUE),
                'added_by' => $this->input->post('added_by', TRUE),
                'entry_time' => $this->input->post('entry_time', TRUE),
                'changed_by' => $this->input->post('changed_by', TRUE),
                'last_modified' => $this->input->post('last_modified', TRUE),
            );

            $this->M_Trs_asset->update($this->input->post('trno', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('trs_asset'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_Trs_asset->get_by_id($id);

        if ($row) {
            $this->M_Trs_asset->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('trs_asset'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trs_asset'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('fa_id', 'fa id', 'trim|required');
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
        $this->form_validation->set_rules('date_beli', 'date beli', 'trim|required');
        $this->form_validation->set_rules('estimasi', 'estimasi', 'trim|required');
        $this->form_validation->set_rules('date_penyusutan', 'date penyusutan', 'trim|required');
        $this->form_validation->set_rules('hrg_beli', 'hrg beli', 'trim|required|numeric');
        $this->form_validation->set_rules('penyusutan_thn', 'penyusutan thn', 'trim|required|numeric');
        $this->form_validation->set_rules('penyusutan_bln', 'penyusutan bln', 'trim|required|numeric');
        $this->form_validation->set_rules('pembulatan', 'pembulatan', 'trim|required|numeric');
        $this->form_validation->set_rules('added_by', 'added by', 'trim|required');
        $this->form_validation->set_rules('entry_time', 'entry time', 'trim|required');
        $this->form_validation->set_rules('changed_by', 'changed by', 'trim|required');
        $this->form_validation->set_rules('last_modified', 'last modified', 'trim|required');

        $this->form_validation->set_rules('trno', 'trno', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "trs_fix_asset.xls";
        $judul = "trs_fix_asset";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Fa Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
        xlsWriteLabel($tablehead, $kolomhead++, "Date Beli");
        xlsWriteLabel($tablehead, $kolomhead++, "Estimasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Date Penyusutan");
        xlsWriteLabel($tablehead, $kolomhead++, "Hrg Beli");
        xlsWriteLabel($tablehead, $kolomhead++, "Penyusutan Thn");
        xlsWriteLabel($tablehead, $kolomhead++, "Penyusutan Bln");
        xlsWriteLabel($tablehead, $kolomhead++, "Pembulatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Added By");
        xlsWriteLabel($tablehead, $kolomhead++, "Entry Time");
        xlsWriteLabel($tablehead, $kolomhead++, "Changed By");
        xlsWriteLabel($tablehead, $kolomhead++, "Last Modified");

        foreach ($this->M_Trs_asset->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->fa_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
            xlsWriteLabel($tablebody, $kolombody++, $data->date_beli);
            xlsWriteLabel($tablebody, $kolombody++, $data->estimasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->date_penyusutan);
            xlsWriteNumber($tablebody, $kolombody++, $data->hrg_beli);
            xlsWriteNumber($tablebody, $kolombody++, $data->penyusutan_thn);
            xlsWriteNumber($tablebody, $kolombody++, $data->penyusutan_bln);
            xlsWriteNumber($tablebody, $kolombody++, $data->pembulatan);
            xlsWriteLabel($tablebody, $kolombody++, $data->added_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->entry_time);
            xlsWriteLabel($tablebody, $kolombody++, $data->changed_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->last_modified);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Trs_asset.php */
/* Location: ./application/controllers/Trs_asset.php */
