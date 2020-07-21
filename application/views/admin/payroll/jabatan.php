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
										<th style="text-align:center">Position</th>
										<th style="text-align:center">Basic Salary</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($jabatan as $gj): ?>
									<tr>
										<td width="30" style="text-align:center">
										<?php echo $i++?>
										</td>
										<td width="200">
											<?php echo ucfirst($gj->jabatan_name) ?>
										</td>
										<td width="200">
											<?php echo "Rp.", number_format($gj->gajipokok) ?>
										</td>
										
										<td width="70" style="text-align:center">
											<a href="#" data-toggle="modal" data-target="<?= "#modaledit-".$gj->jabatan_id?>" class="btn btn-small btn-info" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Edit"><i class="fas fa-edit"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/jabatan/delete/'.$gj->jabatan_id) ?>')"
											 href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Delete"><i class="fas fa-trash"></i></a>
										</>
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
	  <form action="<?php base_url();?>jabatan/add " method="post" enctype="multipart/form-data" >

      <div class="modal-body ">
	  <div class="form-group">
		<label for="name">Position<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control <?php echo form_error('jname') ? 'is-invalid':'' ?>"
				type="text" name="jname" placeholder="Position Name" required/>
			<div class="invalid-feedback">
			</div>
		</div>
		<div class="form-group">
		<label for="name">Basic Salary<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control"	type="text" name="jpokok" placeholder="Amount" required/>
			<div class="invalid-feedback">
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
<?php foreach($jabatan as $g):?>
<div class="modal fade bd-example-modal-lg" id="<?="modaledit-".$g->jabatan_id?>" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php base_url();?>jabatan/edit" method="post" enctype="multipart/form-data" >
	  <input type="hidden" name="id" value="<?= $g->jabatan_id?>">

      <div class="modal-body ">
	  <div class="form-group">
		<label for="name">Position<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control <?php echo form_error('jname') ? 'is-invalid':'' ?>"
				type="text" name="jname" placeholder="Position Name" value="<?=$g->jabatan_name?>"required/>
			<div class="invalid-feedback">
			</div>
		</div>
		<div class="form-group">
		<label for="name">Basic Salary<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control"	type="text" name="jpokok" placeholder="Amount" value="<?=$g->gajipokok?>" required/>
			<div class="invalid-feedback">
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