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
						<a href="<?php echo site_url('jadwal') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('jadwal/edit') ?>" method="post" enctype="multipart/form-data" >
							<input type="hidden" name="id" value="<?php echo $jadwal->id_jadwal ?>" />
							<div class="form-group">
								<label for="judul">Judul Film*</label>
								<?php
								 	echo select_option('judul','tbl_film','judul','id_film',$jadwal->id_film,null,null,'<option>Pilih Film</option>');
								 ?>
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="studio">Studio *</label>
								<?php
								 	echo select_option('studio','tbl_studio','nama_studio','id_studio',$jadwal->id_studio,null,null,'<option>Pilih Studio</option>');
								 ?>
								<div class="invalid-feedback">
									<?php echo form_error('studio') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="tanggal_tayang">Tanggal Tayang *</label>
								<input class="form-control <?php echo form_error('tanggal_tayang') ? 'is-invalid':'' ?>"
								type="date" name="tanggal_tayang" min="0" placeholder="Tanggal Tayang" value="<?php echo $jadwal->tanggal_tayang ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_tayang') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jam_tayang">Jam Tayang *</label>
								<input class="form-control <?php echo form_error('jam_tayang') ? 'is-invalid':'' ?>"
								type="time" name="jam_tayang" min="0" placeholder="Jam Tayang" value="<?php echo $jadwal->jam_tayang ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jam_tayang') ?>
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