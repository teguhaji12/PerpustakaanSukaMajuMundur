<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Peminjam Kelas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('admin/pinjam_kelas');?>">Peminjam Kelas</a></li>
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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <!-- form start -->
            <form role="form" action="<?=site_url('admin/pinjam_kelas/add');?>" method="post">
              <div class="card-body">         
                <div class="form-group">
                  <label for="id_kelas">Kelas</label>
                  <?= form_dropdown('id_kelas', $kelas, set_value('id_kelas'), 'class="form-control"');?>
                  <?=form_error('id_kelas', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="pinjam_penanggung_jawab">Nama Penanggung Jawab</label>
                  <input type="text" class="form-control" name="pinjam_penanggung_jawab" value="<?=set_value('pinjam_penanggung_jawab');?>" placeholder="Masukan nama penanggung jawab">
                  <?=form_error('pinjam_penanggung_jawab', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="buku">Judul Buku</label>
                  <?= form_dropdown('buku', $buku, set_value('buku'), 'class="form-control select2"');?>
                  <?=form_error('buku', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="pinjam_jumlah_buku">Jumlah buku</label>
                  <input type="number" class="form-control" name="pinjam_jumlah_buku" value="<?=set_value('pinjam_jumlah_buku');?>" placeholder="Masukan jumlah buku">
                  <?=form_error('pinjam_jumlah_buku', '<small class="form-text text-danger">', '</small>');?>
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
    </div><!-- /.container-fluid -->

  </section>
  <!-- /.content -->
</div>