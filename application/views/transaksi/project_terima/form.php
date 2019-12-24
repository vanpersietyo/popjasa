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
        <h2 style="margin-top:0px">Trs_project_terima <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="enum">Bool Ktp Fotokopi <?php echo form_error('bool_ktp_fotokopi') ?></label>
            <input type="text" class="form-control" name="bool_ktp_fotokopi" id="bool_ktp_fotokopi" placeholder="Bool Ktp Fotokopi" value="<?php echo $bool_ktp_fotokopi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Ktp Asli <?php echo form_error('bool_ktp_asli') ?></label>
            <input type="text" class="form-control" name="bool_ktp_asli" id="bool_ktp_asli" placeholder="Bool Ktp Asli" value="<?php echo $bool_ktp_asli; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Npwp Fotokopi <?php echo form_error('bool_npwp_fotokopi') ?></label>
            <input type="text" class="form-control" name="bool_npwp_fotokopi" id="bool_npwp_fotokopi" placeholder="Bool Npwp Fotokopi" value="<?php echo $bool_npwp_fotokopi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Npwp Asli <?php echo form_error('bool_npwp_asli') ?></label>
            <input type="text" class="form-control" name="bool_npwp_asli" id="bool_npwp_asli" placeholder="Bool Npwp Asli" value="<?php echo $bool_npwp_asli; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Sertifikat Fotokopi <?php echo form_error('bool_sertifikat_fotokopi') ?></label>
            <input type="text" class="form-control" name="bool_sertifikat_fotokopi" id="bool_sertifikat_fotokopi" placeholder="Bool Sertifikat Fotokopi" value="<?php echo $bool_sertifikat_fotokopi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Sertifikat Asli <?php echo form_error('bool_sertifikat_asli') ?></label>
            <input type="text" class="form-control" name="bool_sertifikat_asli" id="bool_sertifikat_asli" placeholder="Bool Sertifikat Asli" value="<?php echo $bool_sertifikat_asli; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Imb Fotokopi <?php echo form_error('bool_imb_fotokopi') ?></label>
            <input type="text" class="form-control" name="bool_imb_fotokopi" id="bool_imb_fotokopi" placeholder="Bool Imb Fotokopi" value="<?php echo $bool_imb_fotokopi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Imb Asli <?php echo form_error('bool_imb_asli') ?></label>
            <input type="text" class="form-control" name="bool_imb_asli" id="bool_imb_asli" placeholder="Bool Imb Asli" value="<?php echo $bool_imb_asli; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Stempel <?php echo form_error('bool_stempel') ?></label>
            <input type="text" class="form-control" name="bool_stempel" id="bool_stempel" placeholder="Bool Stempel" value="<?php echo $bool_stempel; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jml Materai <?php echo form_error('jml_materai') ?></label>
            <input type="text" class="form-control" name="jml_materai" id="jml_materai" placeholder="Jml Materai" value="<?php echo $jml_materai; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Sk Domisili Fotokopi <?php echo form_error('bool_sk_domisili_fotokopi') ?></label>
            <input type="text" class="form-control" name="bool_sk_domisili_fotokopi" id="bool_sk_domisili_fotokopi" placeholder="Bool Sk Domisili Fotokopi" value="<?php echo $bool_sk_domisili_fotokopi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Sk Domisili Asli <?php echo form_error('bool_sk_domisili_asli') ?></label>
            <input type="text" class="form-control" name="bool_sk_domisili_asli" id="bool_sk_domisili_asli" placeholder="Bool Sk Domisili Asli" value="<?php echo $bool_sk_domisili_asli; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Surat Sewa Fotokopi <?php echo form_error('bool_surat_sewa_fotokopi') ?></label>
            <input type="text" class="form-control" name="bool_surat_sewa_fotokopi" id="bool_surat_sewa_fotokopi" placeholder="Bool Surat Sewa Fotokopi" value="<?php echo $bool_surat_sewa_fotokopi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Bool Surat Sewa Asli <?php echo form_error('bool_surat_sewa_asli') ?></label>
            <input type="text" class="form-control" name="bool_surat_sewa_asli" id="bool_surat_sewa_asli" placeholder="Bool Surat Sewa Asli" value="<?php echo $bool_surat_sewa_asli; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ID Hdr Project <?php echo form_error('ID_Hdr_Project') ?></label>
            <input type="text" class="form-control" name="ID_Hdr_Project" id="ID_Hdr_Project" placeholder="ID Hdr Project" value="<?php echo $ID_Hdr_Project; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ID Project <?php echo form_error('ID_Project') ?></label>
            <input type="text" class="form-control" name="ID_Project" id="ID_Project" placeholder="ID Project" value="<?php echo $ID_Project; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Created By <?php echo form_error('Created_by') ?></label>
            <input type="text" class="form-control" name="Created_by" id="Created_by" placeholder="Created By" value="<?php echo $Created_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">EntryTime <?php echo form_error('EntryTime') ?></label>
            <input type="text" class="form-control" name="EntryTime" id="EntryTime" placeholder="EntryTime" value="<?php echo $EntryTime; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Modified By <?php echo form_error('Modified_by') ?></label>
            <input type="text" class="form-control" name="Modified_by" id="Modified_by" placeholder="Modified By" value="<?php echo $Modified_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Last Modified <?php echo form_error('Last_Modified') ?></label>
            <input type="text" class="form-control" name="Last_Modified" id="Last_Modified" placeholder="Last Modified" value="<?php echo $Last_Modified; ?>" />
        </div>
	    <input type="hidden" name="ID_Project_terima" value="<?php echo $ID_Project_terima; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('project_terima') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>