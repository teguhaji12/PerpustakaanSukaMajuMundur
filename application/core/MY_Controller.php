<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
    date_default_timezone_set('Asia/Makassar');
  }
  
  public function index()
  {
    
  }

}

/* End of file MY_Controller.php */
