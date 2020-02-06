<?php
$this->load->view('template/head');
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"></h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><p class="danger"></p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h2 style="margin-top:0px"><?php echo $button ?> Fix Asset</h2>
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
                                <input type="text" class="form-control" name="date_beli" id="datepicker"
                                       placeholder="Date Beli"
                                       value="<?php echo $date_beli; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="smallint">Estimasi <?php echo form_error('estimasi') ?></label>
                                <input type="text" class="form-control" name="estimasi" id="estimasi"
                                       placeholder="Estimasi"
                                       value="<?php echo $estimasi; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="date">Date Penyusutan <?php echo form_error('date_penyusutan') ?></label>
                                <input type="text" class="form-control" name="date_penyusutan" id="date_penyusutan"
                                       placeholder="Date Penyusutan" value="<?php echo $date_penyusutan; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="double">Hrg Beli <?php echo form_error('hrg_beli') ?></label>
                                <input type="text" class="form-control" name="hrg_beli" id="hrg_beli"
                                       placeholder="Hrg Beli"
                                       value="<?php echo $hrg_beli; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="double">Penyusutan Thn <?php echo form_error('penyusutan_thn') ?></label>
                                <input type="text" class="form-control" name="penyusutan_thn" id="penyusutan_thn"
                                       placeholder="Penyusutan Thn"
                                       value="<?php echo $penyusutan_thn; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="double">Penyusutan Bln <?php echo form_error('penyusutan_bln') ?></label>
                                <input type="text" class="form-control" name="penyusutan_bln" id="penyusutan_bln"
                                       placeholder="Penyusutan Bln"
                                       value="<?php echo $penyusutan_bln; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="double">Pembulatan <?php echo form_error('pembulatan') ?></label>
                                <input type="text" class="form-control" name="pembulatan" id="pembulatan"
                                       placeholder="Pembulatan"
                                       value="<?php echo $pembulatan; ?>"/>
                            </div>
                            <input type="hidden" name="trno" value="<?php echo $trno; ?>"/>
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('trs_asset') ?>" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
$this->load->view('template/foot');
?>


<script type="text/javascript">
    $(document).ready(function () {
        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });
    });
</script>



