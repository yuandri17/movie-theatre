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
						<a href="<?php echo site_url('studio') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('studio/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama_studio">Nama Studio *</label>
								<input class="form-control <?php echo form_error('nama_studio') ? 'is-invalid':'' ?>"
								type="text" name="nama_studio" min="0" placeholder="Nama studio" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_studio') ?>
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