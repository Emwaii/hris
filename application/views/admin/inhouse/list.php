<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="<?php echo base_url('css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<style>
input[type=text] {
   
    border-bottom: 2px solid grey;
    color: black;
}
input[type=text]:hover{
    border-bottom: 2px solid #3f3d56;
}

textarea:hover{
    border-bottom: 2px solid #3f3d56;

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
						<a href="#" class="float-right" style="text-decoration:none;"><i class="fas fa-print ml-2"></i> Rekap</a>

					</div>
					<div class="card-body">
					<!-- <form  class="form" id="lowongan" action="<?php //echo site_url().'admin/inhouse'?>" method="post">
					<div class="row ml-1 ">
					<label>Pilih Lowongan : </label>
					<div class="form-group">
					<select  class="form-control ml-2" name="lname" id="lname" onchange="$('#lowongan').submit()" >
						<option disable selected value="">Choose One...</option>
						<?php //foreach ($ilowongan as $jb) {?>									
						<option value="<?php// echo $jb->id_ilowongan ?>"><?php echo ucfirst($jb->ilowongan_name) ?></option>
						<?php //} ?>
					</select>
					</div>	
					<div class="mb-3 col-md-2 ">
					<input class="btn btn-success" type="submit" name="btn" value="Save"/>
					</div>
					</div>
					</form> -->
					<!-- <hr> -->
					
						<div class="table-responsive">
							<table class="table table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th style="text-align:center" >#</th>
										<th style="text-align:center">Fullname</th>
										<th style="text-align:center">Whatsapp</th>
										<th style="text-align:center">Domicile</th>
										<th style="text-align:center">Job Name</th>
										<th style="text-align:center">Reason</th>
										
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php $i=1; foreach ($lisn as $ab): ?>
									<!-- <?= $order?> -->
									<tr class="">
										<td width="50" style="text-align:center" class="">
										<?php echo $i++ ?>
										</td>
										<td width="200">
											<?php echo ucfirst($ab->namai)?>
										</td>
										<td width="150" style="text-align:center">
											<?php echo $ab->nowa ?>
										</td>
										<td width="150" style="text-align:center">
											<?php echo ucfirst($ab->domisili) ?>
										</td>
										<td width="200" style="text-align:center">
											<?php echo ucfirst($ab->inama) ?>
										</td>
										<td class="large">
											<?php echo ucfirst(substr($ab->alasan, 0, 50)) ?>
										</td>
																				
										<td width="90">
										<a href="#" class="btn btn-small btn-success" data-toggle="modal"  data-placement="bottom" data-tooltip="tooltip" 
										title="Detail" data-target="<?= "#modaldetail-".$ab->id_inhouse?>" style="width: 41px;" tooltip><i class="fas fa-info"></i></a>
										<a onclick="deleteConfirm('<?php echo site_url('guest/delete2/'.$ab->id_inhouse) ?>')"
										href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" title="Delete" ><i class="fa fa-trash"></i></a>
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
	<script src="<?php echo base_url('js/bootstrap-datepicker.min.js') ?>"></script>
	
	
	<script>
		if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );

		}
		document.getElementById('lname').value = "<?php echo $_POST['lname'];?>";

	</script>
	<script>
	

	$('#tgl').datepicker({
		format: "MM/yyyy",
		minViewMode: 1,
		changeMonth: true,
		autoclose: true,
		orientation:"auto",

	}).on('changeDate', function(e){
	$('#tanggalan').submit();
	});
	$("#tgl[value='']").datepicker("setDate", "-0d"); 


	</script>
	</body>

</html>

<?php foreach($lisn as $g):?>
<div class="modal fade bd-example-modal-lg" id="<?="modaldetail-".$g->id_inhouse?>" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Detail </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      	</div>
		<div class="modal-body p-5">
		<div class="row">
		<div class="col-md-4">
		<label for="name">Applicant Name</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	disabled type="text" value="<?= "  ".$g->namai?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Place/Date of birth</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0" disabled	type="text" value="<?= "  ".$g->ttl?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">No Whatsapp</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	 disabled type="text" value="<?= "  ".$g->nowa?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Age</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	disabled type="text" value="<?= "  ".$g->umur?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Domicile</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	disabled type="text" value="<?= "  ".$g->domisili?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Job Name</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0" disabled type="text" value="<?= "  ".ucfirst($g->inama)?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Expectation Salary</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	disabled type="text" value="<?php echo "  "."Rp. ".number_format($g->gaji);?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Reason</label>
		</div>
		<div class="col">
		<textarea class="form-control bg-transparent border-right-0 border-left-0 border-top-0"  
        style="border-radius: 0;border-bottom: 2px solid grey;color:black;" disabled><?=ucfirst($g->alasan)?></textarea>
		</div>
		</div>
		<div class="form-group border-top mt-3 mb-1">
		<div class="card mt-3">
			<div class="card-header">
			Management File 
			</div>
			<div class="card-body ">
			<a href="<?php echo site_url('admin/inhouse/viewimage/'.$g->id_inhouse) ?>"
			class="btn btn-small btn-success " ><i class="fas fa-file-image"></i></i> Photo</a>
			
			<a href="<?php echo site_url('admin/inhouse/viewfilecv/'.$g->id_inhouse) ?>"
			class="btn btn-small btn-success " ><i class="fas fa-file-alt"></i> Curriculum vitae</a>
			<a href="<?php echo site_url('admin/inhouse/viewfileporto/'.$g->id_inhouse) ?>"
			class="btn btn-small btn-success " ><i class="fas fa-file-alt"></i> Portofolio</a>
				
			</div>
		</div>
								
		</div>
      </div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   		 </div>
    	</div>
	  </form>
	  
	
  </div>
</div>
<?php endforeach;?>