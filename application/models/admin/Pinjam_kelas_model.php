<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_kelas_model extends CI_Model {

  public function getAll()
  {
    $this->db->join('kelas', 'kelas.kelas_id = pinjam_kelas.id_kelas', 'left');
    $this->db->order_by('pinjam_tanggal', 'desc');
    return $this->db->get('pinjam_kelas');
  }

  public function getById($id)
  {
    $this->db->join('buku', 'buku.buku_id = pinjam_kelas.id_buku', 'left');
    $this->db->join('kelas', 'kelas.kelas_id = pinjam_kelas.id_kelas', 'left');
    return $this->db->get_where('pinjam_kelas', ['pinjam_kelas.pinjam_id'=>$id]);
  }

  public function insert($data)
  {
    return $this->db->insert('pinjam_kelas', $data);
  }

  public function update($id, $data)
  {
    $this->db->update('pinjam_kelas', $data, ['pinjam_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete('pinjam_kelas', ['pinjam_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function getBuku()
  {
    return $this->db->get('buku');
  }

  public function getKelas()
  {
    return $this->db->get('kelas');
  }

  // For Callback Use

  public function getBukuById($id)
  {
    $this->db->select('count(id_buku) as pinjam');
    $this->db->from('pinjam');
    $this->db->where('id_buku', $id);
    $this->db->where('pinjam_status_kembali', 'belum dikembalikan');
    return $this->db->get();
  }

  public function getBukuById2($id)
  {
    $this->db->select('count(id_buku) as pinjam');
    $this->db->from('pinjam');
    $this->db->where('id_buku2', $id);
    $this->db->where('pinjam_status_kembali', 'belum dikembalikan');
    return $this->db->get();
  }

  public function getJumlahPinjamById($id)
  {
    $this->db->select('sum(pinjam_jumlah_buku) as jumlahPinjam');
    $this->db->from('pinjam_kelas');
    $this->db->where('id_buku', $id);
    $this->db->where('pinjam_status', 'belum dikembalikan');
    return $this->db->get();
  }

  public function getStokById($id)
  {
    $this->db->select('buku_stok');
    $this->db->from('buku');
    $this->db->where('buku_id', $id);
    return $this->db->get();
  }

}

/* End of file Barang_model.php */
