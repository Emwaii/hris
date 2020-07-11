<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<!-- <link href="<?php echo base_url('css/jquery.datetimepicker.min.css') ?>" rel="stylesheet"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<style>
		.custom {
			width: 100px !important;
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
					<a href="#" style="text-decoration:none;"><i class="fas fa-print"></i> Rekap</a>
				</div>
					<div class="card-body">
					<!-- <form action="<?php base_url('admin/payroll/gaji') ?>" method="post" enctype="multipart/form-data" > -->

						<div class="table-responsive">
							<table class="table table-hover table-sm table-striped" id="tbl_karyawan" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="align-middle" style="text-align:center">No</th>
										<th class="align-middle" style="text-align:center">Status</th>
										<th class="align-middle" style="text-align:center">Nama Karyawan</th>
										<th class="align-middle" style="text-align:center">Bulan</th>
										<th class="align-middle" style="text-align:center">Action</th>
									</tr>
									
								</thead>
								<tbody>
									<?php $i=1; foreach ($karyawan as $kar): ?>
									<tr>
										<td width="50" style="text-align:center" >
										<?php echo $i; $i++ ?>
											<!-- <input type="hidden" id="id" value="<?= $kar->karyawan_id?>"> -->
										</td>

										<td width="120">
										<?php $stat = "<h5><span class='badge badge-info'>Belum</span></h5>";?>
											<?php foreach($payrol as $pay){
												 if ($kar->karyawan_id == $pay->karyawan_id){
													if(($pay->status == "terbayar") && (date('F',strtotime($pay->tanggal)) == date('F'))){$stat = "<h5><span class='badge badge-success'>Terbayar</span></h5>";}
													else{$stat = "<h5><span class='badge badge-info'>Belum</span></h5>";}
												 }
											} echo $stat; //date('F',strtotime($pay->tanggal));?>
										</td>
										
										<td  width="200">
											<?php echo "&nbsp;&nbsp;&nbsp".$kar->namakr ?>
										</td>
										<td  width="120">
											<?php echo "&nbsp;&nbsp;&nbsp".date('F') ?>
											<!-- <?php if (date('Y',strtotime($kar->tanggal_masuk)) == "2020"){
												echo "true";
												}?> -->
										</td>
										
										<td width="150" style="text-align:center" >
										
										<?php $invo = "<a href='#' class='btn btn-small btn-info custom' id='gaj' data-toggle='modal' data-target='#modal$kar->karyawan_id'><i class='fas fa-dollar-sign'></i> Gaji</a>"?>
										<?php foreach ($payrol as $p):?>
											<?php if($kar->karyawan_id == $p->karyawan_id):?>
											<?php if(($p->status == "terbayar") && (date('F',strtotime($p->tanggal)) == date('F')))://echo "true";?>
												<a href="<?php echo base_url().'admin/slip?id='.$kar->karyawan_id?>" 
												class="btn btn-small btn-success custom" id="invo"><i class="fas fa-file-invoice-dollar" id="fonta"></i> Slip Gaji</a>
												<?php $invo = "<a href='#' class='btn btn-small custom btn-info ' id='gaj' data-toggle='modal' data-target='#modal$kar->karyawan_id' hidden><i class='fas fa-dollar-sign'></i> Gaji</a>"?>
												
											<?php else:?>
											<?php $invo = "<a href='#' class='btn btn-small custom btn-info' id='gaj' data-toggle='modal' data-target='#modal$kar->karyawan_id' ><i class='fas fa-dollar-sign'></i> Gaji</a>"?>
											
											<?php endif; ?>
											<?php endif; ?>
										<?php endforeach; echo $invo?>	
											<!-- <a href="#" data-toggle="modal" data-target="#slip<?=$kar->karyawan_id?>" class="btn btn-small text-success"><i class="fas fa-file-invoice"></i> Invoice</a> -->
											<!-- onclick="deleteConfirm('<?php echo site_url('admin/payroll/delete/'.$pay->payroll_id) ?>')" -->
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

<?php foreach($karyawan as $kay):?>
<div class="modal fade " id="modal<?= $kay->karyawan_id ?>" role="dialog	">
	<div class="modal-dialog modal-lg ">
	<div class="modal-content">
	<div class="modal-header bg-light">
	<h4 class="modal-title">Penggajian Karyawan</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="close">
		<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-header">
		<labe><b>ID Penggajian : </b> <?php $idp = "PY-".date("dmY").substr(md5(time()), 0, 4); echo $idp;?></labe>
	</div>
	<form action="<?php echo base_url(); ?>admin/payroll/add" method="post" enctype="multipart/form-data" >

	<div class="modal-body ml-3 mr-3">
	
		<?php foreach($gaji as $gj){ 
				if($gj->jenis_gaji == "pendidikan"){$pdd= $gj->jumlah;}
				elseif($gj->jenis_gaji == "makan"){$mkn= $gj->jumlah;}
				elseif($gj->jenis_gaji == "kesehatan"){$ksh= $gj->jumlah;}
				elseif($gj->jenis_gaji == "transport"){$trp= $gj->jumlah;}
				elseif($gj->jenis_gaji == "perjam"){$pj= $gj->jumlah;}
				else{$ph= $gj->jumlah;}
			}
	 	?>
		 		<input type="hidden" name="idgaji" value="<?= $idp?>">

		 		<input type="hidden" name="idkar" value="<?= $kay->karyawan_id ?>">
				<input type="hidden" name="tanggal" value="<?= date("d-m-Y")?>">
				<input type="hidden" name="status" value="terbayar">


		 <div class="row ">
			<div class="mb-3 col-md-6">
			<label for="tanggal">Tanggal</label>
			<input class="form-control" type="text" name="tgl"  disabled value="<?= date('F Y')?>">
			</div>

			<div class="mb-3 col-md-6">
			<label for="nkr">Nama Karyawan</label>
			<input class="form-control" type="text" name="namakr" disabled value="<?= $kay->namakr?>">
			</div>
		</div>
		
		<div class="row">
			<div class="mb-3 col-md-6">
			<label for="jbkr">Jabatan </label>
			<input class="form-control" type="text" name="jb" disabled value="<?= $kay->jn?>">
			</div>
			<div class="mb-3 col-md-6">
			<label for="gp">Gaji Pokok</label>
			<input class="form-control" type="text" name="gp" disabled value="<?php $pokok =$kay->gp; echo "Rp. ".number_format($pokok)?>">
			<input type="hidden" name="gaji"  value="<?= $trp+$mkn+$pokok?>">

			</div>
		</div>
		<div class="row ">
		
		</div>
		<div class="row ">
		
			<div class="mb-3 col-md-6">
			<label for="jbkr">Tunjangan Transportasi </label>
			<input class="form-control" type="text" name="trans" disabled value="<?= " Rp. ".number_format($trp)?>">
			</div>
			<div class="mb-3 col-md-6">
			<label for="gp">Tunjangan Konsumsi</label>
			<input class="form-control" type="text" name="konsum" disabled value="<?= " Rp. ".number_format($mkn)?>">
			</div>
		</div>
		<div class="modal-header mb-2"></div>
		<div class="row ">
		
			<div class="mb-3 col-md-6">
				
			</div>
			<div class="mb-3 col-md-6">
			<label>Total Gaji : </label><h1><span id="akhir" class="font-weight-bold"><?=" Rp. ".number_format( $trp+$mkn+$pokok);?></span></h1>
						</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success" name="btn" value="Save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        
        <!-- <input class="btn btn-success" type="submit" name="btn" value="Save" /> -->
   		 </div>
		
	</div>
	
	</form>
</div>

</div>

</div>
<?php endforeach; ?>

<!-- ########################### Slip gaji #################################### -->

<?php foreach($karyawan as $ka):?>
<div class="modal fade " id="slip<?= $ka->karyawan_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-xl ">
	<div class="modal-content">
	<div class="modal-header bg-light">
	<h4 class="modal-title">Slip Karyawan</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="close">
		<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-header">
		<labe><b>ID Penggajian : </b> <?php foreach($payrol as $py){if($py->karyawan_id == $ka->karyawan_id){$pid=$py->payroll_id;echo $pid;}}; ?></labe>
	</div>
	<!-- <form action="#" method="post" enctype="multipart/form-data" > -->
	<div class="modal-body "  id="bslip">
		<div class="container">
		<body width="100%" >

		<input type="hidden" name="id" value="<?php echo $ka->karyawan_id;  ?>" />
		<div class="container">	
			<p align="right" >#<b><?= $pid;?></b></p>
		</div>
		<div class="row">
		
		<div class="mb-3 col-md-6">
		<img src="<?= base_url('assets/img/star.png')?>" width="150px" >
		
		<h5><b>PT. STAR Software Indonesia </b></h5>
	<p>St. Kenanga No. 126B Jombor kidul,<br> 
	Sinduadi, Mlati Sleman, 55284, <br> 
	Indonesia</p>
		<p class="fa fa-phone"> 62274-623-971</p><span class="fa fa-fax ml-2"> 62-21-2555-8767</span>
		</div>
		
		</div>
	
	<center><h4><b>SLIP GAJI KARYAWAN</b></h4></center>
	<hr>
	<table class="table table-sm mb-5">
		<tr>
			<td width="10%">NIK</td>
			<td>:</td>
			<td><?php echo $ka->id_card; ?></td>
			<td width="10%">Alamat</td>
			<td>:</td>
			<td><?php echo $ka->city_now; ?></td>
			<td width="10%">Tanggal</td>
			<td>:</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr>
			<td width="10%">Nama</td>
			<td>:</td>
			<td><?php echo $ka->namakr; ?></td>
			<td width="10%">Jabatan</td>
			<td>:</td>
			<td><?php echo $ka->jn; ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>

	<table class="table table-bordered-bottom table-sm ">
		<thead>
			<tr>
				<th>NO</th>
				<th>KETERANGAN</th>
				<th>JUMLAH</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>1</th>
				<td>Gaji Pokok</td>
				<td>Rp. <?php echo number_format($ka->gp) ?></td>
			</tr>
			<tr>
				<th>2</th>
				<td>Tunjangan Transportasi</td>
				<td>Rp. <?php echo number_format($trp) ?></td>
			</tr>
			<tr>
				<th>3</th>
				<td>Tunjangan Komsumsi</td>
				<td>Rp. <?php echo number_format($mkn) ?></td>
			</tr>
			<tr>
				<th colspan="2">TOTAL DITERIMA</th>
				<th>Rp. 
					<?php 
					$total = $mkn+$ka->gp+$trp;
					echo number_format($total);
					 ?>
				</th>
			</tr>
		</tbody>
	</table>
	<p style="text-align: right;">
		Penerima,
		<br><br><br><br>

		<b><?php echo $ka->namakr; ?></b>
	</p>
	
	</body>
	<div class="modal-footer">
		<button type="button" class="btn btn-success" id="print" onclick="printDiv('bslip')" >Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
	</div>
	</div>
	</div>
	<!-- </form> -->
		
	</div>
</div>

<?php endforeach;?>

</body>
</html>
<script src="<?php echo base_url('js/printThis.js') ?>"></script>
<script>
	function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
	document.body.innerHTML = originalContents;
	
}
</script>

<script>

  $(document).ready(function () {
  $('#tbl_karyawan').DataTable({
    
        // "scrollY": "280px",
        "scrollCollapse": false,
        // "sDom":'lrtip',
        // "lengthChange": false,
        // "paging":   false,
        "ordering": false,
        "info":     true
  });
  $('.dataTables_length').addClass('bs-select');
  });
</script>
<!-- <script>
//   var idp = <?="print".$pid?>
// $("#"+"idp").on("click", function () {
//       $('#bslip').printThis();
// });
$( document ).ready(function() {
$('button[id^="print"]').on('click', function() {  
    $('#bslip').printThis();
});
});
</script> -->