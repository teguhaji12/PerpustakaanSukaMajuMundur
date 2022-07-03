<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Peminjam Kelas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?=site_url('admin/pinjam_kelas');?>">Peminjam Kelas</a></li>
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
        <a href="<?=site_url('admin/pinjam_kelas/add');?>" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Tambah Peminjam</a>

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
          <th>Kelas</th>
          <th>Penanggung Jawab</th>
          <th>Tanggal Pinjam</th>
          <th>Pengembalian</th>
          <th>Tanggal Pengembalian</th>
          <th>Denda</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($pinjam_kelas as $k): ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$k['kelas_nama'];?></td>
          <td><?=$k['pinjam_penanggung_jawab'];?></td>
          <td><?=tgl_indo($k['pinjam_tanggal']);?></td>
          <td>
            <?php if($k['pinjam_status'] == 'belum dikembalikan'): ?>
            <span class="badge badge-danger"><?=$k['pinjam_status'];?></span>
            <?php elseif($k['pinjam_status'] == 'sudah dikembalikan'): ?>
            <span class="badge badge-success"><?=$k['pinjam_status'];?></span>
            <?php endif; ?>
          </td>
          <td>
            <?php if($k['pinjam_tanggal_kembali'] == NULL): ?>
            -
            <?php else: ?>
            <?=tgl_indo($k['pinjam_tanggal_kembali']);?>
            <?php endif; ?>
          </td>
          <td><?=$k['pinjam_status'] == 'belum dikembalikan' ? rupiah(denda($k['pinjam_tanggal'])) : rupiah($k['denda']);?></td>
          <td>
            <a href="<?=site_url('admin/pinjam_kelas/edit/'.$k['pinjam_id']);?>" title="edit" class="text-warning"><i class="fas fa-edit"></i></a>
            <a href="<?=site_url('admin/pinjam_kelas/delete/'.$k['pinjam_id']);?>" title="delete" class="text-danger" onclick="return confirm('Apakah anda yakin akan menghapus?');"><i class="fas fa-trash"></i></a>
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