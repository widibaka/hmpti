<?php if ( empty($judul) ): ?>
<div class="col-12 row" id="detail_event_wrapper" style="display: none;">
Event Tidak Ditemukan!
</div>
<?php return; endif ?>

<div class="col-12 row" id="detail_event_wrapper" style="display: none;">
  <!-- <p class="h5" id="event_judul"><?php echo $judul ?></p> -->
  <div class="col-12">
    <button class="btn btn-light col-12" onclick="$('#poster_original').toggle(400)"><span class="text-muted">Show/hide poster</span></button>
  </div>
  <center>
    <div id="poster_original" class="col-12" style="
      background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
      background-repeat: no-repeat;
      background-position: center;
      min-height: 50px;
      min-height: 270px;
    ">
      <img width="100%" src="<?php echo base_url() ?>assets/img/events/<?php echo $poster ?>">                  
    </div>
  </center>
  <?php 
      if ( $status == true ) {
        $spendaf = "<span class='text-success'>Dibuka</span>";
      }else{
        $spendaf = "<span class='text-danger'>Ditutup</span>";
      }
  ?>
  <div class="col-12">
    <?php 
      $email = $this->session->userdata('email');
      $sudah_daftar = $this->Model_pendaftar->check_exists( $email, $id_event )->num_rows();
    ?>
    <?php if ( $status == true && $sudah_daftar > 0 ): ?>
      <a href="<?php echo base_url() ?>p/daftar_event/<?php echo $id_event ?>" role="button" class="btn btn-secondary mt-3 mb-2 btn-lg col-12"><i class="fa fa-arrow-right"></i> Daftar ke event ini (Anda sudah terdaftar)</a>
    <?php elseif ( $status == true ): ?>
      <a href="<?php echo base_url() ?>p/daftar_event/<?php echo $id_event ?>" role="button" class="btn btn-success mt-3 mb-2 btn-lg col-12"><i class="fa fa-arrow-right"></i> Daftar ke event ini</a>
    <?php endif ?>

    <?php if ( $status != true ): ?>
      <br>
      <?php $pendaftar = $this->Model_pendaftar->check_exists( $email, $id_event ); //gak mau ribet wkwkwk ?>
      <?php if ( $pendaftar->num_rows() > 0 ): // check, kalau terdaftar, boleh kasih ulasan ?>
        <?php if ( $pendaftar->row_array()['status']=='Unset' && !empty($pendaftar->row_array()['bintang']) ): ?>
            <a class="btn btn-warning mb-2" href="<?php echo base_url() ?>p/review/<?php echo $id_event ?>" role="button">Sdg Diproses...</a>
          <?php elseif( $pendaftar->row_array()['status']=='Unset' ): ?>
            <!-- <a class="btn btn-success <?php echo 'glow' ?>" href="<?php echo base_url() ?>p/review/<?php echo $id_event ?>" role="button">Review</a> -->
          <?php elseif( $pendaftar->row_array()['status']=='Valid' ): ?>
            <a class="btn btn-success mb-2" href="<?php echo base_url() ?>p/review/<?php echo $id_event ?>" role="button">Review Valid</a>
            <?php if ( !empty($sertifikat) ) : ?>
              <a class="btn btn-primary mb-2" href="<?php echo base_url() ?>p/download_sertifikat/<?php echo $id_event ?>.pdf" role="button">Download Sertifikat</a>
            <?php endif; ?>
          <?php elseif( $pendaftar->row_array()['status']=='Invalid' ): ?>
            <a class="btn btn-danger mb-2" href="<?php echo base_url() ?>p/review/<?php echo $id_event ?>" role="button">Review Invalid</a>
        <?php endif ?>
      <?php endif ?>
    <?php endif ?>

    <br>
    <p id="event_jadwal">Batas waktu pendaftaran: <strong><?php echo date( "d M Y, H:m", $jadwal ) . " WIB" ?></strong></p>
    <p id="event_status">Status pendaftaran: <strong><?php echo $spendaf ?></strong></p>
    <!-- <p id="event_status">Jumlah pendaftar: <strong class="text-success"><?php echo  '' //$jum_pendaftar ?></strong></p> -->
    <p id="event_status">Batas jumlah pendaftar:  <?php if ( $limit_pendaftar != 0 ): ?>
                                                    <strong class="text-danger"><?php echo $limit_pendaftar ?></strong>
                                                    <?php else: ?>
                                                    Tidak dibatasi
                                                  <?php endif ?></p>
    <div id="event_deskripsi" style="word-wrap: break-word;"><?php echo $deskripsi ?></div>
    <p id="event_last_update"><i>Update terakhir: <?php echo date( "d M Y, H:m", $last_update ) . " WIB" ?>. Oleh <?php echo $author ?>.</i></p>
    
    <?php if ( $status == true && $sudah_daftar > 0 ): ?>
      <a href="<?php echo base_url() ?>p/daftar_event/<?php echo $id_event ?>" role="button" class="btn btn-secondary mt-3 mb-2 btn-lg col-12"><i class="fa fa-arrow-right"></i> Daftar ke event ini (Anda sudah terdaftar)</a>
    <?php elseif ( $status == true ): ?>
      <a href="<?php echo base_url() ?>p/daftar_event/<?php echo $id_event ?>" role="button" class="btn btn-success mt-3 mb-2 btn-lg col-12"><i class="fa fa-arrow-right"></i> Daftar ke event ini</a>
    <?php endif ?>

    <hr>

    <strong>Panitia:</strong><br>
    <?php foreach ($panitia as $key => $val): ?>
      <?php 
          $member = $this->Model_member->check_member( $val['email'] );
      ?>
      <?php echo $key+1 . ". " ?>
      <a style="text-decoration: none;" href="<?php echo base_url() . 'p/profil/' . $member['nim'] ?>"><?php 
          echo $member['nama'];
      ?></a> 
      <?php if ( !empty($val['peran']) ): ?>
        sebagai <?php echo $val['peran'] ?>
      <?php endif ?>
      <br>
    <?php endforeach ?>
  </div>
  
  <div class="col-12 float-right mt-4 modal-footer" style="border-top: 1px solid #ddd">
    <a class="text-muted btn" data-bs-dismiss="modal" aria-label="Close">Tutup</a>
  </div>
</div>