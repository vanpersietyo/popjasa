<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>
<body>
<h2 style="margin-top:0px">Trs_project_logs Read</h2>
<table class="table">
    <tr>
        <td>Status Log</td>
        <td><?php echo $Status_log; ?></td>
    </tr>
    <tr>
        <td>Tgl Log</td>
        <td><?php echo $tgl_log; ?></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td><?php echo $keterangan; ?></td>
    </tr>
    <tr>
        <td>Created By</td>
        <td><?php echo $created_by; ?></td>
    </tr>
    <tr>
        <td>Created At</td>
        <td><?php echo $created_at; ?></td>
    </tr>
    <tr>
        <td>Modified By</td>
        <td><?php echo $modified_by; ?></td>
    </tr>
    <tr>
        <td>Modified At</td>
        <td><?php echo $modified_at; ?></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="<?php echo site_url('project_logs') ?>" class="btn btn-default">Cancel</a></td>
    </tr>
</table>
</body>
</html>