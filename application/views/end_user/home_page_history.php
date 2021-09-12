      

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
              <p class="mt-2 mx-2" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)"><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
              <p class="countdown_wrapper mt-2 mx-2">Countdown: <span class="countdown"><?php echo ceil( ( $event['jadwal'] - time() ) / 60 ) ?></span> menit <i class="fa fa-circle blinking"></i></p>
              <p class="mt-2 mx-2">
                <?php if ( $pendaftar->num_rows() > 0 ): // check, kalau terdaftar, boleh kasih ulasan ?>
                  <?php if ( $pendaftar->row_array()['status']=='Unset' && !empty($pendaftar->row_array()['bintang']) ): ?>
                      <a class="btn shadow btn-warning mb-2 w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Sdg Diproses...</a>
                    <?php elseif( $pendaftar->row_array()['status']=='Unset' ): ?>
                      <!-- <a class="btn shadow btn-success <?php echo 'glow' ?>" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review</a> -->
                    <?php elseif( $pendaftar->row_array()['status']=='Valid' ): ?>
                      <!-- <a class="btn shadow btn-success mb-2 w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Valid</a> -->
                      <?php if ( !empty($event['sertifikat']) ) : ?>
                        <a class="btn shadow btn-primary mb-2 w-100" href="<?php echo base_url() ?>p/download_sertifikat/<?php echo $event['id_event'] ?>" role="button">Download Sertifikat</a>
                      <?php endif; ?>
                    <?php elseif( $pendaftar->row_array()['status']=='Invalid' ): ?>
                      <a class="btn shadow btn-danger mb-2 w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Invalid</a>
                  <?php endif ?>
                <?php endif ?>
                <a class="btn shadow btn-secondary mb-2 w-100" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">Lihat detail</a>
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
              <a class="btn shadow btn-outline-secondary do_transition" href="<?php echo base_url() ?>p/search?q=" role="button">See more</a>
            </p>
          </div> <!-- /load more -->
        </div><!-- /.row -->
      </div><!-- /.container -->
