<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Parents.php';

class Insure extends Parents {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('common');
	}

	public function index() {
		$this->load->view('header');
        $this->load->view('insure/index');
        $this->load->view('footer');
	}
}