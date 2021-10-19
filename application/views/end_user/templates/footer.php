
      </div>
      <!-- FOOTER -->
      <footer class="container" style="font-size: 14pt;">
        <a href="#" class="to_top"><i class="fa fa-arrow-circle-up"></i></a>
        <p>
          <a class="mr-5" title="Buka instagram HMPTI" href="https://www.instagram.com/hmpti.udb/?hl=id">
            <i class="fab fa-instagram mr-4"></i> 
          </a>
           
          <?= $this->website['nama_organisasi']; ?> 2019 - <?php 
            echo date("Y");
          ?>
        </p>
        <!-- .widibaka was here -->
      </footer>

    </main>
    
    <script src="<?php echo base_url() ?>assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery 3 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- TweenMax For Transition -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/plugins/CSSRulePlugin.min.js'></script>
    <!-- Tooltip -->
    <!-- <script src="assets/bootstrap5/tooltip.js"></script> -->
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script type="text/javascript">
      // bayangan navbar punya bayangan hanya ketika di-scroll doang
      function ubah_navbar() {
        if ( $( "html" ).scrollTop() > 200 ) {
          $(".custom_navbar").removeClass('navbar_tanpa_margin_tanpa_shadow');
        }else{
          $(".custom_navbar").addClass('navbar_tanpa_margin_tanpa_shadow');
        }
      }



      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });

      // var myModal = new bootstrap.Modal(document.getElementById('modalCountdown'), {});

      // myModal.show();

      function get_detail(id_event) {
        var loader = `<div class="col-12" style="
                  background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
                  background-repeat: no-repeat;
                  background-position: center;
                  min-height: 50px;
                ">`;

        $("#detail_event").html(loader);
        setTimeout(function() {
          $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>p/ajax_detail_event/"+id_event,
            success: function (data) {
              $("#detail_event").html(data);
              $("#detail_event_wrapper").slideDown(600); // actually shows the data of details
            },
          });
        }, 500);
      }

    // LOADER STARTS
      function transition_onleave() {
        $(".wrapper").hide();
        $('.loader').show();
        var tl = new TimelineMax();
        
        tl.to(CSSRulePlugin.getRule('body:before'), 0.2, {cssRule: {top: '51%' }, ease: Power2.easeOut}, 'close')
        .to(CSSRulePlugin.getRule('body:after'), 0.2, {cssRule: {bottom: '50%' }, ease: Power2.easeOut}, 'close')
        .to($('.loader'), 0, {opacity: 1})
      }

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

      $(document).ready(function() {
          setTimeout(transition_onload, 0);

          $(".navbar a.nav-link,a.dropdown-item").click(function(e) {
            e.preventDefault();
            transition_onleave();
            this_element = $(this);
            setInterval(function () {
              window.location.href = this_element.attr("href");
            }, 500);
          });

          

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
          
    // LOADER ENDS
      });

    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
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
      element.html(captionAsli);
    }

    $('form').submit(function (e) {
      show_loader( $(this).find('button[type="submit"]') );
    })


    
    

    </script>

      
  </body>
</html>