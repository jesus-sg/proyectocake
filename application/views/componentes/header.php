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
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/DataTables/datatables.min.css');?>"/>
  <!-- SELECT2 -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/select2/select2.min.css');?>"/>
  <script src="<?php echo base_url('asset/js/jquery-3.5.1.min.js');?>"></script>
   <!-- select2 -->
   <script type="text/javascript" src="<?php echo base_url('asset/select2/select2.min.js');?>"></script>
  <style>
     .table tfoot input{
        width: 100% !important;
    }
    .table tfoot {
        display: table-header-group !important;
    }
    .scroll_text{
        height:480px;
        overflow:auto;
        padding:0px 15px;
    }

    .scroll_text::-webkit-scrollbar {  
        width: 8px;  
    }  

    .scroll_text::-webkit-scrollbar-track {  
        background-color: #ffffff
    }  
    .scroll_text::-webkit-scrollbar-thumb {  
      background-color: #6493FF;
      border: 1px solid #6493FF;
      border-radius: 10px;
    }  
    .scroll_text::-webkit-scrollbar-thumb:hover {  
          -color: #000;  
    }  

  </style>
</head>

<body>
  <script>
    var urlSite = "<?php echo site_url('')?>";
    var nitGeneral = "<?php echo $this->session->userdata('us_tipo'); ?>";
  </script>