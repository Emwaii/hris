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
.dropright:hover .dropdown-menu{
  display: block;
}

.dropdown-item:active{
	background-color:transparent;
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
						<a href="<?php echo site_url().'admin/inhouse/list?id='.$this->input->get('id');?>" class="float-left text-primary" style="text-decoration:none;"><i class="fas fa-arrow-left "></i> Back</a>

						</div>
						<div class="card-body">
						<form class="form-inline"  method="post" enctype="multipart/form-data">
						<div class="form-group mb-2">
							<label>Choose date :</label>
							<input type="text" id="dari" required name="dari" autocomplete="off" class="form-control ml-2 mr-1 border-bottom-1 border-right-0 border-left-0 border-top-0" style=" border-radius: 0; text-align:center;" placeholder="Date Start">
							<div class="input-group-prepend">
								<div class="input-group-text border-1" style=" border-radius: 0;">~</div>
							</div>
							<input type="text" id="sampai" required name="sampai" autocomplete="off" class="form-control ml-1 border-bottom-1 border-right-0 border-left-0 border-top-0" style=" border-radius: 0; text-align:center;" placeholder="Date End">						<!-- </div> -->
						</div>
						<div class="btn-group dropright mb-2 ml-2">
						<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Delete Option
						</button>
						<div class="dropdown-menu" style="padding:0; border:0; background-color: transparent">
							<div class="dropdown-item ml-1" style="padding:0;">
								<input class="btn btn-success" type="submit" formaction="<?php echo site_url().'admin/inhouse/drestore?id='.$this->input->get('id');?>" name="btn" value="Restore Data"/>
								<input class="btn btn-danger" type="submit" formaction="<?php echo site_url().'admin/inhouse/dpermanent?id='.$this->input->get('id');?>" name="btn" value="Delete Permanent"/>
							</div>
						</div>
						</div>
						</form>
						<hr>
					
						<div class="table-responsive">
							<table class="table table-hover table-sm table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th style="text-align:center" >#</th>
										<th style="text-align:center">Fullname</th>
										<th style="text-align:center">Whatsapp</th>
										<th style="text-align:center">Domicile</th>
										<th style="text-align:center">Job Name</th>
										<th style="text-align:center">Date Submitted</th>
										<th style="text-align:center">Reason</th>
										
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php $i=1; foreach ($lisn as $ab): ?>
									<tr class="">
									<?php if($ab->approve == "1"){?>
										<td width="30" style="text-align:center" class="bg-success">
										<?php echo $i++ ?>
										</td>
									<?php }else{?>
										<td width="30" style="text-align:center" class="">
										<?php echo $i++ ?>
										</td>
									<?php }?>
										<td >
											<?php echo ucfirst($ab->namai)?>
										</td>
										<td >
											<?php echo $ab->nowa ?>
										</td>
										<td>
											<?php echo ucfirst($ab->domisili) ?>
										</td>
										<td >
											<?php echo ucfirst($ab->inama) ?>
										</td>
										<td >
										<?php echo date("d F Y",strtotime($ab->tanggal_submit)) ?>
										</td>
										<td class="large">
											<?php echo ucfirst(substr($ab->alasan, 0, 50)) ?>
										</td>
																				
										<td width="140" style="text-align:center">
										<?php if($ab->approve == "1"){?>
											<a onclick="cancel('<?php echo site_url('admin/inhouse/cancel/'.$ab->id_inhouse) ?>')"
											href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Cancle" ><i class="fa fa-times"></i></a>	
										<?php }else{?>
											<a onclick="approve('<?php echo site_url('admin/inhouse/approve/'.$ab->id_inhouse) ?>')"
											href="#!" class="btn btn-small btn-success" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Approve"><i class="fa fa-check"></i></a>
										<?php }?>

										<a href="#" class="btn btn-small btn-info" data-toggle="modal"  data-placement="bottom" data-tooltip="tooltip" 
										title="Detail" data-target="<?= "#modaldetail-".$ab->id_inhouse?>" style="width: 41px;" tooltip><i class="fas fa-info"></i></a>
										<a href="#" class="btn btn-small btn-danger" data-toggle="modal" data-placement="bottom" data-tooltip="tooltip" title="Delete" data-target="<?= "#modaldel-".$ab->id_inhouse?>" style="width: 41px;" tooltip><i class="fa fa-trash"></i></a>
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
	<script src="<?php echo base_url('js/bootstrap-datepicker.min.js') ?>"></script>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}

	function approve(url){
		$('#btn-approve').attr('href', url);
		$('#approvemodal').modal();
	}
	function cancel(url){
		$('#btn-cancel').attr('href', url);
		$('#cancelmodal').modal();
	}
	</script>
	<script>
		$('#dari').datepicker( {
			format: "dd MM yyyy",
			// minViewMode: 1,
			changeMonth: true,
			autoclose: true,
			todayHighlight:true,
			daysOfWeekHighlighted:'0'
		});
		
		$('#sampai').datepicker( {
			format: "dd MM yyyy",
			// minViewMode: 1,
			changeMonth: true,
			autoclose: true,
			todayHighlight:true,
			daysOfWeekHighlighted:'0'
		});
	</script>
	<script>
	$(document).ready(function(){
	$('[data-tooltip="tooltip"]').tooltip();   
	});
	</script>
	
	
	<!-- <script>
		if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );

		}
		document.getElementById('lname').value = "<?php echo $_POST['lname'];?>";

	</script> -->
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
	<script>
       $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
   </script>
	</body>

</html>
<!-- ########################## Delete ################################ -->

<?php foreach($lisn as $g):?>

<div class="modal fade bd-example-modal-sm" id="<?="modaldel-".$g->id_inhouse?>" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  	<h4 class="modal-title">Delete Options </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">Deleted data permanently cannot be restored/retrieved
		</div>
		<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<a id="btn-trash" class="btn btn-success" href="<?php echo site_url('admin/inhouse/restore/'.$g->id_inhouse) ?>" >Restore Data</a>
			<a id="btn-permanen" class="btn btn-danger" href="<?php echo site_url('admin/inhouse/delete/'.$g->id_inhouse) ?>">Delete Permanent</a>
    	</div>
	</div>
  </div>
</div>
<?php endforeach;?>

<!-- ########################## detail ################################ -->

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