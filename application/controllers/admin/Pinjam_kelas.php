<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_kelas extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Pinjam_kelas_model');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $data = konfigurasi('Pinjam');
    $data['pinjam_kelas'] = $this->Pinjam_kelas_model->getAll()->result_array();
    $this->template->load('template/template', 'admin/pinjam_kelas/pinjam_kelas', $data);
  }

  public function add()
  {
    $data = konfigurasi('Tambah Pinjam');

    $bukus = $this->Pinjam_kelas_model->getBuku()->result();
    foreach ($bukus as $value) {
      $buku[$value->buku_id] = $value->buku_judul; 
    }
    $kelas = [
      NULL => "Pilih Kelas"
    ];
    $kelass = $this->Pinjam_kelas_model->getKelas()->result();
    foreach ($kelass as $value) {
      $kelas[$value->kelas_id] = $value->kelas_nama; 
    }

    $data['buku'] = $buku;
    $data['kelas'] = $kelas;

    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
    $this->form_validation->set_rules('pinjam_penanggung_jawab', 'Penanggung Jawab', 'trim|required');
    $this->form_validation->set_rules('buku', 'Judul Buku', 'trim|required');
    $this->form_validation->set_rules('pinjam_jumlah_buku', 'Jumlah Buku', 'trim|required|callback_rule_buku');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/pinjam_kelas/add', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'id_kelas'=>$post['id_kelas'],
        'pinjam_penanggung_jawab'=>$post['pinjam_penanggung_jawab'],
        'id_buku'=>$post['buku'],
        'pinjam_jumlah_buku'=>$post['pinjam_jumlah_buku'],
        'pinjam_tanggal'=>date('Y-m-d'),
        'pinjam_status'=>'belum dikembalikan',
        'id_user'=>$this->session->userdata('id')
      ];
      if($this->Pinjam_kelas_model->insert($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil tambah data.")
          </script>
        ');
        redirect('admin/pinjam_kelas');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal tambah data.")
          </script>
        ');
        redirect('admin/pinjam_kelas');
      }
    }
  }

  public function edit($id = NULL)
  {
    if ($id == NULL) redirect('admin/pinjam_kelas');
    $data = konfigurasi('Edit Pinjam');
    $data['pinjam'] = $this->Pinjam_kelas_model->getById($id)->row_array();

    $bukus = $this->Pinjam_kelas_model->getBuku()->result();
    foreach ($bukus as $value) {
      $buku[$value->buku_id] = $value->buku_judul; 
    }
    $kelas = [
      NULL => "Pilih Kelas"
    ];
    $kelass = $this->Pinjam_kelas_model->getKelas()->result();
    foreach ($kelass as $value) {
      $kelas[$value->kelas_id] = $value->kelas_nama; 
    }

    $data['buku'] = $buku;
    $data['kelas'] = $kelas;

    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
    $this->form_validation->set_rules('pinjam_penanggung_jawab', 'Penanggung Jawab', 'trim|required');
    $this->form_validation->set_rules('buku', 'Judul Buku', 'trim|required');
    $this->form_validation->set_rules('pinjam_jumlah_buku', 'Jumlah Buku', 'trim|required|callback_rule_buku2');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/pinjam_kelas/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'id_kelas'=>$post['id_kelas'],
        'pinjam_penanggung_jawab'=>$post['pinjam_penanggung_jawab'],
        'id_buku'=>$post['buku'],
        'pinjam_jumlah_buku'=>$post['pinjam_jumlah_buku'],
        'id_user'=>$this->session->userdata('id')
      ];
      $data['pinjam_status'] = $post['pinjam_status'];
      $data['pinjam_tanggal_kembali'] = date('Y-m-d');
      
      if($post['pinjam_status'] == 'sudah dikembalikan') {
        $peminjam = $this->Pinjam_kelas_model->getById($id)->row_array();
        $data['pinjam_status'] = $post['pinjam_status'];
        $data['pinjam_tanggal_kembali'] = date('Y-m-d');
        $data['denda'] = denda($peminjam['pinjam_tanggal']);
      }

      if($this->Pinjam_kelas_model->update($id, $data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil edit data.")
          </script>
        ');
        redirect('admin/pinjam_kelas');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal edit data.")
          </script>
        ');
        redirect('admin/pinjam_kelas');
      }
    }
  }

  public function delete($id = NULL)
  {
    if ($id == NULL) redirect('admin/pinjam_kelas');

    if($this->Pinjam_kelas_model->delete($id)) {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.success("Berhasil hapus data.")
        </script>
      ');
      redirect('admin/pinjam_kelas');
    } else {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.error("Gagal hapus data.")
        </script>
      ');
      redirect('admin/pinjam_kelas');
    }
  }

  // Callback

  public function rule_buku()
  {
    $pBuku = $this->input->post('buku', TRUE);
    $jml = $this->input->post('pinjam_jumlah_buku', TRUE);

    $buku1 = $this->Pinjam_kelas_model->getBukuById($pBuku)->row();
    $buku2 = $this->Pinjam_kelas_model->getBukuById2($pBuku)->row();
    $jmlPinjam = $this->Pinjam_kelas_model->getJumlahPinjamById($pBuku)->row();

    $bukuStok = $this->Pinjam_kelas_model->getStokById($pBuku)->row();
    if ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam + $jml > $bukuStok->buku_stok) {
      $sisa = $bukuStok->buku_stok - ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam);
      $this->form_validation->set_message('rule_buku', 'Stok tidak cukup. Sisa stok : '.$sisa);
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function rule_buku2()
  {
    $pBuku = $this->input->post('buku', TRUE);
    $jml = $this->input->post('pinjam_jumlah_buku', TRUE);

    $buku1 = $this->Pinjam_kelas_model->getBukuById($pBuku)->row();
    $buku2 = $this->Pinjam_kelas_model->getBukuById2($pBuku)->row();
    $jmlPinjam = $this->Pinjam_kelas_model->getJumlahPinjamById($pBuku)->row();

    $bukuStok = $this->Pinjam_kelas_model->getStokById($pBuku)->row();
    $pinjam = $this->Pinjam_kelas_model->getById($this->input->post('pinjam_id', TRUE))->row();
    if($jml == $pinjam->pinjam_jumlah_buku){
      $rumus = ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam + $jml) - $pinjam->pinjam_jumlah_buku;
    } else {
      $rumus = ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam + $jml) - $pinjam->pinjam_jumlah_buku;
    }
    if ($rumus > $bukuStok->buku_stok) {
      $sisa = $bukuStok->buku_stok - ($buku1->pinjam + $buku2->pinjam + $jmlPinjam->jumlahPinjam) + $pinjam->pinjam_jumlah_buku;
      $this->form_validation->set_message('rule_buku2', 'Stok tidak cukup. Sisa stok : '.$sisa);
      return FALSE;
    } else {
      return TRUE;
    }
  }


}

/* End of file Suplier.php */