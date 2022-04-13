    <!--s: 퀵버튼 -->
    <div class="quick-wrap">
      <ul>
        <li><a href="<?=$this->dinfo['manager']['navertok']?>" class="icon naver" target="_blank">네이버톡톡</a></li>
        <li><a href="<?=$this->dinfo['manager']['kakaotok']?>" class="icon kakao" target="_blank">카카오톡</a></li>
        <li class="sms-btn">
          <a href="javascript:void(0);" class="icon sms">SMS 가맹문의</a>
          <form action="/joinq/post" method="post">
            <input type="hidden" name="hp_name" value="SMS문의" />
            <div class="sms-wrap">
              <ul>
                <li>
                  <input type="text" placeholder="담당자명" name="jq_name" required />
                </li>
                <li>
                  <input type="tel" placeholder="연락처" name="tel" required />
                </li>
                <li>
                  <input type="email" placeholder="이메일" name="email" />
                </li>
                <li>
                  <input type="text" placeholder="입점희망지역" name="local" required />
                </li>
                <li>
                  <input type="checkbox" id="agree-term" name="confirm" value="1" required>
                  <label for="agree-term">개인정보취급방침에 동의</label><a href="#" class="btn_privacy">&#91;자세히&#93;</a></li>
                <li>
                  <button class="submit-btn">신청하기</button>
                </li>
              </ul>
            </div>
          </form>
        </li>
      </ul>
    </div>
    <!--e: 퀵버튼 -->

    <!--s:푸터-->
    <footer>
        <div class="quick-block clearfx">
            <a href="<?=$this->dinfo['manager']['navertok']?>"><span class="icon naver"></span>네이버톡톡</a>
            <a href="<?=$this->dinfo['manager']['kakaotok']?>"><span class="icon kakao"></span>카카오톡</a>
            <a href="/joinq"><span class="icon sms"></span>SMS 가맹문의</a>
        </div>
        <div class="top">
            <div class="container">
                <ul class="clearfx">
                    <li><a href="/about">하나카네트워크</a></li>
                    <li><a href="/term">개인정보처리방침</a></li>
                </ul>
            </div>
        </div>
        <div class="bottom">
            <div class="container">
                <a href="/" class="foot-logo icon">하나카N</a>
                <div class="info-list cleaffx">
                    <span>상호명 : <?=$this->dinfo['manager']['company']?></span><span class="bar"></span>
                    <span>대표자명 : <?=$this->dinfo['manager']['user_name']?></span><span class="bar"></span>
                    <span>사업자번호 : <?=$this->dinfo['manager']['b_num']?></span><br>
                    <span>대표전화 : <a
                            href="tel:<?=$this->dinfo['manager']['tel_owner']?>"><?=$this->dinfo['manager']['tel_owner']?></a></span><span
                        class="bar"></span>
                    <span>이메일 : <a
                            href="mailto:<?=$this->dinfo['manager']['email']?>"><?=$this->dinfo['manager']['email']?></a></span><br>
                    <span><?=$this->dinfo['manager']['addr']?></span>
                    <span class="copyright">Copyright © 하나카네트워크 All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>
    <!--e:푸터-->

    <!--s:개인정보수집-->
    <div id="privacy_pop" class="none">
        <div class="box">
            <a href="javascript:void(0);" class="btn_close"><img src="/images/close-btn-w.svg" alt="닫기"></a>
            <strong>개인정보 수집 및 이용에 대한 안내</strong>
            <div class="agree_box">
                <b>개인정보의 수집 및 이용목적</b><br><br>
                본 사이트는 온라인(상담)문의를 이용하는 기업 및 개인을 대상으로 아래와 같이 개인정보를 수집하고 있습니다.<br /><br />

                1. 수집 개인정보 항목<br />
                - 상호, 성명, 연락처, e메일, 문의내용<br /><br />

                2. 개인정보의 수집 및 이용목적<br />
                - 상담 및 문의내용에 대한 확인 및 회신<br /><br />

                3. 개인정보의 보유 및 이용기간<br />
                - 목적달성 시점까지 이용<br />
                * 목적 이외의 타 용도로는 사용되지 않습니다.<br /><br />

                4. 이외 사항은 개인정보취급방침을 준수합니다.
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


    </div>

    <script>
        //스와이퍼
        var swiper = new Swiper('.main-top-swiper', {
          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
          },
        });

        $(function () {
          //개인정보수집
          $('.btn_privacy').on('click', function (e) {
            e.preventDefault();
            $('#privacy_pop').show();
          });
          $('#privacy_pop .btn_close').on('click', function (e) {
            e.preventDefault();
            $('#privacy_pop').hide();
          });

          //메뉴 클릭시 네비게이션 보이기
          $('.menu-btn').on('click', function (e) {
            $('.gnb').addClass('on');
          });

          //네비게이션 닫기
          $('.close-btn').on('click', function (e) {
            $('.gnb').removeClass('on');
          });

          //메뉴 클릭시 서브 메뉴 보이기
          $('.oneD').on('click', function (e) {
            $(this).toggleClass('on');
          });
        });

        // 광역시도
        $.ajax({
          type: "get",
          url: "/city",
          beforeSend: function (xhr, opts) {},
          success: function (result) {
            result.data.forEach(function (val, i) {
              var selected = "";
              if (getParameter('city_code') == val.city_code) selected = "selected";
              $("select[name='city_code']").append('<option value="' + val.city_code + '" ' + selected + '>' + val.city_name + '</option>');
            });
          },
          error: function (err) {
            console.log(err);
          }
        });

        // 광역시도 change
        $(document).on("change", "select[name='city_code']", function () {
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
            beforeSend: function (xhr, opts) {},
            success: function (result) {
              $("select[name='district_code']").html('<option value="">시군구선택</option>');
              result.data.forEach(function (val, i) {
                var selected = "";
                if (getParameter('district_code') == val.district_code) selected = "selected";
                $("select[name='district_code']").append('<option value="' + val.district_code + '" ' + selected + '>' + val.district_name + '</option>');
              });
            },
            error: function (err) {
              console.log(err);
            }
          });
        }

        if (getParameter('city_code')) district(getParameter('city_code'));
    </script>
</body>
</html>