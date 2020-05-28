<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.css') ?>" rel="stylesheet">
	<style>
	.borderless td, .borderless th {
	border: none;
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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
						<table class="table borderless" id="dataTable" width="100%" cellspacing="0">
							
							<tbody class=" text-dark">
								<?php foreach($user as $usr)?>
									<tr>										
										<th><img src="<?php echo base_url('upload/file/'.$usr->photo) ?>" width="64"/></th>
									</tr>

									<tr>
										<th width="30%" >Name : <?php echo $usr->full_name ?> </th>
										<!-- <th><?php echo $usr->full_name ?></th> -->
									</tr>	
										<th>Price</th>
										<th>Date Start</th>
										<th>Date Ended</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
							
								<!-- <tbody>
									<?php foreach ($user as $usr): ?>
									<tr>
										<td>
											<img src="<?php echo base_url('upload/file/'.$product->pim) ?>" width="64"/>
										</td>
										<td width="150">
											<?php echo $product->name ?>
										</td>
										<td>
											<?php echo $product->price ?>
										</td>
										<td>
											<?php echo $product->mulai ?>
										</td>
										<td>
											<?php echo $product->selesai ?>
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

								</tbody> -->
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
