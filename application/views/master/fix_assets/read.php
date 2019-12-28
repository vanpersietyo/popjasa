<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">M_fix_assets Read</h2>
        <table class="table">
	    <tr><td>Barcode</td><td><?php echo $Barcode; ?></td></tr>
	    <tr><td>Nama FA</td><td><?php echo $Nama_FA; ?></td></tr>
	    <tr><td>Divisi</td><td><?php echo $Divisi; ?></td></tr>
	    <tr><td>Lokasi</td><td><?php echo $Lokasi; ?></td></tr>
	    <tr><td>Cabang</td><td><?php echo $Cabang; ?></td></tr>
	    <tr><td>Register Date</td><td><?php echo $Register_Date; ?></td></tr>
	    <tr><td>Date Akuisisi</td><td><?php echo $Date_Akuisisi; ?></td></tr>
	    <tr><td>Date FA</td><td><?php echo $Date_FA; ?></td></tr>
	    <tr><td>Date Disposed</td><td><?php echo $Date_Disposed; ?></td></tr>
	    <tr><td>Penerima</td><td><?php echo $Penerima; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('fix_assets') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>