<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Pinjam_model');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $data = konfigurasi('Pinjam');
    $data['pinjam'] = $this->Pinjam_model->getAll()->result_array();
    $this->template->load('template/template', 'admin/pinjam/pinjam', $data);
  }

  public function add()
  {
    $data = konfigurasi('Tambah Pinjam');

    $buku = [
      NULL => "Pilih Buku"
    ];
    $bukus = $this->Pinjam_model->getBuku()->result();
    foreach ($bukus as $value) {
      $buku[$value->buku_id] = $value->buku_judul; 
    }
    $kelas = [
      NULL => "Pilih Kelas"
    ];
    $kelass = $this->Pinjam_model->getKelas()->result();
    foreach ($kelass as $value) {
      $kelas[$value->kelas_id] = $value->kelas_nama; 
    }

    $data['buku'] = $buku;
    $data['kelas'] = $kelas;
    $data['status'] = [
      'siswa'=>'siswa',
      'guru'=>'guru'
    ];

    $this->form_validation->set_rules('pinjam_nama', 'Nama Pinjam', 'trim|required|is_unique[pinjam.pinjam_nama]');
    $this->form_validation->set_rules('buku1', 'Judul Buku', 'trim|required|callback_rule_buku1');
    $this->form_validation->set_rules('buku2', 'Judul Buku', 'trim|callback_rule_buku2');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|callback_rule_kelas');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/pinjam/add', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'pinjam_nama'=>$post['pinjam_nama'],
        'pinjam_status'=>$post['pinjam_status'],
        'id_buku'=>$post['buku1'],
        'pinjam_tanggal'=>date('Y-m-d'),
        'id_user'=>$this->session->userdata('id'),
        'pinjam_status_kembali'=>'belum dikembalikan'
      ];
      if($post['buku2']) {
        $data['id_buku2'] = $post['buku2'];
      }
      if($post['pinjam_status'] == 'siswa') {
        $data['id_kelas'] = $post['id_kelas'];
      }
      if($this->Pinjam_model->insert($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil tambah data.")
          </script>
        ');
        redirect('admin/pinjam');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal tambah data.")
          </script>
        ');
        redirect('admin/pinjam');
      }
    }
  }

  public function edit($id = NULL)
  {
    if ($id == NULL) redirect('admin/pinjam');
    $data = konfigurasi('Edit Pinjam');
    $data['pinjam'] = $this->Pinjam_model->getById($id)->row_array();

     $buku = [
      NULL => "Pilih Buku"
    ];
    $bukus = $this->Pinjam_model->getBuku()->result();
    foreach ($bukus as $value) {
      $buku[$value->buku_id] = $value->buku_judul; 
    }
    $kelas = [
      NULL => "Pilih Kelas"
    ];
    $kelass = $this->Pinjam_model->getKelas()->result();
    foreach ($kelass as $value) {
      $kelas[$value->kelas_id] = $value->kelas_nama; 
    }

    $data['buku'] = $buku;
    $data['kelas'] = $kelas;
    $data['status'] = [
      'siswa'=>'siswa',
      'guru'=>'guru'
    ];

    $this->form_validation->set_rules('pinjam_nama', 'Nama Pinjam', 'trim|required');
    $this->form_validation->set_rules('buku1', 'Judul Buku', 'trim|required|callback_rule_buku1');
    $this->form_validation->set_rules('buku2', 'Judul Buku', 'trim|callback_rule_buku2');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|callback_rule_kelas');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/pinjam/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'pinjam_nama'=>$post['pinjam_nama'],
        'id_buku'=>$post['buku1'],
        'id_buku2'=>$post['buku2'],
      ];
      if($post['buku2']) {
        $data['id_buku2'] = $post['buku2'];
      }
      if($post['pinjam_status'] == 'siswa') {
        $data['id_kelas'] = $post['id_kelas'];
      }
      if($post['pinjam_status_kembali'] == 'sudah dikembalikan') {
        $peminjam = $this->Pinjam_model->getById($id)->row_array();
        $data['pinjam_status_kembali'] = $post['pinjam_status_kembali'];
        $data['pinjam_tanggal_kembali'] = date('Y-m-d');
        $data['denda'] = denda($peminjam['pinjam_tanggal']);
      }
      if($this->Pinjam_model->update($id, $data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil edit data.")
          </script>
        ');
        redirect('admin/pinjam');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal edit data.")
          </script>
        ');
        redirect('admin/pinjam');
      }
    }
  }

  public function delete($id = NULL)
  {
    if ($id == NULL) redirect('admin/pinjam');

    if($this->Pinjam_model->delete($id)) {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.success("Berhasil hapus data.")
        </script>
      ');
      redirect('admin/pinjam');
    } else {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.error("Gagal hapus data.")
        </script>
      ');
      redirect('admin/pinjam');
    }
  }

  // Callback

  public function rule_kelas()
  {
    if ($this->input->post('pinjam_status', TRUE) == 'siswa') {
      if(!empty($this->input->post('id_kelas', TRUE))) {
        return TRUE;
      } else {
        $this->form_validation->set_message('rule_kelas', '{field} tidak boleh kosong jika peminjam adalah siswa');
        return FALSE;
      }
    } else {
      return TRUE;
    }
  }

  public function rule_buku1()
  {
    if(empty($this->input->post('buku1', TRUE))) {
      return TRUE;
    } else {
      $pBuku = $this->input->post('buku1', TRUE);

      $buku1 = $this->Pinjam_model->getBukuById($pBuku)->row();
      $buku2 = $this->Pinjam_model->getBukuById2($pBuku)->row();
      $jmlPinjam = $this->Pinjam_model->getJumlahPinjamById($pBuku)->row();

      $bukuStok = $this->Pinjam_model->getStokById($pBuku)->row();
      if ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam + 1 > $bukuStok->buku_stok) {
        $sisa = $bukuStok->buku_stok - ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam);
        $this->form_validation->set_message('rule_buku1', 'Stok tidak cukup. Sisa stok : '.$sisa);
        return FALSE;
      } else {
        return TRUE;
      }
    }
  }

  public function rule_buku2()
  {
    if(empty($this->input->post('buku2', TRUE))) {
      return TRUE;
    } else {
      $pBuku = $this->input->post('buku2', TRUE);

      $buku1 = $this->Pinjam_model->getBukuById($pBuku)->row();
      $buku2 = $this->Pinjam_model->getBukuById2($pBuku)->row();
      $jmlPinjam = $this->Pinjam_model->getJumlahPinjamById($pBuku)->row();

      $bukuStok = $this->Pinjam_model->getStokById($pBuku)->row();
      if ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam + 1 > $bukuStok->buku_stok) {
        $sisa = $bukuStok->buku_stok - ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam);
        $this->form_validation->set_message('rule_buku2', 'Stok tidak cukup. Sisa stok : '.$sisa);
        return FALSE;
      } else {
        return TRUE;
      }
    }
  }


}

/* End of file Suplier.php */