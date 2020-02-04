<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		if ($this->session->userdata('akses') != "login") {
			redirect(base_url("admin/login"));			
		}else{
			$this->load->library('Password');
			$this->load->model('admin/Model_user');
			$this->load->model('admin/Model_media','media');
		}
	}

	public function index(){
		$data['total_media'] = $this->media->total_media();
		$data['hak'] = 'siap';
		$data['active'] = 'dashboard';
		$data['content'] = 'admin/dashboard';
		$this->load->view('admin/general/body',$data);
	}
}
