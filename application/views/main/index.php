    <main>
    	<div class="banner-wrap" id="banner-pc" style="display: none;">
    		<?php
				$i = 1;
				foreach ($banner_pc['data'] as $item) :
				?>
    			<a href="<?= $item['banner_link'] ?>" class="banner-<?= $i ?> to-right" style="background-color: <?= $item['color'] ?>; background-image:url(<?= $item['banner_file1'] ?>)">
    				<p style="background-image:url(<?= $item['banner_file2'] ?>"></p>
    			</a>
    		<?php
					$i++;
				endforeach;
				?>
    	</div>
    	<div class="banner-wrap" id="banner-mobile" style="display: none;">
    		<?php
				$i = 1;
				foreach ($banner_mobile['data'] as $item) :
				?>
    			<a href="<?= $item['banner_link'] ?>" class="banner-<?= $i ?> to-right" style="background-color: <?= $item['color'] ?>; background-image:url(<?= $item['banner_file3'] ?>)">
    				<p style="background-image:url(<?= $item['banner_file2'] ?>"></p>
    			</a>
    		<?php
					$i++;
				endforeach;
				?>
    	</div>

    	<div class="sm-search-wrap">
    		<div class="container">
    			<h3>전국 <strong><?= $this->dinfo['total_count'] ?>개,</strong></h3>
    			<p>내 지역 인생 법무사 찾기</p>
    			<form action="/beopmusa">
    				<div class="search-block">
    					<select name="city_code">
    						<option value="">광역시 선택</option>
    					</select>
    					<select name="district_code">
    						<option value="">시군구 선택</option>
    					</select>
    					<button type="submit">검색<span class="icon"></span></button>
    				</div>
    				<p>실시간 빠른 원스톱 법무상담 서비스를 위해<br />법무사넷에서는<br /><strong>[지역 대표 법무사 지정]</strong><br />시스템으로 운영됩니다.</p>
    			</form>
    		</div>
    	</div>

    	<div class="service-wrap">
    		<div class="container">
    			<h3>우리 지역 대표 법무사<br /><strong>원스톱 서비스 전문 상담분야</strong></h3>
    			<ul class="service-list">
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-1.png" alt="아이콘">
    							<h3>기업 법무</h3>
    						</div>
    						<div class="bottom">
    							<span>회사 법인 설립</span>
    							<span class="bar"></span>
    							<span>법인 전환</span>
    							<span class="bar"></span>
    							<span>상호 임원 등 각종 변경</span>
    							<span class="bar"></span>
    							<span>상업등기</span><br />
    							<span>계약서 컨설팅</span>
    							<span class="bar"></span>
    							<span>상사소송</span>
    							<span class="bar"></span>
    							<span>합병·분할·해산·청산 등</span>
    						</div>
    					</div>
    				</li>
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-2.png" alt="아이콘">
    							<h3>부동산 등기</h3>
    						</div>
    						<div class="bottom">
    							<span>소유권이전등기</span>
    							<span class="bar"></span>
    							<span>저당권설정등기</span>
    							<span class="bar"></span>
    							<span>동산·채권담보</span>
    							<span class="bar"></span>
    							<span>신탁등기</span>
    							<br />
    							<span>주택·상가임대차</span>
    							<span class="bar"></span>
    							<span>재개발·재건축 등</span>
    						</div>
    					</div>
    				</li>
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-3.png" alt="아이콘">
    							<h3>집행·공탁</h3>
    						</div>
    						<div class="bottom">
    							<span>부동산경·공매</span>
    							<span class="bar"></span>
    							<span>동산압류·가압류</span>
    							<span class="bar"></span>
    							<span>부동산인도·철거</span>
    							<br />
    							<span>채권압·추심</span>
    							<span class="bar"></span>
    							<span>각종 공탁</span>
    							<span class="bar"></span>
    							<span>공탁금출·회수 등</span>
    						</div>
    					</div>
    				</li>
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-4.png" alt="아이콘">
    							<h3>법률분쟁</h3>
    						</div>
    						<div class="bottom">
    							<span>각종 소송서류(소장,고소,고발장 등) 작성</span>
    							<span class="bar"></span>
    							<span>각종 가압류·가처분</span>
    							<br />
    							<span>분쟁 조정 등</span>
    						</div>
    					</div>
    				</li>
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-5.png" alt="아이콘">
    							<h3>파산·회생</h3>
    						</div>
    						<div class="bottom">
    							<span>개인회·파산</span>
    							<span class="bar"></span>
    							<span>법인회생·파산</span>
    							<span class="bar"></span>
    							<span>회생 신청서 작성 및 상담</span>
    							<br />
    							<span>상속재산·파산</span>
    							<span class="bar"></span>
    							<span>변제계획서 작성</span>
    							<span class="bar"></span>
    							<span>면제재산 신청 등</span>
    						</div>
    					</div>
    				</li>
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-6.png" alt="아이콘">
    							<h3>사망·상속</h3>
    						</div>
    						<div class="bottom">
    							<span>상속등기</span>
    							<span class="bar"></span>
    							<span>상속재산분할</span>
    							<span class="bar"></span>
    							<span>상속포기</span>
    							<span class="bar"></span>
    							<span>한정승인</span>
    							<span class="bar"></span>
    							<span>증여·유증</span>
    							<br />
    							<span>유언대용신탁 등</span>
    						</div>
    					</div>
    				</li>
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-7.png" alt="아이콘">
    							<h3>성년 후견</h3>
    						</div>
    						<div class="bottom">
    							<span>성년후견개시 심판청구</span>
    							<span class="bar"></span>
    							<span>후견계약</span>
    							<span class="bar"></span>
    							<span>성년후견인 활동</span>
    							<span class="bar"></span>
    							<span>후견감독</span>
    							<br />
    							<span>재산관리·신상보호 등</span>
    						</div>
    					</div>
    				</li>
    				<li>
    					<div class="block">
    						<div class="top">
    							<img src="../images/icon-service-8.png" alt="아이콘">
    							<h3>출생·혼인·가사</h3>
    						</div>
    						<div class="bottom">
    							<span>가사비송</span>
    							<span class="bar"></span>
    							<span>혼인·이혼</span>
    							<span class="bar"></span>
    							<span>출생확인</span>
    							<span class="bar"></span>
    							<span>친자관계(부)존재확인</span>
    							<br />
    							<span>성본창설 변경</span>
    							<span class="bar"></span>
    							<span>양육비청구</span>
    							<span class="bar"></span>
    							<span>입양·파양</span>
    							<span class="bar"></span>
    							<span>국적취득 등</span>
    						</div>
    					</div>
    				</li>
    			</ul>
    		</div>
    	</div>

    	<div class="lg-office-wrap">
    		<div class="container">
    			<form action="/beopmusa">
    				<div class="title">
    					<h4>빠르고 정확한 법무서비스 제공을 위해</h4>
    					<h3>법무사넷에서는 <strong>[지역 전담 법무사]</strong> 시스템으로 운영됩니다</h3>
    					<div class="search-block">
    						<input type="search" name="keyword" placeholder="해시태그/지역명/지하철역명으로 바로찾기!">
    						<button class="icon">찾기</button>
    					</div>
    				</div>
    			</form>

    			<div class="soting-block">
    				<div class="left">
    					<span>전체 가맹점 수</span><strong class="count"><?= $this->dinfo['total_count'] ?></strong>
    					<span>현재 지역</span><strong id="m-tit">전국</strong>
    					<span>가맹점 수</span><strong class="count" id="dd-count"></strong>
    				</div>
    				<form action="/beopmusa" id="formH">
    					<input type="hidden" name="lat" />
    					<input type="hidden" name="lng" />
    					<input type="hidden" name="keyword" value="<?= $this->input->get("keyword") ?>" />
    					<input type="hidden" name="orderby" value="join_date" />
    					<input type="hidden" name="sort" value="desc" />
    					<input type="hidden" name="page" value="1" />
    					<div class="right">
    						<select name="city_code">
    							<option value="">전국</option>
    						</select>
    						<select id="ord">
    							<option value="join_date_desc">가입순</option>
    							<option value="join_date">가입역순</option>
    							<option value="title">가나다순</option>
    							<option value="title_desc">가나다역순</option>
    							<option value="dist">거리순</option>
    						</select>
    					</div>
    				</form>
    			</div>
    			<ul class="office-list">
    			</ul>
    			<div class="pagenation-block">
    			</div>
    			</form>
    		</div>
    	</div>

    	<div class="receipt-wrap">
    		<div class="container">
    			<h3>실시간 상담 접수 현황</h3>
    			<div class="receipt-list">
    				<ul class="head">
    					<li>신청자명</li>
    					<li>상담 지역</li>
    					<li>상담 분야</li>
    					<li>상담 제목</li>
    					<li>신청일</li>
    				</ul>
    				<div class="receipt-swiper">
    					<ul class="swiper-wrapper">
    						<?php
								foreach ($counselq as $item) :
									$timestamp = strtotime("-1 days");
									$date1 = date("ymd", $timestamp);
									$regDate = date('ymd', strtotime($item['regist_date']));
									if ($regDate >= $date1) $new = 'new';
									else $new = '';
								?>
    							<li class="swiper-slide <?= $new ?>">
    								<span><?= $item['name'] ?></span>
    								<span><?= $item['city'] ?>/<?= $item['district'] ?></span>
    								<span><?= str_replace(',', ' / ', $item['fields']) ?></span>
    								<span><?= $item['title'] ?></span>
    								<span><?= date('y.m.d', strtotime($item['regist_date'])) ?></span>
    							</li>
    						<?php
								endforeach;
								?>
    					</ul>
    					<div class="swiper-button-next"></div>
    					<div class="swiper-button-prev"></div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="form-wrap">
    		<div class="container">
    			<form action="/counselq/post" method="post" onsubmit="return chkval()">
    				<div class="title">
    					<h3>
    						궁금한 법무, 지금 상담 신청을 남기면<br>
    						<strong>가장 가까운 법무사가 연락을 드립니다.</strong>
    					</h3>
    					<p>이제 실시간으로 원스톱 법무상담 서비스를 한 곳에서!</p>
    				</div>
    				<div class="write-wrap">
    					<ul class="write-box">
    						<li class="pc">
    							<h3>이름 *</h3>
    						</li>
    						<li class="essential">
    							<input type="text" name="name" placeholder="이름을 입력해 주세요" required>
    						</li>
    						<li class="pc">
    							<h3>연락처 *</h3>
    						</li>
    						<li class="essential">
    							<input type="text" name="tel" placeholder="연락처를 입력해 주세요" required>
    						</li>
    						<li>
    							<h3>상담지역 *</h3>
    						</li>
    						<li>
    							<select name="city_code" required>
    								<option value="">전국</option>
    							</select>
    							<select name="district_code" required>
    								<option value="">전체</option>
    							</select>
    						</li>
    						<li class="pc">
    							<h3>통화 가능 시간</h3>
    						</li>
    						<li>
    							<input type="text" name="call_time" placeholder="통화 가능 시간을 입력해 주세요">
    						</li>
    					</ul>
    					<ul class="write-box">
    						<li>
    							<h3>상담 희망 분야 <span>(중복 선택 가능)</span> *</h3>
    						</li>
    						<li class="flex-wrap">
    							<input type="hidden" name="fields" required />
    							<label for="item-1">
    								<input type="checkbox" id="item-1" class="fields" value="기업법무">
    								<span class="check"></span><span>기업 법무</span>
    							</label>
    							<label for="item-2">
    								<input type="checkbox" id="item-2" class="fields" value="부동산등기">
    								<span class="check"></span><span>부동산등기</span>
    							</label>
    							<label for="item-3">
    								<input type="checkbox" id="item-3" class="fields" value="성년후견">
    								<span class="check"></span><span>성년 후견</span>
    							</label>
    							<label for="item-4">
    								<input type="checkbox" id="item-4" class="fields" value="집행.공탁">
    								<span class="check"></span><span>집행.공탁</span>
    							</label>
    							<label for="item-5">
    								<input type="checkbox" id="item-5" class="fields" value="법률분쟁">
    								<span class="check"></span><span>법률분쟁</span>
    							</label>
    							<label for="item-6">
    								<input type="checkbox" id="item-6" class="fields" value="출생혼인가사">
    								<span class="check"></span><span>출생 혼인 가사</span>
    							</label>
    							<label for="item-7">
    								<input type="checkbox" id="item-7" class="fields" value="파산.회생">
    								<span class="check"></span><span>파산.회생</span>
    							</label>
    							<label for="item-8">
    								<input type="checkbox" id="item-8" class="fields" value="사망상속">
    								<span class="check"></span><span>사망 상속</span>
    							</label>
    						</li>
    						<li class="pc">
    							<h3>상담 제목 *</h3>
    						</li>
    						<li class="essential">
    							<input type="text" name="title" placeholder="상담 제목을 입력해 주세요" required>
    						</li>
    						<li class="pc">
    							<h3>상담 내용 *</h3>
    						</li>
    						<li class="essential">
    							<textarea placeholder="상담 내용을 입력해 주세요" name="desc" required></textarea>
    						</li>
    						<li class="absolute-bottom">
    							<label for="chk-agree">
    								<input type="checkbox" id="chk-agree" name="confirm" value="1" required />
    								<span class="check"></span>
    								<span>개인정보 수집 및 이용 동의 <a href="#" class="btn_privacy">&#91;자세히&#93;</a></span>
    							</label>
    						</li>
    					</ul>
    				</div>
    				<button class="submit-btn">상담 신청하기<span class="icon"></span></button>
    			</form>
    		</div>
    	</div>

    	<!--s:개인정보수집-->
    	<div id="privacy_pop" class="none">
    		<div class="box">
    			<a href="#" class="btn_close"><img src="../images/close-btn-w.svg" alt="닫기"></a>
    			<strong>개인정보처리(취급)방침</strong>
    			<div class="agree_box">'법무사네트워크'는(이하 ‘사이트’) 고객님의 개인정보를 중요시하며, "정보통신망 이용촉진 및 정보보호"에 관한 법률을 준수하고 있습니다.

    				사이트는 개인정보취급방침을 통하여 고객님께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며, 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.
    				사이트는 개인정보취급방침을 개정하는 경우 웹사이트 공지사항(또는 개별공지)을 통하여 공지할 것입니다.
    				ο 본 방침은 : 2020 년 12 월 01 일 부터 시행됩니다.

    				■ 수집하는 개인정보 항목
    				사이트는 지점 가맹문의을 위해 아래와 같은 개인정보를 수집하고 있습니다.
    				ο 수집항목 : 이름, 법무사명, 지역명, 연락처, 이메일
    				ο 개인정보 수집방법 : 홈페이지(온라인 가입문의)

    				■ 개인정보의 수집 및 이용목적
    				사이트는 수집한 개인정보를 다음의 목적을 위해 활용합니다.
    				ο 서비스 문의에 관한 계약 이행 및 서비스 제공

    				■ 개인정보의 보유 및 이용기간
    				사이트는 개인정보의 수집목적 또는 제공받은 목적이 달성된 때에는 귀하의 개인정보를 지체 없이 파기합니다.

    				■ 개인정보 제공 동의 거부 권리 및 동의 거부 따른 불이익 내용 또는 제한사항
    				이용자의 개인정보를 원칙적으로 외부에 제공하지 않습니다. 다만, 아래의 경우에는 예외로 합니다.
    				- 이용자들이 사전에 동의한 경우
    				- 법령의 규정에 의거하거나, 수사 목적으로 법령에 정해진 절차와 방법에 따라 수사기관의 요구가 있는 경우

    				■ 개인정보의 파기절차 및 방법
    				ο 사이트는 개인정보 보유기간의 경과, 처리목적 달성 등 개인정보가 불필요하게 되었을 때에는 지체없이 해당 개인정보를 파기합니다.
    				ο 정보주체로부터 동의받은 개인정보 보유기간이 경과하거나 처리목적이 달성되었음에도 불구하고 다른 법령에 따라 개인정보를 계속 보존하여야 하는 경우에는, 해당 개인정보를 별도의 데이터베이스(DB)로 옮기거나 보관장소를 달리하여 보존합니다.
    				ο 개인정보 파기의 절차 및 방법은 다음과 같습니다.
    				1. 파기절차
    				사이트는 파기 사유가 발생한 개인정보를 선정하고, 사이트의 개인정보 보호책임자의 승인을 받아 개인정보를 파기합니다.
    				2. 파기방법
    				사이트는 전자적 파일 형태로 기록․저장된 개인정보는 기록을 재생할 수 없도록 파기하며, 종이 문서에 기록․저장된 개인정보는 분쇄기로 분쇄하거나 소각하여 파기합니다.

    				■ 개인정보의 안전성 확보조치
    				사이트는 개인정보의 안전성 확보를 위해 다음과 같은 조치를 취하고 있습니다.
    				1. 관리적 조치 : 내부관리계획 수립․시행, 정기적 직원 교육 등
    				2. 기술적 조치 : 개인정보처리시스템 등의 접근권한 관리, 접근통제시스템 설치, 고유식별정보 등의 암호화, 보안프로그램 설치

    				■ 개인정보 자동수집 장치의 설치, 운영 및 그 거부에 관한 사항
    				ο 사이트는 이용자에게 개별적인 맞춤서비스를 제공하기 위해 이용정보를 저장하고 수시로 불러오는 ‘쿠기(cookie)’를 사용합니다.
    				ο 쿠키는 웹사이트를 운영하는데 이용되는 서버(http)가 이용자의 컴퓨터 브라우저에게 보내는 소량의 정보이며 이용자들의 PC 컴퓨터내의 하드디스크에 저장되기도 합니다.
    				가. 쿠키의 사용목적: 이용자가 방문한 각 서비스와 웹 사이트들에 대한 방문 및 이용형태, 인기 검색어, 보안접속 여부, 등을 파악하여 이용자에게 최적화된 정보 제공을 위해 사용됩니다.
    				나. 쿠키의 설치∙운영 및 거부 :웹브라우저 상단의 도구>인터넷 옵션>개인정보 메뉴의 옵션 설정을 통해 쿠키 저장을 거부 할 수 있습니다.
    				다. 쿠키 저장을 거부할 경우 맞춤형 서비스 이용에 어려움이 발생할 수 있습니다.

    				■ 개인정보 보호책임자
    				사이트는 고객의 개인정보를 보호하고 개인정보와 관련한 불만을 처리하기 위하여 아래와 같이 관련 부서 및 개인정보관리책임자를 지정하고 있습니다..
    				개인정보실무책임자 : 김지태
    				직책 : 본부장
    				전화번호 02-761-1633
    				이메일 jtkim@kumsolmedia.com

    				귀하께서는 사이트의 서비스를 이용하시며 발생하는 모든 개인정보보호 관련 민원을 개인정보관리책임자 혹은 개인정보실무책임자로 신고하실 수 있습니다.
    				사이트는 이용자들의 신고사항에 대해 신속하게 충분한 답변을 드릴 것입니다.
    				기타 개인정보침해에 대한 신고나 상담이 필요하신 경우에는 아래 기관에 문의하시기 바랍니다.
    				1.개인분쟁조정위원회 (www.1336.or.kr/1336)
    				2.정보보호마크인증위원회 (www.eprivacy.or.kr/02-580-0533~4)
    				3.대검찰청 인터넷범죄수사센터 (http://icic.sppo.go.kr/02-3480-3600)
    				4.경찰청 사이버테러대응센터 (www.ctrc.go.kr/02-392-0330)
    			</div>
    		</div>
    	</div>
    	<!--e:개인정보수집-->
    </main>


    <script type="text/javascript">
    	// 현재위치 가져오기
    	function getgps() {
    		var geo_options = {
    			enableHighAccuracy: false,
    			maximumAge: 30000,
    			timeout: 4000
    		};

    		if ("geolocation" in navigator) {
    			var wpid = navigator.geolocation.getCurrentPosition(geo_success, geo_error, geo_options);
    		}
    	}

    	// 좌표 추적 에러
    	function geo_error() {
    		$("input[name='lat']").val('37.572807');
    		$("input[name='lng']").val('126.976883');
    		setTimeout(function() {
    			search();
    		}, 500);
    	}

    	// 좌표 추적 성공
    	function geo_success(position) {
    		$("input[name='lat']").val(position.coords.latitude);
    		$("input[name='lng']").val(position.coords.longitude);
    		setTimeout(function() {
    			search();
    		}, 500);
    	}

    	// ord change
    	$(document).on("change", "#ord", function() {
    		var val = $(this).val();
    		switch (val) {
    			case "join_date":
    				$("input[name='orderby']").val('join_date');
    				$("input[name='sort']").val('asc');
    				search();
    				break;
    			case "join_date_desc":
    				$("input[name='orderby']").val('join_date');
    				$("input[name='sort']").val('desc');
    				search();
    				break;
    			case "title":
    				$("input[name='orderby']").val('title');
    				$("input[name='sort']").val('asc');
    				search();
    				break;
    			case "title_desc":
    				$("input[name='orderby']").val('title');
    				$("input[name='sort']").val('desc');
    				search();
    				break;
    			case "dist":
    				$("input[name='orderby']").val('dist');
    				$("input[name='sort']").val('asc');
    				$("#spinner").removeClass("off");
    				getgps();
    				break;
    		}
    	});

    	// city change
    	$(document).on("change", "select[name='city_code']", function() {
    		search();
    	});

    	// search
    	function search() {
    		var param = $("#formH").serializeObject();
    		console.log(param);
    		// 시군구
    		$.ajax({
    			type: "get",
    			url: "/beopmusa/json",
    			data: param,
    			beforeSend: function(xhr, opts) {},
    			success: function(result) {
    				$(".office-list").html('');
    				console.log(result);
    				result.data.forEach(function(val, i) {
    					let li = Structure([
    						'<li>', [
    							'<a href="/beopmusa/' + val.bp_id + '" class="block">', [
    								'<span class="top">', [
    									'<span class="location">' + val.city_name + ' ' + val.district_name + ' > ' + val.sub_name + '</span>',
    									'<span class="name">' + val.title + '</span>',
    									'<span class="tel">' + val.tel + '</span>',
    									'<span class="right">', [
    										function() {
    											if (val.owner_photo)
    												return '<span class="face"><img src="' + val.owner_photo + '" /></span>';
    											else
    												return '<span class="face"></span>';
    										},
    										function() {
    											let tags = val.tags.split(',');
    											let html = '';
    											if (tags.length > 0) {
    												html = '<span class="tag-block">';
    												tags.forEach(tag => {
    													html += '<span class="tag">' + tag + '</span>';
    												});
    												html = '</span>'
    											}
    											return html;
    										}
    									],
    								],
    								'<span class="bottom">', [
    									'<span class="address">', [
    										'<dl>', [
    											'<dt>도로명</dt>',
    											'<dd>' + val.addr_new + '</dd>',
    										],
    										'<dl>', [
    											'<dt>지번</dt>',
    											'<dd>' + val.addr_old + '</dd>'
    										],
    									],
    									'<div class="subway">', [
    										function() {
    											var retVal = '';
    											if (val.subway1 && val.subway_line1 && !getParameter('keyword'))
    												retVal += '<dl><dt><em class="line-' + val.subway_line1 + '">' + val.subway_name1 + '</em></dt><dd>' + val.subway1 + '</dd></dl>';
    											return retVal;
    										}
    									]
    								]
    							]
    						]
    					]);
    					$(".office-list").append(li);
    				});

    				// paging
    				$(".pagenation-block").html(result.paging);

    				// 지역
    				var city_code = $("select[name='city_code']").val();
    				if (city_code) local = $("select[name='city_code'] option:checked").text();
    				else local = "전국";

    				// total_count
    				$('#dd-count').html(result.total_count);
    				$('#m-tit').html(local);

    				$("#spinner").addClass("off");
    			},
    			error: function(err) {
    				console.log(err);
    			}
    		});

    		return false;
    	}

    	setTimeout('search()', 500);

    	if ($(window).width() >= 1200) {
    		$("#banner-pc").show();
    		$("#banner-mobile").hide();
    	} else {
    		$("#banner-pc").hide();
    		$("#banner-mobile").show();
    	}

    	$(window).resize(function() {
    		if ($(window).width() > 1200) {
    			$("#banner-pc").show();
    			$("#banner-mobile").hide();
    		} else {
    			$("#banner-pc").hide();
    			$("#banner-mobile").show();
    		}
    	})

    	// page click
    	$(document).on("click", ".csspage", function(e) {
    		e.preventDefault();
    		$("input[name='page']").val($(this).attr("data-val"));
    		search();
    	});

    	var swiper = new Swiper('.receipt-swiper', {
    		direction: 'vertical',
    		slidesPerView: 8,
    		autoplay: {
    			delay: 2500,
    			disableOnInteraction: false,
    		},
    		navigation: {
    			nextEl: '.swiper-button-next',
    			prevEl: '.swiper-button-prev',
    		},
    	});

    	// 상단 접수전 체크
    	function chkval() {
    		// console.log($('input[name="fields"]:checked').val());
    		let fields = '';
    		$('.fields:checked').each(function() {
    			fields += ',' + $(this).val();
    		});
    		fields = fields.substr(1);
    		if (!fields) {
    			alert('상담 희망 분야를 선택해 주세요.');
    			return false;
    		}
    		$('input[name="fields"]').val(fields);
    	}
    </script>