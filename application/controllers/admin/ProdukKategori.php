<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProdukKategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses') != "login") {
			redirect(base_url("admin/login"));			
		}else{
			$this->load->model('admin/Model_itemkategori','mitem');
		}
	}

	public function index(){
		$data['hak'] = 'siap';
		$data['active'] = 'produk kategori';
		$data['list'] = $this->mitem->getAllData();
		$data['content'] = 'admin/produkkategori/daftar';
		$this->load->view('admin/general/body',$data);
	}

	public function tambah(){
		$data['hak'] = 'siap';
		$data['active'] = 'produk kategori';
		$data['content'] = 'admin/produkkategori/form';
		$this->load->view('admin/general/body',$data);
	}

	public function edit($id = null){
		$data['kategori'] = $this->mitem->getOne($id);
		$data['content'] = 'admin/produkkategori/form';
		$data['active'] = 'produk kategori';
		$data['hak'] = 'siap';
		$this->load->view('admin/general/body',$data);
	}


	public function hapus($id){
		$data = $this->mitem->getOne($id);

		if($this->mitem->delete($id)){
			$this->notification->success('Data Berhasil Dihapus');
		}else{
			$this->notification->error('Data Gagal Dihapus');
		}
		redirect('admin/produkkategori');
	}

	public function prosesTambah(){
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');

		$data = array(
			'nama' => $nama,
			'status' => $status,
			'created' => timeStamp(),
        		'updated' => timeStamp(),
        		'deleted' => '0'
		);

		if(isset($_FILES['gambar']['name'])) {
			$config['upload_path']='upload/itemkategori';
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

		redirect('admin/produkkategori');
	}

	public function prosesEdit(){
		$id = $this->input->post('id');
		$gambar_lama = $this->input->post('gambar_lama');
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');

		$data = array(
			'nama' => $nama,
			'status' => $status,
			'created' => timeStamp(),
        		'updated' => timeStamp(),
        		'deleted' => '0'
		);

		if(!empty($_FILES['gambar']['tmp_name'])){
			$config['upload_path']='upload/itemkategori';
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
				$link = "/upload/itemkategori/".$gambar_lama;
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
			$this->notification->success('Kategori berhasil di edit');
		}else{
			$this->notification->error('Kategori gagal di edit');
		}

		echo $this->db->last_query();
		redirect('admin/produkkategori');
	}
}
