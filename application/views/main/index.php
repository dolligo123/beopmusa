    <main>
        <div class="banner-wrap" id="banner-pc" style="display: none;">
            <?php 
            $i = 1;
            foreach($banner_pc['data'] as $item):
            ?>
            <a href="<?=$item['banner_link']?>" class="banner-<?=$i?> to-right" style="background-color: <?=$item['color']?>; background-image:url(<?=$item['banner_file1']?>)">
                <p style="background-image:url(<?=$item['banner_file2']?>"></p>
            </a>
            <?php 
                $i++;
            endforeach;
            ?>
        </div>
        <div class="banner-wrap" id="banner-mobile" style="display: none;">
            <?php 
            $i = 1;
            foreach($banner_mobile['data'] as $item):
            ?>
            <a href="<?=$item['banner_link']?>" class="banner-<?=$i?> to-right" style="background-color: <?=$item['color']?>; background-image:url(<?=$item['banner_file3']?>)">
                <p style="background-image:url(<?=$item['banner_file2']?>"></p>
            </a>
            <?php 
                $i++;
            endforeach;
            ?>
        </div>
        <div class="search-wrap">
            <div class="container">
                <h4>'교통사고 후유증'을 연구하고 치료하기 위해</h4>
                <h3>하나카N에서는 <br><strong>[지역별 주치 한의원 지정]</strong> <br>시스템으로 운영됩니다.</h3>
	            <form action="/beopmusa">
	                <div class="search-block">
	                    <input type="text" name="keyword" placeholder="중요시설/지역명/지하철역명으로 바로찾기!"><button class="icon">검색</button>
	                </div>
	            </form>                
            </div>
        </div>
        <div class="list-wrap main">
            <div class="container">
                <div class="soting-block clearfx">
                    <div class="left">
                        <dl>
                            <dt>현재 지역</dt>
                            <dd id="m-tit">전국</dd>
                        </dl>
                        <dl>
                            <dt>가맹점 수</dt>
                            <!-- <dd><span class="span-total-count">100</span><em>개</em></dd> -->
                            <dd id="dd-count"><em>개</em></dd>
                        </dl>
                        <div class="m-tit">전국 <strong><em>개</em>,</strong><span>내 지역 한의원 찾기</span></div>
                    </div>
                    <form action="/beopmusa" id="formH">
					<input type="hidden" name="lat" />
					<input type="hidden" name="lng" />
					<input type="hidden" name="keyword" value="<?=$this->input->get("keyword")?>" />
					<input type="hidden" name="orderby" value="join_date"  />
					<input type="hidden" name="sort"  value="desc" />
					<input type="hidden" name="page" value="1" />                        
                    <div class="right">
                        <select name="city_code">
		                    <option value="">광역시선택</option>
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
                <ul class="hospital-list col-3 clearfx">
                </ul>
                <div class="list-pagenation">
                </div>
            </div>
        </div>
        <div class="notice-wrap">
            <div class="container">
                <ul class="link-list clearfx">
                    <li><a href="/insure" class="link-1">
                            <p>나도 부담금 없이 자동차보험으로 처리 하고 싶다~ <strong>어떻게?</strong></p>
                        </a>
                    </li>
                    <li>
                        <a href="/care" class="link-2">
                            <p>교통사고 후유증 치료의 골든타임!! <strong>초반 선택이 중요한 이유?</strong></p>
                        </a>
                    </li>
                </ul>
                <ul class="notice-list">
                    <li>
                        <h3><a href="/article">미디어속 <strong>하나카N</strong></a></h3>
                        <ul>
                            <?php foreach($article['data'] as $item):?>
                            <li><a href="/article/<?=$item['at_id']?>"><span class="date"><?=date("Y.m.", strtotime($item['regist_date']))?><span class="day"><?=date("d", strtotime($item['regist_date']))?></span></span><span class="title"><?=$item['title']?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li>
                        <h3><a href="/notice">하나카N <strong>공지</a></strong></h3>
                        <ul>
                            <?php foreach($notice['data'] as $item):?>
                            <li><a href="/notice/<?=$item['nt_id']?>"><span class="date"><?=date("Y.m.", strtotime($item['regist_date']))?><span class="day"><?=date("d", strtotime($item['regist_date']))?></span></span><span class="title"><?=$item['title']?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="form-wrap">
            <div class="container">
                <form action="/joinq/post" method="post">
	                <div class="title">
	                    <h4>교통사고치료 지역 주치의 네트워크</h4>
	                    <h3><strong>하나카N</strong> 빠른 가입문의</h3>
	                    <p>하나카N 가입을 원하시는 원장님의 상담을 받습니다.(*는 필수항목)</p>
	                </div>
		            <ul class="write-box row-4 clearfx">
		                <li>
		                    <input type="text" placeholder="한의원명" name="hp_name" />
		                </li>
		                <li class="essential">
		                    <input type="text" placeholder="담당자명" name="jq_name" required />
		                </li>
		                <li class="essential">
		                    <input type="tel" placeholder="연락처" name="tel" required />
		                </li>
		                <li>
		                    <input type="text" placeholder="이메일" name="email">
		                </li>
		                <li class="essential">
		                    <input type="text" placeholder="가입 희망 지역 (시/동)" name="local" required />
		                    <div class="textarea-wrap">
		                        <textarea placeholder="문의 내용" name="jq_desc" ></textarea>
		                    </div>
		                </li>
		            </ul>
	                <label for="chk-agree"><input type="checkbox" id="chk-agree" name="confirm" value="1" required ><span class="check"></span><span>개인정보 수집 및 이용 동의 <a href="#" class="btn_privacy">&#91;자세히&#93;</a></span></label>
	                <button class="submit-btn">상담 신청하기</button>
	            </form>
            </div>
        </div>
    </main>


	<script type="text/javascript">
        // 현재위치 가져오기
        function getgps() {
            var geo_options = {
                enableHighAccuracy: false, 
                maximumAge        : 30000, 
                timeout           : 4000
            };
            
            if ("geolocation" in navigator ) {
                var wpid = navigator.geolocation.getCurrentPosition(geo_success, geo_error, geo_options);
            }
        }

        // 좌표 추적 에러
        function geo_error() {
            $("input[name='lat']").val('37.572807');
            $("input[name='lng']").val('126.976883');
			setTimeout(function(){
				search();
			}, 500); 
        }

        // 좌표 추적 성공
        function geo_success(position) {
            $("input[name='lat']").val(position.coords.latitude);
            $("input[name='lng']").val(position.coords.longitude);
			setTimeout(function(){
				search();
			}, 500);
        } 
        
        // ord change
        $(document).on("change", "#ord", function(){
	        var val = $(this).val(); 
	        switch(val){
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
        $(document).on("change", "select[name='city_code']", function(){
	        search();
	    });
        
        // search
        function search(){
	        var param = $("#formH").serializeObject();
	        console.log(param);
	        // 시군구
			$.ajax({
			    type: "get",
			    url: "/beopmusa/json",
			    data : param,
			    beforeSend : function(xhr, opts) {
			    },
			    success: function(result) {
				    $(".hospital-list").html('');
				    console.log(result);
				    result.data.forEach(function (val, i) {
					    let li = Structure([
						    '<li>', [
							    '<a href="/beopmusa/' + val.bp_id + '" class="box">', [
									'<span class="location">' + val.city_name + ' ' + val.district_name + ' → ' + val.sub_name + '</span>',
									'<span class="middle">', [
										'<span class="name">' + val.title + '</span>',
										'<span class="tel">' + val.tel + '</span>',
										function(){
											if(val.owner_photo)
												return '<span class="face" style="background-image:url(' + val.owner_photo + ')"></span>';
											else
												return '<span class="face"></span>';
										}
									],
									'<span class="bottom">', [
										'<span class="subway-wrap">', [
											function(){
												var retVal = '';
												if(val.subway1 && val.subway_line1 && !getParameter('keyword'))
													retVal += '<span class="subway"><em class="line-' + val.subway_line1 + '">' + val.subway_name1 + '</em>' + val.subway1 + '</span>';
												
												//if(val.subway2 && val.subway_line2 && !getParameter('keyword'))
												//	retVal += '<span class="subway"><em class="line-' + val.subway_line2 + '">' + val.subway_name2 + '</em>' + val.subway2 + '</span>';												
													
												return retVal;
											}
										],
										'<span class="open-wrap">', [
											function(){
												if(val.isnight == '1')
													return '<span class="night">야간진료</span>'	
											},
											function(){
												if(val.issunday == '1')
													return '<span class="sunday">일요일진료</span>'	
											}
										]
									]
							    ]
						    ]
						]);
						$(".hospital-list").append(li);					    
					});
					
					// paging
					$(".list-pagenation").html(result.paging);
					
					// 지역
                    var city_code = $("select[name='city_code']").val();
                    if(city_code) local = $("select[name='city_code'] option:checked").text();
					else local = "전국";

					// total_count
					$('#dd-count').html(result.total_count + '<em>개</em>');
					$('.m-tit').html(local + ' <strong>' + result.total_count + '<em>개</em>,</strong><span>내 지역 한의원 찾기</span>');					
					$('#m-tit').html(local);
					
					$("#spinner").addClass("off");					
				},
			    error: function(err){
			        console.log(err);
			    }
			});			
        }
        
        setTimeout('search()', 500);
        
        if($(window).width() >= 1200){
	        $("#banner-pc").show();
	        $("#banner-mobile").hide();
        } else {
	        $("#banner-pc").hide();
	        $("#banner-mobile").show();
        }
        
        $(window).resize(function(){
	        if($(window).width() > 1200){
		        $("#banner-pc").show();
		        $("#banner-mobile").hide();
	        } else {
		        $("#banner-pc").hide();
		        $("#banner-mobile").show();
	        }	        
        })
        
        // page click
        $(document).on("click", ".csspage", function(e){
	        e.preventDefault();
	        $("input[name='page']").val($(this).attr("data-val"));
	        search();
	    });
        
        
	</script>    