
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
<div class="col-12 mb-2">
  <a class="btn btn-info shadow do_transition" href="<?php echo base_url() ?>admin/event"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>

<div class="card">
  <div class="card-header"><?php echo $subtitle ?></div>              
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
            <label>Jadwal</label>
            <input type="text" name="jadwal" class="form-control datetimepicker-input" id="timepicker" data-toggle="datetimepicker" data-target="#timepicker" value="<?php echo (!empty($main_data['jadwal'])) ? date('d/m/Y H.i', $main_data['jadwal']) : ''  ?>" placeholder="Jadwal pelaksanaan ..." autocomplete="off" />
          </div>
          <!-- /.form group -->
        </div>
        <div class="form-group">
          <label>Thumbnail</label>
          <div class="form-group">
            <img width="375" src="<?php echo (!empty($main_data['thumbnail'])) ?  base_url() . "assets/img/events/" . $main_data['thumbnail']  :  base_url() . "assets/img/no_image.jpg" ?>" id="edit_preview_thumbnail">
            <p class="text-danger">Disarankan ukuran 375px x 200px</p>
            <p>
              <div class="custom-file">
                <input name="update_thumbnail" type="hidden" id="update_thumbnail" value="">
                <input name="thumbnail" type="file" class="form-control" id="edit_thumbnail">
              </div>
            </p>
          </div>
        </div>
        <div class="form-group">
          <label>Poster</label>
          <div class="form-group">
            <img width="500" src="<?php echo (!empty($main_data['poster'])) ?  base_url() . "assets/img/events/" . $main_data['poster']  :  base_url() . "assets/img/no_image.jpg" ?>" id="edit_preview_poster">
            <p class="text-danger">Disarankan ukuran 700px x 700px</p>
            <p>
              <div class="custom-file">
                <input name="update_poster" type="hidden" id="update_poster" value="">
                <input name="poster" type="file" class="form-control" id="edit_poster">
              </div>
            </p>
          </div>
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="7" placeholder="Deskripsi ..."><?php echo (!empty($main_data['deskripsi'])) ? $main_data['deskripsi'] : '' ?></textarea>
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
        </div>
        <div class="form-group">
          <label for="edit_judul">Limit Pendaftar (kosongkan bila tidak dibatasi)</label>
          <input type="text" name="limit_pendaftar" class="form-control" id="edit_judul" placeholder="Batas jumlah pendaftar ..." value="<?php echo (!empty($main_data['limit_pendaftar'])) ? $main_data['limit_pendaftar'] : '' ?>">
        </div>
      </form>

    </div>
  </div>              
</div>

<div class="col-12 text-right mb-5">
  <button  type="button" class="btn btn-lg btn-info rounded-lg" onclick="submit_form('#editForm')"><i class="fas fa-save"></i> Simpan </button>
</div>

<?php if ( !empty($main_data['id_event']) ): ?>
  
  <!-- <style type="text/css">*{border: solid 1px red;}</style> -->
  <!-- panitia -->
  <div class="card">
    <div class="card-header">Panitia</div>              
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
              <i>Belum ada daftar panitia</i>
            </p>
          <?php endif ?>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url() ?>admin/event/add_panitia" method="post" role="form" id="panitiaForm" novalidate="novalidate" enctype="multipart/form-data">
          <div class="col-12 bg-gray-2 p-2">
            <label>Tambah panitia</label>
            <div class="row">
              <input class="form-control" type="hidden" name="id_event" value="<?php echo $main_data['id_event'] ?>"> 
              <div class="form-group col-6">
                <select name="email" class="form-control select2bs4" style="width: 100%;">
                  <?php foreach ($members as $key => $val): ?>
                    <option value="<?php echo $val['email'] ?>"><?php echo $val['nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group col-6">
                <input class="form-control" name="peran" placeholder="Peran ..."> 
              </div>
              <div class="col-12 text-center">
                <button type="button" class="btn btn-lg btn-info rounded-circle" onclick="submit_form('#panitiaForm')"><i class="fas fa-plus"></i></button>
              </div>
              <!-- /.form-group -->
            </div>
          </div>

        </form>
      </div>
    </div>              
  </div>
<?php endif ?>