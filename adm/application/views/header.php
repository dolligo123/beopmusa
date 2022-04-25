<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>법무사네트워크 관리자</title>
    
    <link rel="stylesheet" type="text/css" href="/css/admin.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui-timepicker-addon.css" />
    
	<script src="/js/jquery-3.3.1.js"></script>
    <script src="/js/jquery-ui.js"></script>    
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/xlsx.full.min.js"></script>
    <script src="/js/FileSaver.min.js"></script>
    <script src="/js/jquery-ui-timepicker-addon.js"></script>    
    <script src="/js/common.js"></script>

    <script type="text/javascript">
        function s2ab(s) { 
            var buf = new ArrayBuffer(s.length); //convert s to arrayBuffer
            var view = new Uint8Array(buf);  //create uint8array as viewer
            for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF; //convert to octet
            return buf;    
        }

        function exportExcel(excelHandler){ 
            // step 1. workbook 생성
            var wb = XLSX.utils.book_new();

            // step 2. 시트 만들기 
            var newWorksheet = excelHandler.getWorksheet();
            
            // step 3. workbook에 새로만든 워크시트에 이름을 주고 붙인다.  
            XLSX.utils.book_append_sheet(wb, newWorksheet, excelHandler.getSheetName());

            // step 4. 엑셀 파일 만들기 
            var wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});

            // step 5. 엑셀 파일 내보내기 
            saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), excelHandler.getExcelFileName());
        }    
        
        $(function(){
	        var href = location.href;
	        href = href.split('/adm/');
	        href = href[1].split('/');
	        href = href[0];
            href = href.split('?')[0];
	        $(".menu-list").find("a[data-menu='"+href+"']").addClass("on");
        });
    </script>
</head>
<body>
    <nav class="sidebar">
        <a href="/adm" class="icon logo">법무사네트워크</a>
        <a href="javascript:void(0)" class="icon menu-btn">메뉴</a>
        <ul class="menu-list">
            <li><a href="/adm/beopmusa" data-menu='beopmusa'>법무사목록</a></li>
            <li><a href="/adm/joinq" data-menu='joinq'>가입문의</a></li>
            <li><a href="/adm/counselq" data-menu='counselq'>상담문의</a></li>
	        <li><a href="/adm/banner" data-menu='banner'>배너관리</a></li>
            <li><a href="/adm/article" data-menu='article'>미디어</a></li>
            <li><a href="/adm/manager" data-menu='manager'>관리자정보</a></li>
            <li><a href="/adm/login/logout">로그아웃</a></li>
        </ul>
    </nav>
</body>