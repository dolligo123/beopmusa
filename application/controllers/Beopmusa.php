<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Parents.php';

class Beopmusa extends Parents
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("beopmusa_model");
		$this->load->model("city_model");
		$this->load->model("district_model");
		$this->load->model("subway_model");
		$this->load->helper('url');
		$this->load->library('user_agent');
		date_default_timezone_set('Asia/Seoul');
	}

	// remap
	public function _remap($method, $var)
	{
		if (is_numeric($method)) :
			$this->view($method);
		elseif ($method == "json") :
			$this->json();
		elseif ($method == "index" || $method == "beopmusa") :
			$this->index();
		else :
			if (!empty($var))
				$this->view($var[0]);
		endif;
	}

	// list page 
	public function index()
	{
		// view
		$this->load->view('header');
		$this->load->view('beopmusa/list');
		$this->load->view('footer');
	}

	// list page json data
	public function json()
	{

		$page = $this->input->get("page");
		if (!$page) $page = 1;
		$param['length'] = 30;
		$param['start'] = ($page - 1) * $param['length'];

		$param['lng'] = $this->input->get('lng');
		if (!$this->input->get('lng')) $param['lng'] = '126.976883';

		$param['lat'] = $this->input->get('lat');
		if (!$this->input->get('lat')) $param['lat'] = '37.572807';

		$param['orderby'] = $this->input->get('orderby');
		$param['sort'] = $this->input->get('sort');

		if ($this->input->get('isnight'))
			$param['where']['isnight'] = '1';

		if ($this->input->get('issunday'))
			$param['where']['issunday'] = '1';

		if ($this->input->get('city_code'))
			$param['where']['city_code'] = $this->input->get('city_code');

		if ($this->input->get('district_code'))
			$param['where']['district_code'] = $this->input->get('district_code');

		// 공개인 법무사만 노출
		$param['where']['isopen'] = '1';

		if ($this->input->get('keyword')) :
			$param['like_group']['title'] = $this->input->get('keyword');
			$param['like_group']['sub_name'] = $this->input->get('keyword');
			$param['like_group']['addr_new'] = $this->input->get('keyword');
			$param['like_group']['addr_old'] = $this->input->get('keyword');
			$param['like_group']['addr_sub'] = $this->input->get('keyword');
			$param['like_group']['subway1'] = $this->input->get('keyword');
			$param['like_group']['subway2'] = $this->input->get('keyword');
			$param['like_group']['subway3'] = $this->input->get('keyword');
			$param['like_group']['subway4'] = $this->input->get('keyword');
			$param['like_group']['subway5'] = $this->input->get('keyword');
			$param['like_group']['addr_desc'] = $this->input->get('keyword');
			$param['like_group']['tags'] = $this->input->get('keyword');
		endif;


		// get list
		$data = $this->beopmusa_model->read($param);


		$total_page = ceil($data['total_count'] / $param['length']);  // 전체 페이지 계산
		$data['paging'] = $this->common->paging(5, $page, $total_page);

		// output data json
		$this->output->set_content_type('text/json');
		$this->output->set_output(json_encode($data));
	}

	// view
	public function view($id)
	{
		// get row
		$param['lng'] = $this->input->get('lng');
		if (!$this->input->get('lng')) $param['lng'] = '126.976883';

		$param['lat'] = $this->input->get('lat');
		if (!$this->input->get('lat')) $param['lat'] = '37.572807';


		if (is_numeric($id)) :
			$param['where']['bp_id'] = $id;
		else :
			$param['where']['bp_uid'] = $id;
		endif;

		$data = $this->beopmusa_model->read($param);

		if ($data['total_count'] == 0) show_404();

		if (is_numeric($id)) :
			$this->load->view('header');
			$this->load->view('beopmusa/view', $data);
			$this->load->view('footer', $data);
		else :
			$this->load->view('header_p', $data);
			$this->load->view('beopmusa/view_p', $data);
			$this->load->view('footer_p', $data);
		endif;
	}
}
