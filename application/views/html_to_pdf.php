<?php
/** @var CI_Controller $this */
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
	<title>Laporan Pemesanan Sparepart Bulan Februari - 2020</title>
	<style type="text/css">
		@page {
			margin-left: 2.5%; /* <any of the usual CSS values for margins> */
			margin-right: 2.5%; /* <any of the usual CSS values for margins> */
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
	</style>
</head>
<body>
<table width="100%">
	<thead style="font-weight: bold">
	<tr>
		<th class="fontRight"  style="width: 10%"></th>
		<th class="fontCenter" style="width: 80%;font-size: 18px">
			SIMASDA <br>
			Laporan Pemesanan Sparepart<br>
			Periode : Februari - 2020
		</th>
		<th class="fontRight"  style="width: 10%">
			<img width="75px" height="75px" src="<?php echo base_url('assets/app-assets/vendors/logo/popjasa.png');?>" alt="logo">
		</th>
	</tr>
	</thead>
</table>
<table style="width: 100%">
	<thead class="fontCenter">
		<tr class="tb-body">
			<th rowspan="2" style="width: 5%">No.</th>
			<th rowspan="2" style="width: 20%">No. Pemesanan</th>
			<th colspan="4" style="width: 75%">Nama Supplier</th>
		</tr>
		<tr class="tb-body">
			<th  style="width: 25%">Nama Sparepart</th>
			<th  style="width: 10%">Qty</th>
			<th  style="width: 20%">Harga Beli</th>
			<th  style="width: 20%">Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php for ($x = 0; $x <= 10; $x++) {?>
			<tr class="tb-body">
				<td valign="top" class="fontCenter" rowspan="3"><br>1.</td>
				<td valign="top" class="fontCenter" rowspan="3"><br>PRODR20200225001<br>25 Februari 2020</td>
				<td colspan="4">tes</td>
			</tr>
			<tr class="tb-body">
				<td class="fontLeft">Oli Top 1</td>
				<td class="fontCenter">10 PCS</td>
				<td class="fontRight">Rp. 5.000</td>
				<td class="fontRight">Rp. 50.000</td>
			</tr>
			<tr class="tb-body">
				<td class="fontRight" colspan="3"><b>Total Harga</b></td>
				<td class="fontRight"><b>Rp. 50.000</b></td>
			</tr>
		<?php }?>
	</tbody>
</table>

<table width="100%">
	<thead>
	<tr class="tb-body">
		<th class="fontRight" style="width: 80%">Total Harga Pemesanan Periode Februari - 2020</th>
		<th class="fontRight" style="width: 20%">Rp. 50.000</th>
	</tr>
	</thead>
</table>

</body>
</html>
