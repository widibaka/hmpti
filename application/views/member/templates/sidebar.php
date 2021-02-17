
  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= base_url() ?>assets/img/logo.png?v2"
             alt="Koreksoft Logo"
             class="brand-image">
        <span class="brand-text font-weight-light">HMP TI</span>
      </a>

      
        <!-- Sidebar -->
        <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item has-treeview" >
                <a href="<?php echo base_url() ?>admin/dashboard" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>
                    <span>Dashboard</span>
                  </p>
                </a>
              </li> <!-- sidebar_item -->

              <!-- Proker Starts -->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      <span>Proker</span>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <?php foreach ($this->all_divisi as $key => $val): ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>admin/anggota" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo $val['nama_divisi'] ?></p>
                        </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </li>
              <!-- Proker Ends -->

              <!-- Keanggotaan Starts -->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      <span>Keanggotaan</span>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?php echo base_url() ?>admin/anggota" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Anggota</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url() ?>admin/jabatan" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jabatan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url() ?>admin/divisi" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Divisi</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- Keanggotaan Ends -->

              <!-- Organisasi Starts -->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      <span>Website</span>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?php echo base_url() ?>admin/organisasi" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Organisasi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url() ?>admin/carousel" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Carousel</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- Organisasi Ends -->

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      <!-- /.sidebar -->
    </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #282c31;">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">