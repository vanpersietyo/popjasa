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
        <h2 style="margin-top:0px">Trs_project_terima Read</h2>
        <table class="table">
	    <tr><td>Bool Ktp Fotokopi</td><td><?php echo $bool_ktp_fotokopi; ?></td></tr>
	    <tr><td>Bool Ktp Asli</td><td><?php echo $bool_ktp_asli; ?></td></tr>
	    <tr><td>Bool Npwp Fotokopi</td><td><?php echo $bool_npwp_fotokopi; ?></td></tr>
	    <tr><td>Bool Npwp Asli</td><td><?php echo $bool_npwp_asli; ?></td></tr>
	    <tr><td>Bool Sertifikat Fotokopi</td><td><?php echo $bool_sertifikat_fotokopi; ?></td></tr>
	    <tr><td>Bool Sertifikat Asli</td><td><?php echo $bool_sertifikat_asli; ?></td></tr>
	    <tr><td>Bool Imb Fotokopi</td><td><?php echo $bool_imb_fotokopi; ?></td></tr>
	    <tr><td>Bool Imb Asli</td><td><?php echo $bool_imb_asli; ?></td></tr>
	    <tr><td>Bool Stempel</td><td><?php echo $bool_stempel; ?></td></tr>
	    <tr><td>Jml Materai</td><td><?php echo $jml_materai; ?></td></tr>
	    <tr><td>Bool Sk Domisili Fotokopi</td><td><?php echo $bool_sk_domisili_fotokopi; ?></td></tr>
	    <tr><td>Bool Sk Domisili Asli</td><td><?php echo $bool_sk_domisili_asli; ?></td></tr>
	    <tr><td>Bool Surat Sewa Fotokopi</td><td><?php echo $bool_surat_sewa_fotokopi; ?></td></tr>
	    <tr><td>Bool Surat Sewa Asli</td><td><?php echo $bool_surat_sewa_asli; ?></td></tr>
	    <tr><td>ID Hdr Project</td><td><?php echo $ID_Hdr_Project; ?></td></tr>
	    <tr><td>ID Project</td><td><?php echo $ID_Project; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $Created_by; ?></td></tr>
	    <tr><td>EntryTime</td><td><?php echo $EntryTime; ?></td></tr>
	    <tr><td>Modified By</td><td><?php echo $Modified_by; ?></td></tr>
	    <tr><td>Last Modified</td><td><?php echo $Last_Modified; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('project_terima') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>