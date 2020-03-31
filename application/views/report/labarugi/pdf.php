<?php
/** @var CI_Controller 					$this */
/** @var string 						$title */
/** @var string 						$periode */
/** @var int 							$jual_bruto */
/** @var int 							$jual_retur */
/** @var int 							$hpp_bruto */
/** @var int 							$hpp_retur */
/** @var int	                        $biaya_gaji */
/** @var int                            $end_gaji */
/** @var int                            $biaya_opr */
/** @var int                            $end_opr */
/** @var int 							$tot_opr */
/** @var int 							$tot_gaji */
/** @var string 						$logo */

?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
    <title><?php echo isset($title) ? $title.' ('.$periode.')' : "Laporan";?></title>
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
            padding: 15px!important;
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
                    <th class="fontLeft" style="width: 90%">
                        <h3><?=$title;?></h3>
                        <h4><?='tes';?></h4>
                        <table>
                            <tr>
                                <td><h5>Periode</h5></td>
                                <td><h5>: <?=$periode;?></h5></td>
                            </tr>
                            <tr>
                                <td><h5>Tgl Cetak</h5></td>
                                <td><h5>: <?=date('d/m/Y - H:i')?></h5></td>
                            </tr>
                            <tr>
                                <td><h5>Operator</h5></td>
                                <td><h5>: <?='tes';?></h5></td>
                            </tr>
                        </table>
                    </th>
                    <th class="fontRight" style="width: 10%">
                        <img width="75px" height="75px" src="<?php echo $logo;?>" alt="logo">
                    </th>
                </tr>
                </thead>
            </table>
            <br>
            <br>
            <!--PENDAPATAN-->
            <?php
            $pendapatan 		= $jual_bruto-$jual_retur;
            $hpp 				= $hpp_bruto-$hpp_retur;
            $hpp_pct			= $pendapatan !== 0 ? round($hpp / $pendapatan * 100) :0 ;
            $gaji_pct			= $pendapatan !== 0 ? round($tot_gaji / $pendapatan * 100) : 0 ;
            $opr_pct			= $pendapatan !== 0 ? round($tot_opr / $pendapatan * 100) : 0;
            $tot_pengeluaran 	= $tot_gaji + $tot_opr + $hpp;
            $pendapatan_bersih	= $pendapatan - $tot_pengeluaran;
            $pendapatan_bersih_pct	= $pendapatan !== 0 ? round(($pendapatan - $tot_pengeluaran) / $pendapatan * 100): 0;
            ?>
            <table style="width: 100%">
                <thead>
                <tr>
                    <th class="fontLeft header_section" style="width:350px">PENDAPATAN : </th>
                    <th class="fontRight header_section" style="width:20px"></th>
                    <th style="width: 150px"></th>
                    <th style="width: 10px"></th>
                    <th style="width: 150px"></th>
                    <th style="width: 10px"></th>
                    <th style="width: 150px"></th>
                </tr>
                </thead>
                <tbody>
                <!-- PENDAPATAN -->
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">Penjualan Bruto </td>
                    <td ></td>
                    <td class="fontRight">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight"><?=Conversion::numberFormat($jual_bruto);?></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2">Retur Penjualan</td>
                    <td ></td>
                    <td class="fontRight border_bottom">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight border_bottom"><?=Conversion::numberFormat($jual_retur);?></td>
                    <td>(-)</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td class="fontRight fontBold size-16">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight fontBold size-16"><?=Conversion::numberFormat($pendapatan);?></td>
                </tr>

                <!-- HPP -->
                <tr>
                    <th class="fontLeft header_section">HARGA POKOK PENJUALAN : </th>
                    <th class="fontRight header_section"><?=$hpp_pct?>%</th>
                    <th colspan="5"></th>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td>HPP Bruto </td>
                    <td class="fontRight">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight"><?=Conversion::numberFormat($hpp_bruto);?></td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td>HPP Retur</td>
                    <td class="fontRight border_bottom">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight border_bottom"><?=Conversion::numberFormat($hpp_retur);?></td>
                    <td colspan="3">(-)</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="fontRight fontBold">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight fontBold"><?=Conversion::numberFormat($hpp);?></td>
                    <td colspan="2"></td>
                </tr>

                <!-- GAJI -->
                <tr>
                    <th class="fontLeft header_section">BIAYA GAJI : </th>
                    <th class="fontRight header_section"><?=$gaji_pct;?>%</th>
                    <th colspan="5"></th>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <?php if($biaya_gaji){
                    foreach ($biaya_gaji as $gaji) {
                        if($gaji->KD_REKENING !== $end_gaji->KD_REKENING){?>
                            <tr>
                                <td><?=$gaji->NM_REKENING?></td>
                                <td class="fontRight">&nbsp;&nbsp;Rp.</td>
                                <td class="fontRight"><?=Conversion::numberFormat($gaji->JUM_BIAYA);?></td>
                                <td colspan="4"></td>
                            </tr>
                        <?php }else{ ?>
                            <tr>
                                <td><?=$gaji->NM_REKENING?></td>
                                <td class="fontRight border_bottom">&nbsp;&nbsp;Rp.</td>
                                <td class="fontRight border_bottom"><?=Conversion::numberFormat($gaji->JUM_BIAYA);?></td>
                                <td colspan="3">(+)</td>
                                <td></td>
                            </tr>
                        <?php } ?>

                    <?php }
                }?>
                <tr>
                    <td colspan="3"></td>
                    <td class="fontRight fontBold">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight fontBold"><?=Conversion::numberFormat($tot_gaji);?></td>
                    <td colspan="2"></td>
                </tr>

                <!-- OPERASIONAL -->
                <tr>
                    <th class="fontLeft header_section">BIAYA OPERASIONAL : </th>
                    <th class="fontRight header_section"><?=$opr_pct;?>%</th>
                    <th colspan="5"></th>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <?php if($biaya_opr){
                    foreach ($biaya_opr as $opr) {
                        if($opr->KD_REKENING !== $end_opr->KD_REKENING){?>
                            <tr>
                                <td><?=$opr->NM_REKENING?></td>
                                <td class="fontRight">&nbsp;&nbsp;Rp.</td>
                                <td class="fontRight"><?=Conversion::numberFormat($opr->JUM_BIAYA);?></td>
                                <td colspan="4"></td>
                            </tr>
                        <?php }else{ ?>
                            <tr>
                                <td><?=$opr->NM_REKENING?></td>
                                <td class="fontRight border_bottom">&nbsp;&nbsp;Rp.</td>
                                <td class="fontRight border_bottom"><?=Conversion::numberFormat($opr->JUM_BIAYA);?></td>
                                <td colspan="3">(+)</td>
                                <td></td>
                            </tr>
                        <?php } ?>

                    <?php }
                }?>
                <tr>
                    <td colspan="3"></td>
                    <td class="fontRight fontBold">&nbsp;&nbsp;Rp.</td>
                    <td class="fontRight fontBold"><?=Conversion::numberFormat($tot_opr);?></td>
                    <td colspan="2"></td>
                </tr>

                <!-- TOTAL PENGELUARAN-->
                <tr>
                    <th colspan="5"></th>
                    <th style="width: 10px" class="border_bottom fontBold fontRight size-16">&nbsp;&nbsp;Rp.</th>
                    <th style="width: 150px" class="border_bottom fontBold fontRight size-16"><?=Conversion::numberFormat($tot_pengeluaran);?></th>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                <!-- PENDAPATAN BERSIH -->
                <tr>
                    <th class="fontLeft header_section">PENDAPATAN / LABA BERSIH </th>
                    <th class="fontRight header_section"><?=$pendapatan_bersih_pct?>%</th>
                    <th colspan="3"></th>
                    <th class="fontBold size-18">&nbsp;&nbsp;Rp.</th>
                    <th class="fontBold fontRight size-18"><?=Conversion::numberFormat($pendapatan_bersih)?></th>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
