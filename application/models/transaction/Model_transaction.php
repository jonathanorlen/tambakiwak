<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaction extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->table = 'detail_transaksi';
		$this->field_id = 'id';
	}

	public function getAllData($user)
	{	
		$this->db->where('kode_transaksi',0);
		$this->db->where('user',$user);
		$query = $this->db->get($this->table);
		return $this->db->affected_rows();
	}

	function getOne($item,$user)
	{	
		$this->db->where("user",$user);
		$this->db->where("item",$item);
		$query = $this->db->get("{$this->table}");
		return $this->db->affected_rows();
	}

	public function create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
	}

	function update($item, $user,$qty, $total){
		$data['qty'] = $qty;
		$data['total'] = $total;
		$this->db->where(array("item" => $item,"user" => $user));
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	function delete($id){
		$this->db->where("{$this->field_id}", $id);
		$this->db->delete("{$this->table}"); 
		return $this->db->affected_rows();
	}

	public function login($email){
		$query = $this->db->select('*')
		->where('email', $email)
		->get('karyawan');
		$row = $query->row();

		return $row;
	}

	public function total_media(){
		$query = $this->db->select('*')
		->get('media');
		$num = $query->num_rows();

		return $num;
	}
}
