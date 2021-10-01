
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- nouslider -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugin_baru/nouislider/nouislider.css">
  
<div class="col-12 mb-2">
  <a class="btn btn-info shadow do_transition" href="<?php echo base_url() ?>admin/event"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="col-12" id="data_event">
  <div class="card <?php echo (!empty($main_data['id_event'])) ? 'collapsed-card' : '' ?>">
    <div class="card-header">
      <?php echo $subtitle ?>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-<?php echo (!empty($main_data['id_event'])) ? 'plus' : 'minus' ?>"></i>
        </button>
      </div>
    </div>             
    <div class="card-body">
      <div class="container">

        <!-- form start -->
        <form action="<?php echo $url ?>" method="post" role="form" id="editForm" novalidate="novalidate" enctype="multipart/form-data">

          <div class="form-group">
            <input type="hidden" name="id_event" value="<?php echo (!empty($main_data['id_event'])) ? $main_data['id_event'] : time() ?>">
            <label for="edit_judul">Judul</label>
            <input type="text" name="judul" class="form-control" id="edit_judul" placeholder="Judul ..." value="<?php echo (!empty($main_data['judul'])) ? $main_data['judul'] : '' ?>">
          </div>
          <!-- time Picker -->
          <div class="bootstrap-timepicker">
            <div class="form-group">
              <label>Batas waktu pendaftaran</label>
              <input type="text" name="jadwal" class="form-control datetimepicker-input" id="timepicker" data-toggle="datetimepicker" data-target="#timepicker" value="<?php echo (!empty($main_data['jadwal'])) ? date('d/m/Y H.i', $main_data['jadwal']) : ''  ?>" placeholder="Jadwal pelaksanaan ..." autocomplete="off" />
              <?php echo ( !empty($main_data['jadwal']) && $main_data['jadwal'] < time() ) ? '<p><strong class="text-danger">TANGGAL DI ATAS SUDAH TERLEWAT</strong></p>' : '' ?>
              <p>Ini adalah batas waktu bagi peserta untuk mendaftar ke event. Setelah waktu di atas terlewati, maka peserta tidak akan bisa lagi mendaftar ke event.</p>
            </div>
            <!-- /.form group -->
          </div>
          <!-- <div class="form-group">
            <label>Thumbnail</label>
            <div class="form-group">
              <img style="width: 375px; max-width:100%;" src="<?php echo (!empty($main_data['thumbnail'])) ?  base_url() . "assets/img/events/" . $main_data['thumbnail']  :  base_url() . "assets/img/no_image.jpg" ?>" id="edit_preview_thumbnail">
              <p class="text-danger">Disarankan ukuran 375px x 200px</p>
              <p>
                <div class="custom-file">
                  <input name="update_thumbnail" type="hidden" id="update_thumbnail" value="">
                  <input name="thumbnail" type="file" class="form-control" id="edit_thumbnail" accept="image/png, image/jpeg, image/jpg">
                </div>
              </p>
            </div>
          </div> -->
          <div class="form-group">
            <label>Poster</label>
            <div class="form-group">
              <img style="width: 700px; max-width:100%;" src="<?php echo (!empty($main_data['poster'])) ?  base_url() . "assets/img/events/" . $main_data['poster']  :  base_url() . "assets/img/no_image.jpg" ?>" id="edit_preview_poster">
              <!-- <p class="text-danger">Disarankan ukuran 700px x 700px</p> -->
              <p>
                <div class="custom-file">
                  <input name="update_poster" type="hidden" id="update_poster" value="">
                  <input name="poster" type="file" class="form-control" id="edit_poster" accept="image/png, image/jpeg, image/jpg">
                </div>
              </p>
            </div>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="7" placeholder="Deskripsi ..."><?php echo (!empty($main_data['deskripsi'])) ? $main_data['deskripsi'] : '' ?></textarea>
            <p>
              Dapat diisi dengan captions ataupun penjelasan tentang event yang sedang Anda buat ini. 
            </p>
          </div>
          <div class="form-group">
            <label for="edit_id_jabatan">Publikasikan</label>
            <select class="form-control" name="publish" id="edit_publish">
              <?php  
                if ( !isset($main_data['publish']) ) {
                  $main_data['publish'] = 1;
                }
              ?>
              <option value="1" <?php echo ($main_data['publish']==1) ? 'selected' : '' ?>>Ya</option>
              <option value="0" <?php echo ($main_data['publish']==0) ? 'selected' : '' ?>>Tidak</option>
            </select>
            <p>Ini menentukan apakah event ini dipublikasikan ataukah tidak.</p>
          </div>
          <div class="form-group">
            <label for="edit_judul">Limit Pendaftar (kosongkan bila tidak dibatasi)</label>
            <input type="number" name="limit_pendaftar" class="form-control" id="edit_judul" placeholder="200 ..." value="<?php echo (!empty($main_data['limit_pendaftar'])) ? $main_data['limit_pendaftar'] : '' ?>">
            <p>Jika limit pendaftar ini diisi, maka pendaftaran event akan secara otomatis ditutup ketika mencapai jumlah pendaftar tersebut.</p>
          </div>
          <div class="form-group">
            <label for="edit_wajib_bukti_kehadiran">
              Peserta wajib mengisi daftar hadir
            </label>
            <select class="form-control" name="wajib_bukti_kehadiran" id="edit_wajib_bukti_kehadiran">
              <?php  
                if ( !isset($main_data['wajib_bukti_kehadiran']) ) {
                  $main_data['wajib_bukti_kehadiran'] = 1;
                }
              ?>
              <option value="1" <?php echo ($main_data['wajib_bukti_kehadiran']==1) ? 'selected' : '' ?>>Ya</option>
              <option value="0" <?php echo ($main_data['wajib_bukti_kehadiran']==0) ? 'selected' : '' ?>>Tidak</option>
            </select>
            <p>Jika Anda memilih Ya, maka halaman presensi akan meminta peserta mengunggah bukti kehadiran.</p>
          </div>
          <div class="form-group">
            <label for="edit_apakah_berbayar">
              Apakah event ini berbayar?
            </label>
              <?php  
                if ( !isset($main_data['apakah_berbayar']) ) {
                  $main_data['apakah_berbayar'] = 0;
                }
              ?>
            <select class="form-control" name="apakah_berbayar" id="edit_apakah_berbayar">
              <option value="1" <?php echo ($main_data['apakah_berbayar']==1) ? 'selected' : '' ?>>Ya</option>
              <option value="0" <?php echo ($main_data['apakah_berbayar']==0) ? 'selected' : '' ?>>Tidak</option>
            </select>
            <p>Jika Anda memilih Ya, maka nantinya halaman pendaftaran akan meminta peserta untuk mengunggah bukti pembayaran.</p>
          </div>
          <div class="form-group">
            <label for="edit_data_tambahan">
              Data tambahan
            </label>
            <input type="text" cols="30" rows="10" class="form-control" name="data_tambahan" id="edit_data_tambahan" placeholder="Asal instansi, alamat, ..." value="<?php echo (!empty($main_data['data_tambahan'])) ? $main_data['data_tambahan'] : '' ?>">
            <p>Apa saja yang ingin Anda ketahui dari peserta? Misalnya Anda ingin tahu instansi peserta berasal, atau variabel lain yang relevan dengan event Anda. Silakan pisahkan setiap variabel memakai koma (,) agar sistem dapat berjalan dengan baik.</p>
          </div>
          <div class="form-group">
            <label>Pesan Untuk Pendaftar</label>
            <textarea class="form-control" name="pesan_utk_pendaftar" id="edit_pesan_utk_pendaftar" rows="7" placeholder="Tulis pesan ..."><?php echo (!empty($main_data['pesan_utk_pendaftar'])) ? $main_data['pesan_utk_pendaftar'] : '' ?></textarea>
            <p>
              Pesan ini akan muncul ketika peserta sudah berhasil mendaftar di event. Dapat Anda isi dengan link grup WhatsApp agar lebih mudah memberikan pengumuman atau pengingat saat event akan dimulai.
            </p>
          </div>
          
        </form>
        
      </div>
      <div class="col-12 text-right mb-2 p-3">
        <button id="tombol_simpan1" type="button" class="btn btn-lg btn-info rounded-lg shadow" onclick="submit_form('#editForm')"><i class="fas fa-save"></i> Simpan </button>
      </div>
    </div>  
    <div class="col-12 text-right mb-2 p-3">
    </div>           
  </div>
</div>


<?php if ( !empty($main_data['id_event']) ): ?>
<div class="col-12" id="section_sertifikat">
  <div class="card collapsed-card">
    <div class="card-header">
      Sertifikat <?php echo (!empty($main_data['judul'])) ? ' (' . $main_data['judul'] . ')': '' ?>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-<?php echo (!empty($main_data['id_event'])) ? 'plus' : 'minus' ?>"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-primary btn-lg shadow mb-2" data-toggle="modal" data-target="#modal_upload_sertifikat">Set Sertifikat</button>
      <p>Jika Anda memasang sertifikat [jpg, png], maka sistem akan secara otomatis memberi fasilitas <strong>download sertifikat</strong> bagi peserta yang valid.</p>
      <p>Sangat disarankan memakai gambar .jpg agar size sertifikat tidak terlalu besar.</p>
      
      <?php if ( !empty($main_data['sertifikat']) ) : // kalau ada sertifikat, tampilkan ?>
      <hr>

      <p>
        Silakan sesuaikan penempatan untuk nama peserta event. Ubah dengan menggeser slider X dan slider Y di bawah ini, kemudian jangan lupa simpan koordinatnya.
      </p>
      <p><strong>PENTING!</strong> Setelah itu tekan tombol "Tes Download Sertifikat" untuk menentukan apakah koordinat sudah tepat atau belum, karena tampilan di bawah ini tidak selalu tepat.</p>
      <form action="<?php echo base_url(); ?>admin/event/sertifikat_set_koordinat/<?php echo $main_data['id_event']; ?>" method="post">
        <div class="form-group">
          <div class="row d-flex justify-content-left">

              <label class="mt-3">Font Size: </label>
              <div class="col-12 mb-3">
                  <input class="form-control" type="number" name="font_size" id="font_size" value="<?php echo $sertifikat['font_size'] ?>">
              </div>

              <label for="font_color_id">Font Color (ID Sertifikat): </label><br>
              <div class="col-12 mb-3 input-group">
                  <input class="form-control" type="text" name="font_color_id" id="font_color_id" value="<?php echo $sertifikat['font_color_id'] ?>">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square" style="color: <?php echo $sertifikat['font_color_id'] ?>"></i></span>
                  </div>
              </div>

              <label for="font_color_id">Font Color (Nama): </label><br>
              <div class="col-12 mb-3 input-group">
                  <input class="form-control" type="text" name="font_color_nama" id="font_color_nama" value="<?php echo $sertifikat['font_color_nama'] ?>">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square" style="color: <?php echo $sertifikat['font_color_nama'] ?>"></i></span>
                  </div>
              </div>

              <div class="col-6 mb-3">
                  <input type="hidden" name="posisi_x" id="posisi_x">
                  <label>Koordinat X: <span id="nilaiX">0</span>px</label>
                  <div id="sliderX" class="slider"></div>
              </div>
              <div class="col-6 mb-3">
                  <input type="hidden" name="posisi_y" id="posisi_y">
                  <label>Koordinat Y: <span id="nilaiY">0</span>px</label>
                  <div id="sliderY" class="slider"></div>
              </div>

          </div>
          <br>
          <div class="row d-flex justify-content-center text-center" style="overflow: hidden;">
            <div class="col-sm-12 mt-4 text-center " style="border: solid 2px red">
              <img style="max-width: 100%;" src="<?php echo base_url('assets/img/events/') . $main_data['sertifikat'] ?>" alt="">
              <span class="nama_peserta text-center" style="width: auto; position: absolute; border: solid 0px red; font-family: Arial; font-size: <?php echo $sertifikat['font_size']/8.571428571428571 ?>vw; font-weight: bold;"><p style=" margin-top: -1.5vw; margin-left:-100%; color: <?php echo $sertifikat['font_color_nama'] ?>;">[ Nama Peserta ]</p></span>
              <span class="id_sertifikat text-right" style="width: auto; position: absolute; border: solid 0px red; font-family: Arial; font-size: 1.4vw; font-weight: bold; right: 3vw; top: 3vw;"><p style=" margin-top: -1.5vw; margin-left:-100%; color: <?php echo $sertifikat['font_color_id'] ?>;">ID: HMPTI0000000000</p></span>
            </div>
          </div>
          <div class="col-12 text-right mt-3">
            <button type="submit" class="btn btn-primary btn-lg mr-2 mb-2">Simpan Koordinat & Lainnya</button>
            <a target="_blank" class="btn btn-danger btn-lg mr-2 mb-2" href="<?php echo base_url() ?>p/download_sertifikat/<?php echo $main_data['id_event'] ?>?test=true">Tes Download Sertifikat</a>
          </div>
        </div>
      </form>
      <?php endif; ?>
    </div>
    <div class="col-12mb-2 p-3">
    </div> 
  </div>
</div>
<?php endif ?>



<?php if ( !empty($main_data['id_event']) ): ?>
  
  <!-- <style type="text/css">*{border: solid 1px red;}</style> -->
  <!-- panitia -->
  <div class="col-12" id="panitia_event">
    <div class="card collapsed-card">
      <div class="card-header">
        Panitia Event <?php echo (!empty($main_data['judul'])) ? ' (' . $main_data['judul'] . ')' : '' ?>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-<?php echo (!empty($main_data['id_event'])) ? 'plus' : 'minus' ?>"></i>
          </button>
        </div>
      </div>              
      <div class="card-body">
        <div class="container">
          <div class="col-12 mb-5 h6">
            <?php foreach ($panitia as $key => $val): ?>
              <?php 
                  $member = $this->Model_member->check_member( $val['email'] );
              ?>
              <?php echo $key+1 . ". " ?>
              <a href="<?php echo base_url() . 'p/profil/' . $member['nim'] ?>"><?php 
                  echo $member['nama'];
              ?></a> 
              <?php if ( !empty($val['peran']) ): ?>
                sebagai <?php echo $val['peran'] ?>
              <?php endif ?>
              <a class="do_transition ml-2 text-danger" href="<?php echo base_url() ?>admin/event/del_panitia/<?php echo $val['id_panitia'] ?>/<?php echo $main_data['id_event'] ?>" title="Hapus"><i class="fa fa-trash"></i></a>
              <br>
            <?php endforeach ?>
            <?php if ( count($panitia) == 0 ): ?>
              <p class="text-muted">
                <i>Belum ada panitia</i>
              </p>
            <?php endif ?>
          </div>
          <!-- form start -->
          <form action="<?php echo base_url() ?>admin/event/add_panitia" method="post" role="form" id="panitiaForm" novalidate="novalidate" enctype="multipart/form-data">
            <div class="col-12 bg-gray-2 p-2">
              
              <div class="row">
                <input class="form-control" type="hidden" name="id_event" value="<?php echo $main_data['id_event'] ?>">
                
                <div class="form-group col-12">
                  <label>Tambah panitia (Harus dari anggota)</label>
                  <select name="email" class="form-control select2bs4" style="width: 100%;">
                    <?php foreach ($members as $key => $val): ?>
                      <option value="<?php echo $val['email'] ?>"><?php echo $val['nama'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group col-12">
                  <label>Berperan sebagai</label>
                  <input class="form-control" name="peran" placeholder="Ketua panitia ..."> 
                </div>
                <div class="col-12 text-center">
                  <button type="button" class="btn btn-lg btn-info rounded shadow" onclick="submit_form('#panitiaForm')"><i class="fas fa-plus"></i> Tambahkan</button>
                </div>
                <!-- /.form-group -->
              </div>
            </div>

          </form>
        </div>
      </div>            
      <div class="col-12mb-2 p-3">
      </div>   
    </div>
  </div>
<?php endif ?>

<!-- Modal -->
<div class="modal fade" id="modal_upload_sertifikat" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Desain Sertifikat </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_content">
        <form action="<?php echo base_url() ?>admin/event/upload_sertifikat/<?php echo $main_data['id_event'] ?>" method="post" enctype="multipart/form-data">
          <img style="width: 100%;" src="<?php echo (!empty($main_data['sertifikat'])) ?  base_url() . "assets/img/events/" . $main_data['sertifikat']  :  base_url() . "assets/img/no_image.jpg" ?>" id="edit_preview_sertifikat">
          <p>
            <div class="custom-file">
              <input name="update_sertifikat" type="hidden" id="update_sertifikat" value="">
              <input name="image_sertifikat" type="file" class="form-control" id="edit_sertifikat" accept="image/png, image/jpeg, image/jpg">
            </div>
          </p>
          <p>
            Max. size: 2MB, Max. Dimension: <i>3300px</i> x <i>3300px</i>
          </p>
          <button type="submit" class="btn btn-primary display-block w-100">Upload Desain</button>
        </form>
      </div>
      <div>
        <button type="button" class="btn btn-sm btn-secondary float-right mb-3 mr-3" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

          