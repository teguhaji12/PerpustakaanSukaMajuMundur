<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?=site_url('admin/dashboard');?>">Dashboard</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Jumlah Buku</span>
            <span class="info-box-number">
              <?=$buku_stok['buku_stok'];?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Judul Buku</span>
            <span class="info-box-number"><?=$judul_buku['judulBuku'];?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Kategori Buku</span>
            <span class="info-box-number"><?=$kategori['totalKategori'];?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->

  </section>
  <!-- /.content -->
</div>