<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png')?>" >
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <title>Forgot Password</title>
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


</style>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body class="colorbd text-dark bg-col3">

    <div class="container" style="margin-bottom: 270px;">
        <div class="row ">
            <div class="col-12 col-md-5 text-center mt-5 mx-auto p-4 bg-col" style=" border-radius:10px;">
            <!-- <img src="<?php echo base_url('assets/img/star.png')?>" width=100> -->
                <!-- <h1 class="h2">Login Admin</h1> -->
                <h3 class=" mt-2 mb-4">Forgot Your Password ?</h3>
                <p class="lead mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                
                <?php if ($this->session->flashdata('ihi')): ?>
				<div class="alert alert-success" role="alert">
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<?php echo $this->session->flashdata('ihi') ; ?>
				</div>
                <?php endif; ?>
                
                <?php if ($this->session->flashdata('ihii')): ?>
				<div class="alert alert-danger" role="alert">
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<?php echo $this->session->flashdata('ihii') ; ?>
				</div>
                <?php endif; ?>

                <form action="<?php echo base_url(); ?>admin/forgot_password/forgotpassword" method="POST">
                    <?php foreach ($email as $email): ?>    
                        <input type="hidden" name="protocol" id="protocol" value="<?php echo $email->protocol ?>">
                        <input type="hidden" name="smtp_host" id="smtp_host" value="<?php echo $email->smtp_host ?>">
                        <input type="hidden" name="smtp_user" id="smtp_user" value="<?php echo $email->smtp_user ?>">
                        <input type="hidden" name="smtp_pass" id="smtp_pass" value="<?php echo $email->smtp_pass ?>">
                        <input type="hidden" name="smtp_port" id="smtp_port" value="<?php echo $email->smtp_port ?>">
                        <input type="hidden" name="mailtype" id="mailtype" value="<?php echo $email->mailtype ?>">
                        <input type="hidden" name="charset" id="charset" value="<?php echo $email->charset ?>">
                        <input type="hidden" name="name" id="name" value="<?php echo $email->name ?>">
                    <?php endforeach; ?>

                    <div class="form-group">                    
                        <input type="text" class="form-control" name="forgot_email" id="forgot_email" placeholder="Enter Your E-mail Address" style=" border-radius:30px; height:50px;"/>
                        <?= form_error('forgot_email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn bg-col3 w-100 text-light mt-2" name="login" value="Reset Password" style=" border-radius:30px; height:50px;"/>
                    </div>
                    <div class="form-group">
                        <a href="<?= site_url('admin/login') ?>" class="mb-4" style="text-decoration:none;">Back to Login</a>
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

</body>

</html>

<script>
       $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
</script>