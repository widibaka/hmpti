
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        
        <ol class="carousel-indicators">
        <?php foreach ($carousel as $key => $car): ?>
          <li data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $key ?>" <?php echo ($key === 0) ? 'class="active"' : ''; ?>></li>
        <?php endforeach ?>
        </ol>

        <div class="carousel-inner" style="z-index: 0">
        <?php foreach ($carousel as $key => $car): ?>
          <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>" style="background: url('<?php echo base_url() ?>assets/img/carousel/<?php echo $car['image'] ?>'); background-position: center; background-size: cover; background-repeat: no-repeat; background-color: #000000;">

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
