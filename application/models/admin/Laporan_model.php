<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

  public function getData($tglFrom, $tglTo)
  {
    $this->db->select('*, (pinjam_tanggal_kembali - pinjam_tanggal) as waktu');
    $this->db->from('pinjam');
    $this->db->where('pinjam_status_kembali', 'sudah dikembalikan');
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    return $this->db->get();
  }

  // Pinjam satuan

  public function getJumlahPinjam($tglFrom, $tglTo)
  {
    $this->db->select('pinjam_id');
    $this->db->from('pinjam');
    $this->db->where('id_buku !=', NULL);
    $this->db->where('id_buku !=', 0);
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    return $this->db->get();
  }

  public function getJumlahPinjam2($tglFrom, $tglTo)
  {
    $this->db->select('pinjam_id');
    $this->db->from('pinjam');
    $this->db->where('id_buku2 !=', NULL);
    $this->db->where('id_buku2 !=', 0);
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    return $this->db->get();
  }

  public function getBukuKembali($tglFrom, $tglTo)
  {
    $this->db->select('pinjam_id');
    $this->db->from('pinjam');
    $this->db->where('id_buku !=', NULL);
    $this->db->where('id_buku !=', 0);
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    $this->db->where('pinjam_status_kembali', 'sudah dikembalikan');
    $buku1 = $this->db->get()->num_rows();

    $this->db->select('pinjam_id');
    $this->db->from('pinjam');
    $this->db->where('id_buku2 !=', NULL);
    $this->db->where('id_buku2 !=', 0);
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    $this->db->where('pinjam_status_kembali', 'sudah dikembalikan');
    $buku2 = $this->db->get()->num_rows();

    return $buku1 + $buku2;
  }

  public function getBukuBelumKembali($tglFrom, $tglTo)
  {
    $this->db->select('pinjam_id');
    $this->db->from('pinjam');
    $this->db->where('id_buku !=', NULL);
    $this->db->where('id_buku !=', 0);
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    $this->db->where('pinjam_status_kembali', 'belum dikembalikan');
    $buku1 = $this->db->get()->num_rows();

    $this->db->select('pinjam_id');
    $this->db->from('pinjam');
    $this->db->where('id_buku2 !=', NULL);
    $this->db->where('id_buku2 !=', 0);
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    $this->db->where('pinjam_status_kembali', 'belum dikembalikan');
    $buku2 = $this->db->get()->num_rows();

    return $buku1 + $buku2;
  }

  // Pinjam kelas

  public function getJumlahPinjamKelas($tglFrom, $tglTo)
  {
    $this->db->select('sum(pinjam_jumlah_buku) AS pinjam_jumlah_buku');
    $this->db->from('pinjam_kelas');
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    return $this->db->get();
  }

  public function getBukuKembaliKelas($tglFrom, $tglTo)
  {
    $this->db->select('sum(pinjam_jumlah_buku) AS pinjam_jumlah_buku');
    $this->db->from('pinjam_kelas');
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    $this->db->where('pinjam_status', 'sudah dikembalikan');
    return $this->db->get();
  }

  public function getBukuBelumKembaliKelas($tglFrom, $tglTo)
  {
    $this->db->select('sum(pinjam_jumlah_buku) AS pinjam_jumlah_buku');
    $this->db->from('pinjam_kelas');
    $this->db->where('pinjam_tanggal >=', $tglFrom);
    $this->db->where('pinjam_tanggal <=', $tglTo);
    $this->db->where('pinjam_status', 'belum dikembalikan');
    return $this->db->get();
  }

  // Denda

  public function getTotalDendaSiswa()
  {
    $this->db->select('sum(denda) AS dendaSiswa');
    $this->db->from('pinjam');
    return $this->db->get();
  }

  public function getTotalDendaKelas()
  {
    $this->db->select('sum(denda) AS dendaKelas');
    $this->db->from('pinjam_kelas');
    return $this->db->get();
  }

}

/* End of file Laporan_model.php */
