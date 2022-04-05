<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Login.php';

class Banner extends Login
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model("banner_model");
		$this->load->helper('url');
		$this->load->library('user_agent');
		date_default_timezone_set('Asia/Seoul');
		ini_set('memory_limit', '1024M');

		$this->_islogin();
	}

	// list page 
	public function index()
	{
		// view
		$this->load->view('header');
		$this->load->view('banner/list');
		$this->load->view('footer');
	}

	// list page json data
	public function json()
	{
		// $_REQUEST
		$param['like']['title'] = $this->input->get('title');
		$param['like']['ispc'] = $this->input->get('ispc');
		$param['like']['ismobile'] = $this->input->get('ismobile');

		// start, length
		$param['start'] = $this->input->get('start');
		$param['length'] = $this->input->get('length');
		if (!$this->input->get('start')) $param['start'] = 0;
		if (!$this->input->get('length')) $param['length'] = 15;

		// order_by field setting
		$param['orderby'] = $this->input->get('orderby');
		if (empty($param['orderby'])) $param['orderby'] = 'ord';
		$param['sort'] = 'asc';

		// get banner list
		$data = $this->banner_model->read($param);

		// output data json
		$this->output->set_content_type('text/json');
		$this->output->set_output(json_encode($data));
	}

	// edit
	public function edit($ba_id = null)
	{
		// set return url
		$data['url'] = $this->input->get("url");
		if (!$data['url']) $data['url'] = "/adm/banner/list";

		// read
		$param['where']['ba_id'] = $ba_id;
		$data['banner'] = $this->banner_model->read($param);
		$data['banner'] = $data['banner']['data'];
		if (empty($data['banner'])) :
			$data['banner'] = $this->common->setRowNull('banner');
		else :
			$data['banner'] = $data['banner'][0];
		endif;

		$this->load->view('header', $data);
		$this->load->view('banner/edit', $data);
		$this->load->view('footer');
	}

	// post
	public function post()
	{
		if ($this->input->method() == "post") :
			// $_REQUEST
			$param = $this->input->post(null, true);
			$ba_id = "";

			if (empty($param['ba_id'])) :
				$param['regist_date'] = date("Y-m-d H:i:s");
				$param['update_date'] = date("Y-m-d H:i:s");
				$ba_id = $this->banner_model->create($param);
			else :
				$param['fields'] = $param;
				$param['fields']['update_date'] = date("Y-m-d H:i:s");
				$param['where']['ba_id'] = $param['ba_id'];
				$this->banner_model->update($param);
				$ba_id = $this->input->post('ba_id');
			endif;

			$url = $this->input->post('url');


			if (!$url) $url = "/adm/banner";
			if (!$ba_id) $url = "/adm/banner";

			// 배너
			$param1['where']['ba_id'] = $ba_id;
			$banner = $this->banner_model->read($param1);
			$banner = $banner['data'][0];

			// 배너 사진 업로드
			for ($i = 1; $i <= 3; $i++) :
				if (isset($_FILES["banner_file$i"]["tmp_name"]) && $_FILES["banner_file$i"]["tmp_name"] != '') :
					if ($_FILES["banner_file$i"]["tmp_name"]) :
						// 기존파일 있으면 삭제
						if ($banner["banner_file$i"]) :
							$file = $_SERVER['DOCUMENT_ROOT'] . $banner["banner_file$i"];
							if (file_exists($file)) unlink($file);
						endif;

						// 섬네일 사진 업로드
						$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/data/banner/' . date("Ym");
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['encrypt_name'] = true;
						$this->upload->initialize($config);

						if (!is_dir($config['upload_path']))
							mkdir($config['upload_path'], 0777, true);

						// 업로드 실행
						if (!$this->upload->do_upload("banner_file$i")) :
							$error = array('error' => $this->upload->display_errors());
							print_r($error);
						else :
							$data = array('upload_data' => $this->upload->data());

							//$this->file_resize($data['upload_data']['full_path']);
							$banner_file = str_replace($_SERVER['DOCUMENT_ROOT'], "", $data['upload_data']['full_path']);

							$param2['fields']["banner_file$i"] = $banner_file;
							$param2['where']['ba_id'] = $ba_id;
							$this->banner_model->update($param2);
						endif;
					endif;
				else :
					if ($this->input->post("banner_file_del$i") == "1") :
						// 파일 있으면 삭제
						if ($banner["banner_file$i"]) :
							$file = $_SERVER['DOCUMENT_ROOT'] . $banner["banner_file$i"];
							if (file_exists($file)) unlink($file);
						endif;

						$param2['fields']["banner_file$i"] = '';
						$param2['where']['ba_id'] = $ba_id;
						$this->banner_model->update($param2);
					endif;
				endif;
			endfor;
			redirect($url);
		else :
			show_404();
		endif;
	}

	// file resize()
	private function file_resize($full_path)
	{
		$config['source_image'] = $full_path;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 800;
		$config['height'] = 700;

		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

	// update ispc
	public function ispc()
	{
		if ($this->input->method() == "post")
			$this->banner_model->update_ispc($this->input->post('ba_id'));
	}

	// update ismobile
	public function ismobile()
	{
		if ($this->input->method() == "post")
			$this->banner_model->update_ismobile($this->input->post('ba_id'));
	}

	// delete
	public function delete()
	{
		if ($this->input->method() == "post") :
			$param = $this->input->post(null, true);
			$this->banner_model->delete($param);
		endif;
	}

	// 순서저장
	public function ord_post()
	{
		$ba_ids = $this->input->post("ba_ids");
		$arr_ba_id = explode(",", $ba_ids);
		$this->banner_model->ord_post($arr_ba_id);
	}
}
