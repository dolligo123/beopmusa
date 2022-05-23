	<main>
		<div class="quick-search-wrap">
			<form action="/beopmusa">
				<div class="container">
					<h3><strong>지역명</strong>으로 <br><strong>빠르게 찾기</strong></h3>
					<div class="select-block clearfx">
						<ul>
							<li>
								<dl>
									<dt>시/도</dt>
									<dd>
										<select name="city_code">
											<option value="">광역시선택</option>
										</select>
									</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt>시/구/군</dt>
									<dd>
										<select name="district_code">
											<option value="">시군구선택</option>
										</select>
									</dd>
								</dl>
							</li>
						</ul>
						<button type="submit" class="search-btn">검색<span class="icon"></span></button>
					</div>
				</div>
			</form>
		</div>

		<div class="sub-breadcrumb">
			<div class="container">
				<ul class="clearfx">
					<li><a href="/" class="icon home">홈</a></li>
					<li><a href="/beopmusa">내 지역 인생 법무사 찾기</a></li>
				</ul>
			</div>
		</div>

		<div class="office-name-wrap">
			<h3><?= $data[0]['title'] ?></h3>
			<ul class="location">
				<li><?= $data[0]['city_name'] ?> <?= $data[0]['district_name'] ?></li>
				<li><?= $data[0]['sub_name'] ?></li>
			</ul>
		</div>

		<div class="container">
			<div class="office-intro-wrap">
				<img src="<?= $data[0]['intro_photo'] ?>" alt="소개 이미지">
			</div>
			<div class="office-info-wrap">
				<div class="left">
					<div class="profile" style="<?php if ($data[0]['owner_photo']) echo 'background-image: url(' . $data[0]['owner_photo'] . ')'; ?>"></div>
					<div class="info">
						<h4><?= $data[0]['owner'] ?> 법무사</h4>
						<?php
						$owner_intro = explode("\n", $data[0]['owner_intro']);
						if ($owner_intro[0] != '') :
							echo "<ul>";
							foreach ($owner_intro as $item) {
								echo "<li>{$item}</li>";
							}
							echo "</ul>";
						endif;
						?>
					</div>
				</div>
				<div class="right">
					<div class="link-btns">
						<?php if ($data[0]['homepage']) : ?>
							<a href="<?= $data[0]['homepage'] ?>" class="icon home on" target="_blank">홈페이지</a>
						<?php endif; ?>
						<?php if ($data[0]['blog']) : ?>
							<a href="<?= $data[0]['blog'] ?>" class="icon blog on" target="_blank">블로그</a>
						<?php endif; ?>
					</div>
					<dl>
						<dt>전화번호</dt>
						<dd class="tel"><a href="tel:<?= $data[0]['tel'] ?>"><?= $data[0]['tel'] ?></a></dd>
					</dl>
					<dl>
						<dt>지하철</dt>
						<dd>
							<?php for ($i = 1; $i <= 5; $i++) : ?>
								<span class="subway"><em class="line-<?= $data[0]['subway_line' . $i] ?>"><?= $data[0]['subway_name' . $i] ?></em><?= $data[0]['subway' . $i] ?></span>
							<?php endfor ?>
						</dd>
					</dl>
					<dl>
						<dt>주소</dt>
						<dd>
							<dl class="address">
								<dt>도로명</dt>
								<dd><?= $data[0]['addr_new'] ?> <?= $data[0]['addr_sub'] ?></dd>
							</dl>
							<dl class="address">
								<dt>지번</dt>
								<dd><?= $data[0]['addr_old'] ?> <?= $data[0]['addr_sub'] ?></dd>
							</dl>
						</dd>
					</dl>
					<p><?= nl2br($data[0]['hp_desc']) ?></p>
				</div>
			</div>

			<?php
			$tags = explode(',', $data[0]['tags']);
			if ($tags[0] != '') :
			?>
				<div class="tag-wrap">
					<h2 class="section-tit">주요 업무 분야</h2>
					<ul>
						<?php
						foreach ($tags as $item) {
							echo "<li><a href='/beopmusa?keyword=" . urlencode($item) . "'>{$item}</a></li>";
						}
						?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ($data[0]['news_url1'] || $data[0]['news_url2'] || $data[0]['news_url3']) : ?>
				<div class="news-wrap">
					<h2 class="section-tit">공지 및 뉴스</h2>
					<ul>
						<?php
						if ($data[0]['news_url1'] && $data[0]['news_title1']) echo '<li><a href="' . $data[0]['news_url1'] . '" target="_blank">' . $data[0]['news_title1'] . '</a></li>';
						else if ($data[0]['news_title1']) echo '<li>' . $data[0]['news_title1'] . '</li>';

						if ($data[0]['news_url2'] && $data[0]['news_title2']) echo '<li><a href="' . $data[0]['news_url2'] . '" target="_blank">' . $data[0]['news_title2'] . '</a></li>';
						else if ($data[0]['news_title2']) echo '<li>' . $data[0]['news_title2'] . '</li>';

						if ($data[0]['news_url3'] && $data[0]['news_title3']) echo '<li><a href="' . $data[0]['news_url3'] . '" target="_blank">' . $data[0]['news_title3'] . '</a></li>';
						else if ($data[0]['news_title3']) echo '<li>' . $data[0]['news_title3'] . '</li>';						?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="timetable-wrap">
				<h2 class="section-tit">업무 시간</h2>
				<table>
					<thead>
						<tr>
							<th></th>
							<th>OPEN</th>
							<th>CLOSE</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$arr_day = array("월", "화", "수", "목", "금", "토", "일");
						$arr_eng = array("mon", "tue", "wed", "thu", "fri", "sat", "sun");
						$k = 0;
						foreach ($arr_eng as $val) :
							if ($data[0][$val . '_open'] || $data[0][$val . '_close']) :
								$isnight = "";
								// if ($data[0][$val . '_isnight']) $isnight = '<strong>야간진료</strong>';
								echo "
				                    <tr>
				                        <th>{$arr_day[$k]}요일</th>
				                        <td>{$data[0][$val . '_open']}</td>
				                        <td>{$isnight}{$data[0][$val . '_close']}</td>
				                    </tr>			           				
			           			";
							else :
								echo "
				                    <tr>
				                        <th>{$arr_day[$k]}요일</th>
				                        <td colspan='2'>휴무</td>
				                    </tr>						   			
					   			";
							endif;
							$k++;
						endforeach
						?>
						<tr class="lunch">
							<th>점심시간</th>
							<td colspan="2">※ <?= $data[0]['lunch_desc'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="map-wrap">
				<h2 class="section-tit">주차 및 교통안내</h2>
				<p><?= nl2br($data[0]['addr_desc']) ?></p>
			</div>

			<div class="map-wrap">
				<h2 class="section-tit">오시는 길</h2>
				<div class="map-box">
					<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=d8cee4831342503056274b86d8723fb1"></script>
					<div id="map" class="root_daum_roughmap root_daum_roughmap_landing" style="height: 350px;"></div>
					<?php
					$width = 20 * mb_strlen($data[0]["title"]);
					?>
					<script>
						var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
							mapOption = {
								center: new kakao.maps.LatLng(<?= $data[0]["lat"] ?>, <?= $data[0]["lng"] ?>), // 지도의 중심좌표
								level: 3 // 지도의 확대 레벨
							};

						var map = new kakao.maps.Map(mapContainer, mapOption);

						// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
						var mapTypeControl = new kakao.maps.MapTypeControl();

						// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
						// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
						map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

						// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
						var zoomControl = new kakao.maps.ZoomControl();
						map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

						// 마커가 표시될 위치입니다 
						var markerPosition = new kakao.maps.LatLng(<?= $data[0]["lat"] ?>, <?= $data[0]["lng"] ?>);

						// 마커를 생성합니다
						var marker = new kakao.maps.Marker({
							position: markerPosition
						});

						// 마커가 지도 위에 표시되도록 설정합니다
						marker.setMap(map);

						var iwContent = '<div style="padding:10px;width:<?= $width ?>px;">' + '<?= $data[0]["title"] ?>' + '</div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
							iwPosition = new kakao.maps.LatLng(<?= $data[0]["lat"] ?>, <?= $data[0]["lng"] ?>); //인포윈도우 표시 위치입니다

						// 인포윈도우를 생성합니다
						var infowindow = new kakao.maps.InfoWindow({
							position: iwPosition,
							content: iwContent
						});

						// 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
						infowindow.open(map, marker);
					</script>

					<div class="btn-wrap">
						<a href="http://map.naver.com/index.nhn?enc=utf8&level=13&lng=<?= $data[0]['lng'] ?>&lat=<?= $data[0]['lat'] ?>&pinTitle=<?= $data[0]['title'] ?>&pinType=SITE" target="_blank" class="link-btn naver">네이버 지도 보기</a>
						<a href="https://map.kakao.com/link/map/<?= $data[0]['title'] ?>,<?= $data[0]['lat'] ?>,<?= $data[0]['lng'] ?>" target="_blank" class="link-btn kakao">맵 보기</a>
					</div>

				</div>
			</div>

			<div class="gallery-wrap">
				<div class="swiper-container gallery-top">
					<div class="swiper-wrapper">
						<?php
						for ($i = 1; $i <= 6; $i++) :
							if ($data[0]['photo' . $i])
								echo '<div class="swiper-slide" style="background-image:url(' . $data[0]['photo' . $i] . ')"></div>';
						endfor;
						?>
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white"></div>
					<div class="swiper-button-prev swiper-button-white"></div>
				</div>
				<div class="swiper-container gallery-thumbs">
					<div class="swiper-wrapper">
						<?php
						for ($i = 1; $i <= 6; $i++) :
							if ($data[0]['photo' . $i])
								echo '<div class="swiper-slide" style="background-image:url(' . $data[0]['photo' . $i] . ')"></div>';
						endfor;
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="service-wrap bg-color-1 mt-50">
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

		<!-- <div class="search-wrap">
			<div class="container">
				<div class="title">
					<h4>원하시는 검색 결과를 다시 빠르게 찾길 원하신다면</h4>
					<h3>검색창을 이용해 보세요</h3>
				</div>
				<form action="/beopmusa">
					<div class="search-block">
						<input type="text" name="keyword" placeholder="상호/상담분야/지역명/지하철역으로 바로찾기!"><button class="icon">검색</button>
					</div>
				</form>
			</div>
		</div> -->

		<?php if ($data[0]['kakao'] || $data[0]['naver']) : ?>
			<div class="quick-button-wrap">
				<h3>실시간 상담문의</h3>
				<ul>
					<?php
					if ($data[0]['kakao']) echo '<li><a href="' . $data[0]['kakao'] . '" target="_blank"><span class="icon kakao"></span><span class="text">카카오톡</span></a></li>';
					if ($data[0]['naver']) echo '<li><a href="' . $data[0]['naver'] . '" target="_blank"><span class="icon naver"></span><span class="text">네이버톡톡</span></a></li>';
					?>
				</ul>
			</div>
		<?php endif; ?>
	</main>

	<script>
		//갤러리 스와이퍼
		var galleryThumbs = new Swiper('.gallery-thumbs', {
			slidesPerView: 2.1,
			slidesPerColumn: 6,
			watchSlidesVisibility: true,
			watchSlidesProgress: true
		});
		var galleryTop = new Swiper('.gallery-top', {
			spaceBetween: 10,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev'
			},
			thumbs: {
				swiper: galleryThumbs
			}
		});
	</script>