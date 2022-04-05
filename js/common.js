var _DOMAIN = ".cafe24.com";
function Structure(a) {
    let base = $("<div>");
    let current;
    a.forEach(function (v) {
        switch ($.type(v)) {
            case "string":
                let str = v.trim();
                if (/^<.+>$/ig.test(str)) {
                    current = $(str);
                } else {
                    current = $("<div>").append(str);
                }
                base.append(current);
                break;
            case "function":
                base.append(v.call());
                break;
            case "object":
                base.append(v);
                break;
            case "array":
                current.append(Structure(v));
                break;
        }
    });
    return base.contents();
}

// session storage save
function SessionSave(id) {
    if (sessionStorage) {
        var pName = location.href;
        sessionStorage.setItem(pName, $('#' + id).html());
    }
}

// 쿠키 입력
function set_cookie(name, value, expirehours, domain) {
    var today = new Date();
    today.setTime(today.getTime() + (60*60*1000*expirehours));
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + today.toGMTString() + ";";
    if (domain) {
        document.cookie += "domain=" + domain + ";";
    }
}

function setCookie(name, value, expiredays, domain) { 
	var todayDate = new Date(); 
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";";
    if (domain) {
        document.cookie += "domain=" + domain + ";";
    }
}

// 쿠키 얻음
function get_cookie(name) {
    var find_sw = false;
    var start, end;
    var i = 0;

    for (i=0; i<= document.cookie.length; i++)
    {
        start = i;
        end = start + name.length;

        if(document.cookie.substring(start, end) == name)
        {
            find_sw = true
            break
        }
    }

    if (find_sw == true)
    {
        start = end + 1;
        end = document.cookie.indexOf(";", start);

        if(end < start)
            end = document.cookie.length;

        return unescape(document.cookie.substring(start, end));
    }
    return "";
}

// 쿠키 지움
function delete_cookie(name) {
    var today = new Date();

    today.setTime(today.getTime() - 1);
    var value = get_cookie(name);
    if(value != "")
        document.cookie = name + "=" + value + "; path=/; expires=" + today.toGMTString();
}

// s:위경도로 거리계산
function computeDistance(startCoords, destCoords) {
    var startLatRads = degreesToRadians(startCoords.latitude);
    var startLongRads = degreesToRadians(startCoords.longitude);
    var destLatRads = degreesToRadians(destCoords.latitude);
    var destLongRads = degreesToRadians(destCoords.longitude);

    var Radius = 6371; //지구의 반경(km)
    var distance = Math.acos(Math.sin(startLatRads) * Math.sin(destLatRads) + 
                    Math.cos(startLatRads) * Math.cos(destLatRads) *
                    Math.cos(startLongRads - destLongRads)) * Radius;
	
	distance = Math.round(distance * 10) / 10;
    return distance;
}

function degreesToRadians(degrees) {
    radians = (degrees * Math.PI)/180;
    return radians;
}
// e:위경도로 거리계산

// 모바일 체크
function isMobile() {
	var UserAgent = navigator.userAgent;

	if (UserAgent.match(/iPhone|iPod|Android|Windows CE|BlackBerry|Symbian|Windows Phone|webOS|Opera Mini|Opera Mobi|POLARIS|IEMobile|lgtelecom|nokia|SonyEricsson/i) != null || UserAgent.match(/LG|SAMSUNG|Samsung/) != null) {
		return true;
	}else{
		return false;
	}
}

// 파라미터 리턴
var getParameter = function (param) {
    var returnValue;
    var url = location.href;
    var parameters = (url.slice(url.indexOf('?') + 1, url.length)).split('&');
    for (var i = 0; i < parameters.length; i++) {
        var varName = parameters[i].split('=')[0];
        //console.log(varName);
        //console.log(param);
        if (varName.toLowerCase() == param.toLowerCase()) {
            returnValue = parameters[i].split('=')[1];
            return decodeURIComponent(returnValue);
        }
    }
};

function getParam(sname) {
    var params = location.search.substr(location.search.indexOf("?") + 1);
    var sval = "";
    params = params.split("&");
    for (var i = 0; i < params.length; i++) {
        temp = params[i].split("=");
        if ([temp[0]] == sname) { sval = temp[1]; }
    }
    return sval;
}

// add comma
function AddComma(num) {
    var regexp = /\B(?=(\d{3})+(?!\d))/g;
    return num.toString().replace(regexp, ',');
}

$(function(){
    // only number
    $("input[numberonly]").on("keyup", function() {
       // $(this).val($(this).val().replace(/[^0-9,-,]/g,""));
    });

    // only number
    $("input[numberonly]").on("change", function() {
       // $(this).val($(this).val().replace(/[^0-9,-,]/g,""));
    });
    
	// check invalid
/*
	var _invalid = false;
	$('input').on('invalid', function(e) {
		if(_invalid == false){
			_invalid = true;
			var top = $(this).offset().top;
			setTimeout(function(){
	            $('html, body').animate({scrollTop: top - 150 }, 200);
	            _invalid = false;
	        }, 0);
	        //alert($(this).attr("data-alert"));
        }
	});   
*/ 
});

$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};


function numberWithCommas(obj) {
    obj.value = obj.value.replace(/[^0-9]/g,'');   // 입력값이 숫자가 아니면 공백
    obj.value = obj.value.replace(/,/g,'');          // ,값 공백처리
    $(obj).val(obj.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",")); // 정규식을 이용해서 3자리 마다 , 추가 
}