<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Parents.php';

class Article extends Parents
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("article_model");
		$this->load->library('session');
		date_default_timezone_set('Asia/Seoul');
	}

	// remap
	public function _remap($method)
	{
		if (is_numeric($method)) :
			$this->view($method);
		else :
			$this->index();
		endif;
	}

	// list page 
	public function index()
	{

		$page = $this->input->get("page");
		if (!$page) $page = 1;
		$param['length'] = 9;
		$param['start'] = ($page - 1) * $param['length'];
		$param['orderby'] = 'regist_date';
		$param['sort'] = 'desc';

		// 공개만 노출
		$param['where']['isopen'] = '1';

		$data = $this->article_model->read($param);
		$total_page = ceil($data['total_count'] / $param['length']);  // 전체 페이지 계산
		$data['paging'] = $this->common->paging(5, $page, $total_page);

		// view
		$this->load->view('header');
		$this->load->view('article/list', $data);
		$this->load->view('footer');
	}

	// view
	public function view($id)
	{
		$param['where']['at_id'] = $id;
		$data = $this->article_model->read($param);
		if ($data['total_count'] == 0) show_404();


		$ss_name = "ss_article_" . $id;
		if ($this->session->userdata($ss_name) != $ss_name) {
			$this->session->set_userdata($ss_name, $ss_name);
			$uparam['fields']['read_cnt'] = $data['data'][0]['read_cnt'] + 1;
			$uparam['where']['at_id'] = $id;
			$this->article_model->update($uparam);
		}

		$this->load->view('header');
		$this->load->view('article/view', $data);
		$this->load->view('footer');
	}
}
