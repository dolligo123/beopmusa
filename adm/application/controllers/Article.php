<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Login.php';

class Article extends Login
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("article_model");
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
		$this->load->view('article/list');
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

		// get article list
		$data = $this->article_model->read($param);

		// output data json
		$this->output->set_content_type('text/json');
		$this->output->set_output(json_encode($data));
	}

	// edit
	public function edit($at_id = null)
	{
		// set return url
		$data['url'] = $this->input->get("url");
		if (!$data['url']) $data['url'] = "/adm/article/list";

		// read
		$param['where']['at_id'] = $at_id;
		$data['article'] = $this->article_model->read($param);
		$data['article'] = $data['article']['data'];
		if (empty($data['article'])) :
			$data['article'] = $this->common->setRowNull('article');
		else :
			$data['article'] = $data['article'][0];
		endif;

		$this->load->view('header', $data);
		$this->load->view('article/edit', $data);
		$this->load->view('footer');
	}

	// post
	public function post()
	{
		if ($this->input->method() == "post") :
			// $_REQUEST
			$param = $this->input->post(null, true);
			$at_id = "";

			if (empty($param['at_id'])) :
				$param['regist_date'] = date("Y-m-d H:i:s");
				$param['update_date'] = date("Y-m-d H:i:s");
				$at_id = $this->article_model->create($param);
			else :
				$param['fields'] = $param;
				$param['fields']['update_date'] = date("Y-m-d H:i:s");
				$param['where']['at_id'] = $param['at_id'];
				$this->article_model->update($param);
				$at_id = $this->input->post('at_id');
			endif;

			$url = $this->input->post('url');


			if (!$url) $url = "/adm/article";
			if (!$at_id) $url = "/adm/article";

			unset($param);
			$param['where']['at_id'] = $at_id;
			$article = $this->article_model->read($param);
			$article = $article['data'][0];


			// 대표사진 파일 업로드
			if (isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["tmp_name"] != '') :
				if ($_FILES["photo"]["tmp_name"]) :
					// 기존파일 있으면 삭제
					if ($article["photo"]) :
						$file = $_SERVER['DOCUMENT_ROOT'] . $article["photo"];
						if (file_exists($file)) unlink($file);
					endif;

					// 섬네일 사진 업로드
					$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/data/article/' . date("Ym");
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['encrypt_name'] = true;
					$this->upload->initialize($config);

					if (!is_dir($config['upload_path']))
						mkdir($config['upload_path'], 0777, true);

					// 업로드 실행
					if (!$this->upload->do_upload("photo")) :
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
					else :
						$data = array('upload_data' => $this->upload->data());

						$this->file_resize($data['upload_data']['full_path']);
						$photo = str_replace($_SERVER['DOCUMENT_ROOT'], "", $data['upload_data']['full_path']);

						$param2['fields']['photo'] = $photo;
						$param2['where']['at_id'] = $at_id;
						$this->article_model->update($param2);

					endif;

				endif;
			else :
				if ($this->input->post("photo_del") == "1") :
					// 파일 있으면 삭제
					if ($article["photo"]) :
						$file = $_SERVER['DOCUMENT_ROOT'] . $article["photo"];
						if (file_exists($file)) unlink($file);
					endif;

					$param2['fields']['photo'] = "";
					$param2['where']['at_id'] = $at_id;
					$this->article_model->update($param2);
				endif;
			endif;

			redirect($url);
		else :
			show_404();
		endif;
	}

	// update isopen
	public function isopen()
	{
		if ($this->input->method() == "post")
			$this->article_model->update_isopen($this->input->post('at_id'));
	}

	// delete
	public function delete()
	{
		if ($this->input->method() == "post") :
			$param = $this->input->post(null, true);
			$this->article_model->delete($param);
		endif;
	}


	// editor file upload
	public function eupload()
	{
		$host = $_SERVER["HTTP_HOST"];
		$filename = $this->upload_file('attach');
		$this->output->set_content_type('text/json');
		$val = '{"uploaded":1, "url":"//' . $host . '/data/article/editor/' . $filename . '"}';
		echo $val;
	}

	// file upload
	private function upload_file($field)
	{
		if ($_FILES[$field]["tmp_name"]) :
			$this->load->helper('string');
			$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'] . '/data/article/editor/';
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
