<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_media extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->table = 'media';
		$this->field_id = 'id';
	}

	public function getAllDataGroup()
	{	
		$this->db->group_by("tanggal");
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function getAllData($tanggal)
	{	
		$query = $this->db->get_where($this->table, array('tanggal' => $tanggal));
		return $query->result_array();
	}

	function getOne($id)
	{	
		$query = $this->db->get_where("{$this->table}", array("id" => $id));
		return $query->row_array();
	}

	public function create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
	}

	function update($id, $data){
		$this->db->where(array("{$this->field_id}" => $id));
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
