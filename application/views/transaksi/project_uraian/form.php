<?php
$this->load->view('template/head');
?>
<form action="<?php echo $action; ?>" method="post" action="javascript:void(0)"
          autocomplete="off">
    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="tab-content">
                        <div class="container tab-pane active" id="keterangan" style="padding-top: 5px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="varchar">ID Hdr
                                                        Project <?php echo form_error('ID_Hdr_Project') ?></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ID_Hdr_Project"
                                                               id="ID_Hdr_Project"
                                                               placeholder="ID Hdr Project"
                                                               value="<?php echo $ID_Hdr_Project; ?>"
                                                               readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="varchar">ID
                                                        Project <?php echo form_error('ID_Project') ?></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ID_Project"
                                                               id="ID_Project"
                                                               placeholder="ID Project"
                                                               value="<?php echo $ID_Project; ?>" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>NAMA PERUSAHAAN</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan" id="nm_perusahaan" value="<?php echo $nm_perusahaan; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>MODAL DASAR : Rp.</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="modal" id="modal"
                                                           value="<?php echo $modal; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>MODAL DISETOR : Rp.</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="modal_disetor"
                                                           id="modal_disetor" value="<?php echo $modal_disetor; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>PRESENTASE PEMBAGIAN SAHAM :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="presentase_shm"
                                                           id="presentase_shm" value="<?php echo $presentase_shm; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>HARGA TIAP SAHAM : RP.</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="hrg_saham" id="hrg_saham" value="<?php echo $hrg_saham; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NO TELP :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="No_Telp" id="No_Telp" value="<?php echo $No_Telp; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>NO FAX :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="No_Fax" id="No_Fax" value="<?php echo $No_Fax; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-6 col-xg-4">
                                                <div class="form-group">
                                                    <label>Alamat:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="Alamat" id="Alamat" value="<?php echo $alamat; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>KEL :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?php echo $kelurahan; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>KEC :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?php echo $kecamatan; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>KOTA/KABUPATEN :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="Kabupaten" id="Kabupaten" value="<?php echo $kabupaten; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>DENGAN / TANPA PERSETUJUAN KOMANDITER:</label>
                                            <div class="input-group">
                                                <select class="form-control" id="izin_persetujuan"
                                                        name="izin_persetujuan">
                                                    <option value="">---SILAHKAN PILIH---</option>
                                                    <option value="Yes" <?php if ($izin_persetujuan == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                        Dengan persetujuan
                                                    </option>
                                                    <option value="No" <?php if ($izin_persetujuan == 'No'): ?> selected="selected"<?php endif; ?>>
                                                        Tidak dengan persetujuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>DIKUASAKAN / TIDAK DIKUASAKAN:</label>
                                            <div class="input-group">
                                                <select class="form-control" id="signature_commander"
                                                        name="signature_commander">
                                                    <option value="">---SILAHKAN PILIH---</option>
                                                    <option value="Yes" <?php if ($signature_commander == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                        Dikuasakan
                                                    </option>
                                                    <option value="No" <?php if ($signature_commander == 'No'): ?> selected="selected"<?php endif; ?>>
                                                        Tidak Dikuasakan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Penerima:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="penerima" id="penerima" value="<?php echo $penerima; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-xg-4">
                                    <div class="form-group">
                                        <label>KETERANGAN:</label>
                                        <div class="input-group">
                                                    <textarea class="form-control" rows="3"
                                                              name="Keterangan"
                                                              id="Keterangan"
                                                              placeholder="Keterangan"><?php echo $Keterangan; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="ID_Project_Uraian" value="<?php echo $ID_Project_Uraian; ?>"/>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a class="btn btn-danger bg-accent-4 pull-up" type="button"
           href="<?php echo site_url('transaksi/progress/update_track/') . $ID_Project ?>"><i
                    class="ft-arrow-left white"></i>
            Kembali</a>
    </div>
</form>
<?php
$this->load->view('template/foot');
?>