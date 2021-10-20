<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pengaturan Kontak dan Alamat
			<small>Update Pengaturan Kontak dan Alamat</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Pengaturan</h3>
					</div>
					<div class="box-body">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "sukses"){
								echo "<div class='alert alert-success'>Pengaturan telah diupdate!</div>";
							}
						}
						?>
						
						<?php foreach($setweb as $p){ ?>

							<form method="post" action="<?php echo base_url('dashboard/setweb_update') ?>" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Nama Website</label>
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama Website.." value="<?php echo $p->nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>

									<div class="form-group">
										<label>Deskripsi</label>
										<input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi website.." value="<?php echo $p->deskripsi; ?>">
										<?php echo form_error('deskripsi'); ?>
									</div>

									<div class="form-group">
										<label>Nomor Whatsapp</label>
										<input type="text" name="nowa" class="form-control" placeholder="Masukkan nomor Whatsapp .." value="<?php echo $p->nowa; ?>">
										<?php echo form_error('nowa'); ?>
									</div>

									<hr>

									<div class="form-group">
										<label>Link Facebook</label>
										<input type="text" name="linkfb" class="form-control" placeholder="Masukkan link facebook .." value="<?php echo $p->linkfb; ?>">
										<?php echo form_error('linkfb'); ?>
									</div>

									<div class="form-group">
										<label>Link Twitter</label>
										<input type="text" name="linktwitter" class="form-control" placeholder="Masukkan link twitter .." value="<?php echo $p->linktwitter; ?>">
										<?php echo form_error('linktwitter'); ?>
									</div>

									<div class="form-group">
										<label>Link Instagram</label>
										<input type="text" name="linkig" class="form-control" placeholder="Masukkan link instagram .." value="<?php echo $p->linkig; ?>">
										<?php echo form_error('link_instagram'); ?>
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" placeholder="Masukkan email .." value="<?php echo $p->email; ?>">
										<?php echo form_error('email'); ?>
									</div>
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>

						<?php } ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>