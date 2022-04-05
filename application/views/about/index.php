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
	                <li><a href="/about">하나카네트워크</a></li>
	            </ul>
	        </div>
	    </div>
	
	    <div class="about-wrap">
	        <section class="head">
	            <h4>초기 치료가 중요한 교통사고 후유증 치료</h4>
	            <h3>이제는 <strong>하나</strong>를 먼저 기억하세요!</h3>
	            <p>‘교통사고 후유증’ 을 연구하고 치료하기 위해<br><strong>하나카N</strong>에서는 <strong>각 지역별 주치 한의원 지정 시스템</strong>으로 운영됩니다. </p>
	        </section>
	        <section>
	            <div class="title">
	                <span class="no">01</span>
	                <h4>하나카네트워크 전담 과목<br><strong>교통사고후유증</strong></h4>
	            </div>
	            <img src="../images/about-1-img.png" alt="교통사고 후유증">
	        </section>
	        <section>
	            <div class="title">
	                <span class="no">02</span>
	                <h4>본인 부담금 <strong>걱정 NO!</strong></h4>
	                <p>하나카네크워크 지점 한의원에 가셔서<br> '자동차보험으로 접수합니다!' 라고 말씀하시면<br> 본인 부담금이 없거나 적게 한방치료를 받으실 수 있습니다.</p>
	            </div>
	            <img src="../images/about-2-img.png" alt="본인 부담금 NO">
	        </section>
	        <section>
	            <div class="title">
	                <span class="no">03</span>
	                <h4><strong>이런 치료</strong>를 받으실 수 있습니다.</h4>
	                <p>침, 뜸, 부항, 약침, 한약 뿐만 아니라<br>한방물리치료, 추나치료 까지 OK!</p>
	            </div>
	            <img src="../images/about-3-img.png" alt="한방물리치료, 추나치료 까지">
	        </section>
	        <section class="bottom">
	            <div class="icon logo">교통사고치료 지역 주치의 네트워크 하나카N</div>
	        </section>
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