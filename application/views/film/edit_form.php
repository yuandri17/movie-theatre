<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("pages/head.php") ?>
</head>
<body id="page-top">
	<?php $this->load->view("pages/navbar.php") ?>
	<div id="wrapper">
		<?php $this->load->view("pages/sidebar.php") ?>
		<div id="content-wrapper">
			<div class="container-fluid">
				<?php $this->load->view("pages/breadcrumb.php") ?>
				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong><span class="fa fa-check-circle"></span></strong>
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('film') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('film/edit') ?>" method="post" enctype="multipart/form-data" >
							<input type="hidden" name="id" value="<?php echo $film->id_film ?>" />
							<div class="form-group">
								<label for="judul">Judul *</label>
								<input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								type="text" name="judul" min="0" placeholder="Judul" value="<?php echo $film->judul ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="genre">Genre *</label>
								<!-- <input class="form-control <?php echo form_error('genre') ? 'is-invalid':'' ?>"
								type="text" name="genre" min="0" placeholder="Genre" value="<?php echo $film->genre ?>" /> -->
								<?php
								 	echo select_option('genre','tbl_genre','nama_genre','id_genre',$film->id_genre,null,null,'<option>Pilih Genre</option>');
								 ?>
								<div class="invalid-feedback">
									<?php echo form_error('genre') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="rumah_produksi">Rumah Produksi *</label>
								<input class="form-control <?php echo form_error('rumah_produksi') ? 'is-invalid':'' ?>"
								type="text" name="rumah_produksi" min="0" placeholder="Rumah Produksi" value="<?php echo $film->rumah_produksi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('rumah_produksi') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="tahun_produksi">Tahun Produksi *</label>
								<input class="form-control <?php echo form_error('tahun_produksi') ? 'is-invalid':'' ?>"
								type="number" name="tahun_produksi" min="0" placeholder="Tahun Produksi" value="<?php echo $film->tahun_produksi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tahun_produksi') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="durasi">Durasi *</label>
								<input class="form-control <?php echo form_error('durasi') ? 'is-invalid':'' ?>"
								type="time" name="durasi" min="0" placeholder="Durasi" value="<?php echo $film->durasi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('durasi') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="tanggal_mulai">Tanggal Mulai *</label>
								<input class="form-control <?php echo form_error('tanggal_mulai') ? 'is-invalid':'' ?>"
								type="date" name="tanggal_mulai" min="0" placeholder="Tanggal Mulai" value="<?php echo $film->tanggal_mulai ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_mulai') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="tanggal_selesai">Tanggal Selesai *</label>
								<input class="form-control <?php echo form_error('tanggal_selesai') ? 'is-invalid':'' ?>"
								type="date" name="tanggal_selesai" min="0" placeholder="Tanggal Selesai" value="<?php echo $film->tanggal_selesai ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_selesai') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="sinopsis">Sinopsis *</label>
								<textarea class="form-control <?php echo form_error('sinopsis') ? 'is-invalid':'' ?>"
									name="sinopsis" placeholder="Sinopsis..."><?php echo $film->sinopsis ?></textarea>
									<div class="invalid-feedback">
										<?php echo form_error('sinopsis') ?>
									</div>
								</div>
								<div class="form-group">
									<label for="poster">Poster</label>
									<div>
										<img src="<?php echo base_url('upload/film/'.$film->poster) ?>" height="150" />
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label>Change Photo </label>
										<input class="form-control-file <?php echo form_error('poster') ? 'is-invalid':'' ?>" name="image" type="file">
										<input type="hidden" name="old_image" value="<?php echo $film->poster ?>" />
										<span class="help-block"></span>
									<div class="invalid-feedback">
										<?php echo form_error('poster') ?>
									</div>
								</div>
								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>
						</div>
						<div class="card-footer small text-muted">
							* Required Fields
						</div>
					</div>
					<!-- /.container-fluid -->
					<!-- Sticky Footer -->
					<?php $this->load->view("pages/footer.php") ?>
				</div>
				<!-- /.content-wrapper -->
			</div>
			<!-- /#wrapper -->
			<?php $this->load->view("pages/scrolltop.php") ?>
			<?php $this->load->view("pages/js.php") ?>
		</body>
		</html>