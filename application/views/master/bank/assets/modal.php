
<script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>
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
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="control-label">Kode Bank</label>
                                        <input name="kd_bank" placeholder="Kode Account Bank .." class="form-control" maxlength="30" type="text">
                                        <input type="hidden" name="id"/>
                                        <div class="NOTIF_ERROR_kd_bank"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">Nama Bank</label>
                                        <input name="nm_bank" placeholder="Nama Account Bank .." class="form-control" maxlength="250" type="TEXT">
                                        <div class="NOTIF_ERROR_nm_bank"></div>
                                    </div>

                                </div>
                            </div>
                </form>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Simpan</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Block level buttons with icon -->
                        <div class="form-group">
                            <button type="button" class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up" data-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
</div>

<!-- Bootstrap modal insert-->

<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>" type="text/javascript"></script>
<!-- End Bootstrap modal -->

<!-- Bootstrap modal lookup-->
<div class="modal animated pulse text-left" id="modal_lookup" role="dialog" aria-labelledby="myModalLabel17"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i> Tambah User Baru</h4>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="control-label">Kode Bank</label>
                                        <input name="kd_bank" placeholder="Kode Account Bank .." class="form-control" maxlength="30" type="text" disabled>
                                        <input type="hidden" name="id"/>
                                        <div class="NOTIF_ERROR_kd_bank"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">Nama Bank</label>
                                        <input name="NM_KTGPRD" placeholder="Nama Account Bank .." class="form-control" maxlength="250" type="text" disabled>
                                        <div class="NOTIF_ERROR_nm_bank"></div>
                                    </div>

                                </div>
                            </div>
                </form>

                <div class="row">

                    <div class="col-md-12">
                        <!-- Block level buttons with icon -->
                        <div class="form-group">
                            <button type="button" class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up" data-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
</div>

<!-- Bootstrap modal insert-->
<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>" type="text/javascript"></script>
<script type="text/javascript">

    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 2*/
    var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
    tanpa_rupiah2.addEventListener('keyup', function(e)
    {
        tanpa_rupiah2.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 3*/
    var tanpa_rupiah3 = document.getElementById('tanpa-rupiah3');
    tanpa_rupiah3.addEventListener('keyup', function(e)
    {
        tanpa_rupiah3.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 4*/
    var tanpa_rupiah4 = document.getElementById('tanpa-rupiah4');
    tanpa_rupiah4.addEventListener('keyup', function(e)
    {
        tanpa_rupiah4.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 5*/
    var tanpa_rupiah5 = document.getElementById('tanpa-rupiah5');
    tanpa_rupiah5.addEventListener('keyup', function(e)
    {
        tanpa_rupiah5.value = formatRupiah(this.value);
    });

    /* Tanpa Rupiah 6*/
    var tanpa_rupiah6 = document.getElementById('tanpa-rupiah6');
    tanpa_rupiah6.addEventListener('keyup', function(e)
    {
        tanpa_rupiah6.value = formatRupiah(this.value);
    });



    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa  = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

</script>
<!-- End Bootstrap modal lookup-->
<!-- End Bootstrap modal -->