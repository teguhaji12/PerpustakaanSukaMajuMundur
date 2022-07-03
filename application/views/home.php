<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Peminjam Buku</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Peminjam Perseorang</h4>
            </div>
            <div class="card-body">
              <table class="table" id="example1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Tanggal Pinjam</th>
                    <th>Pengembalian</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Denda</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($peminjam as $value): ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$value['pinjam_nama'];?></td>
                    <td>
                      <?php if($value['pinjam_status'] == 'siswa'): ?>
                      <?=$value['kelas_nama'];?>
                      <?php else: ?>
                      -
                      <?php endif; ?>
                    </td>
                    <td><?=$value['pinjam_status'];?></td>
                    <td><?=tgl_indo($value['pinjam_tanggal']);?></td>
                    <td>
                      <?php if($value['pinjam_status_kembali'] == 'belum dikembalikan'): ?>
                      <span class="badge badge-danger"><?=$value['pinjam_status_kembali'];?></span>
                      <?php elseif($value['pinjam_status_kembali'] == 'sudah dikembalikan'): ?>
                      <span class="badge badge-success"><?=$value['pinjam_status_kembali'];?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($value['pinjam_tanggal_kembali'] == NULL): ?>
                      -
                      <?php else: ?>
                      <?=tgl_indo($value['pinjam_tanggal_kembali']);?>
                      <?php endif; ?>
                    </td>
                    <td><?=$value['pinjam_status_kembali'] == 'belum dikembalikan' ? rupiah(denda($value['pinjam_tanggal'])) : rupiah($value['denda']);?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Peminjam Perkelas</h4>
            </div>
            <div class="card-body">
              <table class="table" id="example2">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Penanggung Jawab</th>
                    <th>Tanggal Pinjam</th>
                    <th>Pengembalian</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Denda</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($pinjam_kelas as $value): ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$value['kelas_nama'];?></td>
                    <td><?=$value['pinjam_penanggung_jawab'];?></td>
                    <td><?=tgl_indo($value['pinjam_tanggal']);?></td>
                    <td>
                      <?php if($value['pinjam_status'] == 'belum dikembalikan'): ?>
                      <span class="badge badge-danger"><?=$value['pinjam_status'];?></span>
                      <?php elseif($value['pinjam_status'] == 'sudah dikembalikan'): ?>
                      <span class="badge badge-success"><?=$value['pinjam_status'];?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($value['pinjam_tanggal_kembali'] == NULL): ?>
                      -
                      <?php else: ?>
                      <?=tgl_indo($value['pinjam_tanggal_kembali']);?>
                      <?php endif; ?>
                    </td>
                    <td><?=$value['pinjam_status'] == 'belum dikembalikan' ? rupiah(denda($value['pinjam_tanggal'])) : rupiah($value['denda']);?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->

  </section>
  <!-- /.content -->
</div>