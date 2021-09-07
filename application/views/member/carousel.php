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
                <th>Ikutkan Logo</th>
                <th>Judul</th>
                <th>Paragraf</th>
                <th>Image</th>
                <th>Posisi</th>
                <th>Control</th>
              </tr>
              </thead>
              <tbody>
	              <?php foreach ($main_data as $key => $val): ?>
	  	              	<tr>
	  		              <td><?php echo $key+1 ?></td>
	  		              <td id="include_logo-<?php echo $val['id_carousel'] ?>"><?php echo ($val['include_logo']==1)? "Ya" : "Tidak"; ?></td>
                      <td id="judul-<?php echo $val['id_carousel'] ?>"><?php echo $val['judul'] ?></td>
	  		              <td id="paragraf-<?php echo $val['id_carousel'] ?>"><?php echo $val['paragraf'] ?></td>
                      <td id="image-<?php echo $val['id_carousel'] ?>" filename="<?php echo $val['image'] ?>">
                        <a data-fancybox="gallery" href="<?php echo base_url() ?>assets/img/carousel/<?php echo $val['image'] ?>">
                          <img width="140" src="<?php echo base_url() ?>assets/img/carousel/<?php echo $val['image'] ?>">
                        </a>
                      </td>
                      <td id="posisi-<?php echo $val['id_carousel'] ?>"><?php echo $val['posisi'] ?></td>
	  		              <td>
	  		              	<div class="btn-group">
  		                      <button onclick="edit_prepare(<?php echo $val['id_carousel'] ?>)" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pencil-alt"></i></button>
  		                      <button onclick="delete_carousel(<?php echo $val['id_carousel'] ?>)" type="button" class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
  		                  </div>
	  		              </td>
	  		            </tr>
	              <?php endforeach ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Ikutkan Logo</th>
                <th>Judul</th>
                <th>Paragraf</th>
                <th>Image</th>
                <th>Posisi</th>
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
        <h4 class="modal-title">Edit Carousel</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/carousel/edit" method="post" role="form" id="editForm" novalidate="novalidate" enctype="multipart/form-data">
            <input type="hidden" name="id_carousel" id="edit_id_carousel">
            <input type="hidden" name="image_filename" id="edit_image_filename">
            <div class="form-group">
              <label>Image</label><br>
              <img height="240" src="" id="edit_preview">
              <p class="text-danger">Disarankan ukuran 1400px x 600px
                <br>Max size 2mb</p>
              <p>
                <div class="custom-file">
                  <input name="image" type="file" class="form-control" id="edit_image">
                </div>
              </p>
            </div>
      		  <div class="form-group">
      		    <label for="edit_include_logo">Ikutkan Logo</label>
              <select class="form-control" name="include_logo" id="edit_include_logo">
                <option id="Ya" value="1">Ya</option>
                <option id="Tidak" value="0">Tidak</option>
              </select>
      		  </div>
            <div class="form-group">
              <label for="edit_judul">Judul (opsional)</label>
              <input type="text" name="judul" class="form-control" id="edit_judul" placeholder="Judul ...">
            </div>
            <div class="form-group">
              <label for="edit_paragraf">Paragraf (opsional)</label>
              <textarea class="form-control" name="paragraf" id="edit_paragraf" rows="7" placeholder="Paragraf ..."></textarea>
            </div>
            <div class="form-group">
              <label>Posisi</label>
              <select class="form-control" name="posisi" id="edit_posisi">
                <option id="start" value="start">start</option>
                <option id="middle" value="middle">middle</option>
                <option id="end" value="end">end</option>
              </select>
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
        <h4 class="modal-title">Tambah Carousel</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		    <!-- form start -->
                  <form action="<?php echo base_url() ?>admin/carousel/add" method="post" role="form" id="addForm" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Image</label><br>
                      <img height="240" src="" id="add_preview">
                      <p class="text-danger">Disarankan ukuran 1400px x 600px
                        <br>Max size 2mb</p>
                      <p>
                        <div class="custom-file">
                          <input name="image" type="file" class="form-control" id="add_image">
                        </div>
                      </p>
                    </div>
                    <div class="form-group">
                      <label for="add_include_logo">Ikutkan Logo</label>
                      <select class="form-control" name="include_logo" id="add_include_logo">
                        <option id="Ya" value="1">Ya</option>
                        <option id="Tidak" value="0">Tidak</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="add_judul">Judul (opsional)</label>
                      <input type="text" name="judul" class="form-control" id="add_judul" placeholder="Judul ...">
                    </div>
                    <div class="form-group">
                      <label for="add_paragraf">Paragraf (opsional)</label>
                      <textarea class="form-control" name="paragraf" id="add_paragraf" rows="7" placeholder="Paragraf ..."></textarea>
                    </div>
                    <div class="form-group">
                      <label>Posisi</label>
                      <select class="form-control" name="posisi" id="add_posisi">
                        <option id="start" value="start">start</option>
                        <option id="middle" value="middle">middle</option>
                        <option id="end" value="end">end</option>
                      </select>
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