<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Konfigurasi</h1>
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
            <!-- form start -->
            <form role="form" action="<?=site_url('admin/konfigurasi');?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_aplikasi">Nama Aplikasi</label>
                  <input type="text" class="form-control" name="nama_aplikasi" id="nama_aplikasi" placeholder="Masukan nama aplikasi" value="<?=$konfigurasi['nama_aplikasi'];?>">
                  <?=form_error('nama_aplikasi', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="waktu_denda">Waktu Denda</label>
                  <div class="input-group">
                    <input type="number" class="form-control" name="waktu_denda" id="waktu_denda" placeholder="Masukan jumlah waktu_denda" value="<?=$konfigurasi['waktu_denda'];?>">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon2">Hari</span>
                    </div>
                  </div>
                  <?=form_error('waktu_denda', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="denda">Jumlah Denda</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp.</span>
                    </div>
                    <input type="number" class="form-control" name="denda" id="denda" placeholder="Masukan waktu denda" value="<?=$konfigurasi['denda'];?>">
                  </div>
                  <?=form_error('denda', '<small class="form-text text-danger">', '</small>');?>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->

  </section>
  <!-- /.content -->
</div>