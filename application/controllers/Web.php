<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/*$this->load->library('Password');
		$this->load->model('user_model');*/
		$this->load->model('Web_model','m_web');
	}

	public function index(){
		$data['first'] = $this->m_web->getFirst();
		$data['head'] = $this->m_web->gethead($data['first']['tanggal']);
		$this->load->view('web/index',$data);
	}
}
