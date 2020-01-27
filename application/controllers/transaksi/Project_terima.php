<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_terima extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Project_terima');
        $this->load->model('M_project');
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $this->load->view('project_terima/trs_project_terima_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_Project_terima->json();
    }

    public function read($id)
    {
        $row = $this->M_Project_terima->get_by_id($id);
        if ($row) {
            $data = array(
                'bool_ktp' => $row->bool_ktp,
                'bool_ktp_asli' => $row->bool_ktp_asli,
                'bool_npwp' => $row->bool_npwp,
                'bool_npwp_asli' => $row->bool_npwp_asli,
                'bool_sertifikat' => $row->bool_sertifikat,
                'bool_sertifikat_asli' => $row->bool_sertifikat_asli,
                'bool_imb' => $row->bool_imb,
                'bool_imb_asli' => $row->bool_imb_asli,
                'bool_stempel' => $row->bool_stempel,
                'jml_materai' => $row->jml_materai,
                'bool_sk_domisili' => $row->bool_sk_domisili,
                'bool_sk_domisili_asli' => $row->bool_sk_domisili_asli,
                'bool_surat_sewa' => $row->bool_surat_sewa,
                'bool_surat_sewa_asli' => $row->bool_surat_sewa_asli,
                'ID_Project_terima' => $row->ID_Project_terima,
                'ID_Hdr_Project' => $row->ID_Hdr_Project,
                'ID_Project' => $row->ID_Project,
                'Created_by' => $row->Created_by,
                'EntryTime' => $row->EntryTime,
                'Modified_by' => $row->Modified_by,
                'Last_Modified' => $row->Last_Modified,
            );
            $this->load->view('project_terima/trs_project_terima_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('project_terima'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('project_terima/create_action'),
            'bool_ktp' => set_value('bool_ktp'),
            'bool_npwp' => set_value('bool_npwp'),
            'bool_sertifikat' => set_value('bool_sertifikat'),
            'bool_imb' => set_value('bool_imb'),
            'bool_stempel' => set_value('bool_stempel'),
            'jml_materai' => set_value('jml_materai'),
            'bool_sk_domisili' => set_value('bool_sk_domisili'),
            'bool_surat_sewa' => set_value('bool_surat_sewa'),
            'ID_Project_terima' => set_value('ID_Project_terima'),
            'ID_Hdr_Project' => set_value('ID_Hdr_Project'),
            'ID_Project' => set_value('ID_Project'),
        );
        $this->load->view('project_terima/trs_project_terima_form', $data);
    }

    public function create_action()
    {
        $id_projects = $this->input->post('ID_Project', TRUE);
        $data = array(
            'bool_ktp' => $this->input->post('bool_ktp', TRUE),
            'bool_npwp' => $this->input->post('bool_npwp', TRUE),
            'bool_sertifikat' => $this->input->post('bool_sertifikat', TRUE),
            'bool_imb' => $this->input->post('bool_imb', TRUE),
            'bool_stempel' => $this->input->post('bool_stempel', TRUE),
            'jml_materai' => $this->input->post('jml_materai', TRUE),
            'bool_sk_domisili' => $this->input->post('bool_sk_domisili', TRUE),
            'bool_surat_sewa' => $this->input->post('bool_surat_sewa', TRUE),
            'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
            'ID_Project' => $id_projects,
            'ID_Project_terima' => $this->M_Project_terima->get_id(),
            'Created_By' => $this->session->userdata('yangLogin'),
            'EntryTime' => date('Y-m-d H:i:s'),
            'jml_ktp' => $this->input->post('jml_ktp', TRUE),
        );

        $this->M_Project_terima->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('transaksi/progress/update_track/') . $id_projects);
    }

    public function update($id)
    {
        $row = $this->M_Project_terima->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/project_terima/update_action'),
                'bool_ktp' => set_value('bool_ktp', $row->bool_ktp),
                'bool_npwp' => set_value('bool_npwp', $row->bool_npwp),
                'bool_sertifikat' => set_value('bool_sertifikat', $row->bool_sertifikat),
                'bool_imb' => set_value('bool_imb', $row->bool_imb),
                'bool_stempel' => set_value('bool_stempel', $row->bool_stempel),
                'jml_materai' => set_value('jml_materai', $row->jml_materai),
                'bool_sk_domisili' => set_value('bool_sk_domisili', $row->bool_sk_domisili),
                'bool_surat_sewa' => set_value('bool_surat_sewa', $row->bool_surat_sewa),
                'ID_Project_terima' => set_value('ID_Project_terima', $row->ID_Project_terima),
                'ID_Hdr_Project' => set_value('ID_Hdr_Project', $row->ID_Hdr_Project),
                'ID_Project' => set_value('ID_Project', $row->ID_Project),
                'pages' => 'transaksi/project_terima/form',
                'jml_ktp' => set_value('jml_ktp', $row->jml_ktp),
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/project/'));
        }
    }

    public function update_action()
    {
        $id_projects = $this->input->post('ID_Project', TRUE);
        $data = array(
            'bool_ktp' => $this->input->post('bool_ktp', TRUE),
            'bool_npwp' => $this->input->post('bool_npwp', TRUE),
            'bool_sertifikat' => $this->input->post('bool_sertifikat', TRUE),
            'bool_imb' => $this->input->post('bool_imb', TRUE),
            'bool_stempel' => $this->input->post('bool_stempel', TRUE),
            'jml_materai' => $this->input->post('jml_materai', TRUE),
            'bool_sk_domisili' => $this->input->post('bool_sk_domisili', TRUE),
            'bool_surat_sewa' => $this->input->post('bool_surat_sewa', TRUE),
            'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
            'ID_Project' => $id_projects,
            'Modified_by' => $this->session->userdata('yangLogin'),
            'Last_Modified' => date('Y-m-d H:i:s'),
            'jml_ktp' => $this->input->post('jml_ktp', TRUE),
        );

        $this->M_Project_terima->update($this->input->post('ID_Project_terima', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('transaksi/progress/update_track/') . $id_projects);
    }

    public function delete($id)
    {
        $row = $this->M_Project_terima->get_by_id($id);

        if ($row) {
            $this->M_Project_terima->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('project_terima'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('project_terima'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('bool_ktp', 'bool ktp fotokopi', 'trim|required');
        $this->form_validation->set_rules('bool_npwp', 'bool npwp fotokopi', 'trim|required');
        $this->form_validation->set_rules('bool_sertifikat', 'bool sertifikat fotokopi', 'trim|required');
        $this->form_validation->set_rules('bool_imb', 'bool imb fotokopi', 'trim|required');
        $this->form_validation->set_rules('bool_stempel', 'bool stempel', 'trim|required');
        $this->form_validation->set_rules('jml_materai', 'jml materai', 'trim|required');
        $this->form_validation->set_rules('bool_sk_domisili', 'bool sk domisili fotokopi', 'trim|required');
        $this->form_validation->set_rules('bool_surat_sewa', 'bool surat sewa fotokopi', 'trim|required');
        $this->form_validation->set_rules('ID_Hdr_Project', 'id hdr project', 'trim|required');
        $this->form_validation->set_rules('ID_Project', 'id project', 'trim|required');
        $this->form_validation->set_rules('Created_by', 'created by', 'trim|required');
        $this->form_validation->set_rules('EntryTime', 'entrytime', 'trim|required');
        $this->form_validation->set_rules('Modified_by', 'modified by', 'trim|required');
        $this->form_validation->set_rules('Last_Modified', 'last modified', 'trim|required');

        $this->form_validation->set_rules('ID_Project_terima', 'ID_Project_terima', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create_terima($id)
    {
        $project = $this->M_project->find_first(array('id_project' => $id));
        if (!empty($project)) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('transaksi/project_terima/create_action'),
                'bool_ktp' => set_value('bool_ktp'),
                'bool_npwp' => set_value('bool_npwp'),
                'bool_sertifikat' => set_value('bool_sertifikat'),
                'bool_imb' => set_value('bool_imb'),
                'bool_stempel' => set_value('bool_stempel'),
                'jml_materai' => set_value('jml_materai'),
                'bool_sk_domisili' => set_value('bool_sk_domisili'),
                'bool_surat_sewa' => set_value('bool_surat_sewa'),
                'ID_Project_terima' => set_value('ID_Project_terima'),
                'ID_Hdr_Project' => $project->id_hdr_project,
                'ID_Project' => $id,
                'pages' => 'transaksi/project_terima/form',
                'jml_ktp' => set_value('jml_ktp'),
            );
            $this->load->view('layout', $data);
        } else {
            redirect(site_url('transaksi/project/'));
        }
    }

    public function cek_exist_projects($id)
    {
        $project_ket = $this->M_Project_terima->find_first(["id_project" => $id]);
        if ($project_ket) {
            return $this->update($project_ket->ID_Project_terima);
        } else {
            return $this->create_terima($id);
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->M_Project_terima->find_first(["id_project" => $id]);
        echo json_encode($data);
    }
}

/* End of file Project_terima.php */
/* Location: ./application/controllers/Project_terima.php */
