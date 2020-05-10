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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/karyawan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
							<div class="form-group">
								<label for="no_karyawan">No Karyawan*</label>
								<input class="form-control <?php echo form_error('no_karyawan') ? 'is-invalid':'' ?>" 
								type="text" name="no_karyawan" placeholder="Nomor Karyawan"/>
								 <div class="invalid-feedback">
									<?php echo form_error('no_karyawan') ?>
							</div>
							</div>

							<div class="form-group">
								<label for="nama_lengkap">Nama Lengkap*</label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>" 
								type="text" name="nama_lengkap" placeholder="Nama Lengkap"/>
								 <div class="invalid-feedback">
									<?php echo form_error('nama_lengkap') ?>
								</div>
							</div>		

							<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin*</label>
							<select class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>" 
							name="jenis_kelamin">
								<option selected>Pilih...</option>
								<option value="Laki - laki">Laki - laki</option>
								<option value="Perempuan">Perempuan</option>
								<option value="Lainnya">Lainnya</option>
							</select>
							<div class="invalid-feedback">
									<?php echo form_error('jenis_kelamin') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" 
								type="text" name="email" placeholder="Email"/>
								 <div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
								name="alamat" placeholder="Alamat..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mb-3">
								<label for="city">Kota</label>
								<input type="text" class="form-control" name="city" placeholder="Kota" >
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-3 mb-3">
								<label for="state">Provinsi</label>
								<input type="text" class="form-control" name="state" placeholder="Provinsi" >
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="col-md-3 mb-3">
								<label for="zip">Kode pos</label>
								<input type="text" class="form-control" name="zip" placeholder="Kode pos" >
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
							</div>

							<div class="form-group">
							<label for="jabatan">Jabatan</label>
							<select class="form-control" name="jbtn">
								<option selected>Pilih...</option>
								<?php foreach ($jabatan as $jb) {
										echo '<option value="'.$jb->jabatan_id.'">'.$jb->jabatan_name.'</option>';
								}?>
							</select>
							</div>

							<div class="form-group">
							<label for="jenis_karyawan">Jenis karyawan</label>
							<select class="form-control" name="jenis_karyawan">
								<option selected>Pilih...</option>
								<option value="Tetap">Tetap</option>
								<option value="Freelance">Freelance</option>
								
							</select>
							</div>

							<div class="form-group">
								<label for="tanggal_masuk">Tanggal Masuk*</label>
								<input class="form-control <?php echo form_error('tanggal_masuk') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_masuk">
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_masuk') ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<label for="foto">Photo</label>
								<input class="form-control-file " type="file" name="foto" />
							</div>

						
					</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
