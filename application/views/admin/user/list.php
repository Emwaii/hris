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
							<table class="table table-hover" id="dataTable" width="105%" cellspacing="0">
								<thead>
									<tr>
										<th>Photo</th>
										<th>Username</th>
										<!-- <th>Password</th> -->
										<th>Email</th>
										<th>Full Name</th>
										<th>Phone</th>
										<th>Role</th>
										<th>Action</th>
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
										<td width="250">
											<?php echo $usr->email ?>
										</td>
										<td width="250">
											<?php echo substr($usr->full_name, 0, 17) ?>
										</td>
										<td>
											<?php echo $usr->phone ?>
										</td>
										<td>
											<?php echo $usr->role ?>
										</td>
										<td width="250">
											<!-- <a href="<?php echo site_url('admin/projects/edit/'.$project->project_id) ?>"
											 class="btn btn-small"><i class="fas fa-tasks"></i> Task</a> -->
											<a href="<?php echo site_url('admin/user/edit/'.$usr->user_id) ?>"
											class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$usr->user_id) ?>')"
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
