<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pdf');
    $this->load->model('M_Customer');
    $this->load->model('M_project');
    $this->load->model('M_login');
    $this->M_login->isLogin();
	}


	function cetak($id){
	   $this->generate_invoice($id);
	}

	function generate_invoice($id){

		$pdf = new FPDF('l','mm','A4');
		$sysdate=date('d/m/Y H:i');
    $cabang=$this->session->userdata('nm_cabang');
						// membuat halaman baru
						$pdf->AddPage('L');
						// setting jenis font yang akan digunakan
            $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',255,12,0,20);
            $pdf->SetFont('Arial','B',10);

            $header=$this->M_project->get_project_hdr($id);
            $pdf->Cell(0,7,"POP JASA , Solusi Perijinan Usaha Anda (Senin - Sabtu Jam 09:00 - 17:00)",0,2,'L');
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(0,4,"Telp : 0823-0102-6622 ",0,1,'L');
            $pdf->Cell(0,4,"Alamat : Ruko Mezzanine, Blok A No.20, Ngenden Jangkungan, Kec. Sukolilo, Kota SBY, Jawa Timur 60118",0,1,'L');
            $pdf->Cell(0,4,"Website : 0823-0102-6622 ",0,1,'L');
            $pdf->Cell(0,4,"Tgl Cetak : $sysdate",0,1,'L');
						$pdf->SetFont('Arial','B',16);
						$pdf->Cell(0,7,"INVOICE - $id",0,2,'C');
						$pdf->SetFont('Times','B',8);
						$pdf->Cell(0,0,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(2,5,'____________________________________________________________________________________________________________________',0,1,'L');
						$pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,5,'',0,1);
          	$pdf->Cell(280,5,"NAMA CUSTOMER                       : ".strtoupper($header->nm_customer),0,2,'L');
            $pdf->Cell(10,5,'',0,1);
          	$pdf->Cell(280,5,"DETAIL TAGIHAN CUSTOMER   :",0,2,'L');
            $pdf->Cell(10,5,'',0,1);
            	$pdf->SetFont('Arial','B',10);
  					$pdf->Cell(20,10,'NO',1,0,'C');
  					$pdf->Cell(180,10,'  NAMA PRODUK JASA',1,0,'L');
  					$pdf->Cell(70,10,'JUMLAH',1,1,'C');
    				$list = $this->M_project->get_project_dtl($id);
    						$i='1';
    						foreach ($list as $row){
                  $pdf->SetFont('Arial','',10);
                  $tot_jual[]=$row->harga_jual;
    						 $pdf->Cell(20,10,$i,1,0,'C');
    						 $pdf->Cell(180,10,"  $row->nama_layanan",1,0,'L');
    						 $pdf->Cell(70,10,"Rp. ".number_format($row->harga_jual),1,1,'C');
    					 $i='1'+ $i;
    				 }
             $pdf->SetFont('Arial','B',10);
             $pdf->Cell(200,10,'TOTAL TAGIHAN',1,0,'C');
             $tot_jual=(array_sum($tot_jual)); $tot_jual = number_format($tot_jual,0,",",".");
             $pdf->Cell(70,10,"Rp. ".$tot_jual,1,0,'C');

						$pdf->Cell(10,5,'',0,1);
            $pdf->Cell(10,5,'',0,1);
            $pdf->Cell(280,20,"Kantor Cabang : $cabang , $sysdate        ",0,2,'R');
						// Memberikan space kebawah agar tidak terlalu rapat


					$pdf->Output();
	}



}
