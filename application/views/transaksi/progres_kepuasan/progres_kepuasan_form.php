<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 03/12/2019
 * Time: 15:07
 */

/** @var CI_Controller $this */
$this->load->view('template/head');
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2"
         style="padding-bottom: 0 !important;  margin-bottom: 0 !important;">
        <h3 class="content-header-title">Form Kepuasan Pelanggan</h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
        <div class="float-md-right">
            <a class="btn btn-danger bg-accent-4 pull-up" type="button"
               href="<?php echo site_url('transaksi/project/index_adit')?>"><i class="ft-arrow-left white"></i>
                Kembali</a>
            <a class="btn btn-success bg-accent-4 pull-up" type="button" href="javascript:void()"
               onclick="location.reload();"><i class="ft-refresh-cw white"></i> Refresh</a>
        </div>
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
                                    <label for="smallint">Info Order <?php echo form_error('info_order') ?></label>
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
                                    <label for="varchar">Info Order2 <?php echo form_error('info_order2') ?></label>
                                    <input type="text" class="form-control" name="info_order2" id="info_order2" placeholder="Info Order2"
                                           value="<?php echo $info_order2; ?>"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="smallint">Info Kepuasan <?php echo form_error('info_kepuasan') ?></label>
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
                            <div class="col-lg-6 form-group">
                                <label for="smallint">Status Photo <?php echo form_error('status_photo') ?></label>
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
                                <label for="date">Status Photo Tgl <?php echo form_error('status_photo_tgl') ?></label>
                                <input type="text" class="form-control" name="status_photo_tgl" id="status_photo_tgl"
                                       placeholder="Status Photo Tgl" value="<?php echo $status_photo_tgl; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <label for="varchar">Status Fb <?php echo form_error('status_fb') ?></label>
                                <input type="text" class="form-control" name="status_fb" id="status_fb" placeholder="Status Fb"
                                       value="<?php echo $status_fb; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <label for="varchar">Status Ig <?php echo form_error('status_ig') ?></label>
                                <input type="text" class="form-control" name="status_ig" id="status_ig" placeholder="Status Ig"
                                       value="<?php echo $status_ig; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="varchar">Referensi Nama <?php echo form_error('referensi_nama') ?></label>
                                    <input type="text" class="form-control" name="referensi_nama" id="referensi_nama" placeholder="Referensi Nama"
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
                        <input type="hidden" nam*e="id" value="<?php echo $id; ?>"/>
                        <input type="hidden" nam*e="id_project" value="<?php echo $id_project; ?>"/>
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('progres_kepuasan') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/foot'); ?>
