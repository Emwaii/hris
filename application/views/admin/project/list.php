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
						<a href="<?php echo site_url('admin/project/add') ?>" style="text-decoration:none;"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Photo</th>
										<th>Nama Project</th>
										<th>Price</th>
										<th>Mulai</th>
										<th>Selesai</th>
										<th>Deskripsi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $product): ?>
									<tr>
										<td>
											<img src="<?php echo base_url('upload/file/'.$product->pim) ?>" width="64"/>
										</td>
										<td width="150">
											<?php echo $product->name ?>
										</td>
										<td width="100">
											<?php echo "Rp.", number_format($product->price) ?>
										</td>
										<td width="100">
											<?php echo date('d F Y', strtotime($product->mulai)) ?>
										</td>
										<td width="100">
											<?php echo date('d F Y', strtotime($product->selesai)) ?>
										</td>
										
										<td class="small">
											<?php echo substr($product->description, 0, 120) ?>...</td>
										<td width="200">
											<a href="<?php echo site_url('admin/project/edit/'.$product->product_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/project/delete/'.$product->product_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
</body>

</html>
