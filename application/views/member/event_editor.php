
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.css">
  
<div class="col-12 mb-2">
  <a class="btn btn-info shadow do_transition" href="<?php echo base_url() ?>admin/event"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<div class="card">
  <div class="card-header"><?php echo $subtitle ?></div>              
  <div class="card-body">
    <div class="container">
      <!-- form start -->
      <form action="<?php echo base_url() ?>admin/event/edit" method="post" role="form" id="editForm" novalidate="novalidate" enctype="multipart/form-data">

        <div class="form-group">
          <input type="hidden" name="id_event" value="<?php echo $main_data['id_event'] ?>">
          <label for="edit_judul">Judul</label>
          <input type="text" name="judul" class="form-control" id="edit_judul" placeholder="Judul ..." value="<?php echo $main_data['judul'] ?>">
        </div>
        <!-- time Picker -->
        <div class="bootstrap-timepicker">
          <div class="form-group">
            <label>Jadwal:</label>
            <input type="text" name="jadwal" class="form-control datetimepicker-input" id="timepicker" data-toggle="datetimepicker" data-target="#timepicker" value="<?php echo date('d/m/Y H.i', $main_data['jadwal']) ?>" placeholder="Jadwal pelaksanaan ..." />
          </div>
          <!-- /.form group -->
        </div>
        <div class="form-group">
          <label>Thumbnail</label>
          <div class="form-group">
            <img width="375" src="<?php echo base_url() . "assets/img/events/" . $main_data['thumbnail'] ?>" id="edit_preview_thumbnail">
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
            <img width="500" src="<?php echo base_url() . "assets/img/events/" . $main_data['poster'] ?>" id="edit_preview_poster">
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
          <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="7" placeholder="Deskripsi ..."><?php echo $main_data['deskripsi'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="edit_id_jabatan">Publikasikan</label>
          <select class="form-control" name="publish" id="edit_publish">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
          </select>
        </div>
        
      </form>
    </div>
  </div>              
</div>

<div class="col-12 text-right">
  <button  type="button" class="btn btn-lg btn-info rounded-lg" onclick="submit_form('#editForm')"><i class="fas fa-save"></i> Simpan</button>
</div>