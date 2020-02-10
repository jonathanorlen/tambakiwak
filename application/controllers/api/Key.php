<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Key extends REST_Controller {

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('admin/Model_banner');
        $this->load->model('admin/Model_user','muser');
        $this->load->model('transaction/Model_transaction','mtransaction');
        $this->load->model('admin/M_login','mlogin');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
    }

    function banner_get() {
        $id = $this->get('id');
        if ($id == '') {
            $banner = $this->db->get('banner')->result();
        } else {
            $this->db->where('id', $id);
            $banner = $this->db->get('banner')->result();
        }

        if (!empty($banner))
        {
            $data['banner'] = $banner;
            $data['status'] = 'success';
            $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => 'error',
                'message' => 'Banner could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    function item_get() {
        $id = $this->get('id');
        $kategori = $this->get('kategori');
        if ($id == '' && $kategori == '') {
            $item = $this->db->get('item')->result();
        }else if($kategori != ''){
            $this->db->where('kategori', $kategori);
            $item = $this->db->get('item')->result();
        }else{
            $this->db->where('id', $id);
            $item = $this->db->get('item')->result();
        }

        if (!empty($item))
        {
            $data['item'] = $item;
            $data['status'] = 'success';
            $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => 'error',
                'message' => 'item could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    function itemkategori_get() {
        $id = $this->get('id');
        if ($id == '') {
            $item = $this->db->get('item_kategori')->result();
        } else {
            $this->db->where('id', $id);
            $item = $this->db->get('item_kategori')->result();
        }

        if (!empty($item))
        {
            $data['item'] = $item;
            $data['status'] = 'success';
            $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => 'error',
                'message' => 'item could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    function user_post() {
        $data['id'] = $this->post('id');

        if($this->muser->getOne($data['id']) > 0){
            $this->db->where('id', $data['id']);
            $user = $this->db->get('user')->result();
            $data['user'] = $user;
            $data['status'] = 'success';
            $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $data['status'] = 'User tidak ada';
            $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
        }

    }

    function user_put() {
        $id = $this->put('id');
        $data['nama'] = $this->put('nama');
        $data['email'] = $this->put('email');
        $data['jenis_kelamin'] = $this->put('jenis_kelamin');
        $data['tanggal_lahir'] = $this->put('tanggal_lahir');
        $data['alamat'] = $this->put('alamat');
        $data['no_telp'] = $this->put('no_telp');
        $data['updated'] = timeStamp();

        if($this->muser->update($id,$data) > 0){
            $data['status'] = 'success';
            $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $data['status'] = 'error';
            $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
        }

    }

    function register_post() {
        $data['nama'] = $this->post('nama');
        $data['email'] = $this->post('email');
        $data['jenis_kelamin'] = $this->post('jenis_kelamin');
        $data['tanggal_lahir'] = $this->post('tanggal_lahir');
        $data['alamat'] = $this->post('alamat');
        $data['no_telp'] = $this->post('no_telp');
        $data['password'] = passwordEncrypt($this->post('password'));
        $data['created'] = timeStamp();
        $data['updated'] = timeStamp();
        $data['deleted'] = 0;

        if($this->muser->getEmail($data["email"]) <= 0){
            if($this->muser->create($data) >= 1){
                $data['status'] = 'succes';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $data['status'] = 'error';
                $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }else{
            $data['status'] = 'email sudah ada';
            $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
        }

    }

    function databasket_post() {

        $data['user'] = $this->post('user');
        if($this->mtransaction->getAllData($data['user'])) {
            $this->db->where('user',$data['user']);
            $query = $this->db->get('detail_transaksi')->result();
            $this->set_response($query, REST_Controller::HTTP_OK); // OK (200) being the HTTP response codeNOT_FOUND (404) 
        }else{
            $status = 'error';
            $this->set_response($status, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) }
        }
    }

    function addbasket_post() {
        $data['item'] = $this->post('item');
        $data['user'] = $this->post('user');
        $data['qty'] = $this->post('qty');
        $data['harga'] = $this->post('harga');
        $data['satuan'] = $this->post('satuan');
        $data['total'] = $this->post('total');
        if($this->mtransaction->getOne($data['item'],$data['user']) > 0) {
            if($this->mtransaction->update($data['item'],$data['user'],$data['qty'],$data['total'])){
                $data['status'] = 'update';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $data['status'] = 'update gagal';
                    $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
                }
            }else{
                if($this->mtransaction->create($data) > 0){
                    $data['status'] = 'added';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $data['status'] = 'error';
                $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
            }

        }
    }

    function login_post() {
        $email = $this->post('email');
        $password = passwordEncrypt($this->post('password'));

        $where = array(
          'email' => $email,
          'password' => $password);

        if($this->mlogin->cek_login('user',$where)->num_rows() > 0){
            $user = $this->mlogin->cek_login('user',$where)->row();
            $data['data'] = $user;
            $data['status'] = "sukses";
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $data['status'] = 'email tidak terdaftar atau password anda tidak sama';
            $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
        }

    }

}
?>