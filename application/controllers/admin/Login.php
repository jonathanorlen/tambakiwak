<?php
class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('admin/M_login'));
  }
  public function index() {
    $this->load->view('login/login');
  }
  public function proses() {
    $email = $this->input->post('email');
    $password = passwordEncrypt($this->input->post('password'));

    $get = $this->db->query("SELECT * FROM admin WHERE email='$email' AND password='$password'");
    $hasil = $get->row();
    
    $where = array(
      'email' => $email,
      'password' => $password
    );

    $cek = $this->M_login->cek_login("admin",$where)->num_rows();
    if($cek > 0)
    { 
      if ($hasil->status = '1') {
        $data_session = array(
          'data' => $hasil,
          'akses' => "login",
        );
        $this->session->set_userdata($data_session);
        redirect(base_url("admin/dashboard"));
      }else{
        $this->notification->error('Akses anda di nonaktifkan');
        redirect(base_url("admin/login"));
      }
    }else{
      $this->notification->error('Email tidak ditemukan atau password tidak sama');
      redirect(base_url("admin/login"));
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect(base_url('admin/login'));
  }
}
?>