<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
		}
	</style>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/client/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/client/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="idc">ID Card<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('idc') ? 'is-invalid':'' ?>"
								 type="number" name="idc" placeholder="ID Card" />
								<div class="invalid-feedback">
									<?php echo form_error('idc') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Name<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Full name" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="notlp">Phone Number<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('notlp') ? 'is-invalid':'' ?>"
								 type="number" name="notlp" placeholder="Phone number" />
								<div class="invalid-feedback">
									<?php echo form_error('ntlp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">Email<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="email" name="email" placeholder="Email" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="industri">Industry</label>
								<input class="form-control "type="text" name="industri" placeholder="Industry name" />
							</div>

							<div class="form-group">
								<label for="alamat">Address</label>
								<textarea class="form-control " name="alamat" placeholder="Address..."></textarea>
							</div>

							<div class="form-group mt-3">
								<label for="name">Photo</label>
								<input class="form-control-file" type="file" name="image" />
								
							</div>

							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
					<?php echo"<font color ='red'>*</font>"?> required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
