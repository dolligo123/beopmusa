<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Parents.php';

class Main extends Parents
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("notice_model");
    $this->load->model("article_model");
    $this->load->model("banner_model");
    $this->load->model("counselq_model");

    $this->load->helper('url');
    $this->load->library('user_agent');
    date_default_timezone_set('Asia/Seoul');
  }

  public function index()
  {
    // notice
    $param['where']['isopen'] = '1';
    $param['orderby'] = 'regist_date';
    $param['sort'] = 'desc';
    $param['start'] = 0;
    $param['length'] = 3;
    $data['notice'] = $this->notice_model->read($param);

    // article
    $data['article'] = $this->article_model->read($param);

    // banner
    //if($this->agent->is_mobile()):
    unset($param);
    $param['where']['ismobile'] = '1';
    $param['orderby'] = 'ord';
    $param['sort'] = 'asc';
    $param['start'] = 0;
    $param['length'] = 2;
    $data['banner_mobile'] = $this->banner_model->read($param);
    //else:
    unset($param);
    $param['where']['ispc'] = '1';
    $param['orderby'] = 'ord';
    $param['sort'] = 'asc';
    $param['start'] = 0;
    $param['length'] = 3;
    $data['banner_pc'] = $this->banner_model->read($param);
    //endif;

    // counselq
    unset($param);
    $param['orderby'] = 'regist_date';
    $param['sort'] = 'desc';

    // get list
    $data['counselq'] = $this->counselq_model->read($param);
    $data['counselq'] = $data['counselq']['data'];

    // view
    $this->load->view('header');
    $this->load->view('main/index', $data);
    $this->load->view('footer');
  }
}
