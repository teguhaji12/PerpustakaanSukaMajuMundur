<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

  public function getAll()
  {
    $this->db->join('kategori', 'kategori.kategori_id = buku.id_kategori', 'left');
    $this->db->order_by('buku.buku_judul', 'asc');
    return $this->db->get('buku');
  }

  public function getById($id)
  {
    $this->db->join('kategori', 'kategori.kategori_id = buku.id_kategori', 'left');
    return $this->db->get_where('buku', ['buku_id'=>$id]);
  }

  public function getKategori()
  {
    return $this->db->get('kategori');
  }

  public function insert($data)
  {
    return $this->db->insert('buku', $data);
  }

  public function update($id, $data)
  {
    $this->db->update('buku', $data, ['buku_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete('buku', ['buku_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function getBukuById($id)
  {
    $this->db->select('buku_stok');
    $this->db->from('buku');
    $this->db->where('buku_id', $id);
    $stok = $this->db->get()->row();
    
    $this->db->select('count(id_buku) as pinjam');
    $this->db->from('pinjam');
    $this->db->where('id_buku', $id);
    $this->db->where('pinjam_status_kembali', 'belum dikembalikan');
    $buku1 = $this->db->get()->row();

    $this->db->select('count(id_buku) as pinjam');
    $this->db->from('pinjam');
    $this->db->where('id_buku2', $id);
    $this->db->where('pinjam_status_kembali', 'belum dikembalikan');
    $buku2 = $this->db->get()->row();

    $this->db->select('sum(pinjam_jumlah_buku) as jumlahPinjam');
    $this->db->from('pinjam_kelas');
    $this->db->where('id_buku', $id);
    $this->db->where('pinjam_status', 'belum dikembalikan');
    $bukuK = $this->db->get()->row();

    return $stok->buku_stok - ($buku1->pinjam + $buku2->pinjam + $bukuK->jumlahPinjam);
  }

}

/* End of file Barang_model.php */
