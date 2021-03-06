<!DOCTYPE html>
<html lang="en">

<head>
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
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success') ; ?>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				</div>
				<?php endif; ?>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/karyawan/add') ?>" style="text-decoration:none;"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead class=" ">
									<tr>
										<th>Photo</th>
										<th>Name </th>
										<th>Email</th>
										<th>Position</th>
										<th>First Date of Work	</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($karyawan as $kry): ?>
									<tr >
										<td width="64">
											<img src="<?php echo base_url('upload/karyawan/'.$kry->image) ?>" width="64" height="" />
										</td>
										<!-- <td width="150">
										<?php echo $kry->no_karyawan ?>
										</td> -->
										<td width="150">
											<?php echo $kry->namakr ?>
										</td>
										<td width="120">
											<?php echo $kry->email_kantor ?>
										</td>
										<td width="120">
											<?php echo $kry->jn ?>
										</td>
										<td width="150">
											<?php echo date('d F Y', strtotime($kry->tanggal_masuk)) ?>
										</td>
										
										<td width="120">
											<a href="<?php echo base_url().'admin/detail?id='.$kry->karyawan_id?>" 
											class="btn btn-small btn-success" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Detail"><i class="fas fa-info"></i></a>
											<a href="<?php echo site_url('admin/karyawan/edit/'.$kry->karyawan_id) ?>"
											class="btn btn-small btn-info" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Edit"><i class="fas fa-edit"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/karyawan/delete/'.$kry->karyawan_id) ?>')"
											 href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Delete"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
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
	 <script>
       $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
   </script>
   <script>
	$(document).ready(function(){
	$('[data-tooltip="tooltip"]').tooltip();   
	});
	</script>
</body>

</html>
