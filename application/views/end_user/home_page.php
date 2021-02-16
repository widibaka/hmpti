
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        
        <ol class="carousel-indicators">
        <?php foreach ($carousel as $key => $car): ?>
          <li data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $key ?>" <?php echo ($key === 0) ? 'class="active"' : ''; ?>></li>
        <?php endforeach ?>
        </ol>

        <div class="carousel-inner">
        <?php foreach ($carousel as $key => $car): ?>
          <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>" style="background: url('<?php echo base_url() ?>assets/img/carousel/<?php echo $car['image'] ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">

            <div class="container">
              <div class="carousel-caption text-<?php echo $car['posisi'] ?>">
                <?php if ( $car['include_logo'] == 1 ): ?>
                  <p>
                    <img width="145" src="assets/img/<?php echo $this->website['image'] ?>">
                  </p>
                <?php endif ?>
                <h1><?php echo $car['judul'] ?></h1>
                <p><?php echo $car['paragraf'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Event Yang Akan Datang</strong></h2>
          </div>
          <?php foreach ($events as $key => $event): ?>
            <div class="col-lg-4 event text-start">
              <div class="bd-placeholder-img mt-3 overflow-hidden" style="
                      width: 100%; 
                      height: 140px; 
                      background: url('<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>');
                      background-size: cover;
                      background-repeat: no-repeat;
                      background-position: center;
              ">
                <img src="<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>" style="opacity: 0;">
              </div>

              <h2 class="mt-2 mx-2"><?php echo $event['judul'] ?></h2>
              <p><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
              <p>Countdown: <?php echo " 0 menit" ?></p>
              <p><?php echo substr($event['deskripsi'], 0, 140) ?>...</p>
              <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
          <?php endforeach ?>
          
          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-outline-secondary" href="#" role="button">See more</a>
            </p>
          </div> <!-- /load more -->
        </div><!-- /.row -->
      </div><!-- /.container -->


      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Event-event Lama</strong></h2>
          </div>
          <?php foreach ($events_lama as $key => $event): ?>
            <div class="col-lg-4 event text-start">
              <div class="bd-placeholder-img mt-3 overflow-hidden" style="
                      width: 100%; 
                      height: 140px; 
                      background: url('<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>');
                      background-size: cover;
                      background-repeat: no-repeat;
                      background-position: center;
              ">
                <img src="<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>" style="opacity: 0;">
              </div>

              <h2 class="mt-2 mx-2"><?php echo $event['judul'] ?></h2>
              <p><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
              <p>Event sudah selesai</p>
              <p><?php echo substr($event['deskripsi'], 0, 140) ?>...</p>
              <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
          <?php endforeach ?>
          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-outline-secondary" href="#" role="button">Load more</a>
            </p>
          </div> <!-- /load more -->
        </div><!-- /.row -->
      </div><!-- /.container -->


      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Detail event</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Keterangan rinci berada di sini.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div> <!-- /.modal -->