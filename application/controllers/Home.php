<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Pinjam_model');
    $this->load->model('admin/Pinjam_kelas_model');
  }

  public function index()
  {
    $data = konfigurasi('Home');
    $data['peminjam'] = $this->Pinjam_model->getAll()->result_array();
    $data['pinjam_kelas'] = $this->Pinjam_kelas_model->getAll()->result_array();
    $this->template->load('template/template_home', 'home', $data);
  }

}

/* End of file Home.php */