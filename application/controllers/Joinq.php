<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Parents.php';

class Joinq extends Parents
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("joinq_model");
    $this->load->model("manager_model");
    $this->load->library('common');
    $this->load->library('email');
    date_default_timezone_set('Asia/Seoul');
  }

  public function index()
  {
    $this->load->view('header');
    $this->load->view('joinq/index');
    $this->load->view('footer');
  }

  // post
  public function post()
  {
    if ($this->input->method() == "post") :
      // $_REQUEST
      $param = $this->input->post(null, true);

      $param['regist_date'] = date("Y-m-d H:i:s");
      $param['update_date'] = date("Y-m-d H:i:s");
      $jq_id = $this->joinq_model->create($param);

      // send sms, email
      $this->sendsms($jq_id);

      $this->common->alert('가입문의 완료 되었습니다.', "/");
    else :
      show_404();
    endif;
  }


  // 문자 보내기
  private function sendsms($jq_id)
  {

    // joinq
    $param['where']['jq_id'] = $jq_id;
    $joinq = $this->joinq_model->read($param);

    // manager
    unset($param);
    $param['where']['ma_id'] = '1';
    $manager = $this->manager_model->read($param);

    $bp_name = "<h3>법무사명 : " . $joinq['data'][0]['bp_name'] . "</h3>";
    $tel = "<h3>연락처 : " . $joinq['data'][0]['tel'] . "</h3>";
    $local = "<h3>지역 : " . $joinq['data'][0]['local'] . "</h3>";
    $jq_desc = "<h3>문의내용 : " . $joinq['data'][0]['jq_desc'] . "</h3>";

    // 관리자 문자수신번호
    $r_phone = $manager['data'][0]['tel_sms'];

    if ($r_phone) {
      $message = "<h2>[법무사넷] " . $joinq['data'][0]['tel'] . "님의 문의가 도착했습니다.</h2>" .
        $bp_name . $tel . $local . $jq_desc;

      $title = "법무사넷 " . $joinq['data'][0]['tel'] . "님의 문의가 도착했습니다.";
      // $this->sendmail($joinq['data'][0]['jq_name'], $title, $message, $manager['data'][0]['email']);
      // $this->sendmail($joinq['data'][0]['jq_name'], $title, $message, 'abc@kumsolmedia.com');
      $this->sendmail($joinq['data'][0]['tel'], $title, $message, 'kyudaddy@gmail.com');

      $message = str_replace("<h3>", "", $message);
      $message = str_replace("<h2>", "", $message);
      $message = str_replace("</h3>", "\n", $message);
      $message = str_replace("</h2>", "\n", $message);
      $isuccess = $this->common->send_sms('01072713121', "010", "9564",  "2341", $message, "", "");
      // $isuccess = $this->common->send_sms($r_phone, "010", "9564",  "2341", $message, "", "");
    }
  }

  // 메일 보내기
  private function sendmail($name, $title, $message, $to_mail)
  {

    $config['mailtype'] = 'html';

    $this->email->initialize($config);

    $this->email->from($to_mail, $name);
    $this->email->to($to_mail);

    $this->email->subject($title);
    $this->email->message($message);

    $this->email->send();
  }
}
