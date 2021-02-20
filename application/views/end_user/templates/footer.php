

      <!-- FOOTER -->
      <footer class="container">
        <a href="#" class="to_top"><i class="fa fa-arrow-circle-up"></i></a>
        <p>Himpunan Mahasiswa TI Universitas Duta Bangsa 2021 <?php 
          if ( date("Y") > "2021" ) {
            echo "- ".date("Y");
          }
        ?></p>
        <!-- .widibaka was here -->
      </footer>

    </main>
    
    <script src="<?php echo base_url() ?>assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery 3 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- TweenMax For Transition -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/plugins/CSSRulePlugin.min.js'></script>
    <!-- Tooltip -->
    <!-- <script src="assets/bootstrap5/tooltip.js"></script> -->

    <script type="text/javascript">
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });

      // var myModal = new bootstrap.Modal(document.getElementById('modalCountdown'), {});

      // myModal.show();


    // LOADER STARTS
      function transition_onleave() {
        $(".wrapper").hide();
        var tl = new TimelineMax();
        
        tl.to(CSSRulePlugin.getRule('body:before'), 0.2, {cssRule: {top: '50%' }, ease: Power2.easeOut}, 'close')
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
        }, 1000);
      }

      $(document).ready(function() {
          setTimeout(transition_onload, 0);

          $(".navbar a.nav-link,a.dropdown-item").click(function(e) {
            e.preventDefault();
            transition_onleave();
            window.location.href = $(this).attr("href");
          });
    // LOADER ENDS
      });

    </script>

      
  </body>
</html>