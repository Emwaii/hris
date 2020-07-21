<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png')?>" >
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <title>Change Password</title>
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

<body class="colorbd text-dark bg-col3 ">

    <div class="container" style="margin-bottom: 270px;" >
        <div class="row">
            <div class="col-12 col-md-5 text-center mt-5 mx-auto p-4 bg-col" style=" border-radius:10px;">
            <!-- <img src="<?php echo base_url('assets/img/star.png')?>" width=100> -->
                <!-- <h1 class="h2">Login Admin</h1> -->
                <h3 class=" mt-2 mb-4">Change Your Password for</h3>
                <p class="lead" style="font-size:23px;"><?= $this->session->userdata('reset_email'); ?></p>

                <?php if ($this->session->flashdata('ihi')): ?>
				<div class="alert alert-success" role="alert">
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<?php echo $this->session->flashdata('ihi') ; ?>
				</div>
                <?php endif; ?>

                <form action="<?php echo base_url(); ?>admin/forgot_password/changepass" method="POST">
                    <div class="form-group mt-4">
                        <input type="password" class="form-control" name="password1" id="password1" placeholder="Enter New Password ..." style=" border-radius:30px; height:50px;" />
                        <?= form_error('password1', '<small class="text-default pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Password ..." style=" border-radius:30px; height:50px;" />
                        <?= form_error('password2', '<small class="text-default pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn bg-col3 w-100 text-light mt-2" name="login" value="Change Password" style=" border-radius:30px; height:50px;"/>
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