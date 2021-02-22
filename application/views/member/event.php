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
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Jadwal</th>
                <th>Poster</th>
                <th>Deskripsi</th>
                <th>Publish</th>
                <th>Author</th>
                <th>Update Terakhir</th>
                <th>Control</th>
              </tr>
              </thead>
              <tbody>
	              <?php foreach ($main_data as $key => $val): ?>
	  	              	<tr>
	  		              <td><?php echo $key+1 ?></td>
                      <td id="thumbnail-<?php echo $val['id_event'] ?>">
                          <span id="image-<?php echo $val['id_event'] ?>">
                            <img width="140" src="<?php 
                                $filedir = 'assets/img/events/' . explode("?", $val['thumbnail'])[0];
                                if( file_exists( $filedir ) == true ){
                                  echo base_url() . 'assets/img/events/' . $val['thumbnail'];
                                }
                                else{
                                  echo base_url() . 'assets/img/no_image.jpg';
                                }
                            ?>">
                          </span> 
                      </td>
                      <td id="judul-<?php echo $val['id_event'] ?>"><?php echo $val['judul'] ?></td>
                      <td id="jadwal-<?php echo $val['id_event'] ?>"><?php echo date( "d M Y, H:m", $val['jadwal'] ) ?></td>
	  		              <td id="poster-<?php echo $val['id_event'] ?>">
                          <a href="<?php echo base_url() . 'assets/img/events/' . $val['poster'] ?>"><?php echo $val['poster'] ?></a>
                      </td>
                      <td id="deskripsi-<?php echo $val['id_event'] ?>"><?php echo substr( strip_tags($val['deskripsi']) , 0, 100) ?>...</td>
                      <td id="publish-<?php echo $val['id_event'] ?>">
                        <?php if ( $val['publish'] == 0 ): ?>
                          <span class="btn bg-danger">OFF</span>
                        <?php else: ?>
                          <span class="btn bg-success">ON</span>
                        <?php endif ?>
                      </td>
                      <td id="author-<?php echo $val['id_event'] ?>"><?php echo $val['author'] ?></td>
                      <td id="last_update-<?php echo $val['id_event'] ?>"><?php echo date( "d M Y, H:m", $val['last_update'] ) ?></td>
                      </td>
	  		              <td>
	  		              	<div class="btn-group">
  		                      <a href="<?php echo base_url() ?>admin/event/editor/<?php echo $val['id_event'] ?>" type="button" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
  		                      <button onclick="delete_row(<?php echo $val['id_event'] ?>)" type="button" class="btn btn-danger" title="Nonaktifkan"><i class="fas fa-power-off"></i></button>
  		                  </div>
	  		              </td>
	  		            </tr>
	              <?php endforeach ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Jadwal</th>
                <th>Poster</th>
                <th>Deskripsi</th>
                <th>Publish</th>
                <th>Author</th>
                <th>Update Terakhir</th>
                <th>Control</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
	</div>
</div>

<div class="col-12 text-right">
	<button  type="button" class="btn btn-lg btn-info rounded-circle" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i></button>
</div>


<div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Profil Anggota</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/anggota/edit" method="post" role="form" id="editForm" novalidate="novalidate" enctype="multipart/form-data">

      		  <div class="form-group">
      		  	<input type="hidden" name="id_event">
      		    <label for="edit_judul">Judul</label>
      		    <input type="text" name="judul" class="form-control" id="edit_judul" placeholder="Nama jabatan ...">
      		  </div>
            <div class="form-group">
              <label>Thumbnail</label>
              <div class="form-group">
                <img width="240" height="240" src="" id="edit_preview_thumbnail">
                <p class="text-danger">Disarankan ukuran 500px x 500px</p>
                <p>
                  <div class="custom-file">
                    <input name="thumbnail" type="file" class="form-control" id="edit_thumbnail">
                  </div>
                </p>
              </div>
            </div>
            <div class="form-group">
              <label>Poster</label>
              <div class="form-group">
                <img width="240" height="240" src="" id="edit_preview_poster">
                <p class="text-danger">Disarankan ukuran 500px x 500px</p>
                <p>
                  <div class="custom-file">
                    <input name="poster" type="file" class="form-control" id="edit_poster">
                  </div>
                </p>
              </div>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="7" placeholder="Deskripsi ..."></textarea>
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
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" onclick="submit_form('#editForm')">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		    <!-- form start -->
              <form action="<?php echo base_url() ?>admin/anggota/add" method="post" role="form" id="addForm" novalidate="novalidate" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="add_nama">NIM Mahasiswa</label>
                  <input type="text" name="nim" class="form-control" id="add_nim" placeholder="Nomor Induk Mahasiswa ...">
                </div>
                <div class="form-group">
                  <label for="add_email">Email</label>
                  <input type="text" name="email" class="form-control" id="add_email" placeholder="Email ...">
                </div>
                <div class="form-group">
                  <label for="add_nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="add_nama" placeholder="Nama anggota ...">
                </div>
                <div class="form-group">
                  <label for="add_id_jabatan">Jabatan</label>
                  <select class="form-control" name="id_jabatan" id="add_id_jabatan">
                      <option value="">::Pilih jabatan::</option>
                    <?php foreach ($jabatan as $key => $val): ?>
                      <option id="<?php echo $val['id_jabatan'] ?>" value="<?php echo $val['id_jabatan'] ?>"><?php echo $val['nama_jabatan'] ?> (<?php echo $this->Model_divisi->id_to_divisi($val['id_divisi']) ?>)</option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kontak (opsional)</label>
                  <p><i>Pisahkan kontak dengan koma (,). Contoh <strong>Email: hmpti@gmail.com, Whatsapp: 08XXXXXXXX</strong></i>
                  <textarea class="form-control" name="kontak" id="add_kontak" rows="4" placeholder="Kontak ..."></textarea></p>

                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" id="add_deskripsi" rows="7" placeholder="Deskripsi ..."></textarea>

                </div>
                <label>Image (opsional)</label>
                <div class="form-group">
                  <img width="240" height="240" src="" id="add_preview">
                  <p class="text-danger">Disarankan ukuran 500px x 500px</p>
                  <p>
                    <div class="custom-file">
                      <input name="image" type="file" class="form-control" id="add_image">
                    </div>
                  </p>
                </div>
                <!-- <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="a" class="custom-control-input required" id="a">
                    <label class="custom-control-label" for="a">I agree to the <a href="#">terms of service</a>.</label>
                  </div>
                </div> -->
                
              </form>
      	</div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" onclick="submit_form('#addForm')">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>