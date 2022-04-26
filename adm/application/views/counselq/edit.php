    <form name="form" action="/adm/counselq/post" enctype="multipart/form-data" method="post" onsubmit="return chkval();" >
    <input type="hidden" name="id" value="<?=$counselq['id']?>" />
	<input type="hidden" name="url" value="<?=$url?>" />
    <main class="main-wrap">
        <div class="card-wrap">
            <h1>기본정보</h1>
            <dl>
                <dt>
                    <h1>이름</h1>
                </dt>
                <dd>
                    <input type="text" name="name" placeholder="이름을 입력하세요." value="<?=$counselq['name']?>" />
                </dd>
            </dl>
			<dl>
                <dt>
                    <h1>연락처</h1>
                </dt>
                <dd>
                    <input type="text" name="tel" placeholder="연락처 입력하세요." value="<?=$counselq['tel']?>" />
                </dd>
            </dl>
			<dl>
                <dt>
                    <h1>통화가능시간</h1>
                </dt>
                <dd>
                    <input type="text" name="call_time" placeholder="통화가능시간 입력하세요." value="<?=$counselq['call_time']?>" />
                </dd>
            </dl>            
            <dl>
                <dt>
                    <h1>광역시도</h1>
                </dt>
                <dd>
                    <input type="text" name="city" placeholder="시/도 선택" value="<?=$counselq['city']?>" />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>시군구</h1>
                </dt>
                <dd>
                    <input type="text" name="district" placeholder="시/군/구 선택" value="<?=$counselq['district']?>" />
                </dd>
            </dl>
			<dl>
                <dt>
                    <h1>상담 제목</h1>
                </dt>
                <dd>
                    <input type="text" name="title" placeholder="상담 제목을 입력하세요." value="<?=$counselq['title']?>" />
                </dd>
            </dl>              
			<dl>
                <dt>
                    <h1>상담 희망분야</h1>
                </dt>
                <dd>
                    <input type="text" name="fields" placeholder="상담 희망분야를 입력하세요." value="<?=$counselq['fields']?>" />
                </dd>
            </dl>            
			<dl>
                <dt>
                    <h1>문의내용</h1>
                </dt>
                <dd>
                    <textarea name="desc"><?=$counselq['desc']?></textarea>
                </dd>
            </dl>                      
        </div>
        <div class="submit-wrap">
	        <a class="type2-btn" id="btn_cancel" href="<?=$url?>">취소</a>
            <button class="type1-btn" type="submit" id="btn_submit">저장</button>
        </div>  
    </main>
    </form>      
    
    <script type="text/javascript">		
		function chkval() {
            $("#btn_submit").html("저장중");
            $("#btn_submit").attr("disabled", true);
            $("#btn_cancel").attr("disabled", true);			
		}
	</script>
	