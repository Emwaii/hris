<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">

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
					<a href="<?php echo base_url('admin/freelance/transcriber');?>" class="float-left text-primary" style="text-decoration:none;"><i class="fas fa-arrow-left "></i> Back</a>
						<!-- <a target="_blank" href="<?php echo base_url('admin/freelance/exp_ts');?>" class="float-right"style="text-decoration:none;"><i class="fas fa-print "></i> Rekap</a> -->
					
					</div>
					<div class="card-body">
					<form class="form-inline"  method="post" enctype="multipart/form-data">
					<div class="form-group mb-2">
						<label>Choose date :</label>
						<input type="text" id="dari" name="dari" required autocomplete="off" class="form-control ml-2 mr-1 border-bottom-1 border-right-0 border-left-0 border-top-0" style=" border-radius: 0; text-align:center;" placeholder="Date Start">
						
						<div class="input-group-prepend">
							<div class="input-group-text border-1" style=" border-radius: 0;">~</div>
						</div>
						<input type="text" id="sampai" name="sampai" required autocomplete="off" class="form-control ml-1 border-bottom-1 border-right-0 border-left-0 border-top-0" style=" border-radius: 0; text-align:center;" placeholder="Date End">						<!-- </div> -->
					
					</div>

					<div class="btn-group dropright mb-2 ml-2">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Delete Option
					</button>
					<div class="dropdown-menu" style="padding:0; border:0; background-color: transparent">
						<div class="dropdown-item ml-1" style="padding:0;">
							<!-- <input class="btn btn-danger" type="submit" name="btn" value="Delete Permanent"/> -->
							<input class="btn btn-success" type="submit" formaction="<?php echo base_url('admin/freelance/retoretr');?>" name="btn" value="Restore data"/>
							<input class="btn btn-danger" type="submit" formaction="<?php echo base_url('admin/freelance/delpermatr');?>" name="btn" value="Delete Permanent"/>
						</div>
					</div>
					</div>
					<!-- <div class="mb-2 col-md-2 ">
					<input class="btn btn-danger" type="submit" name="btn" value="Delete"/>

					</div> -->
					</form>

					<hr>

						<div class="table-responsive">
							<table class="table table-hover table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
							<thead>
									<tr>
										<th style="text-align:center">#</th>
										<th style="text-align:center">Name</th>
										<th style="text-align:center">Email</th>
										<!-- <th style="text-align:center">Whatsapp</th> -->
										<th style="text-align:center">Job</th>
										<th style="text-align:center">Language Pair</th>
										<th style="text-align:center">Date Submited</th>
										<th style="text-align:center">Reason</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($deltranscriber as $ts): ?>
									<tr>
									<?php if($ts->approve == "1"){?>
										<td width="30" class="bg-success">
											<?= $i++ ?>
										</td>
									<?php }else{?>
										<td width="30">
										<?= $i++ ?>
										</td>
									<?php }?>
										
										<td>
											<?php echo ucfirst($ts->namaf) ?>
										</td>
										<td>
											<?php echo $ts->emailf ?>
										</td>
										<!-- <td width="120">
											<?php //echo $ts->nof ?>
										</td> -->
										<td>
											<?php echo ucfirst($ts->namaj) ?>
										</td>
										<td>
											<?php if($ts->namal == "Others"){echo ucfirst($ts->others);}else{echo ucfirst($ts->namal);} ?>
										</td>
										<td>
											<?php echo date("d F Y",strtotime($ts->tanggal)) ?>
										</td>
										<td class="large">
											<?php echo ucfirst(substr($ts->alasan, 0, 50)) ?></td>
										<td width="140" style="text-align:center">
										<?php if($ts->approve == "1"){?>
											<a onclick="cancel('<?php echo site_url('admin/freelance/cancel/'.$ts->id_freelance) ?>')"
											href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Cancel" ><i class="fa fa-times"></i></a>	
										<?php }else{?>
											<a onclick="approve('<?php echo site_url('admin/freelance/approve/'.$ts->id_freelance) ?>')"
											href="#!" class="btn btn-small btn-success" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Mark"><i class="fa fa-check"></i></a>
										<?php }?>
										<a href="#" class="btn btn-small btn-success" data-toggle="modal"  data-placement="bottom" data-tooltip="tooltip" title="Detail" data-target="<?= "#modaldetail-".$ts->id_freelance?>" style="width: 41px;" tooltip><i class="fas fa-info"></i></a>
										<a href="#" class="btn btn-small btn-danger" data-toggle="modal" data-placement="bottom" data-tooltip="tooltip" title="Delete" data-target="<?= "#modaldel-".$ts->id_freelance?>" style="width: 41px;" tooltip><i class="fa fa-trash"></i></a>
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
		function deleteTrash(url){
			$('#btn-trash').attr('href', url);
			// $('#deleteModal').modal();
		}
		function deletePermanen(url){
			$('#btn-permanen').attr('href', url);
			// $('#deleteModal').modal();
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
	$(document).ready(function(){
	$('[data-tooltip="tooltip"]').tooltip();   
	});
	</script>
	<script>
       $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
   </script>

</body>

</html>
<!-- ########################### Delete ##################################### -->
<?php foreach($deltranscriber as $g):?>

<div class="modal fade bd-example-modal-sm" id="<?="modaldel-".$g->id_freelance?>" role="dialog">
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
			<a id="btn-trash" class="btn btn-success" href="<?php echo site_url('admin/freelance/restore5/'.$g->id_freelance) ?>">Restore data</a>
			<a id="btn-permanen" class="btn btn-danger" href="<?php echo site_url('admin/freelance/delete5/'.$g->id_freelance) ?>">Delete permanent</a>
    	</div>
	</div>
  </div>
</div>
<?php endforeach;?>

<!-- ######################## Edit data ##################################### -->
<?php foreach($deltranscriber as $g):?>
<div class="modal fade bd-example-modal-lg" id="<?="modaldetail-".$g->id_freelance?>" role="dialog">
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
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	disabled type="text" value="<?= "  ".$g->namaf?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Email</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0" disabled	type="text" value="<?= "  ".$g->emailf?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">No Whatsapp</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	 disabled type="text" value="<?= "  ".$g->nof?>"/>
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
		<label for="name">Job Name</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0" disabled type="text" value="<?= "  ".ucfirst($g->namaj)?>"/>
		</div>
		</div>
		<div class="row mt-2">
		<div class="col-md-4">
		<label for="name">Language Pair</label>
		</div>
		<div class="col">
		<input class="form-control-plaintext border-right-0 border-left-0 border-top-0"	disabled type="text" value="<?php if($g->namal == "Others"){echo "  ".ucfirst($g->others);}else{echo "  ".ucfirst($g->namal);}?>"/>
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
		<div class="form-group border-top mt-3 mb-3">
              <div class="card mt-3">
              <div class="card-header">
              Management File 
             </div>
              <div class="card-body ">
              <a target="_blank" href="<?php echo site_url('guest/viewfilecv/'.$g->id_freelance) ?>"
                class="btn btn-small btn-success " ><i class="fas fa-file-alt"></i> Curriculum vitae</a>
                <a target="_blank" href="<?php echo site_url('guest/viewfileporto/'.$g->id_freelance) ?>"
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