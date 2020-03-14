<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rfixasset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('M_Trs_fix_asset_dtl');
        $this->load->model('M_Trs_fix_asset_hdr');
    }

    public function index(){
        $data['pages']='report/fixasset';
        $this->load->view('layout',$data);
    }

    function cetak(){
        if ($this->input->post('submitForm')=='rekap') {
//            $tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
//            $tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
            $this->pdf();
        }
    }

    function pdf(){
        $cabang=$this->session->userdata('nm_cabang');

        $pdf = new FPDF('l','mm','LEGAL');
        // membuat halaman baru
        $pdf->AddPage('L');
        // setting jenis font yang akan digunakan
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',268,5,0,20);
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,5,0,20);
        $pdf->SetFont('Times','B',16);
        // mencetak string
        $sysdate=date('d/m/Y H:i');
        $pdf->Cell(0,7,"LAPORAN PERHITUNGAN PENYUSUTAN ASET POPJASA",0,2,'C');
//        $pdf->Cell(0,5,"POPJASA",0,2,'C');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(0,1,"KANTOR CABANG : $cabang",0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(2,5,'_____________________________________________________________________________________________________________________',0,1,'L');
        $pdf->SetFont('Times','B',8);
//        $pdf->Cell(280,5,"Periode     : $periode",0,2,'L');
        $pdf->Cell(280,5,"Tgl Cetak : $sysdate",0,2,'L');
//        $pdf->Cell(280,5,"Filter        : ($TGL1) - ($TGL2)",0,2,'L');
        $pdf->Cell(10,5,'',0,1);
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        //header
        $pdf->Cell(10,5,'',0,1);
        $pdf->SetFont('Arial','B',8);

        $pdf->Cell(10,12,'No',1,0,'C');
        $pdf->Cell(55,12,'NAMA ASSET',1,0,'C');
        $pdf->Cell(35,12,'JENIS',1,0,'C');
        $pdf->Cell(35,12,'WAKTU PEMBELIAN',1,0,'C');
        $pdf->Cell(25,12,'ESTIMASI',1,0,'C');
        $pdf->Cell(35,12,'AKHIR PENYUSUTAN',1,0,'C');
        $pdf->Cell(35,12,'HARGA BELI',1,0,'C');
        $pdf->Cell(35,12,'PENYUSUTAN/THN',1,0,'C');
        $pdf->Cell(35,12,'PENYUSUTAN/BLN',1,0,'C');
        $pdf->Cell(35,12,'PEMBULATAN',1,0,'C');
//        $pdf->Cell(10,12,'',1,1);
        $list = $this->M_Trs_fix_asset_dtl->get_all_report();
        $i='1';
        foreach ($list as $row){
            $pdf->SetFont('Arial','',8);

            $pdf->Cell(10,5,$i,1,0,'C');
            $pdf->Cell(55,5,$row->Nama_FA,1,0,'L');
            $pdf->Cell(35,5,$row->Jenis,1,0,'C');
            $pdf->Cell(35,5,$row->Date_beli,1,0,'C');
            $pdf->Cell(25,5,$row->Estimasi,1,0,'C');
            $pdf->Cell(35,5,$row->Date_penyusutan,1,0,'C');
            $pdf->Cell(35,5,number_format($row->Hrg_beli),1,0,'C');
            $pdf->Cell(35,5,number_format($row->Penyusutan_thn),1,0,'C');
            $pdf->Cell(35,5,number_format($row->Penyusutan_bln),1,0,'C');
            $pdf->Cell(35,5,number_format($row->Pembulatan),1,0,'C');
            $pdf->Cell(0,5,'',0,1,'C');
            $i='1'+ $i;
        }
        $pdf->Output();
    }

}
