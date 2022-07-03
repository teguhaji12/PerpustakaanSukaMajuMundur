<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

  public function get()
  {
    return $this->db->get_where('konfigurasi', ['id'=>1]);
  }

  public function update($data)
  {
    $this->db->update('konfigurasi', $data, ['id'=>1]);
    return $this->db->affected_rows();
  }

}

/* End of file Barang_model.php */
