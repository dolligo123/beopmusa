    <!--s:푸터-->
    <footer>
        <div class="bottom">
            <div class="container">
                <h3 class="name"><?=$data[0]['title']?></h3>
                <div class="info-list cleaffx">
                    <span><?=$data[0]['owner']?></span><span class="bar"></span>
                    <span>전화번호 : <?=$data[0]['tel']?></span><br>
                    <span>사업자번호 : <?=$data[0]['b_number']?></span><br>
                    <span><?=$data[0]['addr_new']?> <?=$data[0]['addr_sub']?></span>
                    <span class="copyright">Copyright © 법무사네트워크 All rights reserved.</span>
                </div>

                <div class="bottom-logo">
                    <a href="#" class="foot-logo icon">법무사넷</a>
                    <p><?=$data[0]['city_name']?> <?=$data[0]['district_name']?> | <?=$data[0]['sub_name']?></p>
                </div>
            </div>
        </div>
    </footer>
    <!--e:푸터-->


    <!--s:개인정보수집-->
    <div id="privacy_pop" class="none">
        <div class="box">
            <a href="#" class="btn_close"><img src="../images/close-btn-w.svg" alt="닫기"></a>
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



    </div>

    <script>
        //갤러리 스와이퍼
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            slidesPerView: 2.1,
            slidesPerColumn: 2,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
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
    </script>
</body>
</html>