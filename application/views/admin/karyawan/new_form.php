<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
	<!-- <link href="../css/jquery.datetimepicker.min.css" rel="stylesheet"> -->
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/jquery.datetimepicker.min.css') ?>" rel="stylesheet">
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
					<?php echo $this->session->flashdata('success');?>
				</div>
				<?php 
				
				endif;?>
					
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/karyawan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<?php echo form_open_multipart('admin/karyawan/add');?>
						<form action="<?php base_url('admin/karyawan/add') ?>" method="post" enctype="multipart/form-data " >
						
							<div class="row">
							<div class="col-md-6 mb-3">
								<label for="nama_lengkap">Nama Lengkap<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>" 
								type="text" name="nama_lengkap" placeholder="Nama Lengkap" />
							
							</div>

							<div class="col-md-6 mb-3">
								<label for="tanggal_masuk">Tanggal Masuk<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tanggal_masuk') ? 'is-invalid':'' ?>"
								 type="text" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk">
								
							</div>
							</div>	
		
							<div class="row">
							<div class="col-md-6 mb-3">
								<label for="pendidikan">Pendidikan<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('pendidikan') ? 'is-invalid':'' ?>" 
								type="text" name="pendidikan" placeholder="Pendidikan Terakhir"/>
								 
							</div>
							<div class="col-md-6 mb-3">
								<label for="univ">Universitas<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('univ') ? 'is-invalid':'' ?>" 
								type="text" name="univ" placeholder="Universitas"/>
								
							</div>
							</div>

							<div class="row">
							<div class="col-md-3 mb-3">
								<label for="ttl">Tempat Lahir<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
								 type="text" name="tempat_lahir" placeholder="Tempat Lahir">
								
							</div>

							<div class="col-md-3 mb-3">
								<label for="ttl">Tanggal Lahir<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid':'' ?>" 
								id="tgl_lahir" type="text" name="tgl_lahir" placeholder="Tanggal lahir">
								
							</div>

							
							<div class="col-md-6 mb-3">
								<label for="no_ktp">No KTP<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('no_ktp') ? 'is-invalid':'' ?>" 
								type="number" name="no_ktp" placeholder="Nomor Karyawan"/>
								
							</div>	
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="nama_ayah">Nama Ayah<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_ayah') ? 'is-invalid':'' ?>" 
								type="text" name="nama_ayah" placeholder="Nama Ayah"/>
								 
							</div>

							<div class="col-md-6 mb-3">
								<label for="nama_ibu">Nama Ibu<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_ibu') ? 'is-invalid':'' ?>" 
								type="text" name="nama_ibu" placeholder="Nama Ibu"/>
								 
							</div>
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="nama_ss">Nama Suami/Istri</label>
								<input class="form-control "type="text" name="nama_ss" placeholder="Nama Suami/Istri"/>
								
							</div>	

							<div class="col-md-6 mb-3">
								<label for="no_paspor">No Passport</label>
								<input class="form-control " type="text" name="no_paspor" placeholder="Nomor Passport"/>
								 
							</div>
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="no_bpjs">No BPJS</label>
								<input class="form-control "	type="number" name="no_bpjs" placeholder="Nomor BPJS"/>
								 
							</div>

							<div class="col-md-6 mb-3">
								<label for="no_npwp">No NPWP</label>
								<input class="form-control"	type="number" name="no_npwp" placeholder="Nomor NPWP"/>
								 
							</div>
							</div>
						
							<div class = "row">
							<div class="col-md-6 mb-3">
								<label for="alamat">Alamat KTP</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
								name="alamat" placeholder="Alamat KTP..."></textarea>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="alamat">Alamat Sekarang</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
								name="alamat_now" placeholder="Alamat Sekarang..."></textarea>
								
							</div>
							</div>

							<div class="row">
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="city" placeholder="Kota" >
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="state" placeholder="Provinsi" >
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="mb-3 col-md-2 ml-0">
								
								<input type="number" class="form-control" name="zip" placeholder="Kode pos" >
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="city_now" placeholder="Kota" >
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="state_now" placeholder="Provinsi" >
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="mb-3 col-md-2 ml-0">
								
								<input type="number" class="form-control" name="zip_now" placeholder="Kode pos" >
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
							</div>
					
						
							<div class="row">
							<div class="mb-3 col-md-6">
								<label for="email">Email Kantor<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email_kantor') ? 'is-invalid':'' ?>" 
								type="text" name="email_kantor" placeholder="Email"/>
								 
							</div> 							
							<div class="mb-3 col-md-6">
								<label for="email">Email Pribadi<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email_pribadi') ? 'is-invalid':'' ?>" 
								type="text" name="email_pribadi" placeholder="Email"/>
								
							</div>
							</div>
										

							<div class="form-group mt-3">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								 type="file" name="image">
								<div class="invalid-feedback">
									<?php echo form_error('nama_lengkap') ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<label for="name">CV</label>
								<input class="form-control-file <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								 type="file" name="cv">
								<div class="invalid-feedback">
									<?php echo form_error('nama_lengkap') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="dokumen">Kontrak Kerja</label>
								<input class="form-control-file " type="file" name="kontrak_kerja" />
							</div>

							<input type="hidden" name="jbtn" value="2">
							<input type="hidden" name="jenis_kelamin" value="-">
					 
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url('css/jquery.datetimepicker.full.min.js') ?>"></script>
<script>
	$('#tgl_lahir').datetimepicker({
	timepicker: false,
	datepicker: true,
	format: 'd-m-Y',
	weeks: true,
	autoclose: true,
	todayHighlight: true,
	scrollMonth : false,
    scrollInput : false,
	});	
</script>
<script>
	$('#tanggal_masuk').datetimepicker({
	timepicker: false,
	datepicker: true,
	format: 'd-m-Y',
	weeks: true,
	autoclose: true,
	todayHighlight: true,
	scrollMonth : false,
    scrollInput : false,
	});	
</script>
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#doc').append('<tr id="row'+i+'"><td><input class="form-control-file " type="file" name="dokumen'+i+'" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></td></tr>');
		
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
});

</script>
<script>
	$('form').on('focus', 'input[type=number]', function (e) {
	$(this).on('wheel.disableScroll', function (e) {
	e.preventDefault()
	})
	})
	$('form').on('blur', 'input[type=number]', function (e) {
	$(this).off('wheel.disableScroll')
	})
</script>

