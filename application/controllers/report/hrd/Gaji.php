<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('M_login');
		$this->load->model('hrd/M_absensi_karyawan', 'M_absensi_karyawan');
		$this->load->model('hrd/M_gaji', 'M_gaji');
	}

	public function index(){
		$data['karyawan']=$this->M_absensi_karyawan->lookup_karyawan();
		$data['pages']='report/hrd/gaji';
		$this->load->view('layout',$data);
	}

	function cetak(){
		if ($this->input->post('submitForm')=='rekap') {
			$tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
			$tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
			$this->pdf_rekap($tgl_awal,$tgl_akhir);
		}elseif ($this->input->post('submitForm')=='non_rekap') {
			$tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
			$tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
			$this->pdf($tgl_awal,$tgl_akhir);
		}

	}



	// function pdf($tgl_awal,$tgl_akhir){
	// 	$TGL01=date("Y-m-d", strtotime($tgl_awal));
	//   $TGL02=date("Y-m-d", strtotime($tgl_akhir));
	//   $TGL2=date("d/m/Y", strtotime($tgl_akhir));
	// 	$TGL1=date("d/m/Y", strtotime($tgl_awal));
	// 	$periode=strtoupper(date("F Y", strtotime($tgl_akhir)));
	// 	$PRD_BLTH=strtoupper(date("M-Y", strtotime($tgl_akhir)));
	// 	$cabang=$this->session->userdata('nm_cabang');
	// 	$sysdate=date('d/m/Y H:i');
	//
	// 		$pdf = new FPDF('l','mm','A4');
	//         // membuat halaman baru
	//         $pdf->AddPage('P');
	//         // setting jenis font yang akan digunakan
	//         $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',180,10,0,20);
	// 				 $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,10,0,20);
	//         $pdf->SetFont('Times','B',16);
	//         // mencetak string
	//         $sysdate=date('d/m/Y H:i');
	//         $pdf->Cell(0,7,"GAJI KARYAWAN",0,2,'C');
	// 				$pdf->Cell(0,5,"POPJASA",0,2,'C');
	//         $pdf->SetFont('Times','B',8);
	// 				$pdf->Cell(10,5,'',0,1);
	//         $pdf->Cell(0,1,"KANTOR CABANG : $cabang",0,1,'C');
	// 				$pdf->SetFont('Arial','B',12);
	// 				$pdf->Cell(2,5,'________________________________________________________________________________',0,1,'L');
	// 				$pdf->SetFont('Times','B',8);
	// 				$pdf->Cell(280,5,"Periode     : $periode",0,2,'L');
	//         $pdf->Cell(280,5,"Tgl Cetak : $sysdate",0,2,'L');
	// 				$pdf->Cell(280,5,"Filter        : ($TGL1) - ($TGL2)",0,2,'L');
	// 				$pdf->Cell(10,5,'',0,1);
	// 					$pdf->SetFont('Arial','B',12);
	//         // Memberikan space kebawah agar tidak terlalu rapat
	//         //header
	// 				$pdf->SetFont('Arial','',7);
	// 				$pdf->Cell(10,5,'No',1,0,'C');
	// 				$pdf->Cell(110,5,'Nama',1,0,'L');
	// 				$pdf->Cell(35,5,'Tgl Absen',1,0,'C');
	// 				$pdf->Cell(35,5,'Status Absen',1,0,'C');
	//         	$pdf->Cell(10,5,'',0,1);
	// 					$list = $this->M_absensi_karyawan->report_absensi($TGL01,$TGL02);
	// 					$i='1';
	// 					foreach ($list as $row){
	// 					 $pdf->SetFont('Arial','',7);
	// 					 if ($row->status=='M') {
	// 					 	$status='Masuk';
	// 					}elseif ($row->status=='P') {
	// 							$status='Pulang';
	// 					}
	// 					 $pdf->Cell(10,5,$i,1,0,'C');
	// 					 $pdf->Cell(110,5,$row->nama_karyawan,1,0,'L');
	// 					 $pdf->Cell(35,5,$row->tgl_absen,1,0,'C');
	// 					 $pdf->Cell(35,5,$status,1,0,'C');
	//
	//
	// 					 $pdf->Cell(0,5,'',0,1,'C');
	// 				 $i='1'+ $i;
	// 			 }
	// 		    $pdf->Output();
	// }

	function pdf_rekap($tgl_awal,$tgl_akhir){
		$TGL01=date("Y-m-d", strtotime($tgl_awal));
		$TGL02=date("Y-m-d", strtotime($tgl_akhir));
		$TGL2=date("d/m/Y", strtotime($tgl_akhir));
		$TGL1=date("d/m/Y", strtotime($tgl_awal));
		$periode=strtoupper(date("F Y", strtotime($tgl_akhir)));
		$PRD_BLTH=strtoupper(date("MY", strtotime($tgl_akhir)));
		$cabang=$this->session->userdata('nm_cabang');
		$get_all_karyawan=$this->M_gaji->get_all_karyawan();
		// var_dump($get_all_karyawan);
		// exit();
		$pdf = new FPDF('l','mm','A4');
		foreach ($get_all_karyawan as $karyawan) {
			$get_karyawan= $this->M_absensi_karyawan->karyawan_id($karyawan->id_karyawan);
			$sysdate=date('d/m/Y H:i');


						// membuat halaman baru
						$pdf->AddPage('P');
						// setting jenis font yang akan digunakan
						$pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',180,10,0,20);
						 $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,10,0,20);
						$pdf->SetFont('Times','B',16);
						// mencetak string
						$sysdate=date('d/m/Y H:i');
						$pdf->Cell(0,7,"SLIP GAJI KARYAWAN",0,2,'C');
						$pdf->Cell(0,5,"POPJASA",0,2,'C');
						$pdf->SetFont('Times','B',8);
						$pdf->Cell(10,5,'',0,1);
						$pdf->Cell(0,1,"KANTOR CABANG : $cabang",0,1,'C');
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(2,5,'________________________________________________________________________________',0,1,'L');
						$pdf->SetFont('Times','B',8);
						$pdf->Cell(280,5,"Nama               : $get_karyawan->nama_karyawan",0,2,'L');
						$pdf->Cell(280,5,"Periode            : $periode",0,2,'L');
						$pdf->Cell(280,5,"Tgl Cetak        : $sysdate",0,2,'L');
						$pdf->Cell(280,5,"Filter               : ($TGL1) - ($TGL2)",0,2,'L');
						$pdf->Cell(10,5,'',0,1);
							$pdf->SetFont('Times','B',8);
						// Memberikan space kebawah agar tidak terlalu rapat
						//REKAPITULASI
						$pdf->Cell(280,5,"Gaji Karyawan - $periode, $get_karyawan->nama_karyawan",0,2,'L');
						$pdf->SetFont('Times','B',7);
						// $pdf->Cell(10,5,'No',1,0,'C');
						$pdf->Cell(120,5,'Nama',1,0,'L');
						$pdf->Cell(35,5,'Tgl Ditetapkan Gaji',1,0,'C');
						$pdf->Cell(35,5,'Jml Gaji / Bulan',1,0,'C');

							$pdf->Cell(10,5,'',0,1);
							$gaji = $this->M_gaji->get_by_id($karyawan->id_karyawan);
							$i='1';
							 $pdf->SetFont('Arial','',7);
							 // $pdf->Cell(10,5,$i,1,0,'C');
							 $pdf->Cell(120,5,$gaji->nama_karyawan,1,0,'L');
							 $pdf->Cell(35,5,date("d/m/Y H:i", strtotime($gaji->updated_gaji)),1,0,'C');
							 $pdf->Cell(35,5,number_format($gaji->jml_gaji),1,0,'C');

							$pdf->Cell(0,5,'',0,1,'C');
							$pdf->SetFont('Times','B',7);
							$pdf->Cell(35,5,'Tgl Diberikan Bonus',1,0,'C');
							$pdf->Cell(120,5,'Keterangan',1,0,'C');
							$pdf->Cell(35,5,'Jumlah Bonus',1,0,'C');
							$pdf->Cell(0,5,'',0,1,'C');
							$detail = $this->M_gaji->get_bonus($karyawan->id_karyawan,$PRD_BLTH);
							// var_dump($detail);
							// exit();
							$pdf->SetFont('Times','',7);
							foreach ($detail as $detail){
							 $tot_bonus[]=$detail->jumlah_bonus;
							 $pdf->Cell(35,5,date("d/m/Y H:i", strtotime($detail->tgl_input)),1,0,'C');
							 $pdf->Cell(120,5,$detail->keterangan,1,0,'C');
							 $pdf->Cell(35,5,number_format($detail->jumlah_bonus),1,0,'C');
							 $pdf->Cell(0,5,'',0,1,'C');
					 }
					 $pdf->SetFont('Times','B',8);
					$pdf->Cell(155,6,"JUMLAH GAJI KARYAWAN, $periode",1,0,'C');
							 $tot_bonus=(array_sum($tot_bonus)+$gaji->jml_gaji); $tot_bonus = number_format($tot_bonus,0,",",".");
							$pdf->Cell(35,6,$tot_bonus,1,0,'C');
		}

					$pdf->Output();
	}


	function cetak_karyawan(){
		if ($this->input->post('submitForm')=='rekap') {
			$tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
			$tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
			$id_karyawan=$this->input->post('id_karyawan');
			$this->pdf_rekap_karyawan($tgl_awal,$tgl_akhir,$id_karyawan);
		}elseif ($this->input->post('submitForm')=='non_rekap') {
			$tgl_awal=date("Y-m-d", strtotime($this->input->post('TGL_01')));
			$tgl_akhir=date("Y-m-d", strtotime($this->input->post('TGL_02')));
			$id_karyawan=$this->input->post('id_karyawan');
			$this->pdf_rekap_karyawan($tgl_awal,$tgl_akhir,$id_karyawan);
		}

	}

	function pdf_rekap_karyawan($tgl_awal,$tgl_akhir,$id_karyawan){
		$TGL01=date("Y-m-d", strtotime($tgl_awal));
	  $TGL02=date("Y-m-d", strtotime($tgl_akhir));
	  $TGL2=date("d/m/Y", strtotime($tgl_akhir));
		$TGL1=date("d/m/Y", strtotime($tgl_awal));
		$periode=strtoupper(date("F Y", strtotime($tgl_akhir)));
		$PRD_BLTH=strtoupper(date("MY", strtotime($tgl_akhir)));
		$cabang=$this->session->userdata('nm_cabang');
		$get_karyawan= $this->M_absensi_karyawan->karyawan_id($id_karyawan);
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
	        $pdf->Cell(0,7,"SLIP GAJI KARYAWAN",0,2,'C');
					$pdf->Cell(0,5,"POPJASA",0,2,'C');
	        $pdf->SetFont('Times','B',8);
					$pdf->Cell(10,5,'',0,1);
	        $pdf->Cell(0,1,"KANTOR CABANG : $cabang",0,1,'C');
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(2,5,'________________________________________________________________________________',0,1,'L');
					$pdf->SetFont('Times','B',8);
	        // $pdf->Cell(280,5,"Tgl Cetak        : $sysdate",0,2,'L');
					// $pdf->Cell(280,5,"Filter               : ($TGL1) - ($TGL2)",0,2,'L');
					$pdf->Cell(280,5,"JABATAN            : ".strtoupper($get_karyawan->nama_jabatan),0,2,'L');
					$pdf->Cell(120,5,"NAMA                  : ".strtoupper($get_karyawan->nama_karyawan),0,0,'L');
					$date_kerja=strtoupper(date("Fy", strtotime($tgl_akhir)));
					$hari_kerja=$this->M_absensi_karyawan->jml_kerja($date_kerja);
					$kerja=number_format($hari_kerja->jml_harikerja);
					// var_dump($hari_kerja);
					// exit();
					$pdf->Cell(140,5,"JUMLAH HARI KERJA    : $kerja Hari",0,1,'L');
					$pdf->Cell(120,5,"PERIODE            : $periode",0,0,'L');
					$pdf->Cell(140,5,"ABSEN/CUTI                       : $get_karyawan->nama_karyawan",0,1,'L');
					$pdf->Cell(10,5,'',0,1);
					$pdf->SetFont('Times','B',8);
	        // Memberikan space kebawah agar tidak terlalu rapat
	        //REKAPITULASI
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(280,5,"PENERIMAAN     :",0,1,'L');
					$gaji = $this->M_gaji->get_by_id($get_karyawan->id_karyawan);
					$pdf->Cell(50,5,"1. Gaji Pokok",0,0,'L');
					$pdf->Cell(50,5,": ".number_format($gaji->jml_gaji),0,1,'L');
					$bonus = $this->M_gaji->get_jumlah_bonus($get_karyawan->id_karyawan,$PRD_BLTH);
					$pdf->Cell(50,5,"2. Total Bonus",0,0,'L');
					$pdf->Cell(50,5,": ".number_format($bonus->bonus),0,1,'L');
					$tunjangan=$this->M_absensi_karyawan->get_tunjangan();
					$p=3;
					foreach ($tunjangan as $tunjangan) {

					$pdf->Cell(50,5,"$p . $tunjangan->nm_tunjangan",0,0,'L');
					$get_tunjangan=$this->M_absensi_karyawan->get_jumlah_tunjangan($tunjangan->id_tunjangan,$get_karyawan->id_karyawan,$TGL02);
					$pdf->Cell(50,5,": ".number_format($get_tunjangan->tunjangan),0,1,'L');
					$tot_tunjangan[]=$get_tunjangan->tunjangan;
					$p=$p+1;
					}
					$pdf->Cell(10,5,'__________________________________________________________________ +',0,1);
					$tot_tunjangan_sum=(array_sum($tot_tunjangan)+$gaji->jml_gaji+$bonus->bonus); $tot_tunjangan_res = number_format($tot_tunjangan_sum);
					$pdf->Cell(50,6,'',0,0,'L');
 				 $pdf->Cell(60,6,"   ".$tot_tunjangan_res,0,1,'L');
					$pdf->Cell(10,5,'',0,1);
					$pdf->Cell(280,5,"POTONGAN     :",0,1,'L');

					$potongan=$this->M_absensi_karyawan->get_potongan();
					foreach ($potongan as $potongan) {
					$pdf->Cell(50,5,"$potongan->nm_potongan",0,0,'L');
					$get_potongan=$this->M_absensi_karyawan->get_jumlah_tunjangan($potongan->id_potongan,$get_karyawan->id_karyawan,$TGL02);
					$tot_potongan[]=$get_potongan->potongan;
					$pdf->Cell(50,5,": ".number_format($get_potongan->potongan),0,1,'L');
					}
						$pdf->Cell(10,5,'__________________________________________________________________ +',0,1);
						$tot_potongan_sum=(array_sum($tot_potongan)); $tot_potongan_res = number_format($tot_potongan_sum,0,",",".");
						$pdf->Cell(50,6,'',0,0,'L');
						$pdf->Cell(60,6,"   ".$tot_potongan_res,0,1,'L');
						$pdf->Cell(10,5,'',0,1);

						$pdf->Cell(50,5,"TOTAL   :",0,1,'L');
						$pdf->Cell(50,5,"Total Penerimaan",0,0,'L');
						$pdf->Cell(50,5," : $tot_tunjangan_res",0,1,'L');
						$pdf->Cell(50,5,"Total Potongan",0,0,'L');
						$pdf->Cell(50,5," : $tot_potongan_res",0,1,'L');
						$pdf->Cell(10,5,'__________________________________________________________________ +',0,1);
						$thp=(array_sum($tot_tunjangan)+$gaji->jml_gaji+$bonus->bonus)-(array_sum($tot_potongan));
						$pdf->Cell(50,5,"Take Home Pay",0,0,'L');
						$pdf->Cell(50,5," : ".number_format($thp),0,1,'L');

						$pdf->Cell(50,5,"Sisa Cicilan",0,0,'L');
						$pdf->Cell(50,5," : ".number_format($get_karyawan->jml_piutang-$get_karyawan->jml_bayar),0,1,'L');

						$pdf->Cell(10,5,'',0,1);
						$pdf->Cell(10,5,'',0,1);
						$pdf->Cell(10,5,'',0,1);
						$pdf->Cell(50,5,"Gaji Sudah Di Transfer",0,0,'L');
						$pdf->Cell(50,5," : ".number_format($thp),0,1,'L');
						$pdf->Cell(50,5,"Gaji Yang Harus Diterima",0,0,'L');
						$pdf->Cell(95,5," : ".number_format($thp),0,0,'L');
						$pdf->Cell(50,5,"Surabaya, ".$TGL2,0,1,'L');


						$pdf->Cell(10,5,'',0,1);
						$pdf->Cell(50,5,"Di Transfer Ke",0,1,'L');
						$pdf->Cell(50,5,"Bank",0,0,'L');
						$pdf->Cell(50,5," : - ",0,1,'L');
						$pdf->Cell(50,5,"Nomor Rekening",0,0,'L');
						$pdf->Cell(50,5," : - ",0,1,'L');
						$pdf->Cell(50,5,"Atas Nama",0,0,'L');
						$pdf->Cell(95,5," : - ",0,0,'L');
						$pdf->Cell(5,5," ",0,0,'L');
						$pdf->SetFont('Times','UB',8);
						$pdf->Cell(50,5,"",0,1,'L');
						$pdf->SetFont('Times','B',8);
						$pdf->Cell(145,5,"",0,0,'L');
						$cabang=$this->session->userdata('cabang');
						$pdf->Cell(20,5,"____________________",0,1,'L');


			    $pdf->Output();
	}


}
