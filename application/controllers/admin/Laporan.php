<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('admin/Laporan_model');
  }
  
  public function index()
  {
    $data = konfigurasi('Laporan');
    $this->form_validation->set_rules('tglFrom', 'Tanggal Mulai', 'trim|required');
    $this->form_validation->set_rules('tglTo', 'Tanggal Sampai', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/laporan/index', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $dataTgl = [
        'tglFrom' => $post['tglFrom'],
        'tglTo' => $post['tglTo'],
      ];
      $dataPinjam = $this->Laporan_model->getData($post['tglFrom'], $post['tglTo'])->result();
      if(empty($dataPinjam)){
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Tidak ada laporan.")
          </script>
        ');
        redirect('admin/laporan');
      }else{
        $this->print_laporan($dataPinjam, $dataTgl);
      }
    }
  }

  private function print_laporan($dataPinjam, $dataTgl)
  {
    $data = konfigurasi('Laporan');
    $site = $data['site'];
    $uang = 0;
    foreach($dataPinjam as $d){
      $uang = $uang + $d->waktu;
    }
    $data['tglFrom'] = $dataTgl['tglFrom'];
    $data['tglTo'] = $dataTgl['tglTo'];
    // pinjam status
    $data['jumlahBukuPinjam'] = $this->Laporan_model->getJumlahPinjam($dataTgl['tglFrom'], $dataTgl['tglTo'])->num_rows() + $this->Laporan_model->getJumlahPinjam2($dataTgl['tglFrom'], $dataTgl['tglTo'])->num_rows();
    $data['bukuKembali'] = $this->Laporan_model->getBukuKembali($dataTgl['tglFrom'], $dataTgl['tglTo']);
    $data['bukuBelumKembali'] = $this->Laporan_model->getBukuBelumKembali($dataTgl['tglFrom'], $dataTgl['tglTo']);
    // pinjam kelas
    $data['jumlahBukuPinjamKelas'] = $this->Laporan_model->getJumlahPinjamKelas($dataTgl['tglFrom'], $dataTgl['tglTo'])->row_array()['pinjam_jumlah_buku'];
    $data['bukuKembaliKelas'] = $this->Laporan_model->getBukuKembaliKelas($dataTgl['tglFrom'], $dataTgl['tglTo'])->row_array()['pinjam_jumlah_buku'];
    $data['bukuBelumKembaliKelas'] = $this->Laporan_model->getBukuBelumKembaliKelas($dataTgl['tglFrom'], $dataTgl['tglTo'])->row_array()['pinjam_jumlah_buku'];
    $data['totalDenda'] = $uang * $site['denda'];
    $data['dendaSiswa'] = $this->Laporan_model->getTotalDendaSiswa()->row_array()['dendaSiswa'];
    $data['dendaKelas'] = $this->Laporan_model->getTotalDendaKelas()->row_array()['dendaKelas'];
    $mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('laporan', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
  }

}

/* End of file Laporan.php */
