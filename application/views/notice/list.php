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
	                <li><a href="/notice">미디어N뉴스</a></li>
	                <li><a href="/notice">공지사항</a></li>
	            </ul>
	        </div>
	    </div>
	    <div class="list-wrap">
	        <div class="container">
	            <div class="sub-tit-wrap">
	                <p>공지사항</p>
	            </div>
	            <div class="soting-block clearfx">
	                <div class="right">
	                    <dl>
	                        <dt>전체 글 :</dt>
	                        <dd><?=number_format($total_count)?>개</dd>
	                    </dl>
	                </div>
	            </div>
	            <table class="notice-table">
	                <colgroup>
	                    <col class="number">
	                    <col class="title">
	                    <col class="writer">
	                    <col class="date">
	                    <col class="view">
	                </colgroup>
	                <thead>
	                    <tr>
	                        <th scope="col">번호</th>
	                        <th scope="col">제목</th>
	                        <th scope="col">작성일</th>
	                        <th scope="col">조회수</th>
	                    </tr>
	                </thead>
	                <tbody>
		                <?php 
			            foreach($data as $item): 
			            ?>
	                    <tr>
	                        <td><?=$num?></td>
	                        <td><a href="/notice/<?=$item['nt_id']?>?page=<?=$this->input->get('page')?>"><?=$item['title']?></a></td>
	                        <td><?=date('Y.m.d', strtotime($item['regist_date']))?></td>
	                        <td><?=number_format($item['read_cnt'])?></td>
	                    </tr>
	                    <?php 
		                    $num--;
		                endforeach; 
		                ?>
	                </tbody>
	            </table>
	            <div class="list-pagenation">
	                <?=str_replace('csspage', 'normalpage', $paging)?>
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