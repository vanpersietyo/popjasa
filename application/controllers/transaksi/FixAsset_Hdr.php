<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FixAsset_Hdr extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Trs_fix_asset_hdr');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['pages'] = 'trs_fix_asset_hdr/trs_fix_asset_hdr_list';
        $this->load->view('layout', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_Trs_fix_asset_hdr->json();
    }

    public function read($id)
    {
        $row = $this->M_Trs_fix_asset_hdr->get_by_id($id);
        if ($row) {
            $data = array(
                'TrNo' => $row->TrNo,
                'Tgl' => $row->Tgl,
                'TrManualRef' => $row->TrManualRef,
                'Created_At' => $row->Created_At,
                'Modified_By' => $row->Modified_By,
                'EntryTime' => $row->EntryTime,
                'Last_Modified' => $row->Last_Modified,
            );
            $this->load->view('trs_fix_asset_hdr/trs_fix_asset_hdr_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trs_fix_asset_hdr'));
        }
    }

    public function create()
    {
        $data = array(
            'status' => 'new',
            'button' => 'Create',
            'action' => site_url('transaksi/fixAsset_hdr/create_action'),
            'TrNo' => set_value('TrNo'),
            'Tgl' => set_value('Tgl'),
            'TrManualRef' => set_value('TrManualRef'),
            'pages' => 'trs_fix_asset_hdr/trs_fix_asset_hdr_form',
        );
        $this->load->view('layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $trNo = $this->M_Trs_fix_asset_hdr->getTrNo();
            $data = array(
                'Tgl' => $this->input->post('Tgl', TRUE),
                'TrManualRef' => $this->input->post('TrManualRef', TRUE),
                'Created_At' => $this->session->userdata('yangLogin'),
                'EntryTime' => date('Y-m-d H:i:s'),
                'TrNo' => $trNo,
            );

            $this->M_Trs_fix_asset_hdr->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi/fixAsset_hdr/update/' . $trNo));
        }
    }

    public function update($id)
    {
        $row = $this->M_Trs_fix_asset_hdr->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => 'update',
                'button' => 'Update',
                'action' => site_url('trs_fix_asset_hdr/update_action'),
                'TrNo' => set_value('TrNo', $row->TrNo),
                'Tgl' => set_value('Tgl', $row->Tgl),
                'TrManualRef' => set_value('TrManualRef', $row->TrManualRef),
                'pages' => 'trs_fix_asset_hdr/trs_fix_asset_hdr_form',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/fixAsset_hdr'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('TrNo', TRUE));
        } else {
            $data = array(
                'Tgl' => $this->input->post('Tgl', TRUE),
                'TrManualRef' => $this->input->post('TrManualRef', TRUE),
                'Created_At' => $this->input->post('Created_At', TRUE),
                'Modified_By' => $this->input->post('Modified_By', TRUE),
                'EntryTime' => $this->input->post('EntryTime', TRUE),
                'Last_Modified' => $this->input->post('Last_Modified', TRUE),
            );

            $this->M_Trs_fix_asset_hdr->update($this->input->post('TrNo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi/fixAsset_hdr'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_Trs_fix_asset_hdr->get_by_id($id);

        if ($row) {
            $this->M_Trs_fix_asset_hdr->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi/fixAsset_hdr'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/fixAsset_hdr'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('TrManualRef', 'trmanualref', 'trim');

        $this->form_validation->set_rules('TrNo', 'TrNo', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "trs_fix_asset_hdr.xls";
        $judul = "trs_fix_asset_hdr";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
        xlsWriteLabel($tablehead, $kolomhead++, "TrManualRef");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Modified By");
        xlsWriteLabel($tablehead, $kolomhead++, "EntryTime");
        xlsWriteLabel($tablehead, $kolomhead++, "Last Modified");

        foreach ($this->M_Trs_fix_asset_hdr->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->Tgl);
            xlsWriteLabel($tablebody, $kolombody++, $data->TrManualRef);
            xlsWriteLabel($tablebody, $kolombody++, $data->Created_At);
            xlsWriteLabel($tablebody, $kolombody++, $data->Modified_By);
            xlsWriteLabel($tablebody, $kolombody++, $data->EntryTime);
            xlsWriteLabel($tablebody, $kolombody++, $data->Last_Modified);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Trs_fix_asset_hdr.php */
/* Location: ./application/controllers/Trs_fix_asset_hdr.php */