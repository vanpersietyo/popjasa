<?php
/** @var M_Project_terima_ktp[] $list_ktp */
$this->load->view('template/head');
?>
<form action="<?php echo $action; ?>" method="post" action="javascript:void(0)" autocomplete="off">
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
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="bool_ktp" class="col-form-label">KTP :</label>
                                                    <input type="number" min="0" class="form-control" name="jml_ktp"
                                                           id="jml_ktp" placeholder="Jumlah Orang"
                                                           value="<?php echo $jml_ktp ?>"/>
                                                </div>
                                                <div class="col-md-9">
                                                    <label for="bool_ktp" class="col-form-label">&nbsp;</label>
                                                    <select class="form-control" id="bool_ktp" name="bool_ktp"
                                                            value="<?php echo $bool_ktp; ?>">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="fotokopi" <?php if ($bool_ktp == 'fotokopi'): ?> selected="selected"<?php endif; ?>>
                                                            FOTOKOPI
                                                        </option>
                                                        <option value="asli" <?php if ($bool_ktp == 'asli'): ?> selected="selected"<?php endif; ?>>
                                                            ASLI
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" id="header_ktp">
                                                <div class="col-md-6">
                                                    <label class="col-form-label">No Ktp :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Nama Ktp :</label>
                                                </div>
                                            </div>

                                            <?php
                                            /** @var M_Project_terima_ktp $ktp */
                                            $i = 0;
                                            if($list_ktp){
                                                foreach ($list_ktp as $ktp) {?>
                                                    <div class="row" id="form_ktp_<?php echo $i++?>">
                                                        <div class="col-md-6" style="margin-bottom: 10px" id="no_ktp">
                                                            <input type="number" class="form-control" name="no_ktp[]"
                                                                   value="<?php echo $ktp->no_ktp ?>"/>
                                                        </div>
                                                        <div class="col-md-6" style="margin-bottom: 10px" id="nama_ktp">
                                                            <input type="text" class="form-control" name="nama_ktp[]"
                                                                   value="<?php echo $ktp->nama_ktp ?>"/>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }else{?>

                                                <div class="row" id="form_ktp_asli">
                                                    <div class="col-md-6" style="margin-bottom: 10px" id="no_ktp">
                                                        <input type="number" class="form-control" name="no_ktp[]"
                                                               placeholder="Nomor KTP"/>
                                                    </div>
                                                    <div class="col-md-6" style="margin-bottom: 10px" id="nama_ktp">
                                                        <input type="text" class="form-control" name="nama_ktp[]"
                                                               placeholder="Nama KTP"/>
                                                    </div>
                                                    <br>
                                                </div>
                                            <?php } ?>


                                            <div class="row" id="form_ktp_clone" style="display: none">
                                                <div class="col-md-6" style="margin-bottom: 10px" id="no_ktp">
                                                    <input type="number" class="form-control" name="no_ktp[]"
                                                           placeholder="Nomor KTP"/>
                                                </div>
                                                <div class="col-md-6" style="margin-bottom: 10px" id="nama_ktp">
                                                    <input type="text" class="form-control" name="nama_ktp[]"
                                                           placeholder="Nama KTP"/>
                                                </div>
                                                <br>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12" id="result_ktp">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="jns_npwp" class="col-form-label">NPWP PRIBADI (SEMU
                                                        PENGURUS) :</label>
                                                    <select class="form-control" id="bool_npwp" name="bool_npwp"
                                                            value="<?php echo $bool_npwp; ?>">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="fotokopi" <?php if ($bool_npwp == 'fotokopi'): ?> selected="selected"<?php endif; ?>>
                                                            FOTOKOPI
                                                        </option>
                                                        <option value="asli" <?php if ($bool_npwp == 'asli'): ?> selected="selected"<?php endif; ?>>
                                                            ASLI
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="jns_sertifikat" class="col-form-label">SERTIFIKAT T.
                                                        USAHA :</label>
                                                    <select class="form-control" id="bool_sertifikat"
                                                            name="bool_sertifikat"
                                                            value="<?php echo $bool_sertifikat; ?>">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="fotokopi" <?php if ($bool_sertifikat == 'fotokopi'): ?> selected="selected"<?php endif; ?>>
                                                            FOTOKOPI
                                                        </option>
                                                        <option value="asli" <?php if ($bool_sertifikat == 'asli'): ?> selected="selected"<?php endif; ?>>
                                                            ASLI
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jns_imb" class="col-form-label">IMB (IJIN MENDIRIKAN
                                                        BANGUNAN) :</label>
                                                    <select class="form-control" id="bool_imb" name="bool_imb"
                                                            value="<?php echo $bool_imb; ?>">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="fotokopi" <?php if ($bool_imb == 'fotokopi'): ?> selected="selected"<?php endif; ?>>
                                                            FOTOKOPI
                                                        </option>
                                                        <option value="asli" <?php if ($bool_imb == 'asli'): ?> selected="selected"<?php endif; ?>>
                                                            ASLI
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="bool_stempel" class="col-form-label">Stempel :</label>&nbsp;
                                                    <select class="form-control" id="bool_stempel" name="bool_stempel"
                                                            value="<?php echo $bool_stempel; ?>">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="yes" <?php if ($bool_stempel == 'yes'): ?> selected="selected"<?php endif; ?>>
                                                            YES
                                                        </option>
                                                        <option value="no" <?php if ($bool_stempel == 'no'): ?> selected="selected"<?php endif; ?>>
                                                            NO
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="materai" class="col-form-label">MATERAI :</label>
                                                    <input type="number" class="form-control" name="jml_materai"
                                                           id="jml_materai" value="<?php echo $jml_materai; ?>"
                                                           placeholder="Jumlah Materai"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nofax" class="col-form-label">S.K. DOMISILI :</label>
                                                    <select class="form-control" id="bool_sk_domisili"
                                                            name="bool_sk_domisili"
                                                            value="<?php echo $bool_sk_domisili; ?>">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="fotokopi" <?php if ($bool_sk_domisili == 'fotokopi'): ?> selected="selected"<?php endif; ?>>
                                                            FOTOKOPI
                                                        </option>
                                                        <option value="asli" <?php if ($bool_sk_domisili == 'asli'): ?> selected="selected"<?php endif; ?>>
                                                            ASLI
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="jns_sewa" class="col-form-label">SURAT SEWA :</label>
                                                    <select class="form-control" id="jns_sewa" name="bool_surat_sewa"
                                                            value="<?php echo $bool_surat_sewa; ?>">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="fotokopi" <?php if ($bool_surat_sewa == 'fotokopi'): ?> selected="selected"<?php endif; ?>>
                                                            FOTOKOPI
                                                        </option>
                                                        <option value="asli" <?php if ($bool_surat_sewa == 'asli'): ?> selected="selected"<?php endif; ?>>
                                                            ASLI
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="ID_Project_terima" value="<?php echo $ID_Project_terima; ?>"/>
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                        <a class="btn btn-danger bg-accent-4 pull-up" type="button"
                                           href="<?php echo site_url('transaksi/progress/update_track/') . $ID_Project ?>"><i
                                                    class="ft-arrow-left white"></i>
                                            Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        var ktp         = $('#jml_ktp');
        var form_ktp    = $('#form_ktp_0');
        var form_ktp_2  = $('#form_ktp_clone');
        var result      = $('#result_ktp');
        var length_exist= <?php echo count($list_ktp) ?>;
        ktp.on('change',function () {
        result.html('');
        if(ktp.val() >= 1 ){
            $('#form_ktp_asli').remove();

        <?php
            if($list_ktp){ ?>
            if(ktp.val() < length_exist) {
                for (i = ktp.val(); i < length_exist; i++) {
                    $('#form_ktp_'+i).remove();
                    length_exist = length_exist - 1;
                }
            }else{
                for (i = 1; i <= ktp.val()-length_exist; i++) {
                    form_ktp_2.clone()
                        .prop('id','form_ktp_'+i)
                        .removeAttr('style')
                        .appendTo(result);
                }
            }

            <?php }else{ ?>
            console.log(ktp.val());
            for (i = 1; i <= ktp.val(); i++) {
                form_ktp_2.clone()
                    .prop('id','form_ktp_'+i)
                    .removeAttr('style')
                    .appendTo(result);
            }
            <?php } ?>
        }



        });
    })
</script>

<?php
$this->load->view('template/foot');
?>       
