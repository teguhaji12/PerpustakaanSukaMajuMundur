<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Konfigurasi_model');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $data = konfigurasi('Konfigurasi');
    $data['konfigurasi'] = $this->Konfigurasi_model->get()->row_array();

    $this->form_validation->set_rules('nama_aplikasi', 'Nama Aplikasi', 'trim|required');
    $this->form_validation->set_rules('denda', 'Jumlah Denda', 'trim|required');
    $this->form_validation->set_rules('waktu_denda', 'Batas Waktu Denda', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/konfigurasi', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'nama_aplikasi'=>$post['nama_aplikasi'],
        'denda'=>$post['denda'],
        'waktu_denda'=>$post['waktu_denda']
      ];
      
      if($this->Konfigurasi_model->update($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil update data.")
          </script>
        ');
        redirect('admin/konfigurasi');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal update data.")
          </script>
        ');
        redirect('admin/konfigurasi');
      }
    }
  }

}

/* End of file Konfigurasi.php */