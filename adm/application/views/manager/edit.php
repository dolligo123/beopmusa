    <form name="form" action="/adm/manager/post" enctype="multipart/form-data" method="post" onsubmit="return chkval();" >
    <input type="hidden" name="ma_id" value="<?=$manager['ma_id']?>" />
	<input type="hidden" name="url" value="<?=$url?>" />
    <main class="main-wrap">
        <div class="card-wrap">
            <h1>기본정보</h1>
            <dl>
                <dt>
                    <h1>ID</h1>
                </dt>
                <dd>
                    <input type="text" name="user_id" placeholder="ID 입력하세요." value="<?=$manager['user_id']?>" />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>이름</h1>
                </dt>
                <dd>
                    <input type="text" name="user_name" placeholder="이름 입력하세요." value="<?=$manager['user_name']?>" />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>변경할 패스워드</h1>
                </dt>
                <dd>
                    <input type="password" name="pw" placeholder="변경할 패스워드 입력하세요."  />
                </dd>
            </dl>
			<dl>
                <dt>
                    <h1>사업자번호</h1>
                </dt>
                <dd>
                    <input type="text" name="b_num" placeholder="사업자번호 입력하세요." value="<?=$manager['b_num']?>" />
                </dd>
            </dl>                      
			<dl>
                <dt>
                    <h1>카카오채널주소</h1>
                </dt>
                <dd>
                    <input type="text" name="kakaotok" placeholder="카카오채널주소 입력하세요." value="<?=$manager['kakaotok']?>" />
                </dd>
            </dl>                      
			<dl>
                <dt>
                    <h1>네이버톡톡주소</h1>
                </dt>
                <dd>
                    <input type="text" name="navertok" placeholder="네이버톡톡주소 입력하세요." value="<?=$manager['navertok']?>" />
                </dd>
            </dl>                      
            
			<dl>
                <dt>
                    <h1>가맹문의전화번호</h1>
                </dt>
                <dd>
                    <input type="text" name="tel_join" placeholder="가맹문의전화번호 입력하세요." value="<?=$manager['tel_join']?>" />
                </dd>
            </dl>            
            
			<dl>
                <dt>
                    <h1>빠른가입전화번호</h1>
                </dt>
                <dd>
                    <input type="text" name="tel_quick" placeholder="빠른가입전화번호 입력하세요." value="<?=$manager['tel_quick']?>" />
                </dd>
            </dl>            
            
			<dl>
                <dt>
                    <h1>문자수신번호</h1>
                </dt>
                <dd>
                    <input type="text" name="tel_sms" placeholder="문자수신번호 입력하세요." value="<?=$manager['tel_sms']?>" />
                </dd>
            </dl>
            
			<dl>
                <dt>
                    <h1>상호명</h1>
                </dt>
                <dd>
                    <input type="text" name="company" placeholder="상호명 입력하세요." value="<?=$manager['company']?>" />
                </dd>
            </dl>                        
            
			<dl>
                <dt>
                    <h1>대표전화번호</h1>
                </dt>
                <dd>
                    <input type="text" name="tel_owner" placeholder="대표전화 입력하세요." value="<?=$manager['tel_owner']?>" />
                </dd>
            </dl>                        
            
			<dl>
                <dt>
                    <h1>이메일</h1>
                </dt>
                <dd>
                    <input type="text" name="email" placeholder="이메일 입력하세요." value="<?=$manager['email']?>" />
                </dd>
            </dl>
            
			<dl>
                <dt>
                    <h1>주소</h1>
                </dt>
                <dd>
                    <input type="text" name="addr" placeholder="주소 입력하세요." value="<?=$manager['addr']?>" />
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
	