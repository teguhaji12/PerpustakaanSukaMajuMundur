<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function getAll()
  {
    return $this->db->get_where('users', ['role'=>'Petugas']);
  }

  public function getById($id)
  {
    return $this->db->get_where('users', ['id'=>$id]);
  }

  public function insert($data)
  {
    return $this->db->insert('users', $data);
  }

  public function update($id, $data)
  {
    $this->db->update('users', $data, ['id'=>$id, 'role'=>'Petugas']);
    return $this->db->affected_rows(); 
  }

  public function delete($id)
  {
    $this->db->delete('users', ['id'=>$id, 'role'=>'Petugas']);
    return $this->db->affected_rows();
  }

}

/* End of file Users_model.php */
