
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-md-12"> -->
            <!-- DONUT CHART -->
            <!-- <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                <p><strong>Sedang dalam pengembangan ...</strong></p>
              </div>
            </div> -->
            <!-- /.card -->

          <!-- </div> -->
          <!-- /.col (LEFT) -->
          <div class="col-md-12">

            <!-- BAR CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dashboard</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 550px; max-height: 550px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->




          
          <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Anggota Yang Aktif Menjadi Panitia</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart_panitia" style="min-height: 250px; height: 550px; max-height: 550px; max-width: 100%;"></canvas>
                </div>
                <hr>
                <div class="col-12 mt-5">
                  <?php foreach ($members as $key => $val): ?>
                    <p>
                      <?php echo $val['nama'] ?> <br>
                      <?php foreach ($val['details'] as $key => $value): ?>
                        <li><?php echo $value['peran'] ?> (<?php echo $value['judul'] ?>)</li>
                      <?php endforeach ?>
                    </p>
                  <?php endforeach ?>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->