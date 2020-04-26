<?php
/** @var string $tgl_awal */
/** @var string $tgl_akhir */
/** @var CI_Controller $this */
/** @var M_v_rekapitulasi_cashflow $cashflow */
/** @var int $saldo_awal */
/** @var string $subtitle */
/** @var string $logo */
/** @var string $nm_cabang */
/** @var bool $harian */
/** @var bool $cutoff */
$tgl_saldo_awal =  date('d-m-Y', strtotime(Conversion::convert_date($tgl_awal, "Y-m-d") . ' - 1 days'));

?>
<div class="paper landscape">
    <table class="screen">
        <tbody>
        <tr>
            <td class="jarak">
                <table class="full page size-10" style="border: 0 white; width: 100%;">
                    <thead>
                    <tr>
                        <th  class="unboxed collapsing headerFont fontKiri" colspan="3">
                            <span style="font-weight: bold;font-size: 25px"><?php echo strtoupper($title);?></span><br>
                            <span class="judul_2">BANK  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $subtitle;?></span><br>
                            <span class="judul_2">CABANG  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $nm_cabang;?></span><br>
							<span class="judul_2">PERIODE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $harian === 'true' ? $tgl_awal : $tgl_awal.' - '.$tgl_akhir ;?></span><br>
                            <span class="judul_2">TGL CETAK &nbsp;: <?php echo Conversion::get_date('d-m-Y H:i')." (".$this->session->userdata('yangLogin').")";?></span><br>
                            <span class="judul_2">CUT OFF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $cutoff === 'on' ? "YA" : "TIDAK";?></span>
                        </th>
                        <th class="unboxed collapsing fontKanan"><img alt="Logo" src="<?php echo $logo ?>" width="120px" height="100px">  </th>
                    </tr>
                    </thead>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="screen" style="page-break-inside:auto">
        <tbody>
        <tr>
            <td class="jarak">
                <table class="full page size-10" style="border: 0 white; width: 100%;">
                    <thead>
                    <tr>
                        <th class="border-dobel size-header" rowspan="2" style="width: 3%"><span class="header">NO</span></th>
                        <th class="border-dobel size-header" rowspan="2" style="width: 3%"><span class="header">TANGGAL</span></th>
                        <th class="border-dobel size-header" rowspan="2" style="width: 6%"><span class="header">TRANSAKSI</span></th>
                        <th class="border-dobel size-header" rowspan="2" style="width: 22%"><span class="header">URAIAN</span></th>
                        <th class="border-dobel size-header" rowspan="2" style="width: 4%"><span class="header">OPERATOR</span></th>
                        <th class="size-header" colspan="2" style="width: 10%"><span class="header">ARUS KAS</span></th>
                        <th class="border-dobel size-header" rowspan="2" style="width: 10%"><span class="header">BANK</span></th>
                        <th class="border-dobel size-header" rowspan="2" style="width: 4%"><span class="header">CABANG</span></th>
                        <th class="border-dobel size-header" rowspan="2" style="width: 7%"><span class="header">SALDO</span></th>
                    </tr>
                    <tr>
                        <th class="border-dobel size-header" style="width: 5%"><span class="header">MASUK</span></th>
                        <th class="border-dobel size-header" style="width: 5%"><span class="header">KELUAR</span></th>
                    </tr>
                    </thead>
                    <tbody class="tb-body">

					<?php
					if($cutoff === 'on'){
                        $no_ = 0;
					}else{
                        $no_ = 1;?>
                        <tr>
                            <td class="size-body" style="text-align: center"> <?php echo $no_; ?></td>
                            <td class="size-body" style="text-align: center"> <?php echo $tgl_saldo_awal;?> </td>
                            <td class="size-body" colspan="7">Saldo Awal</td>
                            <td class="size-body fontKanan" ><?php echo Conversion::numberFormat($saldo_awal);?></td>
                        </tr>
                    <?php } ?>

                    <?php
                    /** @var M_v_rekapitulasi_cashflow $item */
                    $total_saldo_debit	= 0;
                    $total_saldo_kredit	= 0;
                    $saldo				= $saldo_awal;
					if($cashflow){
                        foreach ($cashflow as $key => $item) {
							$nominal_debet 	= 0;
							$nominal_kredit = 0;
                            $no         	= $key+$no_+1;
//
							if($item->TIPE === "DEBET"){
								$nominal_debet 		= $item->NOMINAL;
								$total_saldo_debit 	+= $item->NOMINAL;
								$saldo				+= $item->NOMINAL;
							}else{
								$nominal_kredit 	= $item->NOMINAL;
								$total_saldo_kredit += $item->NOMINAL;
								$saldo				-= $item->NOMINAL;
							}
							$keterangan = $item->KETERANGAN ? " - ".$item->KETERANGAN : "";
                            ?>
                            <tr>
                                <td class="size-body" style="text-align: center"> <?php echo $no; ?></td>
                                <td class="size-body" style="text-align: center"> <?php echo Conversion::convert_date($item->TGL,"d-m-Y");?> </td>
                                <td class="size-body" ><?php echo ucwords(strtolower($item->TRX));?></td>
                                <td class="size-body" ><?php echo $item->URAIAN.$keterangan;?></td>
                                <td class="size-body" ><?php echo $item->ID_OPR?></td>
                                <td class="size-body fontKanan" ><?php echo Conversion::numberFormat($nominal_debet);?></td>
                                <td class="size-body fontKanan" ><?php echo Conversion::numberFormat($nominal_kredit);?></td>
                                <td class="size-body fontCenter" ><?php echo $item->NM_BANK?></td>
                                <td class="size-body fontCenter" ><?php echo strtoupper($item->NM_CABANG);?></td>
                                <td class="size-body fontKanan" ><?php echo Conversion::numberFormat($saldo);?></td>
                            </tr>
                        <?php }
                    }

					?>

                    <tr class="fontCenter border-dobel-top">
                        <td colspan="5" class="border-dobel size-header fontBold fontCenter"><span class="header"> TOTAL <?php if($bayar != "all"){echo "SALDO {$subtitle}";}else{echo " SALDO GLOBAL";}?></span></td>
                        <td class="border-dobel size-header fontBold fontKanan"><span class="header"><?php echo Conversion::numberFormat($total_saldo_debit);?></span></td>
                        <td class="border-dobel size-header fontBold fontKanan"><span class="header"><?php echo Conversion::numberFormat($total_saldo_kredit);?></span></td>
                        <td colspan="2" class="border-dobel fontBold size-header fontKanan"></td>
                        <td class="border-dobel fontBold size-header fontKanan"><span class="header"><?php echo Conversion::numberFormat($saldo);?></span></td>
                    </tr>
                    </tbody>

                </table>
            </td>
        </tr>
        </tbody>
    </table>

	<table style="width: 100%">
		<tfoot>
            <tr>
                <td style="width: 30%">
                    <table class="screen" style="width: 100%">
                        <tfoot class="_foot">
                        <tr>
                            <td colspan="5" style="height: 10px"></td>
                        </tr>
                        <?php
                        if($cutoff === 'off'){?>
                            <tr>
                                <td colspan="3" class="size-header fontBold size-13">SALDO AWAL <?php echo $tgl_saldo_awal;?></td>
                                <td class="size-header fontBold"> : </td>
                                <td class="size-header fontBold fontKanan"><?php echo Conversion::numberFormat($saldo_awal);?></td>
                            </tr>
                        <?php }else{?>
                            <tr>
                                <td colspan="3" class="size-header fontBold size-13">RINCIAN SALDO : </td>
                                <td colspan="2"></td>
                            </tr>
                        <?php } ?>

                        <tr>
                            <td colspan="5"><hr></td>
                        </tr>
                        <?php
                        /** @var M_v_rekapitulasi_cashflow $rks */
                        /** @var M_v_rekapitulasi_cashflow $ringkasan*/
                        $total = $saldo_awal;
                        foreach ($ringkasan as $rks){?>
                            <tr>
                                <td colspan="3" class="size-header fontBold" style="width: 20%; padding-left: 2rem !important;">&nbsp;&nbsp;<?php echo $rks->NM_BANK;?></td>
                                <td class="size-header fontBold" style="width: 1%"> : </td>
                                <td class="size-header fontBold fontKanan" style="width: 5%"><?php echo Conversion::numberFormat($rks->TOTAL);?></td>
                            </tr>
                            <?php
                            $total += $rks->TOTAL;
                        } ?>

                        <tr>
                            <td colspan="5"><hr></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="size-header fontBold">SALDO <?php echo $harian === 'true' ? $tgl_awal : $tgl_awal.' s/d '.$tgl_akhir?></td>
                            <td class="size-header fontBold"> : </td>
                            <td class="size-header fontBold fontKanan"><?php echo Conversion::numberFormat($total_saldo_debit-$total_saldo_kredit);?></td>
                        </tr>
                        <tr>
                            <td colspan="5"><hr></td>
                        </tr>

                        <?php
                        if($cutoff === 'off'){?>
                            <tr>
                                <td colspan="3" class="size-14 fontBold">TOTAL </td>
                                <td class="size-header fontBold"> : </td>
                                <td class="size-header fontBold fontKanan"><?php echo Conversion::numberFormat($total);?></td>
                            </tr>
                        <?php } ?>
                        </tfoot>

                    </table>
                </td>
                <td style="width: 20%"></td>
                <td style="width: 50%; text-align: left">
                    <table class="screen" style="width: 100%">
                        <tfoot class="_foot">
                        <tr>
                            <td colspan="5" style="height: 10px"></td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" class="size-header fontBold size-13">RINCIAN SALDO GLOBAL <?php echo ' s/d '.$tgl_akhir?> : </td>
                            <td ></td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td colspan="3"><hr></td>
                        </tr>
                        <?php
                        /** @var M_v_rekapitulasi_cashflow $rksGlobal */
                        /** @var M_v_rekapitulasi_cashflow $ringkasanGLobal*/
                        $totalGlobal = 0;
                        foreach ($ringkasanGLobal as $rksGlobal){?>
                            <tr>
                                <td colspan="2" style="width: 20%"></td>
                                <td class="size-header fontBold" style="width: 20%; padding-left: 2rem !important;"><?php echo $rksGlobal->NM_BANK;?></td>
                                <td class="size-header fontBold" style="width: 1%"> : </td>
                                <td class="size-header fontBold fontKanan" style="width: 5%"><?php echo Conversion::numberFormat($rksGlobal->TOTAL);?></td>
                            </tr>
                            <?php
                            $totalGlobal += $rksGlobal->TOTAL;
                        } ?>

                        <tr>
                            <td colspan="2"></td>
                            <td colspan="3"><hr></td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td class="size-14 fontBold">TOTAL </td>
                            <td class="size-header fontBold"> : </td>
                            <td class="size-header fontBold fontKanan"><?php echo Conversion::numberFormat($totalGlobal);?></td>
                        </tr>
                        </tfoot>

                    </table>
                </td>
            </tr>
        </tfoot>
    </table>


</div>
