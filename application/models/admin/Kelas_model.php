<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

  public function getAll()
  {
    return $this->db->get('kelas');
  }

  public function getById($id)
  {
    return $this->db->get_where('kelas', ['kelas_id'=>$id]);
  }

  public function insert($data)
  {
    return $this->db->insert('kelas', $data);
  }

  public function update($id, $data)
  {
    $this->db->update('kelas', $data, ['kelas_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete('kelas', ['kelas_id'=>$id]);
    return $this->db->affected_rows();
  }

}

/* End of file Barang_model.php */
