<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projects_izin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_project');
        $this->load->model('M_Project_izin');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('transaksi/projects_izin/list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_Project_izin->json();
    }

    public function read($id)
    {
        $row = $this->M_Project_izin->get_by_id($id);
        if ($row) {
            $data = array(
                'Bool_Izin_Akta_Notaris' => $row->Bool_Izin_Akta_Notaris,
                'Izin_Akta_Notaris' => $row->Izin_Akta_Notaris,
                'Bool_Izin_Pengesahan' => $row->Bool_Izin_Pengesahan,
                'Izin_Pengesahan' => $row->Izin_Pengesahan,
                'Bool_NPWP' => $row->Bool_NPWP,
                'Bool_NPWP_Perusahaan' => $row->Bool_NPWP_Perusahaan,
                'Bool_SKT_Perusahaan' => $row->Bool_SKT_Perusahaan,
                'Bool_SIUP_TDP' => $row->Bool_SIUP_TDP,
                'Bool_Registrasi' => $row->Bool_Registrasi,
                'Bool_PKP' => $row->Bool_PKP,
                'Bool_SK_Domisili' => $row->Bool_SK_Domisili,
                'Izin_Lain' => $row->Izin_Lain,
                'ID_Project_JNS' => $row->ID_Project_JNS,
                'ID_Hdr_Project' => $row->ID_Hdr_Project,
                'ID_Project' => $row->ID_Project,
                'Created_by' => $row->Created_by,
                'EntryTime' => $row->EntryTime,
                'Modified_by' => $row->Modified_by,
                'Last_Modified' => $row->Last_Modified,
            );
            $this->load->view('transaksi/projects_izin/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/projects_izin'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/projects_izin/create_action'),
            'Bool_Izin_Akta_Notaris' => set_value('Bool_Izin_Akta_Notaris'),
            'Izin_Akta_Notaris' => set_value('Izin_Akta_Notaris'),
            'Bool_Izin_Pengesahan' => set_value('Bool_Izin_Pengesahan'),
            'Izin_Pengesahan' => set_value('Izin_Pengesahan'),
            'Bool_NPWP' => set_value('Bool_NPWP'),
            'Bool_NPWP_Perusahaan' => set_value('Bool_NPWP_Perusahaan'),
            'Bool_SKT_Perusahaan' => set_value('Bool_SKT_Perusahaan'),
            'Bool_SIUP_TDP' => set_value('Bool_SIUP_TDP'),
            'Bool_Registrasi' => set_value('Bool_Registrasi'),
            'Bool_PKP' => set_value('Bool_PKP'),
            'Bool_SK_Domisili' => set_value('Bool_SK_Domisili'),
            'Izin_Lain' => set_value('Izin_Lain'),
            'ID_Project_JNS' => set_value('ID_Project_JNS'),
            'ID_Hdr_Project' => set_value('ID_Hdr_Project'),
            'ID_Project' => set_value('ID_Project'),
            'Created_by' => set_value('Created_by'),
            'EntryTime' => set_value('EntryTime'),
            'Modified_by' => set_value('Modified_by'),
            'Last_Modified' => set_value('Last_Modified'),
        );
        redirect(site_url('transaksi/trs_projects_uraian/form', $data));
    }

    public function create_action()
    {
        $id_projects = $this->input->post('ID_Project', TRUE);
        $data = array(
            'Bool_Izin_Akta_Notaris' => $this->input->post('Bool_Izin_Akta_Notaris', TRUE),
            'Izin_Akta_Notaris' => $this->input->post('Izin_Akta_Notaris', TRUE),
            'Bool_Izin_Pengesahan' => $this->input->post('Bool_Izin_Pengesahan', TRUE),
            'Izin_Pengesahan' => $this->input->post('Izin_Pengesahan', TRUE),
            'Bool_NPWP' => $this->input->post('Bool_NPWP', TRUE),
            'Bool_NPWP_Perusahaan' => $this->input->post('Bool_NPWP_Perusahaan', TRUE),
            'Bool_SKT_Perusahaan' => $this->input->post('Bool_SKT_Perusahaan', TRUE),
            'Bool_SIUP_TDP' => $this->input->post('Bool_SIUP_TDP', TRUE),
            'Bool_Registrasi' => $this->input->post('Bool_Registrasi', TRUE),
            'Bool_PKP' => $this->input->post('Bool_PKP', TRUE),
            'Bool_SK_Domisili' => $this->input->post('Bool_SK_Domisili', TRUE),
            'Izin_Lain' => $this->input->post('Izin_Lain', TRUE),
            'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
            'ID_Project' => $id_projects,
            'ID_Project_JNS' => $this->M_Project_izin->get_id(),
            'Created_By' => $this->session->userdata('yangLogin'),
            'EntryTime' => date('Y-m-d H:i:s'),
        );

        $this->M_Project_izin->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('transaksi/project_uraian/create_uraian/') . $id_projects);

    }

    public function update($id)
    {
        $row = $this->M_Project_izin->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/projects_izin/update_action'),
                'Bool_Izin_Akta_Notaris' => set_value('Bool_Izin_Akta_Notaris', $row->Bool_Izin_Akta_Notaris),
                'Izin_Akta_Notaris' => set_value('Izin_Akta_Notaris', $row->Izin_Akta_Notaris),
                'Bool_Izin_Pengesahan' => set_value('Bool_Izin_Pengesahan', $row->Bool_Izin_Pengesahan),
                'Izin_Pengesahan' => set_value('Izin_Pengesahan', $row->Izin_Pengesahan),
                'Bool_NPWP' => set_value('Bool_NPWP', $row->Bool_NPWP),
                'Bool_NPWP_Perusahaan' => set_value('Bool_NPWP_Perusahaan', $row->Bool_NPWP_Perusahaan),
                'Bool_SKT_Perusahaan' => set_value('Bool_SKT_Perusahaan', $row->Bool_SKT_Perusahaan),
                'Bool_SIUP_TDP' => set_value('Bool_SIUP_TDP', $row->Bool_SIUP_TDP),
                'Bool_Registrasi' => set_value('Bool_Registrasi', $row->Bool_Registrasi),
                'Bool_PKP' => set_value('Bool_PKP', $row->Bool_PKP),
                'Bool_SK_Domisili' => set_value('Bool_SK_Domisili', $row->Bool_SK_Domisili),
                'Izin_Lain' => set_value('Izin_Lain', $row->Izin_Lain),
                'ID_Project_JNS' => set_value('ID_Project_JNS', $row->ID_Project_JNS),
                'ID_Hdr_Project' => set_value('ID_Hdr_Project', $row->ID_Hdr_Project),
                'ID_Project' => set_value('ID_Project', $row->ID_Project),
                'Created_by' => set_value('Created_by', $row->Created_by),
                'EntryTime' => set_value('EntryTime', $row->EntryTime),
                'Modified_by' => set_value('Modified_by', $row->Modified_by),
                'Last_Modified' => set_value('Last_Modified', $row->Last_Modified),
            );
            $this->load->view('transaksi/projects_izin/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_projects_izin'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_Project_JNS', TRUE));
        } else {
            $data = array(
                'Bool_Izin_Akta_Notaris' => $this->input->post('Bool_Izin_Akta_Notaris', TRUE),
                'Izin_Akta_Notaris' => $this->input->post('Izin_Akta_Notaris', TRUE),
                'Bool_Izin_Pengesahan' => $this->input->post('Bool_Izin_Pengesahan', TRUE),
                'Izin_Pengesahan' => $this->input->post('Izin_Pengesahan', TRUE),
                'Bool_NPWP' => $this->input->post('Bool_NPWP', TRUE),
                'Bool_NPWP_Perusahaan' => $this->input->post('Bool_NPWP_Perusahaan', TRUE),
                'Bool_SKT_Perusahaan' => $this->input->post('Bool_SKT_Perusahaan', TRUE),
                'Bool_SIUP_TDP' => $this->input->post('Bool_SIUP_TDP', TRUE),
                'Bool_Registrasi' => $this->input->post('Bool_Registrasi', TRUE),
                'Bool_PKP' => $this->input->post('Bool_PKP', TRUE),
                'Bool_SK_Domisili' => $this->input->post('Bool_SK_Domisili', TRUE),
                'Izin_Lain' => $this->input->post('Izin_Lain', TRUE),
                'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
                'ID_Project' => $this->input->post('ID_Project', TRUE),
                'Created_by' => $this->input->post('Created_by', TRUE),
                'EntryTime' => $this->input->post('EntryTime', TRUE),
                'Modified_by' => $this->input->post('Modified_by', TRUE),
                'Last_Modified' => $this->input->post('Last_Modified', TRUE),
            );

            $this->M_Project_izin->update($this->input->post('ID_Project_JNS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_projects_izin'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_Project_izin->get_by_id($id);

        if ($row) {
            $this->M_Project_izin->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_projects_izin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_projects_izin'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Bool_Izin_Akta_Notaris', 'bool izin akta notaris', 'trim|required');
        $this->form_validation->set_rules('Izin_Akta_Notaris', 'izin akta notaris', 'trim|required');
        $this->form_validation->set_rules('Bool_Izin_Pengesahan', 'bool izin pengesahan', 'trim|required');
        $this->form_validation->set_rules('Izin_Pengesahan', 'izin pengesahan', 'trim|required');
        $this->form_validation->set_rules('Bool_NPWP', 'bool npwp', 'trim|required');
        $this->form_validation->set_rules('Bool_NPWP_Perusahaan', 'bool npwp perusahaan', 'trim|required');
        $this->form_validation->set_rules('Bool_SKT_Perusahaan', 'bool skt perusahaan', 'trim|required');
        $this->form_validation->set_rules('Bool_SIUP_TDP', 'bool siup tdp', 'trim|required');
        $this->form_validation->set_rules('Bool_Registrasi', 'bool registrasi', 'trim|required');
        $this->form_validation->set_rules('Bool_PKP', 'bool pkp', 'trim|required');
        $this->form_validation->set_rules('Bool_SK_Domisili', 'bool sk domisili', 'trim|required');
        $this->form_validation->set_rules('Izin_Lain', 'izin lain', 'trim|required');
        $this->form_validation->set_rules('ID_Hdr_Project', 'id hdr project', 'trim|required');
        $this->form_validation->set_rules('ID_Project', 'id project', 'trim|required');
        $this->form_validation->set_rules('Created_by', 'created by', 'trim|required');
        $this->form_validation->set_rules('EntryTime', 'entrytime', 'trim|required');
        $this->form_validation->set_rules('Modified_by', 'modified by', 'trim|required');
        $this->form_validation->set_rules('Last_Modified', 'last modified', 'trim|required');

        $this->form_validation->set_rules('ID_Project_JNS', 'ID_Project_JNS', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create_izin($id)
    {
        $project = $this->M_project->find_first(array('id_project' => $id));
        if (!empty($project)) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('transaksi/projects_izin/create_action'),
                'Bool_Izin_Akta_Notaris' => set_value('Bool_Izin_Akta_Notaris'),
                'Izin_Akta_Notaris' => set_value('Izin_Akta_Notaris'),
                'Bool_Izin_Pengesahan' => set_value('Bool_Izin_Pengesahan'),
                'Izin_Pengesahan' => set_value('Izin_Pengesahan'),
                'Bool_NPWP' => set_value('Bool_NPWP'),
                'Bool_NPWP_Perusahaan' => set_value('Bool_NPWP_Perusahaan'),
                'Bool_SKT_Perusahaan' => set_value('Bool_SKT_Perusahaan'),
                'Bool_SIUP_TDP' => set_value('Bool_SIUP_TDP'),
                'Bool_Registrasi' => set_value('Bool_Registrasi'),
                'Bool_PKP' => set_value('Bool_PKP'),
                'Bool_SK_Domisili' => set_value('Bool_SK_Domisili'),
                'Izin_Lain' => set_value('Izin_Lain'),
                'ID_Project_JNS' => set_value('ID_Project_JNS'),
                'ID_Hdr_Project' => $project->id_hdr_project,
                'ID_Project' => $id,
                'pages' => 'transaksi/projects_izin/form',
            );
            $this->load->view('layout', $data);
        } else {
            redirect(site_url('transaksi/project/'));
        }
    }

}

/* End of file Projects_izin.php */
/* Location: ./application/controllers/Projects_izin.php */
