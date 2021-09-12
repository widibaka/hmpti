<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta property="og:image" content="<?= base_url('assets/img/') . $this->website['image']; ?>" />

    <meta property="og:type" content="organization" />
    <meta property="og:title" content="<?= $this->website['nama_organisasi']; ?>" />
    <meta property="og:description" content="<?= $this->website['tentang_kami']; ?>">
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:site_name" content="<?= $this->website['nama_organisasi']; ?>" />

    <title><?= $this->website['nama_organisasi']; ?> <?php echo "- " . $this->title ?></title>

    <link rel="canonical" href="<?php echo base_url() ?>">


    <!-- ICON -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/<?php echo $this->website['image'] ?>"/>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="<?php echo base_url() ?>assets/fontawesome/css/all.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.css">
    <!-- Custom css -->
    <link href="<?php echo base_url() ?>assets/widibaka.css?v3" rel="stylesheet">

    <style type="text/css">
      .custom_navbar a.nav-link{
        color: <?php echo $this->website['navbar_text'] ?>;
      }
      .custom_navbar .navbar-toggler-icon i{
        color: <?php echo $this->website['navbar_text'] ?>;
      }
      .custom_navbar .search-btn{
        border-color: <?php echo $this->website['navbar_text'] ?>;
        color: <?php echo $this->website['navbar_text'] ?>;
        transition: background-color border-color ease 300ms; 
      }

      <?php
        $hex = $this->website['navbar_bg'];
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
      ?>
      .custom_navbar{
        background-color: <?php echo "rgba({$r},{$g},{$b},.6)" ?>;
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
        backdrop-filter: blur( 25.0px );
        -webkit-backdrop-filter: blur( 25.0px );
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        margin: 0 10px 0 10px;
      }
      .custom_navbar .search-btn:hover{
        border-color: #1D9058;
        color: <?php echo $this->website['navbar_text'] ?>;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/bootstrap5/carousel.css" rel="stylesheet">
  </head>
  <body class="bg-gray-1" style="
      background-image: url('<?php echo base_url() ?>assets/img/bg0.png');
      /*background-attachment: fixed;*/
      background-position: left bottom;
      background-size: 20% auto;
      background-repeat: no-repeat;
  ">

  <div class="loader" style="opacity: 1; position: fixed;">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
    <div class="bar4"></div>
    <div class="bar5"></div>
    <div class="bar6"></div>
  </div>

    <header>
      <nav class="navbar shadow navbar-expand-md fixed-top custom_navbar" style="z-index: 3;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img width="45" src="<?php echo base_url() ?>assets/img/<?php echo $this->website['image'] ?>">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="color: <?php echo $this->website['navbar_text'] ?>;">
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="<?php echo base_url() ?>">Home</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Organisasi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo base_url() ?>p/struktur_organisasi">Struktur Organisasi</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url() ?>p/visi_misi">Visi & Misi</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="<?php echo base_url() ?>p/anggota_nonaktif">Anggota Nonaktif</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Divisi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php foreach ($this->all_divisi as $key => $divisi): ?>
                    <li><a class="dropdown-item" href="<?php echo base_url() ?>p/divisi/<?php echo $divisi['id_divisi'] ?>"><?php echo $divisi['nama_divisi'] ?></a></li>
                  <?php endforeach ?>
                  <!-- <li><hr class="dropdown-divider"></li> -->
                </ul>
              </li>
              <!-- <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url() ?>p/credits">Credits</a>
              </li> -->
              
              
              <?php if ( !empty( $this->session->userdata('guest') ) ): ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $this->session->userdata('name') ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo base_url() ?>logout">Logout</a></li>
                  </ul>
                </li>
              <?php elseif ( empty( $this->session->userdata('name') ) ): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>login">
                      Login
                  </a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>login">
                      <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka kembali dashboard"><?php echo $this->session->userdata('name') ?></span>
                  </a>
                </li>
              <?php endif ?>
              

              
              <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li> -->
            </ul>
            <form action="<?php echo base_url() ?>p/search" class="d-flex">
              <input class="form-control me-2" type="search" name="q" placeholder="Cari event/orang ..." aria-label="Search">
              <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <main class="bg-transparent">
      <div style="min-height: 80vh;">