<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cashflow extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_labarugi', 'M_labarugi');
    }

    public function index(){
        $this->load->model('M_bank');
        $this->load->model('M_cabang');
        $akses          = $this->session->userdata('akses_user') === 'SU' ? true : false;
        $cabang         = $this->session->userdata('cabang');
        $data_cabang    = $akses ? $this->M_cabang->find() : $this->M_cabang->find([M_cabang::kd_cabang => $cabang]);
        $data =[
            'akses'	    => $akses,
            'bank'		=> $this->M_bank->find(),
            'cabang'	=> $data_cabang,
            'pages'		=> 'report/cashflow/index',
        ];
        $this->load->view('layout',$data);
    }

    function validasi(){
        $tgl_awal	= $this->input->post('tgl_awal');
        $tgl_akhir	= $this->input->post('tgl_akhir');
        $bayar 		= $this->input->post('bayar');
        $cabang 	= $this->input->post('cabang');
        $cutoff     = $this->input->post('cutoff_tanggal') ?: 'off';
        $harian     = false;

        $this->conversion->translate_error_form_validation();
        $data = $data['inputerror'] = $data['notiferror'] = []; //inisialisasi
        $data['status']         = TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']       = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

        //validasi input
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');
        $this->form_validation->set_rules('bayar', 'Pembayaran', 'required|trim');
        $this->form_validation->set_rules('cabang', 'Cabang', 'required|trim');

        if ($this->form_validation->run() == FALSE){
            $data['status'] = FALSE;
            foreach ($this->form_validation->error_array() as $dtl => $value) {
                $data['inputerror'][]   = $dtl;
                $data['notiferror'][]   = Conversion::template_error($value);
            }
        }

        $TGL01	= date("Y-m-d", strtotime($tgl_awal));
        $TGL02	= date("Y-m-d", strtotime($tgl_akhir));
        if($TGL02 < $TGL01){
            $data = [
                'inputerror'=> ['tgl_awal','tgl_akhir'],
                'notiferror'=> [
                    Conversion::template_error('Tanggal Awal Harus Lebih Kecil Dari Tanggal Akhir'),
                    Conversion::template_error('Tanggal Akhir Harus Lebih Besar Dari Tanggal Awal')
                ],
                'status'    => false,
            ];
        }

        if($data['status']) {

            $params 	= [
                'tgl_awal'	=> $tgl_awal,
                'tgl_akhir'	=> $tgl_akhir,
                'bayar'		=> $bayar,
                'cabang'	=> $cabang,
                'harian'	=> $harian,
                'cutoff'    => $cutoff
            ] ;
            $this->session->set_userdata('params_report_cashflow',$params);

            $messsage = site_url('report/cashflow/cetak_cashflow');
            $data['message'] = $messsage;
        }

        echo json_encode($data);
    }

    function validasi_harian(){
        $tgl_hariian= $this->input->post('tgl_harian');
        $bayar 		= $this->input->post('bayar');
        $cabang 	= $this->input->post('cabang');
        $cutoff     = $this->input->post('cutoff_tanggal') ?: 'off';
        $harian     = true;

        $this->conversion->translate_error_form_validation();
        $data = $data['inputerror'] = $data['notiferror'] = []; //inisialisasi
        $data['status']         = TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']       = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

        //validasi input
        $this->form_validation->set_rules('tgl_harian', 'Tanggal', 'required|trim');

        if ($this->form_validation->run() == FALSE){
            $data['status'] = FALSE;
            foreach ($this->form_validation->error_array() as $dtl => $value) {
                $data['inputerror'][]   = $dtl;
                $data['notiferror'][]   = Conversion::template_error($value);
            }
        }

        if($data['status']) {

            $params 	= [
                'tgl_awal'	=> $tgl_hariian,
                'tgl_akhir'	=> $tgl_hariian,
                'bayar'		=> $bayar,
                'cabang'	=> $cabang,
                'harian'	=> $harian,
                'cutoff'    => $cutoff
            ] ;
            $this->session->set_userdata('params_report_cashflow',$params);

            $messsage = site_url('report/cashflow/cetak_cashflow');
            $data['message'] = $messsage;
        }

        echo json_encode($data);
    }

    function cetak_cashflow()
    {
        $this->load->model('M_bank');
        $this->load->model('M_cabang');
        $this->load->model('report/M_v_rekapitulasi_cashflow');

        $data       = $this->session->userdata('params_report_cashflow');
        $subtitle   = "";
        if(!empty($data)){
            $tgl_awal 	= Conversion::convert_date($data['tgl_awal'],'Y-m-d');
            $tgl_akhir 	= Conversion::convert_date($data['tgl_akhir'],'Y-m-d');
            $bayar 		= $data['bayar'] ?: "all";
            $cabang     = isset($data['cabang']) ? $data['cabang'] : "all";
            $harian     = $data['harian'];
            $cutoff     = $data['cutoff'];
        }else{
            $tgl_awal 	= date("Y-m-d");
            $tgl_akhir 	= date("Y-m-d");
            $bayar 		= "all";
            $cabang 	= "all";
            $harian     = false;
            $cutoff     = 'off';
        }

        if($bayar === "all"){
            $subtitle   = "SEMUA PEMBAYARAN";
            if($cabang === "all"){
                $where		= [
                    M_v_rekapitulasi_cashflow::TGL." >= " => $tgl_awal,
                    M_v_rekapitulasi_cashflow::TGL." <= " => $tgl_akhir,
                ];
                $where_awal	= [M_v_rekapitulasi_cashflow::TGL." < " => $tgl_awal];
            }else{
                $where		= [
                    M_v_rekapitulasi_cashflow::TGL." >= "   => $tgl_awal,
                    M_v_rekapitulasi_cashflow::TGL." <= "   => $tgl_akhir,
                    M_v_rekapitulasi_cashflow::KD_CABANG    => $cabang
                ];
                $where_awal	= [
                    M_v_rekapitulasi_cashflow::TGL." < " => $tgl_awal,
                    M_v_rekapitulasi_cashflow::KD_CABANG => $cabang
                ];
            }
        }else{
            if($cabang === "all"){
                $where		= [
                    M_v_rekapitulasi_cashflow::TGL." >= " 	=> $tgl_awal,
                    M_v_rekapitulasi_cashflow::TGL." <= " 	=> $tgl_akhir,
                    M_v_rekapitulasi_cashflow::KD_BANK 		=> $bayar
                ];
                $where_awal	= [
                    M_v_rekapitulasi_cashflow::TGL." < " 	=> $tgl_awal,
                    M_v_rekapitulasi_cashflow::KD_BANK 		=> $bayar,
                ];
            }else{
                $where		= [
                    M_v_rekapitulasi_cashflow::TGL." >= " 	=> $tgl_awal,
                    M_v_rekapitulasi_cashflow::TGL." <= " 	=> $tgl_akhir,
                    M_v_rekapitulasi_cashflow::KD_BANK 		=> $bayar,
                    M_v_rekapitulasi_cashflow::KD_CABANG    => $cabang
                ];
                $where_awal	= [
                    M_v_rekapitulasi_cashflow::TGL." < " 	=> $tgl_awal,
                    M_v_rekapitulasi_cashflow::KD_BANK 		=> $bayar,
                    M_v_rekapitulasi_cashflow::KD_CABANG    => $cabang
                ];
            }
            $subtitle   = $this->M_bank->get_by_id($bayar)->nm_bank;
        }

        $order		= [M_v_rekapitulasi_cashflow::TGL => 'ASC',M_v_rekapitulasi_cashflow::ID_TRANS => 'ASC'];
        $ringkasan	= $this->M_v_rekapitulasi_cashflow->select([
            "column"	=> "sum(IF(TIPE='DEBET',NOMINAL,0-NOMINAL)) as TOTAL, KD_BANK, NM_BANK",
            "where"		=> $where,
            "group"		=> M_v_rekapitulasi_cashflow::KD_BANK,
        ]);
        $cashflow  	= $this->M_v_rekapitulasi_cashflow->find($where,$order);
        $saldo_awal = $cutoff === 'on' ? 0 : $this->M_v_rekapitulasi_cashflow->sum("IF(TIPE='DEBET',NOMINAL,0-NOMINAL)", $where_awal);

        $nm_cabang  = strtoupper($cabang === 'all' ? "Semua Cabang" : $this->M_cabang->get_by_id($cabang)->nm_cabang);
        $sysdate    = date('d/m/Y H:i');
        $tgl_awal	= Conversion::convert_date($tgl_awal,'d-m-Y');
        $tgl_akhir	= Conversion::convert_date($tgl_akhir,'d-m-Y');

        $var = [
            'page'      => 'report/cashflow/report_cashflow',
            'bayar'		=> $bayar,
            'tgl_awal'	=> $tgl_awal,
            'tgl_akhir'	=> $tgl_akhir,
            'cashflow'  => $cashflow,
            'saldo_awal'=> $saldo_awal,
            'ringkasan'	=> $ringkasan,
            'title'     => "Laporan Arus Kas",
            'subtitle'	=> $subtitle,
            'nm_cabang' => $nm_cabang,
            'harian'    => $harian,
            'cutoff'    => $cutoff,
            'logo'      => base_url('assets/app-assets/vendors/logo/popjasa.png')
        ];
        $this->load->view('report/layout',$var);
    }

    public function tes(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);

        $filename = 'simple';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}