    <body>
        <h2 style="margin-top:0px">Progres_kepuasan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Pelanggan <?php echo form_error('nama_pelanggan') ?></label>
            <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo $nama_pelanggan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Telp <?php echo form_error('no_telp') ?></label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Info Order <?php echo form_error('info_order') ?></label>
            <input type="text" class="form-control" name="info_order" id="info_order" placeholder="Info Order" value="<?php echo $info_order; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Info Order2 <?php echo form_error('info_order2') ?></label>
            <input type="text" class="form-control" name="info_order2" id="info_order2" placeholder="Info Order2" value="<?php echo $info_order2; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Info Kepuasan <?php echo form_error('info_kepuasan') ?></label>
            <input type="text" class="form-control" name="info_kepuasan" id="info_kepuasan" placeholder="Info Kepuasan" value="<?php echo $info_kepuasan; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Status Photo <?php echo form_error('status_photo') ?></label>
            <input type="text" class="form-control" name="status_photo" id="status_photo" placeholder="Status Photo" value="<?php echo $status_photo; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Status Photo Tgl <?php echo form_error('status_photo_tgl') ?></label>
            <input type="text" class="form-control" name="status_photo_tgl" id="status_photo_tgl" placeholder="Status Photo Tgl" value="<?php echo $status_photo_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Fb <?php echo form_error('status_fb') ?></label>
            <input type="text" class="form-control" name="status_fb" id="status_fb" placeholder="Status Fb" value="<?php echo $status_fb; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Ig <?php echo form_error('status_ig') ?></label>
            <input type="text" class="form-control" name="status_ig" id="status_ig" placeholder="Status Ig" value="<?php echo $status_ig; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Referensi Nama <?php echo form_error('referensi_nama') ?></label>
            <input type="text" class="form-control" name="referensi_nama" id="referensi_nama" placeholder="Referensi Nama" value="<?php echo $referensi_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Referensi No Telp <?php echo form_error('referensi_no_telp') ?></label>
            <input type="text" class="form-control" name="referensi_no_telp" id="referensi_no_telp" placeholder="Referensi No Telp" value="<?php echo $referensi_no_telp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('progres_kepuasan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
