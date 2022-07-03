<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
  
  public function index()
  {
    $data = konfigurasi('Dashboard');
    $data['buku_stok'] = $this->Config_model->getStokBuku()->row_array();
    $data['judul_buku'] = $this->Config_model->getJudulBuku()->row_array();
    $data['kategori'] = $this->Config_model->getTotalKategori()->row_array();
    $this->template->load('template/template', 'admin/dashboard', $data);
  }

}

/* End of file Dashboard.php */
