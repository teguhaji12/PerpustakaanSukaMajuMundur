<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('admin/kategori');?>">Kategori</a></li>
            <li class="breadcrumb-item active">Add</li>
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
            <!-- form start -->
            <form role="form" action="<?=site_url('admin/kategori/add');?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="username">Nama Kategori</label>
                  <input type="text" class="form-control" name="kategori_nama" id="kategori_nama" placeholder="Masukan nama kategori" value="<?=set_value('kategori_nama');?>">
                  <?=form_error('kategori_nama', '<small class="form-text text-danger">', '</small>');?>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
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