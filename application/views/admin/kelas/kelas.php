<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kelas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?=site_url('admin/kelas');?>">Kelas</a></li>
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
        <a href="<?=site_url('admin/kelas/add');?>" class="btn btn-primary btn-sm"><i class="fas fa-list-alt"></i> Tambah Kelas</a>

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
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($kelas as $k): ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$k['kelas_nama'];?></td>
          <td>
            <a href="<?=site_url('admin/kelas/edit/'.$k['kelas_id']);?>" title="edit" class="text-warning"><i class="fas fa-edit"></i></a>
            <a href="<?=site_url('admin/kelas/delete/'.$k['kelas_id']);?>" title="delete" class="text-danger" onclick="return confirm('Apakah anda yakin akan menghapus?');"><i class="fas fa-trash"></i></a>
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