<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="row">
	<div class="col-12">
		<div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $subtitle ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body bg-gray-2">
            <form method="post" action="<?php echo base_url() ?>admin/organisasi/edit" id="form"  enctype="multipart/form-data">

              <!-- Card 2 -->
              <div class="card bg-white">
                <div class="card-header">Detail Organisasi</div>
                <div class="card-body">
                  
                    <div class="form-group">
                      <label class="mt-2">Nama Organisasi:</label>

                      <div class="input-group my-colorpicker2">
                        <input type="text" class="form-control" name="nama_organisasi" value="<?php echo $main_data['nama_organisasi'] ?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                      <label class="mt-2">Keterangan Organisasi:</label>

                      <div class="input-group my-colorpicker2">
                        <textarea class="form-control" name="tentang_kami" rows="5"><?php echo $main_data['tentang_kami'] ?></textarea>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                      <label class="mt-2">Visi:</label>

                      <div class="input-group my-colorpicker2">
                        <textarea class="form-control" name="visi" rows="5"><?php echo $main_data['visi'] ?></textarea>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                      <label class="mt-2">Misi:</label>

                      <div class="input-group my-colorpicker2">
                        <textarea class="form-control" name="misi" rows="5"><?php echo $main_data['misi'] ?></textarea>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
              </div>
              <!-- Card 0 -->


              <div class="card bg-white">
                <div class="card-header">Logo</div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Upload Gambar:</label><br>
                    <img width="240" height="240" src="<?php echo base_url() ?>assets/img/<?php echo $main_data['image'] ?>" id="edit_preview" style="
                        background-image: url('<?php echo base_url() ?>assets/img/pattern.JPG');
                        background-repeat: repeat;
                    ">
                    <p class="text-danger">Disarankan ukuran 500px x 500px</p>
                    <p>
                      <div class="custom-file">
                        <input name="image" type="file" class="form-control" id="edit_image">
                      </div>
                    </p>
                  </div>
                  <!-- /.form group -->
                </div>
              </div>

              <!-- Card 1 -->
              <div class="card bg-white">
                <div class="card-header">Website Theme</div>
                <div class="card-body row">
                  <!-- Color Picker -->
                  <div class="form-group col-md-6">
                    <label>Navbar Background:</label>

                    <div class="input-group navbar_bg-colorpicker">
                      <input type="text" class="form-control" name="navbar_bg" value="<?php echo $main_data['navbar_bg'] ?>">

                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                      </div>
                    </div>
                    <br>
                    <i>* Fitur ini mengubah nuansa tampilan pada halaman utama.</i>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <div class="form-group col-md-6">
                    <label>Navbar Text:</label>

                    <div class="input-group navbar_text-colorpicker">
                      <input type="text" class="form-control" name="navbar_text" value="<?php echo $main_data['navbar_text'] ?>">

                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
              </div>

            </form>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
	</div>
</div>

<div class="col-12 text-right">
	<button  type="button" class="btn btn-lg btn-info rounded-lg" onclick="submit_form('form')"><i class="fas fa-save"></i> Simpan</button>
</div>
