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
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Jadwal</th>
                <th>Poster</th>
                <th>Deskripsi</th>
                <th>Publish</th>
                <th>Author</th>
                <th>Update Terakhir</th>
                <th>Limit Pendaftar</th>
                <th>Control</th>
                <th>Link Absensi/Presensi</th>
              </tr>
              </thead>
              <tbody>
	              
              </tbody>
              <tfoot>
              <tr>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Jadwal</th>
                <th>Poster</th>
                <th>Deskripsi</th>
                <th>Publish</th>
                <th>Author</th>
                <th>Update Terakhir</th>
                <th>Limit Pendaftar</th>
                <th>Control</th>
                <th>Link Absensi/Presensi</th>
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
	<a href="<?php echo base_url() ?>admin/event/editor" role="button" class="btn btn-lg btn-info rounded-circle"><i class="fas fa-plus"></i></a>
</div>