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
<h2 style="margin-top:0px">Trs_fix_asset_dtl Read</h2>
<table class="table">
    <tr>
        <td>Fa Id</td>
        <td><?php echo $Fa_Id; ?></td>
    </tr>
    <tr>
        <td>Jenis</td>
        <td><?php echo $Jenis; ?></td>
    </tr>
    <tr>
        <td>Date Beli</td>
        <td><?php echo $Date_beli; ?></td>
    </tr>
    <tr>
        <td>Estimasi</td>
        <td><?php echo $Estimasi; ?></td>
    </tr>
    <tr>
        <td>Date Penyusutan</td>
        <td><?php echo $Date_penyusutan; ?></td>
    </tr>
    <tr>
        <td>Hrg Beli</td>
        <td><?php echo $Hrg_beli; ?></td>
    </tr>
    <tr>
        <td>Penyusutan Thn</td>
        <td><?php echo $Penyusutan_thn; ?></td>
    </tr>
    <tr>
        <td>Penyusutan Bln</td>
        <td><?php echo $Penyusutan_bln; ?></td>
    </tr>
    <tr>
        <td>Pembulatan</td>
        <td><?php echo $Pembulatan; ?></td>
    </tr>
    <tr>
        <td>Added By</td>
        <td><?php echo $Added_by; ?></td>
    </tr>
    <tr>
        <td>Entry Time</td>
        <td><?php echo $Entry_time; ?></td>
    </tr>
    <tr>
        <td>Changed By</td>
        <td><?php echo $Changed_by; ?></td>
    </tr>
    <tr>
        <td>Last Modified</td>
        <td><?php echo $Last_Modified; ?></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="<?php echo site_url('FixAsset_dtl') ?>" class="btn btn-default">Cancel</a></td>
    </tr>
</table>
</body>
</html>