<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labarugi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_labarugi', 'M_labarugi');
    }

    public function index(){
        $data['pages']='report/labarugi';
        $this->load->view('layout',$data);
    }

    function cetak(){
        if ($this->input->post('submitForm')=='rekap') {
            $tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
            $tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
            $this->pdf($tgl_awal,$tgl_akhir);
        }
    }



    function pdf($tgl_awal,$tgl_akhir){
        $TGL01=date("Y-m-d", strtotime($tgl_awal));
        $TGL02=date("Y-m-d", strtotime($tgl_akhir));
        $TGL2=date("d/m/Y", strtotime($tgl_akhir));
        $TGL1=date("d/m/Y", strtotime($tgl_awal));
        $periode=strtoupper(date("F Y", strtotime($tgl_akhir)));
        $PRD_BLTH=strtoupper(date("M-Y", strtotime($tgl_akhir)));
        $cabang=$this->session->userdata('nm_cabang');
        $sysdate=date('d/m/Y H:i');

        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage('P');
        // setting jenis font yang akan digunakan
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',180,10,0,20);
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,10,0,20);
        $pdf->SetFont('Times','B',16);
        // mencetak string
        $sysdate=date('d/m/Y H:i');
        $pdf->Cell(0,7,"LAPORAN LABA RUGI",0,2,'C');
        $pdf->Cell(0,5,"POPJASA",0,2,'C');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(0,1,"KANTOR CABANG : $cabang",0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(2,5,'________________________________________________________________________________',0,1,'L');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(280,5,"Periode     : $periode",0,2,'L');
        $pdf->Cell(280,5,"Tgl Cetak : $sysdate",0,2,'L');
        $pdf->Cell(280,5,"Filter        : ($TGL1) - ($TGL2)",0,2,'L');
        $pdf->Cell(10,5,'',0,1);
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        //header
        $pdf->Cell(10,5,'',0,1);
        $pdf->SetFont('Arial','B',8);

        //value
        $pdf->Cell(40,5,'RINCIAN UANG MASUK :',0,1,'L');
        $masuk=$this->M_labarugi->uang_masuk($TGL01,$TGL02);
        foreach ($masuk as $masuk ) {
            $pdf->Cell(95,5,"- $masuk->nm_customer",0,0,'L');
            $pdf->Cell(1,5,": Rp.  ",0,0,'R');
            $uang_masuk=number_format($masuk->jumlah_byr,0,",",".");
            $SUM_JUM_BIAYA[]=$masuk->jumlah_byr;
            $pdf->Cell(20,5,"$uang_masuk",0,1,'R');
        }
        $pdf->Cell(80,5,'___________________________________________________________________________ +',0,1,'L');
        $pdf->Cell(128,5,': Rp. ',0,0,'R');
        $pdf->Cell(20,5,number_format(array_sum($SUM_JUM_BIAYA)),0,1,'L');

        $pdf->Cell(40,5,'RINCIAN UANG KELUAR :',0,1,'L');
        $keluar=$this->M_labarugi->uang_keluar($TGL01,$TGL02);
        foreach ($keluar as $keluar ) {
            $pdf->Cell(95,5,"- $keluar->nm_rekbiaya",0,0,'L');
            $pdf->Cell(1,5,": Rp.  ",0,0,'R');
            $uang_keluar=number_format($keluar->pengeluaran,0,",",".");
            $jum_keluar[]=$keluar->pengeluaran;
            $pdf->Cell(20,5,"$uang_keluar",0,1,'R');
        }
        $pdf->Cell(80,5,'___________________________________________________________________________ +',0,1,'L');
        $pdf->Cell(128,5,': Rp. ',0,0,'R');
        $pdf->Cell(20,5,number_format(array_sum($jum_keluar)),0,1,'L');

        $pdf->Cell(40,5,'',0,1,'L');
        $pdf->Cell(40,5,'',0,1,'L');
        $pdf->Cell(80,5,'LABA RUGI PERUSAHAAN : ',0,0,'L');
        $pdf->Cell(40,5,'',0,1,'L');
        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,5,'TOTAL UANG MASUK',0,0,'L');
        $pdf->Cell(5,5,': Rp.',0,0,'L');
        $pdf->Cell(40,5,number_format(array_sum($SUM_JUM_BIAYA)),0,1,'R');
        $pdf->SetTextColor(255,0,0);
        $pdf->Cell(40,5,'TOTAL UANG KELUAR',0,0,'L');
        $pdf->Cell(5,5,': Rp.',0,0,'L');
        $pdf->Cell(40,5,number_format(array_sum($jum_keluar)),0,1,'R');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(80,5,'_______________________________________________________________________________ -',0,1,'L');

        $pdf->Cell(40,5,'LABA PENJUALAN',0,0,'L');
        $pdf->Cell(5,5,': Rp. ',0,0,'L');
        $pdf->Cell(20,5,number_format(((array_sum($SUM_JUM_BIAYA))-(array_sum($jum_keluar))) ),0,1,'R');


        $pdf->Output();
    }





}
