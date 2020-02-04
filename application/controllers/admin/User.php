<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses') != "login") {
			redirect(base_url("admin/login"));			
		}else{
			$this->load->model('admin/Model_user','user');
		}
	}

	public function index(){
		$data['hak'] = 'siap';
		$data['active'] = 'user';
		$data['list'] = $this->user->getAllDataGroup();
		$data['content'] = 'admin/user/daftar';
		$this->load->view('admin/general/body',$data);
	}

	public function addEditUser($mode='add',$id = null){
		$data['hak'] = 'siap';
		$data['active'] = 'user';
		$data['mode'] = $mode;
		$data['content'] = 'admin/user/form';
		if($mode != 'add'){
			$data['user'] = $this->user->getOne($id);
		}
		$data['mode'] = $mode;
		$this->load->view('admin/general/body',$data);
	}

	public function edit($id = null){
		$data['user'] = $this->user->getOne($id);
		$data['content'] = 'admin/user/edit';
		$this->load->view('admin/general/body',$data);
	}


	public function hapus($id){
		/*$data = $this->user->getOne($id);
		$link        = "/upload/user/".$data['file'];
		echo $link;
          if(file_exists($link.$data['file'])) {
               unlink($link);
           }*/

           if($this->user->delete($id)){
           	$this->notification->success('Data Berhasil Dihapus');
           }else{
           	$this->notification->error('Data Gagal Dihapus');
           }
           
           redirect('admin/user');
       }

       public function createUser(){
       	$data = array(
       		'nama' => $this->input->post('nama'),
       		'email' => $this->input->post('email'),
       		'nomor_hp' => $this->input->post('nomor_hp'),
       		'username' => $this->input->post('username'),
       		'password' => passwordEncrypt($this->input->post('password')),
       		'status' => '1',
       	);

       	if($this->user->create($data)){
       		$this->notification->success('User berhasil dibuat');
       	}else{
       		$this->notification->error('User gagal dibuat');
       	}

		// $this->notification->success('Data Berhasil Disimpan');
       	redirect('admin/user/');
       }

       public function updateUser(){
       	$id = $this->input->post('id');
       	$data = array(
       		'nama' => $this->input->post('nama'),
       		'email' => $this->input->post('email'),
       		'nomor_hp' => $this->input->post('nomor_hp'),
       		'username' => $this->input->post('username'),
       		'password' => passwordEncrypt($this->input->post('password')),
       	);

       	if($this->user->update($id,$data)){
       		$this->notification->success('User berhasil diupdate');
       	}else{
       		$this->notification->error('User gagal diupdate');
       	}
		// $this->notification->success('Data Berhasil Disimpan');
       	redirect('admin/user/');
       }
   }
