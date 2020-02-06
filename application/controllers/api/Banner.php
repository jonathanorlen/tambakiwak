<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Order extends REST_Controller {

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Model_order');
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

        function service_get(){
            $id = $this->get('id');
            if ($id == '') {
                $service = $this->db->get('our_service')->result();
            } else {
                $this->db->where('id', $id);
                $service = $this->db->get('our_service')->result();
            }

            if (!empty($service))
            {
                $data['service'] = $service;
                $data['status'] = 'success';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => 'error',
                    'message' => 'Our service could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        function work_get(){
            $category = $this->get('id_kategoriourwork');
            if ($category == '') {
                $work = $this->db->get('our_work')->result();
            } else {
                $this->db->where('id_kategoriourwork', $category);
                $work = $this->db->get('our_work')->result();
            }

            if (!empty($work))
            {
                $data['work'] = $work;
                $data['status'] = 'success';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => 'error',
                    'message' => 'Our work could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        function team_get(){
            $id = $this->get('id');
            if ($id == '') {
                $team = $this->db->get('our_team')->result();
            } else {
                $this->db->where('id', $id);
                $team = $this->db->get('our_team')->result();
            }
            if (!empty($team))
            {
                $data['team'] = $team;
                $data['status'] = 'success';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => 'error',
                    'message' => 'Team could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }


        function blog_get(){
            $slug = $this->get('slug');
            $limit = empty($this->get('limit')) ? '8' : $this->get('limit');
            if ($slug == '') {
                $blog = $this->db->get('blog',$limit)->result();
            } else {
                $this->db->where('slug', $slug);
                $blog = $this->db->get('blog',$limit)->result();
            }
            if (!empty($blog))
            {
                $data['blog'] = $blog;
                $data['status'] = 'success';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => 'error',
                    'message' => 'blog could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        function contacts_post(){
            $data_contact = array(
                    'name'           => $this->post('name'),
                    'phone'          => $this->post('phone'),
                    'email'    => $this->post('email'),
                    'message' => $this->post('message'));
                  
            $contact = $this->db->insert('contacts', $data_contact);

            if (!empty($contact))
            {
                $data['message'] = 'Contact successfully created.';
                $data['status'] = 'success';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Contact could not insert'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
        
        function orders_post(){
            $kode_order = "NT".date('ymd')."".$this->Model_order->get_count_order();
            $data_order = array(
                    'nama' => $this->post('name'),
                    'nomor_hp' => $this->post('phone'),
                    'email' => $this->post('email'),
                    'alamat' => $this->post('address'),
                    'jumlah_sepatu' => $this->post('shoesCount'),
                    'treatment' => $this->post('treatment'),
                    'nomor_member' => $this->post('noMember'),
                    'tanggal_penjemputan' => $this->post('tanggalJemput'),
                    'waktu_penjemputan' => $this->post('waktuJemput'),
                    'keterangan' => $this->post('keterangan'),
                    'kode_promo' => empty($this->post('kodePromo')) ? '' : $this->post('kodePromo'),
                    'kode_order' => $kode_order
            );
            $orders = $this->Model_order->insertData('orders', $data_order);

            if (!empty($orders))
            {
                $data['message'] = 'Orders successfully created.';
                $data['status'] = 'success';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Orders could not insert'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        function orders_get(){
            $kode_order = $this->get('kodeOrder');
            $data_order =  $this->Model_order->getDataOrder($kode_order);

            if (!empty($data_order))
            {
                $data['orders'] = $data_order;
                $data['status'] = 'success';
                $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => 'error',
                    'message' => 'Orders could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }
    ?>