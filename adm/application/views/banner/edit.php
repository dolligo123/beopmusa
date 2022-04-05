<form name="form" action="/adm/banner/post" enctype="multipart/form-data" method="post" onsubmit="return chkval();">
  <input type="hidden" name="ba_id" value="<?=$banner['ba_id']?>" />
  <input type="hidden" name="url" value="<?=$url?>" />
  <main class="main-wrap">
    <div class="card-wrap">
      <h1>기본정보</h1>
      <dl>
        <dt>
          <h1>배너제목</h1>
        </dt>
        <dd>
          <input type="text" name="title" placeholder="배너제목 입력하세요." value="<?=$banner['title']?>" />
        </dd>
      </dl>
      <dl>
        <dt>
          <h1>백그라운드 색정보</h1>
        </dt>
        <dd>
          <input type="text" name="color" placeholder="ex)#FFFFF" value="<?=$banner['color']?>" />
        </dd>
      </dl>
      <dl>
        <dt>
          <h1>링크</h1>
        </dt>
        <dd>
          <input type="text" name="banner_link" placeholder="링크 입력하세요." value="<?=$banner['banner_link']?>" />
        </dd>
      </dl>
      <dl>
        <dt>
          <h1>설명</h1>
        </dt>
        <dd>
          <textarea name="ba_desc"><?=$banner['ba_desc']?></textarea>
        </dd>
      </dl>

      <dl>
        <dt>
          <h1>PC 백그라운드파일 PNG(권장:1200*244)</h1>
        </dt>
        <dd>
          <ul class="add-list clearfx">
            <li>
              <?php if ($banner['banner_file1']) { ?>
              <a href="<?=$banner['banner_file1']?>" target="_blank" style="width:800px;">
                <img src="<?=$banner['banner_file1']?>" style="max-width:800px;" />
              </a>
              <?php } else {?>
              <a href="javascript:void(0);" target="_blank" style="width:800px;"></a>
              <?php } ?>
              <input type="file" name="banner_file1" id="banner_file1" />
              <span class="file-btn" style="cursor: pointer;" onclick="$('#banner_file1').click()">파일선택</span>
              <input type="checkbox" name="banner_file_del1" value="1" id="img-chk-1">
              <label for="img-chk-1">사진 삭제</label>
            </li>
          </ul>
        </dd>
      </dl>

      <dl>
        <dt>
          <h1>PC 텍스트파일 PNG(권장:1200*244)</h1>
        </dt>
        <dd>
          <ul class="add-list clearfx">
            <li>
              <?php if ($banner['banner_file2']) { ?>
              <a href="<?=$banner['banner_file2']?>" target="_blank" style="width:800px;">
                <img src="<?=$banner['banner_file2']?>" style="max-width:800px;" />
              </a>
              <?php } else {?>
              <a href="javascript:void(0);" target="_blank" style="width:800px;"></a>
              <?php } ?>
              <input type="file" name="banner_file2" id="banner_file2" />
              <span class="file-btn" style="cursor: pointer;" onclick="$('#banner_file2').click()">파일선택</span>
              <input type="checkbox" name="banner_file_del2" value="1" id="img-chk-2">
              <label for="img-chk-2">사진 삭제</label>
            </li>
          </ul>
        </dd>
      </dl>

      <dl>
        <dt>
          <h1>모바일 이미지 PNG(권장:640*300)</h1>
        </dt>
        <dd>
          <ul class="add-list clearfx">
            <li>
              <?php if ($banner['banner_file3']) { ?>
              <a href="<?=$banner['banner_file3']?>" target="_blank" style="width:800px;">
                <img src="<?=$banner['banner_file3']?>" style="max-width:800px;" />
              </a>
              <?php } else {?>
              <a href="javascript:void(0);" target="_blank" style="width:800px;"></a>
              <?php } ?>
              <input type="file" name="banner_file3" id="banner_file3" />
              <span class="file-btn" style="cursor: pointer;" onclick="$('#banner_file3').click()">파일선택</span>
              <input type="checkbox" name="banner_file_del3" value="1" id="img-chk-3">
              <label for="img-chk-3">사진 삭제</label>
            </li>
          </ul>
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

  // 이미지 미리보기
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $(input).parent().find("a").html("<img src='" + e.target.result + "' />");
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("input[type='file']").change(function () {
    readURL(this);
  });
</script>