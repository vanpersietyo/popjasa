<!-- Bootstrap modal insert-->
<div class="modal animated pulse text-left" id="modal_form" role="dialog" aria-labelledby="myModalLabel17"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue darken-4">
                <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i> Tambah User Baru</h4>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="form" onsubmit="save()" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" name="<?=M_bankout::ID_TRANS?>"/>
                                    <div class="col-md-12">
                                        <label for="projectinput2">Pilih Akun Bank</label>
                                        <select class="select2 form-control block" id="responsive_single" name="<?=M_bankout::KD_BANK?>"
                                                style="width: 100%" required>
                                            <option value="" class="disabled">Pilih Akun Bank</option>
                                            <?php /** @var M_bank[] $bank */
                                            foreach ($bank as $bnk) { ?>
                                                <option value="<?php echo $bnk->kd_bank; ?>"><?php echo $bnk->kd_bank.' - '.$bnk->nm_bank ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="NOTIF_ERROR_KD_BANK"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Nominal Kas Keluar</label>
                                        <input name="<?=M_bankout::SLD_KELUAR?>" placeholder="Jml Saldo Keluar .." id="tanpa-rupiah"
                                               class="form-control" type="text">
                                        <div class="NOTIF_ERROR_SLD_KELUAR"></div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="projectinput2">Tanggal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-info" type="button"><i class="ft-calendar"></i>
                                                </button>
                                            </div>
                                            <input data-role="date" type='text' class="datepicker form-control"
                                                   name="<?=M_bankout::TGL_TRANS?>" required autocomplete="off"/>

                                        </div>
                                        <div class="NOTIF_ERROR_TGL_BUAT"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label">Keterangan</label>
                                        <input name="<?=M_bankout::KETERANGAN?>" placeholder="Keterangan Saldo Keluar .."
                                               id="tanpa-rupiah" class="form-control" type="text">
                                        <div class="NOTIF_ERROR_KETERANGAN"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" id="btnSave"
                                                class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Simpan
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Block level buttons with icon -->
                                    <div class="form-group">
                                        <button type="button"
                                                class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                                data-dismiss="modal">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/navs/navs.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>"
        type="text/javascript"></script>
<script type="text/javascript">
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function (e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 2*/
    var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
    tanpa_rupiah2.addEventListener('keyup', function (e) {
        tanpa_rupiah2.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 3*/
    var tanpa_rupiah3 = document.getElementById('tanpa-rupiah3');
    tanpa_rupiah3.addEventListener('keyup', function (e) {
        tanpa_rupiah3.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 4*/
    var tanpa_rupiah4 = document.getElementById('tanpa-rupiah4');
    tanpa_rupiah4.addEventListener('keyup', function (e) {
        tanpa_rupiah4.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 5*/
    var tanpa_rupiah5 = document.getElementById('tanpa-rupiah5');
    tanpa_rupiah5.addEventListener('keyup', function (e) {
        tanpa_rupiah5.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 6*/
    var tanpa_rupiah6 = document.getElementById('tanpa-rupiah6');
    tanpa_rupiah6.addEventListener('keyup', function (e) {
        tanpa_rupiah6.value = formatRupiah(this.value);
    });
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