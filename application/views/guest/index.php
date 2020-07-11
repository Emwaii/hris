<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png')?>" >
<?php $this->load->view("guest/_partials/head.php") ?>

<style type="text/css">
.bg-col{
    /* background-position:center;
    background-image: url(../assets/img/guest/bg2.png); */
    background-color: #f9f9f7;
    opacity:0.97;  
}
.btnn {
    display: inline-block;
    font-weight: 400;
    color: white;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #a80231;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.35rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btnn:hover{
    color: solid #5f5d7e;
}

.bg-col4{
    background-color: #a80231;    
}
/* .text-dark{
    color: solid #212529;
} */

input[type=text] {
    width:100%;
    height: calc(1.5em + 0.75rem + 1.2rem);
    border: none;
    border-radius:0;
    border-bottom: 2px solid grey;
    color: black;
}
input[type=text]:hover{
    border-bottom: 2px solid #3f3d56;
}
textarea:hover{
    border-bottom: 2px solid #3f3d56;

}

#content-wrapper {
    display: block;
    background-image: url(../assets/img/guest/house2.png);
    /* background-image: url(../assets/img/guest/238870.jpg); */
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
}

.custom-file-upload{
  background: #f7f7f7; 
  padding: 8px;
  border: 1px solid #e3e3e3; 
  border-radius: 5px; 
  border: 1px solid #ccc; 
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}   
hr.style2 {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #8c8b8b inset;
}
.carousel-item {
    height: 500px;
}
p{
    font-size: 20px;
}
</style>

<?php $this->load->view("guest/_partials/navbar.php") ?>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. STAR Software Indonesia</title>

    <!-- Bootstrap core CSS-->  
    <link href="<?php echo base_url('assets/img/guest/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top ">

	<div id="wrapper">

		<div id="content-wrapper">

			<div class="container-fluid">
            
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol> -->
                        
                        <div class="carousel-inner">
                        <?php $i=1; foreach($lowo as $lw):?>
                            <div class="carousel-item <?php if($lw->is_active ==  1){echo "active";}?>">
                                <img class="d-block w-100" src="<?php echo base_url('upload/lowongan/'.$lw->header) ?>" alt="<?= $i++?>">
                                <div class="carousel-caption d-none d-md-block">
                              <h4 class="<?= $lw->text_color?>"><b><?= $lw->nama_lowongan?></b></h4>
                                <p class="<?= $lw->text_color?>"><?= $lw->keterangan?></p>
                                </div>    
                            </div>
                         
                        <?php endforeach;?>
                         </div>
                         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                 </div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->

		</div>
		<!-- /.content-wrapper -->

</div>	
	<!-- /#wrapper -->

	<?php $this->load->view("guest/_partials/scrolltop.php") ?>
	<?php $this->load->view("guest/_partials/modal.php") ?>

	<?php $this->load->view("guest/_partials/js.php") ?>
    <script src="<?php echo base_url('css/bootstrap-filestyle.min.js') ?>"></script>
    <script src="<?php echo base_url('css/jquery-input-file-text.js') ?>"></script>
    
</body>


</html>