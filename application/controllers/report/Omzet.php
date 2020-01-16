<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Omzet extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_penjualan', 'M_penjualan');
    }

    public function index(){
        $data['pages']='report/omzet';
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
        $pdf->Cell(0,7,"LAPORAN PENJUALAN BY CUSTOMER",0,2,'C');
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
        $pdf->Cell(100,5,'Nama Customer',1,0,'L');
        $pdf->Cell(20,5,'Jumlah Order',1,0,'R');
        $pdf->Cell(20,5,'Jumlah Deal',1,0,'R');
        $pdf->Cell(20,5,'Jumlah Bayar',1,0,'R');
        $pdf->Cell(20,5,'Sisa Bayar',1,0,'R');
        $pdf->Cell(0,5,'',0,1);
        $list = $this->M_penjualan->get_customer($TGL01,$TGL02);
        $i='1';
        foreach ($list as $row){
            $pdf->SetFont('Arial','',7);
            $pdf->Cell(10,5,$i,1,0,'C');
            $pdf->Cell(100,5,$row->nm_customer,1,0,'L');
            $pdf->Cell(20,5,number_format($row->jml_order),1,0,'R');
            $pdf->Cell(20,5,number_format($row->profit),1,0,'R');
            $pdf->Cell(20,5,number_format($row->jumlah_byr),1,0,'R');
            $pdf->Cell(20,5,number_format(($row->profit-$row->jumlah_byr)),1,0,'R');

            $sum_a[]=$row->profit;
            $sum_b[]=$row->jumlah_byr;
            $sum_c[]=($row->profit-$row->jumlah_byr);
            $sum_d[]=$row->jml_order;
            $pdf->Cell(0,5,'',0,1,'C');
            $i='1'+ $i;
        }
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(110,5,'TOTAL   ',1,0,'R');
        $tot_d=array_sum($sum_d);
        $pdf->Cell(20,5,number_format($tot_d),1,0,'R');
        $tot_a=array_sum($sum_a);
        $pdf->Cell(20,5,number_format($tot_a),1,0,'R');
        $tot_b=array_sum($sum_b);
        $pdf->Cell(20,5,number_format($tot_b),1,0,'R');
        $tot_c=array_sum($sum_c);
        $pdf->Cell(20,5,number_format($tot_c),1,0,'R');
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
        $pdf->Cell(0,7,"LAPORAN LOG PROJECT",0,2,'C');
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
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(10,5,'No',1,0,'C');
        $pdf->Cell(100,5,'Nama Layanan',1,0,'L');
        $pdf->Cell(20,5,'Jumlah Order',1,0,'R');
        $pdf->Cell(20,5,'Jumlah Deal',1,0,'R');
        $pdf->Cell(20,5,'Jumlah Bayar',1,0,'R');
        $pdf->Cell(20,5,'Sisa Bayar',1,0,'R');
        $pdf->Cell(0,5,'',0,1);
        $list = $this->M_penjualan->get_project($TGL01,$TGL02);
        $i='1';
        foreach ($list as $penjualan){
            $pdf->SetFont('Arial','',7);
            $pdf->Cell(10,5,$i,1,0,'C');
            $pdf->Cell(100,5,$penjualan->nama_layanan,1,0,'L');
            $pdf->Cell(20,5,number_format($penjualan->jml_order),1,0,'R');
            $pdf->Cell(20,5,number_format($penjualan->profit),1,0,'R');
            $pdf->Cell(20,5,number_format($penjualan->jumlah_byr),1,0,'R');
            $pdf->Cell(20,5,number_format(($penjualan->profit-$row->jumlah_byr)),1,0,'R');

            $sum_e[]=$penjualan->profit;
            $sum_f[]=$penjualan->jumlah_byr;
            $sum_g[]=($penjualan->profit-$row->jumlah_byr);
            $sum_h[]=$penjualan->jml_order;
            $pdf->Cell(0,5,'',0,1,'C');
            $i='1'+ $i;
        }
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(110,5,'TOTAL   ',1,0,'R');
        $tot_h=array_sum($sum_h);
        $pdf->Cell(20,5,number_format($tot_h),1,0,'R');
        $tot_e=array_sum($sum_e);
        $pdf->Cell(20,5,number_format($tot_e),1,0,'R');
        $tot_f=array_sum($sum_f);
        $pdf->Cell(20,5,number_format($tot_f),1,0,'R');
        $tot_g=array_sum($sum_g);
        $pdf->Cell(20,5,number_format($tot_g),1,0,'R');

        $pdf->Output();
    }




}
