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
						$pdf->AddPage('P');
						// setting jenis font yang akan digunakan
        if($hdr->st_project==1){
            $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',180,12,0,20);
        }else{
            $pdf->Image(base_url().'assets/app-assets/vendors/logo/jasamurah.jpg',115,12,0,20);
        }

            $pdf->SetFont('Arial','B',10);
	            // $pdf->Cell(0,7,"POP JASA , Solusi Perijinan Usaha Anda (Senin - Sabtu Jam 09:00 - 17:00)",0,2,'R');
            $pdf->SetFont('Arial','B',8);
						$pdf->Cell(0,4,"INVOICE NUMBER              : $id",0,2,'L');
						$pdf->Cell(0,4,"Tanggal Transaksi              : ".strtoupper(date("d-m-Y H:i:s", strtotime($hdr->tgl_input))),0,2,'L');
						$pdf->Cell(0,4,"Nama Customer                  : ".strtoupper($customer->nm_customer),0,2,'L');
						$pdf->Cell(0,4,"Nama Perusahaan              : ".strtoupper($customer->nm_perusahaan),0,2,'L');
						$pdf->Cell(0,4,"Nama Operator                   : ".strtoupper($hdr->input_by),0,2,'L');
            // $pdf->Cell(0,4,"Telp : 0823-0102-6622 ",0,1,'L');
            // $pdf->Cell(0,4,"Alamat : Ruko Mezzanine, Blok A No.20, Ngenden Jangkungan, Kec. Sukolilo, Kota SBY, Jawa Timur 60118",0,1,'R');
            // $pdf->Cell(0,4,"Website : 0823-0102-6622 ",0,1,'R');
            // $pdf->Cell(0,4,"Tgl Cetak : $sysdate",0,1,'R');

						$pdf->SetFont('Times','B',8);
						$pdf->Cell(0,0,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(2,5,'___________________________________________________________________________________',0,1,'L');
						$pdf->SetFont('Arial','B',8);
            $pdf->Cell(10,5,'',0,1);

            $pdf->Cell(5,5,'',0,1);
          	$pdf->Cell(20,5,"DETAIL TAGIHAN CUSTOMER   :",0,2,'L');
            $pdf->Cell(10,5,'',0,1);
            	$pdf->SetFont('Arial','B',6);
  					$pdf->Cell(10,5,'NO',1,0,'C');
  					$pdf->Cell(115,5,'  NAMA PRODUK JASA',1,0,'L');
						$pdf->Cell(30,5,'OPERATOR',1,0,'C');
						$pdf->Cell(30,5,'JUMLAH TAGIHAN',1,1,'C');

    				$list = $this->M_project->get_user_project($id_header);
    						$i='1';
    						foreach ($list as $row){
                              $pdf->SetFont('Arial','',6);
                              $tot_jual[]=$row->harga_jual;
                              $tot_jual2[]=$row->harga_jual;
                                $tot_jual3[]=$row->harga_jual;
    						 $pdf->Cell(10,5,$i,1,0,'C');
    						 $pdf->Cell(115,5,"  $row->nama_layanan",1,0,'L');
								 $pdf->Cell(30,5,"  $row->input_by",1,0,'C');
								 $pdf->Cell(30,5,"Rp. ".number_format($row->harga_jual),1,1,'R');

    					 $i='1'+ $i;
    				 }
             $pdf->SetFont('Arial','B',6);
             $pdf->Cell(125,5,'TOTAL TAGIHAN',1,0,'C');
             $tot_jual=(array_sum($tot_jual)); $tot_jual = number_format($tot_jual,0,",",".");
             $pdf->Cell(60,5,"Rp. ".$tot_jual,1,0,'R');

						$pdf->Cell(10,5,'',0,1);
                        $pdf->Cell(10,5,'',0,1);
                        $pdf->Cell(280,10," ",0,2,'R');
						// Memberikan space kebawah agar tidak terlalu rapat

							$pdf->SetFont('Arial','B',8);
                    $pdf->Cell(280,5,"RINCIAN PEMBAYARAN PROJECT   :",0,2,'L');
                    $pdf->Cell(280,5," ",0,2,'R');
                    $pdf->SetFont('Arial','B',6);
                    $pdf->Cell(35,5,'NO PEMBAYARAN',1,0,'C');
                    $pdf->Cell(35,5,'  TGL PEMBAYARAN',1,0,'L');
                    $pdf->Cell(35,5,'  METODE PEMBAYARAN',1,0,'L');
										$pdf->Cell(35,5,'  OPERATOR',1,0,'L');
                    $pdf->Cell(45,5,'JUMLAH PEMBAYARAN',1,1,'C');
                    $list_bayar =  $this->M_payment->get_history($id_header);
                    foreach ($list_bayar as $list_bayar){
                        $pdf->SetFont('Arial','',6);
                        $tot_bayar[]=$list_bayar->jumlah_pay;
                        $tot_bayar2[]=$list_bayar->jumlah_pay;
                        $pdf->Cell(35,5,$list_bayar->id_pay,1,0,'L');
                        $pdf->Cell(35,5,strtoupper(date("d-m-Y", strtotime($list_bayar->tgl_input))),1,0,'C');
                        $pdf->Cell(35,5,"  $list_bayar->tipe_pay",1,0,'C');
												 $pdf->Cell(35,5,"  $row->input_by",1,0,'C');
                        $pdf->Cell(45,5,"Rp. ".number_format($list_bayar->jumlah_pay),1,1,'R');
                    }

                    $pdf->SetFont('Arial','B',6);
                    $pdf->Cell(140,5,'TOTAL BAYAR',1,0,'R');
                    $tot_bayar=(array_sum($tot_bayar)); $tot_bayar__ = number_format($tot_bayar,0,",",".");
                    $pdf->Cell(45,5,"Rp. ".$tot_bayar__,1,1,'R');
                    $pdf->SetFont('Arial','B',6);
                    $pdf->Cell(140,5,'TOTAL TAGIHAN',1,0,'R');
                    $TAGIHAN=(array_sum($tot_jual3)); $TAGIHAN = number_format($TAGIHAN,0,",",".");
                    $pdf->Cell(45,5,"Rp. ".$TAGIHAN,1,1,'R');
                    $pdf->Cell(140,5,'KURANG BAYAR',1,0,'R');
                    $kb=(array_sum($tot_jual2)-array_sum($tot_bayar2)); $kb_ = number_format($kb,0,",",".");
                    $pdf->Cell(45,5,"Rp. ".$kb_,1,1,'R');

                    $pdf->Cell(280,5,"* Untuk mengetahui progres surat ijin usaha anda, silahkan klik customer tracking di popjasa.id dan masukkan no invoice anda.",0,2,'L');

										$pdf->SetFont('Arial','B',12);
										$pdf->Cell(0,20,"TERIMA KASIH",0,2,'C');
										$pdf->SetFont('Arial','B',10);
										if($hdr->st_project==1){
                                            $pdf->Cell(0,5,"POPJASA SURABAYA",0,2,'C');
                                        }else{
                                            $pdf->Cell(0,5,"JASAMURA SURABAYA",0,2,'C');
                                        }

											$pdf->SetFont('Arial','B',7);
										$pdf->Cell(0,5,"Ruko Mezzanine, Blok A No.20, Nginden Jangkungan, Kec Sukolilo, Kota Surabaya, Jawa Timur 60118",0,1,'C');
											$pdf->SetFont('Arial','B',8);
											$pdf->Cell(7,6,$pdf->Image(base_url().'assets/app-assets/vendors/logo/viber.png',$pdf->GetX(), $pdf->GetY(), 5.5),0,0,'C');
												$pdf->Cell(25,6,"(031) 59173597",0,0,'L');
											$pdf->Cell(7,6,$pdf->Image(base_url().'assets/app-assets/vendors/logo/mobile-phone.png',$pdf->GetX(), $pdf->GetY(), 4.4),0,0,'C');
												$pdf->Cell(25,6,"0812 3344 2301",0,0,'L');
											$pdf->Cell(7,6,$pdf->Image(base_url().'assets/app-assets/vendors/logo/whatsapp.png',$pdf->GetX(), $pdf->GetY(), 4.4),0,0,'C');
												$pdf->Cell(25,6,"0812 3344 2301",0,0,'L');
											$pdf->Cell(7,6,$pdf->Image(base_url().'assets/app-assets/vendors/logo/facebook.png',$pdf->GetX(), $pdf->GetY(), 4.4),0,0,'C');
												$pdf->Cell(25,6,"POP JASA",0,0,'L');
											$pdf->Cell(7,6,$pdf->Image(base_url().'assets/app-assets/vendors/logo/instagram.png',$pdf->GetX(), $pdf->GetY(), 4.4),0,0,'C');
												$pdf->Cell(25,6,"@POPJASA",0,0,'L');
											$pdf->Cell(7,6,$pdf->Image(base_url().'assets/app-assets/vendors/logo/mail.png',$pdf->GetX(), $pdf->GetY(), 4.4),0,0,'C');
												$pdf->Cell(25,6,"popjasa@gmail.com",0,1,'L');
										//$pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',0,12,0,20);
					$pdf->Output();
	}



}
