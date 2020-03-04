<?php
$this->load->view('template/head');
?>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Fix assets</h3>
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
                        <h2 style="margin-top:0px">Fix Assets <?php echo $button ?></h2>
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="varchar">Barcode <?php echo form_error('Barcode') ?></label>
                                <input type="text" class="form-control" name="Barcode" id="Barcode"
                                       placeholder="Barcode" value="<?php echo $Barcode; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Nama FA <?php echo form_error('Nama_FA') ?></label>
                                <input type="text" class="form-control" name="Nama_FA" id="Nama_FA"
                                       placeholder="Nama FA" value="<?php echo $Nama_FA; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Divisi <?php echo form_error('Divisi') ?></label>
                                <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi"
                                       value="<?php echo $Divisi; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Lokasi <?php echo form_error('Lokasi') ?></label>
                                <input type="text" class="form-control" name="Lokasi" id="Lokasi" placeholder="Lokasi"
                                       value="<?php echo $Lokasi; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="datetime">Tanggal Pembelian <?php echo form_error('Date_Akuisisi') ?></label>
                                <input type="text" class="form-control datepicker" name="Date_Akuisisi" id="Date_Akuisisi"
                                       placeholder="Date Akuisisi" value="<?php echo $Date_Akuisisi; ?>"/>
                            </div>
                            <input type="hidden" name="Fa_ID" value="<?php echo $Fa_ID; ?>"/>
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('master/fix_assets') ?>" class="btn btn-default">Cancel</a>
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
    $(document).ready(function() {
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


<!--                            Remark tanggal 04-03-2020, tidak digunakan-->
<!--                            <div class="form-group">-->
<!--                                <label for="datetime">Date FA --><?php //echo form_error('Date_FA') ?><!--</label>-->
<!--                                <input type="text" class="form-control datepicker" name="Date_FA" id="Date_FA"-->
<!--                                       placeholder="Date FA" value="--><?php //echo $Date_FA; ?><!--"/>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="datetime">Date Disposed --><?php //echo form_error('Date_Disposed') ?><!--</label>-->
<!--                                <input type="text" class="form-control datepicker" name="Date_Disposed" id="Date_Disposed"-->
<!--                                       placeholder="Date Disposed" value="--><?php //echo $Date_Disposed; ?><!--"/>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="varchar">Penerima --><?php //echo form_error('Penerima') ?><!--</label>-->
<!--                                <input type="text" class="form-control" name="Penerima" id="Penerima"-->
<!--                                       placeholder="Penerima" value="--><?php //echo $Penerima; ?><!--"/>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="varchar">Harga --><?php //echo form_error('Harga') ?><!--</label>-->
<!--                                <input type="text" class="form-control" name="Harga" id="Harga"-->
<!--                                       placeholder="Harga" value="--><?php //echo $Harga; ?><!--"/>-->
<!--                            </div>-->