<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Login.php';

class Beopmusa extends Login
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->library('image_lib');
    $this->load->model("beopmusa_model");
    $this->load->model("city_model");
    $this->load->model("district_model");
    $this->load->model("subway_model");
    $this->load->helper('url');
    $this->load->library('user_agent');
    date_default_timezone_set('Asia/Seoul');

    $this->_islogin();
  }

  // list page 
  public function index()
  {

    // city
    $param['orderby'] = 'city_code';
    $city = $this->city_model->read($param);
    $data['city'] = $city;

    // subway
    /*
		$param['orderby'] = 'subway_id';
		$city = $this->subway_model->read($param);
		$data['subway'] = $subway;
*/

    // view
    $this->load->view('header');
    $this->load->view('beopmusa/list', $data);
    $this->load->view('footer');
  }

  // list page json data
  public function json()
  {
    // $_REQUEST
    $param['like']['title'] = $this->input->get('title');
    $param['like']['isopen'] = $this->input->get('isopen');
    $param['like']['city_code'] = $this->input->get('city_code');
    $param['like']['district_code'] = $this->input->get('district_code');

    // start, length
    $param['start'] = $this->input->get('start');
    $param['length'] = $this->input->get('length');
    if (!$this->input->get('start')) $param['start'] = 0;
    if (!$this->input->get('length')) $param['length'] = 15;

    // order_by field setting
    $param['orderby'] = $this->input->get('orderby');
    if (empty($param['orderby'])) $param['orderby'] = 'regist_date';

    $param['sort'] = 'desc';

    // get beopmusa list
    $data = $this->beopmusa_model->read($param);

    // output data json
    $this->output->set_content_type('text/json');
    $this->output->set_output(json_encode($data));
  }

  // edit
  public function edit($bp_id = null)
  {
    // set return url
    $data['url'] = $this->input->get("url");
    if (!$data['url']) $data['url'] = "/adm/beopmusa/list";

    // read
    $param['where']['bp_id'] = $bp_id;
    $data['beopmusa'] = $this->beopmusa_model->read($param);
    $data['beopmusa'] = $data['beopmusa']['data'];
    if (empty($data['beopmusa'])) :
      $data['beopmusa'] = $this->common->setRowNull('beopmusa');
    else :
      $data['beopmusa'] = $data['beopmusa'][0];
    endif;

    // city
    $param_city['orderby'] = 'city_code';
    $city = $this->city_model->read($param_city);
    $data['city'] = $city;

    // district
    $param_district['orderby'] = 'district_code';
    $district = $this->district_model->read($param_district);
    $data['district'] = $district;

    // subway
    $param_subway['orderby'] = 'subway_id';
    $subway = $this->subway_model->read($param_subway);
    $data['subway'] = $subway;

    $this->load->view('header', $data);
    $this->load->view('beopmusa/edit', $data);
    $this->load->view('footer');
  }

  // post
  public function post()
  {
    if ($this->input->method() == "post") :
      // $_REQUEST
      $param = $this->input->post(null, true);
      $bp_id = $this->input->post('bp_id');
      $url = $this->input->post('url');

      if (empty($param['bp_id'])) :
        $param['regist_date'] = date("Y-m-d H:i:s");
        $param['update_date'] = date("Y-m-d H:i:s");
        $bp_id = $this->beopmusa_model->create($param);
      else :
        $param['fields'] = $param;
        $param['fields']['update_date'] = date("Y-m-d H:i:s");
        $param['where']['bp_id'] = $param['bp_id'];
        $this->beopmusa_model->update($param);
      endif;

      if (!$url) $url = "/adm/beopmusa";
      if (!$bp_id) $url = "/adm/beopmusa";

      // 법무사
      $param1['where']['bp_id'] = $bp_id;
      $beopmusa = $this->beopmusa_model->read($param1);
      $beopmusa = $beopmusa['data'][0];


      // 원장사진 파일 업로드
      if (isset($_FILES["owner_photo"]["tmp_name"]) && $_FILES["owner_photo"]["tmp_name"] != '') :
        if ($_FILES["owner_photo"]["tmp_name"]) :
          // 기존파일 있으면 삭제
          if ($beopmusa["owner_photo"]) :
            $file = $_SERVER['DOCUMENT_ROOT'] . $beopmusa["owner_photo"];
            if (file_exists($file)) unlink($file);
          endif;

          // 섬네일 사진 업로드
          $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/data/beopmusa/' . date("Ym");
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['encrypt_name'] = true;
          $this->upload->initialize($config);

          if (!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777, true);

          // 업로드 실행
          if (!$this->upload->do_upload("owner_photo")) :
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
          else :
            $data = array('upload_data' => $this->upload->data());

            $this->file_resize($data['upload_data']['full_path']);
            $owner_photo = str_replace($_SERVER['DOCUMENT_ROOT'], "", $data['upload_data']['full_path']);

            $param2['fields']['owner_photo'] = $owner_photo;
            $param2['where']['bp_id'] = $bp_id;
            $this->beopmusa_model->update($param2);

          endif;

        endif;
      else :
        if ($this->input->post("owner_photo_del") == "1") :
          // 파일 있으면 삭제
          if ($beopmusa["owner_photo"]) :
            $file = $_SERVER['DOCUMENT_ROOT'] . $beopmusa["owner_photo"];
            if (file_exists($file)) unlink($file);
          endif;

          $param2['fields']['owner_photo'] = "";
          $param2['where']['bp_id'] = $bp_id;
          $this->beopmusa_model->update($param2);

        endif;
      endif;

      // 원장사진 파일 업로드
      if (isset($_FILES["intro_photo"]["tmp_name"]) && $_FILES["intro_photo"]["tmp_name"] != '') :
        if ($_FILES["intro_photo"]["tmp_name"]) :
          // 기존파일 있으면 삭제
          if ($beopmusa["intro_photo"]) :
            $file = $_SERVER['DOCUMENT_ROOT'] . $beopmusa["intro_photo"];
            if (file_exists($file)) unlink($file);
          endif;

          // 섬네일 사진 업로드
          $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/data/beopmusa/' . date("Ym");
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['encrypt_name'] = true;
          $this->upload->initialize($config);

          if (!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777, true);

          // 업로드 실행
          if (!$this->upload->do_upload("intro_photo")) :
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
          else :
            $data = array('upload_data' => $this->upload->data());

            // $this->file_resize($data['upload_data']['full_path']);
            $intro_photo = str_replace($_SERVER['DOCUMENT_ROOT'], "", $data['upload_data']['full_path']);

            $param2['fields']['intro_photo'] = $intro_photo;
            $param2['where']['bp_id'] = $bp_id;
            $this->beopmusa_model->update($param2);

          endif;

        endif;
      else :
        if ($this->input->post("intro_photo_del") == "1") :
          // 파일 있으면 삭제
          if ($beopmusa["intro_photo"]) :
            $file = $_SERVER['DOCUMENT_ROOT'] . $beopmusa["intro_photo"];
            if (file_exists($file)) unlink($file);
          endif;

          $param2['fields']['intro_photo'] = "";
          $param2['where']['bp_id'] = $bp_id;
          $this->beopmusa_model->update($param2);

        endif;
      endif;

      // 전경사진 파일 업로드
      for ($i = 1; $i <= 6; $i++) :
        if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["tmp_name"]) :      
          if ($_FILES["photo$i"]["tmp_name"]) :              
            // 기존파일 있으면 삭제
            if ($beopmusa["photo$i"]) :
              $file = $_SERVER['DOCUMENT_ROOT'] . $beopmusa["photo$i"];
              if (file_exists($file)) unlink($file);
            endif;


            // 섬네일 사진 업로드
            $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/data/beopmusa/' . date("Ym");
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = true;
            $this->upload->initialize($config);

            if (!is_dir($config['upload_path']))
              mkdir($config['upload_path'], 0777, true);

            // 업로드 실행
            if (!$this->upload->do_upload("photo$i")) :
              $error = array('error' => $this->upload->display_errors());
              print_r($error);
            else :
              $data = array('upload_data' => $this->upload->data());

              $this->file_resize($data['upload_data']['full_path']);
              $photo = str_replace($_SERVER['DOCUMENT_ROOT'], "", $data['upload_data']['full_path']);
              unset($param2);
              $param2['fields']["photo$i"] = $photo;
              $param2['where']['bp_id'] = $bp_id;
              $this->beopmusa_model->update($param2);

            endif;
          endif;
        else :
          if ($this->input->post("photo".$i."_del$i") == "1") :
            // 파일 있으면 삭제
            if ($beopmusa["photo$i"]) :
              $file = $_SERVER['DOCUMENT_ROOT'] . $beopmusa["photo$i"];
              if (file_exists($file)) unlink($file);
            endif;

            $param2['fields']["photo$i"] = '';
            $param2['where']['bp_id'] = $bp_id;
            $this->beopmusa_model->update($param2);
          endif;
        endif;
      endfor;

      redirect($url);
    else :
      show_404();
    endif;
  }

  // file resize()
  private function file_resize($full_path)
  {

    $config['source_image'] = $full_path;
    $config['maintain_ratio'] = TRUE;
    $config['width'] = 800;
    $config['height'] = 700;

    $this->image_lib->initialize($config);
    $this->image_lib->resize();
  }

  // update isopen
  public function isopen()
  {
    if ($this->input->method() == "post")
      $this->beopmusa_model->update_isopen($this->input->post('bp_id'));
  }

  // delete
  public function delete()
  {
    if ($this->input->method() == "post") :
      $param = $this->input->post(null, true);
      $this->beopmusa_model->delete($param);
    endif;
  }


  // check bp_uid
  public function checkuid()
  {
    $bp_id = $this->input->post("bp_id");
    $bp_uid = $this->input->post("bp_uid");
    $data = "";
    switch ($bp_uid):
      case "beopmusa":
      case "about":
      case "cure":
      case "care":
      case "insure":
      case "article":
      case "notice":
      case "joinq":
      case "main":
      case "welcome":
      case "adm":
      case "manager":
      case "admin":
      case "index":
      case "hanacar":
        $data = array("result" => "fail");
        $this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($data));
        break;
      default:
        if (strlen($bp_uid) < 3) :
          $data = array("result" => "fail");
          $this->output->set_content_type('text/json');
          $this->output->set_output(json_encode($data));
        else :
          $row = $this->beopmusa_model->get_row_bp_uid($bp_uid, $bp_id);
          if (isset($row["bp_id"])) :
            $data = array("result" => "fail");
            $this->output->set_content_type('text/json');
            $this->output->set_output(json_encode($data));
          else :
            $data = array("result" => "ok");
            $this->output->set_content_type('text/json');
            $this->output->set_output(json_encode($data));
          endif;
        endif;
        break;
    endswitch;
  }
}
