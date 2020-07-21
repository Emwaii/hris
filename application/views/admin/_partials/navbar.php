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
    <img src="<?= base_url('assets/img/star.png')?>" width="80px"><?php echo"&nbsp PT. STAR Software Indonesia"?>
    </a>
      

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <!-- <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-light" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div> -->
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        

        <!-- Nav Item - Messages -->
        <?php 
          $query = $this->db->query("SELECT `nama_lengkap`,`tgl_habis` from karyawan where 
          month(DATE_SUB(STR_TO_DATE(`tgl_habis`,'%d-%m-%Y'), INTERVAL 1 MONTH)) = month(CURRENT_DATE()) and 
          year(DATE_SUB(STR_TO_DATE(`tgl_habis`,'%d-%m-%Y'), INTERVAL 1 MONTH)) = year(CURRENT_DATE())");//month(CURRENT_DATE())
          // $rw = $query->result()->num_row();
          ?>
        <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger"><?= $query->num_rows();?></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in mt-2 p-0" aria-labelledby="messagesDropdown" style="width: 400px;">
                <h6 class="dropdown-header">
                  Notification Center
                </h6>
                
                <?php foreach($query->result() as $row): ?>
                <a class="dropdown-item  align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                  </div>
                  <div>
                    <div class="text-truncate"><?= $row->nama_lengkap?></div>
                    <div class="small text-gray-500">Date Exp· <?= $row->tgl_habis?></div>
                  </div>
                </a>
                <?php endforeach;?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Notification</a>
              </div>
            </li>

        <li class="nav-item dropdown no-arrow ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img class="rounded-circle" src="<?php echo base_url('upload/user/'.$this->fungsi->user_login()->photo) ?>" width="30" height="30">
             <?php echo $this->fungsi->user_login()->full_name ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url('admin/profile') ?>"><i class="fas fa-user mr-2"></i>Profile</a>
                <!-- <a class="dropdown-item tab-call-url" href="<?php echo site_url().'admin/profile#tab_2' ?>"><i class="fas fa-cogs"></i>Settings</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </div>
        </li>
    </ul>
</nav>
