<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Login.php';

class Manager extends Login
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("manager_model");
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
		$this->load->view('manager/list');
		$this->load->view('footer');
	}

	// list page json data
	public function json()
	{
		// $_REQUEST
		$param['like']['user_name'] = $this->input->get('user_name');
		$param['like']['isopen'] = $this->input->get('isopen');

		// start, length
		$param['start'] = $this->input->get('start');
		$param['length'] = $this->input->get('length');
		if (!$this->input->get('start')) $param['start'] = 0;
		if (!$this->input->get('length')) $param['length'] = 15;

		// order_by field setting
		$param['orderby'] = $this->input->get('orderby');
		if (empty($param['orderby'])) $param['orderby'] = 'regist_date';

		// get manager list
		$data = $this->manager_model->read($param);

		// output data json
		$this->output->set_content_type('text/json');
		$this->output->set_output(json_encode($data));
	}

	// edit
	public function edit($ma_id = null)
	{
		// set return url
		$data['url'] = $this->input->get("url");
		if (!$data['url']) $data['url'] = "/adm/manager/list";

		// read
		$param['where']['ma_id'] = $ma_id;
		$data['manager'] = $this->manager_model->read($param);
		$data['manager'] = $data['manager']['data'];
		if (empty($data['manager'])) :
			$data['manager'] = $this->common->setRowNull('manager');
		else :
			$data['manager'] = $data['manager'][0];
		endif;

		$this->load->view('header', $data);
		$this->load->view('manager/edit', $data);
		$this->load->view('footer');
	}

	// post
	public function post()
	{
		if ($this->input->method() == "post") :
			// $_REQUEST
			$param = $this->input->post(null, true);

			if (empty($param['ma_id'])) :
				$param['regist_date'] = date("Y-m-d H:i:s");
				$param['update_date'] = date("Y-m-d H:i:s");				
				$this->manager_model->create($param);
			else :
				if (empty($param['pw'])) unset($param['pw']);
				$param['fields'] = $param;
				$param['fields']['update_date'] = date("Y-m-d H:i:s");
				$param['where']['ma_id'] = $param['ma_id'];
				$this->manager_model->update($param);
			endif;

			$url = $this->input->post('url');
			$ma_id = $this->input->post('ma_id');

			if (!$url) $url = "/adm/manager";
			if (!$ma_id) $url = "/adm/manager";

			redirect($url);
		else :
			show_404();
		endif;
	}

	// update isopen
	public function isopen()
	{
		if ($this->input->method() == "post")
			$this->manager_model->update_isopen($this->input->post('ma_id'));
	}

	// delete
	public function delete()
	{
		if ($this->input->method() == "post") :
			$param = $this->input->post(null, true);
			$this->manager_model->delete($param);
		endif;
	}
}
