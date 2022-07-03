<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

  public function getByUsername($username)
  {
    return $this->db->get_where('users', ['username'=>$username]);
  }

}

/* End of file Auth_model.php */
