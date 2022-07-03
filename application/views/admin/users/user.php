<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?=site_url('admin/user');?>">User</a></li>
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
        <a href="<?=site_url('admin/user/add');?>" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Tambah Petugas</a>

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
          <th>Username</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$user['username'];?></td>
          <td>
            <a href="<?=site_url('admin/user/edit/'.$user['id']);?>" title="edit" class="text-warning"><i class="fas fa-edit"></i></a>
            <a href="<?=site_url('admin/user/delete/'.$user['id']);?>" title="delete" class="text-danger"><i class="fas fa-trash"></i></a>
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