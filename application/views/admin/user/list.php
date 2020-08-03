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
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th style="text-align:center">Photo</th>
										<th style="text-align:center">Username</th>
										<!-- <th>Password</th> -->
										<th style="text-align:center">Email</th>
										<th style="text-align:center">Full Name</th>
										<th style="text-align:center">Phone</th>
										<th style="text-align:center">Role</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $usr): ?>
									<tr>
										<td>
											<img src="<?php echo base_url('upload/user/'.$usr->photo) ?>" width="64" />
										</td>
										<td>
											<?php echo $usr->username ?>
										</td>
										<!-- <td>
											<?php echo $usr->password ?>
										</td> -->
										<td >
											<?php echo $usr->email ?>
										</td>
										<td >
											<?php echo substr($usr->full_name, 0, 17) ?>
										</td>
										<td>
											<?php echo $usr->phone ?>
										</td>
										<td>
											<?php echo $usr->role ?>
										</td>
										<td width="90" style="text-align:center">
										<?php if(($this->fungsi->user_login()->role == "admin") && ($usr->role == "superadmin") )  { ?>
										<a href="<?php echo site_url('admin/user/edit/'.$usr->user_id) ?>"
										class="btn btn-small btn-info disabled" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Edit"><i class="fas fa-edit"></i></a>
										<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$usr->user_id) ?>')"
										href="#!" class="btn btn-small btn-danger disabled" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Delete"><i class="fas fa-trash"></i></a>
										
										<?php } else{?>
										<a href="<?php echo site_url('admin/user/edit/'.$usr->user_id) ?>"
										class="btn btn-small btn-info"  data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Edit"><i class="fas fa-edit"></i></a>
										<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$usr->user_id) ?>')"
										href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Delete"><i class="fas fa-trash"></i></a>
										<?php }?>
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
	$(document).ready(function(){
	$('[data-tooltip="tooltip"]').tooltip();   
	});
	</script>
	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
