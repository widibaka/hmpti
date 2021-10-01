
      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Event Yang Akan Datang</strong></h2>
          </div>
          <?php foreach ($events as $key => $event): ?>
            <div class="event text-start" title="<?php echo substr( strip_tags($event['deskripsi']) , 0, 140) ?>...">
              <div class="bd-placeholder-img mt-3 overflow-hidden" style="
                      width: 275px;
                      height: 320px;
                      background: url('<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>');
                      background-position: left bottom;
                      background-size: cover;
                      background-repeat: no-repeat;
              " role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">
              </div>

              <p class="mt-2 mx-2 h5" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)"><?php echo $event['judul'] ?></p>
              <p><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
              <p class="countdown_wrapper">Countdown: <span class="countdown" data-time="<?php echo date("M d, Y H:i:s", $event['jadwal']) ?>"></span> <i class="fa fa-circle text-danger blinking"></i></p>
              <p><a class="btn shadow btn-success w-100" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">Join now &raquo;</a></p>
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