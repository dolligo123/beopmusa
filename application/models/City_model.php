<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
class City_model extends CI_Model {
	private $table_name = 'city';
	private $pk = 'ci_id';
	
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
}