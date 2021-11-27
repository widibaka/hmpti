


<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===================================================================================-->
    <!-- ICON -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/<?php echo $this->website['image'] ?>"/>
    <!--===================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login_page/" ?>css/util.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login_page/" ?>css/style.css" />
    <!--===================================================================================-->
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.css">
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100 shadow">
          <div
            class="login100-form-title"
            style="background-image: url('<?php echo base_url() . "assets/login_page/" ?>img/bg-02.jpg')"
          >
            <span class="login100-form-title-1"> Login </span>
          </div>
           <!-- tombol login -->
          <form class="login100-form">
            <a href="<?php echo $auth_url ?>" class="btn-google m-b-20">

            <svg style="height: 32px;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
              width="48" height="48"
              viewBox="0 0 48 48"
              style=" fill:#000000;"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
            </svg>

            Google</a>
            <div class="text-center">
              <a href="<?php echo base_url() ?>"> back to home </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>












<!-- jQuery -->
<script src="<?php echo base_url() . "assets/adminlte/" ?>plugins/jquery/jquery.min.js"></script>
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
