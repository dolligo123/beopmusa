<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Login_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_row($auth_data) {
		$query = $this->db->query("
			select user_id, pw
			from   manager 
			where  user_id = ".$this->db->escape($auth_data['userid'])."
			and    pw = password(".$this->db->escape($auth_data['pw']).")			
		");
		
		return $query->row_array();
	}
	
	
}