<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    
<div class="col-12 mb-2">
  <a class="btn btn-info shadow do_transition" href="<?php echo base_url() ?>admin/event"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>


<div class="row">
	<div class="col-12">
		<div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $subtitle ?> - <?php echo $event['judul'] ?></h3>
            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row mb-4 d-flex justify-content-center">
              <img height="150" src="<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>">
              <div class="col-12 text-center">
                <p>Rata-rata bintang: <strong><?php echo $average_bintang ?></strong></p>
                <p>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-download"></i> Export XLS
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>admin/pendaftar/export_excel/Valid/<?php echo $event['id_event'] ?>">Hanya Valid</a></li>
                      <li><a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>admin/pendaftar/export_excel/Invalid/<?php echo $event['id_event'] ?>">Hanya Invalid</a></li>
                      <li><a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>admin/pendaftar/export_excel/Unset/<?php echo $event['id_event'] ?>">Hanya Unset</a></li>
                      <li><a class="dropdown-item" target="_blank" href="<?php echo base_url() ?>admin/pendaftar/export_excel/All/<?php echo $event['id_event'] ?>">Semua</a></li>
                    </ul>
                  </div>
                </p>
              </div>
            </div>
            <hr>
            <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>HP</th>
                  <th>Kehadiran</th>
                  <th>Pembayaran</th>
                  <th>Bintang</th>
                  <th>Saran</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>HP</th>
                  <th>Kehadiran</th>
                  <th>Pembayaran</th>
                  <th>Bintang</th>
                  <th>Saran</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
	</div>
</div>


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="saran_full"></p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="col-12 text-right">
	<a href="<?php echo base_url() ?>admin/event/editor" role="button" class="btn btn-lg btn-info rounded-circle"><i class="fas fa-plus"></i></a>
</div>