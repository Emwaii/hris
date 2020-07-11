<!-- Sidebar -->
<style>
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
    transform:translateY(0px);
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
<ul class="sidebar navbar-nav animate slideOut">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'project' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Projects</span>
        </a>
        <div class="dropdown-menu animate slideIn" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/project/add') ?>">Add Project</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/project') ?>">List Project</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'karyawan' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Karyawan</span>
        </a>
        <div class="dropdown-menu animate slideIn" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/karyawan/add') ?>">Add Karyawan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/karyawan') ?>">List Karyawan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/karyawan/detail') ?>">List Karyawan</a>

        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'client' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Client</span>
        </a>
        <div class="dropdown-menu animate slideIn" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/client/add') ?>">Add Client</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/client') ?>">List Client</a>
        </div>
    </li>
    

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'user' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span></a>
            <div class="dropdown-menu animate slideIn" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/user/add') ?>">Tambah User</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/user') ?>">List User</a>
        </div>
    </li>
  
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'absen' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Absensi</span></a>
            <div class="dropdown-menu animate slideIn" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/absen/add') ?>">Absen karyawan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/absen') ?>">List Absensi</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/absen/rekap') ?>">Rekap Absensi</a>

        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'payroll' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Payroll</span></a>
            <div class="dropdown-menu animate slideIn" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/payroll') ?>">Penggajian Karyawan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/tunjangan') ?>">Tunjangan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jabatan') ?>">Jabatan</a>

            <!-- #################### test ##################### -->
            
        </div>
    </li>
    
    <?php if($this->fungsi->user_login()->role == "superadmin") { ?>

      <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'settings' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
            <div class="dropdown-menu animate slideIn" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/settings') ?>">Penggajian Karyawan</a>
            <!-- <a class="dropdown-item" href="<?php echo site_url('admin/tunjangan') ?>">Tunjangan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jabatan') ?>">Jabatan</a> -->

            <!-- #################### test ##################### -->
            
        </div>
    </li>
    <?php }?>
</ul>
