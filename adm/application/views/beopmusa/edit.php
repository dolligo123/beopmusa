    <form name="form" action="/adm/beopmusa/post" enctype="multipart/form-data" method="post" onsubmit="return chkval();" >
    <input type="hidden" name="bp_id" value="<?=$beopmusa['bp_id']?>" />
    <input type="hidden" name="url" value="<?=$url?>" />
    <input type="hidden" id="hp_uid_chk"  />

    <main class="main-wrap">
        <div class="card-wrap">
            <h1>법무사 상세 페이지</h1>
            <dl>
                <dt class="essential">
                    <h1>법무사명</h1>
                </dt>
                <dd>
                    <input type="text" name="title" placeholder="법무사명을 입력하세요." value="<?=$beopmusa['title']?>" required />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>법무사개별아이디<span id="span_chk_uid"></span></h1>
                </dt>
                <dd>
                    <input type="text" name="hp_uid" placeholder="영문아이디를 입력하세요." maxlength="13" value="<?=$beopmusa['hp_uid']?>" />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>사업자번호</h1>
                </dt>
                <dd>
                    <input type="text" name="b_number" placeholder="사업자번호를 입력하세요." value="<?=$beopmusa['b_number']?>" />
                </dd>
            </dl>
            <dl>
                <dt class="essential">
                    <h1>가입일자</h1>
                </dt>
                <dd>
                    <input type="text" id="join_date" name="join_date" placeholder="가입일자 입력하세요." value="<?=$beopmusa['join_date']?>" required />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>태그</h1>
                </dt>
                <dd>
                    <input type="text" name="tags" placeholder="ex)한의원, 침, 뜸" value="<?=$beopmusa['tags']?>" />
                </dd>
            </dl>                
			<dl>
                <dt>
                    <h1>지점명</h1>
                </dt>
                <dd>
                    <input type="text" name="sub_name" placeholder="지점명을 입력하세요." value="<?=$beopmusa['sub_name']?>" />
                </dd>
            </dl>
			<dl>
                <dt class="essential">
                    <h1>야간진료여부</h1>
                </dt>
                <dd>
                    <input type="radio" value="0" name="isnight" require <?php if($beopmusa['isnight'] == '0') echo 'checked'; ?> /> 불가능
                    <input type="radio" value="1" name="isnight" require <?php if($beopmusa['isnight'] == '1') echo 'checked'; ?> /> 가능
                </dd>
            </dl>
            <dl>
                <dt class="essential">
                    <h1>일요진료여부</h1>
                </dt>
                <dd>
                    <input type="radio" value="0" name="issunday" require <?php if($beopmusa['issunday'] == '0') echo 'checked'; ?> /> 불가능
                    <input type="radio" value="1" name="issunday" require <?php if($beopmusa['issunday'] == '1') echo 'checked'; ?> /> 가능
                </dd>
            </dl>                        

            <dl>
                <dt class="essential">
                    <h1>도로명주소</h1>
                </dt>
                <dd>
                <button type="submit"  onclick="return false;" style="display:none;">aa</button>
                    <button onclick="sample2_execDaumPostcode(''); return false;">주소 검색</button>
                    <input type="text" name="zipcode" value="<?=$beopmusa['zipcode']?>" class="wShort" readonly />
                    <input type="text" name="addr_new" value="<?=$beopmusa['addr_new']?>" class="wLong" required  />
                    <input type="text" name="addr_sub" value="<?=$beopmusa['addr_sub']?>"  placeholder="상세 주소를 입력하세요." class="wLong">
                </dd>
            </dl>
            
            <dl>
                <dt class="essential">
                    <h1>지역</h1>
                    <span class="sub-txt"></span>
                </dt>
                <dd>
                    <select name="city_code" required>
                        <option value="">광역시도 선택</option>
						<?php 
						foreach ($city['data'] as $item): 
							if ($beopmusa['city_code'] == $item['city_code']) $selected = "selected";
							else $selected = "";
							echo '<option value="'.$item['city_code'].'" '.$selected.' data-name="'.$item['city_name'].'">'.$item['city_name'].'</option>';
						endforeach; 
						?>                            
                    </select>
                    <select name="district_code" required>
                        <option value="">시군구 선택</option>
						<?php 
						foreach ($district['data'] as $item): 
							if ($beopmusa['district_code'] == $item['district_code']) $selected = "selected";
							else $selected = "";
							echo '<option value="'.$item['district_code'].'" '.$selected.' data-name="'.$item['district_name'].'">'.$item['district_name'].'</option>';
						endforeach; 
						?>     	                    
                    </select>
                </dd>
            </dl>            
            
            <dl>
                <dt class="essential">
                    <h1>지번주소</h1>
                </dt>
                <dd>
                    <input type="text" name="addr_old" value="<?=$beopmusa['addr_old']?>" placeholder="과거 지번 주소" class="wLong" required  />
                </dd>
            </dl>            
            <dl>
                <dt class="essential">
                    <h1>위치</h1>
                    <span class="sub-txt">주소 검색하면 자동으로 위치정보가 입력됩니다.</span>
                </dt>
                <dd>
                    <input type="text" name="lat" value="<?=$beopmusa['lat']?>" required readonly />
                    <input type="text" name="lng" value="<?=$beopmusa['lng']?>" required readonly />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>홈페이지</h1>
                </dt>
                <dd>
                    <input type="text" name="homepage" placeholder="홈페이지 입력하세요." value="<?=$beopmusa['homepage']?>" />
                </dd>
            </dl>                
            <dl>
                <dt>
                    <h1>블로그</h1>
                </dt>
                <dd>
                    <input type="text" name="blog" placeholder="블로그 입력하세요." value="<?=$beopmusa['blog']?>" />
                </dd>
            </dl>                
            <dl>
                <dt>
                    <h1>카카오</h1>
                </dt>
                <dd>
                    <input type="text" name="kakao" placeholder="카카오 입력하세요." value="<?=$beopmusa['kakao']?>" />
                </dd>
            </dl>                
            
            <dl>
                <dt>
                    <h1>원장명</h1>
                </dt>
                <dd>
                    <input type="text" name="owner" placeholder="원장명 입력하세요." value="<?=$beopmusa['owner']?>" />
                </dd>
            </dl>  
            
           <dl>
                <dt>
                    <h1>원장사진(권장:283*302px)</h1>
                </dt>	                
            	<dd>
            	    <ul class="add-list clearfx">
            	        <li>
            	        	<?php if ($beopmusa['owner_photo']) { ?>
                            <a href="<?=$beopmusa['owner_photo']?>" target="_blank">
	                            <img src="<?=$beopmusa['owner_photo']?>" style="max-width:500px;" />
	                        </a>            	        	
            	        	<?php } else {?>
                            <a href="javascript:void(0);" target="_blank"></a>
	                        <?php } ?>
            	            <input type="file" name="owner_photo" id="owner_photo" />
            	            <span class="file-btn" style="cursor: pointer;" onclick="$('#owner_photo').click()">파일선택</span>
                            <input type="checkbox" name="owner_photo_del" value="1" id="img-chk-0">
                            <label for="img-chk-0">사진 삭제</label>
                        </li>
            	    </ul>
            	</dd>
            </dl>             
            
            <dl>
                <dt>
                    <h1>법무사설명</h1>
                </dt>
                <dd>
                    <textarea name="hp_desc" rows="5" placeholder="내용을 입력하세요."><?=$beopmusa['hp_desc']?></textarea>
                </dd>
            </dl>                
            <dl>
                <dt>
                    <h1>전화번호</h1>
                </dt>
                <dd>
                    <input type="text" name="tel" placeholder="전화번호 입력하세요." value="<?=$beopmusa['tel']?>" />
                </dd>
            </dl>
            <dl>
                <dt>
                    <h1>오시는길 설명</h1>
                </dt>
                <dd>
                    <textarea name="addr_desc" rows="5" placeholder="오시는길 입력하세요."><?=$beopmusa['addr_desc']?></textarea>
                </dd>
            </dl>      


            <dl>
                <dt>
                    <h1>지하철명/호선</h1>
                </dt>
                <dd>
                    <label for="">1. 지하철명 / 호선</label>
                    <input type="text" name="subway1" placeholder="지하철명 입력하세요." value="<?=$beopmusa['subway1']?>" />
                    <select name="subway_line1">
                    	<option value="">호선을 선택하세요.</option>
						<?php 
							foreach ($subway['data'] as $subway_item): 
								if ($beopmusa['subway_line1'] == $subway_item['subway_id']) $selected = "selected";
								else $selected = "";
								echo '<option value="'.$subway_item['subway_id'].'" '.$selected.'>'.$subway_item['subway_name'].'</option>';
							endforeach; 
						?>
                    </select>
                </dd>
                <dd>
                   <label for="">2. 지하철명 / 호선</label>
                   <input type="text" name="subway2" placeholder="지하철명 입력하세요." value="<?=$beopmusa['subway2']?>" />
                    <select name="subway_line2">
                    	<option value="">호선을 선택하세요.</option>
						<?php 
							foreach ($subway['data'] as $subway_item): 
								if ($beopmusa['subway_line2'] == $subway_item['subway_id']) $selected = "selected";
								else $selected = "";
								echo '<option value="'.$subway_item['subway_id'].'" '.$selected.'>'.$subway_item['subway_name'].'</option>';
							endforeach; 
						?>
                    </select>
                </dd>
                <dd>
                   <label for="">3. 지하철명 / 호선</label>
                   <input type="text" name="subway3" placeholder="지하철명 입력하세요." value="<?=$beopmusa['subway3']?>" />
                    <select name="subway_line3">
                    	<option value="">호선을 선택하세요.</option>
						<?php 
							foreach ($subway['data'] as $subway_item): 
								if ($beopmusa['subway_line3'] == $subway_item['subway_id']) $selected = "selected";
								else $selected = "";
								echo '<option value="'.$subway_item['subway_id'].'" '.$selected.'>'.$subway_item['subway_name'].'</option>';
							endforeach; 
						?>
                    </select>
                </dd>
                <dd>
                   <label for="">4. 지하철명 / 호선</label>
                   <input type="text" name="subway4" placeholder="지하철명 입력하세요." value="<?=$beopmusa['subway4']?>" />
                    <select name="subway_line4">
                    	<option value="">호선을 선택하세요.</option>
						<?php 
							foreach ($subway['data'] as $subway_item): 
								if ($beopmusa['subway_line4'] == $subway_item['subway_id']) $selected = "selected";
								else $selected = "";
								echo '<option value="'.$subway_item['subway_id'].'" '.$selected.'>'.$subway_item['subway_name'].'</option>';
							endforeach; 
						?>
                    </select>
                </dd>
                <dd>
                   <label for="">5. 지하철명 / 호선</label>
                   <input type="text" name="subway5" placeholder="지하철명 입력하세요." value="<?=$beopmusa['subway5']?>" />
                    <select name="subway_line5">
                    	<option value="">호선을 선택하세요.</option>
						<?php 
							foreach ($subway['data'] as $subway_item): 
								if ($beopmusa['subway_line5'] == $subway_item['subway_id']) $selected = "selected";
								else $selected = "";
								echo '<option value="'.$subway_item['subway_id'].'" '.$selected.'>'.$subway_item['subway_name'].'</option>';
							endforeach; 
						?>
                    </select>
                </dd>
            </dl>    

            <dl>
                <dt>
                    <h1>오픈시간/닫는시간</h1>
                </dt>
                <?php
	                date_default_timezone_set('Asia/Seoul');
	                $s = '2020-01-10 00:00:00';

                    $arr_day = array("월", "화", "수", "목", "금", "토", "일");
                    $arr_eng = array("mon", "tue", "wed", "thu", "fri", "sat", "sun");
                    $k = 0;
                    foreach ($arr_day as $day):
                    	echo '
                    	<dd>
                    	<label for="">'.$day.'. 오픈시간 / 닫는시간</label>
                    	<select name="'.$arr_eng[$k].'_open">
                        	<option value="">오픈시간</option>
                    	';
						for($i=0; $i<96; $i++) {
							$m = 15*$i;
							$date = strtotime($s."+$m minutes");
							$time = date("H:i", $date);
							if ($time == $beopmusa[$arr_eng[$k].'_open']) $selected = "selected";
							else $selected = "";
							echo '<option value="'.$time.'" '.$selected.'>'.$time.'</option>';
						}
                    	echo '
                    	</select>
                    	';

                    	echo '
                    	<select name="'.$arr_eng[$k].'_close">
                        	<option value="">닫는시간</option>
                    	';
						for($i=0; $i<96; $i++) {
							$m = 15*$i;
							$date = strtotime($s."+$m minutes");
							$time = date("H:i", $date);
							if ($time == $beopmusa[$arr_eng[$k].'_close']) $selected = "selected";
							else $selected = "";
							echo '<option value="'.$time.'" '.$selected.'>'.$time.'</option>';
						}
                    	echo '
                    	</select>
                    	';
                    	
                    	
                    	echo '야간진료함 <input type="radio" name="'.$arr_eng[$k].'_isnight'.'" value="1" '.($beopmusa[$arr_eng[$k].'_isnight'] == '1' ? 'checked' : '').' />';
                    	echo '야간진료안함 <input type="radio" name="'.$arr_eng[$k].'_isnight'.'" value="0" '.($beopmusa[$arr_eng[$k].'_isnight'] == '0' ? 'checked' : '').' />';
                    	
                    	echo '
                    	</dd>
                    	';
                    	
                    	
                    	$k++;
                    endforeach;  
                ?>
            </dl>

            <dl>
                <dt>
                    <h1>점심시간 설명</h1>
                </dt>
                <dd>
                    <textarea name="lunch_desc" rows="5" placeholder="점심시간설명 입력하세요."><?=$beopmusa['lunch_desc']?></textarea>
                </dd>
            </dl>

            <dl>
                <dt>
                    <h1>사진(권장:778*419px)</h1>
                </dt>
            	<dd>
            	    <ul class="add-list clearfx">
	            	    <?php 
		            	for($i=1; $i<=6; $i++): 
		            		$field = 'photo'.$i;
		            	?>
            	        <li>
            	        	<?php if ($beopmusa[$field]) { ?>
                            <a href="<?=$beopmusa[$field]?>" target="_blank">
	                            <img src="<?=$beopmusa[$field]?>" style="max-width:500px;" />
	                        </a>            	        	
            	        	<?php } else {?>
                            <a href="javascript:void(0);" target="_blank"></a>
	                        <?php } ?>
            	            <input type="file" name="<?=$field?>" id="<?=$field?>" />
            	            <span class="file-btn" style="cursor: pointer;" onclick="$('#<?=$field?>').click()">파일선택</span>
                            <input type="checkbox" name="<?=$field?>_del<?=$i?>" value="1" id="img-chk-<?=$i?>">
                            <label for="img-chk-<?=$i?>">삭제</label>
                        </li>
                        <?php endfor; ?>
            	    </ul>
            	</dd>
            </dl>            
        </div>
        <div class="submit-wrap">
            <a class="type2-btn" id="btn_cancel" href="<?=$url?>">취소</a>
            <button class="type1-btn" id="btn_submit" type="submit">저장</button>
        </div>  
    </main>
    </form>      
    
    <script type="text/javascript">
	    $("select[name='city_code']").change(function(){
            change_district();
        });
        
        function change_district() {
		    var query = {};
		    var city_code = $("select[name='city_code']").val();
		    
		    if (city_code == "") {
			    $("select[name='district_code']").html('<option value="">시군구 선택</option>');
			    return false;
		    }

			query = {'city_code' : city_code};
			$.ajax({
			    type: "get",
			    url: "/district", //your valid url
			    datatype : "json",
			    data: query,
			    beforeSend : function(xhr, opts) {
			    },
			    success: function(result) {
				    $("select[name='district_code']").html("");
				    let district = $("select[name='district_code']");
					Structure([
					    function() {
                            //alert($("input[name='addr_new']").val());
                            var subcity = $("input[name='addr_new']").val().split(" ")[1];
                            if ($("input[name='addr_new']").val().split(" ")[0] == "세종특별자치시")
                            	subcity = "세종시";
                            	
						    result.data.forEach(function (val, i) {
                                var selected = "";                                
                                if (subcity == val.district_name)
                                    selected = "selected";

							    district.append('<option value="' + val.district_code + '" data-name="' + val.district_name + '" ' + selected + '>' + val.district_name + '</option>');
							});
					    }
				    ]);
				},
			    error: function(err){
			        console.log(err);
			    }
			});	
        }
		
		function chkval() {        
			
            if ($("#hp_uid_chk").val() == "fail") {
                alert("사용가능한 아이디를 입력해주세요.");
                return false;
            }			
			    
            $("#btn_submit").html("저장중");
            $("#btn_submit").attr("disabled", true);
            $("#btn_cancel").attr("disabled", true);
		}
	</script>
	
	<!-- s: 주소검색 -->
	<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
	
	<!-- iOS에서는 position:fixed 버그가 있음, 적용하는 사이트에 맞게 position:absolute 등을 이용하여 top,left값 조정 필요 -->
	<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
	<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
	</div>
	
	<script>
	    // 우편번호 찾기 화면을 넣을 element
	    var element_layer = document.getElementById('layer');
	
	    function closeDaumPostcode() {
	        // iframe을 넣은 element를 안보이게 한다.
	        element_layer.style.display = 'none';
	    }
	
	    function sample2_execDaumPostcode(idx) {
	        new daum.Postcode({
	            oncomplete: function(data) {
	                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
	
	                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
	                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
	                var addr = ''; // 주소 변수
	                var extraAddr = ''; // 참고항목 변수
	
	                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
	                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
	                    addr = data.roadAddress;
	                } else { // 사용자가 지번 주소를 선택했을 경우(J)
	                    addr = data.jibunAddress;
	                }
                    
                    
	                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
	                if(data.userSelectedType === 'R'){
	                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
	                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
	                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
	                        extraAddr += data.bname;
	                    }
	                    // 건물명이 있고, 공동주택일 경우 추가한다.
	                    if(data.buildingName !== '' && data.apartment === 'Y'){
	                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
	                    }
	                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
	                    if(extraAddr !== ''){
	                        extraAddr = ' (' + extraAddr + ')';
	                    }
	                    // 조합된 참고항목을 해당 필드에 넣는다.
	                    $("input[name='addr_sub" + idx + "']").val(extraAddr);
	                    //document.getElementById("sample2_extraAddress").value = extraAddr;                
	                } else {
		                $("input[name='addr_sub" + idx + "']").val('');
	                    //document.getElementById("sample2_extraAddress").value = '';
	                }
                    

	                // 우편번호와 주소 정보를 해당 필드에 넣는다.
	                //document.getElementById('sample2_postcode').value = data.zonecode;
	                //document.getElementById("sample2_address").value = addr;
	                $("input[name='zipcode" + idx + "']").val(data.zonecode);
	                $("input[name='addr_new" + idx + "']").val(addr);
	                // 커서를 상세주소 필드로 이동한다.
	                //document.getElementById("sample2_extraAddress").focus();
                    $("input[name='addr_sub" + idx + "']").focus();

                    

                    var arr = addr.split(" ");
                    var city_txt = arr[0];
                    var district_txt = arr[1];
                    
                    if (city_txt == "세종특별자치시") city_txt = "세종";
                    if (city_txt == "제주특별자치도") city_txt = "제주";

                    $("select[name='city_code'] > option[data-name='" + city_txt + "']").prop("selected", true);
                    change_district()
                    $("select[name='district_code'] > option[data-name='" + district_txt + "']").prop("selected", true);

                    
                    getgeo('');
                    //getaddr2('');
	
	                // iframe을 넣은 element를 안보이게 한다.
	                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
	                element_layer.style.display = 'none';
	                
	                //console.log(data);
                    
                    //alert(data.jibunAddress);
                    $("input[name='addr_new']").val(data.roadAddress);
                    if (data.jibunAddress)
                    	$("input[name='addr_old']").val(data.jibunAddress);
                    else if (data.autoJibunAddress)
                    	$("input[name='addr_old']").val(data.autoJibunAddress);
	            },
	            width : '100%',
	            height : '100%',
	            maxSuggestItems : 5
	        }).embed(element_layer);
	
	        // iframe을 넣은 element를 보이게 한다.
	        element_layer.style.display = 'block';
	
	        // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
	        initLayerPosition();
	    }
	
	    // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
	    // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
	    // 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
	    function initLayerPosition(){
	        var width = 300; //우편번호서비스가 들어갈 element의 width
	        var height = 400; //우편번호서비스가 들어갈 element의 height
	        var borderWidth = 5; //샘플에서 사용하는 border의 두께
	
	        // 위에서 선언한 값들을 실제 element에 넣는다.
	        element_layer.style.width = width + 'px';
	        element_layer.style.height = height + 'px';
	        element_layer.style.border = borderWidth + 'px solid';
	        // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
	        element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
	        element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
	    }
	</script>
	
	<!-- e:주소검색 -->
	
	<!-- s:주소로 좌표찾기 -->
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=d8cee4831342503056274b86d8723fb1&libraries=services"></script>
	<script type="text/javascript">
	function getgeo(idx) {
		// 주소-좌표 변환 객체를 생성합니다
		var geocoder = new kakao.maps.services.Geocoder();
		var addr = $("input[name='addr_new" + idx + "']").val();
		// 주소로 좌표를 검색합니다
		if (addr) {
			geocoder.addressSearch(addr, function(result, status) {
				// 정상적으로 검색이 완료됐으면 
			    if (status === kakao.maps.services.Status.OK) {
				    $("input[name='lat" + idx + "']").val(result[0].y);
                    $("input[name='lng" + idx + "']").val(result[0].x);
                    //getaddr2('');
			    } 
			});
		}
	}
	
	
	// 좌표로 주소 넣기
	function getaddr2(idx) {
		var geocoder = new kakao.maps.services.Geocoder();
		var callback = function(result, status) {
		    if (status === kakao.maps.services.Status.OK) {
			    console.log(result);
			    $("input[name='addr_old" + idx + "']").val(result[0].address_name);
		    }
		};
		
		var lat = $("input[name='lat" + idx + "']").val();
		var lng = $("input[name='lng" + idx + "']").val();
		
		geocoder.coord2RegionCode(lng, lat, callback);
	}	
	</script>
	
	
	<script type="text/javascript">
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
		
		// 달력
		var pHolidays = "";
		$("#join_date").datepicker({
			dateFormat: "yy-mm-dd",
			monthNames: [ "1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월" ],
			showMonthAfterYear: true,
			yearSuffix : '년',
			dayNamesMin : [ "일", "월", "화", "수", "목", "금", "토" ]
        });    
        
        // check hp_uid        
        function check_hp_uid() {
            if ($("input[name='hp_uid']").val()) {
                var query = {"hp_uid" : $("input[name='hp_uid']").val(), "bp_id" : $("input[name='bp_id']").val()};
                $.ajax({
                    type: "post",
                    url: "/adm/beopmusa/checkuid", //your valid url
                    datatype : "json",
                    data : query,
                    beforeSend : function(xhr, opts) {
                    },
                    success: function(result) {
                        $("#hp_uid_chk").val(result.result);
                        if (result.result == "ok") {
                            $("#span_chk_uid").html(" (사용 가능 아이디 입니다.)");
                            $("#span_chk_uid").css("color", "blue");
                            $("#hp_uid_chk").val(result.result);
                        } else {
                            if ($("input[name='hp_uid']").val()) {
                                $("#span_chk_uid").html(" (사용 불가능 아이디 입니다.)");
                                $("#span_chk_uid").css("color", "red");
                                $("#hp_uid_chk").val(result.result);
                            } else {
                                $("#span_chk_uid").html("");
                                $("#span_chk_uid").css("color", "");
                                $("#hp_uid_chk").val("");
                            }
                        }
                        
                    },
                    error: function(err){
                        // alert(err.message);
                        console.log(err);
                    }
                });
            } else {
                $("#span_chk_uid").html("");
                $("#span_chk_uid").css("color", "");
                $("#hp_uid_chk").val("");
            }
        }
        check_hp_uid();

        $("input[name='hp_uid']").keyup(function(){
            check_hp_uid();
        });            
	</script>