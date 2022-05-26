    <!--s:푸터-->
    <footer>
      <div class="swiper-container swiper-container-free-mode footer-logo-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="https://kjaar.kabl.kr/" target="_blank"><img src="../images/icon-logo-kabl.jpg" alt="대한법무사협회"></a>
          </div>
          <div class="swiper-slide">
            <a href="http://www.iros.go.kr/PMainJ.jsp" target="_blank"><img src="../images/icon-logo-iros.jpg" alt="인터넷등기소"></a>
          </div>
          <div class="swiper-slide">
            <a href="https://www.gov.kr/portal/main" target="_blank"><img src="../images/icon-logo-gov.jpg" alt="정부24"></a>
          </div>
          <div class="swiper-slide">
            <a href="https://www.moleg.go.kr/" target="_blank"><img src="../images/icon-logo-moleg.jpg" alt="법제처"></a>
          </div>
          <div class="swiper-slide">
            <a href="https://www.hometax.go.kr/" target="_blank"><img src="../images/icon-logo-hometax.jpg" alt="홈택스"></a>
          </div>
          <div class="swiper-slide">
            <a href="http://www.eum.go.kr/" target="_blank"><img src="../images/icon-logo-eum.jpg" alt="토지이음"></a>
          </div>
          <div class="swiper-slide">
            <a href="http://www.wetax.go.kr/" target="_blank"><img src="../images/icon-logo-wetax.jpg" alt="wetax"></a>
          </div>
          <div class="swiper-slide">
            <a href="https://irts.molit.go.kr/" target="_blank"><img src="../images/icon-logo-irts.jpg" alt="국토교통부 부동산거래 전자계약시스템"></a>
          </div>
        </div>
      </div>

      <div class="top">
        <div class="container">
          <ul>
            <li><a href="/about">법무사넷</a></li>
            <li><a href="/term">개인정보처리방침</a></li>
          </ul>
        </div>
      </div>
      <div class="bottom">
        <div class="container">
          <a href="/" class="foot-logo icon">법무사넷</a>
          <div class="info-list cleaffx">
            <span>상호명 : <?= $this->dinfo['manager']['company'] ?></span><span class="bar"></span>
            <span>대표자명 : <?= $this->dinfo['manager']['user_name'] ?></span><span class="bar"></span>
            <span>사업자번호 : <?= $this->dinfo['manager']['b_num'] ?></span><br>
            <span><strong>T</strong> : <a href="tel:<?= $this->dinfo['manager']['tel_owner'] ?>"><?= $this->dinfo['manager']['tel_owner'] ?></a></span><span class="bar"></span>
            <span><strong>E</strong> : <a href="mailto:<?= $this->dinfo['manager']['email'] ?>"><?= $this->dinfo['manager']['email'] ?></a></span><br>
            <span><?= $this->dinfo['manager']['addr'] ?></span>
            <span class="copyright">Copyright © 법무사넷 All rights reserved.</span>
          </div>
        </div>
      </div>
    </footer>
    <!--e:푸터-->

    <!--s:개인정보수집-->
    <div id="privacy_pop" class="none">
      <div class="box">
        <a href="#" class="btn_close"><img src="../images/close-btn-w.svg" alt="닫기"></a>
        <strong>개인정보 수집 및 이용 동의 내용</strong>
        <div class="agree_box">법무사넷은 (이하 ‘사이트’)개인정보 보호법 제30조에 따라 정보주체의 개인정보를 보호하고 이와 관련한 고충을 신속하고 원활하게 처리할 수 있도록 하기 위하여다음과 같이 개인정보 처리지침을 수립․공개합니다.

          제1조(개인정보의 처리목적)
          사이트는 다음의 목적을 위하여 개인정보를 처리합니다. 처리하고 있는 개인정보는 다음의 목적 이외의 용도로는 이용되지 않으며, 이용 목적이 변경되는 경우에는 개인정보 보호법 제18조에 따라 별도의 동의를 받는 등 필요한 조치를 이행할 예정입니다.

          1. 온라인 가입문의: 상호, 법무사명, 지역명, 연락처, 이메일
          2. 빠른 법무상담: 이름, 연락처, 이메일


          제2조(개인정보의 처리 및 보유기간)
          ① 사이트는 법령에 따른 개인정보 보유․이용기간 또는 정보주체로부터 개인정보를 수집시에 동의받은 개인정보 보유․이용기간 내에서 개인정보를 처리․보유합니다.
          ② 각각의 개인정보 처리 및 보유 기간은 다음과 같습니다.

          1. 보유기간

          ① 지점문의에 관한 기록 : 1년

          제3조(개인정보의 제3자 제공)
          ① 사이트는 개인정보를 제3자에게 제공하지 않습니다.

          제4조(정보주체와 법정대리인의 권리․의무 및 행사방법)
          ① 정보주체는사이트에 대해 언제든지 개인정보 열람․정정․삭제․처리정지 요구 등의 권리를 행사할 수 있습니다.
          ② 제1항에 따른 권리 행사는 사이트에 대해 개인정보보호법 시행령 제41조제1항에 따라 서면, 전자우편, 모사전송(FAX) 등을 통하여 하실 수 있으며,사이트는 이에 대해 지체없이 조치하겠습니다.
          ③ 제1항에 따른 권리 행사는 정보주체의 법정대리인이나 위임을 받은 자 등 대리인을 통하여 하실 수 있습니다. 이 경우 개인정보 보호법 시행규칙 별지 제11호 서식에 따른 위임장을 제출하셔야 합니다.
          ④ 개인정보 열람 및 처리정지 요구는 개인정보보호법 제35조 제5항, 제37조 제2항에 의하여 정보주체의 권리가 제한 될 수 있습니다.
          ⑤ 개인정보의 정정 및 삭제 요구는 다른 법령에서 그 개인정보가 수집 대상으로 명시되어 있는 경우에는 그 삭제를 요구할 수 없습니다.
          ⑥ 사이트는정보주체 권리에 따른 열람의 요구, 정정•삭제의 요구, 처리정지의 요구 시 열람 등 요구를 한 자가 본인이거나 정당한 대리인인지를 확인합니다.

          제5조(처리하는 개인정보 항목)
          사이트는 다음의 개인정보 항목을 처리하고 있습니다.

          1. 온라인 가입문의: 상호, 법무사명, 지역명, 연락처, 이메일
          2. 빠른 법무상담: 이름, 연락처, 이메일

          제6조(개인정보의 파기)
          ① 사이트는 개인정보 보유기간의 경과, 처리목적 달성 등 개인정보가 불필요하게 되었을 때에는 지체없이 해당 개인정보를 파기합니다.
          ② 정보주체로부터 동의받은 개인정보 보유기간이 경과하거나 처리목적이 달성되었음에도 불구하고 다른 법령에 따라 개인정보를 계속 보존하여야 하는 경우에는, 해당 개인정보를 별도의 데이터베이스(DB)로 옮기거나 보관장소를 달리하여 보존합니다.
          ③ 개인정보 파기의 절차 및 방법은 다음과 같습니다.
          1. 파기절차
          사이트는 파기 사유가 발생한 개인정보를 선정하고, 사이트의 개인정보 보호책임자의 승인을 받아 개인정보를 파기합니다.
          2. 파기방법
          사이트는 전자적 파일 형태로 기록․저장된 개인정보는 기록을 재생할 수 없도록 파기하며, 종이 문서에 기록․저장된 개인정보는 분쇄기로 분쇄하거나 소각하여 파기합니다.

          제7조(개인정보의 안전성 확보조치)
          사이트는 개인정보의 안전성 확보를 위해 다음과 같은 조치를 취하고 있습니다.
          1. 관리적 조치 : 내부관리계획 수립․시행, 정기적 직원 교육 등
          2. 기술적 조치 : 개인정보처리시스템 등의 접근권한 관리, 접근통제시스템 설치, 고유식별정보 등의 암호화, 보안프로그램 설치

          제8조(개인정보 자동 수집 장치의 설치∙운영 및 거부에 관한 사항)
          ①사이트는 이용자에게 개별적인 맞춤서비스를 제공하기 위해 이용정보를 저장하고 수시로 불러오는 ‘쿠기(cookie)’를 사용합니다.
          ②쿠키는 웹사이트를 운영하는데 이용되는 서버(http)가 이용자의 컴퓨터 브라우저에게 보내는 소량의 정보이며 이용자들의 PC 컴퓨터내의 하드디스크에 저장되기도 합니다.
          가. 쿠키의 사용목적: 이용자가 방문한 각 서비스와 웹 사이트들에 대한 방문 및 이용형태, 인기 검색어, 보안접속 여부, 등을 파악하여 이용자에게 최적화된 정보 제공을 위해 사용됩니다.
          나. 쿠키의 설치∙운영 및 거부 :웹브라우저 상단의 도구>인터넷 옵션>개인정보 메뉴의 옵션 설정을 통해 쿠키 저장을 거부 할 수 있습니다.
          다. 쿠키 저장을 거부할 경우 맞춤형 서비스 이용에 어려움이 발생할 수 있습니다.

          제9조(개인정보 보호책임자)
          ①사이트는 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련한 정보주체의 불만처리 및 피해구제 등을 위하여 아래와 같이 개인정보 보호책임자를 지정하고 있습니다.

          ▶ 개인정보 보호책임자 성명 : 김지태 직책 : 본부장 연락처 : 전화번호 02-761-1633, 이메일 jtkim@kumsolmedia.com,
          팩스번호 02-761-1632
          ※ 개인정보 보호 담당부서로 연결됩니다.
          ▶ 개인정보 보호 담당부서
          부서명 : 경영관리본부
          담당자 : 김지태본부장
          연락처 : 전화번호 02-761-1633, 이메일 bms@kumsolmedia.com
          팩스번호 02-761-1632

          ② 정보주체께서는 사이트는의 서비스(또는 사업)을 이용하시면서 발생한 모든 개인정보 보호 관련 문의, 불만처리, 피해구제 등에 관한 사항을 개인정보 보호책임자 및 담당부서로 문의하실 수 있습니다. 사이트는 정보주체의 문의에 대해 지체없이 답변 및 처리해드릴 것입니다.


          제10조(권익침해 구제방법) 정보주체는 아래의 기관에 대해 개인정보 침해에 대한 피해구제, 상담 등을 문의하실 수 있습니다.

          &lt;아래의 기관은 사이트 와는 별개의 기관으로서, 사이트의 자체적인개인정보 불만처리, 피해구제 결과에 만족하지 못하시거나 보다 자세한 도움이필요하시면 문의하여 주시기 바랍니다&gt;
          ▶ 개인정보 침해신고센터 (한국인터넷진흥원 운영)
          - 소관업무 : 개인정보 침해사실 신고, 상담 신청
          - 홈페이지 : privacy.kisa.or.kr
          - 전화 : (국번없이) 118
          - 주소 :(58324) 전남 나주시 진흥길 9(빛가람동 301-2) 3층 개인정보침해신고센터
          ▶ 개인정보 분쟁조정위원회
          - 소관업무 : 개인정보 분쟁조정신청, 집단분쟁조정 (민사적 해결)
          - 홈페이지 : www.kopico.go.kr
          - 전화 : (국번없이) 1833-6972
          - 주소 :(03171)서울특별시 종로구 세종대로 209 정부서울청사 4층
          ▶ 대검찰청 사이버범죄수사단 : 02-3480-3573 (www.spo.go.kr)
          ▶ 경찰청 사이버안전국 : 182 (http://cyberbureau.police.go.kr)

          제11조(개인정보 처리방침 변경)
          ①이 개인정보 처리방침은 2020.12.01. 부터 적용됩니다.
          ②이 개인정보처리방침은 시행일로부터 적용되며, 법령 및 방침에 따른 변경내용의 추가, 삭제 및 정정이 있는 경우에는 변경사항의 시행 7일 전부터 공지사항을 통하여 고지할 것입니다.
        </div>
      </div>
    </div>
    <!--e:개인정보수집-->

    <!--s:팝업창 추가-->
    <div class="popup-wrap none">
      <form>
        <div class="img-wrap"><a href="#"><img src="#" alt="팝업 이미지 600px * 600px"></a></div>
        <div class="ft-wrap">
          <input type="checkbox" id="chkbox">
          <label for="chkbox">오늘 하루 이 창을 열지 않음</label>
          <a href="#">[CLOSE]</a>
        </div>
      </form>
    </div>
    <!--e:팝업창 추가-->

    <!--s:스카이 스크래퍼 추가-->
    <div class="skyscraper-wrap">
      <ul>
        <li>
          <a href="/counselq"><span class="blue">법무사<br />연락받기<br /><strong>신청</strong></span></a>
        </li>
        <li>
          <a href="<?= $this->dinfo['manager']['kakaotok'] ?>" target="_blank"><span class="icon icon-1"></span><span class="text">카톡상담</span></a>
        </li>
        <li>
          <a href="<?= $this->dinfo['manager']['navertok'] ?>" target="_blank"><span class="icon icon-2"></span><span class="text">톡톡상담</span></a>
        </li>
        <li>
          <a href="tel:<?= $this->dinfo['manager']['tel_quick'] ?>"><span class="icon icon-3"></span><span class="text">빠른<br />전화상담</span></a>
        </li>
        <li>
          <a href=/beopmusa><span class="icon icon-4"></span><span class="text">내지역<br />법무사찾기</span></a>
        </li>
      </ul>
    </div>
    <!--e:스카이 스크래퍼 추가-->

    <!--s:스피너 추가 off 클래스 추가 -->
    <div class="layer-wrap off" id="spinner">
      <div class="center-wrap">
        <h2>현재위치 기준으로 정렬중 입니다.</h2>
        <svg class="spinner" viewbox="0 0 50 50">
          <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
      </div>
    </div>
    <!--e:스피너 추가-->

    <!--s:하단 퀵버튼 추가(업체 상세 페이지 제외)-->
    <div class="footer-quick clearfx">
      <a href="/joinq"><span class="icon sms"></span>법무상담신청</a>
      <a href="<?= $this->dinfo['manager']['navertok'] ?>" target="_blank"><span class="icon naver"></span>톡톡상담</a>
      <a href="<?= $this->dinfo['manager']['kakaotok'] ?>" target="_blank"><span class="icon kakao"></span>카카오톡</a>
    </div>
    <!--e:하단 퀵버튼 추가(업체 상세 페이지 제외)-->

    <script>
      //스와이퍼
      var swiper = new Swiper('.main-top-swiper', {
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
      });

      new Swiper('.footer-logo-swiper', {
        loop: true,
        slidesPerView: 'auto',
        autoplay: {
          delay: 1,
          disableOnInteraction: false
        },
        speed: 3000,
      });

      $(function() {
        //개인정보수집
        $('.btn_privacy').on('click', function(e) {
          e.preventDefault();
          $('#privacy_pop').show();
        });
        $('#privacy_pop .btn_close').on('click', function(e) {
          e.preventDefault();
          $('#privacy_pop').hide();
        });

        //메뉴 클릭시 네비게이션 보이기
        $('.menu-btn').on('click', function(e) {
          $('.gnb').addClass('on');
        });

        //네비게이션 닫기
        $('.close-btn').on('click', function(e) {
          $('.gnb').removeClass('on');
        });

        //메뉴 클릭시 서브 메뉴 보이기
        $('.oneD').on('click', function(e) {
          $(this).toggleClass('on');
        });
      });

      // 광역시도
      $.ajax({
        type: "get",
        url: "/city",
        beforeSend: function(xhr, opts) {},
        success: function(result) {
          result.data.forEach(function(val, i) {
            var selected = "";
            if (getParameter('city_code') == val.city_code) selected = "selected";
            $("select[name='city_code']").append('<option value="' + val.city_code + '" ' + selected + '>' + val.city_name + '</option>');
          });
        },
        error: function(err) {
          console.log(err);
        }
      });

      // 광역시도 change
      $(document).on("change", "select[name='city_code']", function() {
        var city_code = $(this).val();
        // 시군구
        district(city_code);
      });

      // 시군구
      function district(city_code) {
        // 시군구
        $.ajax({
          type: "get",
          url: "/district",
          data: {
            'city_code': city_code
          },
          beforeSend: function(xhr, opts) {},
          success: function(result) {
            $("select[name='district_code']").html('<option value="">시군구선택</option>');
            result.data.forEach(function(val, i) {
              var selected = "";
              if (getParameter('district_code') == val.district_code) selected = "selected";
              $("select[name='district_code']").append('<option value="' + val.district_code + '" ' + selected + '>' + val.district_name + '</option>');
            });
          },
          error: function(err) {
            console.log(err);
          }
        });
      }

      if (getParameter('city_code')) district(getParameter('city_code'));
    </script>
    </body>

    </html>