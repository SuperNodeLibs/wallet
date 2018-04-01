/**
 *设置网关数据
 * @param account 资产发行方
 * @param asset 资产代号
 */
function setGatewayData(account, asset) {
	$.ajax({
		type: "get",
		url: "index/gateway/data/account/" + account,
		async: false,
		success: function(data) {
			data = JSON.parse(data);
			$('.xr_wg').html(account);
			$('#current_gwaccount').val(data.gateway_account);
			$('.xr_mc').html(data.gateway_name);
			$('.xr_dh').html(data.gateway_phone);
			$('.xr_hb').empty();
			for(var i = 0; i < data.gateway_asset.length; i++){
				var item = data.gateway_asset[i];
				$('.xr_hb').append("<option value='"+item.asset_code+"'>"+item.asset_code+"</option>");
			}
			$('.xr_hb').val(asset);
			updateTrust($(".xr_hb").find("option:selected").text(), $('.xr_wg').text());
		}
	});
}

/**
 * 判断是否为数字
 * @param {Object} obj
 */
function isNumber(n) {  
    return !isNaN(parseFloat(n)) && isFinite(n);  
}  

function getSecrect(key,des3) {
	return DES3.decrypt(key, des3);
}
/**
 *信任网关资产
 * @param key 密码
 * @param des3 加密值
 */
function setTrustLine(key, des3){
	var dstAccount = $('.xr_wg').text();
	var assetCode = $('.xr_hb').find('option:selected').text();
	var amount = $('#trustAmount').val();
	try{
		var sec = getSecrect(key, des3);
		$('#btn_trust_ok').val(OTHER_WAITTING);
		setTrust(sec, dstAccount, assetCode, amount);
		$('#btn_trust_ok').val(OTHER_CONFIRM);
	}catch(err){
		if(err.message == "URI malformed" || err.message == "URI error")
			alert(OTHER_USER_LOGIN_ERR);
	};
}

/**
 * 支付资产
 * @param key 支付密码
 * @param des3 加密密码
 * @param dstAccount 目标账号
 * @param issuer 资产发行者
 * @param asset 资产名称
 * @param payAmount 支付数量
 */
function paymentAsset(key, des3, dstAccount, issuer, asset, payAmount){
	try{
		var sec = getSecrect(key, des3);
		//支付
		payment(sec, dstAccount, issuer, asset, payAmount);
	}catch(err){
		if(err.message == "URI malformed" || err.message == "URI error")
			alert(OTHER_USER_LOGIN_ERR);
			delloading();
	};
}

/**
 * 创建账号
 * @param key 支付密码
 * @param des3 加密密码
 * @param dstAccount 目标账号
 * @param issuer 资产发行者
 * @param asset 资产名称
 * @param payAmount 支付数量
 */
function startCreateUser(key, des3, dstAccount, issuer, asset, payAmount){
	try{
		var sec = getSecrect(key, des3);
		if(issuer != "" && asset!=""){//充值的其他资产转化为基础资产
			var data = getHuiLv(asset, issuer);
			var total = (payAmount / data.asset_price).toString();
			createUser(sec, dstAccount, total);
		}else{
			createUser(sec, dstAccount, payAmount);
		}
		
	}catch(err){
		if(err.message == "URI malformed" || err.message == "URI error")
			alert(OTHER_USER_LOGIN_ERR);
			delloading();
	};
}

/**
 * 兑换资产
 * @param key 支付密码
 * @param des3 加密密码
 * @param assetSrcCode 源资产代码
 * @param assetSrcIssuer 源资产发行者
 * @param assetObjCode 目标资产代码
 * @param assetObjIssuer 目标资产发行者
 * @param payAmount 支付原始资产数量
 */
function convertAsset(key, des3, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, payAmount, price){
	try{
		var sec = getSecrect(key, des3);
		//兑换
		makeOffer(sec, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, payAmount, price, 0);
	}catch(err){
		if(err.message == "URI malformed" || err.message == "URI error")
			alert(OTHER_USER_LOGIN_ERR);
	};
}

/**
 * 兑换资产2(利用分子分母，精确到小数点后4位)
 * @param key 支付密码
 * @param des3 加密密码
 * @param assetSrcCode 源资产代码
 * @param assetSrcIssuer 源资产发行者
 * @param assetObjCode 目标资产代码
 * @param assetObjIssuer 目标资产发行者
 * @param payAmount 支付原始资产数量
 * @param sellN 分子
 * @param sellD 分母
 */
function convertAsset2(key, des3, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, payAmount, sellN, sellD){
	try{
		var sec = getSecrect(key, des3);
		//兑换
		makeOffer2(sec, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, payAmount, sellN, sellD, 0);
	}catch(err){
		if(err.message == "URI malformed" || err.message == "URI error")
			alert(OTHER_USER_LOGIN_ERR);
	};
}

/**
 * 删除订单
 */
function doCancelOrder(key, des3, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, price, id){
	try{
		var sec = getSecrect(key, des3);
		//兑换
		makeOffer(sec, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, '0', price, id);
	}catch(err){
		if(err.message == "URI malformed" || err.message == "URI error")
			alert(OTHER_USER_LOGIN_ERR);
	};
}

/**
 * 发行固定数量资产
 * @param key 密码
 * @param des3 加密值
 * @param asset  资产代码
 * @param amount 数量
 * @param receiver 接收者
 * @return 成功
 */
function assetManage(key, des3, asset, amount, receiver){
	try{
		var sec = getSecrect(key, des3);
		if($('input[name="zc"]').get(1).checked && $('#asset_amount').val() !="" && parseFloat($('#asset_amount').val()) >0)
		{
			var pub = assetIssuer(sec, asset, amount, receiver);
			$('#asset_issuer').val(pub);
		}else{
			$('#assetManage').submit();
		}
	}catch(err){
		alert(err);
	};
}

/**
 * 获取私钥
 * @param key 解密密码
 * @param des3 加密的秘钥
 */
function getSecurite(key, des3){
	try{
		var sec = getSecrect(key, des3);
		return sec;
	}catch(err){
		if(err.message == "URI malformed" || err.message == "URI error")
			alert(OTHER_USER_LOGIN_ERR);
	};
	return "";
}
