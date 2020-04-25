<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Progres_kepuasan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MProgres_kepuasan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'progres_kepuasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'progres_kepuasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'progres_kepuasan/index.html';
            $config['first_url'] = base_url() . 'progres_kepuasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MProgres_kepuasan->total_rows($q);
        $progres_kepuasan = $this->MProgres_kepuasan->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'progres_kepuasan_data' => $progres_kepuasan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('/transaksi/progres_kepuasan/progres_kepuasan_list', $data);
    }

    public function cek_projects($id) {
        $row = $this->MProgres_kepuasan->get_by_id($id);
        if (row) {
            $this->update($row->id);
        }else {
            $this->create();
        }
    }

    public function read($id) 
    {
        $row = $this->MProgres_kepuasan->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_pelanggan' => $row->nama_pelanggan,
		'nama_perusahaan' => $row->nama_perusahaan,
		'no_telp' => $row->no_telp,
		'info_order' => $row->info_order,
		'info_order2' => $row->info_order2,
		'info_kepuasan' => $row->info_kepuasan,
		'status_photo' => $row->status_photo,
		'status_photo_tgl' => $row->status_photo_tgl,
		'status_fb' => $row->status_fb,
		'status_ig' => $row->status_ig,
		'referensi_nama' => $row->referensi_nama,
		'referensi_no_telp' => $row->referensi_no_telp,
	    );
            $this->load->view('/transaksi/progres_kepuasan/progres_kepuasan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('/transaksi/progres_kepuasan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('/transaksi/progres_kepuasan/create_action'),
	    'id' => set_value('id'),
	    'nama_pelanggan' => set_value('nama_pelanggan'),
	    'nama_perusahaan' => set_value('nama_perusahaan'),
	    'no_telp' => set_value('no_telp'),
	    'info_order' => set_value('info_order'),
	    'info_order2' => set_value('info_order2'),
	    'info_kepuasan' => set_value('info_kepuasan'),
	    'status_photo' => set_value('status_photo'),
	    'status_photo_tgl' => set_value('status_photo_tgl'),
	    'status_fb' => set_value('status_fb'),
	    'status_ig' => set_value('status_ig'),
	    'referensi_nama' => set_value('referensi_nama'),
	    'referensi_no_telp' => set_value('referensi_no_telp'),
	);
        $this->load->view('/transaksi/progres_kepuasan/progres_kepuasan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pelanggan' => $this->input->post('nama_pelanggan',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'info_order' => $this->input->post('info_order',TRUE),
		'info_order2' => $this->input->post('info_order2',TRUE),
		'info_kepuasan' => $this->input->post('info_kepuasan',TRUE),
		'status_photo' => $this->input->post('status_photo',TRUE),
		'status_photo_tgl' => $this->input->post('status_photo_tgl',TRUE),
		'status_fb' => $this->input->post('status_fb',TRUE),
		'status_ig' => $this->input->post('status_ig',TRUE),
		'referensi_nama' => $this->input->post('referensi_nama',TRUE),
		'referensi_no_telp' => $this->input->post('referensi_no_telp',TRUE),
	    );

            $this->MProgres_kepuasan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('/transaksi/progres_kepuasan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MProgres_kepuasan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('/transaksi/progres_kepuasan/update_action'),
		'id' => set_value('id', $row->id),
		'nama_pelanggan' => set_value('nama_pelanggan', $row->nama_pelanggan),
		'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'info_order' => set_value('info_order', $row->info_order),
		'info_order2' => set_value('info_order2', $row->info_order2),
		'info_kepuasan' => set_value('info_kepuasan', $row->info_kepuasan),
		'status_photo' => set_value('status_photo', $row->status_photo),
		'status_photo_tgl' => set_value('status_photo_tgl', $row->status_photo_tgl),
		'status_fb' => set_value('status_fb', $row->status_fb),
		'status_ig' => set_value('status_ig', $row->status_ig),
		'referensi_nama' => set_value('referensi_nama', $row->referensi_nama),
		'referensi_no_telp' => set_value('referensi_no_telp', $row->referensi_no_telp),
	    );
            $this->load->view('/transaksi/progres_kepuasan/progres_kepuasan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('/transaksi/progres_kepuasan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_pelanggan' => $this->input->post('nama_pelanggan',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'info_order' => $this->input->post('info_order',TRUE),
		'info_order2' => $this->input->post('info_order2',TRUE),
		'info_kepuasan' => $this->input->post('info_kepuasan',TRUE),
		'status_photo' => $this->input->post('status_photo',TRUE),
		'status_photo_tgl' => $this->input->post('status_photo_tgl',TRUE),
		'status_fb' => $this->input->post('status_fb',TRUE),
		'status_ig' => $this->input->post('status_ig',TRUE),
		'referensi_nama' => $this->input->post('referensi_nama',TRUE),
		'referensi_no_telp' => $this->input->post('referensi_no_telp',TRUE),
	    );

            $this->MProgres_kepuasan->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('/transaksi/progres_kepuasan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MProgres_kepuasan->get_by_id($id);

        if ($row) {
            $this->MProgres_kepuasan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('/transaksi/progres_kepuasan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('/transaksi/progres_kepuasan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pelanggan', 'nama pelanggan', 'trim|required');
	$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('info_order', 'info order', 'trim|required');
	$this->form_validation->set_rules('info_order2', 'info order2', 'trim|required');
	$this->form_validation->set_rules('info_kepuasan', 'info kepuasan', 'trim|required');
	$this->form_validation->set_rules('status_photo', 'status photo', 'trim|required');
	$this->form_validation->set_rules('status_photo_tgl', 'status photo tgl', 'trim|required');
	$this->form_validation->set_rules('status_fb', 'status fb', 'trim|required');
	$this->form_validation->set_rules('status_ig', 'status ig', 'trim|required');
	$this->form_validation->set_rules('referensi_nama', 'referensi nama', 'trim|required');
	$this->form_validation->set_rules('referensi_no_telp', 'referensi no telp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Progres_kepuasan.php */
/* Location: ./application/controllers/Progres_kepuasan.php */
