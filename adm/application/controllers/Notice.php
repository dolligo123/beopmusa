<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Login.php';

class Notice extends Login
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("notice_model");
		$this->load->helper('url');
		$this->load->library('user_agent');
		$this->load->library('upload');
		$this->load->library('image_lib');
		date_default_timezone_set('Asia/Seoul');

		$this->_islogin();
	}

	// list page 
	public function index()
	{
		// view
		$this->load->view('header');
		$this->load->view('notice/list');
		$this->load->view('footer');
	}

	// list page json data
	public function json()
	{
		// $_REQUEST
		$param['like']['title'] = $this->input->get('title');
		$param['like']['isopen'] = $this->input->get('isopen');

		// start, length
		$param['start'] = $this->input->get('start');
		$param['length'] = $this->input->get('length');
		if (!$this->input->get('start')) $param['start'] = 0;
		if (!$this->input->get('length')) $param['length'] = 15;

		// order_by field setting
		$param['orderby'] = $this->input->get('orderby');
		if (empty($param['orderby'])) $param['orderby'] = 'regist_date';
		$param['sort'] = 'desc';

		// get notice list
		$data = $this->notice_model->read($param);

		// output data json
		$this->output->set_content_type('text/json');
		$this->output->set_output(json_encode($data));
	}

	// edit
	public function edit($nt_id = null)
	{
		// set return url
		$data['url'] = $this->input->get("url");
		if (!$data['url']) $data['url'] = "/adm/notice/list";

		// read
		$param['where']['nt_id'] = $nt_id;
		$data['notice'] = $this->notice_model->read($param);
		$data['notice'] = $data['notice']['data'];
		if (empty($data['notice'])) :
			$data['notice'] = $this->common->setRowNull('notice');
		else :
			$data['notice'] = $data['notice'][0];
		endif;

		$this->load->view('header', $data);
		$this->load->view('notice/edit', $data);
		$this->load->view('footer');
	}

	// post
	public function post()
	{
		if ($this->input->method() == "post") :
			// $_REQUEST
			$param = $this->input->post(null, true);
			$nt_id = "";

			if (empty($param['nt_id'])) :
				$param['regist_date'] = date("Y-m-d H:i:s");
				$param['update_date'] = date("Y-m-d H:i:s");
				$nt_id = $this->notice_model->create($param);
			else :
				$param['fields'] = $param;
				$param['fields']['update_date'] = date("Y-m-d H:i:s");
				$param['where']['nt_id'] = $param['nt_id'];
				$this->notice_model->update($param);
				$nt_id = $this->input->post('nt_id');
			endif;

			$url = $this->input->post('url');

			if (!$url) $url = "/adm/notice";
			if (!$nt_id) $url = "/adm/notice";

			redirect($url);
		else :
			show_404();
		endif;
	}

	// update isopen
	public function isopen()
	{
		if ($this->input->method() == "post")
			$this->notice_model->update_isopen($this->input->post('nt_id'));
	}

	// delete
	public function delete()
	{
		if ($this->input->method() == "post") :
			$param = $this->input->post(null, true);
			$this->notice_model->delete($param);
		endif;
	}


	// editor file upload
	public function eupload()
	{
		$host = $_SERVER["HTTP_HOST"];
		$filename = $this->upload_file('attach');
		$this->output->set_content_type('text/json');
		$val = '{"uploaded":1, "url":"//' . $host . '/data/notice/editor/' . $filename . '"}';
		echo $val;
	}

	// file upload
	private function upload_file($field)
	{
		if ($_FILES[$field]["tmp_name"]) :
			$this->load->helper('string');
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'] . '/data/notice/editor/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['file_name']        = random_string('unique');

			if (!is_dir($config['upload_path'])) :
				mkdir($config['upload_path'], 0777, true);
			endif;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload($field)) :
				$error = array('error' => $this->upload->display_errors());
				return $error;
			else :
				$data = $this->upload->data();
				$this->file_resize($data['full_path']);
				$photo_name = $data['file_name'];
				return $photo_name;
			endif;
		endif;
	}

	// file resize()
	private function file_resize($full_path)
	{
		$config['source_image'] = $full_path;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 800;
		$config['height'] = 800;

		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
}
