<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?php //echo "<pre>"; var_dump( $valisi ); die(); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
          <div class="card-header">
            <h3 class="card-title">Program Kerja <?php echo $subtitle ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Waktu</th>
                <th>Control</th>
              </tr>
              </thead>
              <tbody>
	              <?php foreach ($main_data as $key => $val): ?>
	  	              <tr>
	  		              <td><?php echo $key+1 ?></td>
	  		              <td id="judul-<?php echo $val['id_proker'] ?>"><?php echo $val['judul'] ?></td>
	  		              <td id="deskripsi-<?php echo $val['id_proker'] ?>"><?php echo $val['deskripsi'] ?></td>
                      <td id="waktu-<?php echo $val['id_proker'] ?>"><?php echo $val['waktu'] ?></td>
	  		              <td>
	  		              	<div class="btn-group">
  		                      <button onclick="edit_prepare(<?php echo $val['id_proker'] ?>)" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pencil-alt"></i></button>
  		                      <button onclick="delete_row(<?php echo $val['id_proker'] ?>)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
  		                    </div>
	  		              </td>
	  		            </tr>
	              <?php endforeach ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Waktu</th>
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
        <h4 class="modal-title">Edit Proker</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/proker/edit/<?php echo $divisi['id_divisi'] ?>" method="post" role="form" id="editForm" novalidate="novalidate">

            <input type="hidden" name="id_proker" id="edit_id_proker">
      		  <div class="form-group">
      		    <label for="edit_judul">Judul Proker</label>
      		    <input type="text" name="judul" class="form-control" id="edit_judul" placeholder="Judul ...">
      		  </div>
            <div class="form-group">
              <label for="edit_deskripsi">Nama Proker</label>
              <textarea name="deskripsi" class="form-control" id="edit_deskripsi" placeholder="Deskripsi ..."></textarea>
            </div>
      		  <div class="form-group">
      		    <label for="edit_waktu">Waktu</label>
              <input type="text" name="waktu" class="form-control" id="edit_waktu" placeholder="Waktu ...">
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
        <h4 class="modal-title">Tambah Proker</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/proker/add/<?php echo $divisi['id_divisi'] ?>" method="post" role="form" id="addForm" novalidate="novalidate">

            <div class="form-group">
              <label for="add_judul">Judul Proker</label>
              <input type="text" name="judul" class="form-control" id="add_judul" placeholder="Judul ...">
            </div>
            <div class="form-group">
              <label for="add_deskripsi">Nama Proker</label>
              <textarea name="deskripsi" class="form-control" id="add_deskripsi" placeholder="Deskripsi ..."></textarea>
            </div>
            <div class="form-group">
              <label for="add_waktu">Kisaran Waktu</label>
              <input type="text" name="waktu" class="form-control" id="add_waktu" placeholder="Contoh: Februari - Maret 2021 ...">
            </div>
      		  
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