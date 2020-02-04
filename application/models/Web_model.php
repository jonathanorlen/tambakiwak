<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_model extends CI_Model {

	public function getFirst()
	{
		$this->db->order_by('tanggal','desc');
		$this->db->limit(1,0);
		$query = $this->db->get('media');
		return $query->row_array();
	}

	public function getHead($tanggal)
	{	
		$this->db->order_by('tanggal','desc');
		$query = $this->db->get_where('media',array('tanggal' => $tanggal));
		return $query->result_array();
	}

	public function getAll($tanggal)
	{	
		$this->db->order_by('tanggal','desc');
		$query = $this->db->get_where('media',100,2);
		return $query->result_array();
	}
}
