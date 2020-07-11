<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

  <style type="text/css">
  a:hover{
    text-decoration: none;
  }

  .custom {
    font-weight: normal;
    width: 65px;
    color: white !important;
    display: block;
    padding: inherit;
  }

::-webkit-scrollbar { 
    display: none;  /* Safari and Chrome */
}
  table.dataTable thead .sorting:after,
  table.dataTable thead .sorting:before,
  table.dataTable thead .sorting_asc:after,
  table.dataTable thead .sorting_asc:before,
  table.dataTable thead .sorting_asc_disabled:after,
  table.dataTable thead .sorting_asc_disabled:before,
  table.dataTable thead .sorting_desc:after,
  table.dataTable thead .sorting_desc:before,
  table.dataTable thead .sorting_desc_disabled:after,
  table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
  }
  
  </style>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Begin Page Content -->
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

		  <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <a class="card-body" href="#" id="free">
                  <div class="row no-gutters align-items-center" >
                    <div class="col mr-2" >
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Applicant Freelance</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->count_free()?></div>
                    
                    </div>
                    <div class="card-body-icon m-2">
                    <div class="col-auto">
                    <i class="fas fa-fw fa-user-friends text-gray-400"></i>
                    </div>                      
                    </div>
                    <!-- <div class="col-auto" >
                      <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div> -->
                  </div>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <a class="card-body"  href="<?php echo site_url('admin/inhouse') ?>">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Applicant Inhouse</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->count_in()?></div>
                    </div>
                    <div class="card-body-icon m-2">
                    <div class="col-auto">
                    <i class="fas fa-fw fa-user-tie text-gray-400 "></i>
                    </div>                      
                    </div>
                    <!-- <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div> -->
                  </div>
                </a>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <a class="card-body" href="<?php echo site_url('admin/karyawan') ?>">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employee</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->count_kar()?></div>
                    </div>
                    <div class="card-body-icon m-2">
                    <div class="col-auto">
                    <i class="fas fa-fw fa-users text-gray-400"></i>
                    </div>                      
                    </div>
                    <!-- <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div> -->
                  </div>
                </a>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <a class="card-body" href="<?php echo site_url('admin/user') ?>">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->count_user()?></div>
                    </div>

                    <div class="card-body-icon m-2">
                    <div class="col-auto">
                    <i class="fas fa-fw fa-user text-gray-400"></i>
                    </div>                      
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

		  
		 <!-- Content Row -->

     <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <?php foreach ($thnow as $th): ?>
			<?php $thn= $th->tahun ?>
			<?php endforeach; ?>
      <h6 class="m-0 font-weight-bold text-primary">Applicant Graph <?=$thn?> </h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Menu:</div>
          <a class="dropdown-item" href="<?php echo base_url('admin/project')?>">Open</a>
          <a class="dropdown-item" data-toggle="collapse" href="#jumchart" role="button" aria-expanded="false" aria-controls="jumchart">Hide</a>
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body flex-row collapse show multi-collapse" id="jumchart">
      <canvas id="chartproject"  width="100%"></canvas>
     
    </div>
  </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5 ">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Payroll</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Menu:</div>
          <a class="dropdown-item" href="<?php echo base_url('admin/payroll')?>">Open</a>
          <a class="dropdown-item" data-toggle="collapse" href="#listkar" role="button" aria-expanded="false" aria-controls="listkar">Hide</a>
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body flex-row collapse show multi-collapse" id="listkar">
      <div class="table-renponsive ">
        <table class="table table-hover table-sm table-striped example" id="tabel" width="100%">
        <thead class="">
            <tr>
              <th class="align-middle" style="text-align:center">No</th>
              <th class="align-middle" style="text-align:center">Nama Karyawan</th>
              <th class="align-middle" style="text-align:center">Status</th>
            </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($karyawan as $kar):?>
          <tr>
              <td style="text-align:center" >
                  <?php echo $i++ ?>
              </td>
              <td>
                   <?php echo substr($kar->namakr, 0, 15) ?>
              </td>
              <td>
                  <?php $stat = "<span class='badge badge-info custom'>Belum</span>";?>
                    <?php foreach($payrol as $pay){
                        if ($kar->karyawan_id == $pay->karyawan_id){
                        if(($pay->status == "terbayar") && (date('F',strtotime($pay->tanggal)) == date('F'))){$stat = "<span class='badge badge-success custom'>Terbayar</span>";}
                        else{$stat = "<span class='badge badge-info custom'>Belum</span>";}
                        }
                    } echo $stat;?>
              </td>
          </tr>
          <?php endforeach;?>
        </tbody>
        </table>
      </div>
      <div></div>
      <!-- <div class="mt-4 text-center small">
        <span class="mr-2">
          <i class="fas fa-circle text-primary"></i> Direct
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-success"></i> Social
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-info"></i> Referral
        </span>
      </div> -->
    </div>
  </div>
</div>
</div>

<!-- ############################## row ke-3 #################################### -->
<div class="row">

<!-- Area Chart -->
<div class="col-xl-4 col-lg-5 ">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Coming Soon</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Menu:</div>
          <a class="dropdown-item" href="<?php echo base_url('admin/project')?>">Open</a>
          <a class="dropdown-item" data-toggle="collapse" href="#mbuh" role="button" aria-expanded="false" aria-controls="mbuh">Hide</a>
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </div>
    </div>
     
      <div class="card-body flex-row collapse multi-collapse" id="mbuh">
      <!-- <canvas id="chartproject"  width="100%"></canvas> -->
     
    </div>
  </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-8 col-lg-7 ">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List karyawan</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Menu:</div>
          <a class="dropdown-item" href="<?php echo base_url('admin/karyawan')?>">Open</a>
          <a class="dropdown-item" data-toggle="collapse" href="#karlist" role="button" aria-expanded="false" aria-controls="listkar1">Hide</a>
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body  collapse show multi-collapse" id="karlist">
      <div class="table-renponsive ">
        <table class="table table-hover table-sm table-striped example" id="kartable" width="100%">
        <thead class="">
            <tr>
              <th class="align-middle" style="text-align:center">No</th>
              <th class="align-middle" style="text-align:center">Nama Karyawan</th>
              <th class="align-middle" style="text-align:center">Habis Kontrak</th>
              <th class="align-middle" style="text-align:center">Jenis Karyawan</th>
            </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($list as $kar):?>
          <tr>
              <td style="text-align:center" >
                  <?php echo $i++ ?>
              </td>
              <td>
                   <?php echo substr($kar->namakr, 0, 20) ?>
              </td>              
              <td>                 
                 <?php echo date('d F Y', strtotime($kar->tgl_habis));?>                 
              </td>
              <td>
                   <?php if($kar->jk == "kontrak"){
                     echo "<span class='badge badge-info' style='height: 22px;'>Kontrak</span>";
                   }else{
                    echo "<span class='badge badge-warning' style='height: 22px;'>Probation</span>";
                   }?>
              </td>
          </tr>
          <?php endforeach;?>
        </tbody>
        </table>
      </div>
      <div></div>
      <!-- <div class="mt-4 text-center small">
        <span class="mr-2">
          <i class="fas fa-circle text-primary"></i> Direct
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-success"></i> Social
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-info"></i> Referral
        </span>
      </div> -->
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


</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
$("#toastBasicTrigger").on("click", function(e) {
    e.preventDefault();
    $("#toastBasic").toast("show");
});
</script>
<script>
//   $(document).ready(function() {
//     $('#tabel').DataTable( {
//         "sDom":'lrtip',
//         "lengthChange": false,
//         "paging":   false,
//         "ordering": true,
//         "info":     false
//     } );
// } );
  $(document).ready(function () {
  $('#tabel').DataTable({
    
        "scrollY": "280px",
        "scrollCollapse": false,
        "sDom":'lrtip',
        "lengthChange": false,
        "paging":   false,
        "ordering": true,
        "info":     false
  });
  $('.dataTables_length').addClass('bs-select');
  });
</script>
<script>
$(document).ready(function () {
  $('#kartable').DataTable({
    
        "scrollY": "280px",
        "scrollCollapse": false,
        "sDom":'lrtip',
        "lengthChange": true,
        "paging":   false,
        "ordering": true,
        "info":     false
  });
  $('.dataTables_length').addClass('bs-select');
  });
</script>

<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx = document.getElementById("chartproject");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
      label: "Total Applicant Freelance",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [
		<?php foreach ($januari as $jan): ?>
		  '<?php echo $jan->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($februari as $feb): ?>
		  '<?php echo $feb->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($maret as $mar): ?>
		  '<?php echo $mar->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($april as $ap): ?>
		  '<?php echo $ap->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($mei as $mei): ?>
		  '<?php echo $mei->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($juni as $jun): ?>
		  '<?php echo $jun->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($juli as $jul): ?>
		  '<?php echo $jul->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($agustus as $ag): ?>
		  '<?php echo $ag->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($september as $sep): ?>
		  '<?php echo $sep->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($oktober as $ok): ?>
		  '<?php echo $ok->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($november as $nov): ?>
		  '<?php echo $nov->jum ?>',
		<?php endforeach; ?>
		<?php foreach ($desember as $des): ?>
		  '<?php echo $des->jum ?>'
		<?php endforeach; ?>],
      }, {
            label: "Total Applicant Inhouse",
            lineTension: 0.3,
            backgroundColor: "rgba(255, 145, 0,0.2)",
            borderColor: "rgba(255, 145, 0,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 145, 0,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(255, 145, 0,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: [
    <?php foreach ($januari1 as $jan1): ?>
		  '<?php echo $jan1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($februari1 as $feb1): ?>
		  '<?php echo $feb1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($maret1 as $mar1): ?>
		  '<?php echo $mar1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($april1 as $ap1): ?>
		  '<?php echo $ap1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($mei1 as $mei1): ?>
		  '<?php echo $mei1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($juni1 as $jun1): ?>
		  '<?php echo $jun1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($juli1 as $jul1): ?>
		  '<?php echo $jul1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($agustus1 as $ag1): ?>
		  '<?php echo $ag1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($september1 as $sep1): ?>
		  '<?php echo $sep1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($oktober1 as $ok1): ?>
		  '<?php echo $ok1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($november1 as $nov1): ?>
		  '<?php echo $nov1->sum ?>',
		<?php endforeach; ?>
		<?php foreach ($desember1 as $des1): ?>
		  '<?php echo $des1->sum ?>'
		<?php endforeach; ?>],

            // Changes this dataset to become a line
            type: 'line'
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
     //dicut 
    //  yAxes: [{
    //     ticks: {
		//   min: 0,
		//  	<?php if($jan->jum > 0): ?>
		// 		<?php $jum = $jan->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($feb->jum > $jan->jum): ?>
		// 		<?php $jum = $feb->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($mar->jum > $feb->jum): ?>
		// 		<?php $jum = $mar->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($ap->jum > $mar->jum): ?>
		// 		<?php $jum = $ap->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($mei->jum > $ap->jum): ?>
		// 		<?php $jum = $mei->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($jun->jum > $mei->jum): ?>
		// 		<?php $jum = $jun->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($jul->jum > $jun->jum): ?>
		// 		<?php $jum = $jul->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($ag->jum > $jul->jum): ?>
		// 		<?php $jum = $ag->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($sep->jum > $ag->jum): ?>
		// 		<?php $jum = $sep->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($ok->jum > $sep->jum): ?>
		// 		<?php $jum = $ok->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($nov->jum > $ok->jum): ?>
		// 		<?php $jum = $nov->jum ?>
		// 	<?php endif; ?>
		// 	<?php if($des->jum > $nov->jum): ?>
		// 		<?php $jum = $des->jum ?>
		// 	<?php endif; ?>
		//   max: <?php echo $jum ?>,
    //       maxTicksLimit: 5
    //     },
    //     gridLines: {
    //       color: "rgba(0, 0, 0, .125)",
    //     }
    //   }],
    },
    legend: {
      display: false
    }
  }
  
});

  

</script>

