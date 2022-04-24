<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class counselq_model extends CI_Model
{
	private $table_name = 'counselq';
	private $pk = 'id';

	public function __construct()
	{
		$this->load->database();
		$this->load->library('common');
		date_default_timezone_set('Asia/Seoul');
	}

	// read
	public function read($params)
	{
		// where
		if (isset($params['where'])) :
			$where = $this->common->checkField($params['where'], $this->table_name);
			if (!empty($where)) $this->db->where($where);
		endif;

		// like
		if (isset($params['like'])) :
			$like = $this->common->checkField($params['like'], $this->table_name);
			if (!empty($like)) $this->db->like($like);
		endif;

		// total_count
		$total_count = $this->db->count_all_results("{$this->table_name} a", FALSE);

		// length
		if (isset($params['length']) && isset($params['start']) && $this->input->get("isexcel") != 'true')
			$this->db->limit($params['length'], $params['start']);

		// 정렬
		if (isset($params['orderby']) && isset($params['sort'])) :
			$this->db->order_by($params['orderby'], $params['sort']);
		endif;

		// select
		$this->db->select("CASE WHEN CHAR_LENGTH(name) > 2 THEN 
													CONCAT(
															SUBSTRING(name, 1, 1)
															,LPAD('*', CHAR_LENGTH(name) - 2, '*')
															,SUBSTRING(NAME, CHAR_LENGTH(name), CHAR_LENGTH(name))
													)
													ELSE CONCAT(
															SUBSTRING(name, 1, 1)
															,LPAD('*', CHAR_LENGTH(name) - 1, '*')
													)
											END AS name, title, fields, desc, 
											(select city_name from city b where b.city_code = a.city_code) city, 
											(select district_name from district b where b.district_code = a.district_code) district, 
											regist_date");

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
	public function create($param)
	{
		$param = $this->common->checkField($param, $this->table_name);

		$this->db->insert($this->table_name, $param);

		return $this->db->insert_id();
	}

	// update
	public function update($params)
	{
		if (empty($params['where'])) show_404();

		// where
		$where = $this->common->checkField($params['where'], $this->table_name);
		if (!empty($where)) $this->db->where($where);

		// update
		$fields = $this->common->checkField($params['fields'], $this->table_name);
		if (!empty($fields)) $this->db->update($this->table_name, $fields);
	}

	// delete
	public function delete($where)
	{
		if (isset($where[$this->pk])) :
			$this->db->where($where);
			$this->db->delete($this->table_name);
			return true;
		else :
			show_404();
			return false;
		endif;
	}
}
