<?php 

class Artikel_model extends CI_Model {

	function __construct() {
		parent::__construct();
		
	}
	
	function get_list_artikel() {
		$this->db->order_by('tbl.ID_ARTIKEL', 'ASC');
		
		$this->db->select('tbl.*');
		
		$id_user = trim($this->session->userdata('id_user'));
		
		if($id_user != 1)
			$this->db->where('tbl.ID_USER', $id_user);
			
		$this->db->select('usr.USERNAME');
		$this->db->join('user usr', 'usr.ID_USER = tbl.ID_USER', 'left');
		
		$query = $this->db->get('artikel tbl');
		
		if($query->num_rows() > 0) {
			return $query;
			$query->free_result();
		}else
		{
			return $query;
		}	
	}
	
	function get_row_artikel($id='') {
		$data = array();
		
		$this->db->where('ID_ARTIKEL', $id);
		
		$query = $this->db->get('artikel tbl');
		
		if($query->num_rows() == 1) {
			$data = $query->row_array();
			$query->free_result();
		}else
		{
			$data = $query->free_result();
		}	
		
		return $data;
	}
	
	function get_user($where='') {
		if($where)
		$this->db->or_where($where);
		
		$this->db->select('*');
		
		$query = $this->db->get('user');
		
		if($query->num_rows() > 0) {
			return $query;
			$query->free_result();
		}else {
			return $query;
		}
	}
}