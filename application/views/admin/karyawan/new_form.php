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

				
					
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/karyawan/') ?>"style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<?php echo form_open_multipart('admin/karyawan/add');?>
						<form action="<?php base_url('admin/karyawan/add') ?>" method="post" enctype="multipart/form-data " >
						
							<div class="row">
							<div class="col-md-6 mb-3">
								<label for="nama_lengkap">Fullname<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>" 
								type="text" name="nama_lengkap" autocomplete="off" placeholder="Fullname" />
							
							</div>

							<div class="col-md-6 mb-3">
								<label for="tanggal_masuk">First Date of Work<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tanggal_masuk') ? 'is-invalid':'' ?>"
								 type="text" id="tanggal_masuk" name="tanggal_masuk"  autocomplete="off" placeholder="dd-mm-yyyy">
								
							</div>
							</div>	
		
							<div class="row">
							<div class="col-md-6 mb-3">
								<label for="pendidikan">Academic Background<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('pendidikan') ? 'is-invalid':'' ?>" 
								type="text" name="pendidikan" autocomplete="off" placeholder="Academic Background"/>
								 
							</div>
							<div class="col-md-6 mb-3">
								<label for="univ">Universitas<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('univ') ? 'is-invalid':'' ?>" 
								type="text" name="univ" autocomplete="off" placeholder="Universitas"/>
								
							</div>
							</div>

							<div class="row">
							<div class="col-md-3 mb-3">
								<label for="ttl">Place of Birth<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
								 type="text" name="tempat_lahir" autocomplete="off" placeholder="Place of Birth">
								
							</div>

							<div class="col-md-3 mb-3">
								<label for="ttl">Date of Birth<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid':'' ?>" 
								id="tgl_lahir" type="text" name="tgl_lahir" autocomplete="off" placeholder="dd-mm-yyyy">
								
							</div>

							
							<div class="col-md-6 mb-3">
								<label for="no_ktp">ID Card Number<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('no_ktp') ? 'is-invalid':'' ?>" 
								type="number" name="no_ktp" autocomplete="off" placeholder="ID Card Number"/>
								
							</div>	
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="nama_ayah">Father's Name<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_ayah') ? 'is-invalid':'' ?>" 
								type="text" name="nama_ayah" autocomplete="off" placeholder="Father Name"/>
								 
							</div>

							<div class="col-md-6 mb-3">
								<label for="nama_ibu">Mother's Name<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_ibu') ? 'is-invalid':'' ?>" 
								type="text" name="nama_ibu" autocomplete="off" placeholder="Mother Name"/>
								 
							</div>
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="nama_ss">Spouse Name</label>
								<input class="form-control "type="text" name="nama_ss" autocomplete="off" 
								placeholder="Spouse Name"/>
								
							</div>	

							<div class="col-md-6 mb-3">
								<label for="no_paspor">Passport Number</label>
								<input class="form-control " type="text" autocomplete="off"
								 name="no_paspor" placeholder="Passport Number"/>
								 
							</div>
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="no_bpjs">BPJS Number</label>
								<input class="form-control " type="number" name="no_bpjs" autocomplete="off" 
								placeholder="BPJS Number"/>
								 
							</div>

							<div class="col-md-6 mb-3">
								<label for="no_npwp">NPWP Number</label>
								<input class="form-control"	type="number" name="no_npwp" autocomplete="off" 
								placeholder="NPWP Number"/>
								 
							</div>
							</div>
							<div class = "row">
							<div class="col-md-6 mb-3">
								<label for="alamat">ID Card Address</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
								name="alamat" autocomplete="off" placeholder="ID Card Address..."></textarea>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="alamat">Address Now</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
								name="alamat_now" autocomplete="off" placeholder="Address Now..."></textarea>
								
							</div>
							</div>

							<div class="row">
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control"  autocomplete="off" name="city" placeholder="City" >
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" autocomplete="off" name="state" placeholder="State" >
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="mb-3 col-md-2 ml-0">
								
								<input type="number" class="form-control" autocomplete="off" name="zip" placeholder="ZIP Code" >
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" autocomplete="off" name="city_now" placeholder="City Now" >
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" autocomplete="off" name="state_now" placeholder="State Now" >
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="mb-3 col-md-2 ml-0">
								
								<input type="number" class="form-control" autocomplete="off" name="zip_now" placeholder="ZIP Code Now" >
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
							</div>

							<div class="row">
							<div class="mb-3 col-md-6">
								<label for="email">Work Email<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email_kantor') ? 'is-invalid':'' ?>" 
								type="text" name="email_kantor" autocomplete="off" placeholder="Work Email"/>
								 
							</div> 							
							<div class="mb-3 col-md-6">
								<label for="email">Personal Email<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email_pribadi') ? 'is-invalid':'' ?>" 
								type="text" name="email_pribadi" autocomplete="off" placeholder="Personal Email"/>
								
							</div>
							</div>

							<div class="row">							
							<div class="col-md-6">
								<label for="no_bpjs">Type of Employee<?php echo"<font color ='red'>*</font>"?></label>
							<select class="form-control" autocomplete="off" name="jenis_karyawan">
								<option disable selected value="">Choose One...</option>
								<option value="tetap">In-House</option>
								<option value="kontrak">Contract</option>
								<option value="probation">Probation</option>
								<!-- <option value="Lainnya">Lainnya</option> -->
							</select>
								 
							</div>

							<div class="col-md-6" hidden id="habis">
							<label for="tanggal_habis">Employment Contract Expiration Date<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control" type="text" id="tanggal_habis" name="tanggal_habis" placeholder="dd-mm-yyyy"  autocomplete="off">
								 
							</div>
							
							</div>
				
							<div class="form-group mt-3">
								<label for="image">Photo</label>
								<input class="form-control-file " type="file" name="image" accept=".png,.jpg,.jpeg" required>
							</div>

							<div class="form-group mt-3">
								<label for="image">Photo ID Card</label>
								<input class="form-control-file " type="file" name="fktp" accept=".png,.jpg,.jpeg" required>
							</div>

							<div class="form-group mt-3">
								<label for="cv">CV</label>
								<input class="form-control-file  " type="file" name="cv" accept=".pdf" required>
								
							</div>

							<div class="form-group">
								<label for="kontrak_kerja">Employment Contract</label>
								<input class="form-control-file " type="file" name="kontrak_kerja" accept=".pdf" required />
							</div>

							<input type="hidden" name="jbtn" value="2">
							<input type="hidden" name="jenis_kelamin" value="-">
					 
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
	$('#tanggal_habis').datetimepicker({
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
$('select').change(function(){
var theVal = $(this).val();
switch(theVal){
case 'tetap':
	$('#habis').prop('hidden', true);
	$('#tanggal_habis').val('');
break;
case 'kontrak':
	$('#habis').prop('hidden', false);
break;
case 'probation':
	$('#habis').prop('hidden', false);
break;
default:
$('#habis').prop('hidden', true);
	$('#tanggal_habis').val('');
break;
}
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

