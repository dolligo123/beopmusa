<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Parents.php';

class Task extends Parents
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('common');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('task/index');
		$this->load->view('footer');
	}
}
