<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

<style>
.bg-col3{
    background: linear-gradient(to bottom right, #014871,#d7ede2) ;
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
    /* background-color : #000000; */
}
.p-3{
	padding:9px !important
}
.shs {
border-radius:50%;
width: 220px;
box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
text-align: center;
}
/* .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e3e6f0;
    border-radius: 0.35rem;
} */
.card-body {
	
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
    width: 574px;
    height: 520px;
}
.tab-content > .active {
    display: block;
    position: absolute;
}
 @media (min-width: 992px) {
  .animate {
    animation-duration: 0.3s;
    -webkit-animation-duration: 0.3s;
    animation-fill-mode: both;
    -webkit-animation-fill-mode: both;
  }
}

@keyframes slideIn {
  0% {
    transform: translateY(0rem);
    opacity: 0;
  }
  100% {
    transform:translateY(1px);
    opacity: 1;
  }
  0% {
    transform: translateY(0rem);
    opacity: 0;
  }
}

@-webkit-keyframes slideIn {
  0% {
    -webkit-transform: transform;
    -webkit-opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0);
    -webkit-opacity: 1;
  }
  0% {
    -webkit-transform: translateY(1rem);
    -webkit-opacity: 0;
  }
}

.slideIn {
  -webkit-animation-name: slideIn;
  animation-name: slideIn;
}


</style>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">
		<?php if ($this->session->flashdata('changepw')): ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('changepw') ; ?>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('changepws')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('changepws') ; ?>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		</div>
		<?php endif; ?>
        <div class="box box-primary">
            <div class="box-body box-profile">

			  <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card mb-4">
              <div class="card-header d-flex p-3">
               <b><h5>Profile</h5></b>
                <ul class="nav nav-tabs  card-header-tabs ml-auto ">
                  <li class="nav-item"><a class="nav-link active " href="#tab_1" data-toggle="tab">Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Edit Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body ">
                <div class="tab-content ">
                  <div class="tab-pane active animate slideIn" id="tab_1">
				  <!-- <div class="card p-4"> -->
					<!-- <img class="card-img img-responsive" src="<?php echo base_url('upload/user/bgtest.png') ?>" alt="Card image" width="200px" height="250">
					<div class="card-img-overlay"> -->
					<center>
              			<img class="profile-user-img shs img-circle img-responsive" src="<?php echo base_url('upload/user/'.$this->fungsi->user_login()->photo) ?>" width="220px" height="220px">
			  		</center>	
					<!-- </div>
					</div> -->
				  	<br>
              		<h3 class="profile-username text-center"><?php echo $this->fungsi->user_login()->full_name ?></h3>

             		<p class="text-muted text-center"><?php echo $this->fungsi->user_login()->role ?></p>
				
					<div class="row ml-5 mr-5 m-4" >
						<div class="col-sm-5 text-right">
							<label>Username : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control " type="text" name="username" value="<?php echo $this->fungsi->user_login()->username ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Email : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->email ?>" disabled/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Phone : </label>
						</div>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->phone ?>" disabled/>
						</div>
					</div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane animate slideIn" id="tab_2">
				  	<form action="<?php echo base_url(); ?>admin/profile/edit" method="post" enctype="multipart/form-data">
					  	<input type="hidden" name="id" value="<?php echo $this->fungsi->user_login()->user_id ?>" />
						<input class="form-control" type="hidden" name="password" value="<?php echo $this->fungsi->user_login()->password ?>"/>
						<input class="form-control" type="hidden" name="role" value="<?php echo $this->fungsi->user_login()->role ?>" />
						<input class="form-control" type="hidden" name="dibuat" value="<?php echo $this->fungsi->user_login()->created_at ?>" />

				  	<div class="row ml-5 mr-5 m-4" >
						<div class="col-sm-5 text-right">
							<label>Username : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="text" name="username" value="<?php echo $this->fungsi->user_login()->username ?>"/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Full Name : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="text" name="full_name" value="<?php echo $this->fungsi->user_login()->full_name ?>"/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Email : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="text" name="email" value="<?php echo $this->fungsi->user_login()->email ?>"/>
						</div>
						<div class="col-sm-5 text-right">
							<label>Phone : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="text" name="phone" value="<?php echo $this->fungsi->user_login()->phone ?>" />
						</div>
						<!-- <div class="col-sm-5 text-right">
							<label>Role : </label>
						</div>
						<div class="col-sm-5">
							
						</div> -->
						<div class="col-sm-5 text-right">
							<label >Photo : </label>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
							<input class="form-control-file" type="file" name="image" />
							<input type="hidden" name="old_image" value="<?php echo $this->fungsi->user_login()->photo ?>"/>
							</div>
						</div>
					</div>
					<center>
					<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</center>
					</form>
                  </div>
                  <!-- /.tab-pane -->
				  <div class="tab-pane animate slideIn" id="tab_3">
				  <form action="<?php echo base_url(); ?>admin/profile/changepassword" method="post" >
				  	<div class="row ml-5 mr-5 m-4" >
						<div class="col-sm-5 text-right">
							<label>Current Password : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="password" name="currentpw" id="currentpw"/>
							<!-- <?= form_error('currentpw', '<small class="text-danger pl-3">', '</small>'); ?> -->
						</div>
						<div class="col-sm-5 text-right">
							<label>New Password : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="password" name="newpw" id="newpw"/>
							<!-- <?= form_error('newpw', '<small class="text-danger pl-3">', '</small>'); ?> -->
						</div>
						<div class="col-sm-5 text-right">
							<label>Repeat Password : </label>
						</div>
						<div class="col-sm-5 mb-3">
							<input class="form-control" type="password" name="repeatpw" id="repeatpw"/>
							<!-- <?= form_error('repeatpw', '<small class="text-danger pl-3">', '</small>'); ?> -->
						</div>
					</div>
					<center>
					<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</center>
					</form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
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
