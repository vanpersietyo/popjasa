<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('M_login');
		$this->load->model('hrd/M_absensi_karyawan', 'M_absensi_karyawan');
		$this->load->model('hrd/M_cuti', 'M_cuti');
	}

	public function index(){
		$data['karyawan']=$this->M_absensi_karyawan->lookup_karyawan();
		$data['pages']='report/hrd/cuti';
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
	        $pdf->Cell(0,7,"DAFTAR KEHADIRAN KARYAWAN",0,2,'C');
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
					$pdf->Cell(110,5,'Nama',1,0,'L');
					$pdf->Cell(35,5,'Tgl Absen',1,0,'C');
					$pdf->Cell(35,5,'Status Absen',1,0,'C');
	        	$pdf->Cell(10,5,'',0,1);
						$list = $this->M_absensi_karyawan->report_absensi($TGL01,$TGL02);
						$i='1';
						foreach ($list as $row){
						 $pdf->SetFont('Arial','',7);
						 if ($row->status=='M') {
						 	$status='Masuk';
						}elseif ($row->status=='P') {
								$status='Pulang';
						}
						 $pdf->Cell(10,5,$i,1,0,'C');
						 $pdf->Cell(110,5,$row->nama_karyawan,1,0,'L');
						 $pdf->Cell(35,5,$row->tgl_absen,1,0,'C');
						 $pdf->Cell(35,5,$status,1,0,'C');


						 $pdf->Cell(0,5,'',0,1,'C');
					 $i='1'+ $i;
				 }
			    $pdf->Output();
	}

	function pdf_rekap($tgl_awal,$tgl_akhir){
		$TGL01=date("Y-m-d", strtotime($tgl_awal));
	  $TGL02=date("Y-m-d", strtotime($tgl_akhir));
	  $TGL2=date("d/m/Y", strtotime($tgl_akhir));
		$TGL1=date("d/m/Y", strtotime($tgl_awal));
		$periode=strtoupper(date("F Y", strtotime($tgl_akhir)));
		$PRD_BLTH=strtoupper(date("My", strtotime($tgl_akhir)));
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
	        $pdf->Cell(0,7,"DAFTAR KEHADIRAN KARYAWAN",0,2,'C');
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
						$pdf->SetFont('Arial','B',8);
	        // Memberikan space kebawah agar tidak terlalu rapat
	        //REKAPITULASI
					$pdf->Cell(280,5,"Rekapitulasi Daftar Kehadiran",0,2,'L');
					$pdf->SetFont('Arial','',7);
					$pdf->Cell(10,5,'No',1,0,'C');
					$pdf->Cell(60,5,'Nama',1,0,'L');
					$pdf->Cell(25,5,'Jml Absen Masuk',1,0,'C');
					$pdf->Cell(25,5,'Jml Absen Pulang',1,0,'C');
					$pdf->Cell(35,5,"Jml Hari Kerja $periode",1,0,'C');
					$pdf->Cell(35,5,"Jml Hari Libur $periode",1,0,'C');
	        	$pdf->Cell(10,5,'',0,1);
						$list = $this->M_absensi_karyawan->rpt_absensi_group_karyawan($TGL01,$TGL02);
						$i='1';
						foreach ($list as $row){
						 $pdf->SetFont('Arial','',7);
						 if ($row->status=='M') {
						 	$status='Masuk';
						}elseif ($row->status=='P') {
								$status='Pulang';
						}
						$get_masuk=$this->M_absensi_karyawan->rpt_absensi_group_jmlmasuk($TGL01,$TGL02,$row->id_karyawan);
						$get_pulang=$this->M_absensi_karyawan->rpt_absensi_group_jmlplg($TGL01,$TGL02,$row->id_karyawan);
						$get_harikerja=$this->M_absensi_karyawan->rpt_absensi_harikerja($PRD_BLTH);
						// var_dump($get_pulang);
						// exit();
						 $pdf->Cell(10,5,$i,1,0,'C');
						 $pdf->Cell(60,5,$row->nama_karyawan,1,0,'L');
						 $pdf->Cell(25,5,$get_masuk->jml_masuk,1,0,'C');
						 $pdf->Cell(25,5,$get_pulang->jml_pulang,1,0,'C');
						 $pdf->Cell(35,5,$get_harikerja->jml_harikerja,1,0,'C');
						 $pdf->Cell(35,5,$get_harikerja->jml_libur,1,0,'C');


						 $pdf->Cell(0,5,'',0,1,'C');
					 $i='1'+ $i;
				 }

				 //DETAIL
				 $pdf->Cell(10,5,'',0,1);
				 $pdf->Cell(10,5,'',0,1);
				 $pdf->SetFont('Arial','B',8);
						 $pdf->Cell(280,5,"Detail Daftar Kehadiran",0,2,'L');
						 $pdf->SetFont('Arial','',7);
						 $pdf->Cell(10,5,'No',1,0,'C');
						 $pdf->Cell(110,5,'Nama',1,0,'L');
						 $pdf->Cell(35,5,'Tgl Absen',1,0,'C');
						 $pdf->Cell(35,5,'Status Absen',1,0,'C');
							 $pdf->Cell(10,5,'',0,1);
							 $detail = $this->M_absensi_karyawan->report_absensi($TGL01,$TGL02);
							 $d='1';
							 foreach ($detail as $detail){
								$pdf->SetFont('Arial','',7);
								if ($detail->status=='M') {
								 $status='Masuk';
							 }elseif ($detail->status=='P') {
									 $status='Pulang';
							 }
								$pdf->Cell(10,5,$d,1,0,'C');
								$pdf->Cell(110,5,$detail->nama_karyawan,1,0,'L');
								$pdf->Cell(35,5,$detail->tgl_absen,1,0,'C');
								$pdf->Cell(35,5,$status,1,0,'C');


								$pdf->Cell(0,5,'',0,1,'C');
							$d='1'+ $d;
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
		$PRD_BLTH=strtoupper(date("My", strtotime($tgl_akhir)));
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
	        $pdf->Cell(0,7,"DAFTAR IJIN TIDAK MASUK KARYAWAN",0,2,'C');
					$pdf->Cell(0,5,"POPJASA",0,2,'C');
	        $pdf->SetFont('Times','B',8);
					$pdf->Cell(10,5,'',0,1);
	        $pdf->Cell(0,1,"KANTOR CABANG : $cabang",0,1,'C');
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(2,5,'________________________________________________________________________________',0,1,'L');
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(280,5,"Nama Karyawan : $get_karyawan->nama_karyawan",0,2,'L');
					$pdf->Cell(280,5,"Periode            : $periode",0,2,'L');
	        $pdf->Cell(280,5,"Tgl Cetak        : $sysdate",0,2,'L');
					$pdf->Cell(280,5,"Filter               : ($TGL1) - ($TGL2)",0,2,'L');
					$pdf->Cell(10,5,'',0,1);
						$pdf->SetFont('Arial','B',8);
	        // Memberikan space kebawah agar tidak terlalu rapat
	        //REKAPITULASI
					$pdf->Cell(280,5,"Rekapitulasi Daftar Kehadiran, $get_karyawan->nama_karyawan",0,2,'L');
					$pdf->SetFont('Arial','B',7);
					$pdf->Cell(10,5,'No',1,0,'C');
					$pdf->Cell(60,5,'Nama',1,0,'L');
					$pdf->Cell(25,5,'Jml Absen Masuk',1,0,'C');
					$pdf->Cell(25,5,'Jml Absen Pulang',1,0,'C');
					$pdf->Cell(25,5,'Jml Tidak Hadir',1,0,'C');
					$pdf->Cell(25,5,"Jml Hari Kerja",1,0,'C');
					$pdf->Cell(25,5,"Jml Hari Libur",1,0,'C');
	        	$pdf->Cell(10,5,'',0,1);
						$list = $this->M_absensi_karyawan->rpt_absensi_group_karyawan_id($TGL01,$TGL02,$id_karyawan);
						$i='1';
						foreach ($list as $row){
						 $pdf->SetFont('Arial','',7);
						 if ($row->status=='M') {
						 	$status='Masuk';
						}elseif ($row->status=='P') {
								$status='Pulang';
						}
						$get_masuk=$this->M_absensi_karyawan->rpt_absensi_group_jmlmasuk($TGL01,$TGL02,$row->id_karyawan);
						$get_pulang=$this->M_absensi_karyawan->rpt_absensi_group_jmlplg($TGL01,$TGL02,$row->id_karyawan);
						$get_harikerja=$this->M_absensi_karyawan->rpt_absensi_harikerja($PRD_BLTH);
						$get_cuti=$this->M_absensi_karyawan->rpt_absensi_cuti($TGL01,$TGL02,$row->id_karyawan);
						// var_dump($get_pulang);
						// exit();
						 $pdf->Cell(10,5,$i,1,0,'C');
						 $pdf->Cell(60,5,$row->nama_karyawan,1,0,'L');
						 $pdf->Cell(25,5,$get_masuk->jml_masuk,1,0,'C');
						 $pdf->Cell(25,5,$get_pulang->jml_pulang,1,0,'C');
						 $pdf->Cell(25,5,$get_cuti->jml_cuti,1,0,'C');
						 $pdf->Cell(25,5,$get_harikerja->jml_harikerja,1,0,'C');
						 $pdf->Cell(25,5,$get_harikerja->jml_libur,1,0,'C');



						 $pdf->Cell(0,5,'',0,1,'C');
					 $i='1'+ $i;
				 }

				 //DETAIL
				 $pdf->Cell(10,5,'',0,1);
				 $pdf->Cell(10,5,'',0,1);
				 $pdf->SetFont('Arial','B',8);
						 $pdf->Cell(280,5,"Detail Daftar Ijin Tidak Masuk Kerja, $get_karyawan->nama_karyawan",0,2,'L');
						 $pdf->SetFont('Arial','',7);
						 $pdf->Cell(10,5,'No',1,0,'C');
						 $pdf->Cell(80,5,'Nama',1,0,'L');
						 $pdf->Cell(35,5,'Tgl Mulai Tidak Hadir',1,0,'C');
						// $pdf->Cell(35,5,'Tgl Berakhir Tidak Hadir',1,0,'C');
						 $pdf->Cell(35,5,'Jumlah Tidak Hadir',1,0,'C');
							 $pdf->Cell(10,5,'',0,1);
							 $detail = $this->M_cuti->get_by_id_cuti($TGL01,$TGL02,$id_karyawan);
							 // var_dump($this->db->last_query());
							 // exit();
							 $d='1';
							 foreach ($detail as $detail){
								$pdf->SetFont('Arial','',7);
								$pdf->Cell(10,5,$d,1,0,'C');
								$pdf->Cell(80,5,$detail->nama_karyawan,1,0,'L');
								$pdf->Cell(35,5,date("d/m/Y", strtotime($detail->tgl_cuti)),1,0,'C');
							//	$pdf->Cell(35,5,date("d/m/Y", strtotime($detail->tgl_cuti2)),1,0,'C');
								$pdf->Cell(35,5,"$detail->jml_cuti Hari",1,0,'C');


								$pdf->Cell(0,5,'',0,1,'C');
							$d='1'+ $d;
						}
			    $pdf->Output();
	}


}
