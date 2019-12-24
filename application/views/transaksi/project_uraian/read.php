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
        <h2 style="margin-top:0px">Trs_project_uraian Read</h2>
        <table class="table">
	    <tr><td>Nm Perusahaan</td><td><?php echo $nm_perusahaan; ?></td></tr>
	    <tr><td>Modal</td><td><?php echo $modal; ?></td></tr>
	    <tr><td>Presentase Shm</td><td><?php echo $presentase_shm; ?></td></tr>
	    <tr><td>Hrg Saham</td><td><?php echo $hrg_saham; ?></td></tr>
	    <tr><td>No Telp</td><td><?php echo $No_Telp; ?></td></tr>
	    <tr><td>No Fax</td><td><?php echo $No_Fax; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Kelurahan</td><td><?php echo $kelurahan; ?></td></tr>
	    <tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
	    <tr><td>Izin Persetujuan</td><td><?php echo $izin_persetujuan; ?></td></tr>
	    <tr><td>Signature Commander</td><td><?php echo $signature_commander; ?></td></tr>
	    <tr><td>Penerima</td><td><?php echo $penerima; ?></td></tr>
	    <tr><td>ID Hdr Project</td><td><?php echo $ID_Hdr_Project; ?></td></tr>
	    <tr><td>ID Project</td><td><?php echo $ID_Project; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $Created_by; ?></td></tr>
	    <tr><td>EntryTime</td><td><?php echo $EntryTime; ?></td></tr>
	    <tr><td>Modified By</td><td><?php echo $Modified_by; ?></td></tr>
	    <tr><td>Last Modified</td><td><?php echo $Last_Modified; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_project_uraian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>