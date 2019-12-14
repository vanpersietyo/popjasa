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

$status = $project->st_data;

?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2"
             style="padding-bottom: 0 !important;  margin-bottom: 0 !important;">
            <h3 class="content-header-title">Edit Project</h3>
        </div>

        <div class="content-header-right col-md-6 col-12">
            <div class="float-md-right">
                <a class="btn btn-danger bg-accent-4 pull-up" type="button"
                   href="<?php echo site_url('transaksi/project/index_adit') ?>"><i class="ft-arrow-left white"></i>
                    Kembali</a>
                <a class="btn btn-success bg-accent-4 pull-up" type="button" href="javascript:void()"
                   onclick="location.reload();"><i class="ft-refresh-cw white"></i> Refresh</a>
            </div>
        </div>

    </div>

    <form method="post" class="form-horizontal" id="form_project" action="javascript:void(0)"
          autocomplete="off">

        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="padding-bottom: 0.5rem !important">
                            <h4 class="card-title">Header</h4>
                            <hr>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show" id="content-header">
                            <div class="card-body" style="padding-top: 0 !important">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Nama Customer</label>
                                                    <input name="nm_customer"
                                                           value="<?php echo $customer->nm_customer; ?>"
                                                           placeholder="Nama Customer .."
                                                           class="form-control" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Telp Customer</label>
                                                    <input name="tlp_customer"
                                                           value="<?php echo $customer->tlp_customer; ?>"
                                                           placeholder="Telp Customer .."
                                                           class="form-control" type="number" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Hp Customer</label>
                                                    <input name="telp2_customer"
                                                           value="<?php echo $customer->telp2_customer; ?>"
                                                           placeholder="No Hp Customer .."
                                                           class="form-control" type="number" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Email Customer</label>
                                                    <input name="email_customer"
                                                           value="<?php echo $customer->email_customer; ?>"
                                                           placeholder="Email Customer .."
                                                           class="form-control" type="email" disabled>
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Kota Customer</label>
                                                    <input name="kota_customer"
                                                           value="<?php echo $customer->kota_customer; ?>"
                                                           placeholder="Kota Customer .."
                                                           class="form-control" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Note Contacted</label>
                                                    <textarea name="keterangan"
                                                              value="<?php echo $customer->keterangan; ?>"
                                                              placeholder="Keterangan .." maxlength="255"
                                                              class="form-control" type="textarea"
                                                              disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">Layanan</label>
                                            <input name="nm_layanan" value="<?php echo $layanan->nama_layanan; ?>"
                                                   placeholder="Nama Project .."
                                                   class="form-control" type="text" disabled>
                                            <input type="hidden" name="layanan"
                                                   value="<?php echo $project->id_layanan; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Harga Pokok</label>
                                        <div class="input-group">
                                            <?php
                                            if ($status == 1) { ?>
                                                <input type="numeric" class="form-control" name="hrg_pokok"
                                                       id="hrg_pokok"
                                                       placeholder="Harga Pokok..."
                                                       value="<?php echo $project->harga_jual ?>"
                                                       onblur="this.value=formatRupiah(this.value);" disabled/>
                                            <?php } else { ?>
                                                <input type="numeric" class="form-control" name="hrg_pokok"
                                                       id="hrg_pokok"
                                                       placeholder="Harga Pokok..."
                                                       value="<?php echo $project->harga_jual ?>"
                                                       onblur="this.value=formatRupiah(this.value);"/>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama Project</label>
                                        <?php if ($status == 1) { ?>
                                            <input name="nm_project" value="DEFF PROJECT" placeholder="Nama Project .."
                                                   class="form-control" type="text" disabled>
                                        <?php } else { ?>
                                            <input name="nm_project" value="DEFF PROJECT" placeholder="Nama Project .."
                                                   class="form-control" type="text" required="">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Note Project</label>
                                        <textarea name="note_project" placeholder="Note Project .." maxlength="255"
                                                  class="form-control" type="textarea"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button style="margin-top: 1.25rem !important;" type="submit"
                                                    onclick="javascript:entry_document();"
                                                    class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up">
                                                Lanjutkan
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Block level buttons with icon -->
                                        <div class="form-group">
                                            <a style="margin-top: 1.25rem !important;" type="button"
                                               href="<?php echo site_url('transaksi/project/index_adit') ?>"
                                               class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up">
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

        <div class="modal animated pulse text-left" id="modal_form" role="dialog" aria-labelledby="myModalLabel17"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                        <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="tab-content">
                        <div class="container tab-pane active" id="keterangan" style="padding-top: 5px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email UNTUK NIB</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="email"
                                                               id="email"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="password"
                                                               id="password"/>
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
                                                    <label>Email dan No. Telp Masing-masing pengurus:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="notelp"
                                                               id="notelp"/>
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
                                                    <label>LUASAN TEMPAT USAHA:</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="luas"
                                                               id="luas"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>BIDANG USAHA:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="usaha"
                                                               id="usaha"/>
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
                                                    <label>MENGETAHUI POPJASA dari:</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="tahu" name="tahu">
                                                            <option value="">---SILAHKAN PILIH---</option>
                                                            <option value="pernah_order">PERNAH ORDER</option>
                                                            <option value="website">WEBSITE</option>
                                                            <option value="facebook">FACEBOOK</option>
                                                            <option value="instagram">INSTAGRAM</option>
                                                            <option value="olx">OLX</option>
                                                            <option value="spanduk">SPANDUK</option>
                                                            <option value="teman">TEMAN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                                onclick="entry_document2()"><i class="fa fa-refresh"></i> Next
                        </button>
                        <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                data-dismiss="modal"
                                aria-label="Close"><i class="fa fa-times"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal animated pulse text-left" id="modal_form2" role="dialog" aria-labelledby="myModalLabel17"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                        <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="tab-content">
                        <div class="container tab-pane active" id="izin">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>AKTA NOTARIS</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="email"
                                                           id="email"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>PENGESAHAN</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="pengesahan"
                                                           id="pengesahan"/>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-3">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="npwp_pribadi"
                                                       name="npwp_pribadi">
                                                &nbsp;
                                                <label class="custom-control-label" for="npwp_pribadi">NPWP
                                                    PRIBADI</label>
                                            </div>
                                            <div class="col-md-3">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="npwp"
                                                       name="npwp">
                                                &nbsp;
                                                <label class="custom-control-label" for="npwp">NPWP (dikirim)
                                                    PERUSAHAAN</label>
                                            </div>
                                            <div class="col-md-3">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="skt_npwp"
                                                       name="skt_npwp">
                                                &nbsp;
                                                <label class="custom-control-label" for="skt_npwp">SKT NPWP
                                                    (dikirim)</label>
                                            </div>
                                            <div class="col-md-3">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="siup_tdp"
                                                       name="siup_tdp">
                                                &nbsp;
                                                <label class="custom-control-label" for="siup_tdp">SIUP & TDP
                                                    (NIB)</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="registrasi"
                                                       name="registrasi">
                                                &nbsp;
                                                <label class="custom-control-label" for="registrasi">REGISTRASI</label>
                                            </div>
                                            <div class="col-md-3">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="pkp" name="pkp">
                                                &nbsp;
                                                <label class="custom-control-label" for="pkp">PKP</label>
                                            </div>
                                            <div class="col-md-3">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="domisili"
                                                       name="domisili">
                                                &nbsp;
                                                <label class="custom-control-label" for="pkp">S.K. DOMISILI</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="lain2"
                                                       name="lain2">
                                                &nbsp;
                                                <label class="custom-control-label" for="lain2">IJIN LAINNYA</label>
                                                &nbsp;
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="lain_text"
                                                           id="lain_text"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                                onclick="entry_document3()"><i class="fa fa-refresh"></i> NEXT
                        </button>
                        <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                data-dismiss="modal"
                                aria-label="Close"><i class="fa fa-times"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal animated pulse text-left" id="modal_form3" role="dialog" aria-labelledby="myModalLabel17"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                        <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane container active" id="uraian">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>NAMA PERUSAHAAN</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>MODAL DASAR : Rp.</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>MODAL DISETOR : Rp.</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>PRESENTASE PEMBAGIAN SAHAM :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>HARGA TIAP SAHAM : RP.</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NO TELP :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>NO FAX :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>KEL :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>KOTA/KABUPATEN :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nm_perusahaan"
                                                           id="nm_perusahaan"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                                onclick="entry_document4()"><i class="fa fa-refresh"></i> NEXT
                        </button>
                        <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                data-dismiss="modal"
                                aria-label="Close"><i class="fa fa-times"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal animated pulse text-left" id="modal_form4" role="dialog" aria-labelledby="myModalLabel17"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                        <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#terima">Telah Diterima</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane container active" id="terima">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>KTP</label>
                                                <div class="input-group">
                                                    <input type="numeric" class="form-control" name="terima_ktp"
                                                           id="terima_ktp"/>
                                                    <select class="form-control" id="jns_ktp" name="jns_ktp">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="ftkopi">FOTOKOPI</option>
                                                        <option value="asli">ASLI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>NPWP PRIBADI (SEMU PENGURUS)</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="jns_npwp" name="jns_npwp">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="ftkopi">FOTOKOPI</option>
                                                        <option value="asli">ASLI</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>SERTIFIKAT T. USAHA</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="jns_sertificat"
                                                            name="jns_sertifikat">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="ftkopi">FOTOKOPI</option>
                                                        <option value="asli">ASLI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>IMB (IJIN MENDIRIKAN BANGUNAN)</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="jns_imb" name="jns_imb">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="ftkopi">FOTOKOPI</option>
                                                        <option value="asli">ASLI</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                &nbsp;
                                                <input type="checkbox" class="custom-control-input" id="stempel"
                                                       name="stempel">
                                                &nbsp;
                                                <label class="custom-control-label" for="stempel">STEMPEL</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label>MATERAI</label>
                                                <div class="input-group">
                                                    <input type="text" name="jml_materai" id="jml_materai"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>S.K. DOMISILI</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="jns_domisili" name="jns_domisili">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="ftkopi">FOTOKOPI</option>
                                                        <option value="asli">ASLI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>SURAT SEWA</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="jns_sewa" name="jns_sewa">
                                                        <option value="">---SILAHKAN PILIH---</option>
                                                        <option value="ftkopi">FOTOKOPI</option>
                                                        <option value="asli">ASLI</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                                    onclick="save()"><i class="fa fa-refresh"></i> SIMPAN
                            </button>
                            <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                    data-dismiss="modal"
                                    aria-label="Close"><i class="fa fa-times"></i> Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>


    <!-- Bootstrap modal insert-->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="<?php echo site_url('assets/app-assets/vendors/login18/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/app-assets/vendors/login18/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>


    <script type="text/javascript">
        /**
         * created_at: 2019-12-07
         * created_by: Afes Oktavianus
         * @param messages
         */
        function loading(messages = 'Please Wait') {
            swal({
                text: messages,
                icon: "<?php echo site_url('/assets/app-assets/images/icons/loading.gif');?>",
                closeOnClickOutside: false,
                closeOnEsc: false,
                buttons: {
                    confirm: {
                        visible: false,
                    }
                }
            });
        }

        //fungsi untuk menampilkan alert error
        function error_swal(message = 'Silahkan Hubungi Administrator!') {
            swal({
                title: "Oops, Gagal!",
                text: message,
                icon: "error",
            });
        }

        //fungsi untuk menampilkan alert success
        function success_swal(message = 'Berhasil!') {
            swal({
                title: "Berhasil",
                text: message,
                icon: "success",
            });
        }

        //fungsi untuk membersihakn semua error
        function clear_all_error() {
            $(".form-control").removeClass('border-danger');
            $('[id="error_messages"]').html('');
        }

        //fungsi untuk membersihakn semua error
        function clear_all_error() {
            $(".form-control").removeClass('border-danger');
            $('[id="error_messages"]').html('');
        }

        function simpan_create_project() {
            clear_all_error();
            loading('Sedang Menyimpan Data Project..');
            var formData = new FormData($('#form_project')[0]);
            $.ajax({
                url: "<?php echo site_url('/transaksi/project/simpan_project/');?>",
                data: formData,
                type: "POST",
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function (data) {
                    swal.close();
                    if (data.status) {
                        window.location.href = "<?php echo site_url('/transaksi/project/edit_project/'); ?>" + data.id_project;
                    } else {
                        swal.close();
                        if (data.sw_alert) {
                            error_swal(data.message);
                        } else {
                            for (let i = 0; i < data.inputerror.length; i++) {
                                let inputerror = $('[name="' + data.inputerror[i] + '"]');
                                $('[class="NOTIF_ERROR_' + data.inputerror[i] + '"]').html(data.notiferror[i]);
                                inputerror.addClass('border-danger');
                            }
                            $('[name="' + data.inputerror[0] + '"]').focus();
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    error_swal();
                }
            });
        }

        function entry_document() {
            // reload_customer();
            $('.modal-title').text('ENRTY DATA PENDUKUNG KETERANGAN'); // Set Title to Bootstrap modal title
            $('#modal_form').modal('show'); // show bootstrap modal
        }

        function entry_document2() {
            $('#modal_form').modal('hide'); // show bootstrap modal
            $('.modal-title').text('ENRTY DATA PENDUKUNG JENIS IZIN'); // Set Title to Bootstrap modal title
            $('#modal_form2').modal('show'); // show bootstrap modal
        }

        function entry_document3() {
            $('#modal_form2').modal('hide'); // show bootstrap modal
            $('.modal-title').text('ENRTY DATA PENDUKUNG URAIAN'); // Set Title to Bootstrap modal title
            $('#modal_form3').modal('show'); // show bootstrap modal
        }

        function entry_document4() {
            $('#modal_form3').modal('hide'); // show bootstrap modal
            $('.modal-title').text('ENRTY DATA PENDUKUNG TELAH DITERIMA'); // Set Title to Bootstrap modal title
            $('#modal_form4').modal('show'); // show bootstrap modal
        }

        /* Tanpa Rupiah */
        var hrg_pokok = document.getElementById('hrg_pokok');
        hrg_pokok.addEventListener('keyup', function (e) {
            hrg_pokok.value = formatRupiah(this.value);
        });
        hrg_pokok.addEventListener('blur', function (e) {
            hrg_pokok.value = formatRupiah(this.value);
        })

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }


    </script>

<?php
$this->load->view('template/foot');
?>