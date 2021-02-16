<!DOCTYPE html>
<html style="background-image: ;
      background-size: cover;
      background-position: center;
      background-attachment: fixed;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  
  <title>Admin Panel<?php echo (!empty($subtitle)) ? " - " . $subtitle : "" ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/adminlte/') ?>logo.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="HMP TI">
  <meta name="language" content="id" />
  <meta name="geo.country" content="id" />
  <meta http-equiv="content-language" content="In-Id" />
  <meta name="geo.placename" content="Indonesia" />

  <meta property="og:type" content="software" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="HMP TI">
  <meta property="og:url" content="<?= base_url() ?>" />
  <meta property="og:site_name" content="Koreksoft" />

  <!-- ICON -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/<?php echo $this->website['image'] ?>"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/toastr/toastr.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Custom css -->
  <link href="<?php echo base_url() ?>assets/widibaka.css?v1" rel="stylesheet">

  <style type="text/css">
    @-webkit-keyframes glow {
        to {
        border-left: 5px solid #456dff;
        background-color: #474040;
        }
    }
    @-webkit-keyframes glow_dua {
        to {
        background-color: #474040;
        }
    }

    .menyala {
        -webkit-animation: glow 500ms infinite alternate;  
         -webkit-transition: border 1.0s linear, box-shadow 1.0s linear;
           -moz-transition: border 1.0s linear, box-shadow 1.0s linear;
                transition: border 1.0s linear, box-shadow 1.0s linear;
    }

    .menyala_ruang_tabel {
        -webkit-animation: glow_dua 500ms infinite alternate;  
         -webkit-transition: border 1.0s linear, box-shadow 1.0s linear;
           -moz-transition: border 1.0s linear, box-shadow 1.0s linear;
                transition: border 1.0s linear, box-shadow 1.0s linear;
    }

  </style>

</head>
<span class="d-none" id="title"><?php echo $title ?></span>
<span class="d-none" id="subtitle"><?php echo $subtitle ?></span>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed" style="opacity: 0.94">
<!-- Site wrapper -->
<div class="wrapper" style="background-color: #282c31;">

