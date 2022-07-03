<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Buku_model');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $data = konfigurasi('Buku');
    $data['buku'] = $this->Buku_model->getAll()->result_array();
    $this->template->load('template/template', 'admin/buku/buku', $data);
  }

  public function add()
  {
    $data = konfigurasi('Buku');

    $kategoris = $this->Buku_model->getKategori()->result();
    foreach ($kategoris as $value) {
      $kategori[$value->kategori_id] = $value->kategori_nama;
    }

    $data['kategori'] = $kategori;

    $this->form_validation->set_rules('buku_judul', 'Judul Buku', 'trim|required');
    $this->form_validation->set_rules('buku_penerbit', 'Penerbit Buku', 'trim|required');
    $this->form_validation->set_rules('buku_pengarang', 'Pengarang Buku', 'trim|required');
    $this->form_validation->set_rules('buku_tahun_terbit', 'Tahun Terbit Buku', 'trim|required|is_numeric|max_length[4]');
    $this->form_validation->set_rules('buku_stok', 'Stok Buku', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/buku/add', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'buku_judul'=>$post['buku_judul'],
        'buku_penerbit'=>$post['buku_penerbit'],
        'buku_pengarang'=>$post['buku_pengarang'],
        'buku_tahun_terbit'=>$post['buku_tahun_terbit'],
        'id_kategori'=>$post['id_kategori'],
        'buku_stok'=>$post['buku_stok']
      ];

      if ($this->Buku_model->insert($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil tambah data.")
          </script>
        ');
        redirect('admin/buku');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal tambah data.")
          </script>
        ');
        redirect('admin/buku');
      }
    }
  }

  public function edit($id = NULL)
  {
    if($id == NULL) redirect('admin/buku');
    $data = konfigurasi('Buku');
    $data['buku'] = $this->Buku_model->getById($id)->row_array();
    $kategoris = $this->Buku_model->getKategori()->result();
    foreach ($kategoris as $value) {
      $kategori[$value->kategori_id] = $value->kategori_nama;
    }

    $data['kategori'] = $kategori;

    $this->form_validation->set_rules('buku_judul', 'Judul Buku', 'trim|required');
    $this->form_validation->set_rules('buku_penerbit', 'Penerbit Buku', 'trim|required');
    $this->form_validation->set_rules('buku_pengarang', 'Pengarang Buku', 'trim|required');
    $this->form_validation->set_rules('buku_tahun_terbit', 'Tahun Terbit Buku', 'trim|required|is_numeric|max_length[4]');
    $this->form_validation->set_rules('buku_stok', 'Stok Buku', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/buku/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'buku_judul'=>$post['buku_judul'],
        'buku_penerbit'=>$post['buku_penerbit'],
        'buku_pengarang'=>$post['buku_pengarang'],
        'buku_tahun_terbit'=>$post['buku_tahun_terbit'],
        'id_kategori'=>$post['id_kategori'],
        'buku_stok'=>$post['buku_stok']
      ];

      if ($this->Buku_model->update($id, $data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil edit data.")
          </script>
        ');
        redirect('admin/buku');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal edit data.")
          </script>
        ');
        redirect('admin/buku');
      }
    }
  }

  public function delete($id = NULL)
  {
    if($id == NULL) redirect('admin/buku');
    if ($this->Buku_model->delete($id)) {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.success("Berhasil hapus data.")
        </script>
      ');
      redirect('admin/buku');
    } else {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.error("Gagal hapus data.")
        </script>
      ');
      redirect('admin/buku');
    }
  }

}

/* End of file Suplier.php */