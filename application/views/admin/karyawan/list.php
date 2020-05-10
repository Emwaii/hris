<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
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
						<a href="<?php echo site_url('admin/karyawan/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover " id="dataTable" width="120%" cellspacing="0">
								<thead class="thead-light ">
									<tr>
										<th>Photo</th>
										<th>No Karyawan</th>
										<th>Nama </th>
										<th>Email</th>
										<th>Jabatan</th>
										<th>Tanggal Masuk</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($karyawan as $kry): ?>
									<tr>
										<td>
											<img src="<?php echo base_url('upload/images/'.$kry->foto) ?>" width="64" />
										</td>
										<td width="150">
										<?php echo $kry->no_karyawan ?>
										</td>
										<td width="150">
											<?php echo $kry->nama_lengkap ?>
										</td>
										<td width="150">
											<?php echo $kry->email ?>
										</td>
										<td width="150">
											<?php echo $kry->jn ?>
										</td>
										<td width="150">
											<?php echo $kry->tanggal_masuk ?>
										</td>
										
										<td width="270">
											<a href="<?php echo site_url('admin/karyawan/edit/'.$kry->karyawan_id) ?>"
											 class="btn btn-small"><i class="fas fa-info"></i> Detail</a>
											<a href="<?php echo site_url('admin/karyawan/edit/'.$kry->karyawan_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/karyawan/delete/'.$kry->karyawan_id) ?>')"
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
