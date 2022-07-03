<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan</title>
</head>
<body>
  <div style="text-align: center;">
    <h3>LAPORAN PERPUSTAKAAN</h3><br/>
  </div><br/>
  <div>
    <p>Tanggal : <?=date('d-m-Y', strtotime($tglFrom)).' sampai '.date('d-m-Y', strtotime($tglTo));?></p>
  </div>
  <table class="items" width="100%" cellpadding="8" border="1">
    <tbody>
      <tr>
        <td colspan="2" align="center">Peminjaman Satuan</td>
      </tr>
      <tr>
        <td>Jumlah buku di pinjam</td>
        <td><?=$jumlahBukuPinjam;?></td>
      </tr>
      <tr>
        <td>Buku dekembalikan</td>
        <td><?=$bukuKembali;?></td>
      </tr>
      <tr>
        <td colspan="2" align="center">Peminjaman Kelas</td>
      </tr>
      <tr>
        <td>Jumlah buku di pinjam</td>
        <td><?=$jumlahBukuPinjamKelas;?></td>
      </tr>
      <tr>
        <td>Buku dekembalikan</td>
        <td><?=$bukuKembaliKelas;?></td>
      </tr>
      <tr>
        <td>Buku belum dekembalikan</td>
        <td><?=$bukuBelumKembaliKelas;?></td>
      </tr>
      <tr>
        <td><strong>Total semua buku dipinjam</strong></td>
        <td><?=$jumlahBukuPinjamKelas + $jumlahBukuPinjam;?></td>
      </tr>
      <tr>
        <td colspan="2" align="center">Denda</td>
      </tr>
      <tr>
        <td>Jumlah denda satuan</td>
        <td><?=rupiah($dendaSiswa);?></td>
      </tr>
      <tr>
        <td>Jumlah denda kelas</td>
        <td><?=rupiah($dendaKelas);?></td>
      </tr>
      <tr>
        <td><strong>Total denda</strong></td>
        <td><?=rupiah($dendaSiswa+$dendaKelas);?></td>
      </tr>
    </tbody>
  </table>
  <br/>
</body>
</html>