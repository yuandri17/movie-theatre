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
				<?php $this->load->view("studio/tabel_studio.php") ?>				
			</div>
			<!-- /.container-fluid -->
			<!-- Sticky Footer -->
			<?php $this->load->view("pages/footer.php") ?>
		</div>
		<!-- /.content-wrapper -->
	</div>
	<!-- /#wrapper -->
	<?php $this->load->view("pages/scrolltop.php") ?>
	<?php $this->load->view("pages/modal.php") ?>
	<?php $this->load->view("pages/js.php") ?>
	<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>
</html>