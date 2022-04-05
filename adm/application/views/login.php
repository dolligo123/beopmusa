	<div class="signin-wrap">
		<form action="/adm/login/loginchk" method="post">
		<h2 class="icon logo">하나카네트워크</h2>
		<h1 class="page-tit">관리자 로그인</h1>
		<div class="input-block">
			<input type="text" name="admid" placeholder="아이디를 입력하세요." value="<?=$hanaca_id_save?>" required />
			<input type="password" name="admpw" placeholder="패스워드를 입력하세요." required />
		</div>
		<div class="remember-box">
			<input type="checkbox" name="rememberId" id="rememberId" value="1" <?=$hanaca_id_save_checked?> ><label for="rememberId">아이디 저장</label>
		</div>
		<button class="submit-btn" type="submit">로그인</button>
		</form>
	</div>