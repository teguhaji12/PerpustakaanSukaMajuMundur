<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=site_url('admin/dashboard');?>" class="brand-link">
    <img src="<?=base_url('assets');?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?=$site['nama_aplikasi'];?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url('assets');?>/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?=$this->session->userdata('username');?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?=site_url('admin/dashboard');?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-header">DATA PEMINJAM</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>
              Peminjaman
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=site_url('admin/pinjam');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Peminjam Satuan</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=site_url('admin/pinjam_kelas/');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Peminjam Kelas</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">DATA BUKU</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=site_url('admin/buku');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Buku</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=site_url('admin/kategori');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kategori</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?=site_url('admin/laporan');?>" class="nav-link">
            <i class="nav-icon fas fa-flag"></i>
            <p>Laporan</p>
          </a>
        </li>
        <li class="nav-header">DATA KELAS</li>
        <li class="nav-item">
          <a href="<?=site_url('admin/kelas');?>" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>Kelas</p>
          </a>
        </li>
        <li class="nav-header">SETTINGS</li>
        <li class="nav-item">
          <a href="<?=site_url('admin/user');?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=site_url('admin/konfigurasi');?>" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>Konfigurasi</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>