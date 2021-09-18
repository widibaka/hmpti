 <!--      <style type="text/css">
        *{border:red solid 1px;}
      </style> -->

      <div class="container marketing">
        <p class="display-5 mb-4">Search</p>
        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-2 headline-event"><strong>Event</strong></h2>
          </div>
          <?php foreach ($events as $key => $event): ?>


            <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)" style="text-decoration: none;">
              
              <div class="event-list text-start row" style="border-radius: 10px;">
                <div class="ml-1 my-2 overflow-hidden" style="
                        width: 65px;
                        height: 70px;
                  ">
                  <img src="<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>" width="65" height="70">
                </div>
                <div class="col-6 mt-3">
                  <h5><?php echo $event['judul'] ?> 
                    <?php 
                      $pendaftar = $this->Model_pendaftar->check_exists( $this->session->userdata('email'), $event['id_event'] );
                      echo ($pendaftar->num_rows() > 0) ? '<span class="text-muted">[Anda Terdaftar]</span>' : '';
                    ?>
                  </h5>
                </div>
              </div><!-- /.event -->

            </a>
            
          <?php endforeach ?>
          <?php if ( empty(count($events)) ): ?>
            <div class="text-center text-muted">
              <p>
                <i>Tidak ada hasil.</i>
              </p>  
            </div>
          <?php endif ?>
          <?php if ( count($events) > 100 ): ?>
            <div class="text-center text-muted my-3">
              <p>
                <i>Dibatasi hanya 100 konten.</i>
              </p>  
            </div>
          <?php endif ?>
        </div><!-- /.row -->
        <div class="row" style="height: 140px"></div>
      </div><!-- /.container -->

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-2 headline-event"><strong>Orang</strong></h2>
          </div>
          <?php foreach ($members as $key => $o): ?>


            <a href="<?php echo base_url() ?>p/profil/<?php echo $o['nim'] ?>" style="text-decoration: none;">
              
              <div class="event-list text-start row">
                <div class="col-6 mt-3">
                  <h5><?php echo $o['nama'] ?></h5>
                </div>
              </div><!-- /.event -->

            </a>
            
          <?php endforeach ?>
          <?php if ( empty(count($members)) ): ?>
            <div class="text-center text-muted">
              <p>
                <i>Tidak ada hasil.</i>
              </p>  
            </div>
          <?php endif ?>
          <?php if ( count($members) > 100 ): ?>
            <div class="text-center text-muted my-3">
              <p>
                <i>Dibatasi hanya 100 konten.</i>
              </p>  
            </div>
          <?php endif ?>
        </div><!-- /.row -->

        <div class="row" style="height: 140px"></div>
      </div><!-- /.container -->


      <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center" id="detail_event">
              <!-- the content goes here -->
              <div class="col-12" style="
                  background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
                  background-repeat: no-repeat;
                  background-position: center;
                  min-height: 50px;
                ">
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /.modal -->