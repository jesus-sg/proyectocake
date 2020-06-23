<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ProyectoCake - Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('asset/vendors/mdi/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/vendors/base/vendor.bundle.base.css');?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css');?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('asset/images/favicon.png');?>" />
   <!-- Notiflix -->
   <link rel="shortcut icon" href="<?php echo base_url('asset/Notiflix/notiflix-2.3.2.min.css');?>" />
   
  <script src="<?php echo base_url('asset/js/jquery-3.5.1.min.js');?>"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              
                <img src="<?php echo base_url('asset/images/logo.svg');?>" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <form class="pt-3" action="<?php echo site_url('ControladorLogin/auth');?>" method="post">
                <div class="form-group">
                  <input type="text" name="email" class="form-control form-control-lg" placeholder="Usuario">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Contraseña">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>
              <?php echo $this->session->flashdata('msg');?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url('asset/vendors/base/vendor.bundle.base.js');?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url('asset/js/off-canvas.js');?>"></script>
  <script src="<?php echo base_url('asset/js/hoverable-collapse.js');?>"></script>
  <script src="<?php echo base_url('asset/js/template.js');?>"></script>
  <!-- Notiflix -->
  <script type="text/javascript" src="<?php echo base_url('asset/Notiflix/notiflix-aio-2.3.2.min.js');?>"></script>
  <!-- endinject -->
</body>

</html>
