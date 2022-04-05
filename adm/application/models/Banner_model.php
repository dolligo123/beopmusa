<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
class Banner_model extends CI_Model {
	private $table_name = 'banner';
	private $pk = 'ba_id';
	
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
		
		// draw   
		$draw = $this->input->get("draw");
		if (!$draw) $draw = 1;
		
		// isexcel
		if($this->input->get("isexcel") == 'true'):
			$this->db->select("
                title	as	`제목`	,
                color	as	`백칼라`	,
                ba_desc	as	`설명`	,
                banner_link	as	`링크`	,
                regist_date	as	`등록일자`	,
                update_date	as	`수정일자`	
            ");	
		endif;		
		
		// get
		$query = $this->db->get();
		
		// return
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_count,
            "recordsFiltered" => $total_count,
            "search" => $this->input->get("search"),
            "data" => $query->result_array(),
            "sql" => $this->db->last_query(),
            "param" => $params
        );
        
        // isexcel
        if($this->input->get("isexcel") == 'true')
        	return $output['data'];
        else
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
	
	// ispc update
	public function update_ispc($pk_id) {
		if($this->input->method() == "post"):
			$this->db->query("
				update {$this->table_name}
				set    ispc = if(ispc = '1', '0', '1')
				where  {$this->pk} = '$pk_id'
			");
		endif;
	}	
	
	// ismobile update
	public function update_ismobile($pk_id) {
		if($this->input->method() == "post"):
			$this->db->query("
				update {$this->table_name}
				set    ismobile = if(ismobile = '1', '0', '1')
				where  {$this->pk} = '$pk_id'
			");
		endif;
    }
    
    // 순서저장
	public function ord_post($arr_ba_id) {
        $i = 1;
        foreach ($arr_ba_id as $ba_id):
            $query = $this->db->query("
                update banner
                set    ord = $i
                where  ba_id = '$ba_id'
            ");
            $i++;

            echo "
            update banner
            set    ord = $i
            where  ba_id = '$ba_id'
        ";
        endforeach;
    }    
}