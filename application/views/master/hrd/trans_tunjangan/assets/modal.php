<script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>


<!-- Bootstrap modal insert-->
<div class="modal animated pulse text-left" id="modal_form" role="dialog" aria-labelledby="myModalLabel17"
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
                      <input type="hidden" value="" name="id_karyawan"/>
                     <div class="form-body">
                         <div class="form-group">
                           <div class="row">
                             <div class="col-md-6">
                               <label class="control-label">Nama Karyawan</label>
                                 <input name="nama_karyawan" placeholder="Nama Karyawn .." class="form-control" type="text" disabled>
                                 <input type="hidden" name="id"/>
                                  <div class="NOTIF_ERROR_nama_karyawan"></div>
                             </div>
                             <div class="col-md-6">
                             <label class="control-label">Jenis Kelamin</label>
                                 <select class="form-control" name="jns_kelamin" disabled>
                                  <option value=""> --- </option>
                                    <option value="L"> Laki - Laki </option>
                                    <option value="P"> Perempuan </option>
                                </select>
                                <div class="NOTIF_ERROR_jns_kelamin"></div>
                             </div>

                              <div class="col-md-6">
                                <label class="control-label">Status Karyawan</label>
                                 <select class="form-control" name="status_karyawan" disabled>
                                  <option value=""> --- </option>
                                    <option value="1"> Bekerja </option>
                                    <option value="2"> Tidak Bekerja </option>
                                </select>
                                <div class="NOTIF_ERROR_status_karyawan"></div>
                             </div>
                            <div class="col-md-6">
                             <label for="issueinput5">Jabatan</label>
                             <select class="form-control" name="id_jabatan" disabled>
                                <option value=""> --- </option>
                                <?php foreach ($jabatan as $jabatan) { ?>
                                  <option value="<?php echo $jabatan->id_jabatan ?>"> <?php echo "$jabatan->nama_jabatan" ?> </option>
                                <?php }?>
                              </select>
                              <div class="NOTIF_ERROR_id_jabatan"></div>
                              </div>
                              <div class="col-md-12">
                                <label for="issueinput5">Jumlah Gaji / Bulan</label>
                                <input type="text" name="jml_gaji" class="form-control" required="" disabled>
                                   <div class="NOTIF_ERROR_jml_gaji"></div>
                              </div>

                              <div class="col-md-12">
                               <label for="issueinput5">Tunjangan</label>
                               <select class="form-control" name="id_tunjangan">
                                  <option value=""> --- </option>
                                  <?php foreach ($tunjangan as $tunjangan) { ?>
                                    <option value="<?php echo $tunjangan->id_tunjangan ?>"> <?php echo "$tunjangan->keterangan" ?> </option>
                                  <?php }?>
                                </select>
                                <div class="NOTIF_ERROR_id_potongan"></div>
                              </div>

                              <div class="col-md-12">
                                <label for="issueinput5">Jumlah Tunjangan</label>
                                <input type="text" name="jumlah" class="form-control" id="tanpa-rupiah" required="" >
                                   <div class="NOTIF_ERROR_jumlah"></div>
                              </div>

                              <div class="col-md-12">
                                <br>
                                <label for="issueinput5">Keterangan</label>
                                <textarea name="keterangan" placeholder="Keterangan .." class="form-control" type="textarea"></textarea>
                              </div>
                            </div><!-- row-->

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

/* Dengan Rupiah */
var dengan_rupiah = document.getElementById('dengan-rupiah');
dengan_rupiah.addEventListener('keyup', function(e)
{
 dengan_rupiah.value = formatRupiah(this.value);
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
