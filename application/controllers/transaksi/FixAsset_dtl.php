<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FixAsset_dtl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Trs_fix_asset_dtl');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('trs_fix_asset_dtl/trs_fix_asset_dtl_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_Trs_fix_asset_dtl->json();
    }

    public function json2($id)
    {
//        header('Content-Type: application/json');
//        echo $this->M_Trs_fix_asset_dtl->json2($id);
        $list = $this->M_Trs_fix_asset_dtl->get_by_trno($id);

        $data = array();
        foreach ($list as $d) {
            $row = array();

            $row[] = '<h5 class="text-bold-500">' . $d->Fa_Id;
            $row[] = '<h5 class="text-bold-500">' . strtoupper(date("d-m-Y", strtotime($d->Date_penyusutan)));
            $row[] = '<h5 class="text-bold-500">' . number_format($d->Hrg_beli);
            $row[] = '<h5 class="text-bold-500">' . $d->Estimasi;
            $row[] = '<h5 class="text-bold-500">' . number_format($d->Penyusutan_thn);
            $row[] = '<h5 class="text-bold-500">' . number_format($d->Penyusutan_bln);
            $row[] = '<h5 class="text-bold-500">' . number_format($d->Pembulatan);

            $row[] = '<button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i class="ft-menu"></i></button>
                                                        <div class="dropdown-menu">
                                                        <a class="dropdown-item"  href="javascript:void(0)" onclick="edit_setup(' . "'" . $d->TrNo . "','" . $d->Line_No . "'" . ')"><i class="ft-file"></i> Lihat</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="destroy(' . "'" . $d->TrNo . "','" . $d->Line_No . "'" . ')"><i class="ft-trash"></i> Delete</a>
                                                        </div>';

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
        $row = $this->M_Trs_fix_asset_dtl->get_by_id($id);
        if ($row) {
            $data = array(
                'TrNo' => $row->TrNo,
                'Line_No' => $row->Line_No,
                'Fa_Id' => $row->Fa_Id,
                'Jenis' => $row->Jenis,
                'Date_beli' => $row->Date_beli,
                'Estimasi' => $row->Estimasi,
                'Date_penyusutan' => $row->Date_penyusutan,
                'Hrg_beli' => $row->Hrg_beli,
                'Penyusutan_thn' => $row->Penyusutan_thn,
                'Penyusutan_bln' => $row->Penyusutan_bln,
                'Pembulatan' => $row->Pembulatan,
                'Added_by' => $row->Added_by,
                'Entry_time' => $row->Entry_time,
                'Changed_by' => $row->Changed_by,
                'Last_Modified' => $row->Last_Modified,
            );
            $this->load->view('trs_fix_asset_dtl/trs_fix_asset_dtl_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('FixAsset_dtl'));
        }
    }

    public function create($id)
    {
        $data = array(
            'status' => 'Create',
            'button' => 'Create',
            'action' => site_url('transaksi/fixAsset_dtl/create_action'),
            'TrNo' => $id,
            'Fa_Id' => set_value('Fa_Id'),
            'Jenis' => set_value('Jenis'),
            'Date_beli' => set_value('Date_beli'),
            'Estimasi' => set_value('Estimasi'),
            'Date_penyusutan' => set_value('Date_penyusutan'),
            'Hrg_beli' => set_value('Hrg_beli'),
            'pages' => 'trs_fix_asset_dtl/trs_fix_asset_dtl_form',
        );
        $this->load->view('layout', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $trNo = $this->input->post('TrNo', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->create($trNo);
        } else {
            $penyusutan = $this->input->post('Hrg_beli', TRUE) / $this->input->post('Estimasi', TRUE);

            $data = array(
                'Fa_Id' => $this->input->post('Fa_Id', TRUE),
                'Jenis' => $this->input->post('Jenis', TRUE),
                'Date_beli' => $this->input->post('Date_beli', TRUE),
                'Estimasi' => $this->input->post('Estimasi', TRUE),
                'Date_penyusutan' => $this->input->post('Date_penyusutan', TRUE),
                'Hrg_beli' => $this->input->post('Hrg_beli', TRUE),
                'Penyusutan_thn' => $penyusutan,
                'Penyusutan_bln' => $penyusutan / 12,
                'Pembulatan' => round(($penyusutan / 12), 2),
                'Added_by' => $this->session->userdata('yangLogin'),
                'Entry_time' => date('Y-m-d H:i:s'),
                'TrNo' => $trNo,
                'Line_No' => $this->M_Trs_fix_asset_dtl->getMaxLineNo($trNo),
            );

            $this->M_Trs_fix_asset_dtl->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi/FixAsset_hdr/update/') . $trNo);
        }
    }

    public function update($id, $id2)
    {
        $row = $this->M_Trs_fix_asset_dtl->get_by_pk($id, $id2);
        if ($row) {
            $data = array(
                'status' => 'Update',
                'button' => 'Update',
                'action' => site_url('transaksi/fixAsset_dtl/update_action'),
                'TrNo' => set_value('TrNo', $row->TrNo),
                'Line_No' => set_value('TrNo', $row->Line_No),
                'Fa_Id' => set_value('Fa_Id', $row->Fa_Id),
                'Jenis' => set_value('Jenis', $row->Jenis),
                'Date_beli' => set_value('Tgl', strtoupper(date("d-m-Y", strtotime($row->Date_beli)))),
                'Estimasi' => set_value('Estimasi', $row->Estimasi),
                'Date_penyusutan' => set_value('Tgl', strtoupper(date("d-m-Y", strtotime($row->Date_penyusutan)))),
                'Hrg_beli' => set_value('Hrg_beli',  number_format($row->Hrg_beli)),
                'Penyusutan_thn' => set_value('Penyusutan_thn', number_format($row->Penyusutan_thn)),
                'Penyusutan_bln' => set_value('Penyusutan_bln', number_format($row->Penyusutan_bln)),
                'Pembulatan' => set_value('Pembulatan', number_format($row->Pembulatan)),
                'pages' => 'trs_fix_asset_dtl/trs_fix_asset_dtl_form',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/FixAsset_hdr/update/') . $id);
        }
    }

    public function update_action()
    {
        $this->_rules();
        $trNo = $this->input->post('TrNo', TRUE);
        $lineNo = $this->input->post('Line_No', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->update($trNo, $lineNo);
        } else {
            $penyusutan = $this->input->post('Hrg_beli', TRUE) / $this->input->post('Estimasi', TRUE);
            $data = array(
                'Fa_Id' => $this->input->post('Fa_Id', TRUE),
                'Jenis' => $this->input->post('Jenis', TRUE),
                'Date_beli' => $this->input->post('Date_beli', TRUE),
                'Estimasi' => $this->input->post('Estimasi', TRUE),
                'Date_penyusutan' => $this->input->post('Date_penyusutan', TRUE),
                'Hrg_beli' => $this->input->post('Hrg_beli', TRUE),
                'Penyusutan_thn' => $penyusutan,
                'Penyusutan_bln' => $penyusutan / 12,
                'Pembulatan' => round(($penyusutan / 12), 2),
                'Changed_by' => $this->session->userdata('yangLogin'),
                'Last_Modified' => date('Y-m-d H:i:s'),
            );
            $this->M_Trs_fix_asset_dtl->update($trNo, $lineNo, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi/FixAsset_hdr/update/') . $trNo);
        }
    }

    public function delete($id, $id2)
    {
        $this->M_Trs_fix_asset_dtl->delete($id, $id2);
        echo json_encode(array("status" => TRUE));

    }

    public function _rules()
    {

        $this->form_validation->set_rules('Jenis', 'jenis', 'trim|required');
        $this->form_validation->set_rules('Date_beli', 'date beli', 'trim|required');
        $this->form_validation->set_rules('Estimasi', 'estimasi', 'trim|required');
        $this->form_validation->set_rules('Date_penyusutan', 'date penyusutan', 'trim|required');
        $this->form_validation->set_rules('Hrg_beli', 'hrg beli', 'trim|required|numeric');

        $this->form_validation->set_rules('TrNo', 'TrNo', 'trim');
        $this->form_validation->set_rules('Line_No', 'line No', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "trs_fix_asset_dtl.xls";
        $judul = "trs_fix_asset_dtl";
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

        foreach ($this->M_Trs_fix_asset_dtl->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->Fa_Id);
            xlsWriteLabel($tablebody, $kolombody++, $data->Jenis);
            xlsWriteLabel($tablebody, $kolombody++, $data->Date_beli);
            xlsWriteLabel($tablebody, $kolombody++, $data->Estimasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->Date_penyusutan);
            xlsWriteNumber($tablebody, $kolombody++, $data->Hrg_beli);
            xlsWriteNumber($tablebody, $kolombody++, $data->Penyusutan_thn);
            xlsWriteNumber($tablebody, $kolombody++, $data->Penyusutan_bln);
            xlsWriteNumber($tablebody, $kolombody++, $data->Pembulatan);
            xlsWriteLabel($tablebody, $kolombody++, $data->Added_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->Entry_time);
            xlsWriteLabel($tablebody, $kolombody++, $data->Changed_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->Last_Modified);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Trs_fix_asset_dtl.php */
/* Location: ./application/controllers/Trs_fix_asset_dtl.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-28 16:38:09 */
/* http://harviacode.com */