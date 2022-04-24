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
				<li><a href="/joinq">온라인 가맹문의</a></li>
			</ul>
		</div>
	</div>
	<div class="form-wrap inquiry">
		<div class="container">
			<form action="/joinq/post" method="post" onsubmit="return chkval()">
				<input type="hidden" name="local" />
				<div class="title">
					<h3>우리 지역 법무사 찾기 네트워크 법무사넷에서<br>지역 대표 법무사를 모십니다</h3>
					<p>편하게 작성해주시면 빠르게 답변 드리겠습니다(*는 필수 입력사항)</p>
				</div>
				<div class="write-wrap">
					<ul class="write-box">
						<li class="pc">
							<h3>법무사/상호명</h3>
						</li>
						<li>
							<input type="text" placeholder="법무사명 입력해 주세요" name="bp_name" />
						</li>
						<li class="pc">
							<h3>연락처 *</h3>
						</li>
						<li class="essential">
							<input type="text" placeholder="연락처를 입력해 주세요" name="tel" required />
						</li>
						<li>
							<h3>가입 희망 지역 *</h3>
						</li>
						<li>
							<select name="city_code" required>
								<option value="">시/도</option>
							</select>
							<select name="district_code" required>
								<option value="">시/구/군</option>
							</select>
						</li>
						<li class="pc">
							<h3>문의 내용 *</h3>
						</li>
						<li class="essential">
							<textarea name="jq_desc" placeholder="문의 내용을 입력해 주세요" rows="4" required></textarea>
						</li>
					</ul>
					<ul class="write-box">
						<li>
							<h3>개인정보 수집 및 이용 동의</h3>
						</li>
						<li>
							<p class="term">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, corrupti. Ipsum quia similique quam, vero quasi repellendus molestias facere laborum consequuntur dolorem laboriosam saepe deserunt qui omnis magni corrupti delectus tempora quaerat est fugiat. Explicabo pariatur voluptatibus doloribus. Amet dicta dolorum libero suscipit modi, debitis aspernatur asperiores beatae voluptatum qui natus maxime laborum illo voluptates similique culpa! Voluptatem sunt dolorem asperiores in, repellendus, saepe ex ipsum deleniti quas dicta, quam nihil! Explicabo illum animi sint praesentium ea eaque saepe, asperiores expedita repellat voluptatum id reprehenderit rem voluptates, harum nihil quam ad voluptatem! Molestiae suscipit voluptatum maxime vero consequatur error quod, fugiat sequi est eligendi incidunt totam ex iste velit repudiandae minus? Reprehenderit sit perspiciatis totam voluptate quis, distinctio commodi nemo rem neque voluptas cum possimus inventore odio velit at consectetur assumenda saepe hic sunt impedit ipsum eaque. Dolor sed nihil ullam maxime, explicabo distinctio quaerat tenetur minima laboriosam molestiae cumque reiciendis dolores eos atque vitae fugit neque aliquam veritatis aut esse sequi temporibus, a vero? Sed similique optio odio, nam id praesentium deleniti minus voluptatem dolore aut et reiciendis quidem quaerat nulla! Natus voluptate reprehenderit, dicta similique autem temporibus magni ipsa! Mollitia cumque itaque, obcaecati doloremque rerum repellendus natus corrupti.
							</p>
						</li>
						<li class="absolute-bottom">
							<label for="chk-agree">
								<input type="checkbox" id="chk-agree" name="confirm" vlaue="1" required />
								<span class="check"></span>
								<span>개인정보 수집 및 이용 동의</span>
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
	function chkval(){
		let local = $(".form-wrap").find("select[name='city_code'] option:checked").text() + ' ' + $(".form-wrap").find("select[name='district_code'] option:checked").text();
		$("input[name='local']").val(local);
		return true;
	}
</script>