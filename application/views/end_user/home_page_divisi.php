
      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event"><strong>Divisi</strong></h2>
            <center><p>Berikut daftar divisi, klik untuk melihat detail divisi beserta program kerjanya.</p></center>
          </div>
          <div class="row d-flex justify-content-center">
            <?php foreach ($this->all_divisi as $key => $divisi): ?>
            <div class="col-12">
              <a class="" href="<?php echo base_url() ?>p/divisi/<?php echo $divisi['id_divisi'] ?>" style="text-decoration: none; color: #5a5a5a;">
                <div class="card hover-shadow mb-4" style="border-radius: 10px;">
                  <div class="card-body text-center">
                    <h2><?php echo $divisi['nama_divisi'] ?></h2>
                  </div>
                </div>
              </a>
            </div> <!-- Satu divisi -->
            <?php endforeach ?>
          </div>
          
          <?php if ( empty(count($this->all_divisi)) ): ?>
            <div class="text-center text-muted">
              <p>
                <i>Belum ada divisi.</i>
              </p>  
            </div>
          <?php endif ?>
        </div><!-- /.row -->
      </div><!-- /.container -->
