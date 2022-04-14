<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Login.php';

class Counselq extends Login
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("counselq_model");
    $this->load->helper('url');
    $this->load->library('user_agent');
    date_default_timezone_set('Asia/Seoul');
    
    $this->_islogin();
  }

  // list page 
  public function index()
  {
    // view
    $this->load->view('header');
    $this->load->view('counselq/list');
    $this->load->view('footer');
  }

  // list page json data
  public function json()
  {
    // $_REQUEST
    $param['like']['name'] = $this->input->get('name');
    $param['like']['isopen'] = $this->input->get('isopen');
    $param['like']['tel'] = $this->input->get('tel');
    $param['like']['city'] = $this->input->get('city');
    $param['like']['district'] = $this->input->get('district');
    $param['like']['fields'] = $this->input->get('fields');
    $param['like']['desc'] = $this->input->get('desc');

    // start, length
    $param['start'] = $this->input->get('start');
    $param['length'] = $this->input->get('length');
    if (!$this->input->get('start')) $param['start'] = 0;
    if (!$this->input->get('length')) $param['length'] = 15;

    // order_by field setting
    $param['orderby'] = $this->input->get('orderby');
    if (empty($param['orderby'])) $param['orderby'] = 'regist_date';

    // sort
    $param['sort'] = 'desc';

    // get counselq list
    $data = $this->counselq_model->read($param);

    // output data json
    $this->output->set_content_type('text/json');
    $this->output->set_output(json_encode($data));
  }

  // edit
  public function edit($id = null)
  {
    // set return url
    $data['url'] = $this->input->get("url");
    if (!$data['url']) $data['url'] = "/adm/counselq/list";

    // read
    $param['where']['id'] = $id;
    $data['counselq'] = $this->counselq_model->read($param);
    $data['counselq'] = $data['counselq']['data'];
    if (empty($data['counselq'])) :
      $data['counselq'] = $this->common->setRowNull('counselq');
    else :
      $data['counselq'] = $data['counselq'][0];
    endif;

    $this->load->view('header', $data);
    $this->load->view('counselq/edit', $data);
    $this->load->view('footer');
  }

  // post
  public function post()
  {
    if ($this->input->method() == "post") :
      // $_REQUEST
      $param = $this->input->post(null, true);
      $id = "";

      if (empty($param['id'])) :
        $param['regist_date'] = date("Y-m-d H:i:s");
        $param['update_date'] = date("Y-m-d H:i:s");
        $id = $this->counselq_model->create($param);
      else :
        $param['fields'] = $param;
        $param['fields']['update_date'] = date("Y-m-d H:i:s");
        $param['where']['id'] = $param['id'];
        $this->counselq_model->update($param);
      endif;

      $url = $this->input->post('url');
      $id = $this->input->post('id');

      if (!$url) $url = "/adm/counselq";
      if (!$id) $url = "/adm/counselq";

      redirect($url);
    else :
      show_404();
    endif;
  }

  // update isopen
  public function isopen()
  {
    if ($this->input->method() == "post")
      $this->counselq_model->update_isopen($this->input->post('id'));
  }

  // delete
  public function delete()
  {
    if ($this->input->method() == "post") :
      $param = $this->input->post(null, true);
      $this->counselq_model->delete($param);
    endif;
  }
}
