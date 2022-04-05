<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Parents.php';

class District extends Parents {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("district_model");
		$this->load->library('common');
	}

	// adm :: login
	public function index() {
		$param['where']['isopen'] = '1';
		$param['where']['city_code'] = $this->input->get('city_code');
		$data = $this->district_model->read($param);

		// output data json
		$this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($data));
	}

}