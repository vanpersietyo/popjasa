<?php use Mpdf\Mpdf;
use Mpdf\MpdfException;

defined('BASEPATH') OR exit('No direct script access allowed');

class Labarugi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_login');
        $this->load->model('report/M_labarugi', 'M_labarugi');
    }

    public function index()
    {
        $data['pages'] = 'report/labarugi';
        $this->load->view('layout', $data);
    }

    function cetak()
    {
        if ($this->input->post('submitForm') == 'rekap') {
            $tgl_awal = date("Y-m-d", strtotime($this->input->post('TGL_01')));
            $tgl_akhir = date("Y-m-d", strtotime($this->input->post('TGL_02')));
            $this->pdf($tgl_awal, $tgl_akhir);
        }
    }

    function pdf($tgl_awal, $tgl_akhir)
    {
        $TGL01 = date("Y-m-d", strtotime($tgl_awal));
        $TGL02 = date("Y-m-d", strtotime($tgl_akhir));
        $TGL2 = date("d/m/Y", strtotime($tgl_akhir));
        $TGL1 = date("d/m/Y", strtotime($tgl_awal));
        $periode = strtoupper(date("F Y", strtotime($tgl_akhir)));
        $PRD_BLTH = strtoupper(date("M-Y", strtotime($tgl_akhir)));
        $cabang = $this->session->userdata('nm_cabang');
        $sysdate = date('d/m/Y H:i');

        $pdf = new FPDF('l', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage('P');
        // setting jenis font yang akan digunakan
//        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',180,10,0,20);
//        $pdf->Image(base_url().'assets/app-assets/vendors/logo/popjasa.png',10,10,0,20);
        $pdf->SetFont('Times', 'B', 16);
        // mencetak string
        $sysdate = date('d/m/Y H:i');
        $pdf->Cell(0, 7, "LAPORAN LABA RUGI", 0, 2, 'C');
        $pdf->Cell(0, 5, "POPJASA DAN JASAMURA", 0, 2, 'C');
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(0, 1, "KANTOR CABANG : $cabang", 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(2, 5, '________________________________________________________________________________', 0, 1, 'L');
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(280, 5, "Periode     : $periode", 0, 2, 'L');
        $pdf->Cell(280, 5, "Tgl Cetak : $sysdate", 0, 2, 'L');
        $pdf->Cell(280, 5, "Filter        : ($TGL1) - ($TGL2)", 0, 2, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        // Memberikan space kebawah agar tidak terlalu rapat
        //header
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 8);

        $pj = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '1');
        $SUMPOPJASA = [];
        foreach ($pj as $pj) {
            $SUMPOPJASA[] = $pj->profit;
        }
        $jm = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '2');
        $SUMJASAMURAH = [];
        foreach ($jm as $jm) {
            $SUMJASAMURAH[] = $jm->profit;
        }
        $pjs = array_sum($SUMPOPJASA);
        $jsmrh = array_sum($SUMJASAMURAH);
        $total_semua = array_sum($SUMJASAMURAH) + array_sum($SUMPOPJASA);
//        var_dump($pjs);
//        exit();
        //value
        $pdf->Cell(40, 5, 'RINCIAN PEMASUKAN :', 0, 1, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(87, 5, 'OMZET POPJASA', 1, 0, 'L');
        $prosentase_1 = $pjs / $total_semua * 100;
        $echo_p1 = number_format($prosentase_1);
        $pdf->Cell(30, 5, "$echo_p1 %", 1, 1, 'R');

        $popjasa = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '1');
        $SUM_JUM_BIAYA = [];
        foreach ($popjasa as $popjasa) {
            $pdf->Cell(95, 5, "- $popjasa->nm_customer", 0, 0, 'L');
            $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
            $uang_masuk = number_format($popjasa->profit, 0, ",", ".");
            $SUM_JUM_BIAYA[] = $popjasa->profit;
            $pdf->Cell(20, 5, "$uang_masuk", 0, 1, 'R');
        }
        $pdf->Cell(80, 5, '___________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(128, 5, ': Rp. ', 0, 0, 'R');
        $pdf->Cell(20, 5, number_format(array_sum($SUM_JUM_BIAYA)), 0, 1, 'L');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->Cell(87, 5, 'OMZET JASAMURA', 1, 0, 'L');
        $prosentase_2 = $jsmrh / $total_semua * 100;
        $echo_p2 = number_format($prosentase_2);
        $pdf->Cell(30, 5, "$echo_p2 %", 1, 1, 'R');

        $jasmurah = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '2');
        $SUM_JUM_jasmurah = [];
        foreach ($jasmurah as $jasmurah) {
            $pdf->Cell(95, 5, "- $jasmurah->nm_customer", 0, 0, 'L');
            $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
            $uang_masuk = number_format($jasmurah->profit, 0, ",", ".");
            $SUM_JUM_jasmurah[] = $jasmurah->profit;
            $pdf->Cell(20, 5, "$uang_masuk", 0, 1, 'R');
        }
        $pdf->Cell(80, 5, '___________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(128, 5, ': Rp. ', 0, 0, 'R');
        $pdf->Cell(20, 5, number_format(array_sum($SUM_JUM_jasmurah)), 0, 1, 'L');
        $pdf->Cell(80, 5, '___________________________________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(160, 5, 'TOTAL OMZET  :', 0, 0, 'R');
        $total_omz = number_format(array_sum($SUM_JUM_BIAYA) + array_sum($SUM_JUM_jasmurah));
        $pdf->Cell(20, 5, "Rp.  $total_omz", 0, 1, 'L');

        $total_omz2 = (array_sum($SUM_JUM_BIAYA) + array_sum($SUM_JUM_jasmurah));

        $gj = $this->M_labarugi->select_karyawan($TGL01, $TGL02, '1');
        $SUM_GAJI = [];
        foreach ($gj as $gj) {
            $potongan = $this->M_labarugi->select_potongan($gj->id_karyawan);
            $tunjangan = $this->M_labarugi->select_tunjangan($gj->id_karyawan);
            $bonus = $this->M_labarugi->select_bonus($gj->id_karyawan);
            $gaji = $gj->jml_gaji;
            $thp = (($gaji + $bonus->bonus + $tunjangan->tunjangan) - $potongan->potongan);
            $SUM_GAJI[] = $thp;
        }

        $uk = $this->M_labarugi->uang_keluar($TGL01, $TGL02);
        $SUMPENGELUARAN = [];
        foreach ($uk as $uk) {
            $SUMPENGELUARAN[] = $uk->pengeluaran;
        }

        $hpppj = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '1');
        $SUMHPPPOPJASA = [];
        foreach ($hpppj as $hpppj) {
            $SUMHPPPOPJASA[] = $hpppj->hpp;
        }

        $hppjm = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '2');
        $SUMHHPPJASAMURAH = [];
        foreach ($hppjm as $hppjm) {
            $SUMHHPPJASAMURAH[] = $hppjm->hpp;
        }

        $hji = array_sum($SUM_GAJI);
        $pgl = array_sum($SUMPENGELUARAN);
        $hhppji = array_sum($SUMHPPPOPJASA);
        $phppgl = array_sum($SUMHHPPJASAMURAH);
        $totalkeluar = (array_sum($SUM_JUM_BIAYA) + array_sum($SUM_JUM_jasmurah));

        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(40, 5, 'RINCIAN PENGELUARAN :', 0, 1, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(87, 5, 'HPP POPJASA', 1, 0, 'L');
        $prosentase_9 = $hhppji / $total_omz2 * 100;
        $echo_p9 = number_format($prosentase_9);
        $pdf->Cell(30, 5, "$echo_p9 %", 1, 1, 'R');
        $pdf->Cell(95, 5, "- HPP POPJASA", 0, 0, 'L');
        $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
        $pdf->Cell(20, 5, number_format($hhppji), 0, 1, 'R');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->Cell(87, 5, 'HPP JASAMURA', 1, 0, 'L');
        $prosentase_10 = $phppgl / $total_omz2 * 100;
        $echo_p10 = number_format($prosentase_10);
        $pdf->Cell(30, 5, "$echo_p10 %", 1, 1, 'R');
        $pdf->Cell(95, 5, "- HPP JASAMURA", 0, 0, 'L');
        $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
        $pdf->Cell(20, 5, number_format($phppgl), 0, 1, 'R');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->Cell(87, 5, 'GAJI KARYAWAN', 1, 0, 'L');
        $prosentase_3 = $hji / $total_omz2 * 100;
        $echo_p3 = number_format($prosentase_3);
        $pdf->Cell(30, 5, "$echo_p3 %", 1, 1, 'R');

        $karyawan = $this->M_labarugi->select_karyawan();
        $SUM_thp = [];
        foreach ($karyawan as $karyawan) {
            $pdf->Cell(95, 5, "- $karyawan->nama_karyawan", 0, 0, 'L');
            $potongan = $this->M_labarugi->select_potongan($karyawan->id_karyawan);
            $tunjangan = $this->M_labarugi->select_tunjangan($karyawan->id_karyawan);
            $bonus = $this->M_labarugi->select_bonus($karyawan->id_karyawan);
            $gaji = $karyawan->jml_gaji;
            $thp = (($gaji + $bonus->bonus + $tunjangan->tunjangan) - $potongan->potongan);
            $SUM_thp[] = $thp;
            $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
            $pdf->Cell(20, 5, number_format($thp), 0, 1, 'R');
        }
        $pdf->Cell(80, 5, '___________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(128, 5, ': Rp. ', 0, 0, 'R');
        $pdf->Cell(20, 5, number_format(array_sum($SUM_thp)), 0, 1, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(10, 5, '', 0, 1);

        $pdf->Cell(87, 5, 'BIAYA OPERASIONAL', 1, 0, 'L');
        $prosentase_4 = $pgl / $total_omz2 * 100;
        $echo_p4 = number_format($prosentase_4);
        $pdf->Cell(30, 5, "$echo_p4 %", 1, 1, 'R');
        $keluar = $this->M_labarugi->uang_keluar($TGL01, $TGL02);
        $jum_keluar = [];
        foreach ($keluar as $keluar) {
            $pdf->Cell(95, 5, "- $keluar->nm_rekbiaya", 0, 0, 'L');
            $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
            $uang_keluar = number_format($keluar->pengeluaran, 0, ",", ".");
            $jum_keluar[] = $keluar->pengeluaran;
            $pdf->Cell(20, 5, "$uang_keluar", 0, 1, 'R');
        }
        $pdf->Cell(80, 5, '___________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(128, 5, ': Rp. ', 0, 0, 'R');
        $pdf->Cell(20, 5, number_format(array_sum($jum_keluar)), 0, 1, 'L');

        $pdf->Cell(80, 5, '___________________________________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(160, 5, 'TOTAL PENGELUARAN  :', 0, 0, 'R');
        $tot_pengeluaran = $hhppji + $pgl + $pgl + $phppgl;
        $t_out = number_format($tot_pengeluaran);
        $pdf->Cell(20, 5, "Rp.  $t_out", 0, 1, 'L');

        $a = (array_sum($SUM_JUM_BIAYA) + array_sum($SUM_JUM_jasmurah));
        $b = $tot_pengeluaran;
        $laba = $a - $b;
        $pl = round($laba / $a * 100, 0);
        $pdf->Cell(155, 5, "TOTAL LABA PENJUALAN ($pl %)", 0, 0, 'R');
        $pdf->Cell(7, 5, '  :   Rp.   ', 0, 0, 'L');
        $pdf->Cell(20, 5, number_format($laba), 0, 1, 'R');

        $pdf->Output();
    }

    public function pdf_baru($bulan = null,$tahun = null,$cabang = null)
    {
        $this->load->model('report/M_v_paybycustomers');
        $TGL01		= $tahun."-".$bulan."-01";//date("Y-m-d", strtotime($tgl_awal));
        $TGL02		= $tahun."-".$bulan."-31";//date("Y-m-d", strtotime($tgl_akhir));

        //Popjasa
        $where      = [
            M_v_paybycustomers::st_project              => 1,
            "MONTH(".M_v_paybycustomers::tgl_input.")"  => $bulan,
            "YEAR(".M_v_paybycustomers::tgl_input.")"   => $tahun,

        ];
        if($cabang){
            $where[M_v_paybycustomers::kd_cabang] = $cabang;
        }
        $popjasa        = $this->M_v_paybycustomers->find($where);
        $profitPopjasa  = array_sum(array_column($popjasa,'profit'));
        //Jasamura
        $jasamura       = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '2');
        $profitJasamura = array_sum(array_column($jasamura,'profit'));

        echo "<pre>";
        var_dump($profitPopjasa);
        var_dump($profitJasamura);
//        print_r ($where);
        echo "</pre>";
        die();

        $jual		= $this->M_rugilaba->sum_penjualan($TGL01,$TGL02);
        $retur_jual	= $this->M_rugilaba->sum_returpenjualan($TGL01,$TGL02);
        $HPP_BRUTTO	= $this->M_rugilaba->sum_HPPpenjualan($TGL01,$TGL02);
        $HPP_RETUR	= $this->M_rugilaba->sum_HPPretur($TGL01,$TGL02);
        $biaya_gaji	= $this->M_rugilaba->biayaGroup($TGL01,$TGL02,'GAJI');
        $tot_gaji	= $this->M_rugilaba->sumBiayaGroup($TGL01,$TGL02,'GAJI');
        $end_gaji 	= end($biaya_gaji);
        $biaya_opr	= $this->M_rugilaba->biayaGroup($TGL01,$TGL02,'OPERASIONAL');
        $end_opr 	= end($biaya_opr);
        $tot_opr	= $this->M_rugilaba->sumBiayaGroup($TGL01,$TGL02,'OPERASIONAL');
        $periode	= Conversion::monthIndo($bulan,true) . " - " . $tahun;
        $data = [
            'title' 		=> 'LAPORAN RUGI LABA',
            'jual_bruto'	=> $jual ? $jual->BAYAR : 0,
            'jual_retur'	=> $retur_jual ? $retur_jual->RETUR_PENJUALAN : 0,
            'hpp_bruto'		=> $HPP_BRUTTO ? $HPP_BRUTTO->HPP : 0,
            'hpp_retur'		=> $HPP_RETUR ? $HPP_RETUR->HPP : 0,
            'biaya_gaji'	=> $biaya_gaji,
            'end_gaji'		=> $end_gaji,
            'tot_gaji'		=> $tot_gaji ? $tot_gaji->JUM_BIAYA : 0,
            'biaya_opr'		=> $biaya_opr,
            'end_opr'		=> $end_opr,
            'tot_opr'		=> $tot_opr ? $tot_opr->JUM_BIAYA : 0,
            'periode' 		=> $periode,
            'logo'          => base_url('assets/app-assets/vendors/logo/popjasa.png')
            ];
        try {
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4-P',
                'orientation' => 'P'
            ]);
        } catch (MpdfException $e) {
            Conversion::send_telegram(json_encode($e));
        }
        $html = $this->load->view($this->conversion->getController('pdf'), $data,true);

        try {
            $mpdf->WriteHTML($html);
        } catch (MpdfException $e) {
            Conversion::send_telegram(json_encode($e));
        }
        try {
            $mpdf->Output();
        } catch (MpdfException $e) {
            Conversion::send_telegram(json_encode($e));
        }
    }


}
