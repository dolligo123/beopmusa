<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Beopmusa_model extends CI_Model
{
	private $table_name = 'beopmusa';
	private $pk = 'bp_id';

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

		// draw   
		$draw = $this->input->get("draw");
		if (!$draw) $draw = 1;

		// isexcel
		if ($this->input->get("isexcel") == 'true') :
			$this->db->select("
				bp_id	as	`고유번호`	,
				title	as	`법무사명`	,
				sub_name	as	`지점명`	,
				if(isnight = '1', 'O', 'X')	as	`야간진료여부`	,
				if(issunday = '1', 'O', 'X') as	`일요진료`	,
				zipcode	as	`우편번호`	,
				addr_new	as	`도로명주소`	,
				addr_old	as	`지번주소`	,
				addr_sub	as	`주소서브`	,
				homepage	as	`홈페이지`	,
				owner	as	`원장이름`	,
				hp_desc	as	`법무사설명`	,
				tel	as	`전화번호`	,
				subway1	as	`지하철명1`	,
				subway_line1	as	`지하철라인1`	,
				subway2	as	`지하철명2`	,
				subway_line2	as	`지하철라인2`	,
				subway3	as	`지하철명3`	,
				subway_line3	as	`지하철라인3`	,
				subway4	as	`지하철명4`	,
				subway_line4	as	`지하철라인4`	,
				subway5	as	`지하철명5`	,
				subway_line5	as	`지하철라인5`	,
				addr_desc	as	`오시는길설명`	,
				mon_open	as	`월요일오픈시간`	,
				mon_close	as	`월요일종료시간`	,
				tue_open	as	`화요일오픈시간`	,
				tue_close	as	`화요일종료시간`	,
				wed_open	as	`수요일오픈시간`	,
				wed_close	as	`수요일종료시간`	,
				thu_open	as	`목요일오픈시간`	,
				thu_close	as	`목요일종료시간`	,
				fri_open	as	`금요일오픈시간`	,
				fri_close	as	`금요일종료시간`	,
				sat_open	as	`토요일오픈시간`	,
				sat_close	as	`토요일종료시간`	,
				sun_open	as	`일요일오픈시간`	,
				sun_close	as	`일요일종료시간`	,
				lunch_desc	as	`점심시간설명`	,
				if(isopen = '1', 'O', 'X')	as	`공개여부`	,
				regist_date	as	`등록일자`	,
				update_date	as	`수정일자`	,
				bp_uid	as	`법무사개별아이디`	,
				b_number	as	`사업자번호`	,
				tags	as	`태그`	
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
			"sql" => $this->db->last_query()
		);

		// isexcel
		if ($this->input->get("isexcel") == 'true')
			return $output['data'];
		else
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

	// isopen update
	public function update_isopen($pk_id)
	{
		if ($this->input->method() == "post") :
			$this->db->query("
				update {$this->table_name}
				set    isopen = if(isopen = '1', '0', '1')
				where  {$this->pk} = '$pk_id'
			");
		endif;
	}

	// check bp_uid
	public function get_row_bp_uid($bp_uid, $bp_id)
	{
		$query = $this->db->query("
			select a.*
			from   beopmusa a
            where  bp_uid = " . $this->db->escape($bp_uid) . "
            and    bp_id <> " . $this->db->escape($bp_id) . "
		");
		return $query->row_array();
	}
}
