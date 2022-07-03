<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cetak Laporan Per Tanggal</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('admin/laporan');?>">Laporan</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-body">
              <!-- form start -->
              <form action="<?=site_url('admin/laporan');?>" method="post" target="_blank">
                <div class="form-group">
                  <label for="tglFrom">Mulai :</label>
                  <input type="date" name="tglFrom" class="form-control">
                  <?=form_error('tglFrom', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="tglTo">Sampai :</label>
                  <input type="date" name="tglTo" class="form-control">
                  <?=form_error('tglTo', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <button class="btn btn-primary" type="submit">Generate Laporan</button>
              </form>
            </div>
          </div>
          <!-- /.card -->

        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->

  </section>
  <!-- /.content -->
</div>