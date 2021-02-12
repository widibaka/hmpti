    <main>

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
                    <img width="145" src="assets/img/logo.png">
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
        <div class="row">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Event Yang Akan Datang</strong></h2>
          </div>
          <div class="col-lg-4 event text-start">
            <svg class="bd-placeholder-img mt-3" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></svg>

            <h2 class="mt-2 mx-2">Judul Event</h2>
            <p>21 Feb 2021</p>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros....</p>
            <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 event text-start">
            <svg class="bd-placeholder-img mt-3" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></svg>

            <h2 class="mt-2 mx-2">Judul Event</h2>
            <p>21 Feb 2021</p>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros....</p>
            <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 event text-start">
            <svg class="bd-placeholder-img mt-3" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></svg>

            <h2 class="mt-2 mx-2">Judul Event</h2>
            <p>21 Feb 2021</p>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros....</p>
            <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-12">
            <p class="text-center">
              <a class="btn btn-outline-secondary" href="#" role="button">Load more</a>
            </p>
          </div> <!-- /load more -->
        </div><!-- /.row -->
      </div><!-- /.container -->








      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Event-event Lama</strong></h2>
          </div>
          <div class="col-lg-4 event text-start">
            <svg class="bd-placeholder-img mt-3" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></svg>

            <h2 class="mt-2 mx-2">Judul Event</h2>
            <p>21 Feb 2021</p>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros....</p>
            <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 event text-start">
            <svg class="bd-placeholder-img mt-3" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></svg>

            <h2 class="mt-2 mx-2">Judul Event</h2>
            <p>21 Feb 2021</p>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros....</p>
            <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 event text-start">
            <svg class="bd-placeholder-img mt-3" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></svg>

            <h2 class="mt-2 mx-2">Judul Event</h2>
            <p>21 Feb 2021</p>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros....</p>
            <p><a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
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


      <!-- FOOTER -->
      <footer class="container">
        <a href="#" class="to_top"><i class="fa fa-arrow-circle-up"></i></a>
        <p>Himpunan Mahasiswa TI Universitas Duta Bangsa 2021</p>
      </footer>

    </main>