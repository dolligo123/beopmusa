<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->library('encryption');
		$this->load->library('common');
		$this->load->model('login_model');
		$this->load->model('manager_model');
	}

	// adm :: login
	public function index()
	{
		$ck_id = get_cookie("hanaca_id");
		$ck_id_save = get_cookie("hanaca_id_save");
		if ($ck_id) redirect("/adm/beopmusa");

		if ($ck_id_save) {
			$ck_id_save = $this->encryption->decrypt($ck_id_save);
			$data["hanaca_id_save"] = $ck_id_save;
			$data["hanaca_id_save_checked"] = "checked";
		} else {
			$data["hanaca_id_save"] = "";
			$data["hanaca_id_save_checked"] = "";
		}

		$this->load->view('header_login');
		$this->load->view('login', $data);
		$this->load->view('footer');
	}


	// adm :: loginchk
	public function loginchk()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('admid', '아이디', 'required');
		$this->form_validation->set_rules('admpw', '비밀번호', 'required');

		if ($this->form_validation->run() == TRUE) {
			// $_REQUEST
			$param['where']['user_id'] = $this->input->post('admid');
			$param['where']['pw'] = $this->input->post('admpw');

			// read
			$manager = $this->manager_model->read($param);

			if ($manager['recordsTotal'] > 0) {

				$admid = $this->input->post("admid");

				$encrypted_string = $this->encryption->encrypt($admid);
				set_cookie("hanaca_id", $encrypted_string, 43200, $_SERVER['HTTP_HOST']);

				if ($this->input->post("rememberId"))
					set_cookie("hanaca_id_save", $encrypted_string, 60 * 60 * 24 * 30, $_SERVER['HTTP_HOST']);
				else
					delete_cookie('hanaca_id_save', $_SERVER['HTTP_HOST']);

				redirect("/adm/beopmusa");
			} else {
				echo "<script> alert('아이디/패스워드를 확인해 주세요.'); history.back(); </script>";
			}
		} else {
			echo "<script> alert('아이디/패스워드를 확인해 주세요.'); history.back(); </script>";
		}
	}

	// adm :: logout
	public function logout()
	{
		delete_cookie('hanaca_id', $_SERVER['HTTP_HOST']);
		redirect("/adm");
	}

	// 관리자 로그인 유무 체크
	public function _islogin()
	{
		$ck_id = get_cookie("hanaca_id");
		if (!$ck_id) redirect("/adm");
	}
}
