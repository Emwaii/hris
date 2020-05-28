<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/project/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/project/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Name<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div>
								<label for="name">Pilih Client<?php echo"<font color ='red'>*</font>"?></label>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name="client_id" id="client_id">
								<input type="text" name="name_client" placeholder="Client" id="name_client" class="form-control <?php echo form_error('client_id') ? 'is-invalid':'' ?>">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
										<i class="fa fa-search"></i>
									</button>
								</span>
								<div class="invalid-feedback">
									<?php echo form_error('client_id') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Price<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="price" min="0" placeholder="Product price" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>
							<div class="row">
								<div class="col">
								<label for="name">Date Start<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('mulai') ? 'is-invalid':'' ?>"
								 type="date" name="mulai" timezone="[[timezone]]"/>
								 <div class="invalid-feedback">
									<?php echo form_error('mulai') ?>
								</div>
								 </div>
								 <div class="col">
								<label for="name">Date End<?php echo"<font color ='red'>*</font>"?></label>
								<input class="form-control <?php echo form_error('selesai') ? 'is-invalid':'' ?>"
								 type="date" name="selesai"/>
								 <div class="invalid-feedback">
									<?php echo form_error('selesai') ?>
								</div>
								 </div>
							</div>

							<div class="form-group mt-3">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Description<?php echo"<font color ='red'>*</font>"?></label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="Product description..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
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
					<th>Name</th>
					<th>Industry</th>
					<th>Email</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($client as $cl): ?>
				<tr>
					<td><?php echo $cl->nama ?></td>
					<td><?php echo $cl->perusahaan ?></td>
					<td><?php echo $cl->email ?></td>
					<td>
						<button class="btn btn-xs btn-info" id="select" data-id="<?php echo $cl->client_id ?>"
						data-name="<?php echo $cl->nama ?>">
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

<script>
$(document).ready(function() {
	$(document).on('click','#select', function() {
		var client_id = $(this).data('id');
		var name_client = $(this).data('name');
		$('#client_id').val(client_id);
		$('#name_client').val(name_client);
		$('#modal-item').modal('hide');
	})
})
</script>