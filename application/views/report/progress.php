<html xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
    <title>BLANKO PERSYARATAN PERIJINAN USAHA</title>
    <style type="text/css">
        @page {
            margin-left: 5%; /* <any of the usual CSS values for margins> */
            margin-right: 5%; /* <any of the usual CSS values for margins> */
            margin-top: 1%; /* <any of the usual CSS values for margins> */
            margin-bottom: 2%; /* <any of the usual CSS values for margins> */
        }

        @font-face {
            font-family: 'OpenSans-Regular';
            font-style: normal;
            font-weight: normal;
            /*src: url(http://" . $_SERVER['SERVER_NAME']."/dompdf/fonts/OpenSans-Regular.ttf) format('truetype');*/
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        .kop_pemkot {
            font-size: 18px !important;
            font-weight: bold;
            text-align: center;
        }

        td.kop {
            padding: 5px !important;
        }

        .tb-body td, .tb-body th {
            border: solid 1px #000;
            padding: 1px 3px 1px 3px;
        }

        .fontNormal {
            font-weight: normal !important;
            vertical-align: top;
        }

        .fontCenter {
            text-align: center !important;
        }

        .fontRight {
            text-align: right !important;
        }

        .fontLeft {
            text-align: left !important;
        }

        .fontBold {
            font-weight: bold !important;
        }

        .header_section {
            background-color: black;
            color: white;
            font-size: 12px
        }

        .border_bottom {
            border-bottom: 1px solid;
        }

        .size-14 {
            font-size: 14px !important;
        }

        .size-16 {
            font-size: 16px !important;
        }

        .size-18 {
            font-size: 18px !important;
        }

        .tg  {border-collapse:collapse;border-spacing:0;width: 100%}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:center;}
        .tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top;}

    </style>
</head>
<body>
<table style="width: 100%;border: 1px solid">
    <tr>
        <td style="border: 1px solid;">
            <table width="100%">
                <thead style="font-weight: bold">
                <tr>
                    <?php if ($dokumen->st_project == 1) { ?>
                        <th style="width: 10%">
                            <img width="100px" height="100px"
                                 src="<?php echo base_url('assets/app-assets/vendors/logo/popjasa.png'); ?>" alt="logo">
                        </th>
                        <th class="fontCenter" style="width: 90%">
                            <h2 align="center">BLANKO PERSYARATAN PERIJINAN USAHA</h2>
                            <h3 align="center"><?= $dokumen->nm_customer ?> &nbsp; <?= $dokumen->kota_customer ?></h3>
                        </th>
                    <?php } else { ?>
                        <th style="width: 10%">
                            <img width="15%"
                                 src="<?php echo base_url('assets/app-assets/vendors/logo/jasamurah.png'); ?>"
                                 alt="logo">
                        </th>
                        <th style="width: 90% ">
                            <h2 align="center">BLANKO PERSYARATAN PERIJINAN USAHA</h2>
                            <h3 align="center"><?= $dokumen->nm_customer ?> &nbsp; <?= $dokumen->kota_customer ?></h3>
                        </th>
                    <?php } ?>
                </tr>
                </thead>
            </table>
            <br>
            <!--PENDAPATAN-->
            <table class="tg">
                <thead>
                <tr>
                    <th class="tg-0pky" style="text-align: center;font-weight: bold">KETERANGAN</th>
                    <th class="tg-0pky" style="text-align: center;font-weight: bold">JENIS IJIN</th>
                    <th class="tg-0pky" style="text-align: center;font-weight: bold">URAIAN</th>
                    <th class="tg-0pky" style="text-align: center;font-weight: bold">TELAH DITERIMA</th>
                </tr>
                </thead>
                <tr>
                    <td class="tg-0pky" style="vertical-align: top">
                        <table border=0 width="100%">
                            <tr>
                                <td style="border: none">EMAIL USAHA : &nbsp; <?= $dokumen->Ket_Email ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">PASSWORD : &nbsp; <?= $dokumen->Pass_Email ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">EMAIL DAN NO TELP MASING MASING PENGURUS : &nbsp;  <?= "$dokumen->Email_Pengurus / $dokumen->No_Telp" ?> </td>
                            </tr>
                            <tr>
                                <td style="border: none">LUASAN TEMPAT USAHA : &nbsp; <?= $dokumen->Ket_Luas ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">BIDANG USAHA : &nbsp; <?= $dokumen->Ket_Bidang_Usaha ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">BIDANG USAHA UTAMA : &nbsp; <?= $dokumen->Ket_Bidang_Usaha ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">
                                    <?php if ($dokumen->st_project == 1) { ?>
                                        MENGETAHUI <B>POPJASA</B> DARI : &nbsp;<?= $dokumen->Ket_Informasi ?>
                                    <?php } else { ?>
                                        MENGETAHUI <B>JASAMURA</B> DARI : &nbsp;<?= $dokumen->Ket_Informasi ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: none">&nbsp;</td>
                            </tr>
                            <tr><td  style="border: none">KETERANGAN :</td></tr>
                        </table>
                    </td>
                    <td class="tg-0pky" style="vertical-align: top">
                        <table border=0 width="100%">
                            <tr>
                                <td style="border: none">AKTA NOTARIS : &nbsp; <?= $dokumen->Izin_Akta_Notaris ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">PENGESAHAN : &nbsp; <?= $dokumen->Bool_Izin_Pengesahan ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">NPWP PRIBADI : &nbsp; <?= $dokumen->Bool_NPWP ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">NPWP (dikirim) PERUSAHAAN : &nbsp; <?= $dokumen->Bool_NPWP_Perusahaan ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">SKT NPWP (dikirim) : &nbsp; <?= $dokumen->Bool_SKT_Perusahaan ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">SIUP &amp; TDP (NIB) : &nbsp; <?= $dokumen->Bool_SIUP_TDP ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">REGISTRASI : &nbsp; <?= $dokumen->Bool_Registrasi ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">PKP : &nbsp; <?= $dokumen->Bool_PKP ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">S.K. DOMISILI : &nbsp; <?= $dokumen->Bool_SK_Domisili ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">LAIN LAIN : <?= $dokumen->Izin_Lain ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">KETERANGAN :</td>
                            </tr>
                        </table>
                    </td>
                    <td class="tg-0pky" style="vertical-align: top">
                        <table border=0 width="100%">
                            <tr>
                                <td style="border: none">NAMA PERUSAHAAN : &nbsp; <?= $dokumen->nm_perusahaan ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">MODAL DASAR : &nbsp; Rp. <?= number_format($dokumen->modal) ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">MODAL DISETOR : &nbsp; Rp. <?= number_format($dokumen->modal_disetor) ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">PRESENTASE PEMBAGIAN SAHAM : &nbsp; <?= $dokumen->presentase_shm ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">HARGA TIAP SAHAM : &nbsp; <?= $dokumen->hrg_saham ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">NO TELP : &nbsp; <?= $dokumen->No_Telp ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">NO FAX : &nbsp; <?= $dokumen->No_Fax ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">KEL : &nbsp; <?= $dokumen->kelurahan ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">KOTA / KABUPATEN : &nbsp; <?= "$dokumen->kota / $dokumen->kabupaten" ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">DENGAN / TANPA PERSETUJUAN KOMANDITER</td>
                            </tr>
                            <tr>
                                <td style="border: none">DIKUASAKAN / TIDAK DIKUASAKAN</td>
                            </tr>
                            <tr>
                                <td style="border: none">AMBIL SURAT KUASA TGL :</td>
                            </tr>
                            <tr>
                                <td style="border: none">TTD MINUTA TGL :</td>
                            </tr>
                            <tr>
                                <td style="border: none; text-align: right">TANDA TANGAN</td>
                            </tr>
                            <tr>
                                <td style="border: none"></td>
                            </tr>
                            <tr>
                                <td style="border: none"></td>
                            </tr>
                            <tr>
                                <td style="border: none"></td>
                            </tr>
                            <tr>
                                <td style="border: none; text-align: right">(<?= $dokumen->penerima ?>)</td>
                            </tr>
                            <tr>
                                <td style="border: none">KETERANGAN :</td>
                            </tr>
                        </table>
                    </td>
                    <td class="tg-0pky" style="vertical-align: top">
                        <table border="0" width="100%">
                            <tr>
                                <td style="border: none">NO KTP : &nbsp; <?= $dokumen->bool_ktp ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">NAMA KTP : &nbsp; <?= $dokumen->Ket_Email ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">NPWP PRIBADI (SEMUA PENGURUS) : &nbsp; <?= $dokumen->bool_npwp ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">SERTIFIKAT T. USAHA : &nbsp; <?= $dokumen->Ket_Email ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">IMB (IJIN MENDIRIKAN BANGUNAN) : &nbsp; <?= $dokumen->bool_imb ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">STEMPEL : &nbsp; <?= $dokumen->bool_stempel ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">MATERAI : &nbsp; <?= $dokumen->jml_materai ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">S.K. DOMISILI : &nbsp; <?= $dokumen->bool_sk_domisili ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">SURAT SEWA : &nbsp;<?= $dokumen->bool_surat_sewa ?></td>
                            </tr>
                            <tr>
                                <td style="border: none">KETERANGAN :</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <h5>
                <div class="fontBold">Notes:
                    Management <?php if ($dokumen->st_project == 1) { ?> POPJASA <?php } else { ?> JASAMURA <?php } ?>
                    tidak bertanggung jawab jika ada kerusakan atau kehilangan berkas legalitas yang belum diambil
                    di <?php if ($dokumen->st_project == 1) { ?> POPJASA <?php } else { ?> JASAMURA <?php } ?> lebih
                    dari 3 minggu
                </div>
            </h5>
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td style="border: none">
            <table width="100%">
                <tr>
                    <td style="border: none; text-align: center">
                        <h5>Ruko Mezzanine, Blok A No.20, Nginden Jangkungan, Kec Sukolilo, Kota Surabaya, Jawa Timur 60118</h5><br>
                        <h5>Phone : (031) 59173597</h5><br>
                        <h5>Handphone : 0812 3344 2301</h5><br>
                        <h5>Whatsapp : 0812 3344 2301</h5><br>
                        <h5>Facebook : POP JASA</h5><br>
                        <h5>Instagram : @POPJASA</h5><br>
                        <h5>Email : popjasa@gmail.com</h5>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>