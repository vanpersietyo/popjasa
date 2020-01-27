<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_uraian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Project_uraian');
        $this->load->model('M_project');
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->M_login->isLogin();
    }

    public function index()
    {
        $this->load->view('transaksi/project_uraian/trs_project_uraian_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_Project_uraian->json();
    }

    public function read($id)
    {
        $row = $this->M_Project_uraian->get_by_id($id);
        if ($row) {
            $data = array(
                'nm_perusahaan' => $row->nm_perusahaan,
                'modal' => $row->modal,
                'presentase_shm' => $row->presentase_shm,
                'hrg_saham' => $row->hrg_saham,
                'No_Telp' => $row->No_Telp,
                'No_Fax' => $row->No_Fax,
                'alamat' => $row->alamat,
                'kota' => $row->kota,
                'kelurahan' => $row->kelurahan,
                'kabupaten' => $row->kabupaten,
                'izin_persetujuan' => $row->izin_persetujuan,
                'signature_commander' => $row->signature_commander,
                'penerima' => $row->penerima,
                'ID_Project_Uraian' => $row->ID_Project_Uraian,
                'ID_Hdr_Project' => $row->ID_Hdr_Project,
                'ID_Project' => $row->ID_Project,
                'Created_by' => $row->Created_by,
                'EntryTime' => $row->EntryTime,
                'Modified_by' => $row->Modified_by,
                'Last_Modified' => $row->Last_Modified,
            );
            $this->load->view('transaksi/project_uraian/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_project_uraian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/project_uraian/create_action'),
            'nm_perusahaan' => set_value('nm_perusahaan'),
            'modal' => set_value('modal'),
            'presentase_shm' => set_value('presentase_shm'),
            'hrg_saham' => set_value('hrg_saham'),
            'No_Telp' => set_value('No_Telp'),
            'No_Fax' => set_value('No_Fax'),
            'alamat' => set_value('alamat'),
            'kota' => set_value('kota'),
            'kelurahan' => set_value('kelurahan'),
            'kabupaten' => set_value('kabupaten'),
            'izin_persetujuan' => set_value('izin_persetujuan'),
            'signature_commander' => set_value('signature_commander'),
            'penerima' => set_value('penerima'),
            'ID_Project_Uraian' => set_value('ID_Project_Uraian'),
            'ID_Hdr_Project' => set_value('ID_Hdr_Project'),
            'ID_Project' => set_value('ID_Project'),
            'Created_by' => set_value('Created_by'),
            'EntryTime' => set_value('EntryTime'),
            'Modified_by' => set_value('Modified_by'),
            'Last_Modified' => set_value('Last_Modified'),
        );
        $this->load->view('transaksi/project_uraian/form', $data);
    }

    public function create_action()
    {        
        $id_projects = $this->input->post('ID_Project', TRUE);
        $data = array(
            'nm_perusahaan' => $this->input->post('nm_perusahaan', TRUE),
            'modal' => $this->input->post('modal', TRUE),
            'presentase_shm' => $this->input->post('presentase_shm', TRUE),
            'hrg_saham' => $this->input->post('hrg_saham', TRUE),
            'No_Telp' => $this->input->post('No_Telp', TRUE),
            'No_Fax' => $this->input->post('No_Fax', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'kota' => $this->input->post('kota', TRUE),
            'kelurahan' => $this->input->post('kelurahan', TRUE),
            'kabupaten' => $this->input->post('kabupaten', TRUE),
            'izin_persetujuan' => $this->input->post('izin_persetujuan', TRUE),
            'signature_commander' => $this->input->post('signature_commander', TRUE),
            'penerima' => $this->input->post('penerima', TRUE),
            'modal_disetor' => $this->input->post('modal_disetor', TRUE),
            'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
            'ID_Project' => $id_projects,
            'Created_By' => $this->session->userdata('yangLogin'),
            'EntryTime' => date('Y-m-d H:i:s'),
            'ID_Project_Uraian' => $this->M_Project_uraian->get_Id(),
        );

        $this->M_Project_uraian->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('transaksi/progress/update_track/') . $id_projects);
    }

    public function update($id)
    {
        $row = $this->M_Project_uraian->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/project_uraian/update_action'),
                'nm_perusahaan' => set_value('nm_perusahaan', $row->nm_perusahaan),
                'modal' => set_value('modal', $row->modal),
                'presentase_shm' => set_value('presentase_shm', $row->presentase_shm),
                'hrg_saham' => set_value('hrg_saham', $row->hrg_saham),
                'No_Telp' => set_value('No_Telp', $row->No_Telp),
                'No_Fax' => set_value('No_Fax', $row->No_Fax),
                'alamat' => set_value('alamat', $row->alamat),
                'kota' => set_value('kota', $row->kota),
                'kelurahan' => set_value('kelurahan', $row->kelurahan),
                'kabupaten' => set_value('kabupaten', $row->kabupaten),
                'izin_persetujuan' => set_value('izin_persetujuan', $row->izin_persetujuan),
                'signature_commander' => set_value('signature_commander', $row->signature_commander),
                'penerima' => set_value('penerima', $row->penerima),
                'modal_disetor' => set_value('modal_disetor', $row->modal_disetor),
                'ID_Project_Uraian' => set_value('ID_Project_Uraian', $row->ID_Project_Uraian),
                'ID_Hdr_Project' => set_value('ID_Hdr_Project', $row->ID_Hdr_Project),
                'ID_Project' => set_value('ID_Project', $row->ID_Project),
                'pages' => 'transaksi/project_uraian/form',
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
            'nm_perusahaan' => $this->input->post('nm_perusahaan', TRUE),
            'modal' => $this->input->post('modal', TRUE),
            'presentase_shm' => $this->input->post('presentase_shm', TRUE),
            'hrg_saham' => $this->input->post('hrg_saham', TRUE),
            'No_Telp' => $this->input->post('No_Telp', TRUE),
            'No_Fax' => $this->input->post('No_Fax', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'kota' => $this->input->post('kota', TRUE),
            'kelurahan' => $this->input->post('kelurahan', TRUE),
            'kabupaten' => $this->input->post('kabupaten', TRUE),
            'izin_persetujuan' => $this->input->post('izin_persetujuan', TRUE),
            'signature_commander' => $this->input->post('signature_commander', TRUE),
            'penerima' => $this->input->post('penerima', TRUE),
            'modal_disetor' => $this->input->post('modal_disetor', true),
            'ID_Hdr_Project' => $this->input->post('ID_Hdr_Project', TRUE),
            'ID_Project' => $id_projects,
            'Modified_by' => $this->session->userdata('yangLogin'),
            'Last_Modified' => date('Y-m-d H:i:s'),
        );

        $this->M_Project_uraian->update($this->input->post('ID_Project_Uraian', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('transaksi/progress/update_track/') . $id_projects);
        
    }

    public function delete($id)
    {
        $row = $this->M_Project_uraian->get_by_id($id);

        if ($row) {
            $this->M_Project_uraian->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_project_uraian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_project_uraian'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nm_perusahaan', 'nm perusahaan', 'trim|required');
        $this->form_validation->set_rules('modal', 'modal', 'trim|required|numeric');
        $this->form_validation->set_rules('presentase_shm', 'presentase shm', 'trim|required|numeric');
        $this->form_validation->set_rules('hrg_saham', 'hrg saham', 'trim|required|numeric');
        $this->form_validation->set_rules('No_Telp', 'no telp', 'trim|required');
        $this->form_validation->set_rules('No_Fax', 'no fax', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
        $this->form_validation->set_rules('izin_persetujuan', 'izin persetujuan', 'trim|required');
        $this->form_validation->set_rules('signature_commander', 'signature commander', 'trim|required');
        $this->form_validation->set_rules('penerima', 'penerima', 'trim|required');
        $this->form_validation->set_rules('ID_Hdr_Project', 'id hdr project', 'trim|required');
        $this->form_validation->set_rules('ID_Project', 'id project', 'trim|required');
        $this->form_validation->set_rules('Created_by', 'created by', 'trim|required');
        $this->form_validation->set_rules('EntryTime', 'entrytime', 'trim|required');
        $this->form_validation->set_rules('Modified_by', 'modified by', 'trim|required');
        $this->form_validation->set_rules('Last_Modified', 'last modified', 'trim|required');

        $this->form_validation->set_rules('ID_Project_Uraian', 'ID_Project_Uraian', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create_uraian($id)
    {
        $project = $this->M_project->find_first(array('id_project' => $id));
        if (!empty($project)) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('transaksi/project_uraian/create_action'),
                'nm_perusahaan' => set_value('nm_perusahaan'),
                'modal' => set_value('modal'),
                'presentase_shm' => set_value('presentase_shm'),
                'hrg_saham' => set_value('hrg_saham'),
                'No_Telp' => set_value('No_Telp'),
                'No_Fax' => set_value('No_Fax'),
                'alamat' => set_value('alamat'),
                'kota' => set_value('kota'),
                'kelurahan' => set_value('kelurahan'),
                'kabupaten' => set_value('kabupaten'),
                'izin_persetujuan' => set_value('izin_persetujuan'),
                'signature_commander' => set_value('signature_commander'),
                'penerima' => set_value('penerima'),
                'modal_disetor' => set_value('modal_disetor'),
                'ID_Project_Uraian' => set_value('ID_Project_Uraian'),
                'ID_Hdr_Project' => $project->id_hdr_project,
                'ID_Project' => $id,
                'pages' => 'transaksi/project_uraian/form',
            );
            $this->load->view('layout', $data);
        } else {
            redirect(site_url('transaksi/project/'));
        }
    }

    public function cek_exist_projects($id)
    {
        $project_ket = $this->M_Project_uraian->find_first(["id_project" => $id]);
        if ($project_ket) {
            return $this->update($project_ket->ID_Project_Uraian);
        } else {
            return $this->create_uraian($id);
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->M_Project_uraian->get_by_project($id);
        echo json_encode($data);
    }
}

/* End of file Project_uraian.php */
/* Location: ./application/controllers/Project_uraian.php */
