    <main class="main-wrap">
        <div class="card-wrap">
            <h1>법무사</h1>
            <div class="top-btn-wrap">
                <ul class="clearfx">
	                <li>
                        <input type="text" id="title" value="<?php echo $this->input->get('title'); ?>" placeholder="법무사 검색" />
                    </li>
                    
                    <li>
                        <select id="city_code">
                            <option value="">광역시도선택</option>
							<?php 
							foreach ($city['data'] as $item):
								$selected = "";
								if ($item['city_code'] == $this->input->get('city_code')) $selected = "selected"; 
								echo '<option value="'.$item['city_code'].'" '.$selected.' >'.$item['city_name'].'</option>';
							endforeach; 
							?>                              
                        </select>
                    </li>
                    <li>
                        <select id="district_code">
                            <option value="">시군구선택</option>
                        </select>                        
                    </li>                     
                    
                    <li>
                        <select id="isopen">
                            <option value="">공개 여부</option>
                            <option value="1" <? if ($this->input->get('isopen') == '1') echo 'selected';  ?> >공개</option>
                            <option value="0" <? if ($this->input->get('isopen') == '0') echo 'selected';  ?> >비공개</option>
                        </select>
                    </li>                                        
                    <li><a href="beopmusa/edit" class="type1-btn">등록하기</a></li>
                    <li><a href="exceldown?isexcel=true" class="type2-btn" id="excel">엑셀 다운로드</a></li>
                </ul>
            </div>
            
            <div class="table-wrap">
				<table id="dtable" class="display" style="width:100%">
					<thead>
			            <tr>
				            <th>번호</th>
			                <th>법무사명</th>
			                <th>주소</th>
			                <th>가입일</th>
			                <th>등록일</th>
			                <th>보기</th>
			                <th>관리</th>
			            </tr>
			        </thead>
			    </table>            
			</div>
        </div>


    </main>
    <script>
		$(document).ready(function() {
			var title = getParameter('title');
			var city_code = getParameter('city_code');
			var district_code = getParameter('district_code');
			var isopen = getParameter('isopen');
			
			$('#title').val(title);
			$('#city_code').val(city_code);
			$('#district_code').val(district_code);
			$('#isopen').val(isopen);
			
			// Korean
		    var lang_kor = {
		        "decimal" : "",
		        "emptyTable" : "데이터가 없습니다.",
		        "info" : "_START_ - _END_ (총 _TOTAL_ 개)",
		        "infoEmpty" : "0개",
		        "infoFiltered" : "(전체 _MAX_ 개 중 검색결과)",
		        "infoPostFix" : "",
		        "thousands" : ",",
		        "lengthMenu" : "_MENU_ 개씩 보기",
		        "loadingRecords" : "로딩중...",
		        "processing" : "처리중...",
		        "search" : "검색 : ",
		        "zeroRecords" : "검색된 데이터가 없습니다.",
		        "paginate" : {
		            "first" : "첫 페이지",
		            "last" : "마지막 페이지",
		            "next" : "다음",
		            "previous" : "이전"
		        },
		        "aria" : {
		            "sortAscending" : " :  오름차순 정렬",
		            "sortDescending" : " :  내림차순 정렬"
		        }
		    };
	
		    var dataTable = $('#dtable').DataTable({
			    "aLengthMenu": [[15, 25, 50, 100], [15, 25, 50, 100]],
	            //"iDisplayLength": 10,
			    "language" : lang_kor,
		        "processing": true,
		        "serverSide": true,
		        "searching": false,
		        "ajax": {
			    	"url": "/adm/beopmusa/json",
			        'data': function(data){
				        // Read values
				        var title = $('#title').val();
						var city_code = $('#city_code').val();
						var district_code = $('#district_code').val();
						var isopen = $('#isopen').val();
						
						// Append to data
						data.title = title;
						data.city_code = city_code;
						data.district_code = district_code;
						data.isopen = isopen;
					}
				},
		        "bStateSave": true,
		        "dom" : 'frtlip',
		        "columns": [	        
					{ 
			            "orderable": false,
			        	"data": "bp_id",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row, meta) {
		                    return meta.settings._iRecordsTotal - meta.row - meta.settings._iDisplayStart;
		            	}
	                },
					{ 
			            "orderable": false,
			        	"data": "title",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
		                    return "<a href='/adm/beopmusa/edit/" + row.bp_id + "' class='cssview' >" + val + "</a>";
		            	}
			        },
					{ 
			            "orderable": false,
			        	"data": "addr_new",
			        	"className" : "alignCenter"
			        },
			        {
				        "orderable": false, 
			        	"data": "join_date",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	return '<span class="date">' + val + '</span>';
				        	//return '<span class="date">' + val + '</span>';
		                }
			        },			        
			        {
				        "orderable": false, 
			        	"data": "regist_date",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	return '<span class="date">' + val.substr(0, 10) + '</span>';
				        	//return '<span class="date">' + val + '</span>';
		                }
			        },
					{
				        "orderable": false, 
			        	"data": "bp_uid",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	var retval = "";
				        	retval += '<a class="type2-btn" href="/beopmusa/' + row.bp_id + '" target="_blank" >프론트보기</a>';
				        	retval += '<a class="type2-btn" href="/' + row.bp_uid + '" target="_blank" >개별주소보기</a기';
				        	return retval;
		                }
			        },			        		                
			        { 
				        "orderable": false,
			        	"data": "isopen",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	var retval = "";
				        	if (val == 1) {
					        	retval = '<button class="openClose-btn" data-id="' + row.bp_id + '">공개</button>';
				        	} else {
					        	retval = '<button class="openClose-btn" data-id="' + row.bp_id + '">비공개</button>';
				        	}
				        	return retval += '<button class="del-btn" data-id="' + row.bp_id + '">삭제</button>';
		                }
			        }
		        ]
		    });
		    
		    // change url
		    function change_url() {
				var param = "";
				
				var isopen = $("#isopen").val();
				var city_code = $("#city_code").val();
				var district_code = $("#district_code").val();
				var title = $("#title").val();
				
			    if (isopen != "") param += "&isopen=" + $('#isopen').val();
			    if (city_code != "") param += "&city_code=" + $('#city_code').val();
			    if (district_code != "") param += "&district_code=" + $('#district_code').val();
			    if (title != "") param += "&title=" + $('#title').val();
			    
			    console.log(param);
				
			    history.replaceState("", "", "?" + param.substr(1));							    
		    }
		    
			$(document).on("change", "#isopen, #city_code, #district_code", function(){	
				change_url();
				dataTable.draw();
			});
			
			$(document).on("keyup", "#title", function(){	
				change_url();
				dataTable.draw();
			});					    
			
			
	        //공개-비공개 버튼 토글
			$(document).on("click", ".openClose-btn", function(){	
				if (confirm("공개설정 변경 하겠습니까?")) {
					var obj = $(this);
					$.ajax({
					    type: "post",
					    url: "/adm/beopmusa/isopen/",
					    data: {'bp_id' : obj.attr("data-id")},
					    beforeSend : function(xhr, opts) {
					    },
					    success: function(result) {
						    obj.text(obj.text() == '공개' ? '비공개' : '공개');
						    //location.href = location.href;
						},
					    error: function(err){
					    	alert(err.message);
					        console.log(err.message);
					    }
					});
				}
			});
			
			//delete button click
			$(document).on("click", ".del-btn", function(){	
				if (confirm("삭제하면 복구 안됩니다. 삭제 하시겠습니까?")) {
					var obj = $(this);
					$.ajax({
					    type: "post",
					    url: "/adm/beopmusa/delete/" + obj.attr("data-id"),
					    data: {'bp_id' : obj.attr("data-id")},
					    beforeSend : function(xhr, opts) {
					    },
					    success: function(result) {
						    //console.log(result);
						    location.href = location.href;
						},
					    error: function(err){
						    console.log(err);
					        console.log(err.message);
					    }
					});
				}
			});
			
			// 상세보기, 등록하기 클릭
			$(document).on("click", ".cssview, .type1-btn", function(){
				let href = $(this).attr("href");
				href = href + "?url=" + encodeURIComponent(location.href);
				$(this).attr("href", href);
			});
			
			
			// 엑셀다운로드
			$("#excel").click(function(e){
				let href = location.href;
				let param = href.split("?")[1];
				if (param) param = "&" + param;
				else param = "";
				
				var url = "/adm/beopmusa/json?isexcel=true" + param;
                $(".type2-btn").attr("href", url);

                $.ajax({
                    url: url, 
                    type: "GET", 
                    dataType: "json", 
                    beforeSend : function(xhr, opts) {
                    },            
                    success: function (data) { 
                        var excelHandler = {
                            getExcelFileName : function(){
                                var filename = "법무사목록_" + "<?=date('YmdHis')?>" + ".xlsx";
                                return filename;
                            },
                            getSheetName : function(){
                                return "";
                            },
                            getExcelData : function(){
                                return data
                            },
                            getWorksheet : function(){
                                return XLSX.utils.json_to_sheet(this.getExcelData());
                            }
                        }
                        exportExcel(excelHandler);
                    },
                    error : function() {
                        alert("다운로드 실패");
                    }
                });
                e.preventDefault();
			});
			
			// city 변경시 시 시군구 변경
			function change_city(city_code){
				$.ajax({
				    type: "get",
				    url: "/adm/district/json",
				    data: {'city_code' : city_code},
				    beforeSend : function(xhr, opts) {
				    },
				    success: function(result) {
					    console.log(result);
					    $("#district_code").val('');
						if(result.recordsTotal > 0){
		                    result.data.forEach(function (val, i) {
		                        let option = Structure([
		                            function(){
			                            var selected = '';
			                            if(val.district_code == '<?=$this->input->get('district_code')?>') selected = 'selected';
			                            
			                            return '<option value="' + val.district_code + '" ' + selected + '>' + val.district_name + '</option>';
		                            }
		                        ]);
		                        $("#district_code").append(option);
		                    });
		                }
					},
				    error: function(err){
					    console.log(err);
				    }
				});				
			}
			$(document).on("change", "#city_code", function(){
				var city_code = $(this).val();
				change_city(city_code);				
			});
			if($("#city_code").val()) {
				change_city($("#city_code").val());
			}		
		});
    </script>