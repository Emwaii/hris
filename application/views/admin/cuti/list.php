<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="<?php echo base_url('css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

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
						<a href="<?php echo site_url('admin/cuti/add') ?>" style="text-decoration:none;"><i class="fas fa-plus"></i> Add New</a>
						<a href="<?php echo site_url('admin/cuti/rekap') ?>" style="text-decoration:none;" class="float-right"><i class="fas fa-file ml-2"></i> Show Recap</a>

					</div>
					<div class="card-body">
					<form  class="form" id="tanggalan" action="<?php echo site_url('admin/cuti');?>" method="post" enctype="multipart/form-data">
					<div class="row ml-1 ">
					<label>Choose Month : </label>
						<div class="mb-3 col-sm-2">
						<input class="form-control" autocomplete="off" style="text-align:center" type="text" name="tgl" id="tgl"  value="<?php echo isset($_POST['tgl']) ? $_POST['tgl'] : '' ?>">	
					
					</div>
					<div class="mb-3 col-md-2 ">
					<!-- <input class="btn btn-success" type="submit" name="btn" value="Save"/> -->

					</div>
					</form>
					<hr>
					
						<div class="table-responsive pr-3">
							<table class="table table-hover table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th style="text-align:center" >No</th>
										<th style="text-align:center">Name</th>
										<th style="text-align:center">Date</th>
										<th style="text-align:center">Type of Leave</th>
										<th style="text-align:center">Explanation</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php $i=1; foreach ($lcuti as $ab): ?>
									<!-- <?= $order?> -->
									<tr>
										<td width="20" style="text-align:center">
										<?php echo $i++ ?>
										</td>
										<td>
											<?php echo ucfirst($ab->namakr)?>
										</td>
										<td style="text-align:center">
											<?php echo date('d F Y', strtotime($ab->tanggal)) ?>
										</td>
										<td style="text-align:center">
											<?php if($ab->jenis_cuti == "tahunan"){echo "Annual Leave";}elseif($ab->jenis_cuti == "lembur"){echo "Overtime";}else{echo "Others";} ?>
										</td>
										<td>
											<?php echo ($ab->keterangan) ?>
										</td>
																				
										<td width="90" style="text-align:center">
											<a href="<?php echo site_url('admin/cuti/edit/'.$ab->id) ?>"
											class="btn btn-small btn-info" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Edit"><i class="fas fa-edit"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/cuti/delete/'.$ab->id) ?>')"
											 href="#!" class="btn btn-small btn-danger" data-placement="bottom" data-tooltip="tooltip" style="width: 41px;" title="Delete"><i class="fas fa-trash"></i></a>
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
	<script src="<?php echo base_url('js/bootstrap-datepicker.min.js') ?>"></script>
	<!-- <script>
	
		$('#tgl').datepicker( {
			format: "MM/yyyy",
			minViewMode: 1,
			changeMonth: true,
			autoclose: true
		});
	</script> -->
	<script>
       $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
   </script>
	<script>
		if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );

		}
		document.getElementById('tgl').value = "<?php echo $_POST['tgl'];?>";

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
