<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProdukKategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses') != "login") {
			redirect(base_url("admin/login"));			
		}else{
			$this->load->model('admin/Model_media','media');
		}
	}

	public function index(){
		$data['hak'] = 'siap';
		$data['active'] = 'media';
		$data['list'] = $this->media->getAllDataGroup();
		$data['content'] = 'admin/media/daftar';
		$this->load->view('admin/general/body',$data);
	}

	public function tambah(){
		$data['hak'] = 'siap';
		$data['active'] = 'media';
		$data['content'] = 'admin/media/form';
		$this->load->view('admin/general/body',$data);
	}

	public function edit($id = null){
		$data['media'] = $this->media->getOne($id);
		$data['content'] = 'admin/media/edit';
		$data['active'] = 'media';
		$data['hak'] = 'siap';
		$this->load->view('admin/general/body',$data);
	}


	public function hapus($id){
		$data = $this->media->getOne($id);
		$link        = "/upload/media/".$data['file'];
		echo $link;
		if(file_exists($link.$data['file'])) {
			unlink($link);
		}

		if($this->media->delete($id)){
			$this->notification->success('Data Berhasil Dihapus');
		}else{
			$this->notification->error('Data Gagal Dihapus');
		}
		redirect('admin/media');
	}

	public function prosesTambah(){
		$tanggal = $this->input->post('tanggal');
		$filename = date('dmYhis');

		if($_FILES['file1']['name'] != "") {
			$nama = $this->input->post('nama_file1');
			$data = array(
				'nama' => $nama,
				'tanggal' => $tanggal
			);

			$config['upload_path']='upload/media';
			$config['allowed_types']='*';
			$config['upload_max_size']='5120000';
			$config['remove_spaces']=true;
			$config['overwrite']=false;
			$config['file_name'] = $nama.' '.$tanggal;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file1')) {
				$error = $this->upload->display_errors();
				$this->notification->error($error);
				echo $error;
                //redirect('admin/media');
			}else {
				$image = $this->upload->data();
				if($image['file_name']) {
					$data['file'] = $image['file_name'];
					$data['type'] = pathinfo($_FILES["file1"]["name"], PATHINFO_EXTENSION);
				}
			}
			$this->media->create($data);
		}

		if(isset($_FILES['file2']['name'])) {
			$nama = $this->input->post('nama_file2');
			$data = array(
				'nama' => $nama,
				'tanggal' => $tanggal
			);

			$config['upload_path']='upload/media';
			$config['allowed_types']='*';
			$config['upload_max_size']='5120000';
			$config['remove_spaces']=true;
			$config['overwrite']=false;
			$config['file_name'] = $nama.' '.$tanggal;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file2')) {
				$error = $this->upload->display_errors();
				$this->notification->error($error);
				redirect('admin/media/add');
			}else {
				$image = $this->upload->data();
				if($image['file_name']) {
					$data['file'] = $image['file_name'];
					$data['type'] = pathinfo($_FILES["file2"]["name"], PATHINFO_EXTENSION);
				}
			}
			$this->media->create($data);
		}

		if(isset($_FILES['file3']['name'])) {
			$nama = $this->input->post('nama_file3');
			$data = array(
				'nama' => $nama,
				'tanggal' => $tanggal
			);

			$config['upload_path']='upload/media';
			$config['allowed_types']='*';
			$config['upload_max_size']='5120000';
			$config['remove_spaces']=true;
			$config['overwrite']=false;
			$config['file_name'] = $nama.' '.$tanggal;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file3')) {
				$error = $this->upload->display_errors();
				$this->notification->error($error);
				redirect('admin/media/add');
			}else {
				$image = $this->upload->data();
				if($image['file_name']) {
					$data['file'] = $image['file_name'];
					$data['type'] = pathinfo($_FILES["file3"]["name"], PATHINFO_EXTENSION);
				}
			}
			$this->media->create($data);
		}

		if(isset($_FILES['file4']['name'])) {
			$nama = $this->input->post('nama_file4');
			$data = array(
				'nama' => $nama,
				'tanggal' => $tanggal
			);

			$config['upload_path']='upload/media';
			$config['allowed_types']='*';
			$config['upload_max_size']='5120000';
			$config['remove_spaces']=true;
			$config['overwrite']=false;
			$config['file_name'] = $nama.' '.$tanggal;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file3')) {
				$error = $this->upload->display_errors();
				$this->notification->error($error);
				redirect('admin/media/add');
			}else {
				$image = $this->upload->data();
				if($image['file_name']) {
					$data['file'] = $image['file_name'];
					$data['type'] = pathinfo($_FILES["file4"]["name"], PATHINFO_EXTENSION);
				}
			}
			$this->media->create($data);
		}

		$this->notification->success('Data Berhasil Disimpan');
		redirect('admin/media');
		//echo $this->db->last_query();
	}

	public function prosesEdit(){
		$id = $this->input->post('id');
		$file_lama = $this->input->post('file_lama');
		$tanggal = $this->input->post('tanggal');
		$nama = $this->input->post("nama");
		$type = $this->input->post("type");

		$data = array(
			'nama' => $nama,
			'tanggal' => $tanggal
		);

		if(!empty($_FILES['file']['tmp_name'])){
			$nama = $this->input->post('nama');
			move_uploaded_file(
				$_FILES['file']['tmp_name'],
				'./upload/media/'.$nama.' '.$tanggal.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)
			);
			$file = $nama.' '.$tanggal.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			
			$link        = "/upload/media/".$file_lama;
			if(file_exists($link)) {
				unlink($link);
			}
			$data['file'] = $file;
			$data['type'] = pathinfo($_FILES["file1"]["name"], PATHINFO_EXTENSION);
		}else{
			$path = FCPATH.'upload/media/';
			$nama_baru = $nama." ".$tanggal.".".$type;
			rename($path.$file_lama,$path.$nama_baru);
			$data['file'] = $nama_baru;
		}

		if($this->media->update($id,$data)){
			$this->notification->success('Media berhasil di edit');
		}else{
			$this->notification->error('Media gagal di edit');
		}

		$this->notification->success('succes');
		redirect('admin/media');
	}
}
