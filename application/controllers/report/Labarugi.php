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
        $this->load->model('report/M_v_pengeluaran');
        $this->load->model('M_trs_detail_rekening_biaya');
        $this->load->model('transaksi/keuangan/M_v_trs_detail_rekening_biaya');
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
        $TGL01  = date("Y-m-d", strtotime($tgl_awal));
        $TGL02  = date("Y-m-d", strtotime($tgl_akhir));
        $TGL2   = date("d/m/Y", strtotime($tgl_akhir));
        $TGL1   = date("d/m/Y", strtotime($tgl_awal));
        $periode = strtoupper(date("F Y", strtotime($tgl_akhir)));
        $cabang = $this->session->userdata('nm_cabang');

        $pdf = new FPDF('l', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage('P');
        $pdf->Image(base_url() . 'assets/app-assets/vendors/logo/jasamurah.png', 160, 10, 0, 20);
        $pdf->Image(base_url() . 'assets/app-assets/vendors/logo/popjasa.png', 10, 10, 0, 20);
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
        $pdf->Cell(10, 2, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        // Memberikan space kebawah agar tidak terlalu rapat
        //header
        $pdf->Cell(10, 2, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 8);

        $pj = $this->M_labarugi->pemasukanProject($TGL01, $TGL02, '1');
        $SUMPOPJASA = [];
        foreach ($pj as $pj) {
            $SUMPOPJASA[] = $pj->profit;
        }
        $jm = $this->M_labarugi->pemasukanProject($TGL01, $TGL02, '2');
        $SUMJASAMURAH = [];
        foreach ($jm as $jm) {
            $SUMJASAMURAH[] = $jm->profit;
        }
        $pjs            = array_sum($SUMPOPJASA);
        $jsmrh          = array_sum($SUMJASAMURAH);
        $total_semua    = array_sum($SUMJASAMURAH) + array_sum($SUMPOPJASA);

        $pdf->SetFillColor(0,0,0);

        $pdf->Cell(40, 5, 'RINCIAN PEMASUKAN :', 0, 1, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(87, 5, 'OMZET POPJASA', 1, 0, 'L',true);
        $prosentase_1 = $total_semua ? $pjs / $total_semua * 100 : 0;
        $echo_p1 = number_format($prosentase_1);
        $pdf->Cell(30, 5, "$echo_p1 %", 1, 1, 'R',true);
        $pdf->SetTextColor(0,0,0);

//        $popjasa = $this->M_labarugi->uang_masuk($TGL01, $TGL02, '1');
        $popjasa = $this->M_labarugi->pemasukanProject($TGL01, $TGL02, '1');
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
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(87, 5, 'OMZET JASAMURA', 1, 0, 'L',true);

        $prosentase_2 = $total_semua ? $jsmrh / $total_semua * 100 : 0;

        $echo_p2 = number_format($prosentase_2);
        $pdf->Cell(30, 5, "$echo_p2 %", 1, 1, 'R',true);
        $pdf->SetTextColor(0,0,0);
        $jasmurah = $this->M_labarugi->pemasukanProject($TGL01, $TGL02, '2');
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

        $gj = $this->M_labarugi->select_karyawan();
        $SUM_GAJI = [];
        foreach ($gj as $gj) {
            $gaji       = $this->M_labarugi->selectGaji($gj->id_karyawan);
            $potongan   = $this->M_labarugi->select_potongan($gj->id_karyawan);
            $tunjangan  = $this->M_labarugi->select_tunjangan($gj->id_karyawan);
            $bonus      = $this->M_labarugi->select_bonus($gj->id_karyawan);
            $thp        = $gaji ? (($gaji + $bonus->bonus + $tunjangan->tunjangan) - $potongan->potongan) : 0;
            $SUM_GAJI[] = $thp;
        }

        $uk             = $this->M_labarugi->uang_keluar($TGL01, $TGL02);
        $SUMPENGELUARAN = [];
        foreach ($uk as $uk) {
            $SUMPENGELUARAN[] = $uk->pengeluaran;
        }

        $hppPopJasa     = $this->M_v_trs_detail_rekening_biaya->sum(
            M_v_trs_detail_rekening_biaya::harga,[
                M_v_trs_detail_rekening_biaya::tgl_input.' >=' => $TGL01,
                M_v_trs_detail_rekening_biaya::tgl_input.' <=' => $TGL02,
                M_v_trs_detail_rekening_biaya::id_jns_rekbiaya =>  'HPP01',
            ]);

        $hppJasaMura     = $this->M_v_trs_detail_rekening_biaya->sum(
            M_v_trs_detail_rekening_biaya::harga,[
                M_v_trs_detail_rekening_biaya::tgl_input.' >=' => $TGL01,
                M_v_trs_detail_rekening_biaya::tgl_input.' <=' => $TGL02,
                M_v_trs_detail_rekening_biaya::id_jns_rekbiaya =>  'HPP02',
            ]);

        $zis    = $this->M_v_trs_detail_rekening_biaya->sum(
            M_v_trs_detail_rekening_biaya::harga,[
            M_v_trs_detail_rekening_biaya::tgl_input.' >=' => $TGL01,
            M_v_trs_detail_rekening_biaya::tgl_input.' <=' => $TGL02,
            M_v_trs_detail_rekening_biaya::id_jns_rekbiaya =>  'ZIS',
        ]);

        $hji    = array_sum($SUM_GAJI);
        $pgl    = array_sum($SUMPENGELUARAN);
        $hhppji = $hppPopJasa;
        $phppgl = $hppJasaMura;
        $sumzis = $zis;
        $totalkeluar = (array_sum($SUM_JUM_BIAYA) + array_sum($SUM_JUM_jasmurah));

        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(40, 5, 'RINCIAN PENGELUARAN :', 0, 1, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(87, 5, 'HPP POPJASA', 1, 0, 'L',true);
        $prosentase_9 = $total_omz2 ? $hhppji / $total_omz2 * 100 : 0;
        $echo_p9 = number_format($prosentase_9);
        $pdf->Cell(30, 5, "$echo_p9 %", 1, 1, 'R',true);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(95, 5, "- HPP POPJASA", 0, 0, 'L');
        $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
        $pdf->Cell(20, 5, number_format($hhppji), 0, 1, 'R');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(87, 5, 'HPP JASAMURA', 1, 0, 'L',true);
        $prosentase_10 = $total_omz2 ? $phppgl / $total_omz2 * 100 : 0;
        $echo_p10 = number_format($prosentase_10);
        $pdf->Cell(30, 5, "$echo_p10 %", 1, 1, 'R',true);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(95, 5, "- HPP JASAMURA", 0, 0, 'L');
        $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
        $pdf->Cell(20, 5, number_format($phppgl), 0, 1, 'R');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(87, 5, 'GAJI KARYAWAN', 1, 0, 'L',true);
        $prosentase_3 = $total_omz2 ? $hji / $total_omz2 * 100 : 0;
        $echo_p3 = number_format($prosentase_3);
        $pdf->Cell(30, 5, "$echo_p3 %", 1, 1, 'R',true);
        $pdf->SetTextColor(0,0,0);

        $karyawan = $this->M_labarugi->select_karyawan();
        $SUM_thp = [];
        foreach ($karyawan as $karyawan) {
            $gaji       = $this->M_labarugi->selectGaji($karyawan->id_karyawan);
            if($gaji){
                $pdf->Cell(95, 5, "- $karyawan->nama_karyawan", 0, 0, 'L');
                $potongan   = $this->M_labarugi->select_potongan($karyawan->id_karyawan);
                $tunjangan  = $this->M_labarugi->select_tunjangan($karyawan->id_karyawan);
                $bonus      = $this->M_labarugi->select_bonus($karyawan->id_karyawan);
                $thp        = (($gaji + $bonus->bonus + $tunjangan->tunjangan) - $potongan->potongan);
                $SUM_thp[]  = $thp;
                $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
                $pdf->Cell(20, 5, number_format($thp), 0, 1, 'R');
            }
        }
        $pdf->Cell(80, 5, '___________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(128, 5, ': Rp. ', 0, 0, 'R');
        $pdf->Cell(20, 5, number_format(array_sum($SUM_thp)), 0, 1, 'L');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(87, 5, 'BIAYA OPERASIONAL', 1, 0, 'L',true);
        $prosentase_4 = $total_omz2 ? $pgl / $total_omz2 * 100 : 0;
        $echo_p4 = number_format($prosentase_4);
        $pdf->Cell(30, 5, "$echo_p4 %", 1, 1, 'R',true);

        $keluar = $this->M_labarugi->uang_keluar($TGL01, $TGL02);

        $pdf->SetTextColor(0,0,0);

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

        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(87, 5, 'BIAYA ZIS(ZAKAT / INFAQ / SODAQOH)', 1, 0, 'L',true);
        $prosentase_5 = $total_omz2 ? $sumzis / $total_omz2 * 100 : 0;
        $echo_p5 = number_format($prosentase_5);
        $pdf->Cell(30, 5, "$echo_p5 %", 1, 1, 'R',true);
        $zakatinfqsdkh = $this->M_labarugi->zis($TGL01, $TGL02);
        $pdf->SetTextColor(0,0,0);
        $jum_zis = [];
        foreach ($zakatinfqsdkh as $resltzis) {
            $pdf->Cell(95, 5, "- $resltzis->nm_rekbiaya", 0, 0, 'L');
            $pdf->Cell(1, 5, ": Rp.  ", 0, 0, 'R');
            $uang_zis = number_format($resltzis->pengeluaran, 0, ",", ".");
            $jum_zis[] = $resltzis->pengeluaran;
            $pdf->Cell(20, 5, "$uang_zis", 0, 1, 'R');
        }
        $pdf->Cell(80, 5, '___________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(128, 5, ': Rp. ', 0, 0, 'R');
        $pdf->Cell(20, 5, number_format(array_sum($jum_zis)), 0, 1, 'L');


        $pdf->Cell(80, 5, '___________________________________________________________________________________________________ +', 0, 1, 'L');
        $pdf->Cell(160, 5, 'TOTAL PENGELUARAN  :', 0, 0, 'R');
        $tot_pengeluaran = $hhppji + $phppgl+array_sum($SUM_thp)+array_sum($jum_keluar)+array_sum($jum_zis);
        $t_out = number_format($tot_pengeluaran);
        $pdf->Cell(20, 5, "Rp.  $t_out", 0, 1, 'L');

        $a = (array_sum($SUM_JUM_BIAYA) + array_sum($SUM_JUM_jasmurah));
        $b = $tot_pengeluaran;
        $laba = $a - $b;
        $pl = $a ? round($laba / $a * 100, 0) : 0;
        $pdf->Cell(155, 5, "TOTAL LABA PENJUALAN ($pl %)", 0, 0, 'R');
        $pdf->Cell(7, 5, '  :   Rp.   ', 0, 0, 'L');
        $pdf->Cell(20, 5, number_format($laba), 0, 1, 'R');

        $pdf->Output();
    }

    public function pdf_baru($bulan = null,$tahun = null,$cabang = 'SBY')
    {
        $this->load->model('transaksi/hrd/M_v_trs_hrd_potongan_karyawan');
        $this->load->model('transaksi/hrd/M_v_trs_hrd_gaji');
        $this->load->model('transaksi/hrd/M_v_trs_hrd_pembayaran_karyawan');
        $this->load->model('transaksi/hrd/M_v_trs_hrd_piutang_karyawan');
        $this->load->model('transaksi/hrd/M_v_trs_hrd_bonus_karyawan');
        $this->load->model('transaksi/hrd/M_v_trs_hrd_tunjangan_karyawan');
        $this->load->model('report/M_v_paybycustomers');
        $this->load->model('report/M_v_pengeluaran');
        $this->load->model('M_karyawan');

        if(!$bulan) $bulan = date('m');
        if(!$tahun) $tahun = date('Y');
        $TGL01		= $tahun."-".$bulan."-01";//date("Y-m-d", strtotime($tgl_awal));
        $TGL02		= $tahun."-".$bulan."-31";//date("Y-m-d", strtotime($tgl_akhir));

        //Popjasa
        $wherePopjasa = [
            M_v_paybycustomers::st_project              => 1,
            "MONTH(".M_v_paybycustomers::tgl_input.")"  => $bulan,
            "YEAR(".M_v_paybycustomers::tgl_input.")"   => $tahun,
        ];
        if($cabang){$wherePopjasa[M_v_paybycustomers::kd_cabang] = $cabang;}

        //Jasamura
        $whereJasamura = [
            M_v_paybycustomers::st_project              => 2,
            "MONTH(".M_v_paybycustomers::tgl_input.")"  => $bulan,
            "YEAR(".M_v_paybycustomers::tgl_input.")"   => $tahun,
        ];
        if($cabang){$whereJasamura[M_v_paybycustomers::kd_cabang] = $cabang;}

        //Popjasa
        if($popjasa = $this->M_v_paybycustomers->find($wherePopjasa)) {
            $profitPopjasa  = array_sum(array_column($popjasa, 'profit'));
            $hppPopjasa     = array_sum(array_column($popjasa, 'hpp'));
        }else {
            $profitPopjasa  = 0;
            $hppPopjasa     = 0;
        }
        //Jasamura
        if($jasamura = $this->M_v_paybycustomers->find($whereJasamura)) {
            $profitJasamura = array_sum(array_column($jasamura, 'profit'));
            $hppJasamura    = array_sum(array_column($jasamura, 'hpp'));
        }else {
            $profitJasamura = 0;
            $hppJasamura    = 0;
        }

        $totalPendapatan    = $profitPopjasa + $profitJasamura;
        $totalHpp           = $hppPopjasa + $hppJasamura;

        //Gaji
//        $karyawan   = $this->M_labarugi->select_karyawan();
//        $SUM_thp    = [];
//        foreach ($karyawan as $karyawan) {
//            $potongan   = $this->M_labarugi->select_potongan($karyawan->id_karyawan);
//            $tunjangan  = $this->M_labarugi->select_tunjangan($karyawan->id_karyawan);
//            $bonus      = $this->M_labarugi->select_bonus($karyawan->id_karyawan);
//            $gaji       = $karyawan->jml_gaji;
//            $thp        = (($gaji + $bonus->bonus + $tunjangan->tunjangan) - $potongan->potongan);
//            $SUM_thp[]  = $thp;
//        }

        $whereKaryawan  = [M_karyawan::status_karyawan => 1];
        if($cabang){$whereKaryawan[M_karyawan::kd_cabang] = $cabang;}
        $karyawan       = $this->M_karyawan->find($whereKaryawan);

        //Gaji Karyawan
        $whereTrxGaji   = [
            "MONTH(".M_v_trs_hrd_gaji::tgl_gaji.")"   => $bulan,
            "YEAR(".M_v_trs_hrd_gaji::tgl_gaji.")"    => $tahun,
        ];
        $trxGaji        = $this->M_v_trs_hrd_gaji->find($whereTrxGaji);

        //Potongan Karyawan
        $whereTrxPotongan   = [
            "MONTH(".M_v_trs_hrd_potongan_karyawan::tgl_trans.")"   => $bulan,
            "YEAR(".M_v_trs_hrd_potongan_karyawan::tgl_trans.")"    => $tahun,
        ];
        if($cabang){$whereTrxPotongan[M_v_trs_hrd_potongan_karyawan::kd_cabang] = $cabang;}
        $trxPotongan        = $this->M_v_trs_hrd_potongan_karyawan->find($whereTrxPotongan);

        //Tunjangan Karyawan
        $whereTrxTunjangan  = [
            "MONTH(".M_v_trs_hrd_tunjangan_karyawan::tgl_trans.")"   => $bulan,
            "YEAR(".M_v_trs_hrd_tunjangan_karyawan::tgl_trans.")"    => $tahun,
        ];
        if($cabang){$whereTrxTunjangan[M_v_trs_hrd_tunjangan_karyawan::kd_cabang] = $cabang;}
        $trxTunjangan       = $this->M_v_trs_hrd_tunjangan_karyawan->find($whereTrxTunjangan);

        //Bonus Karyawan
        $whereTrxBonus  = [
            "MONTH(".M_v_trs_hrd_bonus_karyawan::tgl_input.")"   => $bulan,
            "YEAR(".M_v_trs_hrd_bonus_karyawan::tgl_input.")"    => $tahun,
        ];
        if($cabang){$whereTrxBonus[M_v_trs_hrd_bonus_karyawan::kd_cabang] = $cabang;}
        $trxBonus       = $this->M_v_trs_hrd_bonus_karyawan->find($whereTrxBonus);

        //Piutang Karyawan
        $whereTrxPiutang  = [
            "MONTH(".M_v_trs_hrd_piutang_karyawan::tgl_input.")"   => $bulan,
            "YEAR(".M_v_trs_hrd_piutang_karyawan::tgl_input.")"    => $tahun,
        ];
        if($cabang){$whereTrxPiutang[M_v_trs_hrd_piutang_karyawan::kd_cabang] = $cabang;}
        $trxPiutang       = $this->M_v_trs_hrd_piutang_karyawan->find($whereTrxPiutang);

        //Pembayaran Piutang Karyawan
        $whereTrxBayar  = [
            "MONTH(".M_v_trs_hrd_pembayaran_karyawan::tgl_input.")"   => $bulan,
            "YEAR(".M_v_trs_hrd_pembayaran_karyawan::tgl_input.")"    => $tahun,
        ];
        if($cabang){$whereTrxBayar[M_v_trs_hrd_pembayaran_karyawan::kd_cabang] = $cabang;}
        $trxBayar       = $this->M_v_trs_hrd_pembayaran_karyawan->find($whereTrxBayar);

        echo "<pre>";
        var_dump($bulan);
        var_dump($tahun);
        var_dump($profitPopjasa);
        var_dump($hppPopjasa);
        var_dump($profitJasamura);
        var_dump($hppJasamura);
        echo "Gaji : <br>";
        var_dump($trxGaji);
        echo "Potongan : <br>";
        var_dump($trxPotongan);
        echo "Tunjangan : <br>";
        var_dump($trxTunjangan);
        echo "Bonus : <br>";
        var_dump($trxBonus);
        echo "Piutang : <br>";
        var_dump($trxPiutang);
        echo "Bayar Piutang : <br>";
        var_dump($trxBayar);
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
        $html = $this->load->view('report/labarugi/pdf', $data,true);

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
