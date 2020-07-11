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
										<th style="text-align:center" >Jenis Tunjangan</th>
										<th style="text-align:center">Jumlah</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($gaji as $gj): ?>
									<tr>
										<td width="50">
										<?php echo $i++?>
										</td>
										<td width="200">
											<?php echo ucfirst($gj->jenis_gaji) ?>
										</td>
										<td width="200">
											<?php echo "Rp.", number_format($gj->jumlah) ?>
										</td>
										
										<td width="200" style="text-align:center">
											<a href="#" class="btn btn-small" data-toggle="modal" data-target="<?= "#modaledit-".$gj->id?>"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/gaji/delete/'.$gj->id) ?>')"
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
<!-- ######################## Tambah data ##################################### -->
<div class="modal fade bd-example-modal-lg" id="modaladd" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php base_url();?>tunjangan/add " method="post" enctype="multipart/form-data" >

      <div class="modal-body ">
	  <div class="form-group">
		<label for="name">Nama Tunjangan<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control <?php echo form_error('jngaji') ? 'is-invalid':'' ?>"
				type="text" name="jngaji" placeholder="Nama Tunjangan" required/>
			<div class="invalid-feedback">
			</div>
		</div>
		<div class="form-group">
		<label for="name">Jumlah<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control"	type="text" name="jumlah" placeholder="Jumlah" required/>
			<div class="invalid-feedback">
			</div>
		</div>
      </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-success" name="btn" value="Save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   		 </div>
		
    </div>
	  </form>
	  
	
  </div>
</div>

<!-- ######################## Edit data ##################################### -->
<?php foreach($gaji as $g):?>
<div class="modal fade bd-example-modal-lg" id="<?="modaledit-".$g->id?>" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php base_url();?>tunjangan/edit" method="post" enctype="multipart/form-data" >
	  <input type="hidden" name="id" value="<?= $g->id?>">

      <div class="modal-body ">
	  <div class="form-group">
		<label for="name">Nama Tunjangan<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control <?php echo form_error('jngaji') ? 'is-invalid':'' ?>"
				type="text" name="jngaji" placeholder="Nama Tunjangan" value="<?=$g->jenis_gaji?>"required/>
			<div class="invalid-feedback">
			</div>
		</div>
		<div class="form-group">
		<label for="name">Jumlah<?php echo"<font color ='red'>*</font>"?></label>
			<input class="form-control"	type="text" name="jumlah" placeholder="Jumlah" value="<?=$g->jumlah?>" required/>
			<div class="invalid-feedback">
			</div>
		</div>
      </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-success" name="btn" value="Save">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   		 </div>
		
    	</div>
	  </form>
	  
	
  </div>
</div>
<?php endforeach;?>