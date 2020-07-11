<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
				
				<!-- <?php if ($this->session->flashdata('success')){ ?>
				
				    <div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success');
					
					// redirect('admin/karyawan/edit',"refresh");
					?>
					
				</div>
				<?php } ?> -->

				
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/karyawan/') ?>" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<!-- <?php echo form_open_multipart('admin/karyawan/edit');?> -->
						<form action="<?php base_url('admin/karyawan/edit') ?>" method="post" enctype="multipart/form-data" >
						
						<input type="hidden" name="id" value="<?php echo $karyawan->karyawan_id?>" />

						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="nama_lengkap">Nama Lengkap<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>" 
								type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $karyawan->nama_lengkap?>"/>
							
							</div>

							<div class="col-md-6 mb-3">
								<label for="tanggal_masuk">Tanggal Masuk<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tanggal_masuk') ? 'is-invalid':'' ?>"
								 type="text" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk" value="<?php echo $karyawan->tanggal_masuk?>">
								
							</div>
							</div>	
		
							<div class="row">
							<div class="col-md-6 mb-3">
								<label for="pendidikan">Pendidikan<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('pendidikan') ? 'is-invalid':'' ?>" 
								type="text" name="pendidikan" placeholder="Pendidikan Terakhir" value="<?php echo $karyawan->pendidikan?>"/>
								 
							</div>
							<div class="col-md-6 mb-3">
								<label for="univ">Universitas<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('univ') ? 'is-invalid':'' ?>" 
								type="text" name="univ" placeholder="Universitas" value="<?php echo $karyawan->universitas?>"/>
								
							</div>
							</div>

							<div class="row">
							<div class="col-md-3 mb-3">
								<label for="ttl">Tempat Lahir<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
								 type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $karyawan->ttl?>">
								
							</div>

							<div class="col-md-3 mb-3">
								<label for="ttl">Tanggal Lahir<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid':'' ?>" 
								id="tgl_lahir" type="text" name="tgl_lahir" placeholder="Tanggal lahir" value="<?php echo $karyawan->tgl_lahir?>">
								
							</div>

							
							<div class="col-md-6 mb-3">
								<label for="no_ktp">No KTP<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('no_ktp') ? 'is-invalid':'' ?>" 
								type="number" name="no_ktp" placeholder="Nomor Karyawan" value="<?php echo $karyawan->id_card?>"/>
								
							</div>	
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="nama_ayah">Nama Ayah<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_ayah') ? 'is-invalid':'' ?>" 
								type="text" name="nama_ayah" placeholder="Nama Ayah" value="<?php echo $karyawan->nama_ayah?>"/>
								 
							</div>

							<div class="col-md-6 mb-3">
								<label for="nama_ibu">Nama Ibu<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('nama_ibu') ? 'is-invalid':'' ?>" 
								type="text" name="nama_ibu" placeholder="Nama Ibu" value="<?php echo $karyawan->nama_ibu?>"/>
								 
							</div>
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="nama_ss">Nama Suami/Istri</label>
								<input class="form-control "type="text" name="nama_ss" placeholder="Nama Suami/Istri" value="<?php echo $karyawan->nama_ss?>"/>
								
							</div>	

							<div class="col-md-6 mb-3">
								<label for="no_paspor">No Passport</label>
								<input class="form-control " type="text" name="no_paspor" placeholder="Nomor Passport" value="<?php echo $karyawan->no_pasport?>"/>
								 
							</div>
							</div>

							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="no_bpjs">No BPJS</label>
								<input class="form-control "	type="number" name="no_bpjs" placeholder="Nomor BPJS" value="<?php echo $karyawan->no_bpjs?>"/>
								 
							</div>

							<div class="col-md-6 mb-3">
								<label for="no_npwp">No NPWP</label>
								<input class="form-control"	type="number" name="no_npwp" placeholder="Nomor NPWP" value="<?php echo $karyawan->no_bpjs?>"/>
								 
							</div>
							</div>
												
							<div class="row">							
							<div class="col-md-6 mb-3">
								<label for="no_bpjs">Jenis Karyawan<?php echo"<font color ='red'>*</font>"?></label>
							<select class="form-control" autocomplete="off" name="jenis_karyawan">
								<option disable selected>Pilih...</option>
								<option value="kontrak"<?php if($karyawan->jenis_karyawan=="kontrak") echo 'selected="selected"'; ?>>Kontrak</option>
								<option value="probation"<?php if($karyawan->jenis_karyawan=="probation") echo 'selected="selected"'; ?>>Probation</option>
								<!-- <option value="Lainnya">Lainnya</option> -->
							</select>
								 
							</div>

							<div class="col-md-6 mb-3">
							<label for="tanggal_habis">Tanggal Habis Kontrak<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control" type="text" id="tanggal_habis" name="tanggal_habis"  autocomplete="off" placeholder="<?= $karyawan->tgl_habis?>">
								 
							</div>
							</div>

							<div class = "row">
							<div class="col-md-6 mb-3">
								<label for="alamat">Alamat KTP</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
								name="alamat" placeholder="Alamat KTP..."><?php echo $karyawan->alamat?></textarea>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="alamat">Alamat Sekarang</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" 
								name="alamat_now" placeholder="Alamat Sekarang..."><?php echo $karyawan->alamat_now?></textarea>
								
							</div>
							</div>

							<div class="row">
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="city" placeholder="Kota" value="<?php echo $karyawan->city?>" >
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="state" placeholder="Provinsi"value="<?php echo $karyawan->state?>" >
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="mb-3 col-md-2 ml-0">
								
								<input type="number" class="form-control" name="zip" placeholder="Kode pos" value="<?php echo $karyawan->zip?>" >
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="city_now" placeholder="Kota" value="<?php echo $karyawan->city_now?>">
								<div class="invalid-feedback">
									Please provide a valid city.
								</div>
								</div>
								<div class="col-md-2 mb-3 ml-0">
								
								<input type="text" class="form-control" name="state_now" placeholder="Provinsi" value="<?php echo $karyawan->state_now?>">
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>
								</div>
								<div class="mb-3 col-md-2 ml-0">
								
								<input type="number" class="form-control" name="zip_now" placeholder="Kode pos" value="<?php echo $karyawan->zip_now?>">
								<div class="invalid-feedback">
									Please provide a valid zip code.
								</div>
								</div>
							</div>
					
						
							<div class="row">
							<div class="mb-3 col-md-6">
								<label for="email">Email Kantor<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email_kantor') ? 'is-invalid':'' ?>" 
								type="text" name="email_kantor" placeholder="Email Kantor" value="<?php echo $karyawan->email_kantor?>"/>
								 
							</div> 							
							<div class="mb-3 col-md-6">
								<label for="email">Email Pribadi<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('email_pribadi') ? 'is-invalid':'' ?>" 
								type="text" name="email_pribadi" placeholder="Email Pribadi" value="<?php echo $karyawan->email_pribadi?>"/>
								
							</div>
							</div>

							<div class="row">
							<div class="col-md-6 mb-3">
							<label for="jenis_kelamin">Jenis Kelamin<?php echo"<font color ='red'>*</font>"?></label>
							<select class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>" 
							name="jenis_kelamin">
							<option disable selected>Pilih...</option>
							<option value="Laki - laki" <?php if($karyawan->jenis_kelamin=="Laki - laki") echo 'selected="selected"'; ?>>Laki - laki</option>
							<option value="Perempuan" <?php if($karyawan->jenis_kelamin=="Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
							<option value="Lainnya">Lainnya</option>
							</select>
							<div class="invalid-feedback">
									<?php echo form_error('jenis_kelamin') ?>
								</div>
							</div>							

							<div class="col-md-6 mb-3">
							<label for="jabatan">Jabatan</label>
							<select class="form-control" name="jbtn">
								<option disable selected>Pilih...</option>
								<?php foreach ($jabatan as $jb) {?>
									
								<option value="<?php echo $jb->jabatan_id ?>" <?php if($karyawan->jabatan_id==$jb->jabatan_id) echo 'selected="selected"'; ?> ><?php echo $jb->jabatan_name ?></option>
								<?php } ?>
							</select>
							</div>							
							</div>

							<div class="form-group mt-3">
								<label for="name">Photo</label><br>
								<img src="<?php echo base_url('upload/karyawan/'.$karyawan->image) ?>" width="100"><br><br>	
								<input type="hidden" name="old_image" value="<?php echo $karyawan->image ?>"/>
								<input class="form-control-file " type="file" name="image">

							</div>

							<div class="form-group mt-3">
								<label for="name">Photo KTP</label><br>
								<input type="hidden" name="old_fktp" value="<?php echo $karyawan->fktp ?>"/>
								<input class="form-control-file " type="file" name="fktp">

							</div>

							<div class="form-group mt-3">
								<label for="cv">CV</label>
								<input class="form-control-file " type="file" name="cv">
								<input type="hidden" name="old_cv" value="<?php echo $karyawan->cv ?>" />

							</div>

							<div class="form-group">
								<label for="kontrak">Kontrak Kerja</label>
								<input class="form-control-file " type="file" name="kontrak_kerja" />
								<input type="hidden" name="old_kontrak" value="<?php echo $karyawan->kontrak_kerja ?>" />

							</div>	

							
							<input class="btn btn-success" id="btn" type="submit" name="btn" value="Save" />
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
		$('#doc').append('<tr id="row'+i+'"><td><input class="form-control-file " type="file" name="dokumen[]" multiple /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></td></tr>');
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