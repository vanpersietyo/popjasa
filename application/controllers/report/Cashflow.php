<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cashflow extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_labarugi', 'M_labarugi');
    }

    public function index(){
        $this->load->model('M_bank');
        $this->load->model('M_cabang');
        $akses          = $this->session->userdata('akses_user') === 'SU' ? true : false;
        $cabang         = $this->session->userdata('cabang');
        $data_cabang    = $akses ? $this->M_cabang->find() : $this->M_cabang->find([M_cabang::kd_cabang => $cabang]);
        $data =[
            'akses'	    => $akses,
            'bank'		=> $this->M_bank->find(),
            'cabang'	=> $data_cabang,
            'pages'		=> 'report/cashflow/index',
        ];
        $this->load->view('layout',$data);
    }

    function validasi(){
        $tgl_awal	= $this->input->post('tgl_awal');
        $tgl_akhir	= $this->input->post('tgl_akhir');
        $bayar 		= $this->input->post('bayar');
        $cabang 	= $this->input->post('cabang');

        $this->conversion->translate_error_form_validation();
        $data = $data['inputerror'] = $data['notiferror'] = []; //inisialisasi
        $data['status']         = TRUE; // TRUE = validation lolos | FALSE = validation gagal
        $data['sw_alert']       = FALSE; // TRUE = kirim error swal dari controller | FALSE : tidak kirim error swal

        //validasi input
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');
        $this->form_validation->set_rules('bayar', 'Pembayaran', 'required|trim');
        $this->form_validation->set_rules('cabang', 'Cabang', 'required|trim');

        if ($this->form_validation->run() == FALSE){
            $data['status'] = FALSE;
            foreach ($this->form_validation->error_array() as $dtl => $value) {
                $data['inputerror'][]   = $dtl;
                $data['notiferror'][]   = Conversion::template_error($value);
            }
        }

        $TGL01	= date("Y-m-d", strtotime($tgl_awal));
        $TGL02	= date("Y-m-d", strtotime($tgl_akhir));
        if($TGL02 < $TGL01){
            $data = [
                'inputerror'=> ['tgl_awal','tgl_akhir'],
                'notiferror'=> [
                    Conversion::template_error('Tanggal Awal Harus Lebih Kecil Dari Tanggal Akhir'),
                    Conversion::template_error('Tanggal Akhir Harus Lebih Besar Dari Tanggal Awal')
                ],
                'status'    => false,
            ];
        }

        if($data['status']) {

            $params 	= [
                'tgl_awal'	=> $tgl_awal,
                'tgl_akhir'	=> $tgl_akhir,
                'bayar'		=> $bayar,
                'cabang'	=> $cabang,
            ] ;
            $this->session->set_userdata('params_report_cashflow',$params);

            $messsage = site_url('report/cashflow/cetak_cashflow');
            $data['message'] = $messsage;
        }

        echo json_encode($data);
    }

    function cetak_cashflow()
    {
        $this->load->model('M_cabang');

        $data = $this->session->userdata('params_report_cashflow');
        if(!empty($data)){
            $tgl_awal 	= Conversion::convert_date($data['tgl_awal'],'Y-m-d');
            $tgl_akhir 	= Conversion::convert_date($data['tgl_akhir'],'Y-m-d');
            $bayar 		= $data['bayar'] ?: "all";
            $cabang     = isset($data['cabang']) ? $data['cabang'] : "all";
        }else{
            $tgl_awal 	= date("Y-m-d");
            $tgl_akhir 	= date("Y-m-d");
            $bayar 		= "all";
            $cabang 	= "all";
        }

        $nm_cabang      = strtoupper($cabang === 'all' ? "Semua Cabang" : $this->M_cabang->get_by_id($cabang)->nm_cabang);
        $sysdate        = date('d/m/Y H:i');

        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage('P');
        // setting jenis font yang akan digunakan
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',180,10,0,20);
        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,10,0,20);
        $pdf->SetFont('Times','B',16);
        // mencetak string
        $pdf->Cell(0,7,"LAPORAN ARUS KAS / CASHFLOW",0,2,'C');
        $pdf->Cell(0,5,"POPJASA",0,2,'C');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(0,1,"KANTOR CABANG : $nm_cabang",0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(2,5,'________________________________________________________________________________',0,1,'L');
        $pdf->SetFont('Times','B',8);
        $pdf->Cell(280,5,"Periode         : ".Conversion::convert_date($tgl_awal,'d-m-Y')." s/d " .Conversion::convert_date($tgl_akhir,'d-m-Y'),0,2,'L');
        $pdf->Cell(280,5,"Tgl Cetak     : $sysdate",0,2,'L');
        $pdf->Cell(10,5,'',0,1);

        $pdf->Output();
        die();
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        //header
        $pdf->Cell(10,5,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pj=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'1');
        foreach ($pj as $pj ) {
            $SUMPOPJASA[]=$pj->jumlah_byr;
        }
        $jm=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'2');
        foreach ($jm as $jm ) {
            $SUMJASAMURAH[]=$jm->jumlah_byr;
        }
        $pjs=array_sum($SUMPOPJASA);
        $jsmrh=array_sum($SUMJASAMURAH);
        $total_semua=array_sum($SUMJASAMURAH)+array_sum($SUMPOPJASA);
        //value
        $pdf->Cell(40,5,'RINCIAN PEMASUKAN :',0,1,'L');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(87,5,'OMZET POPJASA',1,0,'L');
        $prosentase_1=$pjs/$total_semua*100;
        $echo_p1=number_format($prosentase_1);
        $pdf->Cell(30,5,"$echo_p1 %",1,1,'R');
        $popjasa=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'1');
        foreach ($popjasa as $popjasa ) {
            $pdf->Cell(95,5,"- $popjasa->nm_customer",0,0,'L');
            $pdf->Cell(1,5,": Rp.  ",0,0,'R');
            $uang_masuk=number_format($popjasa->profit,0,",",".");
            $SUM_JUM_BIAYA[]=$popjasa->profit;
            $pdf->Cell(20,5,"$uang_masuk",0,1,'R');
        }
        $pdf->Cell(80,5,'___________________________________________________________________________ +',0,1,'L');
        $pdf->Cell(128,5,': Rp. ',0,0,'R');
        $pdf->Cell(20,5,number_format(array_sum($SUM_JUM_BIAYA)),0,1,'L');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(87,5,'OMZET JASA MURAH',1,0,'L');
        $prosentase_2=$jsmrh/$total_semua*100;
        $echo_p2=number_format($prosentase_2);
        $pdf->Cell(30,5,"$echo_p2 %",1,1,'R');
        $jasmurah=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'2');
        foreach ($jasmurah as $jasmurah ) {
            $pdf->Cell(95,5,"- $jasmurah->nm_customer",0,0,'L');
            $pdf->Cell(1,5,": Rp.  ",0,0,'R');
            $uang_masuk=number_format($jasmurah->profit,0,",",".");
            $SUM_JUM_jasmurah[]=$jasmurah->profit;
            $pdf->Cell(20,5,"$uang_masuk",0,1,'R');
        }
        $pdf->Cell(80,5,'___________________________________________________________________________ +',0,1,'L');
        $pdf->Cell(128,5,': Rp. ',0,0,'R');
        $pdf->Cell(20,5,number_format(array_sum($SUM_JUM_jasmurah)),0,1,'L');
        $pdf->Cell(80,5,'___________________________________________________________________________________________________ +',0,1,'L');
        $pdf->Cell(160,5,'TOTAL OMZET  :',0,0,'R');
        $total_omz=number_format(array_sum($SUM_JUM_BIAYA)+array_sum($SUM_JUM_jasmurah));
        $pdf->Cell(20,5,"Rp.  $total_omz",0,1,'L');

        $total_omz2=(array_sum($SUM_JUM_BIAYA)+array_sum($SUM_JUM_jasmurah));

        $gj=$this->M_labarugi->select_karyawan($TGL01,$TGL02,'1');
        foreach ($gj as $gj ) {
            $potongan=$this->M_labarugi->select_potongan($gj->id_karyawan);
            $tunjangan=$this->M_labarugi->select_tunjangan($gj->id_karyawan);
            $bonus=$this->M_labarugi->select_bonus($gj->id_karyawan);
            $gaji=$gj->jml_gaji;
            $thp=(($gaji+$bonus->bonus+$tunjangan->tunjangan)-$potongan->potongan);
            $SUM_GAJI[]=$thp;
        }
        $uk=$this->M_labarugi->uang_keluar($TGL01,$TGL02);
        foreach ($uk as $uk ) {
            $SUMPENGELUARAN[]=$uk->pengeluaran;
        }

        $hpppj=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'1');
        foreach ($hpppj as $hpppj ) {
            $SUMHPPPOPJASA[]=$hpppj->hpp;
        }
        $hppjm=$this->M_labarugi->uang_masuk($TGL01,$TGL02,'2');
        foreach ($hppjm as $hppjm ) {
            $SUMHHPPJASAMURAH[]=$hppjm->hpp;
        }


        $hji=array_sum($SUM_GAJI);
        $pgl=array_sum($SUMPENGELUARAN);
        $hhppji=array_sum($SUMHPPPOPJASA);
        $phppgl=array_sum($SUMHHPPJASAMURAH);
        $totalkeluar=(array_sum($SUM_JUM_BIAYA)+array_sum($SUM_JUM_jasmurah));

        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(40,5,'RINCIAN PENGELUARAN :',0,1,'L');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(87,5,'HPP POPJASA',1,0,'L');
        $prosentase_9=$hhppji/$total_omz2*100;
        $echo_p9=number_format($prosentase_9);
        $pdf->Cell(30,5,"$echo_p9 %",1,1,'R');
        $pdf->Cell(95,5,"- HPP POPJASA",0,0,'L');
        $pdf->Cell(1,5,": Rp.  ",0,0,'R');
        $pdf->Cell(20,5,number_format($hhppji),0,1,'R');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(87,5,'HPP JASAMURAH',1,0,'L');
        $prosentase_10=$phppgl/$total_omz2*100;
        $echo_p10=number_format($prosentase_10);
        $pdf->Cell(30,5,"$echo_p10 %",1,1,'R');
        $pdf->Cell(95,5,"- HPP JASAMURAH",0,0,'L');
        $pdf->Cell(1,5,": Rp.  ",0,0,'R');
        $pdf->Cell(20,5,number_format($phppgl),0,1,'R');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(87,5,'GAJI KARYAWAN',1,0,'L');
        $prosentase_3=$hji/$total_omz2*100;
        $echo_p3=number_format($prosentase_3);
        $pdf->Cell(30,5,"$echo_p3 %",1,1,'R');

        $karyawan=$this->M_labarugi->select_karyawan();
        foreach ($karyawan as $karyawan ) {
            $pdf->Cell(95,5,"- $karyawan->nama_karyawan",0,0,'L');
            $potongan=$this->M_labarugi->select_potongan($karyawan->id_karyawan);
            $tunjangan=$this->M_labarugi->select_tunjangan($karyawan->id_karyawan);
            $bonus=$this->M_labarugi->select_bonus($karyawan->id_karyawan);
            $gaji=$karyawan->jml_gaji;
            $thp=(($gaji+$bonus->bonus+$tunjangan->tunjangan)-$potongan->potongan);
            $SUM_thp[]=$thp;
            $pdf->Cell(1,5,": Rp.  ",0,0,'R');
            $pdf->Cell(20,5,number_format($thp),0,1,'R');
        }
        $pdf->Cell(80,5,'___________________________________________________________________________ +',0,1,'L');
        $pdf->Cell(128,5,': Rp. ',0,0,'R');
        $pdf->Cell(20,5,number_format(array_sum($SUM_thp)),0,1,'L');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(10,5,'',0,1);

        $pdf->Cell(87,5,'BIAYA OPERASIONAL',1,0,'L');
        $prosentase_4=$pgl/$total_omz2*100;
        $echo_p4=number_format($prosentase_4);
        $pdf->Cell(30,5,"$echo_p4 %",1,1,'R');
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

        $pdf->Cell(80,5,'___________________________________________________________________________________________________ +',0,1,'L');
        $pdf->Cell(160,5,'TOTAL PENGELUARAN  :',0,0,'R');
        $total_omz=number_format(array_sum($SUM_thp)+array_sum($jum_keluar));
        $pdf->Cell(20,5,"Rp.  $total_omz",0,1,'L');

        $a=(array_sum($SUM_JUM_BIAYA)+array_sum($SUM_JUM_jasmurah));
        $b=(array_sum($jum_keluar)+array_sum($SUM_thp));
        $laba=$a-$b;
        $pl=round($laba/$a*100,0);
        $pdf->Cell(155,5,"TOTAL LABA PENJUALAN ($pl %)",0,0,'R');
        $pdf->Cell(7,5,'  :   Rp.   ',0,0,'L');
        $pdf->Cell(20,5,number_format($laba),0,1,'R');


        $pdf->Output();
    }
}