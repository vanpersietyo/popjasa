<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projects_ket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Project_ket');
        $this->load->model('M_project');
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $this->load->view('transaksi/projects_ket/list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_Project_ket->json();
    }

    public function read($id)
    {
        $row = $this->M_Project_ket->get_by_id($id);
        if ($row) {
            $data = array(
                'Ket_Email' => $row->Ket_Email,
                'Email_Pengurus' => $row->Email_Pengurus,
                'No_Telp' => $row->No_Telp,
                'Ket_Luas' => $row->Ket_Luas,
                'Ket_Bidang_Usaha' => $row->Ket_Bidang_Usaha,
                'Ket_Bidang_Usaha_Utama' => $row->Ket_Bidang_Usaha_Utama,
                'Ket_Informasi' => $row->Ket_Informasi,
                'ID_Project_Ket' => $row->ID_Project_Ket,
                'ID_Hdr_Project' => $row->ID_Hdr_Project,
                'ID_Project' => $row->ID_Project,
                'Created_By' => $row->Created_By,
                'EntryTime' => $row->EntryTime,
                'Modified_By' => $row->Modified_By,
                'Last_Mofidified' => $row->Last_Mofidified,
            );
            $this->load->view('transaksi/projects_ket/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_projects_ket'));
        }
    }

    public function cek_exist_projects($id) {

        $project_ket =$this->M_Project_ket->find_first(["ID_Project"=>$id]);
        if ($project_ket) {
            return $this->update($project_ket->ID_Project_Ket);
        }else {
            return $this->create($id);
        }
    }

    public function create($id)
    {
        $project = $this->M_project->find_first(["id_project"=>$id]);
        if (!empty($project)) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('transaksi/projects_ket/create_action'),
                'Ket_Email' => set_value('Ket_Email'),
                'Email_Pengurus' => set_value('Email_Pengurus'),
                'No_Telp' => set_value('No_Telp'),
                'Ket_Luas' => set_value('Ket_Luas'),
                'Ket_Bidang_Usaha' => set_value('Ket_Bidang_Usaha'),
                'Ket_Bidang_Usaha_Utama' => set_value('Ket_Bidang_Usaha_Utama'),
                'Ket_Informasi' => set_value('Ket_Informasi'),
                'ID_Project_Ket' => set_value('ID_Project_Ket'),
                'ID_Hdr_Project' => $project->id_hdr_project,
                'ID_Project' => $id,
                'Pass_Email' => set_value('Pass_Email'),
                'pages' => 'transaksi/projects_ket/form',
            );
            $this->load->view('layout', $data);
        }else {
            redirect(site_url("transaksi/project"));
        }

    }

    public function create_action()
    {       $id_project = $this->input->post('ID_Project', TRUE);
            $data = array(
                'Ket_Email' => $this->input->post('email', TRUE),
                'Email_Pengurus' => $this->input->post('email_pengurus', TRUE),
                'No_Telp' => $this->input->post('notelp', TRUE),
                'Ket_Luas' => $this->input->post('luas', TRUE),
                'Ket_Bidang_Usaha' => $this->input->post('Ket_Bidang_Usaha', TRUE),
                'Ket_Bidang_Usaha_Utama' => $this->input->post('Ket_Bidang_Usaha_Utama', TRUE),
                'Ket_Informasi' => $this->input->post('tahu', TRUE),
                'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
                'ID_Project' => $id_project,
                'ID_Project_Ket' => $this->M_Project_ket->get_id(),
                'Pass_Email' => $this->input->post('password',TRUE),
                'Created_By' => $this->session->userdata('yangLogin'),
                'EntryTime' => date('Y-m-d H:i:s'),
            );

            $this->M_Project_ket->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi/projects_izin/cek_exist_projects/').$id_project);
    }

    public function update($id)
    {
        $row = $this->M_Project_ket->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/projects_ket/update_action'),
                'Email' => set_value('Ket_Email', $row->Ket_Email),
                'Email_Pengurus' => set_value('Email_Pengurus', $row->Email_Pengurus),
                'No_Telp' => set_value('No_Telp', $row->No_Telp),
                'Ket_Luas' => set_value('Ket_Luas', $row->Ket_Luas),
                'Ket_Bidang_Usaha' => set_value('Ket_Bidang_Usaha', $row->Ket_Bidang_Usaha),
                'Ket_Informasi' => set_value('Ket_Informasi', $row->Ket_Informasi),
                'ID_Project_Ket' => set_value('ID_Project_Ket', $row->ID_Project_Ket),
                'ID_Hdr_Project' => set_value('ID_Hdr_Project', $row->ID_Hdr_Project),
                'ID_Project' => set_value('ID_Project', $row->ID_Project),
                'Pass_Email' => set_value('Pass_Email', $row->Pass_Email),
                'pages' => 'transaksi/projects_ket/form',                
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi/project'));
        }
    }

    public function update_action()
    {   $id_project = $this->input->post('ID_Project', TRUE);
        $data = array(
            'Ket_Email' => $this->input->post('email', TRUE),
            'Email_Pengurus' => $this->input->post('email_pengurus', TRUE),
            'No_Telp' => $this->input->post('notelp', TRUE),
            'Ket_Luas' => $this->input->post('luas', TRUE),
            'Ket_Bidang_Usaha' => $this->input->post('Ket_Bidang_Usaha', TRUE),
            'Ket_Informasi' => $this->input->post('tahu', TRUE),
            'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
            'ID_Project' => $id_project,
            'Modified_By' => $this->session->userdata('yangLogin'),
            'Last_Mofidified' => date('Y-m-d H:i:s'),
        );

        $this->M_Project_ket->update($this->input->post('ID_Project_Ket', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('transaksi/projects_izin/cek_exist_projects/').$id_project);       
    }

    public function delete($id)
    {
        $row = $this->M_Project_ket->get_by_id($id);

        if ($row) {
            $this->M_Project_ket->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_projects_ket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_projects_ket'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Ket_Email', 'ket email', 'trim|required');
        $this->form_validation->set_rules('Email_Pengurus', 'email pengurus', 'trim|required');
        $this->form_validation->set_rules('No_Telp', 'no telp', 'trim|required');
        $this->form_validation->set_rules('Ket_Luas', 'ket luas', 'trim|required');
        $this->form_validation->set_rules('Ket_Bidang_Usaha', 'ket bidang usaha', 'trim|required');
        $this->form_validation->set_rules('Ket_Bidang_Usaha_Utama', 'ket bidang usaha utama', 'trim|required');
        $this->form_validation->set_rules('Ket_Informasi', 'ket informasi', 'trim|required');
        $this->form_validation->set_rules('ID_Hdr_Project', 'id hdr project', 'trim|required');
        $this->form_validation->set_rules('ID_Project', 'id project', 'trim|required');
        $this->form_validation->set_rules('Created_By', 'created by', 'trim|required');
        $this->form_validation->set_rules('EntryTime', 'entrytime', 'trim|required');
        $this->form_validation->set_rules('Modified_By', 'modified by', 'trim|required');
        $this->form_validation->set_rules('Last_Mofidified', 'last mofidified', 'trim|required');

        $this->form_validation->set_rules('ID_Project_Ket', 'ID_Project_Ket', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

/* End of file Projects_ket.php */
/* Location: ./application/controllers/_projects_ket.php */
