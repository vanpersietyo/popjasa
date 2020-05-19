<html xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
    <title>Formulir Kepuasan Pelanggan</title>
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

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: center;
        }

        .tg .tg-dvpl {
            border-color: inherit;
            text-align: right;
            vertical-align: top;
        }

    </style>
</head>
<body>
<table style="width: 100%">
    <tr>
        <td style="border: 0" colspan="5">
            <table width="100%">
                <thead style="font-weight: bold">
                <tr>
                    <?php if ($dokumen->st_project == 1) { ?>
                        <th class="fontCenter" style="width: 10%">
                            <h2 align="left">FORM KEPUASAN PELANGGAN</h2>
                        </th>
                        <th style="width: 90%">
                            <img width="100px" height="100px"
                                 src="<?php echo base_url('assets/app-assets/vendors/logo/popjasa.png'); ?>" alt="logo">
                        </th>
                    <?php } else { ?>
                        <th style="width: 90%; vertical-align: middle">
                            <h1 align="left">FORM KEPUASAN PELANGGAN</h1>
                        </th>
                        <th style="width: 10%">
                            <img width="20%"
                                 src="<?php echo base_url('assets/app-assets/vendors/logo/jasamurah.jpg'); ?>"
                                 alt="logo">
                        </th>
                    <?php } ?>
                </tr>
                </thead>
            </table>
        </td>
    </tr>
    <br/>
    <tr>
        <td colspan="5"><p><h5>Terima kasih atas kepercayaan anda menggunakan jasa kami.</h5></p></td>
    </tr>
    <tr>
        <td colspan="5"><h5>Sebagai bahan masukan bagi kami, dengan demikian kami bisa menjadi lebih baik lagi.</h5>
        </td>
    </tr>
    <br/>
    <tr>
        <td style="width:50px;">
            <h5>Nama</h5>
        </td>
        <td>
            <h5>:</h5>
        </td>
        <td colspan="3"><?= $dokumen->nama_pelanggan; ?></td>
    </tr>
    <tr>
        <td>
            <h5>Nama Perusahaan</h5>
        </td>
        <td>
            <h5>:</h5>
        </td>
        <td colspan="3"><?= $dokumen->nama_perusahaan; ?></td>
    </tr>
    <tr>
        <td>
            <h5>Nomer HP</h5>
        </td>
        <td>
            <h5>:</h5>
        </td>
        <td colspan="3"><?= $dokumen->no_telp; ?></td>
    </tr>
    <br/>
    <tr>
        <td colspan="5">
            <h5>Anda tahu perusahaan kami dari mana :</h5>
        </td>
    </tr>
    <br/>
    <tr>
        <td colspan="5">
            <table width="100%">
                <tr>
                    <td>
                        <input type="checkbox" name="teman" id="teman"
                               value="yes" checked=<?php echo($dokumen->info_order == '0' ? 'checked' : ''); ?>><label>Teman</label>
                    </td>
                    <td>
                        <input type="checkbox" name="facebook" id="facebook"
                               value="yes" checked=<?php echo($dokumen->info_order == '1' ? 'checked' : ''); ?>><label>Facebook</label>
                    </td>
                    <td colspan="3">
                        <input type="checkbox" name="website" id="website"
                               value="yes" checked=<?php echo($dokumen->info_order == '2' ? 'checked' : ''); ?>><label>Website</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <br/>
    <tr>
        <td colspan="5">
            <h5>Seberapa puas anda dengan layanan kami :</h5>
        </td>
    </tr>
    <tr>
        <td colspan="5">
            <table width="100%">
                <tr>
                    <td>
                        <input type="checkbox" name="sangat_kurang" id="sangat_kurang"
                               value="yes" checked=<?php echo($dokumen->info_kepuasan == '0' ? 'checked' : ''); ?>><label>Sangat
                            Kurang</label>
                    </td>
                    <td>
                        <input type="checkbox" name="kurang" id="kurang"
                               value="yes" checked=<?php echo($dokumen->info_kepuasan == '1' ? 'checked' : ''); ?>><label>Kurang</label>
                    </td>
                    <td>
                        <input type="checkbox" name="cukup" id="cukup"
                               value="yes" checked=<?php echo($dokumen->info_kepuasan == '2' ? 'checked' : ''); ?>><label>Cukup</label>
                    </td>
                    <td>
                        <input type="checkbox" name="baik" id="baik"
                               value="yes" checked=<?php echo($dokumen->info_kepuasan == '3' ? 'checked' : ''); ?>><label>Baik</label>
                    </td>
                    <td>
                        <input type="checkbox" name="baik_sekali" id="baik_sekali"
                               value="yes" checked=<?php echo($dokumen->info_kepuasan == '4' ? 'checked' : ''); ?>><label>Baik
                            Sekali</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <br/>
    <tr>
        <td colspan="5"><label>Bolehkah Foto Anda kami posting di media sosial kami dan ngetag akun anda :</label></td>
    </tr>
    <tr>
        <td colspan="5">
            <table width="100%">
                <tr>
                    <td style="width: 70%"><input type="checkbox" name="boleh" id="boleh"
                                                  value="yes" checked=<?php echo($dokumen->status_photo == '0' ? 'checked' : ''); ?>>Boleh
                        <table width="100%">
                            <tr>
                                <td>Tgl : <?= $dokumen->status_photo_tgl; ?></td>
                            </tr>
                            <tr>
                                <td>Ttd : <?= $dokumen->nama_pelanggan; ?></td>
                            </tr>
                            <tr>
                                <td>Nama : <?= $dokumen->nama_pelanggan; ?></td>
                            </tr>
                            <tr>
                                <td>Facebook : <?= $dokumen->status_fb; ?></td>
                            </tr>
                            <tr>
                                <td>Instagram : <?= $dokumen->status_ig; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td style="vertical-align: top">
                        <input type="checkbox" name="boleh" id="boleh"
                               value="yes" checked=<?php echo($dokumen->$status_photo == '1' ? 'checked' : ''); ?>><label>Tidak</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <br/>
    <tr>
        <td colspan="5">Saran yang anda inginkan untuk kami</td>
    </tr>
    <tr>
        <td colspan="5">(Pelayanan dan fasilitas tambahan yang diinginkan)</td>
    </tr>
    <tr><td colspan="5"><?= $dokumen->info_order2 ?></td></tr>
    <br><br><br><br><br><br><br><br>
    <tr>
        <td colspan="5"><label>Referensi</label></td>
    </tr>
    <tr>
        <td colspan="5">(Teman/Kerabat/Rekan, bisa lebih dari satu orang)</td>
    </tr>
    <tr>
        <td colspan="5">Nama : <?= $dokumen->referensi_nama; ?></td>
    </tr>
    <tr>
        <td colspan="5">No Hp : <?= $dokumen->referensi_no_telp; ?></td>
    </tr>
    <tr>
        <td colspan="5">Ket : <?= $dokumen->keterangan; ?></td>
    </tr>
    <br><br><br>
    <tr>
        <td style="border: none" colspan="5">
            <table width="100%">
                <tr>
                    <td style="border: none; text-align: center" colspan="6">
                        <h5 style="margin:0">Ruko Mezzanine, Blok A No.20, Nginden Jangkungan, Kec Sukolilo, Kota
                            Surabaya, Jawa Timur 60118</h5>
                    </td>
                </tr>
                <br/>
                <tr>
                    <td><h6>Phone : (031) 59173597</h6><br></td>
                    <td><h6>Hp : 0812 3344 2301</h6></td>
                    <td><h6>Wa : 0812 3344 2301</h6></td>
                    <td><h6>FB : POP JASA</h6></td>
                    <td><h6>Ig : @POPJASA</h6></td>
                    <td><h6>Email : popjasa@gmail.com</h6></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>