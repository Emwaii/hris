<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
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
						<a href="<?php echo site_url('admin/karyawan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/karyawan/add') ?>" method="post" enctype="multipart/form-data" >
						<div class="row">
								<div class="col">
								<label for="name">Nama Depan*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="fname" placeholder="Nama Depan"/>
								 <div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
								 </div>

								 <div class="col">
								<label for="name">Nama Belakang*</label>
								<input class="form-control <?php  echo  form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="lname" placeholder="Nama Belakang"/>
								 <div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
								</div>
							</div>

							<div class="form-group">
							<label class="my-1 mr-2 mt-3" for="jenis_kelamin">Jenis Kelamin</label>
							<select class="custom-select my-1 mr-sm-2" name="jenis_kelamin">
								<option selected>Pilih...</option>
								<option value="1">Laki - laki</option>
								<option value="2">Perempuan</option>
								<option value="3">Lainnya</option>
							</select>
							</div>

							<div class="form-group">
								<label for="name">Alamat</label>
								<textarea class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 name="alamat" placeholder="Alamat..."></textarea>
								<!-- <div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div> -->
							</div>

							<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="city">Kota</label>
								<input type="text" class="form-control" name="city" placeholder="Kota" required>
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-3 mb-3">
								<label for="state">Provinsi</label>
								<input type="text" class="form-control" name="state" placeholder="Provinsi" required>
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="col-md-3 mb-3">
								<label for="zip">Kode pos</label>
								<input type="text" class="form-control" name="zip" placeholder="Kode pos" required>
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
							</div>

							<div class="form-group">
							<label class="my-1 mr-2" for="jabatan">Jabatan</label>
							<select class="custom-select my-1 mr-sm-2" name="jabatan">
								<option selected>Choose...</option>
								<option value="1">Project Manager</option>
								<option value="2">Director</option>
								<option value="3">HRD</option>
								<option value="4">Employe</option>
								<option value="5">Office Boy</option>
							</select>
							</div>

							<div class="form-group">
							<label class="my-1 mr-2" for="jenis_karyawan">Jenis karyawan</label>
							<select class="custom-select my-1 mr-sm-2" name="jenis_karyawan">
								<option selected>Choose...</option>
								<option value="1">Tetap</option>
								<option value="2">Freelance</option>
								
							</select>
							</div>

							<div class="form-group">
								<label for="name">Tanggal Masuk*</label>
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_masuk">
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="file" name="foto" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<label for="name">Dokumen</label>
								<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="file" name="dokumen" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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
