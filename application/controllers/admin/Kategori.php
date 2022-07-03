<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Kategori_model');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $data = konfigurasi('Kategori');
    $data['kategori'] = $this->Kategori_model->getAll()->result_array();
    $this->template->load('template/template', 'admin/kategori/kategori', $data);
  }

  public function add()
  {
    $data = konfigurasi('Tambah Kategori');

    $this->form_validation->set_rules('kategori_nama', 'Nama Kategori', 'trim|required|is_unique[kategori.kategori_nama]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/kategori/add', $data);
    } else {
      $data = [
        'kategori_nama'=>$this->input->post('kategori_nama', TRUE)
      ];
      if($this->Kategori_model->insert($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil tambah data.")
          </script>
        ');
        redirect('admin/kategori');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal tambah data.")
          </script>
        ');
        redirect('admin/kategori');
      }
    }
  }

  public function edit($id = NULL)
  {
    if ($id == NULL) redirect('admin/kategori');
    $data = konfigurasi('Edit Kategori');
    $data['kategori'] = $this->Kategori_model->getById($id)->row_array();

    $this->form_validation->set_rules('kategori_nama', 'Nama Kategori', 'trim|required|is_unique[kategori.kategori_nama]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/kategori/edit', $data);
    } else {
      $data = [
        'kategori_nama'=>$this->input->post('kategori_nama', TRUE)
      ];
      if($this->Kategori_model->update($id, $data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil edit data.")
          </script>
        ');
        redirect('admin/kategori');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal edit data.")
          </script>
        ');
        redirect('admin/kategori');
      }
    }
  }

  public function delete($id = NULL)
  {
    if ($id == NULL) redirect('admin/kategori');

    if($this->Kategori_model->delete($id)) {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.success("Berhasil hapus data.")
        </script>
      ');
      redirect('admin/kategori');
    } else {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.error("Gagal hapus data.")
        </script>
      ');
      redirect('admin/kategori');
    }
  }

}

/* End of file Suplier.php */