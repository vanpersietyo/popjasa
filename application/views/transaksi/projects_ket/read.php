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
        <h2 style="margin-top:0px">Trs_projects_Ket Read</h2>
        <table class="table">
	    <tr><td>Ket Email</td><td><?php echo $Ket_Email; ?></td></tr>
	    <tr><td>Email Pengurus</td><td><?php echo $Email_Pengurus; ?></td></tr>
	    <tr><td>No Telp</td><td><?php echo $No_Telp; ?></td></tr>
	    <tr><td>Ket Luas</td><td><?php echo $Ket_Luas; ?></td></tr>
	    <tr><td>Ket Bidang Usaha</td><td><?php echo $Ket_Bidang_Usaha; ?></td></tr>
	    <tr><td>Ket Bidang Usaha Utama</td><td><?php echo $Ket_Bidang_Usaha_Utama; ?></td></tr>
	    <tr><td>Ket Informasi</td><td><?php echo $Ket_Informasi; ?></td></tr>
	    <tr><td>ID Hdr Project</td><td><?php echo $ID_Hdr_Project; ?></td></tr>
	    <tr><td>ID Project</td><td><?php echo $ID_Project; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $Created_By; ?></td></tr>
	    <tr><td>EntryTime</td><td><?php echo $EntryTime; ?></td></tr>
	    <tr><td>Modified By</td><td><?php echo $Modified_By; ?></td></tr>
	    <tr><td>Last Mofidified</td><td><?php echo $Last_Mofidified; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_projects_ket') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>