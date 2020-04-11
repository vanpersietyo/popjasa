<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outstandingpiutang extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_outstanding_piutang', 'M_outstanding_piutang');
    }

    public function index(){
        $data['pages']='report/outstanding/outstandingpiutang';
        $this->load->view('layout',$data);
    }

    function cetak(){
        $tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
        $tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
        $this->pdf($tgl_awal,$tgl_akhir);
    }

    function pdf($tgl_awal, $tgl_akhir)
    {
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
        $pdf->AddPage('L');
        // setting jenis font yang akan digunakan
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',260,10,0,20);
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,10,0,20);
        $pdf->SetFont('Times','B',16);
        // mencetak string
        // Document Belum Selesai
        $pdf->Cell(0, 7, "LAPORAN PIUTANG CUSTOMER", 0, 2, 'C');
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(0, 1, "KANTOR CABANG : $cabang", 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(2, 5, '__________________________________________________________________________________________________________________', 0, 1, 'L');
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(280, 5, "Periode     : $periode", 0, 2, 'L');
        $pdf->Cell(280, 5, "Tgl Cetak : $sysdate", 0, 2, 'L');
        $pdf->Cell(280, 5, "Filter        : ($TGL1) - ($TGL2)", 0, 2, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(280, 5, "BERKAS SUDAH SELESAI :", 0, 2, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 5, '', 0, 1);
        //header
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(8, 5, 'No', 1, 0, 'C');
        $pdf->Cell(75, 5, 'Nama Customer', 1, 0, 'L');
        $pdf->Cell(80, 5, 'Nama Layanan', 1, 0, 'L');
        $pdf->Cell(20, 5, 'Jumlah Order', 1, 0, 'R');
        $pdf->Cell(30, 5, 'Jumlah Deal', 1, 0, 'R');
        $pdf->Cell(30, 5, 'Jumlah Bayar', 1, 0, 'R');
        $pdf->Cell(27, 5, 'Sisa Bayar', 1, 0, 'R');
        $pdf->Cell(10, 5, '', 0, 1);
        $listFinish = $this->M_outstanding_piutang->get_rekap($TGL01, $TGL02, 1);
        $i = '1';
        foreach ($listFinish as $row) {
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(8, 5, $i, 1, 0, 'C');
            $pdf->Cell(75, 5, $row->nm_customer, 1, 0, 'L');
            $pdf->Cell(80, 5, $row->nama_layanan, 1, 0, 'L');
            $pdf->Cell(20, 5, number_format($row->qty), 1, 0, 'R');
            $pdf->Cell(30, 5, number_format($row->harga_jual), 1, 0, 'R');
            $pdf->Cell(30, 5, number_format($row->bayar), 1, 0, 'R');
            $pdf->Cell(27, 5, number_format($row->outstanding), 1, 0, 'R');

            $sum_qty[]  = $row->qty;
            $sum_deal[] = $row->harga_jual;
            $sum_bayar[] = $row->bayar;
            $sum_outstanding[] = $row->outstanding;
            $pdf->Cell(0, 5, '', 0, 1, 'C');
            $i = '1' + $i;
        }
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(163, 5, 'TOTAL  ', 1, 0, 'R');
        $tot_qty = $listFinish ? array_sum($sum_qty):0;
        $pdf->Cell(20, 5, number_format($tot_qty), 1, 0, 'R');
        $tot_deal = $listFinish ? array_sum($sum_deal):0;
        $pdf->Cell(30, 5, number_format($tot_deal), 1, 0, 'R');
        $tot_bayar = $listFinish ? array_sum($sum_bayar):0;
        $pdf->Cell(30, 5, number_format($tot_bayar), 1, 0, 'R');
        $tot_outstanding = $listFinish ? array_sum($sum_outstanding):0;
        $pdf->Cell(27, 5, number_format($tot_outstanding), 1, 0, 'R');

        // Berkas belum selesai
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(280, 5, "BERKAS BELUM SELESAI :", 0, 2, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 5, '', 0, 1);
        //header
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(8, 5, 'No', 1, 0, 'C');
        $pdf->Cell(75, 5, 'Nama Customer', 1, 0, 'L');
        $pdf->Cell(80, 5, 'Nama Layanan', 1, 0, 'L');
        $pdf->Cell(20, 5, 'Jumlah Order', 1, 0, 'R');
        $pdf->Cell(30, 5, 'Jumlah Deal', 1, 0, 'R');
        $pdf->Cell(30, 5, 'Jumlah Bayar', 1, 0, 'R');
        $pdf->Cell(27, 5, 'Sisa Bayar', 1, 0, 'R');
        $pdf->Cell(10, 5, '', 0, 1);
        $listFinish = $this->M_outstanding_piutang->get_rekap($TGL01, $TGL02, 0);
        $i = '1';
        foreach ($listFinish as $row) {
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(8, 5, $i, 1, 0, 'C');
            $pdf->Cell(75, 5, $row->nm_customer, 1, 0, 'L');
            $pdf->Cell(80, 5, $row->nama_layanan, 1, 0, 'L');
            $pdf->Cell(20, 5, number_format($row->qty), 1, 0, 'R');
            $pdf->Cell(30, 5, number_format($row->harga_jual), 1, 0, 'R');
            $pdf->Cell(30, 5, number_format($row->bayar), 1, 0, 'R');
            $pdf->Cell(27, 5, number_format($row->outstanding), 1, 0, 'R');

            $sum_qty[]  = $row->qty;
            $sum_deal[] = $row->harga_jual;
            $sum_bayar[] = $row->bayar;
            $sum_outstanding[] = $row->outstanding;
            $pdf->Cell(0, 5, '', 0, 1, 'C');
            $i = '1' + $i;
        }
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(163, 5, 'TOTAL  ', 1, 0, 'R');
        $tot_qty = $listFinish ? array_sum($sum_qty):0;
        $pdf->Cell(20, 5, number_format($tot_qty), 1, 0, 'R');
        $tot_deal = $listFinish ? array_sum($sum_deal):0;
        $pdf->Cell(30, 5, number_format($tot_deal), 1, 0, 'R');
        $tot_bayar = $listFinish ? array_sum($sum_bayar):0;
        $pdf->Cell(30, 5, number_format($tot_bayar), 1, 0, 'R');
        $tot_outstanding = $listFinish ? array_sum($sum_outstanding):0;
        $pdf->Cell(27, 5, number_format($tot_outstanding), 1, 0, 'R');


        $pdf->Output();
    }
}