    <main class="main-wrap">
        <div class="card-wrap">
            <h1>배너</h1>
            <div class="top-btn-wrap">
                <ul class="clearfx">
	                <li>
                        <input type="text" id="title" value="<?php echo $this->input->get('title'); ?>" placeholder="배너 검색" />
                    </li>
                    <li>
                        <select id="ispc">
                            <option value="">PC사용 여부</option>
                            <option value="1" <? if ($this->input->get('ispc') == '1') echo 'selected';  ?> >사용</option>
                            <option value="0" <? if ($this->input->get('ispc') == '0') echo 'selected';  ?> >미사용</option>
                        </select>
                    </li>  
                    <li>
                        <select id="ismobile">
                            <option value="">모바일 사용 여부</option>
                            <option value="1" <? if ($this->input->get('ismobile') == '1') echo 'selected';  ?> >사용</option>
                            <option value="0" <? if ($this->input->get('ismobile') == '0') echo 'selected';  ?> >미사용</option>
                        </select>
                    </li>                                                            
                    <li><a href="/adm/banner/edit" class="type1-btn">등록하기</a></li>
                    <li><a href="exceldown?isexcel=true" class="type2-btn" id="excel">엑셀 다운로드</a></li>
                    <li><a href="/adm/banner/ord_post" class="type1-btn cssord">순서저장</a></li>
                </ul>
            </div>
            
            <div class="table-wrap">
				<table id="dtable" class="display" style="width:100%">
					<thead>
			            <tr>
				            <th>번호</th>
			                <th>제목</th>
			                <th>등록일</th>
			                <th>PC 사용여부</th>
			                <th>모바일 사용여부</th>
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
			var ispc = getParameter('ispc');
            var ismobile = getParameter('ismobile');
			
			$('#title').val(title);
			$('#ispc').val(ispc);
            $('#ismobile').val(ismobile);
			
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
	            "iDisplayLength": 15,
			    "language" : lang_kor,
		        "processing": true,
		        "serverSide": true,
		        "searching": false,
		        "ajax": {
			    	"url": "/adm/banner/json",
			        'data': function(data){
				        // Read values
				        var title = $('#title').val();
						var ispc = $('#ispc').val();
                        var ismobile = $('#ismobile').val();
						
						// Append to data
						data.title = title;
						data.ispc = ispc;
                        data.ismobile = ismobile;
					}
				},
		        "bStateSave": true,
		        "dom" : 'frtlip',
		        "columns": [	        
					{ 
			            "orderable": false,
			        	"data": "ba_id",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row, meta) {
		                    return '<span class="ui-icon ui-icon-arrowthick-2-n-s" style="cursor:move;"></span>' + (meta.settings._iRecordsTotal - meta.row - meta.settings._iDisplayStart);
		            	}
	                },
					{ 
			            "orderable": false,
			        	"data": "title",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
		                    return "<a href='/adm/banner/edit/" + row.ba_id + "' class='cssview' data-id='" + row.ba_id + "' >" + val + "</a>";
		            	}
			        },
			        {
				        "orderable": false, 
			        	"data": "regist_date",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	return '<span class="date">' + val.substr(0,10) + '</span>';
		                }
			        },	
					{ 
				        "orderable": false,
			        	"data": "ispc",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	var retval = "";
				        	if (val == 1) {
					        	retval = '<button class="openClose-btn ispc" data-id="' + row.ba_id + '" style="width:auto;">PC사용</button>';
				        	} else {
					        	retval = '<button class="openClose-btn ispc" data-id="' + row.ba_id + '" style="width:auto;">PC미사용</button>';
				        	}
							return retval;
		                }
			        },			        	                
			        { 
				        "orderable": false,
			        	"data": "ispc",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	var retval = "";

                            if (row.ismobile == 1) {
					        	retval += '<button class="openClose-btn ismobile" data-id="' + row.ba_id + '" style="width:auto;">모바일 사용</button>';
				        	} else {
					        	retval += '<button class="openClose-btn ismobile" data-id="' + row.ba_id + '" style="width:auto;">모바일 미사용</button>';
				        	}

				        	return retval;
		                }
			        },			        	                
			        { 
				        "orderable": false,
			        	"data": "ispc",
			        	"className" : "alignCenter",
			        	"render" : function (val, type, row) {
				        	var retval = "";
				        	return retval += '<button class="del-btn" data-id="' + row.ba_id + '">삭제</button>';
		                }
			        }
		        ]
		    });
		    
		    // change url
		    function change_url() {
				var param = "";
				
				var ispc = $("#ispc").val();
				var title = $("#title").val();
                var ismobile = $("#ismobile").val();
				
			    if (ispc != "") param += "&ispc=" + $('#ispc').val();
                if (ismobile != "") param += "&ismobile=" + $('#ismobile').val();
			    if (title != "") param += "&title=" + $('#title').val();
				
			    history.replaceState("", "", "?" + param.substr(1));							    
		    }
		    
			$(document).on("change", "#ispc, #ismobile", function(){	
				change_url();
				dataTable.draw();
			});
			
			$(document).on("keyup", "#title", function(){	
				change_url();
				dataTable.draw();
			});					    
			
			
	        //PC사용 버튼 토글
			$(document).on("click", ".ispc", function(){	
                if (confirm("PC사용 여부 변경 하겠습니까?")) {
                    var obj = $(this);
                    $.ajax({
                        type: "post",
                        url: "/adm/banner/ispc/",
                        data: {'ba_id' : obj.attr("data-id")},
                        beforeSend : function(xhr, opts) {
                        },
                        success: function(result) {
                            obj.text(obj.text() == 'PC사용' ? 'PC미사용' : 'PC사용');
                        },
                        error: function(err){
                            console.log(err);
                        }
                    });
                }
			});

	        //모바일 사용 버튼 토글
			$(document).on("click", ".ismobile", function(){	
                if (confirm("모바일 사용 여부 변경 하겠습니까?")) {
                    var obj = $(this);
                    $.ajax({
                        type: "post",
                        url: "/adm/banner/ismobile/",
                        data: {'ba_id' : obj.attr("data-id")},
                        beforeSend : function(xhr, opts) {
                        },
                        success: function(result) {
                            obj.text(obj.text() == '모바일 사용' ? '모바일 미사용' : '모바일 사용');
                        },
                        error: function(err){
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
					    url: "/adm/banner/delete/" + obj.attr("data-id"),
					    data: {'ba_id' : obj.attr("data-id")},
					    beforeSend : function(xhr, opts) {
					    },
					    success: function(result) {
						    location.href = location.href;
						},
					    error: function(err){
						    console.log(err);
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
				
				var url = "/adm/banner/json?isexcel=true" + param;
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
                                var filename = "배너목록_" + "<?=date('YmdHis')?>" + ".xlsx";
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

	        // sort
	        setTimeout(function(){
		        $("#dtable").find("tbody").attr("id", "sortable");
		        $("#sortable" ).sortable();
	        }, 2000);
	        
	        // 순서저장
	        $(".cssord").click(function(){
		        var ba_ids = "";
		        $(".cssview").each(function(){
			        ba_ids += "," + $(this).attr("data-id"); 
		        });
		        ba_ids = ba_ids.substr(1);

                alert(ba_ids);
		        
		        var purl = $(this).attr("href");
				$.ajax({
				    type: "post",
				    url: purl,
				    data: {"ba_ids": ba_ids},
				    beforeSend : function(xhr, opts) {
				    },
				    success: function(result) {
                        //console.log(result);
					    alert("순저 저장되었습니다.");
					    location.href = location.href;
					},
				    error: function(err){
				        console.log(err.message);
				    }
				});
		        return false;
	        });  


		});
		
    </script>