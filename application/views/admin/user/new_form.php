<!DOCTYPE html>
<html lang="en">

<head></head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?> -->

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/user/add') ?>" method="post" enctype="multipart/form-data" >
							
							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error() ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Username<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="Username" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Password<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="password" placeholder="Password" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Email<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" placeholder="Email" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Full Name<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('full_name') ? 'is-invalid':'' ?>" 
								type="text" name="full_name" placeholder="Full Name" >
								<div class="invalid-feedback">
									<?php echo form_error('full_name') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Phone<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>" 
								type="text" name="phone" placeholder="Phone" >
								<div class="invalid-feedback">
									<?php echo form_error('phone') ?>
								</div>
							</div>

							<div class="form-group">
  								<label for="name">Role<?php echo"<font color ='red'>*</font>"?></label>
								  <select name="role" class="form-control">
								  <!-- <option disable selected value="">Choose One...</option> -->
									<option value="admin" selected>Admin</option>
									<?php if($this->fungsi->user_login()->role == "admin") { ?>
										<option value="superadmin" disabled>Superadmin</option>
									<?php }else{?>
										<option value="superadmin">Superadmin</option>
									<?php }?>
								</select>
							</div>

							<input class="btn btn-success w-100" type="submit" name="btn" value="Save" />
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
