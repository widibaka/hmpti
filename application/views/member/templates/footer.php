
      </div><!-- /.container-fluid -->
    </section>




  </div>

    <!-- /.content -->
  <footer class="main-footer bg-transparent" style="border-top: none;">
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
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- TweenMax For Transition -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/plugins/CSSRulePlugin.min.js'></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Fancybox -->
<script src="<?= base_url() ?>assets/plugin_baru/fancybox/dist/jquery.fancybox.min.js"></script>

<script type="text/javascript">
  // Fancybox Options
  $('[data-fancybox="gallery"]').fancybox({
    buttons: [
        "zoom",
        //"share",
        // "slideShow",
        // "fullScreen",
        // "download",
        // "thumbs",
        "close"
    ],
    animationEffect: "fade",
  });


  function submit_form(form_id) {
    // transition_onleave(); <-- function ini berbahaya. Menghilangkan validate

    // sebagai gantinya, kalo submit, beri loader
    show_loader( $('button[onclick^="submit_form(\''+form_id+'"]') ); // find that has onclick start_with "submit_form..."
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

  $("#logout_btn").click(function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Yakin ingin logout?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
        window.location.href = "<?php echo base_url() ?>logout";
      }
    });

  });

  // FOR LOADER S
    function transition_onload() {

      var tl = new TimelineMax();
      
      tl.to(CSSRulePlugin.getRule('body:before'), 0.2, {cssRule: {top: '0%' }, ease: Power2.easeOut}, '+=1.5', 'open')
      .to(CSSRulePlugin.getRule('body:after'), 0.2, {cssRule: {bottom: '0%' }, ease: Power2.easeOut}, '-=0.2', 'open')
      .to($('.loader'), 0.2, {opacity: 0}, '-=0.2');
      setTimeout(function() {
        $(".wrapper").animate({opacity: 1}); //show the main content
        $('.loader').hide();
      }, 1000);
    }

    function transition_onleave() {
      $(".wrapper").hide();
      $('.loader').show();
      var tl = new TimelineMax();
      
      tl.to(CSSRulePlugin.getRule('body:before'), 0.2, {cssRule: {top: '51%' }, ease: Power2.easeOut}, 'close')
      .to(CSSRulePlugin.getRule('body:after'), 0.2, {cssRule: {bottom: '50%' }, ease: Power2.easeOut}, 'close')
      .to($('.loader'), 0, {opacity: 1})
    }
  // FOR LOADER E

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

    // LOADER STARTS
      setTimeout(transition_onload, 0);

      $("a.do_transition").click(function(e) {
        e.preventDefault();
        transition_onleave();
        this_element = $(this);
        setTimeout(function () { // Bug setInterval jadi setTimeout FIXED!
          window.location.href = this_element.attr("href");
        }, 500);
      });
    // LOADER ENDS

  });

  

    
  // Loader for button
  function show_loader(element, caption="Loading...") {
    element.addClass('disabled');
    let captionAsli = element.html();
    element.attr('captionAsli', captionAsli);
    element.html('<img class="mr-2" src="<?php echo base_url() ?>assets/img/loader.gif"> ' + caption);
  }

  function hide_loader(element) {
    element.removeClass('disabled');
    let captionAsli = element.attr('captionAsli');
    console.log(captionAsli)
    element.html(captionAsli);
  }

  

  $('form').on('submit', function () {
    show_loader( $(this).find('[type="submit"]') );
  })
</script>

</body>

</html>
