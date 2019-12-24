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
        <h2 style="margin-top:0px">Trs_projects_izin Read</h2>
        <table class="table">
	    <tr><td>Bool Izin Akta Notaris</td><td><?php echo $Bool_Izin_Akta_Notaris; ?></td></tr>
	    <tr><td>Izin Akta Notaris</td><td><?php echo $Izin_Akta_Notaris; ?></td></tr>
	    <tr><td>Bool Izin Pengesahan</td><td><?php echo $Bool_Izin_Pengesahan; ?></td></tr>
	    <tr><td>Izin Pengesahan</td><td><?php echo $Izin_Pengesahan; ?></td></tr>
	    <tr><td>Bool NPWP</td><td><?php echo $Bool_NPWP; ?></td></tr>
	    <tr><td>Bool NPWP Perusahaan</td><td><?php echo $Bool_NPWP_Perusahaan; ?></td></tr>
	    <tr><td>Bool SKT Perusahaan</td><td><?php echo $Bool_SKT_Perusahaan; ?></td></tr>
	    <tr><td>Bool SIUP TDP</td><td><?php echo $Bool_SIUP_TDP; ?></td></tr>
	    <tr><td>Bool Registrasi</td><td><?php echo $Bool_Registrasi; ?></td></tr>
	    <tr><td>Bool PKP</td><td><?php echo $Bool_PKP; ?></td></tr>
	    <tr><td>Bool SK Domisili</td><td><?php echo $Bool_SK_Domisili; ?></td></tr>
	    <tr><td>Izin Lain</td><td><?php echo $Izin_Lain; ?></td></tr>
	    <tr><td>ID Hdr Project</td><td><?php echo $ID_Hdr_Project; ?></td></tr>
	    <tr><td>ID Project</td><td><?php echo $ID_Project; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $Created_by; ?></td></tr>
	    <tr><td>EntryTime</td><td><?php echo $EntryTime; ?></td></tr>
	    <tr><td>Modified By</td><td><?php echo $Modified_by; ?></td></tr>
	    <tr><td>Last Modified</td><td><?php echo $Last_Modified; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_projects_izin') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>