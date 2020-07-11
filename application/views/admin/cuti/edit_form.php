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

				<!-- <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?> -->

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/cuti/') ?>" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('admin/cuti/edit') ?>" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id" value="<?php echo $cuti->id?>"/>
						<div>
								<label for="name">Pilih Karyawan<?php echo"<font color ='red'>*</font>"?></label>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name="karyawan_id" id="karyawan_id" value="<?php foreach($karyawan as $kr){	if($cuti->karyawan_id==$kr->karyawan_id) echo $kr->karyawan_id;}?>">
								<input type="text" name="name_karyawan" placeholder="Nama Karyawan" id="name_karyawan" value="<?php foreach($karyawan as $kr){	if($cuti->karyawan_id==$kr->karyawan_id) echo $kr->namakr;}?>" 
								class="form-control <?php echo form_error('karyawan_id') ? 'is-invalid':'' ?>">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						
						
							<div class="form-group">
								<label for="name">Tanggal Masuk<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('mulai') ? 'is-invalid':'' ?>"
								 type="text" name="mulai" id="mulai" placeholder="Exp. 11-11-2011" value="<?php echo $cuti->tanggal?>"/>
								 <div class="invalid-feedback">
									<?php echo form_error('mulai') ?>
								</div>
								 </div>
								
							<div class="form-group">
								<label for="absen">Absen<?php echo"<font color ='red'>*</font>"?></label>
								<div>
								<label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" checked="" class="custom-control-input" value="tahunan" <?php echo ($cuti->jenis_cuti == "tahunan" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >Tahunan</span>
								</label>
								
								<label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" class="custom-control-input" value="lembur" <?php echo ($cuti->jenis_cuti == "lembur" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >Lembur</span>
								</label>
								
								<label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" class="custom-control-input" value="lainnya" <?php echo ($cuti->jenis_cuti == "lainnya" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >Lainnya</span>
								</label>
								
								<!-- <label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" class="custom-control-input" value="A" <?php echo ($absen->absensi == "A" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >Alpha</span>
								</label> -->
							</div>
							</div>
							<div class="form-group">
							<label for="alamat">keterangan</label>
								<textarea class="form-control" name="keterangan" autocomplete="off" placeholder="Keterangan Lembur..."><?= $cuti->keterangan?></textarea>
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
