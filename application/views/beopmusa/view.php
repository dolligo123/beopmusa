	<main>
	    <div class="quick-search-wrap">
	        <div class="container">
	            <h3><strong>지역명</strong>으로 <br><strong>빠르게 찾기</strong></h3>
	            <div class="select-block clearfx">
		            <form action="/beopmusa">
	                <dl>
	                    <dt>시/도</dt>
	                    <dd>
	                        <select name="city_code">
		                        <option value="">광역시선택</option>
	                        </select>
	                    </dd>
	                </dl>
	                <dl>
	                    <dt>시/구/군</dt>
	                    <dd>
	                        <select name="district_code">
	                            <option value="">시군구선택</option>
	                        </select>
	                    </dd>
	                </dl>
	                <button type="submit" class="search-btn">검색<span class="icon"></span></button>
		            </form>
	            </div>
	        </div>
	    </div>
	    <div class="sub-breadcrumb">
	        <div class="container">
	            <ul class="clearfx">
	                <li><a href="/" class="icon home">홈</a></li>
	                <li><a href="/beopmusa">내 지역 한의원 찾기</a></li>
	                <li><a href="/beopmusa/<?=$data[0]['bp_id']?>">지점 자세히보기</a></li>
	            </ul>
	        </div>
	    </div>
	
	    <div class="container">
	        <div class="hospital-name">
	            <h3><?=$data[0]['title']?></h3>
	            <ul class="location">
	                <li><?=$data[0]['city_name']?> <?=$data[0]['district_name']?></li>
	                <li><?=$data[0]['sub_name']?></li>
	            </ul>
	            <span class="open-wrap">
	            	<?php if($data[0]['isnight']): ?>
	                <span class="night">야간진료</span>
	                <?php endif; ?>
	                <?php if($data[0]['issunday']): ?>
	                <span class="sunday">일요일진료</span>
	                <?php endif; ?>
	            </span>
	        </div>
	        <div class="hospital-info clearfx">
	            <div class="doctor-box">
	                <div class="doctor" style="<?php if($data[0]['owner_photo']) echo 'background-image: url('.$data[0]['owner_photo'].')'; ?>"></div>
	                <strong><?=$data[0]['owner']?> 원장</strong>
	            </div>
	            <div class="info-box">
	                <div class="link-btns">
		                <?php if($data[0]['homepage']): ?>
	                    <a href="<?=$data[0]['homepage']?>" class="icon home on" target="_blank">홈페이지</a>
	                    <?php endif; ?>
	                    <?php if($data[0]['blog']): ?>
	                    <a href="<?=$data[0]['blog']?>" class="icon blog on" target="_blank">블로그</a>
	                    <?php endif;?>
	                    <?php if($data[0]['kakao']): ?>
	                    <a href="<?=$data[0]['kakao']?>" class="icon kakao on" target="_blank">카카오톡</a>
	                    <?php endif;?>
	                </div>
	                <dl>
	                    <dt>전화번호</dt>
	                    <dd class="tel"><a href="tel:<?=$data[0]['tel']?>"><?=$data[0]['tel']?></a></dd>
	                </dl>
	                <dl>
	                    <dt>지하철</dt>
	                    <dd>
	                    	<?php for($i=1; $i<=5; $i++): ?>
	                        <span class="subway"><em class="line-<?=$data[0]['subway_line'.$i]?>"><?=$data[0]['subway_name'.$i]?></em><?=$data[0]['subway'.$i]?></span>
	                        <?php endfor?>
	                    </dd>
	                </dl>
	                <dl>
	                    <dt>주소</dt>
	                    <dd>
	                        <dl class="address">
	                            <dt>도로명</dt>
	                            <dd><?=$data[0]['addr_new']?> <?=$data[0]['addr_sub']?></dd>
	                        </dl>
	                        <dl class="address">
	                            <dt>지번</dt>
	                            <dd><?=$data[0]['addr_old']?> <?=$data[0]['addr_sub']?></dd>
	                        </dl>
	                    </dd>
	                </dl>
	                <p><?=nl2br($data[0]['addr_desc'])?></p>
	                <br>
	                <p><?=nl2br($data[0]['hp_desc'])?></p>
	            </div>
	        </div>
	        <div class="hospital-timetable">
	            <h2 class="section-tit">진료 시간</h2>
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
			            foreach($arr_eng as $val):
			           		if($data[0][$val.'_open'] || $data[0][$val.'_close']):
			           			$isnight = "";
			           			if($data[0][$val.'_isnight']) $isnight = '<strong>야간진료</strong>';
			           			echo "
				                    <tr>
				                        <th>{$arr_day[$k]}요일</th>
				                        <td>{$data[0][$val.'_open']}</td>
				                        <td>{$isnight}{$data[0][$val.'_close']}</td>
				                    </tr>			           				
			           			";
					   		else:
					   			echo "
				                    <tr>
				                        <th>{$arr_day[$k]}요일</th>
				                        <td colspan='2'>휴진일</td>
				                    </tr>						   			
					   			";
			           		endif;
			           		$k++;
			           	endforeach    
		            ?>
	                    <tr class="lunch">
	                        <th>점심시간</th>
	                        <td colspan="2">※ <?=$data[0]['lunch_desc']?></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
	        <div class="hospital-map clearfx">
	            <h2 class="section-tit">오시는 길</h2>
	            <div class="map-box">
                    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=d8cee4831342503056274b86d8723fb1"></script>		            
                    <div id="map" class="root_daum_roughmap root_daum_roughmap_landing" style="height: 350px;"></div>
                    <?php
	                    $width = 20*mb_strlen($data[0]["title"]);
                    ?>
                    <script>
                    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
                        mapOption = { 
                            center: new kakao.maps.LatLng(<?=$data[0]["lat"]?>, <?=$data[0]["lng"]?>), // 지도의 중심좌표
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
                    var markerPosition  = new kakao.maps.LatLng(<?=$data[0]["lat"]?>, <?=$data[0]["lng"]?>); 

                    // 마커를 생성합니다
                    var marker = new kakao.maps.Marker({
                        position: markerPosition
                    });

                    // 마커가 지도 위에 표시되도록 설정합니다
                    marker.setMap(map);

                    var iwContent = '<div style="padding:10px;width:<?=$width?>px;">' + '<?=$data[0]["title"]?>' + '</div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
                        iwPosition = new kakao.maps.LatLng(<?=$data[0]["lat"]?>, <?=$data[0]["lng"]?>); //인포윈도우 표시 위치입니다

                    // 인포윈도우를 생성합니다
                    var infowindow = new kakao.maps.InfoWindow({
                        position : iwPosition, 
                        content : iwContent 
                    });

                    // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
                    infowindow.open(map, marker); 
                    </script>
	
					<div class="btn-wrap">
                        <a href="http://map.naver.com/index.nhn?enc=utf8&level=13&lng=<?=$data[0]['lng']?>&lat=<?=$data[0]['lat']?>&pinTitle=<?=$data[0]['title']?>&pinType=SITE" target="_blank" class="link-btn naver">네이버 지도 보기</a>
                        <a href="https://map.kakao.com/link/map/<?=$data[0]['title']?>,<?=$data[0]['lat']?>,<?=$data[0]['lng']?>" target="_blank" class="link-btn kakao">맵 보기</a>
                    </div>                    	                
	                
	            </div>
	        </div>
	        <div class="hospital-gallery">
	            <div class="swiper-container gallery-top">
	                <div class="swiper-wrapper">
		                <?php 
			            for($i=1; $i<=6; $i++): 
		                	if($data[0]['photo'.$i])
								echo '<div class="swiper-slide" style="background-image:url('.$data[0]['photo'.$i].')"></div>';
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
			            for($i=1; $i<=6; $i++): 
		                	if($data[0]['photo'.$i])
								echo '<div class="swiper-slide" style="background-image:url('.$data[0]['photo'.$i].')"></div>';
	                    endfor;
	                    ?>
	                </div>
	            </div>
	        </div>
	    </div>
	
	    <div class="search-wrap">
	        <div class="container">
	            <h4>원하시는 검색 결과를 <br>다시 빠르게 찾길 원하신다면</h4>
	            <h3><strong>검색창</strong>을 이용해보세요.</h3>
	            <form action="/beopmusa">
	                <div class="search-block">
	                    <input type="text" name="keyword" placeholder="중요시설/지역명/지하철역명으로 바로찾기!"><button class="icon">검색</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</main>
	

	<script>
		//갤러리 스와이퍼
		var galleryThumbs = new Swiper('.gallery-thumbs', {
			slidesPerView: 2.1,
			slidesPerColumn: 2,
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