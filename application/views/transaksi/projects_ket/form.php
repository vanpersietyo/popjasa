<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 03/12/2019
 * Time: 15:07
 */

/** @var M_Customer $customer */
/** @var CI_Controller $this */
$this->load->view('template/head');


?>


    <form action="<?php echo $action; ?>" method="post" id="form_project" action="javascript:void(0)"
          autocomplete="off">

        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="tab-content">
                            <div class="container tab-pane active" id="keterangan" style="padding-top: 5px">
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
                                        <div class="form-group">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email USAHA</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="email"
                                                                   id="email" value="<?php echo $Ket_Email; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Password</label>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control" name="password"
                                                                   id="password"
                                                                   value="<?php echo $Pass_Email; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email pengurus:</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" rows="3"
                                                                      name="email_pengurus"
                                                                      id="email_pengurus"
                                                                      placeholder="Email Pengurus"><?php echo $Email_Pengurus; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>No. Telp pengurus:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="notelp"
                                                                   id="notelp" value="<?php echo $No_Telp; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-6 col-xg-4">
                                        <div class="form-group">
                                            <label>LUASAN TEMPAT USAHA:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="luas"
                                                       id="luas" value="<?php echo $Ket_Luas; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-xg-6">
                                        <div class="form-group">
                                            <label>ASSET:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="Info_Asset"
                                                       id="Info_Asset" value="<?php echo $Info_Asset; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-xg-6">
                                        <div class="form-group">
                                            <label>KEPEMILIKAN TANAH:</label>
                                            <div class="input-group">
                                                <select class="form-control" id="Info_Tanah" name="Info_Tanah"
                                                        onselect="<?php echo $Info_Tanah; ?>">
                                                    <option value="">---SILAHKAN PILIH---</option>
                                                    <option value="1" <?php if ($Info_Tanah == '1'): ?> selected="selected"<?php endif; ?>>
                                                        SEWA
                                                    </option>
                                                    <option value="2" <?php if ($Info_Tanah == '2'): ?> selected="selected"<?php endif; ?>>
                                                        BUKAN SEWA
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-xg-6">
                                        <div class="form-group">
                                            <label>BIDANG USAHA:</label>
                                            <div class="input-group">
                                                <textarea class="form-control" rows="3"
                                                          name="Ket_Bidang_Usaha"
                                                          id="Ket_Bidang_Usaha"
                                                          placeholder="Ket Bidang Usaha"><?php echo $Ket_Bidang_Usaha; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-xg-6">
                                        <div class="form-group">
                                            <label>BIDANG USAHA UTAMA:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="Info_Usaha_Utama"
                                                       id="Info_Usaha_Utama" value="<?php echo $Info_Usaha_Utama; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-6 col-xg-4">
                                        <div class="form-group">
                                            <label>MENGETAHUI POPJASA dari:</label>
                                            <div class="input-group">
                                                <select class="form-control" id="tahu" name="tahu"
                                                        onselect="<?php echo $Ket_Informasi; ?>">
                                                    <option value="">---SILAHKAN PILIH---</option>
                                                    <option value="pernah_order" <?php if ($Ket_Informasi == 'pernah_order'): ?> selected="selected"<?php endif; ?>>
                                                        PERNAH ORDER
                                                    </option>
                                                    <option value="website" <?php if ($Ket_Informasi == 'website'): ?> selected="selected"<?php endif; ?>>
                                                        WEBSITE
                                                    </option>
                                                    <option value="facebook" <?php if ($Ket_Informasi == 'facebook'): ?> selected="selected"<?php endif; ?>>
                                                        FACEBOOK
                                                    </option>
                                                    <option value="instagram" <?php if ($Ket_Informasi == 'instagram'): ?> selected="selected"<?php endif; ?>>
                                                        INSTAGRAM
                                                    </option>
                                                    <option value="olx" <?php if ($Ket_Informasi == 'olx'): ?> selected="selected"<?php endif; ?>>
                                                        OLX
                                                    </option>
                                                    <option value="spanduk" <?php if ($Ket_Informasi == 'spanduk'): ?> selected="selected"<?php endif; ?>>
                                                        SPANDUK
                                                    </option>
                                                    <option value="teman" <?php if ($Ket_Informasi == 'teman'): ?> selected="selected"<?php endif; ?>>
                                                        TEMAN
                                                    </option>
                                                </select>
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
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="ID_Project_Ket" value="<?php echo $ID_Project_Ket; ?>"/>
                                    <?php if ($status != '2') { ?>
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                    <?php } ?>
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
        </section>
        </div>

    </form>
<?php
$this->load->view('./template/foot');
?>