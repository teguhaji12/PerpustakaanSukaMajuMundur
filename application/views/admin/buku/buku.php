<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?=site_url('admin/buku');?>">Buku</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <a href="<?=site_url('admin/buku/add');?>" class="btn btn-primary btn-sm"><i class="fas fa-book"></i> Tambah Buku</a>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <?php $no = 1; ?>
        <tr>
          <th>#</th>
          <th>Judul</th>
          <th>Penerbit</th>
          <th>Pengarang</th>
          <th>Tahun Terbit</th>
          <th>Kategori</th>
          <th>Stok</th>
          <th>Stok Sisa</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($buku as $b): ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$b['buku_judul'];?></td>
          <td><?=$b['buku_penerbit'];?></td>
          <td><?=$b['buku_pengarang'];?></td></td>
          <td><?=$b['buku_tahun_terbit'];?></td>
          <td><?=$b['kategori_nama'];?></td>
          <td><?=$b['buku_stok'];?></td>
          <td><?=$this->Buku_model->getBukuById($b['buku_id'])?></td>
          <td>
            <a href="<?=site_url('admin/buku/edit/'.$b['buku_id']);?>" title="edit" class="text-warning"><i class="fas fa-edit"></i></a>
            <a onclick="return confirm('Apakah anda yakin akan menghapus?');" href="<?=site_url('admin/buku/delete/'.$b['buku_id']);?>" title="delete" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>