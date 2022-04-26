<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Parents.php';

class Counselq extends Parents
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("counselq_model");
    $this->load->model("manager_model");
    $this->load->library('common');
    date_default_timezone_set('Asia/Seoul');
  }

  public function index()
  {
    $this->load->view('header');
    $this->load->view('counselq/index');
    $this->load->view('footer');
  }

  // post
  public function post()
  {
    if ($this->input->method() == "post") :
      $param = $this->input->post(null, true);
      $param['regist_date'] = date("Y-m-d H:i:s");
      $param['update_date'] = date("Y-m-d H:i:s");
      $this->counselq_model->create($param);

      $this->common->alert('상담 접수가 완료 되었습니다.', "/");
    else :
      show_404();
    endif;
  }

  // list page json data
  public function json()
  {
    $page = $this->input->get("page");
    if (!$page) $page = 1;
    $param['length'] = 15;
    $param['start'] = ($page - 1) * $param['length'];

    $param['orderby'] = 'regist_date';
    $param['sort'] = 'desc';

    // get list
    $data = $this->counselq_model->read($param);

    $total_page = ceil($data['total_count'] / $param['length']);  // 전체 페이지 계산
    $data['paging'] = $this->common->paging(5, $page, $total_page);

    // output data json
    $this->output->set_content_type('text/json');
    $this->output->set_output(json_encode($data));
  }
}
