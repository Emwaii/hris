<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">

	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

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
					<?php echo $this->session->flashdata('success') ; ?>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				</div>
				<?php endif; ?>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a href="<?php echo site_url('admin/absen/') ?>" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
					<div class="card-body">
					<form  class="form" id="tanggalan" action="<?php echo site_url();?>admin/absen/rekap" method="post" enctype="multipart/form-data">
					<div class="row ml-1  ">
					<label>Pilih Bulan : </label>
						<div class="mb-3 col-sm-2">
						<input class="form-control" autocomplete="off" style="text-align:center" type="text" name="tgl" id="tgl"  value="<?php echo isset($_POST['tgl']) ? $_POST['tgl'] : '' ?>">	
					
					</div>
					<!-- <div class="mb-3 col-md-2 ">
					<input class="btn btn-success" type="submit" name="btn" value="Save"/>

					</div> -->
					</form>
					<!-- <form action="<?php base_url('admin/absen/rekap') ?>" method="post" enctype="multipart/form-data" > -->

						<div class="table-responsive  mt-2">
							<table class="table table-hover table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="align-middle" rowspan="2"  style="text-align:center">No</th>
										<th class="align-middle" rowspan="2" style="text-align:center">Nama</th>
										<!-- <th class="align-middle" rowspan="2" style="text-align:center">Tanggal</th> -->
										<th class="align-middle" colspan="2" style="text-align:center">Keterangan</th>
										<th class="align-middle" rowspan="2" style="text-align:center">Action</th>
									</tr>
									<tr>
										<th style="text-align:center">M</th>
										<th style="text-align:center">T</th>
										<!-- <th style="text-align:center">S</th>
										<th style="text-align:center">A</th> -->
									</tr>
								</thead>
								<tbody>

									<?php $i=1; foreach ($absen as $ab): ?>
									<tr style="text-align:center">
										<td width="30">
										<?php echo $i++ ?>
										</td>
										<td width="100" style="text-align:left">
											<?php foreach($karyawan as $kr){ if($ab->karyawan_id==$kr->karyawan_id) echo $kr->namakr;} ?>
										</td>
										<!-- <td width="150">
											<?php echo date('d F Y', strtotime($ab->tanggal)) ?>
										</td> -->
										<td width="40">
											<?php echo $ab->masuk ?>
										</td>
										<td width="40">
											<?php echo $ab->tidak ?>
										</td>
										<!-- <td  width="40">
											<?php echo $ab->sakit ?>
										</td>
										<td  width="40">
											<?php echo $ab->alpha ?>
										</td> -->
																				
										<td width="100">
											<a href="<?php echo site_url('admin/absen/edit/'.$ab->absensi_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/absen/delete/'.$ab->absensi_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="card-footer small text-muted">
				<?php echo"<font color ='red'>M</font>"?> = Masuk,
				<?php echo"<font color ='red'>T</font>"?> = Tidak Masuk
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
	<script src="<?php echo base_url('js/bootstrap-datepicker.min.js') ?>"></script>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
	<script>
	

	$('#tgl').datepicker({
		format: "MM/yyyy",
		minViewMode: 1,
		changeMonth: true,
		autoclose: true,
		orientation:"auto",

	}).on('changeDate', function(e){
	$('#tanggalan').submit();
	});
	$("#tgl[value='']").datepicker("setDate", "-0d"); 


	</script>
</body>

</html>
