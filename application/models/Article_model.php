<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
class Article_model extends CI_Model {
	private $table_name = 'article';
	private $pk = 'at_id';
	
	public function __construct() {
        $this->load->database();
        $this->load->library('common');
        date_default_timezone_set('Asia/Seoul');
	}
		
	// read
	public function read($params) {
		// where
		if(isset($params['where'])):
			$where = $this->common->checkField($params['where'], $this->table_name);
			if(!empty($where)) $this->db->where($where);
		endif;

		// like
		if(isset($params['like'])):
			$like = $this->common->checkField($params['like'], $this->table_name);
			if(!empty($like)) $this->db->like($like);
		endif;
		
		// total_count
		$total_count = $this->db->count_all_results("{$this->table_name} a", FALSE);

		// length
		if(isset($params['length']) && isset($params['start']) && $this->input->get("isexcel") != 'true')
			$this->db->limit($params['length'], $params['start']);

		// 정렬
		if(isset($params['orderby']) && isset($params['sort'])):
			$this->db->order_by($params['orderby'], $params['sort']);
		endif;
		
		// select
		if(!empty($params['where'][$this->pk])):
			$this->db->select("
				a.*,
				(SELECT {$this->pk} FROM {$this->table_name} b WHERE isopen = '1' and {$this->pk} < '{$params['where'][$this->pk]}' ORDER BY {$this->pk} desc LIMIT 1) AS prev_id,
	            (SELECT {$this->pk} FROM {$this->table_name} b WHERE isopen = '1' and {$this->pk} > '{$params['where'][$this->pk]}' ORDER BY {$this->pk} asc limit 1) AS next_id		
			");
		endif;
		
		// get
		$query = $this->db->get();
		
		// return
        $output = array(
            "total_count" => $total_count,
            "data" => $query->result_array()
        );

        return $output;
        	
    }

	// create
	public function create($param){
		$param = $this->common->checkField($param, $this->table_name);			
		
		$this->db->insert($this->table_name, $param);
		
		return $this->db->insert_id();
	}

	// update
	public function update($params){
		if(empty($params['where'])) show_404();		
		
		// where
		$where = $this->common->checkField($params['where'], $this->table_name);
		if(!empty($where)) $this->db->where($where);

		// update
		$fields = $this->common->checkField($params['fields'], $this->table_name);
		if(!empty($fields)) $this->db->update($this->table_name, $fields);
    }
    
	// delete
	public function delete($where){
		if(isset($where[$this->pk])):
			$this->db->where($where);
			$this->db->delete($this->table_name);
			return true;
		else:
			show_404();
			return false;
		endif;
	}	    
		
}