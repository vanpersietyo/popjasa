<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class   Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("unirest");
    }

    public function index()
    {
        $this->load->view('login/login16');
    }

    function process()
    {
        $this->load->model('M_login'); // load model_user
        $hasil = $this->M_login->cek_user(strtoupper($this->input->post('user_id')), $this->input->post('password'));
        if ($hasil == true) {
            $this->session->set_userdata('isLogin', true);
            $this->session->set_userdata('yangLogin', strtoupper($this->input->post('user_id')));
            $cabang = $this->M_login->get_cabang(strtoupper($this->input->post('user_id')));
            $akses = $this->M_login->get_akses(strtoupper($this->input->post('user_id')));
            $nm_cabang = $this->M_login->get_nmcabang($cabang->kd_cabang);
            $this->session->set_userdata('akses_user', strtoupper($akses->akses));
            $this->session->set_userdata('cabang', strtoupper($cabang->kd_cabang));
            $this->session->set_userdata('nm_cabang', strtoupper($nm_cabang->nm_cabang));

            //cek session URL, jika ada isi nya, redirect ke url tersebut
            $url = $this->session->userdata('url');
            if(!empty($url)){
                $this->session->unset_userdata('url');
                redirect(site_url($url));
            };

            if ($akses->akses == 'hrd') {
                redirect('dashboard/hrd');
            } elseif ($akses->akses == 'sls') {
                redirect('dashboard');
            } else {
                redirect('dashboard');
            }

        } else {
            echo "<script>alert('Gagal login: Cek Username, password!');history.go(-1);</script>";
        }
    }

    function logout()
    {
        $this->output->delete_cache();
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('auth');
    }
}
