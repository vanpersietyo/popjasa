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
            font-size: 18px!important;
            font-weight: bold;
            text-align: center;
        }
        td.kop{
            padding: 10px!important;
        }
        .tb-body td, .tb-body th {
            border: solid 1px #000;
            padding: 2px 5px 2px 5px;
        }
        .fontNormal{
            font-weight: normal!important;
            vertical-align: top;
        }
        .fontCenter{
            text-align: center!important;
        }
        .fontRight{
            text-align: right!important;
        }
        .fontLeft{
            text-align: left!important;
        }
        .fontBold{
            font-weight: bold !important;
        }
        .header_section{
            background-color: black;
            color: white;
            font-size: 14px
        }
        .border_bottom{
            border-bottom: 1px solid;
        }
        .size-14 {
            font-size:14px !important;
        }
        .size-16 {
            font-size:16px !important;
        }
        .size-18 {
            font-size:18px !important;
        }
    </style>
</head>
<body>
<table style="width: 100%;border: 1px solid">
    <tr>
        <td style="border: 1px solid; padding: 20px 40px">
            <table width="100%">
                <thead style="font-weight: bold">
                <tr>

                        <?php if ($dokumen->st_project==1) { ?>
                             <th class="fontRight" style="width: 10%">
                                <img width="75px" height="75px" src="<?php echo base_url('assets/app-assets/vendors/logo/popjasa.png');?>" alt="logo">
                             </th>
                            <th class="fontCenter" style="width: 90%">
                                <h2 align="center">BLANKO PERSYARATAN PERIJINAN USAHA <?= $dokumen->kota_customer ?></h2>
                                <h3 align="center"><?= $dokumen->nm_customer ?></h3>
                            </th>
                        <?php } else { ?>
                            <th class="fontLeft" style="width: 25%">
                                <img width="20%" src="<?php echo base_url('assets/app-assets/vendors/logo/jasamurah.png');?>" alt="logo">
                            </th>
                            <th class="fontCenter" style="width: 85%">
                                <h2 align="center">BLANKO PERSYARATAN PERIJINAN USAHA <?= $dokumen->kota_customer ?></h2>
                                <h3 align="center"><?= $dokumen->nm_customer ?></h3>
                            </th>
                        <?php } ?>



                </tr>
                </thead>
            </table>
            <br>
            <br>
            <!--PENDAPATAN-->
            <table width="100%" border="1" class="strong">
                <thead style="font-weight: bold">
                <tr>
                    <th class="" style="width: 30%">KETERANGAN</th>
                    <th class="" style="width: 20%">JENIS IJIN</th>
                    <th class="" style="width: 30%">URAIAN</th>
                    <th class="" style="width: 30%">TELAH DITERIMA</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <!--keterangan-->
                    <td>
                        <br>EMAIL USAHA : <br> <?= $dokumen->Ket_Email ?> <br>
                        <br>PASSWORD : <br>  <?= $dokumen->Pass_Email ?><br>
                        <br>EMAIL DAN NO TELP MASING MASING PENGURUS: <br>  <?= "$dokumen->Email_Pengurus / $dokumen->No_Telp" ?><br>
                        <br>LUASAN TEMPAT USAHA : <br>  <?= $dokumen->Ket_Luas ?><br>
                        <br>BIDANG USAHA : <br>  <?= $dokumen->Ket_Bidang_Usaha ?><br>
                        <br>BIDANG USAHA UTAMA : <br>  <?=$dokumen->Ket_Bidang_Usaha_Utama ?><br>
                        <?php if ($dokumen->st_project==1) { ?>
                            <br> MENGETAHUI <B>POPJASA</B> DARI : <br> <?= $dokumen->Ket_Informasi ?><br>
                        <?php } else { ?>
                            <br> MENGETAHUI <B>JASAMURA</B> DARI : <br> <?= $dokumen->Ket_Informasi ?><br>
                        <?php } ?>


                    </td>
                    <!--izin-->
                    <td>
                        <br>AKTA NOTARIS : <br> <?= $dokumen->Izin_Akta_Notaris ?> <br>
                        <br>PENGESAHAN : <br> <?= $dokumen->Bool_Izin_Pengesahan ?> <br>
                        <br>NPWP PRIBADI : <br> <?= $dokumen->Bool_NPWP ?> <br>
                        <br>NPWP (dikirim) PERUSAHAAN : <br> <?= $dokumen->Bool_NPWP_Perusahaan ?> <br>
                        <br>SKT NPWP (dikirim) : <br> <?= $dokumen->Bool_SKT_Perusahaan ?> <br>
                        <br>SIUP & TDP (NIB) : <br> <?= $dokumen->Bool_SIUP_TDP ?> <br>
                        <br>REGISTRASI : <br> <?= $dokumen->Bool_Registrasi ?> <br>
                        <br>PKP : <br> <?= $dokumen->Bool_PKP ?> <br>
                        <br>S.K. DOMISILI : <br> <?= $dokumen->Bool_SK_Domisili ?> <br>
                        <br>Lain-lain : <br> <?= $dokumen->Izin_Lain ?> <br>
                    </td>

                    <!--URAIAN -->
                    <td>
                        <br>NAMA PERUSAHAAN : <br> <?= $dokumen->nm_perusahaan ?> <br>
                        <br>MODAL DASAR : <br> Rp. <?= number_format($dokumen->modal) ?> <br>
                        <br>MODAL DISETOR : <br> Rp. <?= number_format($dokumen->modal_disetor) ?> <br>
                        <br>PRESENTASE PEMBAGIAN SAHAM : <br> <?= $dokumen->presentase_shm ?> <br>
                        <br>HARGA TIAP SAHAM : <br> <?= $dokumen->hrg_saham ?> <br>
                        <br>NO TELP: <br> <?= $dokumen->No_Telp ?> <br>
                        <br>NO FAX : <br> <?= $dokumen->No_Fax ?> <br>
                        <br>KEL  : <br> <?= $dokumen->kelurahan ?> <br>
                        <br>KOTA/KABUPATEN  : <br> <?= "$dokumen->kota / $dokumen->kabupaten" ?> <br>
                    </td>

                    <!--DITERIMA -->
                    <td>
                        <br>NO KTP  : <br> <?= $dokumen->bool_ktp ?> <br>
                        <br>NAMA KTP : <br> <?= $dokumen->Ket_Email ?> <br>
                        <br>NPWP PRIBADI (SEMUA PENGURUS)  : <br> <?= $dokumen->bool_npwp ?> <br>
                        <br>SERTIFIKAT T. USAHA : <br> <?= $dokumen->Ket_Email ?> <br>
                        <br>IMB (IJIN MENDIRIKAN BANGUNAN) : <br> <?= $dokumen->bool_imb ?> <br>
                        <br>STEMPEL: <br> <?= $dokumen->bool_stempel ?> <br>
                        <br>MATERAI : <br> <?= $dokumen->jml_materai ?> <br>
                        <br>S.K. DOMISILI  : <br> <?= $dokumen->bool_sk_domisili ?> <br>
                        <br>SURAT SEWA  : <br> <?= $dokumen->bool_surat_sewa ?> <br>
                    </td>

                </tr>
                </tbody>
            </table>

        </td>
    </tr>
    <tr>
        <td>
            <h5><div class="fontBold">Notes: Management <?php if ($dokumen->st_project==1) {?> POPJASA <?php } else {?> JASAMURA <?php } ?> tidak bertanggung jawab jika ada kerusakan atau kehilangan berkas legalitas yang belum diambil di <?php if ($dokumen->st_project==1) {?> POPJASA <?php } else {?> JASAMURA <?php } ?> lebih dari 3 minggu</div> </h5>
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td style="border: none">
            <table width="100%">
                <tr>
                    <td style="border: none; text-align: center"><h5>Ruko Mezzanine, Blok A No.20, Nginden Jangkungan, Kec Sukolilo, Kota Surabaya, Jawa Timur 60118</h5>
                </tr>
                <tr>
                    <td style="border: none; text-align: center"> <h5>Phone     : (031) 59173597</h5> </td>
                </tr>
                <tr><td style="border: none; text-align: center"> <h5>Handphone : 0812 3344 2301</h5> </td></tr>
                <tr><td style="border: none; text-align: center"> <h5>Whatsapp  : 0812 3344 2301</h5> </td></tr>
                <tr><td style="border: none; text-align: center"> <h5>Facebook  : POP JASA</h5></td></tr>
                <tr><td style="border: none; text-align: center"> <h5>Instagram : @POPJASA</h5></td></tr>
                <tr><td style="border: none; text-align: center"> <h5>Email     : popjasa@gmail.com</h5></td></tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>