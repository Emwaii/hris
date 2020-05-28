<!-- Sidebar -->
<ul class="sidebar navbar-nav">
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
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
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
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/karyawan/add') ?>">Add Karyawan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/karyawan') ?>">List Karyawan</a>
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'client' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Client</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/client/add') ?>">Add Client</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/client') ?>">List Client</a>
        </div>
    </li>
    <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'user' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/user/add') ?>">Tambah User</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/user') ?>">List User</a>
        </div>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>
