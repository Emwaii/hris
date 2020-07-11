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
dropdown-item{
  background-color:  #212529;
}

</style>

<nav class="navbar navbar-expand navbar-dark bg-col1 static-top ">
  <a class="navbar-brand ml-3 mr-4" href="<?php echo site_url('guest') ?>">
    <img src="<?= base_url('assets/img/star.png')?>" width="70px"><?php echo"&nbsp PT. STAR Software Indonesia"?>
  </a>
    <!-- Navbar Search -->
    
    
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-6 ">
    <a class="navbar-brand ml-3 mr-4 float-right" href="<?php echo site_url('guest') ?>">
    Home
     </a>
    
        <li class=" nav-item dropdown no-arrow">
            <a class="navbar-brand dropdown-toggle " href="<?php site_url('guest')?>" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Employee Recruitment 
            </a>
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="userDropdown">
                <a class="navbar-brand dropdown-item text-dark" href="<?php echo site_url('guest/freelance') ?>">Freelance</a>
                <a class="navbar-brand dropdown-item text-dark" href="<?php echo site_url('guest/tetap') ?>">In-House</a>
                
            </div>
        </li>
   </ul>
</nav>

<script src="<?php echo base_url('css/mdb.min.js') ?>"></script>
