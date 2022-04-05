<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends CI_Controller {
	
	public $dinfo;
	
	public function __construct() {
		parent::__construct();
		$this->load->library('common');
		$this->load->model('beopmusa_model');
		$this->load->model('manager_model');
		$this->load->model('city_model');
		
		// total_count
		$data = $this->beopmusa_model->total_count();
		$this->dinfo = $data;
		
		// manager
		$param['where']['ma_id'] = '1';
		$manager = $this->manager_model->read($param);
		$this->dinfo['manager'] = $manager['data'][0];		
		
		// city
		unset($param);
		$param['where']['isopen'] = '1';
		$city = $this->city_model->read($param);
		$this->dinfo['city'] = $city['data'];		
	}
	
}