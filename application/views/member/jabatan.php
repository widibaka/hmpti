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
                <th>Nama Jabatan</th>
                <th>Dalam Divisi</th>
                <th>Control</th>
              </tr>
              </thead>
              <tbody>
	              <?php foreach ($main_data as $key => $val): ?>
	  	              	<tr>
	  		              <td><?php echo $key+1 ?></td>
	  		              <td id="nama_jabatan-<?php echo $val['id_jabatan'] ?>"><?php echo $val['nama_jabatan'] ?></td>
	  		              <td>
                        <i id="nama_divisi-<?php echo $val['id_jabatan'] ?>">
                          <?php echo $this->Model_divisi->id_to_divisi($val['id_divisi']) ?>
                        </i>
                        <span class="d-none" id="id_divisi-<?php echo $val['id_jabatan'] ?>"><?php echo $val['id_divisi'] ?></span>
                      </td>
	  		              <td>
	  		              	<div class="btn-group">
  		                      <button onclick="edit_prepare(<?php echo $val['id_jabatan'] ?>)" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pencil-alt"></i></button>
  		                      <button onclick="delete_row(<?php echo $val['id_jabatan'] ?>)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
  		                    </div>
	  		              </td>
	  		            </tr>
	              <?php endforeach ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Jabatan</th>
                <th>Divisi</th>
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
        <h4 class="modal-title">Edit Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/jabatan/edit" method="post" role="form" id="editForm" novalidate="novalidate">

      		  <div class="form-group">
      		  	<input type="hidden" name="id_jabatan" id="edit_id_jabatan">
      		    <label for="edit_nama_jabatan">Nama Jabatan</label>
      		    <input type="text" name="nama_jabatan" class="form-control" id="edit_nama_jabatan" placeholder="Nama jabatan ...">
      		  </div>
      		  <div class="form-group">
      		    <label for="edit_id_divisi">Dalam Divisi</label>
              <select class="form-control" name="id_divisi" id="edit_id_divisi">
                <?php foreach ($divisi as $key => $val): ?>
                  <option id="<?php echo $val['id_divisi'] ?>" value="<?php echo $val['id_divisi'] ?>"><?php echo $val['nama_divisi'] ?></option>
                <?php endforeach ?>
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
        <h4 class="modal-title">Tambah Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/jabatan/add" method="post" role="form" id="addForm" novalidate="novalidate">

      		  <div class="form-group">
              <label for="add_nama_jabatan">Nama Jabatan</label>
              <input type="text" name="nama_jabatan" class="form-control" id="add_nama_jabatan" placeholder="Nama jabatan ...">
            </div>
            <div class="form-group">
              <label for="add_id_divisi">Dalam Divisi</label>
              <select class="form-control" name="id_divisi" id="add_id_divisi">
                  <option value="">::Pilih divisi::</option>
                <?php foreach ($divisi as $key => $val): ?>
                  <option id="<?php echo $val['id_divisi'] ?>" value="<?php echo $val['id_divisi'] ?>"><?php echo $val['nama_divisi'] ?></option>
                <?php endforeach ?>
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