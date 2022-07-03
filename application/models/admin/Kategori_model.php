<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

  public function getAll()
  {
    return $this->db->get('kategori');
  }

  public function getById($id)
  {
    return $this->db->get_where('kategori', ['kategori_id'=>$id]);
  }

  public function insert($data)
  {
    return $this->db->insert('kategori', $data);
  }

  public function update($id, $data)
  {
    $this->db->update('kategori', $data, ['kategori_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete('kategori', ['kategori_id'=>$id]);
    return $this->db->affected_rows();
  }

}

/* End of file Barang_model.php */
