<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/User_model');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $data = konfigurasi('User');
    $data['users'] = $this->User_model->getAll()->result_array();
    $this->template->load('template/template', 'admin/users/user', $data);
  }

  public function add()
  {
    $data = konfigurasi('Tambah User');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/users/add', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'username'=>$post['username'],
        'password'=>password_hash($post['password'], PASSWORD_DEFAULT),
        'role'=>'Petugas'
      ];
      if($this->User_model->insert($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil tambah data.")
          </script>
        ');
        redirect('admin/user');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal tambah data.")
          </script>
        ');
        redirect('admin/user');
      }
    }
  }

  public function edit($id = NULL)
  {
    if($id == NULL) redirect('admn/user');
    $data = konfigurasi('Edit User');
    $data['user'] = $this->User_model->getById($id)->row_array();
    $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template/template', 'admin/users/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'username'=>$post['username']
      ];
      if($post['password']) {
        $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
      }
      if($this->User_model->update($id, $data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil edit data.")
          </script>
        ');
        redirect('admin/user');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal edit data.")
          </script>
        ');
        redirect('admin/user');
      }
    }
  }

  public function delete($id = NULL)
  {
    if($id == NULL) redirect('admn/user');
    if($this->User_model->delete($id)) {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.success("Berhasil delete data.")
        </script>
      ');
      redirect('admin/user');
    } else {
      $this->session->set_flashdata('notif', '
        <script>
          toastr.error("Gagal delete data.")
        </script>
      ');
      redirect('admin/user');
    }
  }

}

/* End of file User.php */
