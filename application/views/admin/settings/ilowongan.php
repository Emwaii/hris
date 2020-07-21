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
					<?php echo $this->session->flashdata('success') ; ?>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover  table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th style="text-align:center">No</th>
										<th style="text-align:center">Job Vacancy</th>
										<th style="text-align:center">Alias</th>
										<th style="text-align:center">Active</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($lowongan as $lw): ?>
									<tr>
										<td width="50" style="text-align:center">
										<?php echo $i++?>
										</td>
										<td >
											<?php echo ucfirst($lw->ilowongan_name) ?>
										</td>
										<td>
											<?php echo ucfirst($lw->ilowongan_alias) ?>
										</td>
										
										<td style="text-align:center">
											<?php if ($lw->is_active == 1){ echo "Yes";}else{echo "No";} ?>
										</td>
										<td width="90" style="text-align:center">
											<a href="#" class="btn btn-small btn-info" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Edit" data-toggle="modal" data-target="<?= "#modaledit-".$lw->id_ilowongan?>"><i class="fas fa-edit"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/ilowongan/delete/'.$lw->id_ilowongan) ?>')"
											 href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Delete"><i class="fas fa-trash"></i></a>
										</>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				<div class="card-footer small text-muted">
					NB : If active with the value "yes", a vacancy job will be displayed on the inhouse recruitment page and vice versa
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
<!-- ######################## Tambah data ##################################### -->
<div class="modal fade bd-example-modal-lg" id="modaladd" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Add New Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php base_url();?>ilowongan/add " method="post" enctype="multipart/form-data" >
	  <div class="modal-body ">
<div class="form-group">
  <label for="name">Vacancy<?php echo"<font color ='red'>*</font>"?></label>
	  <input class="form-control <?php echo form_error('namal') ? 'is-invalid':'' ?>"
		  type="text" name="lname" placeholder="Vacancy Name" required/>
	  <div class="invalid-feedback">
	  </div>
  </div>
  <div class="form-group">
  <label for="name">Alias<?php echo"<font color ='red'>*</font>"?></label>
  <input class="form-control" type="text" name="aname" placeholder="Vacancy Alias" required/>

  </div>
  
  <div class="form-group">
	  <label for="absen">Active<?php echo"<font color ='red'>*</font>"?></label>
	  <div>
	  <label class="custom-control custom-checkbox custom-control-inline">
	  <input type="radio" name="active" checked="" class="custom-control-input" value="1" ><span class="custom-control-label" >Yes</span>
	  </label>
	  
	  <label class="custom-control custom-checkbox custom-control-inline">
	  <input type="radio" name="active" class="custom-control-input" value="0" ><span class="custom-control-label" >No</span>
	  </label>
  </div>
  </div>
  
</div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-success" name="btn" value="Save">Save</button>
   		 </div>
		
    </div>
	  </form>
	  
	
  </div>
</div>

<!-- ######################## Edit data ##################################### -->
<?php foreach($lowongan as $g):?>
<div class="modal fade bd-example-modal-lg" id="<?="modaledit-".$g->id_ilowongan?>" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php base_url();?>ilowongan/edit " method="post" enctype="multipart/form-data" >
			
		<input type="hidden" name="id" 	value="<?= $g->id_ilowongan?>">
		<div class="modal-body ">
		<div class="form-group">
		<label for="name">Vacancy<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control <?php echo form_error('namal') ? 'is-invalid':'' ?>"
				type="text" name="lname" placeholder="Vacancy name" value="<?php echo $g->ilowongan_name?>"required/>
			<div class="invalid-feedback">
			</div>
		</div>
		<div class="form-group">
		<label for="name">Alias<?php echo"<font color ='red'>*</font>"?></label>
		<input class="form-control" type="text" name="aname" placeholder="Lowongan Alias" value="<?php echo $g->ilowongan_alias?>"required/>

		</div>
		
		<div class="form-group">
			<label for="absen">Active<?php echo"<font color ='red'>*</font>"?></label>
			<div>
			<label class="custom-control custom-checkbox custom-control-inline">
			<input type="radio" name="active" checked="" class="custom-control-input" value="1" <?php echo ($g->is_active == "1" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >Yes</span>
			</label>
			
			<label class="custom-control custom-checkbox custom-control-inline">
			<input type="radio" name="active" class="custom-control-input" value="0" <?php echo ($g->is_active == "0" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >No</span>
			</label>
		</div>
		</div>
		
		</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-success" name="btn" value="Save">Save changes</button>
	  </div>
  
</div>
</form>
	  
	
  </div>
</div>
<?php endforeach;?>