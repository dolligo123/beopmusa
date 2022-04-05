	<main>
	    <div class="quick-search-wrap">
	        <div class="container">
	            <h3><strong>지역명</strong>으로 <br><strong>빠르게 찾기</strong></h3>
	            <div class="select-block clearfx">
		            <form action="/beopmusa" id="formH">
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

	            </div>
	        </div>
	    </div>
	    <div class="sub-breadcrumb">
	        <div class="container">
	            <ul class="clearfx">
	                <li><a href="/" class="icon home">홈</a></li>
	                <li><a href="/beopmusa">내 지역 한의원 찾기</a></li>
	            </ul>
	        </div>
	    </div>
	    <div class="list-wrap">
	        <div class="container">
		        
		        <?php if($this->input->get("keyword")): ?>
				<div class="result-wrap">
		            <span class="icon"></span>
		            <p>[ <strong><?=$this->input->get("keyword")?></strong> ]으로 <br>검색한 결과는 <strong id="strong-count">3</strong>건입니다.</p>
	          	</div>		        
	          	<?php endif; ?>
		        
	            <div class="soting-block clearfx">
	                <div class="left">
	                    <dl>
	                        <dt>선택 지역 :</dt>
	                        <dd id='dd-local'>전국/전체</dd>
	                    </dl>
	                    <dl>
	                        <dt>지점 수 :</dt>
	                        <dd id='dd-count'></dd>
	                    </dl>
	                </div>
	                
					<input type="hidden" name="lat" />
					<input type="hidden" name="lng" />
					<input type="hidden" name="keyword" value="<?=$this->input->get("keyword")?>" />
					<input type="hidden" name="orderby" value="join_date"  />
					<input type="hidden" name="sort"  value="desc" />
					<input type="hidden" name="page" value="1" />
	                <div class="right">
	                    <ul class="clearfx">
	                        <li><label for="type1"><input type="checkbox" id="type1" name="isnight" value="1"><span class="icon check"></span><span>야간진료</span></label></li>
	                        <li><label for="type2"><input type="checkbox" id="type2" name="issunday" value="1"><span class="icon check"></span><span>일요진료</span></label></li>
	                    </ul>
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
	            <ul class="hospital-list <?php if($this->input->get("keyword")) echo "col-1"; ?> clearfx">
	            </ul>
	            <div class="list-pagenation">
	            </div>
	        </div>
	    </div>
	    <div class="search-wrap">
	        <div class="container">
	            <h4>원하시는 검색 결과를<br>다시 빠르게 찾길 원하신다면</h4>
	            <h3><strong>검색창</strong>을 이용해보세요.</h3>
	            <form action="/beopmusa">
	                <div class="search-block">
	                    <input type="text" name="keyword" placeholder="중요시설/지역명/지하철역명으로 바로찾기!"><button class="icon">검색</button>
	                </div>
	            </form>
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
		        	break;
		        case "join_date_desc":
		        	$("input[name='orderby']").val('join_date');
		        	$("input[name='sort']").val('desc');
		        	break;
		        case "title":
		        	$("input[name='orderby']").val('title');
		        	$("input[name='sort']").val('asc');
		        	break;
		        case "title_desc":
		        	$("input[name='orderby']").val('title');
		        	$("input[name='sort']").val('desc');
		        	break;
		        case "dist":
		        	$("input[name='orderby']").val('dist');
		        	$("input[name='sort']").val('asc');
		        	$("#spinner").removeClass("off");
		        	getgps();
		        	break;
	        }
	        search();
        });
        
        // isnight, issunday change
        $(document).on("click", "input[name='isnight'], input[name='issunday']", function(){
	        search();
	    });
        
        // search
        function search(){
	        var param = $("#formH").serializeObject();
	        // 시군구
			$.ajax({
			    type: "get",
			    url: "/beopmusa/json",
			    data : param,
			    beforeSend : function(xhr, opts) {
			    },
			    success: function(result) {
				    $(".hospital-list").html('');
				    //console.log(result);
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
										},
										
										function() {
											if(!getParameter('keyword')) {
												let span = Structure([
													'<span class="address">', [
														'<dl>', [
															'<dt>도로명</dt>', 
															'<dd>' + val.addr_new + '</dd>'
														],
														'<dl>', [
															'<dt>지번</dt>', 
															'<dd>' + val.addr_old + '</dd>'
														]
													]												
												]);
												return span;
											}
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
									],
									function() {
										if(getParameter('keyword')) {											
											let span = Structure([
												'<span class="right">', [
													'<span class="subway-wrap">', [
														function(){
															var retVal = '';
															if(val.subway1 && val.subway_line1)
																retVal += '<span class="subway"><em class="line-' + val.subway_line1 + '">' + val.subway_name1 + '</em>' + val.subway1 + '</span>';
															
															if(val.subway2 && val.subway_line2)
																retVal += '<span class="subway"><em class="line-' + val.subway_line2 + '">' + val.subway_name2 + '</em>' + val.subway2 + '</span>';
																
															if(val.subway3 && val.subway_line3)
																retVal += '<span class="subway"><em class="line-' + val.subway_line3 + '">' + val.subway_name3 + '</em>' + val.subway3 + '</span>';	
																
															return retVal;
														}
													],
													'<span class="address">', [
														'<dl>', [
															'<dt>도로명</dt>', 
															'<dd>' + val.addr_new + '</dd>'
														],
														'<dl>', [
															'<dt>지번</dt>', 
															'<dd>' + val.addr_old + '</dd>'
														]
													]	
												]											
											]);
											return span;
										}									
									}
							    ]
						    ]
						]);
						$(".hospital-list").append(li);					    
					});
					
					// paging
					$(".list-pagenation").html(result.paging);
					
					// total_count
					$('#dd-count').html(result.total_count + '개');
					$('#strong-count').html(result.total_count);
					
					// 지역
					var city_code = $("select[name='city_code']").val();
					var district_code = $("select[name='district_code']").val();
					var local = "";
					if(city_code) local = $("select[name='city_code'] option:checked").text();
					else local = "전국";
					if(district_code) local += "/" + $("select[name='district_code'] option:checked").text();
					else local += "/" + "전체";
					$("#dd-local").html(local);
					
					$("#spinner").addClass("off");					
					
				},
			    error: function(err){
			        console.log(err);
			    }
			});			
        }
        
        setTimeout('search()', 500);
        
        // 지역검색 버튼 클릭
        $(".search-btn").click(function(e){
	        e.preventDefault();
	        //search();
	        location.href = "/beopmusa?city_code=" + $("select[name='city_code']").val() + "&district_code=" + $("select[name='district_code']").val();
        });
        
        // page click
        $(document).on("click", ".csspage", function(e){
	        e.preventDefault();
	        $("input[name='page']").val($(this).attr("data-val"));
	        search();
	    });        
        
	</script>