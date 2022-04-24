    <form name="form" action="/adm/joinq/post" enctype="multipart/form-data" method="post" onsubmit="return chkval();">
      <input type="hidden" name="jq_id" value="<?= $joinq['jq_id'] ?>" />
      <input type="hidden" name="url" value="<?= $url ?>" />
      <main class="main-wrap">
        <div class="card-wrap">
          <h1>기본정보</h1>
          <dl>
            <dt>
              <h1>법무사명</h1>
            </dt>
            <dd>
              <input type="text" name="bp_name" placeholder="법무사명 입력하세요." value="<?= $joinq['bp_name'] ?>" />
            </dd>
          </dl>
          <!-- <dl>
            <dt>
              <h1>이름</h1>
            </dt>
            <dd>
              <input type="text" name="jq_name" placeholder="이름 입력하세요." value="<?= $joinq['jq_name'] ?>" />
            </dd>
          </dl> -->
          <dl>
            <dt>
              <h1>연락처</h1>
            </dt>
            <dd>
              <input type="text" name="tel" placeholder="연락처 입력하세요." value="<?= $joinq['tel'] ?>" />
            </dd>
          </dl>

          <!-- <dl>
            <dt>
              <h1>이메일</h1>
            </dt>
            <dd>
              <input type="text" name="email" placeholder="이메일 입력하세요." value="<?= $joinq['email'] ?>" />
            </dd>
          </dl> -->

          <dl>
            <dt>
              <h1>지역</h1>
            </dt>
            <dd>
              <input type="text" name="local" placeholder="지역 입력하세요." value="<?= $joinq['local'] ?>" />
            </dd>
          </dl>

          <dl>
            <dt>
              <h1>문의내용</h1>
            </dt>
            <dd>
              <textarea name="jq_desc"><?= $joinq['jq_desc'] ?></textarea>
            </dd>
          </dl>
        </div>
        <div class="submit-wrap">
          <a class="type2-btn" id="btn_cancel" href="<?= $url ?>">취소</a>
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