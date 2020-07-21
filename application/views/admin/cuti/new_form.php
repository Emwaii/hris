<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/jquery.datetimepicker.min.css') ?>" rel="stylesheet">
	<!-- <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'/> -->

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
						<a href="<?php echo site_url('admin/absen/') ?>" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/absen/add') ?>" method="post" enctype="multipart/form-data" >
							
							<input type="hidden" name="absen_id" id="absen_id">
							<div>
								<label for="name">Choose Employee<?php echo"<font color ='red'>*</font>"?></label>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name="karyawan_id" id="karyawan_id">
								<input type="text" name="name_karyawan" placeholder="Employee Name" id="name_karyawan" class="form-control <?php echo form_error('karyawan_id') ? 'is-invalid':'' ?>">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
										<i class="fa fa-search"></i>
									</button>
								</span>
								
							</div>

								<div class="form-group">
								<label for="name">Date of Leave<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('mulai') ? 'is-invalid':'' ?>"
								 type="text" name="mulai" id="mulai" placeholder="Exp. 11-11-2011" value="<?= date("d-m-Y")?>"/>
								 <div class="invalid-feedback">
									<?php echo form_error('mulai') ?>
								</div>
								 </div>
								
							<div class="form-group">
								<label for="absen">Type of Leave<?php echo"<font color ='red'>*</font>"?></label>
								<div>
								<label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" checked="" class="custom-control-input" value="tahunan"><span class="custom-control-label" >Annual Leave</span>
								</label>
								
								<label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" class="custom-control-input" value="lembur"><span class="custom-control-label" >Overtime</span>
								</label>
								
								<!-- <!-- <label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" class="custom-control-input" value="I"><span class="custom-control-label" >Ijin</span>
								</label> -->
								
								<label class="custom-control custom-checkbox custom-control-inline">
								<input type="radio" name="absen" class="custom-control-input" value="lainnya"><span class="custom-control-label" >Others</span>
								</label>
							</div>
							</div>
							<div class="form-group">
							<label for="alamat">Explanation</label>
								<textarea class="form-control" name="keterangan" autocomplete="off" placeholder="Explanation..."></textarea>
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

<!-- Select Client-->
<div class="modal fade bd-example-modal-lg" id="modal-item">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Select Client</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach ($karyawan as $kr): ?>
				<tr>
					
					<td witdh="50"><?= $i++?></td>
					<td width="500"><?php echo $kr->namakr ?></td>
					
					<td witdh="100">
						<button class="btn btn-xs btn-info" id="select" data-id="<?php echo $kr->karyawan_id ?>"
						data-name="<?php echo $kr->namakr ?>">
							<i class="fa fa-check"></i> Select
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
      </div>
    </div>
  </div>
</div>
<!-- datepicker -->
<!-- <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<!-- datetimepicker -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url('css/jquery.datetimepicker.full.min.js') ?>"></script>
<script>
	$("#mulai").datetimepicker({
	
	timepicker: false,
	datepicker: true,
	format: 'd-m-Y',
	weeks: true,
	autoclose: true,
	todayHighlight: true,
	scrollMonth : false,
    scrollInput : false,
	
	});
	
	//$("#mulai").datepicker({ dateFormat: "d-m-yy"}).datepicker("setDate", new Date());

	</script>

<script>
$(document).ready(function() {
	$(document).on('click','#select', function() {
		var karyawan_id = $(this).data('id');
		var name_karyawan = $(this).data('name');
		$('#karyawan_id').val(karyawan_id);
		$('#name_karyawan').val(name_karyawan);
		$('#modal-item').modal('hide');
	})
})
</script>