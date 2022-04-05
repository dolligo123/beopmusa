<form name="form" action="/adm/article/post" enctype="multipart/form-data" method="post" onsubmit="return chkval();" >
    <input type="hidden" name="at_id" value="<?=$article['at_id']?>" />
	<input type="hidden" name="url" value="<?=$url?>" />
    <main class="main-wrap">
        <div class="card-wrap">
            <h1>공지 상세 페이지</h1>
            <dl>
                <dt class="essential">
                    <h1>제목</h1>
                </dt>
                <dd>
                    <input type="text" name="title" placeholder="제목 입력하세요." value="<?=$article['title']?>" required />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>대표사진(권장:560*280px)</h1>
                </dt>	                
            	<dd>
            	    <ul class="add-list clearfx">
            	        <li>
            	        	<?php if ($article['photo']) { ?>
                            <a href="<?=$article['photo']?>" target="_blank">
	                            <img src="<?=$article['photo']?>" style="max-width:500px;" />
	                        </a>            	        	
            	        	<?php } else {?>
                            <a href="javascript:void(0);" target="_blank"></a>
	                        <?php } ?>
            	            <input type="file" name="photo" id="photo" />
            	            <span class="file-btn" style="cursor: pointer;" onclick="$('#photo').click()">파일선택</span>
                            <input type="checkbox" name="photo_del" value="1" id="img-chk-0">
                            <label for="img-chk-0">사진 삭제</label>
                        </li>
            	    </ul>
            	</dd>
            </dl>              
            <dl>
                <dt>
                    <h1>내용</h1>
                </dt>
                <dd>
                    <textarea name="content" id="content" rows="10" cols="100" style="width:100%; height:400px; display:none;"><?=$article['content']?></textarea>
                </dd>
            </dl>             
        </div>
        <div class="submit-wrap">
	        <a class="type2-btn" id="btn_cancel" href="<?=$url?>">취소</a>
            <button class="type1-btn" type="submit" id="btn_submit">저장</button>
        </div>  
    </main>
    </form>      


    <script type="text/javascript" src="/adm/smarteditor2/js/HuskyEZCreator.js"></script>	

    <a href="javascript:submitContents(this)" style="display: none;">a</a>

    <script language="javascript">
		var oEditors = [];
		var sLang = "ko_KR"; // 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
	
		nhn.husky.EZCreator.createInIFrame({
		    oAppRef: oEditors,
		    elPlaceHolder: "content",
		    sSkinURI: "/adm/smarteditor2/SmartEditor2Skin.html",
		    htParams: {
		        bUseToolbar: true, // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		        bUseVerticalResizer: true, // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		        bUseModeChanger: true, // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		        //bSkipXssFilter : true,  // client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
		        //aAdditionalFontList : aAdditionalFontSet,  // 추가 글꼴 목록
		        fOnBeforeUnload: function() {
		            //alert("완료!");
		        },
		        I18N_LOCALE: sLang
		    }, //boolean
		    fOnAppLoad: function() {
		        //예제 코드
		        //oEditors.getById["content"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
		    },
		    fCreator: "createSEditor2"
		});
	
		function pasteHTML(filepath) {
		    var sHTML = '<span style="color:#FF0000;"><img src="' + filepath + '"></span>';
		    oEditors.getById["content"].exec("PASTE_HTML", [sHTML]);
		}
	
		function showHTML() {
		    var sHTML = oEditors.getById["content"].getIR();
		    alert(sHTML);
		}
	
		// function submitContents(elClickedObj) {
		//     oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []); // 에디터의 내용이 textarea에 적용됩니다.
		//     try {
		//         var form2 = document.f;
		//         if (!form2.name.value) {
		//             alert("작성자 이름을 입력해 주십시오");
		//             form2.name.focus();
		//             return;
		//         }
		
		//         if (!form2.subject.value) {
		//             alert("글제목을 입력해 주십시오.");
		//             form2.subject.focus();
		//             return;
		//         }
	
		//         if (document.getElementById("content").value == "<p><br></p>") {
		//             alert("내용을 입력해 주세요.");
		//             oEditors.getById["content"].exec("FOCUS", []);
		//             return;
		//         }
		
		//         form2.action = "article_write_ok.php";
		//         //elClickedObj.form.submit();
		//         form2.submit();
		//     } catch (e) {
		//         alert(e);
		//     }
		// }
	
		function setDefaultFont() {
		    var sDefaultFont = '궁서';
		    var nFontSize = 24;
		    oEditors.getById["content"].setDefaultFont(sDefaultFont, nFontSize);
		}
		
		function writeReset() {
		    document.f.reset();
		    oEditors.getById["content"].exec("SET_IR", [""]);
		}
	
		function chkval() {
            $("#btn_submit").html("저장중");
            $("#btn_submit").attr("disabled", true);
            $("#btn_cancel").attr("disabled", true);	
			var sHTML = oEditors.getById["content"].getIR();
			$("#content").val(sHTML);   
		}   
		
		// 파일 업로드 버튼 클릭
		setTimeout(function(){
			$("iframe").contents().find(".se2_mn").click(function(){
				$("#attach").click();
			});
		}, 2000);
	
		$(document).on("change", "#attach", function(){
			ajaxFileUpload();
		});
	
	    function ajaxFileUpload() {
	        var form = $("#ajaxFrom")[0];
	        var formData = new FormData(form);
	        formData.append("message", "ajax로 파일 전송하기");
	        formData.append("file", jQuery("#attach")[0].files[0]);
	
	        jQuery.ajax({
	              url : "/adm/article/eupload"
	            , type : "POST"
	            , processData : false
	            , contentType : false
	            , data : formData
	            , success:function(json) {
	                //var obj = JSON.parse(json);
	                console.log(json);
	                var sHTML = '<div class="img"><img src="'+json.url+'"></div>';
					oEditors.getById["content"].exec("PASTE_HTML", [sHTML]);
	            }
				, error: function(err){
					console.log(err);
				}
	        });
	    }
	    
		// 이미지 미리보기
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$(input).parent().find("a").html("<img src='" + e.target.result + "' />");
					//$('#image_section').attr('src', e.target.result);  
				}
			
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("input[type='file']").change(function(){
			readURL(this);
		});	    

	</script>
	
	<form id="ajaxFrom" method="post" style="display:none;">
		<input type="file" name="attach" id="attach" />
	</form>

	