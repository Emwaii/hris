<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  <link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>

hr.style13  {
	border: 0; 
  height: 1px; 
  background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0); 
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
    
    <div class="card mb-3">
    
					<div class="card-header">
          <a href="<?php echo site_url('admin/karyawan') ?>" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Back</a>

					<a href="#" class="float-right" id="print"style="text-decoration:none;"><i class="fas fa-print"></i> Print</a>
      </div>
      <?php foreach($invo as $in):?>

      <div class="card-body">
        <div class="row" id="bslip">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  
                </div>
                <!-- /.col -->
              </div>
              <div class="row mb-3 border-bottom" >
							<div class="col-md-3 mb-3 shadow-sm p-3 mb-5 bg-white rounded" >
                <h4>
                <div class="card " style="width: 14rem;">
                  <img class="card-img-top img-responsive" src="<?php echo base_url('upload/karyawan/'.$in->image) ?>" alt="Card image cap" >

                  <div class="card-footer" style="text-align:center">
                    <small class="text-secondary" ><?= $in->namakr?></small>
                  </div>
                </div>
                </h4>
							
							</div>
            
							<div class="col-md-4 mb-2 ml-5 ">
                <label for="pendidikan">No KTP :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan" placeholder="Pendidikan Terakhir" value="<?php echo "  ".$in->id_card?>"/>
								<label for="tanggal_masuk">Jabatan :</label>
								<input class="form-control-plaintext " disabled type="text" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk" value="<?php echo "  ". $in->jn?>">
                <label for="pendidikan">Tempat, Tanggal Lahir : </label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan" placeholder="Pendidikan Terakhir" value="<?php echo "  ". $in->ttl.",".date('d F Y',strtotime($in->tgl_lahir))?>"/>
                <label for="pendidikan">E-mail :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan" placeholder="Pendidikan Terakhir" value="<?php echo "  ". $in->email_kantor?>"/>
                
                <label for="pendidikan">Alamat :</label>
                <p class="text-secondary ml-2"><?php echo $in->alamat_now?>,<br> 
                     <?php echo $in->city_now.", ".$in->state_now.", ".$in->zip_now?><br> 
                </p>
              </div>

							</div>
              <!-- <hr class="style13">	 -->

							<div class="row">
							<div class="col-md-6 mb-3">
              <label for="pendidikan">Jenis Kelamin      :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ".$in->jenis_kelamin?>"/>	
							  <label for="pendidikan">Pendidikan       :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->pendidikan?>"/>
                <label for="pendidikan">Nama Ayah        :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->nama_ayah?>"/>	
                <label for="pendidikan">Nama Ibu         :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->nama_ibu?>"/>	
                <label for="pendidikan">Nama Suami/Istri :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->nama_ss?>"/>	
							
              </div>
							<div class="col-md-6 mb-3">
                <label for="pendidikan">No Passport :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->no_pasport?>"/>	
                <label for="pendidikan">No BPJS :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->no_bpjs?>"/>	
                <label for="pendidikan">No NPWP :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->no_npwp?>"/>	
                <label for="pendidikan">Email Kantor :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->email_kantor?>"/>	
                <label for="pendidikan">Email Pribadi :</label>
								<input class="form-control-plaintext " disabled type="text" name="pendidikan"  value="<?php echo "  ". $in->email_pribadi?>"/>	
							
							</div>

						
							</div>
              <div class="form-group border-top mt-3 mb-3">
              <div class="card mt-3">
              <div class="card-header">
              Manajemen File 
             </div>
              <div class="card-body ">
              <a href="<?php echo site_url('admin/detail/donlodcv/'.$in->karyawan_id) ?>"
                class="btn btn-small btn-success " ><i class="fas fa-file-download"></i> Download CV</a>
                <a href="<?php echo site_url('admin/detail/donlodkontrak/'.$in->karyawan_id) ?>"
                class="btn btn-small btn-success " ><i class="fas fa-file-download"></i> Download Kontrak Kerja</a>
                <a href="<?php echo site_url('admin/detail/donlodgambar/'.$in->karyawan_id) ?>"
                class="btn btn-small btn-success" ><i class="fas fa-file-image"></i> Download Photo</a>
                <a href="<?php echo site_url('admin/detail/donlodktp/'.$in->karyawan_id) ?>"
                class="btn btn-small btn-success" ><i class="fas fa-file-image"></i> Download Photo KTP</a>
                   
              </div>
            </div>
                                        
              </div>
							
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div>
        </div>
   <?php endforeach;?>
     
      </div><!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  </div>
  </div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->



<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>

<script src="<?php echo base_url('js/printThis.js') ?>"></script>
<script>
// $('#btprint').click(function(){
//     $('#printableArea').printThis();
// });
var page = <?php $inv->nl?>
$( document ).ready(function() {
  
$('a[id^="print"]').on('click', function() {  
 
    $('#bslip').printThis({
      importCSS: true,            // import parent page css
      importStyle: true,
      loadCSS: "css/sb-admin-2.min.css",
    });
});
});
</script>

<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>