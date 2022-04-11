<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Login.php';

class Counselq extends Login
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("joinq_model");
		$this->load->helper('url');
		$this->load->library('user_agent');
		date_default_timezone_set('Asia/Seoul');
		 
		$this->_islogin();
	}

	// list page 
	public function index()
	{
		// view
		$this->load->view('header');
		$this->load->view('joinq/list');
		$this->load->view('footer');
	}

	// list page json data
	public function json()
	{
		// $_REQUEST
		$param['like']['hp_name'] = $this->input->get('hp_name');
		$param['like']['isopen'] = $this->input->get('isopen');
		$param['like']['jq_name'] = $this->input->get('jq_name');
		$param['like']['tel'] = $this->input->get('tel');

		// start, length
		$param['start'] = $this->input->get('start');
		$param['length'] = $this->input->get('length');
		if (!$this->input->get('start')) $param['start'] = 0;
		if (!$this->input->get('length')) $param['length'] = 15;

		// order_by field setting
		$param['orderby'] = $this->input->get('orderby');
		if (empty($param['orderby'])) $param['orderby'] = 'regist_date';

		// sort
		$param['sort'] = 'desc';

		// get joinq list
		$data = $this->joinq_model->read($param);

		// output data json
		$this->output->set_content_type('text/json');
		$this->output->set_output(json_encode($data));
	}

	// edit
	public function edit($jq_id = null)
	{
		// set return url
		$data['url'] = $this->input->get("url");
		if (!$data['url']) $data['url'] = "/adm/joinq/list";

		// read
		$param['where']['jq_id'] = $jq_id;
		$data['joinq'] = $this->joinq_model->read($param);
		$data['joinq'] = $data['joinq']['data'];
		if (empty($data['joinq'])) :
			$data['joinq'] = $this->common->setRowNull('joinq');
		else :
			$data['joinq'] = $data['joinq'][0];
		endif;

		$this->load->view('header', $data);
		$this->load->view('joinq/edit', $data);
		$this->load->view('footer');
	}

	// post
	public function post()
	{
		if ($this->input->method() == "post") :
			// $_REQUEST
			$param = $this->input->post(null, true);
			$jq_id = "";

			if (empty($param['jq_id'])) :
				$param['regist_date'] = date("Y-m-d H:i:s");
				$param['update_date'] = date("Y-m-d H:i:s");
				$jq_id = $this->joinq_model->create($param);
			else :
				$param['fields'] = $param;
				$param['fields']['update_date'] = date("Y-m-d H:i:s");
				$param['where']['jq_id'] = $param['jq_id'];
				$this->joinq_model->update($param);
			endif;

			$url = $this->input->post('url');
			$jq_id = $this->input->post('jq_id');

			if (!$url) $url = "/adm/joinq";
			if (!$jq_id) $url = "/adm/joinq";

			redirect($url);
		else :
			show_404();
		endif;
	}

	// update isopen
	public function isopen()
	{
		if ($this->input->method() == "post")
			$this->joinq_model->update_isopen($this->input->post('jq_id'));
	}

	// delete
	public function delete()
	{
		if ($this->input->method() == "post") :
			$param = $this->input->post(null, true);
			$this->joinq_model->delete($param);
		endif;
	}
}
