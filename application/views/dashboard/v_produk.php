<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Produk
			<small>Manajemen Produk</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				<a href="<?php echo base_url().'dashboard/produk_tambah'; ?>" class="btn btn-sm btn-primary">Buat Produk baru</a>
				<br/>
				<br/>
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Produk</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th width="1%">NO</th>
										<th>Tanggal</th>
										<th>produk</th>
										<th>Kategori</th>
										<th width="10%">Gambar</th>
										<th>Status</th>
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($produk as $a){ 
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo date('d/m/Y H:i', strtotime($a->pdate)); ?></td>
											<td>
												<?php echo $a->pjudul; ?>
												<br/>
												<small class="text-muted">
													<?php echo base_url()."".$a->pslug; ?>
												</small>
											</td>
											<td><?php echo $a->knama; ?></td>
											<td><img width="100%" class="img-responsive" src="<?php echo base_url().'/gambar/produk/'.$a->psampul; ?>"></td>
											<td>
												<?php 
												if($a->pstatus=="publish"){
													echo "<span class='label label-success'>Publish</span>"; 
												}else{
													echo "<span class='label label-danger'>Draft</span>"; 
												}
												?>

											</td>
											<td>
												<a target="_blank" href="<?php echo base_url().$a->pslug; ?>" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>
													<a href="<?php echo base_url().'dashboard/produk_edit/'.$a->pid; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
													<a href="<?php echo base_url().'dashboard/produk_hapus/'.$a->pid; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
													<?php
												}
												?>
											</td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>