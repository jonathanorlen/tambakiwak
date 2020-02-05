<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses') != "login") {
			redirect(base_url("admin/login"));			
		}else{
			$this->load->model('admin/Model_item','mitem');
			$this->load->model('admin/Model_itemkategori','mitemkategori');
		}
	}

	public function index(){
		$data['hak'] = 'siap';
		$data['active'] = 'produk';
		$data['list'] = $this->mitem->getAllData();
		$data['content'] = 'admin/produk/daftar';
		$this->load->view('admin/general/body',$data);
	}

	public function tambah(){
		$data['hak'] = 'siap';
		$data['active'] = 'produk';
		$data['kategori'] = $this->mitemkategori->getAllData();
		$data['content'] = 'admin/produk/form';
		$this->load->view('admin/general/body',$data);
	}

	public function edit($id = null){
		$data['produk'] = $this->mitem->getOne($id);
		$data['kategori'] = $this->mitemkategori->getAllData();
		$data['content'] = 'admin/produk/form';
		$data['active'] = 'produk';
		$data['hak'] = 'siap';
		$this->load->view('admin/general/body',$data);
	}


	public function prosesTambah(){

		$data = array(
			'kategori' => $this->input->post("kategori"),
			'nama' => $this->input->post("nama"),
			'harga' => $this->input->post("harga"),
			'satuan' => $this->input->post("satuan"),
			'deskripsi' => $this->input->post("deskripsi"),
			'status' => '1',
			'created' => timeStamp(),
        		'updated' => timeStamp(),
        		'deleted' => '0'
		);

		if(isset($_FILES['gambar']['name'])) {
			$config['upload_path']='upload/item';
			$config['allowed_types']='*';
			$config['upload_max_size']='50000';
			$config['remove_spaces']=true;
			$config['overwrite']=false;
			$config['file_name'] = $data["nama"].$data["created"];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('gambar')) {
				$error = $this->upload->display_errors();
				$this->notification->error($error);
				redirect('admin/produk/tambah');
			}else {
				$image = $this->upload->data();
				if($image['file_name']) {
					$data['gambar'] = $image['file_name'];
				}
			}
		}

		if($this->mitem->create($data) >= 1){
			$this->notification->success('Item telah di tambahkan');
		}else{
			$this->notification->error('Item gagal di tambahkan');
		}
		
		redirect('admin/produk');
	}

	public function prosesEdit(){
		$id = $this->input->post('id');
		$gambar_lama = $this->input->post('gambar_lama');

		$data = array(
			'kategori' => $this->input->post("kategori"),
			'nama' => $this->input->post("nama"),
			'harga' => $this->input->post("harga"),
			'satuan' => $this->input->post("satuan"),
			'deskripsi' => $this->input->post("deskripsi"),
			'status' => '1',
        		'updated' => timeStamp(),
		);
		
		if(!empty($_FILES['gambar']['tmp_name'])){
			$config['upload_path']='upload/item';
			$config['allowed_types']='*';
			$config['upload_max_size']='5120000';
			$config['remove_spaces']=true;
			$config['overwrite']=false;
			$config['file_name'] = $data['nama'].$data['updated'];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('gambar')) {
				$error = $this->upload->display_errors();
				$this->notification->error($error);
				redirect('admin/produk/tambah');
			}else {
				$image = $this->upload->data();
				$link = "/upload/item/".$gambar_lama;
				if(file_exists($link)) {
					unlink($link);
				}
				echo $link;
				if($image['file_name']) {
					$data['gambar'] = $image['file_name'];
				}
			}
		}

		if($this->mitem->update($id,$data)){
			$this->notification->success('Item berhasil di edit');
		}else{
			$this->notification->error('Item gagal di edit');
		}

		redirect('admin/produk');
	}

	public function hapus($id){
		$data = $this->mitem->getOne($id);
		// $link        = "/upload/media/".$data['file'];
		// echo $link;
		// if(file_exists($link.$data['file'])) {
		// 	unlink($link);
		// }

		if($this->mitem->delete($id)){
			$this->notification->success('Data Berhasil Dihapus');
		}else{
			$this->notification->error('Data Gagal Dihapus');
		}
		
		redirect('admin/produk');
	}
}
