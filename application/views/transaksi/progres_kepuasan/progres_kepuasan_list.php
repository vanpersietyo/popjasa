    <body>
        <h2 style="margin-top:0px">Progres_kepuasan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('progres_kepuasan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('progres_kepuasan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('progres_kepuasan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Pelanggan</th>
		<th>Nama Perusahaan</th>
		<th>No Telp</th>
		<th>Info Order</th>
		<th>Info Order2</th>
		<th>Info Kepuasan</th>
		<th>Status Photo</th>
		<th>Status Photo Tgl</th>
		<th>Status Fb</th>
		<th>Status Ig</th>
		<th>Referensi Nama</th>
		<th>Referensi No Telp</th>
		<th>Action</th>
            </tr><?php
            foreach ($progres_kepuasan_data as $progres_kepuasan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $progres_kepuasan->nama_pelanggan ?></td>
			<td><?php echo $progres_kepuasan->nama_perusahaan ?></td>
			<td><?php echo $progres_kepuasan->no_telp ?></td>
			<td><?php echo $progres_kepuasan->info_order ?></td>
			<td><?php echo $progres_kepuasan->info_order2 ?></td>
			<td><?php echo $progres_kepuasan->info_kepuasan ?></td>
			<td><?php echo $progres_kepuasan->status_photo ?></td>
			<td><?php echo $progres_kepuasan->status_photo_tgl ?></td>
			<td><?php echo $progres_kepuasan->status_fb ?></td>
			<td><?php echo $progres_kepuasan->status_ig ?></td>
			<td><?php echo $progres_kepuasan->referensi_nama ?></td>
			<td><?php echo $progres_kepuasan->referensi_no_telp ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('progres_kepuasan/read/'.$progres_kepuasan->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('progres_kepuasan/update/'.$progres_kepuasan->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('progres_kepuasan/delete/'.$progres_kepuasan->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
