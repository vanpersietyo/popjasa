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
<h2 style="margin-top:0px">Trs_fix_asset Read</h2>
<table class="table">
    <tr>
        <td>Fa Id</td>
        <td><?php echo $fa_id; ?></td>
    </tr>
    <tr>
        <td>Jenis</td>
        <td><?php echo $jenis; ?></td>
    </tr>
    <tr>
        <td>Date Beli</td>
        <td><?php echo $date_beli; ?></td>
    </tr>
    <tr>
        <td>Estimasi</td>
        <td><?php echo $estimasi; ?></td>
    </tr>
    <tr>
        <td>Date Penyusutan</td>
        <td><?php echo $date_penyusutan; ?></td>
    </tr>
    <tr>
        <td>Hrg Beli</td>
        <td><?php echo $hrg_beli; ?></td>
    </tr>
    <tr>
        <td>Penyusutan Thn</td>
        <td><?php echo $penyusutan_thn; ?></td>
    </tr>
    <tr>
        <td>Penyusutan Bln</td>
        <td><?php echo $penyusutan_bln; ?></td>
    </tr>
    <tr>
        <td>Pembulatan</td>
        <td><?php echo $pembulatan; ?></td>
    </tr>
    <tr>
        <td>Added By</td>
        <td><?php echo $added_by; ?></td>
    </tr>
    <tr>
        <td>Entry Time</td>
        <td><?php echo $entry_time; ?></td>
    </tr>
    <tr>
        <td>Changed By</td>
        <td><?php echo $changed_by; ?></td>
    </tr>
    <tr>
        <td>Last Modified</td>
        <td><?php echo $last_modified; ?></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="<?php echo site_url('trs_asset') ?>" class="btn btn-default">Cancel</a></td>
    </tr>
</table>
</body>
</html>