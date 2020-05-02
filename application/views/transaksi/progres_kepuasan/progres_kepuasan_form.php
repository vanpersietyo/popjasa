<?php
$this->load->view('./template/head');
?>
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <h5 class="brand-text" style="text-align: center">POPJASA TRACKING ORDER</h5>
            </a>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="https://popjasa.id/"><i
                                    class="ficon ft-arrow-left"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2"
         style="padding-top:20px">
        <h3 class="content-header-title">Form Kepuasan Pelanggan</h3>
    </div>
</div>
<div class="row">
    &nbsp;
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-xg-8">
            <div class="card card-body">
                <div class="card card-transparent">
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="row" style="padding-bottom: 20px">
                            <div class="col-lg-12">
                                <div class="form-group-lg">
                                    <label class="label-control" style="font-weight: bold">Terima kasih atas kepercayaan anda menggunakan jasa kami, sudikah kiranya anda mengisi Form Kepuasan Pelanggan ini sebagai bahan masukan bagi kami agar kami bisa menjadi lebih baik lagi. Terima kasih.</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="varchar">Nama Pelanggan <?php echo form_error('nama_pelanggan') ?></label>
                                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama Pelanggan"
                                           value="<?php echo $nama_pelanggan; ?>"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
                                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan"
                                           placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="varchar">No Telp <?php echo form_error('no_telp') ?></label>
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp"
                                           value="<?php echo $no_telp; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="smallint">Anda mengetahui informasi tentang perusahaan kami dari : <?php echo form_error('info_order') ?></label>
                                    <select class="form-control" id="info_order" name="info_order"
                                            value="<?php echo $info_order; ?>">
                                        <option value="">---SILAHKAN PILIH---</option>
                                        <option value="0" <?php if ($info_order == '0'): ?> selected="selected"<?php endif; ?>>
                                            TEMAN
                                        </option>
                                        <option value="1" <?php if ($info_order == '1'): ?> selected="selected"<?php endif; ?>>
                                            FACEBOOK
                                        </option>
                                        <option value="2" <?php if ($info_order == '2'): ?> selected="selected"<?php endif; ?>>
                                            WEBSITE
                                        </option>
                                        <option value="3" <?php if ($info_order == '3'): ?> selected="selected"<?php endif; ?>>
                                            SPANDUK
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="smallint">Seberapa Puas Anda dengan layanan kami: <?php echo form_error('info_kepuasan') ?></label>
                                    <select class="form-control" id="info_kepuasan" name="info_kepuasan"
                                            value="<?php echo $info_kepuasan; ?>">
                                        <option value="">---SILAHKAN PILIH---</option>
                                        <option value="0" <?php if ($info_kepuasan == '0'): ?> selected="selected"<?php endif; ?>>
                                            Sangat Kurang
                                        </option>
                                        <option value="1" <?php if ($info_kepuasan == '1'): ?> selected="selected"<?php endif; ?>>
                                            Kurang
                                        </option>
                                        <option value="2" <?php if ($info_kepuasan == '2'): ?> selected="selected"<?php endif; ?>>
                                            Cukup
                                        </option>
                                        <option value="3" <?php if ($info_kepuasan == '3'): ?> selected="selected"<?php endif; ?>>
                                            Baik
                                        </option>
                                        <option value="4" <?php if ($info_kepuasan == '4'): ?> selected="selected"<?php endif; ?>>
                                            Sangat Baik
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="smallint">Bolehkah Foto anda kami posting di media sosial kami dan menandai (tag) akun anda:  <?php echo form_error('status_photo') ?></label>
                                <select class="form-control" id="status_photo" name="status_photo"
                                        value="<?php echo $status_photo; ?>">
                                    <option value="">---SILAHKAN PILIH---</option>
                                    <option value="0" <?php if ($status_photo == '0'): ?> selected="selected"<?php endif; ?>>
                                        Boleh
                                    </option>
                                    <option value="1" <?php if ($status_photo == '1'): ?> selected="selected"<?php endif; ?>>
                                        Tidak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <label for="date">Alamat instagram anda: <?php echo form_error('status_ig') ?></label>
                                <input type="text" class="form-control" name="status_ig" id="status_ig"
                                       placeholder="Alamat instagram anda" value="<?php echo $status_ig; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <label for="varchar">Alamat Facebook anda: <?php echo form_error('status_fb') ?></label>
                                <input type="text" class="form-control" name="status_fb" id="status_fb" placeholder="Status Fb"
                                       value="<?php echo $status_fb; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <label for="varchar">Saran yang ingin anda sampaikan untuk kami: (Pelayanan dan fasilitas tambahan yang diinginkan) <?php echo form_error('info_order2') ?></label>
                                <input type="text" class="form-control" name="info_order2" id="info_order2" placeholder="Saran yang ingin anda sampaikan untuk kami"
                                       value="<?php echo $info_order2; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="varchar">Referensi teman anda <?php echo form_error('referensi_nama') ?></label>
                                    <input type="text" class="form-control" name="referensi_nama" id="referensi_nama" placeholder="Referensi teman anda"
                                           value="<?php echo $referensi_nama; ?>"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="varchar">Referensi No Telp <?php echo form_error('referensi_no_telp') ?></label>
                                    <input type="text" class="form-control" name="referensi_no_telp" id="referensi_no_telp"
                                           placeholder="Referensi No Telp" value="<?php echo $referensi_no_telp; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="hidden" name="id_project" value="<?php echo $id_project; ?>"/>
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a class="btn btn-danger bg-accent-4 pull-up" type="button"
                               href="<?php echo site_url('customers/track/order2/') . $id_project ?>"><i
                                        class="ft-arrow-left white"></i>
                                Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/foot'); ?>
