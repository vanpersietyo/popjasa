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
<h2 style="margin-top:0px">Trs_fix_asset_hdr Read</h2>
<table class="table">
    <tr>
        <td>Tgl</td>
        <td><?php echo $Tgl; ?></td>
    </tr>
    <tr>
        <td>TrManualRef</td>
        <td><?php echo $TrManualRef; ?></td>
    </tr>
    <tr>
        <td>Created At</td>
        <td><?php echo $Created_At; ?></td>
    </tr>
    <tr>
        <td>Modified By</td>
        <td><?php echo $Modified_By; ?></td>
    </tr>
    <tr>
        <td>EntryTime</td>
        <td><?php echo $EntryTime; ?></td>
    </tr>
    <tr>
        <td>Last Modified</td>
        <td><?php echo $Last_Modified; ?></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="<?php echo site_url('trs_fix_asset_hdr') ?>" class="btn btn-default">Cancel</a></td>
    </tr>
</table>
</body>
</html>