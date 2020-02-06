<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>
<body>
<h2 style="margin-top:0px">Trs_fix_asset <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Fa Id <?php echo form_error('fa_id') ?></label>
        <input type="text" class="form-control" name="fa_id" id="fa_id" placeholder="Fa Id"
               value="<?php echo $fa_id; ?>"/>
    </div>
    <div class="form-group">
        <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis"
               value="<?php echo $jenis; ?>"/>
    </div>
    <div class="form-group">
        <label for="date">Date Beli <?php echo form_error('date_beli') ?></label>
        <input type="text" class="form-control" name="date_beli" id="date_beli" placeholder="Date Beli"
               value="<?php echo $date_beli; ?>"/>
    </div>
    <div class="form-group">
        <label for="smallint">Estimasi <?php echo form_error('estimasi') ?></label>
        <input type="text" class="form-control" name="estimasi" id="estimasi" placeholder="Estimasi"
               value="<?php echo $estimasi; ?>"/>
    </div>
    <div class="form-group">
        <label for="date">Date Penyusutan <?php echo form_error('date_penyusutan') ?></label>
        <input type="text" class="form-control" name="date_penyusutan" id="date_penyusutan"
               placeholder="Date Penyusutan" value="<?php echo $date_penyusutan; ?>"/>
    </div>
    <div class="form-group">
        <label for="double">Hrg Beli <?php echo form_error('hrg_beli') ?></label>
        <input type="text" class="form-control" name="hrg_beli" id="hrg_beli" placeholder="Hrg Beli"
               value="<?php echo $hrg_beli; ?>"/>
    </div>
    <div class="form-group">
        <label for="double">Penyusutan Thn <?php echo form_error('penyusutan_thn') ?></label>
        <input type="text" class="form-control" name="penyusutan_thn" id="penyusutan_thn" placeholder="Penyusutan Thn"
               value="<?php echo $penyusutan_thn; ?>"/>
    </div>
    <div class="form-group">
        <label for="double">Penyusutan Bln <?php echo form_error('penyusutan_bln') ?></label>
        <input type="text" class="form-control" name="penyusutan_bln" id="penyusutan_bln" placeholder="Penyusutan Bln"
               value="<?php echo $penyusutan_bln; ?>"/>
    </div>
    <div class="form-group">
        <label for="double">Pembulatan <?php echo form_error('pembulatan') ?></label>
        <input type="text" class="form-control" name="pembulatan" id="pembulatan" placeholder="Pembulatan"
               value="<?php echo $pembulatan; ?>"/>
    </div>
    <div class="form-group">
        <label for="varchar">Added By <?php echo form_error('added_by') ?></label>
        <input type="text" class="form-control" name="added_by" id="added_by" placeholder="Added By"
               value="<?php echo $added_by; ?>"/>
    </div>
    <div class="form-group">
        <label for="timestamp">Entry Time <?php echo form_error('entry_time') ?></label>
        <input type="text" class="form-control" name="entry_time" id="entry_time" placeholder="Entry Time"
               value="<?php echo $entry_time; ?>"/>
    </div>
    <div class="form-group">
        <label for="varchar">Changed By <?php echo form_error('changed_by') ?></label>
        <input type="text" class="form-control" name="changed_by" id="changed_by" placeholder="Changed By"
               value="<?php echo $changed_by; ?>"/>
    </div>
    <div class="form-group">
        <label for="timestamp">Last Modified <?php echo form_error('last_modified') ?></label>
        <input type="text" class="form-control" name="last_modified" id="last_modified" placeholder="Last Modified"
               value="<?php echo $last_modified; ?>"/>
    </div>
    <input type="hidden" name="trno" value="<?php echo $trno; ?>"/>
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('trs_asset') ?>" class="btn btn-default">Cancel</a>
</form>
</body>
</html>