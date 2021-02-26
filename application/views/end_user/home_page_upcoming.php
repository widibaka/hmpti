
      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Event Yang Akan Datang</strong></h2>
          </div>
          <?php foreach ($events as $key => $event): ?>
            <div class="event text-start">
              <div class="bd-placeholder-img mt-3 overflow-hidden" style="
                      width: 375px; 
                      height: 200px; 
              ">
                <img src="<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>" width="375" height="200">
              </div>

              <h2 class="mt-2 mx-2"><?php echo $event['judul'] ?></h2>
              <p><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
              <p class="countdown_wrapper">Countdown: <span class="countdown" data-time="<?php echo date("M d, Y H:i:s", $event['jadwal']) ?>"></span> <i class="fa fa-circle text-danger blinking"></i></p>
              <p><?php echo substr( strip_tags($event['deskripsi']) , 0, 140) ?>...</p>
              <p><a class="btn btn-success" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">Join now &raquo;</a></p>
            </div><!-- /.event -->
          <?php endforeach ?>
          <?php if ( empty(count($events)) ): ?>
            <div class="text-center text-muted">
              <p>
                <i>Belum ada jadwal event terbaru.</i>
              </p>  
            </div>
          <?php endif ?>
        </div><!-- /.row -->
      </div><!-- /.container -->