<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_logs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Project_logs');
        $this->load->model('M_project');
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $this->load->view('project_logs/trs_project_logs_list');
    }

    public function get_logs($id)
    {
        $project = $this->M_project->find_first(array('id_project' => $id));
        $data = array(
            "project" => $project,
            "pages" => "transaksi/project_logs/list",
        );
        $this->load->view('layout', $data);
    }

    public function json($id)
    {
        header('Content-Type: application/json');
        echo $this->M_Project_logs->json($id);
    }

    public function read($id)
    {
        $row = $this->M_Project_logs->get_by_id($id);
        if ($row) {
            $data = array(
                'Project_id' => $row->Project_id,
                'LineNo' => $row->LineNo,
                'Status_log' => $row->Status_log,
                'tgl_log' => $row->tgl_log,
                'keterangan' => $row->keterangan,
                'created_by' => $row->created_by,
                'created_at' => $row->created_at,
                'modified_by' => $row->modified_by,
                'modified_at' => $row->modified_at,
            );
            $this->load->view('project_logs/trs_project_logs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('project_logs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/project_logs/create_action'),
            'Project_id' => set_value('Project_id'),
            'LineNo' => set_value('LineNo'),
            'Status_log' => set_value('Status_log'),
            'tgl_log' => set_value('tgl_log'),
            'keterangan' => set_value('keterangan'),
            'pages' => 'transaksi/project_logs/form',
        );
        $this->load->view('layout', $data);
    }

    public function create_progress($id)
    {
        $projects = $this->M_project->find_first(["id_project" => $id]);
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/project_logs/create_action'),
            'Project_id' => $projects->id_project,
            'LineNo' => set_value('LineNo'),
            'Status_log' => set_value('Status_log'),
            'tgl_log' => set_value('tgl_log'),
            'keterangan' => set_value('keterangan'),
            'pages' => 'transaksi/project_logs/form',
        );
        $this->load->view('layout', $data);
    }


    public function create_action()
    {
        $this->_rules();
        $id_project = $this->input->post('Project_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'Status_log' => $this->input->post('Status_log', TRUE),
                'tgl_log' => $this->input->post('tgl_log', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'created_by' => $this->session->userdata('yangLogin'),
                'created_at' => date('Y-m-d H:i:s'),
                'Project_id' => $id_project,
                'LineNo' => $this->M_Project_logs->getLineNo($id_project),
            );

            $this->M_Project_logs->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi/project_logs/get_logs/') . $id_project);
        }
    }

    public function update($id)
    {
        $row = $this->M_Project_logs->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/project_logs/update_action'),
                'Project_id' => set_value('Project_id', $row->Project_id),
                'LineNo' => set_value('LineNo', $row->LineNo),
                'Status_log' => set_value('Status_log', $row->Status_log),
                'tgl_log' => set_value('tgl_log', $row->tgl_log),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'pages' => 'transaksi/project_logs/form',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/project_logs/get_logs/') . $id);
        }
    }

    public function update_action()
    {
        $this->_rules();
        $id_project = $this->input->post('Project_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Project_id', TRUE));
        } else {
            $data = array(
                'Status_log' => $this->input->post('Status_log', TRUE),
                'tgl_log' => $this->input->post('tgl_log', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'modified_by' => $this->input->post('modified_by', TRUE),
                'modified_at' => $this->input->post('modified_at', TRUE),
            );

            $this->M_Project_logs->update($id_project, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi/project_logs/get_logs/') . $id_project);
        }
    }

    public function delete($id)
    {
        $row = $this->M_Project_logs->get_by_id($id);

        if ($row) {
            $this->M_Project_logs->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi/project_logs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/project_logs'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Status_log', 'status log', 'trim|required');
        $this->form_validation->set_rules('tgl_log', 'tgl log', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('Project_id', 'Project_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Project_logs.php */
/* Location: ./application/controllers/Project_logs.php */
