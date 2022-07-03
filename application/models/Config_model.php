<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

  public function listing()
  {
    return $this->db->get('konfigurasi')->row_array();
  }

  public function getStokBuku()
  {
    $this->db->select('sum(buku_stok) as buku_stok');
    $this->db->from('buku');
    return $this->db->get();
  }

  public function getJudulBuku()
  {
    $this->db->select('count(buku_judul) as judulBuku');
    $this->db->from('buku');
    return $this->db->get();
  }

  public function getTotalKategori()
  {
    $this->db->select('count(kategori_nama) as totalKategori');
    $this->db->from('kategori');
    return $this->db->get();
  }

}