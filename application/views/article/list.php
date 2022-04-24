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
					<li><a href="/article">미디어&뉴스</a></li>
				</ul>
			</div>
		</div>
		<div class="list-wrap">
			<div class="container">
				<div class="sub-tit-wrap">
					<h2>언론에 기고되는<br><strong>법무사넷</strong> 뉴스를 모았습니다</h2>
				</div>
				<ul class="article-list">
					<?php foreach ($data as $item) : ?>
						<li>
							<a href="/article/<?= $item['at_id'] ?>?page=<?= $this->input->get('page') ?>" class="box">
								<span class="thumb" <?php if ($item['photo']) echo 'style="background-image:url(' . $item['photo'] . ')"' ?>></span>
								<span class="text">
									<h3><?= $item['title'] ?></h3>
									<p><?= strip_tags($item['content']) ?></p>
									<ul class="data-list">
										<li><strong>조회수</strong><?= number_format($item['read_cnt']) ?></li>
										<li><strong>등록일</strong><?= date('Y.m.d', strtotime($item['regist_date'])) ?></li>
									</ul>
								</span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="pagenation-block">
					<?= str_replace('csspage', 'normalpage', $paging) ?>
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
	</main>

	<script>
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