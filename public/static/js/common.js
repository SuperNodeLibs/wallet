
var hash = '';
function getCookie(name) {
    var c = document.cookie.match("\\b" + name + "=([^;]*)\\b");
    return c ? c[1] : undefined;
}
function clear_local(){
	localStorage.clear()
}
function requestData(ct){
	var _xsrf = getCookie("_xsrf");
	var s = false;
	if(!ct){
		var ct = $(".coin-type .active").attr("data-coin");
	}
	$.ajax({
		type: "post", async: false, cache: false, dataType: "text",
		url: "/send",
		data: {op:'unspent' ,_xsrf:_xsrf, ct:ct},
		success: function (result) {
			s =  result;
		},
		error: function () {
		}
	});
	if(window.localStorage){
	 	localStorage.localData = s;
		localStorage.num = 1;
		hash = getHash(s);
	}
	return s;

}
function getData(ct){
	var data = '';
	if(window.localStorage){
		var num = localStorage.num;
		localStorage.num = parseInt(num) + 1;
		if(num > 10){
			data = requestData(ct);
			return data;
		}
	 	data = localStorage.localData;
		if(!data || hash != getHash(data)){
			data = requestData(ct);
		}
	}else{
	 	data = requestData(ct);
	}
	return data;
}

function tis(content,time){
		content = content ? content : '操作成功！';
		time = time ? time : 3000;
		var tis = $('<div class="tis_box">'+content+'<button type="button" class="close" aria-hidden="true" id="close_tis">&times;</button></div>').hide();
    $('body').append(tis);
		$("#close_tis").click(function(){
			tis.fadeOut('slow', function(){tis.remove();})
		})
		tis.fadeIn(600);
		setTimeout(function(){
			tis.fadeOut('slow', function(){tis.remove();})
		}, time);

}

function getbtcvalue(a) {
	neg = !1;
	a = String(a);
	"-" == a[0] && (neg = !0, a = a.substring(1));
	for (a = 8 < a.length ? a.substring(0, a.length - 8) + "." + a.substring(a.length - 8) : "0." + "0000000".substring(0, 8 - a.length) + a; 0 < a.length; )
		if ("0" == a.charAt(a.length - 1))
			a = a.substring(0, a.length - 1);
		else {
			"." == a.charAt(a.length - 1) && (a = a.substring(0, a.length - 1));
			break
		}
	neg && (a = "-" + a);
	return a;
}

function htmlEncode(value){
        return $('<div />').text(value).html();
}
function htmlDecode(value) {
        return $('<div />').html(value).text();
}
function validate_address(addr, ct)
{
	var prefix = ct == "ltc" ? 48 : 0;
	if(addr.version == prefix || addr.version == 5)
	{
		return true;
	}
	return false;
}

function opDialog(title,openid){
	dialog = new BootstrapDialog({
		type: 'type-default',
		title: title,
			message: $('#'+openid),
			closable: true,
			closeByBackdrop: false,
			closeByKeyboard: false,
			autodestroy:false
	});
	$('#'+openid).show()
	dialog.open();
}