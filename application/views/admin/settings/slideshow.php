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
										<th style="text-align:center">Description</th>
										<th style="text-align:center">Main Banner</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($lowongan as $lw): ?>
									<tr>
										<td width="50" style="text-align:center">
										<?php echo $i++?>
										</td>
										<td width="200">
											<?php echo ucfirst($lw->nama_lowongan) ?>
										</td>
										<td class="large">
											<?php echo substr($lw->keterangan, 0, 120) ?>
										</td>
										<td width="120" style="text-align:center">
											<?php if($lw->is_active==1){echo "Yes";}else{echo "No";} ?>
										</td>
										<td width="90" style="text-align:center">
											<a href="#" class="btn btn-small btn-info" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Edit" data-toggle="modal" data-target="<?= "#modaledit-".$lw->id?>"><i class="fas fa-edit"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/hlowongan/delete/'.$lw->id) ?>')"
											 href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Delete"><i class="fas fa-trash"></i></a>
										</>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				<div class="card-footer small text-muted">
					NB : There must be 1 with the value "yes" to be the main banner
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
<div class="modal fade bd-example-modal-lg" id="modaladd" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Add New Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php base_url();?>hlowongan/add " method="post" enctype="multipart/form-data" >
		<?php foreach($plus as $pl){?>
			<input type="hidden" name="max" value="<?=$pl->maxid?>">
		<?php }?>
      <div class="modal-body ">
	  <div class="row">
	  <div class="col-md-6 mb-3">
	  <label for="name">Vacancy<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control <?php echo form_error('namal') ? 'is-invalid':'' ?>"
				type="text" name="namal" placeholder="Vacancy Name" required/>
	  </div>
	  <div class="col-md-6 mb-3">
	  <label for="name">Text Color<?php echo"<font color ='red'>*</font>"?></label>
			<select name="text" class="form-control">
				<option disable value="">Choose One..</option>
				<option value="text-primary" class="text-primary">Biru</option>
				<option value="text-danger" class="text-danger">Merah</option>
				<option value="text-info" class="text-info">Biru muda</option>
				<option value="text-success" class="text-success">Hijau</option>
				<option value="text-warning" class="text-warning">Kuning</option>
				<option value="text-dark" class="text-dark">Hitam</option>
				<option value="text-light" class="text-light bg-dark">Putih</option>
			</select>
		</div>
		</div>
		<div class="form-group">
		<label for="name">Description<?php echo"<font color ='red'>*</font>"?></label>
			<!-- <input class="form-control"	type="text" name="keterangan" placeholder="Keterangan" required/> -->
			<textarea class="form-control" name="keterangan" placeholder="Keterangan" > </textarea>
		</div>
		
		<div class="row">
			<div class="col-md-4 mb-3">
			<label for="absen">Main Banner<?php echo"<font color ='red'>*</font>"?></label>
			<div>
				<label class="custom-control custom-checkbox custom-control-inline">
				<input type="radio" name="active" checked="" class="custom-control-input" value="1"><span class="custom-control-label" >Yes</span>
				</label>				
				<label class="custom-control custom-checkbox custom-control-inline">
				<input type="radio" name="active" class="custom-control-input" value="0"><span class="custom-control-label" >No</span>
				</label>
			</div>
				<label for="name">Banner Image<?php echo"<font color ='red'>*</font>"?></label>
				<input class="form-control-file" type="file" name="header" id="header" required onchange="img()">
				<sub><?= "<font color ='red'>*</font>"?>min. 1300 x 500 px</sub>
			</div>
			<div class="col-md-8 mb-3">
				<img id="preview" hidden width="500" height="300" />
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
<div class="modal fade bd-example-modal-lg" id="<?="modaledit-".$g->id?>" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php base_url();?>hlowongan/edit " method="post" enctype="multipart/form-data" >
	  
<input type="hidden" name="id" 	value="<?= $g->id?>">
<div class="modal-body ">
<div class="row">
	  <div class="col-md-6 mb-3">
	  <label for="name">Vacancy<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control <?php echo form_error('namal') ? 'is-invalid':'' ?>"
				type="text" name="namal" value="<?= $g->nama_lowongan?>"placeholder="Vacancy Name" required/>
	  </div>
	  <div class="col-md-6 mb-3">
	  <label for="name">Text Color<?php echo"<font color ='red'>*</font>"?></label>
			<select name="text" class="form-control">
				<option disable value="">Choose One..</option>
				<option value="text-primary" class="text-primary" <?php if($g->text_color == "text-primary") echo 'selected="selected"'; ?>>Biru</option>
				<option value="text-danger" class="text-danger" <?php if($g->text_color == "text-danger") echo 'selected="selected"'; ?>>Merah</option>
				<option value="text-info" class="text-info" <?php if($g->text_color == "text-info") echo 'selected="selected"'; ?>>Biru muda</option>
				<option value="text-success" class="text-success" <?php if($g->text_color == "text-success") echo 'selected="selected"'; ?>>Hijau</option>
				<option value="text-warning" class="text-warning" <?php if($g->text_color == "text-warning") echo 'selected="selected"'; ?>>Kuning</option>
				<option value="text-dark" class="text-dark" <?php if($g->text_color == "text-dark") echo 'selected="selected"'; ?>>Hitam</option>
				<option value="text-light" class="text-light bg-dark" <?php if($g->text_color == "text-light") echo 'selected="selected"'; ?>>Putih</option>
			</select>
		</div>
		</div>
		<div class="form-group">
		<label for="name">Description<?php echo"<font color ='red'>*</font>"?></label>
			<!-- <input class="form-control"	type="text" name="keterangan" placeholder="Keterangan" required/> -->
			<textarea class="form-control" name="keterangan" placeholder="Keterangan" ><?= $g->keterangan?> </textarea>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3">
			<label for="absen">Main Banner<?php echo"<font color ='red'>*</font>"?></label>
			<div>
				<label class="custom-control custom-checkbox custom-control-inline">
				<input type="radio" name="active" checked="" class="custom-control-input" value="1" <?php echo ($g->is_active == "1" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >True</span>
				</label>
				
				<label class="custom-control custom-checkbox custom-control-inline">
				<input type="radio" name="active" class="custom-control-input" value="0" <?php echo ($g->is_active == "0" ? 'checked="checked"': ''); ?>><span class="custom-control-label" >False</span>
				</label>
			</div>
				<label for="name">Banner Image<?php echo"<font color ='red'>*</font>"?></label>
				<input class="form-control-file" type="file" name="header" id="header" required onchange="img()">
				<input type="hidden" name="old_image" value="<?php echo $g->header ?>"/>
				<sub><?= "<font color ='red'>*</font>"?>min. 1300 x 500 px</sub>
			</div>
			<div class="col-md-8 mb-3">
				<img id="preview" width="500" height="300" src="<?php echo base_url('upload/lowongan/'.$g->header) ?>" />
			</div>
		</div>

  <!-- <input type="hidden" name="old_image" value="<?php echo $g->header ?>"/> -->
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

<script>
	 $('#header').change(function(){
	document.getElementById('preview').src = window.URL.createObjectURL(this.files[0]);
	// document.getElementById('preview').prop('hidden',false);
	$('#preview').prop('hidden', false);
	});
	
	</script>