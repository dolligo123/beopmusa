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
		<?php if (!$this->input->get('keyword')) : ?>
			<div class="form-wrap">
				<div class="container">
					<form action="/counselq/post" method="post" onsubmit="return chkval()">
						<div class="title">
							<h4>궁금한 법무, 지금 상담 신청을 남기면<br></h4>
							<h3><strong>가장 가까운 법무사가 연락</strong>을 드립니다.</h3>
							<p>이제 실시간으로 원스톱 법무상담 서비스를 한 곳에서! (*는 필수 입력사항)</p>
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
		<?php endif; ?>

		<div class="list-wrap">
			<div class="container">

				<?php if ($this->input->get("keyword")) : ?>
					<div class="result-wrap">
						<span class="icon"></span>
						<p>[ <strong><?= $this->input->get("keyword") ?></strong> ]으로 <br>검색한 결과는 <strong id="strong-count"></strong>건입니다.</p>
					</div>
				<?php endif; ?>
				<form action="/beopmusa" id="formH">
					<div class="soting-block">
						<div class="left">
							<span>전체 가맹점 수</span><strong class="count"><?= $this->dinfo['total_count'] ?></strong>
							<span>현재 지역</span><strong id="m-tit">전국</strong>
							<span>가맹점 수</span><strong class="count" id="dd-count"></strong>
						</div>
						<input type="hidden" name="lat" />
						<input type="hidden" name="lng" />
						<input type="hidden" name="keyword" value="<?= $this->input->get("keyword") ?>" />
						<input type="hidden" name="orderby" value="join_date" />
						<input type="hidden" name="sort" value="desc" />
						<input type="hidden" name="page" value="1" />
						<div class="right">
							<select name="city_code" id="city_code">
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
					</div>
				</form>
				<ul class="office-list">
				</ul>
				<div class="pagenation-block">
				</div>
			</div>
		</div>

		<div class="search-wrap">
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
		</div>

		<?php if ($this->input->get('keyword')) : ?>
			<div class="form-wrap">
				<div class="container">
					<form action="/counselq/post" method="post" onsubmit="return chkval()">
						<div class="title">
							<h4>궁금한 법무, 지금 상담 신청을 남기면<br></h4>
							<h3><strong>가장 가까운 법무사가 연락</strong>을 드립니다.</h3>
							<p>이제 실시간으로 원스톱 법무상담 서비스를 한 곳에서! (*는 필수 입력사항)</p>
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
		<?php endif; ?>
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

		// city change
		$(document).on("change", "#city_code", function() {
			search();
		});

		// search
		function search() {
			var param = $("#formH").serializeObject();
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
												for (let i = 1; i <= 5; i++) {
													if (val['subway' + i] && val['subway_line' + i] && !getParameter('keyword')) {
														retVal += '<dl><dt><em class="line-' + val['subway_line' + i] + '">' + val['subway_name' + i] + '</em></dt><dd>' + val['subway' + i] + '</dd></dl>';
													}
												}
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
					var city_code = $('.select-block').find("select[name='city_code']").val();
					var district_code = $('.select-block').find("select[name='district_code']").val();
					if (city_code) {
						local = $('.select-block').find("select[name='city_code'] option:checked").text();
					}
					if (district_code) {
						local += ' / ' + $('.select-block').find("select[name='district_code'] option:checked").text();
					}
					if (!city_code) local = "전국";

					city_code = $('.soting-block').find("select[name='city_code']").val();
					if (city_code) {
						local = $('.soting-block').find("select[name='city_code'] option:checked").text();
					}

					// total_count
					$('#dd-count').html(result.total_count);
					$('#strong-count').html(result.total_count);
					$('#m-tit').html(local);

					$("#spinner").addClass("off");
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		setTimeout('search()', 500);

		// 지역검색 버튼 클릭
		$(".search-btn").click(function(e) {
			e.preventDefault();
			//search();
			location.href = "/beopmusa?city_code=" + $("select[name='city_code']").val() + "&district_code=" + $("select[name='district_code']").val();
		});

		// page click
		$(document).on("click", ".csspage", function(e) {
			e.preventDefault();
			$("input[name='page']").val($(this).attr("data-val"));
			search();
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