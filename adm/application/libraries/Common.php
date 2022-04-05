<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common {
	
	public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->database();
	}	
	
	// paging
	public function paging($page_size, $cur_page, $total_page) {
	    $str = '';
	    if ($cur_page > 1) {
	        $str .= '<li><a href="?page=1" data-field="page" data-val="1" class="prev2-btn csspage">처음</a></li>'.PHP_EOL;
	    }
	
	    $start_page = ( ( (int)( ($cur_page - 1 ) / $page_size ) ) * $page_size ) + 1;
	    $end_page = $start_page + $page_size - 1;
	
	    if ($end_page >= $total_page) $end_page = $total_page;
	
	    if ($start_page > 1) $str .= '<li><a href="?page='.($start_page-1).'" data-field="page" data-val="'.($start_page-1).'" class="prev1-btn csspage">이전</a></li>'.PHP_EOL;
	
	    if ($total_page > 1) {
	        for ($k=$start_page;$k<=$end_page;$k++) {
	            if ($cur_page != $k)
	                $str .= '<li><a href="?page='.$k.'" data-field="page" data-val="'.$k.'" class="csspage">'.$k.'</a></li>'.PHP_EOL;
	            else
	                $str .= '<li><a href="?page='.$k.'" data-field="page" data-val="'.$k.'" class="on csspage">'.$k.'</a></li>'.PHP_EOL;
	        }
	    }
	
	    if ($total_page > $end_page) $str .= '<li><a href="?page='.($end_page+1).'" data-field="page" data-val="'.($end_page+1).'" class="next1-btn csspage">다음</a></li>'.PHP_EOL;
	
	    if ($cur_page < $total_page) {
	        $str .= '<li><a href="?page='.$total_page.'" data-field="page" data-val="'.$total_page.'" class="next2-btn csspage">맨끝</a></li>'.PHP_EOL;
	    }
	
	    if ($str)
	        return "<ul>{$str}</ul>";
	    else
	        return "";
	}
	
	
	// check field
	public function checkField($param, $table){
		if(!empty($param)):
			foreach($param as $key=>$value):		
				$query = $this->CI->db->query("
					SELECT 1 FROM Information_schema.columns
					WHERE table_schema = '{$_SERVER['DB_DATABASE']}' 
					AND table_name = '$table' 
					AND column_name = '$key' 
				");
				if ($query->num_rows() == 0):
					unset($param[$key]);
				endif;
			endforeach;
		endif;
		return $param;
	}

	// 1 row add null
	public function setRowNull($table){	
		$data = array();
		$query = $this->CI->db->query("
			SELECT column_name FROM Information_schema.columns
			WHERE table_schema = '".$_SERVER['DB_DATABASE']."' 
			AND table_name = '$table' 
		");
		$columns = $query->result_array();
		foreach($columns as $key=>$value):
			if(isset($value['COLUMN_NAME'])):
				$data[$value['COLUMN_NAME']] = '';
			else:
				$data[$value['column_name']] = '';
			endif;
		endforeach;
		return $data;
	}		
	

	// 경고메세지를 경고창으로
	public function alert($msg = '', $url = '') {
	    $CI = & get_instance();
	
	    if (!$msg) $msg = '올바른 방법으로 이용해 주십시오.';
	
	    echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset').
	    "\">";
	    echo "<script type='text/javascript'>alert('".$msg.
	    "');";
	    if ($url)
	        echo "location.replace('".$url.
	    "');";
	    else
	        echo "history.go(-1);";
	    echo "</script>";
	    exit;
	}
	
	// 경고메세지 출력후 창을 닫음
	public function alert_close($msg) {
	    $CI = & get_instance();
	
	    echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset').
	    "\">";
	    echo "<script type='text/javascript'> alert('".$msg.
	    "'); window.close(); </script>";
	    exit;
	}
	
	// 경고메세지만 출력
	public function alert_only($msg) {
	    $CI = & get_instance();
	
	    echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset').
	    "\">";
	    echo "<script type='text/javascript'> alert('".$msg.
	    "'); </script>";
	    exit;
	}
	
	public function alert_continue($msg) {
	    $CI = & get_instance();
	
	    echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset').
	    "\">";
	    echo "<script type='text/javascript'> alert('".$msg.
	    "'); </script>";
	}
	
	// 문자 보내기
    public function send_sms($r_phone, $s_phone1, $s_phone2,  $s_phone3, $message, $subject, $istest) {
        $smsType = "";
        $val = mb_strwidth ($message, "utf-8");
        if ($val > 90) $smsType ="L";
        
        $sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // HTTPS 전송요청 URL
        // $sms_url = "http://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL
        $sms['user_id'] = base64_encode("ksagreesms"); //SMS 아이디.
        $sms['secure'] = base64_encode("e7591372abf67cfa878626caf2a6d6e3") ;//인증키
        $sms['msg'] = base64_encode($message);
        //if( $_POST['smsType'] == "L"){
        //    $sms['subject'] =  base64_encode($subject);
        //}
        $sms['rphone'] = base64_encode($r_phone);
        $sms['sphone1'] = base64_encode($s_phone1);
        $sms['sphone2'] = base64_encode($s_phone2);
        $sms['sphone3'] = base64_encode($s_phone3);
        $sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
        
        $sms['testflag'] = $istest;
        
        $sms['smsType'] = base64_encode($smsType); // LMS일경우 L

        $host_info = explode("/", $sms_url);
        $host = $host_info[2];
        $path = $host_info[3]."/";
        //$path = $host_info[3]."/".$host_info[4];

        srand((double)microtime()*1000000);
        $boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
        //print_r($sms);

        // 헤더 생성
        $header = "POST /".$path ." HTTP/1.0\r\n";
        $header .= "Host: ".$host."\r\n";
        $header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";

        // 본문 생성
        $data = "";
        foreach($sms AS $index => $value){
            $data .="--$boundary\r\n";
            $data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
            $data .= "\r\n".$value."\r\n";
            $data .="--$boundary\r\n";
        }
        $header .= "Content-length: " . strlen($data) . "\r\n\r\n";

        $fp = fsockopen($host, 80);

        if ($fp) {
            fputs($fp, $header.$data);
            $rsp = '';
            while(!feof($fp)) {
                $rsp .= fgets($fp,8192);
            }
            fclose($fp);
            $msg = explode("\r\n\r\n",trim($rsp));
            $rMsg = explode(",", $msg[1]);
            $Result= $rMsg[0]; //발송결과
            $Count= $rMsg[1]; //잔여건수

            //발송결과 알림
            if($Result=="success") {
                $alert = "성공";
                $alert .= " 잔여건수는 ".$Count."건 입니다.";
            }
            else if($Result=="reserved") {
                $alert = "성공적으로 예약되었습니다.";
                $alert .= " 잔여건수는 ".$Count."건 입니다.";
            }
            else if($Result=="3205") {
                $alert = "잘못된 번호형식입니다.";
            }

            else if($Result=="0044") {
                $alert = "스팸문자는발송되지 않습니다.";
            }

            else {
                $alert = "[Error]".$Result;
            }
        }
        else {
            $alert = "Connection Failed";
        }

        //echo $alert;
        //exit;

        //$nointeractive = "1";
        $nointeractive = "";

        if($nointeractive=="1" && ($Result!="success" && $Result!="Test Success!" && $Result!="reserved") ) {
            return false;
        }
        else if($nointeractive!="1") {
            return true;
        }
        //echo "<script>location.href='".$returnurl."';</script>";
    }
    
    // 연락처 검증
	function chk_phone($PHONE){

		$ph = preg_replace("/[^0-9]*/s", "", $PHONE);
		$ph_len=strlen($ph);
		if( $ph_len >= '8' && $ph_len <= '11' ) {
			switch( $ph_len ) {
				case 8:
					$ph="010".$ph;
					$ph=substr($ph,0,3)."-".substr($ph,3,4)."-".substr($ph,7);
					break;

				case 9:
					$ph="0".$ph;
					$ph=substr($ph,0,3)."-".substr($ph,3,3)."-".substr($ph,6);
					break;

				case 10:
					if( substr($ph,0,1) == '0' ) {
						$ph=substr($ph,0,3)."-".substr($ph,3,3)."-".substr($ph,6);
					} else if( substr($ph,0,1) == '1' ) {
					$ph="0".$ph;
					$ph=substr($ph,0,3)."-".substr($ph,3,4)."-".substr($ph,7);
					}
					break;

				case 11:
					$ph=substr($ph,0,3)."-".substr($ph,3,4)."-".substr($ph,7);
					break;
			}

			$pattern="/^01[016789]-[0-9]{3,4}-[0-9]{4}$/";
			$rs=( preg_match($pattern, $ph) ) ? true : false ;
			return $rs;
		}
	}    
	
}