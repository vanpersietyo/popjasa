<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biayapengeluaran extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_pengeluaran', 'M_pengeluaran');
    }

    public function index(){
        $data['pages']='report/biayapengeluaran';
        $this->load->view('layout',$data);
    }

    function cetak(){
        if ($this->input->post('submitForm')=='rekap') {
            $tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
            $tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
            $this->pdf($tgl_awal,$tgl_akhir);
        }elseif ($this->input->post('submitForm')=='log') {
            $tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
            $tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
            $this->pdf_log($tgl_awal,$tgl_akhir);
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
        $pdf->Cell(0,7,"LAPORAN REKAPITULASI BIAYA PENGELUARAN",0,2,'C');
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
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(10,5,'No',1,0,'C');
        $pdf->Cell(35,5,'Nama Pengeluaran',1,0,'L');
        $pdf->Cell(35,5,'Jumlah',1,0,'R');
        $pdf->Cell(100,5,'Keterangan',1,0,'L');
        $pdf->Cell(10,5,'',0,1);
        $list = $this->M_pengeluaran->get_rekap($TGL01,$TGL02);
        $i='1';
        foreach ($list as $row){
            $pdf->SetFont('Arial','',7);
            $pdf->Cell(10,5,$i,1,0,'C');
            $pdf->Cell(35,5,$row->nm_rekbiaya,1,0,'L');
            $pdf->Cell(35,5,number_format($row->pengeluaran),1,0,'R');
            $pdf->Cell(100,5,$row->keterangan,1,0,'L');

            $sum_out[]=$row->pengeluaran;
            $pdf->Cell(0,5,'',0,1,'C');
            $i='1'+ $i;
        }
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(45,5,'TOTAL PENGELUARAN  ',1,0,'R');
        $tot_pengeluaran=array_sum($sum_out);
        $pdf->Cell(35,5,number_format($tot_pengeluaran),1,0,'R');
        $pdf->Cell(100,5,'',1,0,'R');
        $pdf->Output();
    }

    function pdf_log($tgl_awal,$tgl_akhir){
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
        $pdf->Cell(0,7,"LAPORAN LOG BIAYA PENGELUARAN",0,2,'C');
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
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(10,5,'No',1,0,'C');
        $pdf->Cell(35,5,'Nama Pengeluaran',1,0,'L');
        $pdf->Cell(35,5,'Jumlah',1,0,'R');
        $pdf->Cell(100,5,'Keterangan',1,0,'L');
        $pdf->Cell(10,5,'',0,1);
        $list = $this->M_pengeluaran->get_log($TGL01,$TGL02);
        $i='1';
        foreach ($list as $row){
            $pdf->SetFont('Arial','',7);
            $pdf->Cell(10,5,$i,1,0,'C');
            $pdf->Cell(35,5,$row->nm_rekbiaya,1,0,'L');
            $pdf->Cell(35,5,number_format($row->pengeluaran),1,0,'R');
            $pdf->Cell(100,5,$row->keterangan,1,0,'L');

            $sum_log[]=$row->pengeluaran;
            $pdf->Cell(0,5,'',0,1,'C');
            $i='1'+ $i;
        }
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(45,5,'TOTAL PENGELUARAN  ',1,0,'R');
        $tot_pengeluaran=array_sum($sum_log);
        $pdf->Cell(35,5,number_format($tot_pengeluaran),1,0,'R');
        $pdf->Cell(100,5,'',1,0,'R');
        $pdf->Output();
    }




}
