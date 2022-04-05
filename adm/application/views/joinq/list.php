<main class="main-wrap">
        <div class="card-wrap">
            <h1>문의</h1>
            <div class="top-btn-wrap">
                <ul class="clearfx">
	                <li>
                        <input type="text" id="hp_name" value="<?php echo $this->input->get('hp_name'); ?>" placeholder="법무사명 검색" />
                    </li>
                    <li>
                        <input type="text" id="jq_name" value="<?php echo $this->input->get('jq_name'); ?>" placeholder="이름 검색" />
                    </li>
                    <li>
                        <input type="text" id="tel" value="<?php echo $this->input->get('tel'); ?>" placeholder="전화번호 검색" />
                    </li>                                        
                    <li>
                        <select id="isopen">
                            <option value="">공개 여부</option>
                            <option value="1" <? if ($this->input->get('isopen') == '1') echo 'selected';  ?> >공개</option>
                            <option value="0" <? if ($this->input->get('isopen') == '0') echo 'selected';  ?> >비공개</option>
                        </select>
                    </li>                                        
                    <li><a href="joinq/edit" class="type1-btn">등록하기</a></li>
                    <li><a href="exceldown?isexcel=true" class="type2-btn" id="excel">엑셀 다운로드</a></li>
                </ul>
            </div>
            
            <div class="table-wrap">
				<table id="dtable" class="display" style="width:100%">
					<thead>
			            <tr>
				            <th>번호</th>
			                <th>법무사명</th>
			                <th>이름</th>
                            <th>연락처</th>
			                <th>등록일</th>
			                <th>관리</th>
			            </tr>
			        </thead>
			    </table>            
			</div>
        </div>


    </main>
    <script>
		$(document).ready(function() {
			var hp_name = getParameter('hp_name');
			var jq_name = getParameter('jq_name');
			var tel = getParameter('tel');
			var isopen = getParameter('isopen');
			
			$('#hp_name').val(hp_name);
			$('#jq_name').val(jq_name);
			$('#tel').val(tel);
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
			    	"url": "/adm/joinq/json",
			        'data': function(data){
				        // Read values
				        var hp_name = $('#hp_name').val();
						var jq_name = $('#jq_name').val();
						var tel = $('#tel').val();
						var isopen = $('#isopen').val();
						
						// Append to data
						data.hp_name = hp_name;
						data.jq_name = jq_name;
						data.tel = tel;
						data.isopen = isopen;
					}
				},
		        "bStateSave": true,
		        "dom" : 'frtlip',
		        "columns": [	        
					{ 
			            "orderable": false,
			        	"data": "jq_id",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row, meta) {
		                    return meta.settings._iRecordsTotal - meta.row - meta.settings._iDisplayStart;
		            	}
	                },
					{ 
			            "orderable": false,
			        	"data": "hp_name",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
		                    return "<a href='/adm/joinq/edit/" + row.jq_id + "' class='cssview' >" + (val != '' ? val : 'SMS문의')  + "</a>";
		            	}
			        },
					{ 
			            "orderable": false,
			        	"data": "jq_name",
			        	"className" : "alignCenter"
			        },
					{ 
			            "orderable": false,
			        	"data": "tel",
			        	"className" : "alignCenter"
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
			        	"data": "isopen",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	var retval = "";
				        	// if (val == 1) {
					        // 	retval = '<button class="openClose-btn" data-id="' + row.jq_id + '">공개</button>';
				        	// } else {
					        // 	retval = '<button class="openClose-btn" data-id="' + row.jq_id + '">비공개</button>';
				        	// }
				        	return retval += '<button class="del-btn" data-id="' + row.jq_id + '">삭제</button>';
		                }
			        }
		        ]
		    });
		    
		    // change url
		    function change_url() {
				var param = "";
				
				var isopen = $("#isopen").val();
				var jq_name = $("#jq_name").val();
				var tel = $("#tel").val();
				var hp_name = $("#hp_name").val();
				
			    if (isopen != "") param += "&isopen=" + $('#isopen').val();
			    if (jq_name != "") param += "&jq_name=" + $('#jq_name').val();
			    if (tel != "") param += "&tel=" + $('#tel').val();
			    if (hp_name != "") param += "&hp_name=" + $('#hp_name').val();
			    
			    console.log(param);
				
			    history.replaceState("", "", "?" + param.substr(1));							    
		    }
		    
			$(document).on("change", "#isopen", function(){	
				change_url();
				dataTable.draw();
			});
			
			$(document).on("keyup", "#hp_name, #jq_name, #tel", function(){	
				change_url();
				dataTable.draw();
			});					    
			
			
	        //공개-비공개 버튼 토글
			$(document).on("click", ".openClose-btn", function(){	
				if (confirm("공개설정 변경 하겠습니까?")) {
					var obj = $(this);
					$.ajax({
					    type: "post",
					    url: "/adm/joinq/isopen/",
					    data: {'jq_id' : obj.attr("data-id")},
					    beforeSend : function(xhr, opts) {
					    },
					    success: function(result) {
						    obj.text(obj.text() == '공개' ? '비공개' : '공개');
						    //location.href = location.href;
						},
					    error: function(err){
					    	//alert(err.message);
					        console.log(err);
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
					    url: "/adm/joinq/delete/" + obj.attr("data-id"),
					    data: {'jq_id' : obj.attr("data-id")},
					    beforeSend : function(xhr, opts) {
					    },
					    success: function(result) {
						    //console.log(result);
						    location.href = location.href;
						},
					    error: function(err){
						    console.log(err);
					        //console.log(err.message);
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
				
				var url = "/adm/joinq/json?isexcel=true" + param;
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
                                var filename = "문의목록_" + "<?=date('YmdHis')?>" + ".xlsx";
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
		});
    </script>