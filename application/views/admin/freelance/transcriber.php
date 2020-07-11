<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
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
						<a href="" class="float-right"style="text-decoration:none;"><i class="fas fa-print "></i> Rekap</a>
					
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th style="text-align:center">#</th>
										<th style="text-align:center">Name</th>
										<th style="text-align:center">Email</th>
										<!-- <th style="text-align:center">Whatsapp</th> -->
										<th style="text-align:center">Jobs</th>
										<th style="text-align:center">Language Pair</th>
										<th style="text-align:center">Date Submited</th>
										<th style="text-align:center">Reason</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($transcriber as $ts): ?>
									<tr>
										<td width="30">
											<?= $i++ ?>
										</td>
										<td width="200">
											<?php echo ucfirst($ts->namaf) ?>
										</td>
										<td width="150">
											<?php echo $ts->emailf ?>
										</td>
										<!-- <td width="120">
											<?php //echo $ts->nof ?>
										</td> -->
										<td width="120">
											<?php echo ucfirst($ts->namaj) ?>
										</td>
										
										<td width="120">
										<?php if($ts->namal == "Others"){echo ucfirst($ts->others);}else{echo ucfirst($ts->namal);} ?>
										</td>
										<td width="120">
											<?php echo date("d F Y",strtotime($ts->tanggal)) ?>
										</td>
										<td class="large">
											<?php echo ucfirst(substr($ts->alasan, 0, 50)) ?></td>
										<td width="100">
										<a href="#" class="btn btn-small btn-success" data-toggle="modal"  data-placement="bottom" data-tooltip="tooltip" title="Detail" data-target="<?= "#modaldetail-".$ts->id_freelance?>" style="width: 41px;" tooltip><i class="fas fa-info"></i></a>
										<a onclick="deleteConfirm('<?php echo site_url('guest/delete5/'.$ts->id_freelance) ?>')"
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
	<script>
	$(document).ready(function(){
	$('[data-tooltip="tooltip"]').tooltip();   
	});
	</script>

</body>

</html>

<!-- ######################## Edit data ##################################### -->
<?php foreach($transcriber as $g):?>
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
              <a href="<?php echo site_url('guest/viewfilecv/'.$g->id_freelance) ?>"
                class="btn btn-small btn-success " ><i class="fas fa-file-alt"></i> Curriculum vitae</a>
                <a href="<?php echo site_url('guest/viewfileporto/'.$g->id_freelance) ?>"
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