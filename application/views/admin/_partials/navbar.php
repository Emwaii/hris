<style type="text/css">
.bg-col1{
    background-color: #212529;
}
.fa-2x {
    font-size: 1.5em;
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

<nav class="navbar navbar-expand navbar-dark bg-col1 static-top ">
    
    <button class="btn btn-link btn-sm text-white order-3 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars fa-2x "></i>
        </button>
    
    <a class="navbar-brand ml-3 mr-4" href="<?php echo site_url('admin') ?>">
    <img src="<?= base_url('assets/img/star.png')?>" width="80px"><?php echo"&nbsp STAR Software"?>
    </a>
      

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-light" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- <span class="badge badge-danger">9+</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="alertsDropdown">
         
                <a class="dropdown-item" href="#"><?php //echo $row->fullname;?></a>
                
            </div>
        </li>

        <!-- Nav Item - Messages -->
        

        <li class="nav-item dropdown no-arrow ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img class="rounded-circle" src="<?php echo base_url('upload/user/'.$this->fungsi->user_login()->photo) ?>" width="30" height="30">
             <?php echo $this->fungsi->user_login()->full_name ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url('admin/profile') ?>">Profile</a>
                <a class="dropdown-item tab-call-url" href="<?php echo site_url('admin/profile#tab_2') ?>">Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>
</nav>
