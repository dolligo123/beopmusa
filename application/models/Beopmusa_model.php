<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
class Beopmusa_model extends CI_Model {
	private $table_name = 'beopmusa';
	private $pk = 'bp_id';
	
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
		
		// like
		if(isset($params['like_group'])):
			$like_group = $this->common->checkField($params['like_group'], $this->table_name);
			if(!empty($like_group)):
				$this->db->group_start()
						 ->or_like($params['like_group'])
						 ->group_end();
			endif;
		endif;		
				
		// total_count
		$total_count = $this->db->count_all_results("{$this->table_name} a", FALSE);

		// length
		if(isset($params['length']) && isset($params['start']) && $this->input->get("isexcel") != 'true')
			$this->db->limit($params['length'], $params['start']);

		// 정렬
		if(isset($params['orderby']) && isset($params['sort'])):
			$this->db->order_by($params['orderby'], $params['sort']);
			
			if($params['orderby'] == 'join_date'):
				$this->db->order_by('regist_date', $params['sort']);
			endif;
		endif;
		
		// select
        $this->db->select("
        	a.*, 
        	(select city_name from city b where b.city_code = a.city_code) as city_name,
        	(select district_name from district b where b.district_code = a.district_code) as district_name,
        	(select subway_name from subway b where b.subway_id = a.subway_line1) as subway_name1,
        	(select subway_name from subway b where b.subway_id = a.subway_line2) as subway_name2,
        	(select subway_name from subway b where b.subway_id = a.subway_line3) as subway_name3,
        	(select subway_name from subway b where b.subway_id = a.subway_line4) as subway_name4,
        	(select subway_name from subway b where b.subway_id = a.subway_line5) as subway_name5,
        	(6371*acos(cos(radians({$params['lat']}))*cos(radians(lat))*cos(radians(lng) - radians({$params['lng']}))+sin(radians({$params['lat']}))*sin(radians(lat)))) as dist
        ");
		
		// get
		$query = $this->db->get();
		
		// return
        $output = array(
            "total_count" => $total_count,
            "data" => $query->result_array() //,
            //"sql" => $this->db->last_query()
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
	
	// total_count
	public function total_count(){
		$query = $this->db->query("select count(1) as total_count from beopmusa where isopen = '1' ");
		return $query->row_array();
	}
}