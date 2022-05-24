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

	<!--s:개인정보수집-->
	<div id="privacy_pop" class="none">
		<div class="box">
			<a href="#" class="btn_close"><img src="../images/close-btn-w.svg" alt="닫기"></a>
			<strong>개인정보 수집 및 이용 동의 내용</strong>
			<div class="agree_box">법무사넷은 (이하 ‘사이트’)개인정보 보호법 제30조에 따라 정보주체의 개인정보를 보호하고 이와 관련한 고충을 신속하고 원활하게 처리할 수 있도록 하기 위하여다음과 같이 개인정보 처리지침을 수립․공개합니다.

				제1조(개인정보의 처리목적)
				사이트는 다음의 목적을 위하여 개인정보를 처리합니다. 처리하고 있는 개인정보는 다음의 목적 이외의 용도로는 이용되지 않으며, 이용 목적이 변경되는 경우에는 개인정보 보호법 제18조에 따라 별도의 동의를 받는 등 필요한 조치를 이행할 예정입니다.

				1. 온라인 가입문의: 상호, 법무사명, 지역명, 연락처, 이메일
				2. 빠른 법무상담: 이름, 연락처, 이메일


				제2조(개인정보의 처리 및 보유기간)
				① 사이트는 법령에 따른 개인정보 보유․이용기간 또는 정보주체로부터 개인정보를 수집시에 동의받은 개인정보 보유․이용기간 내에서 개인정보를 처리․보유합니다.
				② 각각의 개인정보 처리 및 보유 기간은 다음과 같습니다.

				1. 보유기간

				① 지점문의에 관한 기록 : 1년

				제3조(개인정보의 제3자 제공)
				① 사이트는 개인정보를 제3자에게 제공하지 않습니다.

				제4조(정보주체와 법정대리인의 권리․의무 및 행사방법)
				① 정보주체는사이트에 대해 언제든지 개인정보 열람․정정․삭제․처리정지 요구 등의 권리를 행사할 수 있습니다.
				② 제1항에 따른 권리 행사는 사이트에 대해 개인정보보호법 시행령 제41조제1항에 따라 서면, 전자우편, 모사전송(FAX) 등을 통하여 하실 수 있으며,사이트는 이에 대해 지체없이 조치하겠습니다.
				③ 제1항에 따른 권리 행사는 정보주체의 법정대리인이나 위임을 받은 자 등 대리인을 통하여 하실 수 있습니다. 이 경우 개인정보 보호법 시행규칙 별지 제11호 서식에 따른 위임장을 제출하셔야 합니다.
				④ 개인정보 열람 및 처리정지 요구는 개인정보보호법 제35조 제5항, 제37조 제2항에 의하여 정보주체의 권리가 제한 될 수 있습니다.
				⑤ 개인정보의 정정 및 삭제 요구는 다른 법령에서 그 개인정보가 수집 대상으로 명시되어 있는 경우에는 그 삭제를 요구할 수 없습니다.
				⑥ 사이트는정보주체 권리에 따른 열람의 요구, 정정•삭제의 요구, 처리정지의 요구 시 열람 등 요구를 한 자가 본인이거나 정당한 대리인인지를 확인합니다.

				제5조(처리하는 개인정보 항목)
				사이트는 다음의 개인정보 항목을 처리하고 있습니다.

				1. 온라인 가입문의: 상호, 법무사명, 지역명, 연락처, 이메일
				2. 빠른 법무상담: 이름, 연락처, 이메일

				제6조(개인정보의 파기)
				① 사이트는 개인정보 보유기간의 경과, 처리목적 달성 등 개인정보가 불필요하게 되었을 때에는 지체없이 해당 개인정보를 파기합니다.
				② 정보주체로부터 동의받은 개인정보 보유기간이 경과하거나 처리목적이 달성되었음에도 불구하고 다른 법령에 따라 개인정보를 계속 보존하여야 하는 경우에는, 해당 개인정보를 별도의 데이터베이스(DB)로 옮기거나 보관장소를 달리하여 보존합니다.
				③ 개인정보 파기의 절차 및 방법은 다음과 같습니다.
				1. 파기절차
				사이트는 파기 사유가 발생한 개인정보를 선정하고, 사이트의 개인정보 보호책임자의 승인을 받아 개인정보를 파기합니다.
				2. 파기방법
				사이트는 전자적 파일 형태로 기록․저장된 개인정보는 기록을 재생할 수 없도록 파기하며, 종이 문서에 기록․저장된 개인정보는 분쇄기로 분쇄하거나 소각하여 파기합니다.

				제7조(개인정보의 안전성 확보조치)
				사이트는 개인정보의 안전성 확보를 위해 다음과 같은 조치를 취하고 있습니다.
				1. 관리적 조치 : 내부관리계획 수립․시행, 정기적 직원 교육 등
				2. 기술적 조치 : 개인정보처리시스템 등의 접근권한 관리, 접근통제시스템 설치, 고유식별정보 등의 암호화, 보안프로그램 설치

				제8조(개인정보 자동 수집 장치의 설치∙운영 및 거부에 관한 사항)
				①사이트는 이용자에게 개별적인 맞춤서비스를 제공하기 위해 이용정보를 저장하고 수시로 불러오는 ‘쿠기(cookie)’를 사용합니다.
				②쿠키는 웹사이트를 운영하는데 이용되는 서버(http)가 이용자의 컴퓨터 브라우저에게 보내는 소량의 정보이며 이용자들의 PC 컴퓨터내의 하드디스크에 저장되기도 합니다.
				가. 쿠키의 사용목적: 이용자가 방문한 각 서비스와 웹 사이트들에 대한 방문 및 이용형태, 인기 검색어, 보안접속 여부, 등을 파악하여 이용자에게 최적화된 정보 제공을 위해 사용됩니다.
				나. 쿠키의 설치∙운영 및 거부 :웹브라우저 상단의 도구>인터넷 옵션>개인정보 메뉴의 옵션 설정을 통해 쿠키 저장을 거부 할 수 있습니다.
				다. 쿠키 저장을 거부할 경우 맞춤형 서비스 이용에 어려움이 발생할 수 있습니다.

				제9조(개인정보 보호책임자)
				①사이트는 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련한 정보주체의 불만처리 및 피해구제 등을 위하여 아래와 같이 개인정보 보호책임자를 지정하고 있습니다.

				▶ 개인정보 보호책임자 성명 : 김지태 직책 : 본부장 연락처 : 전화번호 02-761-1633, 이메일 jtkim@kumsolmedia.com,
				팩스번호 02-761-1632
				※ 개인정보 보호 담당부서로 연결됩니다.
				▶ 개인정보 보호 담당부서
				부서명 : 경영관리본부
				담당자 : 김지태본부장
				연락처 : 전화번호 02-761-1633, 이메일 bms@kumsolmedia.com
				팩스번호 02-761-1632

				② 정보주체께서는 사이트는의 서비스(또는 사업)을 이용하시면서 발생한 모든 개인정보 보호 관련 문의, 불만처리, 피해구제 등에 관한 사항을 개인정보 보호책임자 및 담당부서로 문의하실 수 있습니다. 사이트는 정보주체의 문의에 대해 지체없이 답변 및 처리해드릴 것입니다.


				제10조(권익침해 구제방법) 정보주체는 아래의 기관에 대해 개인정보 침해에 대한 피해구제, 상담 등을 문의하실 수 있습니다.

				&lt;아래의 기관은 사이트 와는 별개의 기관으로서, 사이트의 자체적인개인정보 불만처리, 피해구제 결과에 만족하지 못하시거나 보다 자세한 도움이필요하시면 문의하여 주시기 바랍니다&gt;
				▶ 개인정보 침해신고센터 (한국인터넷진흥원 운영)
				- 소관업무 : 개인정보 침해사실 신고, 상담 신청
				- 홈페이지 : privacy.kisa.or.kr
				- 전화 : (국번없이) 118
				- 주소 :(58324) 전남 나주시 진흥길 9(빛가람동 301-2) 3층 개인정보침해신고센터
				▶ 개인정보 분쟁조정위원회
				- 소관업무 : 개인정보 분쟁조정신청, 집단분쟁조정 (민사적 해결)
				- 홈페이지 : www.kopico.go.kr
				- 전화 : (국번없이) 1833-6972
				- 주소 :(03171)서울특별시 종로구 세종대로 209 정부서울청사 4층
				▶ 대검찰청 사이버범죄수사단 : 02-3480-3573 (www.spo.go.kr)
				▶ 경찰청 사이버안전국 : 182 (http://cyberbureau.police.go.kr)

				제11조(개인정보 처리방침 변경)
				①이 개인정보 처리방침은 2020.12.01. 부터 적용됩니다.
				②이 개인정보처리방침은 시행일로부터 적용되며, 법령 및 방침에 따른 변경내용의 추가, 삭제 및 정정이 있는 경우에는 변경사항의 시행 7일 전부터 공지사항을 통하여 고지할 것입니다.
			</div>
		</div>
	</div>
	<!--e:개인정보수집-->
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