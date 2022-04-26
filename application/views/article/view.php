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
					<li><a href="/article/<?= $data[0]['at_id'] ?>">미디어 속 법무사넷</a></li>
				</ul>
			</div>
		</div>

		<div class="container">
			<div class="article-wrap">
				<div class="article-tit">
					<h2><?= $data[0]['title'] ?></h2>
					<ul class="data-list">
						<li><strong>조회수</strong><span><?= number_format($data[0]['read_cnt']) ?></span></li>
						<li><strong>등록일</strong><span><?= date('Y.m.d', strtotime($data[0]['regist_date'])) ?></span></li>
					</ul>
				</div>
				<div class="article">
					<?= $data[0]['content'] ?>
				</div>
				<div class="btn-wrap">
					<?php if ($data[0]['prev_id']) { ?>
						<a href="/article/<?= $data[0]['prev_id'] ?>" class="prev-btn">이전 글</a>
					<?php } ?>
					<?php if ($data[0]['next_id']) { ?>
						<a href="/article/<?= $data[0]['next_id'] ?>" class="next-btn">다음 글</a>
					<?php } ?>
					<a href="/article?page=<?= $this->input->get('page') ?>" class="list-link">목록</a>
				</div>
			</div>
		</div>
	</main>