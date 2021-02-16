
      </div><!-- /.container-fluid -->
    </section>




  </div>

    <!-- /.content -->
  <footer class="main-footer" style="border-top: none; background-color: #282c31;">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_content">
        
      </div>
      <div>
        <button type="button" class="btn btn-sm btn-secondary float-right mb-3 mr-3" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/adminlte/plugins/toastr/toastr.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script type="text/javascript">
  function submit_form(form_id) {
    $(form_id).submit();
  }

  function sidebar_highlight() {
    //title & subtitle
    $(".sidebar .nav-item a.nav-link").each(function () {
      if ( $(this).find("p").html() == '<?php echo $subtitle ?>' ) {
        $(this).addClass("active");
      }
      if ( $(this).find("p span").html() == '<?php echo $title ?>' ) {
        $(this).addClass("active");
        $(this).parent().addClass("menu-open");
        $(this).parent().find(".nav-treeview").css({display: "block"});
      }
    });
  }

  $(document).ready(function () {

    sidebar_highlight();

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

  })
</script>

</body>

</html>
