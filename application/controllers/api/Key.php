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

    }
    ?>