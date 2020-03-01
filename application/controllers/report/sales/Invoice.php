<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pdf');
    $this->load->model('M_Customer');
    $this->load->model('M_project');
    $this->load->model('M_payment');
    $this->load->model('M_login');
    $this->M_login->isLogin();
	}


	function cetak($id){
	   $this->generate_invoice($id);
	}

	function generate_invoice($id){
        $id_header= $id;
        $produk_beli = $this->M_project->get_trs_project_by_project($id);
        $hdr = $this->M_project->get_trs_project_by_project($id);
        $id_customer = $hdr->id_customer;
        $customer = $this->M_Customer->get_by_id($id_customer);
        $produk= $this->M_project->get_produk();
//    var_dump($produk_beli);
//    exit();
		$pdf = new FPDF('l','mm','A4');
		$sysdate=date('d/m/Y H:i');
    $cabang=$this->session->userdata('nm_cabang');
						// membuat halaman baru
						$pdf->AddPage('L');
						// setting jenis font yang akan digunakan
            $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',255,12,0,20);
            $pdf->SetFont('Arial','B',10);
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
          	$pdf->Cell(280,5,"NAMA CUSTOMER                       : ".strtoupper($customer->nm_customer),0,2,'L');
            $pdf->Cell(280,5,"NAMA PERUSAHAAN                  : ".strtoupper($customer->nm_perusahaan),0,2,'L');
            $pdf->Cell(10,5,'',0,1);
          	$pdf->Cell(280,5,"DETAIL TAGIHAN CUSTOMER   :",0,2,'L');
            $pdf->Cell(10,5,'',0,1);
            	$pdf->SetFont('Arial','B',10);
  					$pdf->Cell(20,10,'NO',1,0,'C');
  					$pdf->Cell(180,10,'  NAMA PRODUK JASA',1,0,'L');
  					$pdf->Cell(70,10,'JUMLAH TAGIHAN',1,1,'C');
    				$list = $this->M_project->get_user_project($id_header);
    						$i='1';
    						foreach ($list as $row){
                              $pdf->SetFont('Arial','',10);
                              $tot_jual[]=$row->harga_jual;
                              $tot_jual2[]=$row->harga_jual;
                                $tot_jual3[]=$row->harga_jual;
    						 $pdf->Cell(20,10,$i,1,0,'C');
    						 $pdf->Cell(180,10,"  $row->nama_layanan",1,0,'L');
    						 $pdf->Cell(70,10,"Rp. ".number_format($row->harga_jual),1,1,'R');
    					 $i='1'+ $i;
    				 }
             $pdf->SetFont('Arial','B',10);
             $pdf->Cell(200,10,'TOTAL TAGIHAN',1,0,'C');
             $tot_jual=(array_sum($tot_jual)); $tot_jual = number_format($tot_jual,0,",",".");
             $pdf->Cell(70,10,"Rp. ".$tot_jual,1,0,'R');

						$pdf->Cell(10,5,'',0,1);
                        $pdf->Cell(10,5,'',0,1);
                        $pdf->Cell(280,10," ",0,2,'R');
						// Memberikan space kebawah agar tidak terlalu rapat


                    $pdf->Cell(280,5,"RINCIAN PEMBAYARAN PROJECT   :",0,2,'L');
                    $pdf->Cell(280,5," ",0,2,'R');
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(60,10,'NO PEMBAYARAN',1,0,'C');
                    $pdf->Cell(60,10,'  TGL PEMBAYARAN',1,0,'L');
                    $pdf->Cell(80,10,'  METODE PEMBAYARAN',1,0,'L');
                    $pdf->Cell(70,10,'JUMLAH PEMBAYARAN',1,1,'C');
                    $list_bayar =  $this->M_payment->get_history($id_header);
                    foreach ($list_bayar as $list_bayar){
                        $pdf->SetFont('Arial','',10);
                        $tot_bayar[]=$list_bayar->jumlah_pay;
                        $tot_bayar2[]=$list_bayar->jumlah_pay;
                        $pdf->Cell(60,10,$list_bayar->id_pay,1,0,'L');
                        $pdf->Cell(60,10,strtoupper(date("d-m-Y", strtotime($list_bayar->tgl_input))),1,0,'C');
                        $pdf->Cell(80,10,"  $list_bayar->tipe_pay",1,0,'C');
                        $pdf->Cell(70,10,"Rp. ".number_format($list_bayar->jumlah_pay),1,1,'R');
                    }

                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(200,10,'TOTAL BAYAR',1,0,'R');
                    $tot_bayar=(array_sum($tot_bayar)); $tot_bayar__ = number_format($tot_bayar,0,",",".");
                    $pdf->Cell(70,10,"Rp. ".$tot_bayar__,1,1,'R');
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(200,10,'TOTAL TAGIHAN',1,0,'R');
                    $TAGIHAN=(array_sum($tot_jual3)); $TAGIHAN = number_format($TAGIHAN,0,",",".");
                    $pdf->Cell(70,10,"Rp. ".$TAGIHAN,1,1,'R');
                    $pdf->Cell(200,10,'KURANG BAYAR',1,0,'R');
                    $kb=(array_sum($tot_jual2)-array_sum($tot_bayar2)); $kb_ = number_format($kb,0,",",".");
                    $pdf->Cell(70,10,"Rp. ".$kb_,1,1,'R');

                    $pdf->Cell(280,10,"* Untuk mengetahui progress surat ijin usaha anda, masukan no invoice anda di kolom tracking order di website kami : www.popjasa.id",0,2,'L');
					$pdf->Output();
	}



}
