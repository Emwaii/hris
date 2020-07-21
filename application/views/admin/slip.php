<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  <link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
          <a href="<?php echo site_url('admin/payroll') ?>" style="text-decoration:none;"><i class="fas fa-arrow-left"></i> Back</a>

					<a href="#" class="float-right" id="print"style="text-decoration:none;"><i class="fas fa-print"></i> Print</a>
      </div>
      <div class="card-body">
        <div class="row" id="bslip">
          <div class="col-12">


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="<?php echo base_url('assets/img/star.png')?>" width="100"  >
                    <small class="float-right"><?php foreach($invo as $in){if((date('F',strtotime($in->tglp)) == date('F'))) echo "#".$in->pid;}?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <h5><b>PT. STAR Software Indonesia</b></h5>
                  <address>
                  <p>St. Kenanga No. 126B Jombor kidul<br> 
                      Sinduadi, Mlati Sleman, 55284 <br> 
                      Indonesia</p>
                  <i class="fa fa-phone text-dark"> 62274-623-971</i>
                  <i class="fa fa-fax text-dark"> 62-21-2555-8767</i>
                  <!-- <?php foreach ($karyawan as $kar): ?>
                    <strong><?php echo $karyawan->full_name ?></strong><br>
                    Phone: <?php echo $invo->phone ?><br>
                    Email: <?php echo $invo->email ?>
                    <?php endforeach; ?> -->
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <!-- To
                  <address>
                    
                    <strong><?php echo $this->fungsi->user_login()->full_name ?></strong><br>
                    Phone: <?php echo $this->fungsi->user_login()->phone ?><br>
                    Email: <?php echo $this->fungsi->user_login()->email ?>
                    
                  </address> -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <!-- <b>#<?php foreach($invo as $in){echo $in->pid;}?></b> -->
                  <br>
                  <br>
                  <!-- <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <?php foreach($gaji as $gj){ 
              if($gj->jenis_gaji == "pendidikan"){$pdd= $gj->jumlah;}
              elseif($gj->jenis_gaji == "makan"){$mkn= $gj->jumlah;}
              elseif($gj->jenis_gaji == "kesehatan"){$ksh= $gj->jumlah;}
              elseif($gj->jenis_gaji == "transport"){$trp= $gj->jumlah;}
              elseif($gj->jenis_gaji == "perjam"){$pj= $gj->jumlah;}
              else{$ph= $gj->jumlah;}
            }
          ?>

          <center><h4><b>Salary Slip</b></h4></center>
          <hr>
          <table class="table table-sm mb-4 table-striped table-borderless">
            <?php foreach($invo as $iv):?>
              <?php if(date('F',strtotime($iv->tglp)) == date('F')):?>
            <tr>
              <td width="10%">NIK</td>
              <td>:</td>
              <td><?php echo $iv->idcard; ?></td>
              <td width="10%">Address</td>
              <td>:</td>
              <td><?php echo $iv->cn; ?></td>
              <td width="10%">Date</td>
              <td>:</td>
              <td><?php echo date('d/m/Y'); ?></td>
            </tr>
            <tr>
              <td width="10%">Name</td>
              <td>:</td>
              <td><?php echo $iv->nl; ?></td>
              <td width="10%">Position</td>
              <td>:</td>
              <td><?php echo $iv->jjn; ?></td>
              <td></td>
              </tr>
              <?php endif;?>
            <?php endforeach;?>
          </table>
          
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive ">
                
                  <table class="table table-striped table-sm">
                    <thead class="bg-light">
                    <tr>
                      <th style="text-align: center">No</th>
                      <th style="text-align: center">Information</th>
                      <th style="text-align: center">Amount</th>
                    </tr>
                    </thead>
                    <?php foreach ($invo as $inv): ?>
                      <?php if(date('F',strtotime($inv->tglp)) == date('F')):?>
                    <tbody>
                    <tr>
                      <td style="text-align: center"><?php echo "1"?></td>
                      <td><?php echo "Basic Salary" ?></td>
                      <td><?php echo "Rp. ".number_format($inv->jgp) ?></td>
                    </tr>
                    <tr>
                      <td style="text-align: center"><?php echo "2"?></td>
                      <td><?php echo "Transportation Allowance" ?></td>
                      <td><?php echo "Rp. ".number_format($trp) ?></td>
                    </tr>
                    <tr>
                      <td style="text-align: center"><?php echo "3"?></td>
                      <td><?php echo "Consumption Allowance" ?></td>
                      <td><?php echo "Rp. ".number_format($mkn) ?></td>
                    </tr>
                      <?php endif;?>
                    <?php endforeach; ?>
                    
                    <tr> 
                      <td colspan="2"><h5 class="lead" style="text-align:center"><?php echo "Total Earnings" ?></h5></td>
                      <td><?php echo "Rp. ".number_format($mkn+$trp+$inv->jgp) ?></td>
                    </tr> 
                  </tbody>
                  </table>
               </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6" >
                <?php 
                $totaal = $mkn+$trp+$inv->jgp;
                function penyebut($nilai) {
                  $nilai = abs($nilai);
                  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
                  $temp = "";
                  if ($nilai < 12) {
                    $temp = " ". $huruf[$nilai];
                  } else if ($nilai <20) {
                    $temp = penyebut($nilai - 10). " belas";
                  } else if ($nilai < 100) {
                    $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
                  } else if ($nilai < 200) {
                    $temp = " seratus" . penyebut($nilai - 100);
                  } else if ($nilai < 1000) {
                    $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
                  } else if ($nilai < 2000) {
                    $temp = " seribu" . penyebut($nilai - 1000);
                  } else if ($nilai < 1000000) {
                    $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
                  } else if ($nilai < 1000000000) {
                    $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
                  } else if ($nilai < 1000000000000) {
                    $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
                  } else if ($nilai < 1000000000000000) {
                    $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
                  }     
                  return $temp;
                }

                function terbilang($nilai) {
                  if($nilai<0) {
                    $hasil = "minus ". trim(penyebut($nilai));
                  } else {
                    $hasil = trim(penyebut($nilai));
                  }     		
                  return $hasil;
                }

                $f = new NumberFormatter('en', NumberFormatter::SPELLOUT);
                $f->format($totaal);
                
                // $terbilang= ucfirst(terbilang($totaal))." rupiah";
                $terbilang= ucfirst($f->format($totaal))." rupiah";
                ?>
                <span class="text-secondary">Amount in word : </span><span  class="text-secondary" style="font-style:italic"><?= $terbilang?></spanTerbilang>

                </div>
                <!-- /.col -->
                <div class="col-12">
                  <b class="float-right mr-4">Recipient</b><br><br><br>
                  <br>
                  <b class="lead float-right"><?= $inv->nl?></b>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row no-print">
                <div class="col-12 mb-5 ">
                  <!-- <button class="btn btn-default" id="print"><i class="fas fa-print" ></i> Print</button> -->
                  <!-- <button class="btn btn-success float-right" id="print" ><i class="fas fa-file-invoice"></i>
                    Print
                  </button> -->
                  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" > 
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
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