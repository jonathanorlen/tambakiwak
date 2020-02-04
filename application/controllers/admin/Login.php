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
    $username = $this->input->post('username');
    $password = passwordEncrypt($this->input->post('password'));

    $get = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    $hasil = $get->row();
    echo $this->db->last_query();
    $where = array(
      'username' => $username,
      'password' => $password
    );
    $cek = $this->M_login->cek_login("users",$where)->num_rows();
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
      $this->notification->error('Username tidak ditemukan atau password tidak sama');
      redirect(base_url("admin/login"));
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect(base_url('admin/login'));
  }
}
?>