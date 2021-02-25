      

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Riwayat Event</strong></h2>
          </div>
          <?php foreach ($events_lama as $key => $event): ?>



            <?php 
                $pendaftar = $this->Model_pendaftar->check_exists( $this->session->userdata('email'), $event['id_event'] );
            ?>



            <div class="event text-start">
              <div class="bd-placeholder-img mt-3 overflow-hidden" style="
                      width: 375px;
                      height: 200px;
              ">
                <img src="<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>" width="375" height="200">
              </div>

              <h2 class="mt-2 mx-2"><?php echo $event['judul'] ?></h2>
              <p><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
              <p class="countdown_wrapper">Countdown: <span class="countdown"><?php echo ceil( ( $event['jadwal'] - time() ) / 60 ) ?></span> menit <i class="fa fa-circle blinking"></i></p>
              <p><?php echo substr( strip_tags($event['deskripsi']) , 0, 140) ?>...</p>
              <p>
                <?php if ( $pendaftar->num_rows() > 0 ): // check, kalau terdaftar, boleh kasih ulasan ?>
                  <?php if ( $pendaftar->row_array()['status']=='Unset' && !empty($pendaftar->row_array()['bintang']) ): ?>
                      <a class="btn btn-success" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Sdg Diproses...</a>
                    <?php elseif( $pendaftar->row_array()['status']=='Unset' ): ?>
                      <a class="btn btn-success <?php echo 'glow' ?>" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review</a>
                    <?php elseif( $pendaftar->row_array()['status']=='Valid' ): ?>
                      <a class="btn btn-success <?php echo 'disabled' ?>" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Valid</a>
                    <?php elseif( $pendaftar->row_array()['status']=='Invalid' ): ?>
                      <a class="btn btn-danger <?php echo 'disabled' ?>" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Invalid</a>
                  <?php endif ?>
                <?php endif ?>

                <a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">View details &raquo;</a>
              </p>
            </div><!-- /.event -->
          <?php endforeach ?>
          <?php if ( empty(count($events_lama)) ): ?>
            <div class="text-center text-muted">
              <p>
                <i>Belum ada riwayat.</i>
              </p>  
            </div>
          <?php endif ?>
          <div class="col-12 mt-4">
            <p class="text-center">
              <a class="btn btn-outline-secondary do_transition" href="<?php echo base_url() ?>p/search?q=" role="button">See more</a>
            </p>
          </div> <!-- /load more -->
        </div><!-- /.row -->
      </div><!-- /.container -->
