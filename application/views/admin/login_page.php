<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png')?>" >
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

<style type="text/css">
.bg-col{
    background-color: #f7f7f7   ;  
}
.bg-col2{
    background-color:#f5f5f5    ;
}
.bg-col3{
    background: linear-gradient(to bottom right, #014871,#d7ede2) ;
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
    /* background-color : #000000; */
}
.bg-col4{
    background-color: #a80231;    
}
.bg-col5{
    background-color: #212529;
}
.mantap {
    font-size:55px;
    font-family: 'Pacifico', cursive;
}

</style>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <!-- Bootstrap core CSS-->  
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="text-dark bg-col3 ">

    <div class="container ">
        <div class="row">
            <div class="col-12 col-md-5 text-center mt-5 mx-auto p-4 bg-col shadow-sm p-3 mb-5 " style=" border-radius:10px;">
                <!-- <img src="<?php echo base_url('assets/img/star.png')?>" width=100> -->
                <!-- <h1 class="h2">LOGIN ADMIN</h1> -->
                <h3 class=" mt-2 mb-4 mantap">Login</h3>
                <p class="lead mb-4">Welcome back! Login to access Admin Menu</p>

                <?php if ($this->session->flashdata('ihi')): ?>
				<div class="alert alert-success" role="alert">
                    <!-- <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> -->
					<?php echo $this->session->flashdata('ihi') ; ?>
				</div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('ihii')): ?>
				<div class="alert alert-danger" role="alert">
                    <!-- <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> -->
					<?php echo $this->session->flashdata('ihii') ; ?>
				</div>
                <?php endif; ?>

                <form action="<?= site_url('admin/login') ?>" method="POST">
                    <div class="form-group">
                        <!-- <label for="email" class="float-left">Username</label> -->
                        <input type="text" class="form-control" name="username" placeholder="Username" required style=" border-radius:30px; height:50px;"/>
                    </div>
                    <div class="form-group" >
                        <!-- <label for="password"  class="float-left">Password</label> -->
                        <input type="password" class="form-control" name="password" placeholder="Password" required style=" border-radius:30px; height:50px;"/>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input " name="rememberme" id="rememberme" />
                                <label class="custom-control-label" for="rememberme"> Remember me</label>
                            </div>
                            <a href="<?= site_url('admin/forgot_password') ?>" style="text-decoration:none;">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="form-group mb-4 ">
                        <input type="submit" name="login" class="btn bg-col3 w-100 text-light mt-2 " value="Login" style=" border-radius:30px; height:50px;"/>
                    </div>

                </form>
                <div class="copyright text-center my-auto">
                    <!-- <span>Copyright©</span> <span style="font-family: 'Pacifico', cursive; font-size:14px;">Emwai</span>   <?= " - ".date('Y')?> -->

                <!-- <span>Copyright©  <?php echo SITE_NAME ." ". Date('Y') ?></span> -->
                </div>
            </div>
        </div>
       
    </div>
    <?php $this->load->view("guest/_partials/js.php") ?>

    <script>
    $(".alert").delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
   </script>
</body>

</html>

