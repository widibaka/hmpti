<div class="col-12 row" id="detail_event_wrapper" style="display: none;">
  <p class="display-5" id="event_judul"><?php echo $judul ?></p>
  <div class="col-12">
    <button class="btn btn-light col-12" onclick="$('#poster_original').toggle(400)"><span class="text-muted">Show/hide poster</span></button>
  </div>
  <center>
    <div id="poster_original" class="col-12" style="
      background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
      background-repeat: no-repeat;
      background-position: center;
      min-height: 50px;
    ">
      <img width="100%" src="<?php echo base_url() ?>assets/img/events/<?php echo $poster ?>">                  
    </div>
  </center>
  <div class="col-12">
    <a href="<?php echo base_url() ?>p/daftar_event/<?php echo $id_event ?>" role="button" class="btn btn-success mt-3 mb-2 btn-lg col-12"><i class="fa fa-arrow-right"></i> Daftar ke event ini</a>
    <p id="event_jadwal">Pelaksanaan: <strong><?php echo date( "d M Y, H:m", $jadwal ) . " WIB" ?></strong></p>
    <p id="event_status">Status: <strong class="text-success"><?php echo $status ?></strong></p>
    <p id="event_status">Jumlah pendaftar: <strong class="text-success"><?php echo $pendaftar ?></strong></p>
    <p id="event_deskripsi"><?php echo $deskripsi ?></p>
    <p id="event_last_update"><i>Update terakhir: <?php echo date( "d M Y, H:m", $last_update ) . " WIB" ?>. Oleh <?php echo $author ?>.</i></p>
    <button type="button" class="btn btn-success btn-lg col-12"><i class="fa fa-arrow-right"></i> Daftar ke event ini</button>
  </div>
  <div class="col-12 float-right mt-4">
    <a class="text-muted btn" data-bs-dismiss="modal" aria-label="Close">Tutup</a>
  </div>
</div>