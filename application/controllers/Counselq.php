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
    $this->load->library('email');
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
      if (empty($param['name']) || !$param['name']) :
        $this->common->alert('필수 항목이 누락 되었습니다.', "/");
        exit;
      endif;
      if (empty($param['tel']) || !$param['tel']) :
        $this->common->alert('필수 항목이 누락 되었습니다.', "/");
        exit;
      endif;
      if (empty($param['city_code']) || !$param['city_code']) :
        $this->common->alert('필수 항목이 누락 되었습니다.', "/");
        exit;
      endif;
      if (empty($param['district_code']) || !$param['district_code']) :
        $this->common->alert('필수 항목이 누락 되었습니다.', "/");
        exit;
      endif;
      if (empty($param['fields']) || !$param['fields']) :
        $this->common->alert('필수 항목이 누락 되었습니다.', "/");
        exit;
      endif;
      if (empty($param['title']) || !$param['title']) :
        $this->common->alert('필수 항목이 누락 되었습니다.', "/");
        exit;
      endif;
      if (empty($param['desc']) || !$param['desc']) :
        $this->common->alert('필수 항목이 누락 되었습니다.', "/");
        exit;
      endif;

      $param['regist_date'] = date("Y-m-d H:i:s");
      $param['update_date'] = date("Y-m-d H:i:s");
      $id = $this->counselq_model->create($param);

      // send sms, email
      $this->sendsms($id);

      // 알림톡 보내기
      $button = array(
        "name" => "법무사넷 바로가기",
        "type" => "WL",
        "url_mobile" => "http://www.beopmusa.net",
        "url_pc" => "http://www.beopmusa.net"
      );


      $msg = "[법무사넷]\n" . $param['name'] . "님 안녕하세요.\n우리지역 법무사 찾기 법무사넷\n상담 접수가 완료되었습니다.\n\n이제 희망하신 통화가능 시간에\n가장 가까운 법무사가\n연락드리도록 하겠습니다.\n\n감사합니다.^^\n\n온라인 상담 접수 : 365일 24시간\n고객응대 전화 : 평일 09:00~18:00";
      $val = $this->common->kakao_alim('beopmusa_001', $param['tel'], $msg, $button);

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

  // 문자 보내기
  private function sendsms($id)
  {
    // joinq
    $param['where']['id'] = $id;
    $counselq = $this->counselq_model->read($param);

    // manager
    unset($param);
    $param['where']['ma_id'] = '1';
    $manager = $this->manager_model->read($param);

    $bp_name = "<h3>이름 : " . $counselq['data'][0]['realName'] . "</h3>";
    $tel = "<h3>연락처 : " . $counselq['data'][0]['tel'] . "</h3>";
    $local = "<h3>지역 : " . $counselq['data'][0]['city'] . " " . $counselq['data'][0]['district'] .  "</h3>";
    $jq_desc = "<h3>상담 희망 분야 : " . $counselq['data'][0]['fields'] . "</h3>";
    $jq_desc .= "<h3>상담 제목 : " . $counselq['data'][0]['title'] . "</h3>";
    $jq_desc .= "<h3>상담 내용 : " . $counselq['data'][0]['desc'] . "</h3>";
    $jq_desc .= "<h3>통화 가능 시간 : " . $counselq['data'][0]['call_time'] . "</h3>";

    // 관리자 문자수신번호
    $r_phone = $manager['data'][0]['tel_sms'];

    if ($r_phone) {
      $message = "<h2>[법무사넷] 상담문의가 도착했습니다.</h2>" .
        $bp_name . $tel . $local . $jq_desc;

      $title = "[법무사넷] 상담문의가 도착했습니다.";

      if (ENVIRONMENT == 'production') :
        $this->sendmail($counselq['data'][0]['name'], $title, $message, $manager['data'][0]['email']);
        $this->sendmail($counselq['data'][0]['name'], $title, $message, 'abc@kumsolmedia.com');
      else :
        $this->sendmail($counselq['data'][0]['name'], $title, $message, 'kyudaddy@gmail.com');
      endif;

      $message = str_replace("<h3>", "", $message);
      $message = str_replace("<h2>", "", $message);
      $message = str_replace("</h3>", "\n", $message);
      $message = str_replace("</h2>", "\n", $message);
      if (ENVIRONMENT == 'production') :
        $isuccess = $this->common->send_sms($r_phone, "010", "9564",  "2341", $message, "", "");
      else :
        $isuccess = $this->common->send_sms('01072713121', "010", "9564",  "2341", $message, "", "");
      endif;
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
