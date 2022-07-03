<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Kelas_model');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $data = konfigurasi('Kelas');
    $data['kelas'] = $this->Kelas_model->getAll()->result_array();
    $this->template->load('template/template', 'admin/kelas/kelas', $data);
  }

  public function add()
  {
    $data = konfigurasi('Tambah Kelas');

    $this->form_validation->set_rules('kelas_nama', 'Nama Kelas', 'trim|required|is_unique[kelas.kelas_nama]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/kelas/add', $data);
    } else {
      $data = [
        'kelas_nama'=>$this->input->post('kelas_nama', TRUE)
      ];
      if($this->Kelas_model->insert($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil tambah data.")
          </script>
        ');
        redirect('admin/kelas');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal tambah data.")
          </script>
        ');
        redirect('admin/kelas');
      }
    }
  }

  public function edit($id = NULL)
  {
    if ($id == NULL) redirect('admin/kelas');
    $data = konfigurasi('Edit Kelas');
    $data['kelas'] = $this->Kelas_model->getById($id)->row_array();

    $this->form_validation->set_rules('kelas_nama', 'Nama Kelas', 'trim|required|is_unique[kelas.kelas_nama]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/kelas/edit', $data);
    } else {
      $data = [
        'kelas_nama'=>$this->input->post('kelas_nama', TRUE)
      ];
      if($this->Kelas_model->update($id, $data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil edit data.")
          </script>
        ');
        redirect('admin/kelas');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal edit data.")
          </script>
        ');
        redirect('admin/kelas');
      }
    }
  }

  public function delete($id = NULL)
  {
    if ($id == NULL) redirect('admin/kelas');

    if($this->Kelas_model->delete($id)) {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.success("Berhasil hapus data.")
        </script>
      ');
      redirect('admin/kelas');
    } else {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.error("Gagal hapus data.")
        </script>
      ');
      redirect('admin/kelas');
    }
  }

}

/* End of file Suplier.php */