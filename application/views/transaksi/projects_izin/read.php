<?php
$this->load->view('template/head');
?>
    <div style="padding: 20px"/>
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
                                                <div class="col-md-6">
                                                    <label>AKTA NOTARIS</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="Izin_Akta_Notaris" id="Izin_Akta_Notaris" value="<?php echo $Izin_Akta_Notaris; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>PENGESAHAN</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="Izin_Pengesahan" id="Izin_Pengesahan" value="<?php echo $Izin_Pengesahan; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>NPWP PRIBADI</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="Bool_NPWP" name="Bool_NPWP">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="Yes" <?php if ($Bool_NPWP == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                                Yes
                                                            </option>
                                                            <option value="No" <?php if ($Bool_NPWP == 'No'): ?> selected="selected"<?php endif; ?>>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>NPWP (dikirim) PERUSAHAAN</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="Bool_NPWP_Perusahaan"
                                                                name="Bool_NPWP_Perusahaan">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="Yes" <?php if ($Bool_NPWP_Perusahaan == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                                Yes
                                                            </option>
                                                            <option value="No" <?php if ($Bool_NPWP_Perusahaan == 'No'): ?> selected="selected"<?php endif; ?>>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>SKT NPWP (dikirim)</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="Bool_SKT_Perusahaan"
                                                                name="Bool_SKT_Perusahaan">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="Yes" <?php if ($Bool_SKT_Perusahaan == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                                Yes
                                                            </option>
                                                            <option value="No" <?php if ($Bool_SKT_Perusahaan == 'No'): ?> selected="selected"<?php endif; ?>>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">&nbsp;
                                                    <label>SIUP & TDP (NIB)</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="Bool_SIUP_TDP"
                                                                name="Bool_SIUP_TDP">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="Yes" <?php if ($Bool_SIUP_TDP == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                                Yes
                                                            </option>
                                                            <option value="No" <?php if ($Bool_SIUP_TDP == 'No'): ?> selected="selected"<?php endif; ?>>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>REGISTRASI</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="Bool_Registrasi"
                                                                name="Bool_Registrasi">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="Yes" <?php if ($Bool_Registrasi == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                                Yes
                                                            </option>
                                                            <option value="No" <?php if ($Bool_Registrasi == 'No'): ?> selected="selected"<?php endif; ?>>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>PKP</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="Bool_PKP" name="Bool_PKP">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="Yes" <?php if ($Bool_PKP == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                                Yes
                                                            </option>
                                                            <option value="No" <?php if ($Bool_PKP == 'No'): ?> selected="selected"<?php endif; ?>>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>S.K. DOMISILI</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="Bool_SK_Domisili"
                                                                name="Bool_SK_Domisili">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="Yes" <?php if ($Bool_SK_Domisili == 'Yes'): ?> selected="selected"<?php endif; ?>>
                                                                Yes
                                                            </option>
                                                            <option value="No" <?php if ($Bool_SK_Domisili == 'No'): ?> selected="selected"<?php endif; ?>>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">&nbsp;
                                                    <label>Lain-lain</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="lain_text"
                                                               value="<?php echo $Izin_Lain; ?>" id="lain_text"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="ID_Project_JNS" value="<?php echo $ID_Project_JNS; ?>"/>
                            <a class="btn btn-danger bg-accent-4 pull-up" type="button"
                               href="<?php echo site_url('customers/track/order2/') . $ID_Project ?>"><i
                                    class="ft-arrow-left white"></i>
                                Kembali</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </form>
<?php
$this->load->view('template/foot');
?>