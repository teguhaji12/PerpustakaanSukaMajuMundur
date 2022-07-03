<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('admin/buku');?>">Buku</a></li>
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
            <form role="form" action="<?=site_url('admin/buku/add');?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="buku_judul">Judul Buku</label>
                  <input type="text" class="form-control" name="buku_judul" id="buku_judul" placeholder="Masukan judul buku" value="<?=set_value('buku_judul');?>">
                  <?=form_error('buku_judul', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="buku_penerbit">Penerbit</label>
                  <input type="text" class="form-control" name="buku_penerbit" id="buku_penerbit" placeholder="Masukan nama buku" value="<?=set_value('buku_penerbit');?>">
                  <?=form_error('buku_penerbit', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="buku_pengarang">Pengarang</label>
                  <input type="text" class="form-control" name="buku_pengarang" id="buku_pengarang" placeholder="Masukan pengarang buku" value="<?=set_value('buku_pengarang');?>">
                  <?=form_error('buku_pengarang', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="id_kategori">Kategori</label>
                  <?= form_dropdown('id_kategori', $kategori, set_value('id_kategori'), 'class="form-control"'); ?>
                </div>
                <div class="form-group">
                  <label for="buku_tahun_terbit">Tahun Terbit</label>
                  <input type="text" class="form-control" name="buku_tahun_terbit" placeholder="Masukan tahun terbit buku" value="<?=set_value('buku_tahun_terbit');?>">
                  <?=form_error('buku_tahun_terbit', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="buku_stok">Stok</label>
                  <input type="number" class="form-control" name="buku_stok" id="buku_stok" placeholder="Masukan stok buku" value="<?=set_value('buku_stok');?>">
                  <?=form_error('buku_stok', '<small class="form-text text-danger">', '</small>');?>
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