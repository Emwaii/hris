<!DOCTYPE html>
<html lang="en">

<head>
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
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <!-- Bootstrap core CSS-->  
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="text-dark bg-col3">

    <div class="container ">
        <div class="row">
            <div class="col-12 col-md-5 text-center mt-5 mx-auto p-4 bg-col">
                <img src="<?php echo base_url('assets/img/star.png')?>" width=100>
                <!-- <h1 class="h2">LOGIN ADMIN</h1> -->
                <p class="lead mt-2">Login untuk masuk ke halaman admin</p>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 col-md-5 mx-auto  bg-col">
                <form action="<?= site_url('admin/login') ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" name="email" placeholder="Username" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme" />
                                <label class="custom-control-label" for="rememberme"> Ingat Saya</label>
                            </div>
                            <a href="<?= site_url('reset_password') ?>">Lupa Password?</a>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" class="btn bg-col4 w-100 text-light" value="Login" />
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>