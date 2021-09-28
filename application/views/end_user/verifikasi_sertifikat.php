<div class="container marketing" style="height: 100vh">

    <p class="display-5 mb-4"><?php echo $this->title ?></p>
    

    <!-- START THE FEATURETTES -->

    <div class="row featurette mb-5">
      <div class="col-md-12">
        
        <div class="col-12 text-center d-flex justify-content-center mb-5">
          
          <form class="form-group col-sm-12 col-md-7" action="" method="POST" id="form_id_sertifikat">
            <label for="id_sertifikat"><h3 class="h3 pl-3 mb-3">Silakan Ketik ID Sertifikat Untuk Verifikasi</h3></label>
            <input type="text" name="id_pendaftar" class="form-control form-control-lg mb-3" placeholder="ID Sertifikat ..." id="id_pendaftar" autofocus required value="<?php echo (!empty($pendaftar['id_pendaftar']) ? $pendaftar['id_pendaftar'] : '' ) ?>">
            <button type="submit" class="w-100 btn btn-success btn-lg mb-3">
              <i class="fa fa-search"></i> Cari
            </button>
          </form>

        </div>
        <?php if ( !empty($pendaftar) ): ?>
          <div class="col-12 text-center">
            <p>Data ditemukan</p>
          </div>
          <div class="col-12 d-flex justify-content-center">
            
            
            <div class="card col-sm-12 col-md-7 p-3">
              <h4>Atas Nama: <?php echo $pendaftar['nama'] ?></h4>
              <h4>Dalam Acara: <?php echo $pendaftar['judul'] ?></h4>
              <h4>Status: <?php echo ($pendaftar['status']=='Valid') ? '<span class="text-success">Valid</span> (Sertifikat Sah)' : '<span class="text-danger">Invalid</span> (Sertifikat Tidak Sah)' ?></h4>
              <p>Status Invalid disebabkan karena peserta tidak menghadiri acara dan atau melanggar tata tertib acara.</p>
            </div>
          </div>
        <?php endif ?>

        <?php if ( $pendaftar === null ): ?>
          <div class="col-12 text-center">
            <p>Data tidak ditemukan</p>
          </div>
        <?php endif ?>
        

      </div>
    </div>

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->