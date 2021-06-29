
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMP TI - Login Anggota</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ICON -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/<?php echo $this->website['image'] ?>"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/adminlte/" ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/adminlte/" ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/adminlte/" ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>"><b>HMP</b>TI UDB</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login anggota HMPTI</p>

      <form class="form-group" action="" method="post">
        <input class="form-control mb-2" type="text" name="email" placeholder="Email">
        <input class="form-control mb-2" type="password" name="password" placeholder="Password">
        <button class="btn btn-primary" type="submit">Login</button>
      </form>
<!-- 
      <p class="login-box-msg">Atau</p>

      <div class="social-auth-links text-center mb-3">
        <a href="<?php echo $auth_url ?>" class="btn btn-block btn-danger">
          <i class="fab fa-google mr-2"></i> Login dengan Google
        </a>
      </div> -->
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <i>Silakan gunakan akun email dari kampus</i>
      </p>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <i>Atau kembali ke <a href="<?php echo base_url() . 'login' ?>">login sebagai peserta</a></i>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() . "assets/adminlte/" ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . "assets/adminlte/" ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . "assets/adminlte/" ?>dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // showing alert
    <?php $alert = $this->session->flashdata("msg") ?>
    <?php if ( !empty($alert) ): ?>
      <?php $alert = explode("#", $alert) ?>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
      });
      setTimeout(function() {
        Toast.fire({
          icon: "<?php echo $alert[0] ?>",
          title: "<?php echo $alert[1] ?>"
        });
      }, 1000);
    <?php endif ?>
  });
</script>

</body>
</html>
