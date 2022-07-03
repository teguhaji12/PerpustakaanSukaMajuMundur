<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Data Peminjam</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('admin/pinjam');?>">Peminjam</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
            <form role="form" action="<?=site_url('admin/pinjam/edit/'.$pinjam['pinjam_id']);?>" method="post">
              <div class="card-body">         
                <div class="form-group">
                  <label for="pinjam_nama">Nama Peminjam</label>
                  <input type="text" class="form-control" name="pinjam_nama" id="pinjam_nama" placeholder="Masukan nama pinjam" value="<?=$pinjam['pinjam_nama'];?>">
                  <?=form_error('pinjam_nama', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="buku1">Judul Buku 1</label>
                  <?= form_dropdown('buku1', $buku, $pinjam['id_buku'], 'class="form-control select2"');?>
                  <?=form_error('buku1', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="buku2">Judul Buku 2</label>
                  <?= form_dropdown('buku2', $buku, $pinjam['id_buku2'], 'class="form-control select2"');?>
                  <?=form_error('buku2', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="pinjam_status">Status Peminjam</label>
                  <?= form_dropdown('pinjam_status', $status, $pinjam['pinjam_status'], 'class="form-control" disabled');?>
                  <?=form_error('pinjam_status', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="id_kelas">Kelas</label>
                  <?= form_dropdown('id_kelas', $kelas, $pinjam['id_kelas'], 'class="form-control"');?>
                  <small class="text-muted form-text">Kosongkan bila peminjam adalah guru</small>
                  <?=form_error('id_kelas', '<small class="form-text text-danger">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="pinjam_status_kembali">Status Peminjaman</label>
                  <?= form_dropdown('pinjam_status_kembali', ['belum dikembalikan'=>'Belum Dikembalikan','sudah dikembalikan'=>'Sudah Dikembalikan'], $pinjam['pinjam_status_kembali'], 'class="form-control"');?>
                  <?=form_error('pinjam_status_kembali', '<small class="form-text text-danger">', '</small>');?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit Data</button>
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