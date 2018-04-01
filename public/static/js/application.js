var g_pair; //新用户密钥对象
var g_receiver; //接收者
var g_asset; //资产
var g_amount; //数量
var g_next = false; //是否进行下一步，只有有多步骤异步操作再使用

var g_callbackPayment; //支付完毕的回调
var g_callbackSetTrust; //设置信任的回调
var g_callbackKillme; //权限自杀后的回调
var g_callbackCreateUser; //创建用户后的回调
var g_callbackMakeOffer;//挂单后的回调
/**
 * 显示区块链错误信息
 * @param {Object} err
 */
function errorMsg(err) {
	if(err == "op_malformed") alert(OTHER_OP_MALFORMED);
	else if(err == "op_underfunded") alert(OTHER_OP_UNDERFUNDED);
	else if(err == "op_low_reserve") alert(OTHER_OP_LOW_RESERVE);
	else if(err == "op_line_full") alert(OTHER_OP_LINE_FULL);
	else if(err == "op_no_issuer") alert(OTHER_OP_NO_ISSUER);
	else if(err == "tx_failed") alert(OTHER_TX_FAILED);
	else if(err == "tx_bad_seq") alert(OTHER_TX_BAD_SEQ);
	else if(err == "tx_too_early") alert(OTHER_TX_TOO_EARLY);
	else if(err == "tx_too_late") alert(OTHER_TX_TOO_LATE);
	else if(err == "tx_missing_operation") alert(OTHER_TX_MISSING_OPERATION);
	else if(err == "tx_bad_auth") alert(OTHER_TX_BAD_AUTH);
	else if(err == "tx_insufficient_balance") alert(OTHER_TX_INSUFFICIENT_BALANCE);
	else if(err == "tx_no_source_account") alert(OTHER_TX_NO_SOURCE_ACCOUNT);
	else if(err == "tx_insufficient_fee") alert(OTHER_TX_INSUFFICIENT_FEE);
	else if(err == "tx_bad_auth_extra") alert(OTHER_TX_BAD_AUTH_EXTRA);
	else if(err == "tx_internal_error") alert(OTHER_TX_INTERNAL_ERROR);
	else if(err == "op_inner") alert(OTHER_OP_INNER);
	else if(err == "op_bad_auth") alert(OTHER_OP_BAD_AUTH);
	else if(err == "op_no_source_account") alert(OTHER_OP_NO_SOURCE_ACCOUNT);
	else if(err == "op_already_exists") alert(OTHER_OP_ALREADY_EXISTS);
	else if(err == "op_src_no_trust") alert(OTHER_OP_SRC_NO_TRUST);
	else if(err == "op_src_not_authorized") alert(OTHER_OP_SRC_NOT_AUTHORIZED);
	else if(err == "op_no_destination") alert(OTHER_OP_NO_DESTINATION);
	 else if(err == "op_no_trust") alert(OTHER_OP_NO_TRUST);
	 else if(err == "op_not_authorized") alert(OTHER_OP_NOT_AUTHORIZED);
	 else if(err == "op_too_few_offers") alert(OTHER_OP_TOO_FEW_OFFERS);
	 else if(err == "op_cross_self") alert(OTHER_OP_CROSS_SELF);
	 else if(err == "op_over_source_max") alert(OTHER_OP_OVER_SOURCE_MAX);
	 else if(err == "op_sell_no_trust") alert(OTHER_OP_SELL_NO_TRUST);
	 else if(err == "op_buy_no_trust") alert(OTHER_OP_BUY_NO_TRUST);
	 else if(err == "buy_not_authorized") alert(OTHER_BUY_NOT_AUTHORIZED);
	 else if(err == "op_sell_no_issuer") alert(OTHER_OP_SELL_NO_ISSUER);
	 else if(err == "buy_no_issuer") alert(OTHER_BUY_NO_ISSUER);
	 else if(err == "op_offer_not_found") alert(OTHER_OP_OFFER_NOT_FOUND);
	 else if(err == "op_too_many_signers") alert(OTHER_OP_TOO_MANY_SIGNERS);
	 else if(err == "op_bad_flags") alert(OTHER_OP_BAD_FLAGS);
	 else if(err == "op_invalid_inflation") alert(OTHER_OP_INVALID_INFLATION);
	 else if(err == "op_cant_change") alert(OTHER_OP_CANT_CHANGE);
	 else if(err == "op_cant_change") alert(OTHER_OP_CANT_CHANGE);
	 else if(err == "op_unknown_flag") alert(OTHER_OP_UNKNOWN_FLAG);
	 else if(err == "op_threshold_out_of_range") alert(OTHER_OP_THRESHOLD_OUT_OF_RANGE);
	 else if(err == "op_bad_signer") alert(OTHER_OP_BAD_SIGNER);
	 else if(err == "op_invalid_home_domain") alert(OTHER_OP_INVALID_HOME_DOMAIN);
	 else if(err == "op_invalid_limit") alert(OTHER_OP_INVALID_LIMIT);
	 else if(err == "op_no_trustline") alert(OTHER_OP_NO_TRUSTLINE);
	  else if(err == "op_not_required") alert(OTHER_OP_NOT_REQUIRED);
	  else if(err == "op_cant_revoke") alert(OTHER_OP_CANT_REVOKE);
	  else if(err == "op_no_account") alert(OTHER_OP_NO_ACCOUNT);
	  else if(err == "op_immutable_set") alert(OTHER_OP_IMMUTABLE_SET);
	  else if(err == "op_has_sub_entries") alert(OTHER_OP_HAS_SUB_ENTRIES);
	  else if(err == "op_not_time") alert(OTHER_OP_NOT_TIME);
	  else if(err == "NotFoundError") alert(OTHER_NOTFOUNDERROR);
	else {
		alert(err);
	}
}

/**
 * 打印普通错误日志
 * @param {Object} err
 */
var logCommonError = function(err) {
	console.log(err);
}

/**
 * 弹出普通错误日志
 * @param {Object} err
 */
var alertCommonError = function(err) {
	if(typeof err.message=="object"){
		errorMsg(err.name);
	}else
		errorMsg(err.message);
}

/**
 * 打印交易错误日志
 * @param {Object} err
 */
var logSubmitError = function(err) {
	console.log(err);
	if(err.extras.result_codes.transaction == "tx_failed" && err.extras.result_codes.operations[0] !=""){
		errorMsg(err.extras.result_codes.operations[0]);
	}else{
		errorMsg(err.extras.result_codes.transaction);
	}
}

/**
 * 隐藏账号
 * @param {Object} account 账号
 * @param {Object} len 左右显示的字符长度
 */
function hidePart(account, len) {
	if(account.length > 14) {
		var pre = account.substring(0, len);
		var end = account.substring(account.length - len);
		return pre + "****" + end;
	} else
		return account;
}

/**
 * 选择网络
 */
function network() {
	return 'https://api.superblockchain.club:8000';
}

/***
 * 同步获取数据
 * @param uril 请求的地址
 * @return 返回数据对象
 */
function syncGetData(uri) {
	var u = network() + uri;
	var d = $.ajax({
		type: "get",
		url: u,
		async: false,
		success: function(data) {

			return data;
		}
	});
	return d.responseJSON;
}

/**
 * 用户主页信息
 */
function home() {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var ledgers_body = "";
	server.ledgers().limit(10).order("desc").call()
		.then(function(ledgerResult) {
			if(ledgerResult.records.length > 0) {
				$('#total').html(ledgerResult.records[0].total_coins);
				$('#fee_pool').html(ledgerResult.records[0].fee_pool);
				$('#seqnumber').html(ledgerResult.records[0].sequence);
					/*mobile*/
					$('#total_m').html(ledgerResult.records[0].total_coins);
					$('#fee_pool_m').html(ledgerResult.records[0].fee_pool);
					$('#seqnumber_m').html(ledgerResult.records[0].sequence);
										
				server.ledgers().order("asc").
				cursor(ledgerResult.records[0].paging_token).stream({
					onmessage: function(result) {
						$('#total').html(result.total_coins);
						$('#fee_pool').html(result.fee_pool);
						$('#seqnumber').html(result.sequence);
							/*mobile*/
							$('#total_m').html(result.total_coins);
							$('#fee_pool_m').html(result.fee_pool);
							$('#seqnumber_m').html(result.sequence);
					}
				});
			}

		})
		.catch(logCommonError);

	var transactions_body = "";
	server.transactions().cursor()
	.limit(10).order("desc").call().then(function(transactions) {

		for(var row in transactions.records) {
			var tx = transactions.records[row];
			var tx_data = processTransaction(new SDKBase.Transaction(tx.envelope_xdr));
		}

		server.transactions().order("asc")
		.cursor(transactions.records[0].paging_token).stream({
			onmessage: function(result) {
				var tx_data = processTransaction(new SDKBase.Transaction(tx.envelope_xdr));
			}
		});

	}).catch(logCommonError);
}

/**
 * 用户的支付信息
 * @param {Object} address 账号
 * @param {Object} cursor 分页光标
 */
function address_payment(address, cursor) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	server.payments().forAccount(address).cursor(cursor).order('desc').limit(5).call()
		.then(function(payments) {
			if(payments.records.length > 0) {
				$('#payment_record').html("");
				for(var i = 0; i < payments.records.length; i++) {
					var record = payments.records[i];
					var trans_link = record._links.transaction.href.split("/");
					var ledger_hash = trans_link[trans_link.length - 1];
					if(record.type == "create_account") {
						if(record.source_account == address)
							$('#payment_record').append('<li><span class="new_time"><span class="glyphicon glyphicon-time" ></span> <span id="hash_' + ledger_hash + '"></span></span><p id="desc_hash_' + ledger_hash + '">'+JSAPP_YOU_FOR+'"<span class="simp_address">' + hidePart(record.account, 7) + '</span>"' +JSAPP_CREATE_SUPPER_TICKET + record.starting_balance + '</p></li>');
						else if(record.account == address)
							$('#payment_record').append('<li><span class="new_time"><span class="glyphicon glyphicon-time"></span> <span id="hash_' + ledger_hash + '"></span></span><p id="desc_hash_' + ledger_hash + '">"<span class="simp_address">' + hidePart(record.account, 7) + '</span>"' + JSAPP_CREATE_SUPPER_FOR_YOU + record.starting_balance + '</p></li>');
					} else if(record.type == "payment") {
						if(record.from == address)
							$('#payment_record').append('<li><span class="new_time"><span class="glyphicon glyphicon-time"></span> <span id="hash_' + ledger_hash + '"></span></span><p id="desc_hash_' + ledger_hash + '">'+JSAPP_YOU_DIR+'"<span class="simp_address">' + hidePart(record.to, 7) + '</span>"' + record.asset_code+':' + record.amount + '</p></li>');
						else if(record.to == address)
							$('#payment_record').append('<li><span class="new_time"><span class="glyphicon glyphicon-time"></span> <span id="hash_' + ledger_hash + '"></span></span><p id="desc_hash_' + ledger_hash + '">"<span class="simp_address">' + hidePart(record.from, 7) + '</span>"' +JSAPP_CREATE_SUPPER_FOR_YOU + record.amount + '</p></li>');
					}
					server.transactions().transaction(ledger_hash)
					.call().then(function(transaction) {
						$('#hash_' + transaction.hash).html(transaction.created_at);
						if(transaction.memo_type == "text") {
							$('#desc_hash_' + transaction.hash).append('('+OTHER_SUMMARY+'：' + transaction.memo + ')');
						}
					});
				}
			} else {
				$('#payment_record').html('<div class="text-center"><span class="glyphicon glyphicon-info-sign"></span> '+OTHER_NO_RECORD+'</div>');
			}
		})
		.catch(logCommonError);
}

/**
 * 获取指定账号相应网关、资产余额
 * @param address 账号
 * @param issuer  发行人，可以省略
 * @param assetCode 资产名称，可以省略，为原始资产
 */
function getBalance(address, issuer, assetCode) {
	var data = syncGetData('/accounts/' + address);

	for(var row in data.balances) {
		var asset = data.balances[row];
		if(issuer != "" && asset.asset_issuer == issuer && asset.asset_code == assetCode) {
			return asset;
		}

		if(issuer == "" && asset.asset_type == 'native') {
			return asset;
		}
	}
}

/**
 * 以文本方式处理小数点（因为计算机浮点数问题）
 * @param {Object} total 总的数量
 * @param {Object} sub 减去数量（整型）
 */
function textDesc(total, sub){
	var yu = parseInt(total) - sub;
	var xiaoshu = (total + "").split('.');
	return yu + "." + xiaoshu[1];
}
/**
 * 获取指定账号原生余额(可用)
 * @param address 账号
 */
function getAvlBalance(address) {
	var data = syncGetData('/accounts/' + address);
	var frez = (data.subentry_count + 2) * 10;
	for(var row in data.balances) {
		var asset = data.balances[row];

		if(asset.asset_type == 'native') {
			return textDesc(asset.balance, frez);
		}
	}
}

/**
 * 获取网关的汇率
 * @param {Object} assetCode 资产代码
 * @param {Object} assetIssuer 发行网关
 */
function getHuiLv(assetCode, assetIssuer) {
	var d = $.ajax({
		type: "get",
		url: '/huilv/code/' + assetCode + '/issuer/' + assetIssuer,
		async: false,
		success: function(data) {
			return data;
		}
	});

	return JSON.parse(d.responseJSON);
}

/**
 * 获取资产的发行信息
 * @param issuer 发行方
 * @param code 资产代码
 * @return object
 */
function getIssuerData(issuer, code){
	var ret = {total:0, limit:0};
	var data = syncGetData('/accounts/' + issuer);
	//判断是否为限量发行
	var med_threshold = data.thresholds.med_threshold;
	var signer = 0;
	for(i = 0; i < data.signers.length; i++){
		signer += data.signers[i].weight;
	}
	if(signer < med_threshold){
		ret.limit = 1;//限量
		
		//判断发行总量
		var paymentList = syncGetData('/accounts/' + issuer + '/payments?limit=100');

		if(typeof records!="undefined"){
			for(i = 0; i < paymentList._embedded.records.length; i++){
				var ob = paymentList._embedded.records[i];
				if(ob.type == "payment" && ob.source_account == issuer && ob.asset_code == code && ob.asset_issuer == issuer && ob.from == issuer){
					ret.total += parseFloat(ob.amount);
				}
			}
		}
	}
	
	return ret;
	
}
/**
 * 获取账号资产信息
 * @param {Object} address
 */
function address(address) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());

	server.accounts().accountId(address).call().then(function(account) {
		var allIssuer = Array();
		var allAsset = Array();
		var allBalance = Array();
		var frez = (account.subentry_count + 2) * 10;//冻结数量
		for(var row in account.balances) {
			var asset = account.balances[row];
			if(asset.asset_type == 'native') {
				//var frez = parseInt($('#ticket_frez').text());
				$('#ticket_frez').text(frez);
				$('#ticket_used').text(textDesc(asset.balance, frez));
				$('#ticket_total').text(asset.balance);
			} else {
				/*
				if($('#balance_data #GW_' + asset.asset_issuer).length == 0) {
					$('#balance_data').append('<li id="GW_' + asset.asset_issuer + '"><h3 id="gw_name_' + asset.asset_issuer + '">[未知网关名称]</h3><p class="netgate">' + asset.asset_issuer + '</p><div class="mian_left_ctrlbox" id="GWLIST_' + asset.asset_issuer + '"></div></li>');
					$.ajax({
						type: "get",
						url: "index/gateway/data/account/" + asset.asset_issuer,
						async: true,
						success: function(data) {
							data = JSON.parse(data);
							for(var i = 0; i < data.gateway_asset.length; i++)
								$('#gw_name_' + data.gateway_asset[i].asset_issuer).html(data.gateway_name);
						}
					});
				}

				$('#GWLIST_' + asset.asset_issuer).append('<span>' + asset.asset_code + '<b>' + asset.balance + '</b></span>');
				*/
				allIssuer.push(asset.asset_issuer);
				allAsset.push(asset.asset_code);
				allBalance.push(asset.balance);
			}

		}
		
		$.ajax({
			type: "post",
			url: "index/gateway/alldata",
			data:{issuer : allIssuer, asset : allAsset, balance : allBalance},
			async: true,
			success: function(data) {
				data = JSON.parse(data);
				for(var i = 0; i < data.length; i++){
					var r = data[i];
					var name = r.gateway_name == undefined? "["+JSAPP_UNKNOW_GATEWAY_NAME+"]" : r.gateway_name;
					$('#balance_data').append('<li><h3>'+name+'</h3><div class="mian_left_ctrlbox" id="id'+i+'"></div></li>');
					for(var j = 0; j < r.asset.length;j++){
						var assetRet = getIssuerData(r.issuer[j], r.asset[j]);
						var limitStr = assetRet.limit == 1? JSAPP_AMOUNT_LIMIT+":"+assetRet.total : JSAPP_AMOUNT_UNLIMIT;
						$('#id' + i).append('<span class="my_trickbox"><h4><b><span class="glyphicon glyphicon-equalizer"><span>'+limitStr+'</b></h4><span class="zcname">' + r.asset[j] + '</span> '+JSAPP_ASSET_AMOUNT+':<b>' + r.balance[j] + '</b><h4><b>'+JSAPP_ASSET_ISSUER+':'+hidePart(r.issuer[j], 7)+'</b></h4></span>');
					}
				}
			}
		});
					
		address_payment(address, '');
	}).catch(function(err) {
		logCommonError(err);
		if(err.message.status == 404) {
			$('#user_main').html('<ul class="list-unstyled" id="balance_data"><li><h3>'+OTHER_NO_ACTIVE+'</h3><div class="my_money">'+OTHER_ACTIVE_FIRST+'</div></li></ul>');
			$('#cz_active_comment').html('<font color="red">'+OTHER_ACTIVE_BEACAUSE+'（<span id="current_huilv">-</span>）'+OTHER_ACTIVE_USER+'</font>');
			$('#czxq_exist').text(OTHER_NOT_EXIST);
			if($('#cz_zctype').val() != null && $('#cz_zctype').val() != "") {
				var data = getHuiLv($('#cz_zctype').val(), $('#gateway_id').val());
				$('#current_huilv').text(data.asset_price + '/' + $('#cz_zctype').val());
			} else {
				$('#current_huilv').text('-');
			}
		}
	});
}

function gateway(address) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());

	server.accounts().accountId(address).call().then(function(account) {
		var signerThreshold = 0;
		for(var i = 0; i < account.signers.length; i++) {
			var signer = account.signers[i];
			signerThreshold += signer.weight;
		}
		if(signerThreshold >= account.thresholds.low_threshold) {
			$('#low_threshold').addClass('glyphicon-ok text-success');
		} else {
			$('#low_threshold').addClass('glyphicon-remove text-danger');
		}
		if(signerThreshold >= account.thresholds.med_threshold) {
			$('#med_threshold').addClass('glyphicon-ok text-success');
		} else {
			$('#med_threshold').addClass('glyphicon-remove text-danger');
		}
		if(signerThreshold >= account.thresholds.high_threshold) {
			$('#high_threshold').addClass('glyphicon-ok text-success');
		} else {
			$('#high_threshold').addClass('glyphicon-remove text-danger');
		}
	}).catch(logCommonError);
}

/***
 *信任网关
 * 
 * @param srcAccount 信任源账号
 * @param dstAccount 被信任网关
 * @param assetCode 资产代码
 * @param amount 信任数量
 */
function setTrust(srcSecret, dstAccount, assetCode, amount) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());

	var receivingKeys = MySdk.Keypair.fromSecret(srcSecret);
	var assetObj = new MySdk.Asset(assetCode, dstAccount);
	server.loadAccount(receivingKeys.publicKey())
		.then(
			function(receiver) {
				var transaction = new MySdk.TransactionBuilder(receiver)
					.addOperation(MySdk.Operation.changeTrust({
						asset: assetObj,
						limit: amount
					}))
					.build();
				transaction.sign(receivingKeys);
				return server.submitTransaction(transaction)
					.then(function(transactionResult) {
						console.log(JSON.stringify(transactionResult, null, 2));
					})
					.catch(logSubmitError);
			}
		)
		.then(function(transactionResult) {
			g_callbackSetTrust(receivingKeys);

		})
		.catch(alertCommonError);
}

/***
 * 根据序号设置信任(适合快速操作)
 * @param {srcSecret} 信任方密钥
 * @param {seq} 信任方序号
 * @param {dstAccount} 被信任方
 * @param {assetCode} 资产代码
 * @param {amount} 信任数量
 */
function setTrustSeq(srcSecret, seq, dstAccount, assetCode, amount) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());

	var receivingKeys = MySdk.Keypair.fromSecret(srcSecret);//使用我的密钥
	var assetObj = new MySdk.Asset(assetCode, dstAccount);
	var source = new MySdk.Account(receivingKeys.publicKey(), seq.toString());
	var transaction = new MySdk.TransactionBuilder(source)
		.addOperation(MySdk.Operation.changeTrust({
			asset: assetObj,
			limit: amount
		}))
		.build();
	transaction.sign(receivingKeys);
	server.submitTransaction(transaction)
		.then(function(transactionResult) {
			console.log(JSON.stringify(transactionResult, null, 2));
			console.log('\nSuccess! View the transaction at: ');
			console.log(transactionResult._links.transaction.href);
			//支付
			if(g_next)
				payment(g_pair.secret(), g_receiver, g_pair.publicKey(), g_asset, g_amount);
		})
		.catch(alertCommonError);
		//.catch(function(err){
		//	var d = 1;
		//});
}

/**
 * 修改信任数量
 * @param assetCode 资产代码
 * @param limit 最大数量
 */
function editTrust(assetCode, limit) {
	$('.trusted_table').removeClass('showall');
	$('#trustAmount').val(limit);
	$("#trust_list").val(assetCode);

}
/**
 *获取信任线
 * @param address 源账号
 * 
 */
function getTrust(address) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	server.accounts().accountId(address).call().then(function(account) {
		for(var i = 0; i < account.balances.length; i++) {
			var asset = account.balances[i];
			if(asset.asset_type != "native") {
				$('#btn-' + asset.asset_code + "-" + asset.asset_issuer).addClass('btn-success');
				$('#btn-' + asset.asset_code + "-" + asset.asset_issuer).html(asset.asset_code + '  <span class="glyphicon glyphicon-ok-sign"></span>');
				$('#TR_' + asset.asset_code).remove();
				$('#trusted_list').append('<tr id="TR_' + asset.asset_code + '"><td>' + asset.asset_code + '</td><td>' + parseInt(asset.limit) + '</td><td><!--因网关和发行人不同，去掉修改功能<button type="button" class="btn" onclick="editTrust(\'' + asset.asset_code + '\',\'' + parseInt(asset.limit) + '\')">修改</button>--><button type="button" class="btn" onclick="editTrust(\'' + asset.asset_code + '\',\'0\')">'+OTHER_TRUST_DEL+'</button></td></tr>');
			}
		}
	}).catch(logCommonError);
}

/**
 *自杀自己操作的所有权限
 * @param srcSecret  自杀方密钥
 */
function killme(srcSecret) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var sourceKeys = MySdk.Keypair.fromSecret(srcSecret);
	server.loadAccount(sourceKeys.publicKey())
		.then(function(account) {
			var transaction = new MySdk.TransactionBuilder(account)
				.addOperation(MySdk.Operation.setOptions({
					masterWeight: 0, // set master key weight
					lowThreshold: 1,
					medThreshold: 2, // a payment is medium threshold
					highThreshold: 3 // make sure to have enough weight to add up to the high threshold!
				}))
				.build();
			transaction.sign(sourceKeys);
			server.submitTransaction(transaction)
				.then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
					g_callbackKillme();
				})
				.catch(logSubmitError);
		}).catch(alertCommonError);
}

/*
 * 挂单
 * @param srcSecret 支付方密钥
 * @param assetSrcCode 源资产代码
 * @param assetSrcIssuer 源资产发行者
 * @param assetObjCode 目标资产代码
 * @param assetObjIssuer 目标资产发行者
 * @param payAmount 支付原始资产数量
 * @param sellprice 销售价格
 * @param id 订单ID，如果不为0，则编辑订单，删除订单时，payAmount为0
 */
function makeOffer(srcSecret, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, payAmount, sellprice, id) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var sourceKeys = MySdk.Keypair.fromSecret(srcSecret);
	var srcAsset = assetSrcIssuer ? new MySdk.Asset(assetSrcCode, assetSrcIssuer) : MySdk.Asset.native();
	var objAsset = assetObjIssuer ? new MySdk.Asset(assetObjCode, assetObjIssuer) : MySdk.Asset.native();
	server.loadAccount(sourceKeys.publicKey())
		.then(function(sourceAccount) {
			var transaction = new MySdk.TransactionBuilder(sourceAccount)
				.addOperation(MySdk.Operation.manageOffer({
					selling: srcAsset,
					buying: objAsset,
					amount: payAmount,
					price: sellprice,
					offerId: id
				}))

				.build();

			transaction.sign(sourceKeys);

			return server.submitTransaction(transaction)
				.then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
				})
				.catch(logSubmitError);
		})
		.then(function(result) {
			console.log('Success! Results:', result);
			if(result == undefined){
				g_callbackMakeOffer();
			}else
				g_callbackPayment();

		})
		.catch(alertCommonError);
}

/*
 * 挂单2(按照分子分母挂单)
 * @param srcSecret 支付方密钥
 * @param assetSrcCode 源资产代码
 * @param assetSrcIssuer 源资产发行者
 * @param assetObjCode 目标资产代码
 * @param assetObjIssuer 目标资产发行者
 * @param payAmount 支付原始资产数量
 * @param sellN 分子
 * @param sellD 分母
 * @param id 订单ID，如果不为0，则编辑订单，删除订单时，payAmount为0
 */
function makeOffer2(srcSecret, assetSrcCode, assetSrcIssuer, assetObjCode, assetObjIssuer, payAmount, sellN, sellD, id) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var sourceKeys = MySdk.Keypair.fromSecret(srcSecret);
	var srcAsset = assetSrcIssuer ? new MySdk.Asset(assetSrcCode, assetSrcIssuer) : MySdk.Asset.native();
	var objAsset = assetObjIssuer ? new MySdk.Asset(assetObjCode, assetObjIssuer) : MySdk.Asset.native();
	server.loadAccount(sourceKeys.publicKey())
		.then(function(sourceAccount) {
			var transaction = new MySdk.TransactionBuilder(sourceAccount)
				.addOperation(MySdk.Operation.manageOffer({
					selling: srcAsset,
					buying: objAsset,
					amount: payAmount,
					price: {n: sellN, d: sellD},
					offerId: id
				}))

				.build();

			transaction.sign(sourceKeys);

			return server.submitTransaction(transaction)
				.then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
				})
				.catch(logSubmitError);
		})
		.then(function(result) {
			console.log('Success! Results:', result);
			if(result == undefined){
				g_callbackMakeOffer();
			}else
				g_callbackPayment();

		})
		.catch(alertCommonError);
}
/**
 *支付资产
 * @param srcSecret  支付方密钥
 * @param dstAccount 目标账号
 * @param issuer 资产发行者，为空表示原生资产
 * @param asset  资产代码，为空表示原生资产
 * @param payAmount 支付数量
 */
function payment(srcSecret, dstAccount, issuer, asset, payAmount) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var sourceKeys = MySdk.Keypair.fromSecret(srcSecret);
	var payAsset = issuer ? new MySdk.Asset(asset, issuer) : MySdk.Asset.native();
	server.loadAccount(sourceKeys.publicKey())
		.then(function(sourceAccount) {
			var transaction = new MySdk.TransactionBuilder(sourceAccount)
				.addOperation(MySdk.Operation.payment({
					destination: dstAccount,
					asset: payAsset,
					amount: payAmount
				}))

				.addMemo(MySdk.Memo.text(OTHER_INIT_ISSUER))
				.build();

			transaction.sign(sourceKeys);

			return server.submitTransaction(transaction)
				.then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
				})
				.catch(logSubmitError);
				//.catch(function(){
				////});
		})
		.then(function(result) {
			console.log('Success! Results:', result);
			delloading();
			g_callbackPayment();
			if(g_next) {
				//自杀当前发行人的权限
				killme(g_pair.secret());                               
			}
		})
		.catch(alertCommonError);
		//.catch(function(){
		//	var c = 1;
		//});
}

/**
 * 创建用户
 * @param srcSecrect 源账号密钥
 * @param dstAccount 目标账号
 */
function createUser(srcSecret, dstAccount, amount) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var sourceKeys = MySdk.Keypair.fromSecret(srcSecret);
	server.loadAccount(sourceKeys.publicKey())
		.then(function(sourceAccount) {
			var transaction = new MySdk.TransactionBuilder(sourceAccount)
				.addOperation(MySdk.Operation.createAccount({
					destination: dstAccount,
					startingBalance: amount
				}))

				.addMemo(MySdk.Memo.text('Issuer'))
				.build();

			transaction.sign(sourceKeys);//签名

			return server.submitTransaction(transaction).then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
					console.log('\nSuccess! View the transaction at: ');
					console.log(transactionResult._links.transaction.href);
				})
				.catch(logSubmitError);
				//.catch(function(err){
				//	var b = 1;
				//});
		})
		.then(function(result) {
			g_callbackCreateUser();
			console.log('Success! Results:', result);
		})
		.catch(alertCommonError);
		//.catch(function(err){
		//	var a = 1;
		//});
}

/**
 * 检查账户是否存在
 * @param {Object} account
 */
function checkUser(account){
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());

	server.loadAccount(account)
		.then(function(result) {
			alert(OTHER_ACCOUNT_ACTIVED);
		})
		.catch(function(err){
			alert(OTHER_ACCOUNT_NOT_ACTIVED);
		});
}

/**
 * 同步检测账号
 * @param {Object} account
 */
function isExistUser(account){
	var data = syncGetData('/accounts/' + account);
	if(data.status == "404")
		return false;
	else
		return true;
}
/**
 * 生成账号，并激活账号，信任账号然后将资产转账到信任账号
 * @param srcSecret 网关密钥
 * @param asset 资产代码
 * @param amount 数量
 * @param receiver 初次接收者
 * @return 返回发行方账号
 */
function assetIssuer(srcSecret, asset, amount, receiver) {

	var pair = MySdk.Keypair.random();
	var publicKey = pair.publicKey();//产生一个新ID、
	var server = new MySdk.Server(network());
	var receivingKeys = MySdk.Keypair.fromSecret(srcSecret);//得到接受者的ID、
	var data = syncGetData('/accounts/' + receivingKeys.publicKey());//获得数据、
	var seq = data.sequence;//获得序列
	//由于创建用户和设置信任后需要异步支付资产，所以将信息保留
	g_next = true;
	g_pair = pair; //发行者信息
	g_receiver = receiver; //接收人信息
	g_asset = asset; //资产
	g_amount = amount; //数量
	createUser(srcSecret, publicKey, "20.0005"); //因为用户发行资产，自杀权限需要销毁，所以增加0.0005个
	seq++;
	setTrustSeq(srcSecret, seq, publicKey, asset, amount);

	return publicKey;
}

/*
 * 获取我所有信任的资产以便进行兑换
 */
function getAllTrustAsset(account) {
	//alert(account);
	var data = syncGetData('/accounts/' + account);
	var assetArray = new Array();
	var issuerArray = new Array();
	var typeArray = new Array();

	var k = 0;
	for(var i = 0; i < data.balances.length; i++) {
		var asset = data.balances[i];
		//alert(data.balances[i]);
		if(asset.asset_type != "native") {
			assetArray[k] = asset.asset_code;
			issuerArray[k] = asset.asset_issuer;
			typeArray[k] = asset.asset_type;
			k++;
		}
	}

	$('#simple_convert_obj').empty();
	$('#trade_convert_obj').empty();
	$('#simple_convert_obj').append('<option>'+OTHER_SELECT+'</option>');
	$('#trade_convert_obj').append('<option>'+OTHER_SELECT+'</option>');
	$.ajax({
		type: "post",
		url: "index/transaction/convert/",
		data: {
			"asset[]": assetArray,
			"issuer[]": issuerArray,
			"type[]": typeArray
		},
		async: true,
		success: function(d) {
			var data = JSON.parse(d);
			for(var i = 0; i < data.asset.length; i++) {
				var name = (data.gateway[i] == null) ? "["+OTHER_KNOW_GATEWAY+"]" : data.gateway[i].gateway_name;
				//$('#simple_convert_src').append('<option value="'+data.asset[i]+'" data-issuer="'+data.issuer[i]+'">'+data.asset[i]+' ('+name+'/发行人：'+hidePart(data.issuer[i], 7)+')</option>');//暂时只支持基础资产兑换为其他资产
				$('#simple_convert_src').append('<option value="' + data.asset[i] + '.' + data.issuer[i] +'">' + data.asset[i] + ' (' + name + '/'+OTHER_ISSUER+'：' + hidePart(data.issuer[i], 7) + ')</option>');                       
				$('#simple_convert_obj').append('<option value="' + data.asset[i] + '" data-issuer="' + data.issuer[i] + '" data-type="' + data.type[i] + '">' + data.asset[i] + ' (' + name + '/'+OTHER_ISSUER+'：' + hidePart(data.issuer[i], 7) + ')</option>');
				$('#trade_convert_obj').append('<option value="' + data.asset[i] + '" data-issuer="' + data.issuer[i] + '" data-type="' + data.type[i] + '">' + data.asset[i] + ' (' + name + '/'+OTHER_ISSUER+'：' + hidePart(data.issuer[i], 7) + ')</option>');
			}
		}
	});
}
/**
 * 获取最优的挂单信息，以基础货币定价
 */
function getPrice(sellAsset, sellIssuer, buyAsset, buyIssuer) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var srcAsset = sellIssuer ? new MySdk.Asset(sellAsset, sellIssuer) : MySdk.Asset.native();
	var objAsset = buyIssuer ? new MySdk.Asset(buyAsset, buyIssuer) : MySdk.Asset.native();
	server.orderbook(srcAsset, objAsset).call().then(function(order) {
		if(srcAsset.isNative()) {
			var bili = 1.001;
			//以基础资产买入，直接返回第一个价格，为保证成交，建议比最新价格高出0.1%
			var price = order.bids.length > 0 ? 1 / order.bids[0].price : 0;
			$('#simple_convert_price').val(price.toFixed(2));
			calcPriceOrVolume();//重新计算价格或者量
		} else {
			//以其他资产买入，需要是相应倒数，为保证成交，建议比最新价格低0.1%
			var bili = 0.999;
			var price = order.bids.length > 0 ? parseFloat(order.bids[0].price) : 0;
			$('#simple_convert_price').val(price.toFixed(2));
			calcPriceOrVolume();//重新计算价格或者量
		}
	});
}

/**
 * 获取买一、卖一价格,以基础货币定价
 */
function getCurrentPrice(sellAsset, sellIssuer, buyAsset, buyIssuer) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var srcAsset = sellIssuer ? new MySdk.Asset(sellAsset, sellIssuer) : MySdk.Asset.native();
	var objAsset = buyIssuer ? new MySdk.Asset(buyAsset, buyIssuer) : MySdk.Asset.native();
	var orderBook = server.orderbook(srcAsset, objAsset);
	orderBook.call().then(function(order) {
		if(srcAsset.isNative()) {
			//以基础资产买入，直接返回第一个价格，为保证成交，建议比最新价格高出0.1%
			var bidsprice = order.bids.length > 0 ? parseFloat(1 / order.bids[0].price).toFixed(2) : "-"; //卖出价
			var asksprice = order.asks.length > 0 ? parseFloat(1 / order.asks[0].price).toFixed(2) : "-"; //买入价
			$('#buy_price').text(asksprice);
			$('#sell_price').text(bidsprice);
		}
		$('#buy_list tr').remove();
		$('#sell_list tr').remove();
		$('#buy_list').append('<tr><td>'+OTHER_PRICE+'</td><td>'+OTHER_AMOUNT+'</td></tr>');
		$('#sell_list').append('<tr><td>'+OTHER_PRICE+'</td><td>'+OTHER_AMOUNT+'</td></tr>');
		//买单
		for(var i = 0; i < order.asks.length && i < 10; i++) {
			var price = parseFloat(1 / order.asks[i].price);
			$('#buy_list').append('<tr><td>' + price.toFixed(2) + '</td><td>' + parseFloat(order.asks[i].price * order.asks[i].amount).toFixed(0) + '</td></tr>');
		}
		//卖单
		for(var i = 0; i < order.bids.length && i < 10; i++) {
			var price = 1 / order.bids[i].price;
			$('#sell_list').append('<tr><td>' + price.toFixed(2) + '</td><td>' + parseFloat(order.bids[i].amount).toFixed(0) + '</td></tr>');
		}
	});
	//获取当前价格
	orderBook.trades().order('desc').call().then(function(trades) {
		if(trades.records.length > 0) {
			var newest_price = '-';
			if(trades.records[0].sold_asset_type == 'native' && trades.records[0].bought_asset_code == $('#trade_convert_obj').val()) {
				newest_price = parseFloat(trades.records[0].sold_amount / trades.records[0].bought_amount).toFixed(2);
			}
			$('#current_price').text(newest_price);
		}
	});
}

/**
 * 获取某个账号的订单
 * @param {Object} account 账号
 */
function getOrderBook(account, cursor, dir) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());

	dir = dir == '' ? 'asc' : dir;
	order_dir = dir;

	server.offers('accounts', account).cursor(cursor).limit(10).order(dir).call().then(function(offer) {
		if(offer.records.length > 0) {
			$('#my_order tr').remove();
			$('#my_order').append('<tr><td>'+OTHER_TRADE_ASSET+'</td><td>'+OTHER_PRICE+'</td><td>'+OTHER_AMOUNT+'</td><td>'+OTHER_OPTRATION+'</td></tr>');
			if(order_dir == 'asc') {
				order_paging_start = offer.records[0].paging_token;
				for(var i = 0; i < offer.records.length; i++) {
					var record = offer.records[i];
					order_paging_end = record.paging_token;
					var dir = record.buying.asset_type == "native" ? OTHER_SELL+" " + record.selling.asset_code : OTHER_BUY+" " + record.buying.asset_code;
					var price = record.buying.asset_type == "native" ? parseFloat(record.price).toFixed(2) : parseFloat(1 / record.price).toFixed(2);
					var sellCode = record.selling.asset_code != undefined ? record.selling.asset_code : '';
					var sellIssuer = record.selling.asset_issuer != undefined ? record.selling.asset_issuer : '';
					var buyCode = record.buying.asset_code != undefined ? record.buying.asset_code : '';
					var buyIssuer = record.buying.asset_issuer != undefined ? record.buying.asset_issuer : '';
					var amount = record.buying.asset_type == "native" ? parseFloat(record.amount).toFixed(0) : parseFloat(record.amount * record.price).toFixed(0);
					$('#my_order').append('<tr><td>' + dir + '</td><td>' + price + '</td><td>' + amount + '</td><td><a href="javascript:cancelOrder(' + record.id + ',\'' + sellCode + '\',\'' + sellIssuer + '\',\'' + buyCode + '\',\'' + buyIssuer + '\',\'' + record.price + '\')">'+OTHER_CANCEL+'</a></td></tr>');
				}
			} else {
				order_paging_start = offer.records[offer.records.length - 1].paging_token;
				for(var i = offer.records.length; i > 0; i--) {
					var record = offer.records[i - 1];
					order_paging_end = record.paging_token;
					var dir = record.buying.asset_type == "native" ? OTHER_SELL+" " + record.selling.asset_code : OTHER_BUY+" " + record.buying.asset_code;
					var price = record.buying.asset_type == "native" ? parseFloat(record.price).toFixed(2) : parseFloat(1 / record.price).toFixed(2);
					var sellCode = record.selling.asset_code != undefined ? record.selling.asset_code : '';
					var sellIssuer = record.selling.asset_issuer != undefined ? record.selling.asset_issuer : '';
					var buyCode = record.buying.asset_code != undefined ? record.buying.asset_code : '';
					var buyIssuer = record.buying.asset_issuer != undefined ? record.buying.asset_issuer : '';
					var amount = record.buying.asset_type == "native" ? parseFloat(record.amount).toFixed(0) : parseFloat(record.amount * record.price).toFixed(0);
					$('#my_order').append('<tr><td>' + dir + '</td><td>' + price + '</td><td>' + amount + '</td><td><a href="javascript:cancelOrder(' + record.id + ',\'' + sellCode + '\',\'' + sellIssuer + '\',\'' + buyCode + '\',\'' + buyIssuer + '\',\'' + record.price + '\')">'+OTHER_CANCEL+'</a></td></tr>');
				}
			}
		}

	}).catch(logCommonError);
}

/**
 * 显示交易记录
 * @param {Object} record
 */
function showRecord(server, record, address) {
	var trans_link = record._links.transaction.href.split("/");
	var ledger_hash = trans_link[trans_link.length - 1];
	if(record.type == "create_account") {
		if(record.source_account == address)
			$('#all_payment_record').append('<tr><td id="hash_' + ledger_hash + '"></td><td>' + hidePart(record.account, 4) + '</td><td title="' + OTHER_CREATE_USER + record.account + '">'+OTHER_CREATED+'</td><td>-' + parseFloat(record.starting_balance).toFixed(4) + '</td></tr>');
		else if(record.account == address)
			$('#all_payment_record').append('<tr><td id="hash_' + ledger_hash + '"></td><td>' + hidePart(record.account, 4) + '</td><td title="'+ OTHER_CREATE_USER + record.account + '">'+OTHER_CREATED+'</td><td>+' + parseFloat(record.starting_balance).toFixed(4) + '</td></tr>');
	} else if(record.type == "payment") {
		if(record.from == address)
			$('#all_payment_record').append('<tr><td id="hash_' + ledger_hash + '"></td><td>' + hidePart(record.to, 4) + '</td><td title="' +OTHER_PAYTO + record.to + '">'+OTHER_PAYMENT+'</td><td>-' + parseFloat(record.amount).toFixed(4) + '</td></tr>');
		else if(record.to == address)
			$('#all_payment_record').append('<tr><td id="hash_' + ledger_hash + '"></td><td>' + hidePart(record.from, 4) + '</td><td title="' +OTHER_RECEIVE + record.from + +OTHER_PAYMENT +'">'+OTHER_PAYMENT+'</td><td>+' + parseFloat(record.amount).toFixed(4) + '<br/>('+record.asset_code+')'+ '</td></tr>');
	}
	server.transactions().transaction(ledger_hash).call().then(function(transaction) {
		$('#hash_' + transaction.hash).html(transaction.created_at);
	});
}

/**
 * 显示兑换记录
 * @param {Object} record
 */
function showTrades(record) {
	var trade_type;
	var price = 0;
	var amount = 0;
	if(record.bought_asset_type == "native") {
		trade_type = OTHER_SELL+" " + record.sold_asset_code;
		price = parseFloat(record.bought_amount / record.sold_amount).toFixed(2);
		amount = "-" + parseFloat(record.sold_amount).toFixed(0);
	} else {
		trade_type = OTHER_BUY+" " + record.bought_asset_code;
		price = parseFloat(record.sold_amount / record.bought_amount).toFixed(2);
		amount = "+" + parseFloat(record.bought_amount).toFixed(0);
	}

	$('#all_trade_record').append('<tr><td>' + record.created_at + '</td><td>' + trade_type + '</td><td>' + price + '</td><td>' + amount + '</td></tr>');
}

/**
 * 获取所有交易记录
 * @param {Object} address 账号
 * @param {Object} cursor 分页指针
 */
function getPayment(address, cursor, dir) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	dir = dir == '' ? 'desc' : dir;
	payment_dir = dir;

	server.payments().forAccount(address).cursor(cursor).order(dir).limit(7).call()
		.then(function(payments) {

			if(payments.records.length > 0) {
				$('#all_payment_record tr').remove();
				$('#all_payment_record').append('<tr><td>'+OTHER_TIME+'</td><td>'+OTHER_TRADE_OBJ+'</td><td width="15%">'+OTHER_TRADE_TYPE+'</td><td>'+OTHER_TRADE_AMOUNT+'</td></tr>');
				if(payment_dir == 'desc') {
					payment_paging_start = payments.records[0].paging_token;
					for(var i = 0; i < payments.records.length; i++) {
						var record = payments.records[i];
						payment_paging_end = record.paging_token;
						showRecord(server, record, address);
					}
				} else {
					payment_paging_start = payments.records[payments.records.length - 1].paging_token;
					for(var i = payments.records.length; i > 0; i--) {
						var record = payments.records[i - 1];
						payment_paging_end = record.paging_token;
						showRecord(server, record, address);
					}
				}
			}
		})
		.catch(logCommonError)
}

/**
 * 获取兑换记录，好像接口没有，自己写
 * @param {Object} address 账号
 * @param {Object} cursor 分页指针
 */
function getTrades(address, cursor, dir) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	dir = dir == '' ? 'desc' : dir;
	trade_dir = dir;
	var uri = "/accounts/" + address + "/trades?order=" + dir + "&limit=11&cursor=" + cursor;
	var trades = syncGetData(uri);

	if(trades._embedded.records.length > 0) {
		$('#all_trade_record tr').remove();
		$('#all_trade_record').append('<tr><td>'+OTHER_TIME+'</td><td>'+OTHER_TRADE_TYPE+'</td><td>'+OTHER_TRADE_TOTAL+'</td><td>'+OTHER_TRADE_NUMBER+'</td></tr>');
		if(trade_dir == 'desc') {
			trade_paging_start = trades._embedded.records[0].paging_token;
			for(var i = 0; i < trades._embedded.records.length; i++) {
				var record = trades._embedded.records[i];
				trade_paging_end = record.paging_token;
				showTrades(record);
			}
		} else {
			trade_paging_start = trades._embedded.records[trades._embedded.records.length - 1].paging_token;
			for(var i = trades._embedded.records.length; i > 0; i--) {
				var record = trades._embedded.records[i - 1];
				trade_paging_end = record.paging_token;
				showTrades(record);
			}
		}
	}
}

/**
 * 有offer事件时候获取最新价格
 */
function processOffer(sellAsset, sellIssuer, buyAsset, buyIssuer) {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var srcAsset = (typeof(sellIssuer) != "undefined" && sellIssuer != '') ? new MySdk.Asset(sellAsset, sellIssuer) : MySdk.Asset.native();
	var objAsset = (typeof(buyIssuer) != "undefined" && buyIssuer != '') ? new MySdk.Asset(buyAsset, buyIssuer) : MySdk.Asset.native();
	var orderBook = server.orderbook(srcAsset, objAsset);
	//获取当前价格
	orderBook.trades().order('desc').call().then(function(trades) {
		if(trades.records.length > 0) {
			var newest_price = '-';
			if(trades.records[0].sold_asset_type == 'native') {
				newest_price = parseFloat(trades.records[0].sold_amount / trades.records[0].bought_amount).toFixed(2);
			}
			$('#current_price').text(newest_price);
		}
	});
	getTradeList();
}

/**
 *账本处理
 * @param transaction 交易信息
 */
function processTransaction(transaction) {
	var data = [];
	//console.log(transaction);

	data['fee'] = transaction.fee;
	data['sequence'] = transaction.sequence;

	if(transaction.operations[0].source != null) {
		data['from'] = transaction.operations[0].source;
	} else {
		data['from'] = transaction.source;
	}

	if(transaction.operations[0].type == 'createAccount') {
		//4b6210130796f52995f5c1e0d3b662c7d79c5ea92e269f347868c5eb6c96db0e

		/*data['label']  			   = "Create Account";
		data['amount_formated']    = '<b><span class="pull-left">SNB</span><span class="pull-right">'+transaction.operations[0].startingBalance+'</span></b>';
		data['to']        		   = transaction.operations[0].destination;
		data['to_formated']        = '<a href="/address/'+transaction.operations[0].destination+'" class="pull-right">'+transaction.operations[0].destination+'</a>';
		data['operation_fromated'] = '<tr><td></td><td class="text-center col-md-2 prl pll"><b><span class="pull-left">SNB</span><span class="pull-right">'+transaction.operations[0].startingBalance+'</span></b></td></tr>';*/

	} else if(transaction.operations[0].type == 'payment') {
		//e53a9183d502a0084ba04a846f3e21e287352857292b05cd8397d37371c4b82e

		/*data['label']  			   = "Payment";
		data['amount_formated']    = '<b><span class="pull-left">'+transaction.operations[0].asset.code+'</span><span class="pull-right">'+transaction.operations[0].amount+'</span></b>';
		data['to']        		   = transaction.operations[0].destination;
		data['to_formated']        = '<a href="/address/'+transaction.operations[0].destination+'" class="pull-right">'+transaction.operations[0].destination+'</a>';
		data['operation_fromated'] = '<tr><td></td><td class="text-center col-md-2 prl pll"><b><span class="pull-left">'+transaction.operations[0].asset.code+'</span><span class="pull-right">'+transaction.operations[0].amount+'</span></b></td></tr>';*/

	} else if(transaction.operations[0].type == 'pathPayment') {

		/*data['label']  			   = "Path Payment";
		data['amount_formated']    = '<b><span class="pull-left">'+transaction.operations[0].destAsset.code+'</span><span class="pull-right">'+transaction.operations[0].destAmount+'</span></b>';
		data['to']        		   = transaction.operations[0].destination;
		data['to_formated']        = '<a href="/address/'+transaction.operations[0].destination+'" class="pull-right">'+transaction.operations[0].destination+'</a>';
		data['operation_fromated'] = '<tr><td class="text-center col-md-2 prl pll"><b><span class="pull-left">Max '+transaction.operations[0].sendAsset.code+'</span><span class="pull-right">'+transaction.operations[0].sendMax+'</span></b></td><td></td><td class="text-center col-md-2 prl pll"><b><span class="pull-left">'+transaction.operations[0].destAsset.code+'</span><span class="pull-right">'+transaction.operations[0].destAmount+'</span></b></td></tr>';*/

	} else if(transaction.operations[0].type == 'manageOffer') {
		processOffer(transaction.operations[0].selling.code, transaction.operations[0].selling.issuer, transaction.operations[0].buying.code, transaction.operations[0].buying.issuer);
		/*data['label']  			   = "Manage Offer";
		data['amount_formated']    = '<b><a class="manageOffer" data-original-title="Offer" tabindex="0" data-placement="top" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Buying '+transaction.operations[0].buying.code+' '+transaction.operations[0].amount+' x '+transaction.operations[0].price+' '+transaction.operations[0].selling.code+'">View Offer</a></b>';
		data['to']        		   = '';
		data['to_formated']        = '<b class="pull-right">N/A</b>';

		if(transaction.operations[0].selling.code == 'SNB'){
			//2051301d6d63edb7e62890f81a01c92260e1066596d42281d8fb1ba5b1d5e4b3

			var offer_type 	    = "Buying";
			var issuer_fromated = '<tr><td class="col-md-5"></td><td class="text-center"><b>Issuer</b></td><td class="col-md-5 text-center"><small><a href="/address/'+transaction.operations[0].buying.issuer+'">'+transaction.operations[0].buying.issuer+'</a></small></td></tr>';

		} else if(transaction.operations[0].buying.code == 'SNB'){
			//7311918c57f5bc4f3e70648571fb3ab54edebcd1546dbc8dddc92c61c432612a

			var offer_type      = "Selling";
			var issuer_fromated = '<tr><td class="col-md-5 text-center"><small><a href="/address/'+transaction.operations[0].selling.issuer+'">'+transaction.operations[0].selling.issuer+'</a></small></td><td class="text-center"><b>Issuer</b></td><td class="col-md-5"></td></tr>';
		} 
		data['operation_fromated']  = '<tr><td class="text-center col-md-2 prl pll"><b><span class="pull-left">Price '+transaction.operations[0].selling.code+'</span><span class="pull-right">'+transaction.operations[0].price+'</span></b></td><td class="text-center"><b>'+offer_type+'</b></td><td class="text-center col-md-2 prl pll"><b><span class="pull-left">'+transaction.operations[0].buying.code+'</span><span class="pull-right">'+transaction.operations[0].amount+'</span></b></td></tr>';
		data['operation_fromated'] += issuer_fromated;*/

	} else if(transaction.operations[0].type == 'createPassiveOffer') {

		/*data['label']  			   = "Create Passive Offer";
		data['amount_formated']    = '<b><a class="manageOffer" data-original-title="Offer" tabindex="0" data-placement="top" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Buying '+transaction.operations[0].buying.code+' '+transaction.operations[0].amount+' x '+transaction.operations[0].price+' '+transaction.operations[0].selling.code+'">View Offer</a></b>';
		data['to']        		   = '';
		data['to_formated']        = '<b class="pull-right">N/A</b>';

		if(transaction.operations[0].selling.code == 'SNB'){
			//

			var offer_type 	    = "Buying";
			var issuer_fromated = '<tr><td class="col-md-5"></td><td class="text-center"><b>Issuer</b></td><td class="col-md-5 text-center"><small><a href="/address/'+transaction.operations[0].buying.issuer+'">'+transaction.operations[0].buying.issuer+'</a></small></td></tr>';

		} else if(transaction.operations[0].buying.code == 'SNB'){
			//fe0561e3ffc0716ced9d95cac5ec3f3e6841009bbadb876855b5cb13371d3036
			
			var offer_type      = "Selling";
			var issuer_fromated = '<tr><td class="col-md-5 text-center"><small><a href="/address/'+transaction.operations[0].selling.issuer+'">'+transaction.operations[0].selling.issuer+'</a></small></td><td class="text-center"><b>Issuer</b></td><td class="col-md-5"></td></tr>';
		} 
		data['operation_fromated']  = '<tr><td class="text-center col-md-2 prl pll"><b><span class="pull-left">Price '+transaction.operations[0].selling.code+'</span><span class="pull-right">'+transaction.operations[0].price+'</span></b></td><td class="text-center"><b>'+offer_type+'</b></td><td class="text-center col-md-2 prl pll"><b><span class="pull-left">'+transaction.operations[0].buying.code+'</span><span class="pull-right">'+transaction.operations[0].amount+'</span></b></td></tr>';
		data['operation_fromated'] += issuer_fromated;*/

	} else if(transaction.operations[0].type == 'setOptions') {
		//4665626867d806451f8151b3510e9703bd5e627b08eedfa79963b684407b5b3c

		/*data['label']  				= "Set Options";
		data['amount_formated'] 	= '<b>N/A</b>';
		data['to']        		    = '';
		data['to_formated']     	= '<b class="pull-right">N/A</b>';
		data['operation_fromated']  = '<tr><td class="col-md-2 prl pll"><b><span class="pull-left">Home Domain:</span></b></td><td><b>'+transaction.operations[0].homeDomain+'</b></td></tr>';
		data['operation_fromated'] += '<tr><td class="col-md-2 prl pll"><b><span class="pull-left">Inflation Destination:</span></b></td><td><a href="/address/'+transaction.operations[0].inflationDest+'">'+transaction.operations[0].inflationDest+'</a></td></tr>';*/

	} else if(transaction.operations[0].type == 'changeTrust') {
		//beac3cf9a32f145b70d18ccc17b44ee3f465e00f27b23fc9198a42692a41b528

		/*data['label']  				= "Change Trust";
		data['amount_formated'] 	= '<b><span class="pull-left">'+transaction.operations[0].line.code+'</span><span class="pull-right">'+transaction.operations[0].limit+'</span></b>';
		data['to']        		    = '';
		data['to_formated']     	= '<b class="pull-right">N/A</b>';
		data['operation_fromated']  = '<tr><td class="text-center col-md-2 prl pll"><b><span class="pull-left">Limit '+transaction.operations[0].line.code+'</span><span class="pull-right">'+transaction.operations[0].limit+'</span></b></td><td></td><td></td></tr>';
		data['operation_fromated'] += '<tr><td class="col-md-5 text-center"><small><a href="/address/'+transaction.operations[0].line.issuer+'">'+transaction.operations[0].line.issuer+'</a></small></td><td class="text-center"><b>Issuer</b></td><td class="col-md-5"></td></tr>';*/

	} else if(transaction.operations[0].type == 'allowTrust') {
		//4c40792565505d7b665df6b31eda256ca661e1962d35b7171d5cbeb8731eb84b

		/*if(transaction.operations[0].authorize){
			var authorize = '<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>';
		} else {
			var authorize = '<i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>';
		}

		data['label']  				= "Allow Trust";
		data['amount_formated'] 	= '<b>'+transaction.operations[0].assetCode+'</b>';
		data['to']        		    = '';
		data['to_formated']     	= '<b class="pull-right">N/A</b>';
		data['operation_fromated']  = '<tr><td class="text-center col-md-2 prl pll"><b><span class="pull-left">'+transaction.operations[0].assetCode+'</span><span class="pull-right">'+authorize+'</span></b></td><td></td><td></td></tr>';
		data['operation_fromated'] += '<tr><td class="col-md-5 text-center"><small><a href="/address/'+transaction.operations[0].trustor+'">'+transaction.operations[0].trustor+'</a></small></td><td class="text-center"><b>Trustor</b></td><td class="col-md-5"></td></tr>';*/

	} else if(transaction.operations[0].type == 'accountMerge') {
		//1021e80f3215bb7d55bdcfa39ff6eab3fd8ca4bc0910853271f36e9c1ea36085

		/*data['label'] 				= "Account Merge";
		data['amount_formated'] 	= '<b>N/A</b>';
		data['to']        		    = '';
		data['to_formated']        	= '<a href="/address/'+transaction.operations[0].destination+'" class="pull-right">'+transaction.operations[0].destination+'</a>';
		data['operation_fromated']  = '';*/

	} else if(transaction.operations[0].type == 'inflation') {
		//bbd3f04eeeadffef65b786f9f5e166088cfade0b8433182f2fc6d02bb61aae20

		/*data['label']  				= "Inflation";
		data['amount_formated'] 	= '<b>N/A</b>';
		data['to']        		    = '';
		data['to_formated']     	= '<b class="pull-right">N/A</b>';
		data['operation_fromated']  = '';*/

	} else if(transaction.operations[0].type == 'manageData') {

		/*data['label']  				= "Manage Data";
		data['amount_formated'] 	= '<b>N/A</b>';
		data['to']        		    = '';
		data['to_formated']     	= '<b class="pull-right">N/A</b>';
		data['operation_fromated']  = '';*/

	}

	return data;
}

/**
 * 生成账号
 */
function generateAccount() {
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var pair = MySdk.Keypair.random();

	var receivingKeys = MySdk.Keypair.fromSecret(srcSecret);
	return pair.publicKey();
}
/**
 * 获得对应资产的信任值与拥有者的差
 * @param address 用户地址
 * @param asset 资产名
 * @param iusser 发行方
 */
function getAssetHaveAndTurst(address,asset,iusser){
        var data = syncGetData('/accounts/' + address);
                var res="";
                for(var i=0; i<data.balances.length;i++){
                    if( asset == data.balances[i].asset_code && iusser==data.balances[i].asset_issuer){
                        res=data.balances[i].limit-data.balances[i].balance; 
                        return res;
                    }
                }
                  return res;
		}
                
/**
 * 获取指定账号指定资产余额(可用)
 * @param address 账号
 * @param asset
 */
function getassetAvlBalance(address,asset,issuer) {
    
	var data = syncGetData('/accounts/' + address);
	var frez = (data.subentry_count + 2) * 10;
	for(var i=0;i<data.balances.length;i++) {
		if(data.balances[i].asset_code ==asset && data.balances[i].asset_issuer==issuer ) {
			var avl=data.balances[i].balance;
                        return avl;
                }
	}
        return avl;
}
/**
 * 获得本人发行的资产
 * @param address 本人账号
 */
 function getMyIssueAsset(address){
                $.ajax({
		type: "post",
		url: "index/transaction/getMyissueAsset/",
		data: {
			issuer: address
		},
		async: false,
		success:function(d){
                    var data = JSON.parse(d);
                    if(data.length==0){
                        return;
                    }else{
                    for(i=0;i<data.length;i++){
                        $('#simple_convert_src').append('<option value="' + data[i].asset_code+"."+address + '">' + data[i].asset_code + ' (' +  data[i].getway_name + '/'+OTHER_ISSUER+'：' + hidePart(address, 7) + ')</option>');
                    }
                }
            },
                dataType:"json"
	})
    }

/**
 * 自动激活账号
 * @param dstAccount 转账目标账号
 * @param sec转账目标私钥
 * 
 */
function activateAccount(email,dstAccount,sec){
	    $.ajax({
		type: "post",
		url: "user/user/checkAccountStatus/",
		data: {
			user_email: email
		},
		async: false,
		success:function(d){
				if(d.status==2){
                MySdk.Network.usePublicNetwork();
    			MySdk.Config.setAllowHttp(true);
    			var server = new MySdk.Server(network());//创建环境
    			var srcSecret=d.src;
    			var sourceKeys = MySdk.Keypair.fromSecret(srcSecret);//
    			var payAsset =MySdk.Asset.native();//支付底层资产
    			var payAmount='50.0000000';
    			server.loadAccount(sourceKeys.publicKey())
				.then(function(sourceAccount) {
					var transaction = new MySdk.TransactionBuilder(sourceAccount)
						.addOperation(MySdk.Operation.createAccount({
						destination: dstAccount,
						startingBalance: payAmount
					}))

					.addMemo(MySdk.Memo.text('auto active'))
					.build();

				transaction.sign(sourceKeys);//签名

				return server.submitTransaction(transaction).then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
					console.log('\nSuccess! View the transaction at: ');
					console.log(transactionResult._links.transaction.href);
					setTrustToUK(sec,2);//提交成功才信任
					
				})
				.catch(logSubmitError);

			})
			.then(function(result) {
			console.log('Success! Results:', result);
			//delloading();
			
			})
			.catch(alertCommonError);
			//.catch(function(err){
			//	var a = 1;
			//});
			}
		else{
			var a=1
			return a;
		}
            },
                dataType:"json"
	})
   }
/***
 *自动信任游恳网关的资产
 * 
 * @param srcAccount 私钥
 */
function setTrustToUK(s1,action,key,uid) {
	if(! AUTO_TRUST) {
		delloading();
		return;//不需要自动信任，则直接返回
	}
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());

	var dstAccount= AUTO_ASSET_ISSUER;
	var assetCode= AUTO_ASSET_CODE;
	var receivingKeys = MySdk.Keypair.fromSecret(s1);
	var assetObj = new MySdk.Asset(assetCode, dstAccount);
	server.loadAccount(receivingKeys.publicKey())
		.then(
			function(receiver) {
				var transaction = new MySdk.TransactionBuilder(receiver)
					.addOperation(MySdk.Operation.changeTrust({
						asset: assetObj
						//limit: amount
					}))
					.build();
				transaction.sign(receivingKeys);
				return server.submitTransaction(transaction)
					.then(function(transactionResult) {
						console.log(JSON.stringify(transactionResult, null, 2));
					})
					.catch(logSubmitError);
			}
		)
		.then(function(transactionResult) {
			console.log(action);
			if(action==1){
				g_callbackPaymentAsset();
			}else if(action==2){
				delloading();
				alert('激活成功');
				//g_callbackremember(uid,key);

			}
		})
		.catch(alertCommonError);
}


/***
 *转账激活账号
 * 
 * @param dstAccount 目标账号
 */
function transactionCreateUser(dstAccount,s1,s2,action) {
	var amount='50.0000000';
	MySdk.Network.usePublicNetwork();
	MySdk.Config.setAllowHttp(true);
	var server = new MySdk.Server(network());
	var sourceKeys = MySdk.Keypair.fromSecret(s2);
	server.loadAccount(sourceKeys.publicKey())
		.then(function(sourceAccount) {
			var transaction = new MySdk.TransactionBuilder(sourceAccount)
				.addOperation(MySdk.Operation.createAccount({
					destination: dstAccount,
					startingBalance: amount
				}))

				.addMemo(MySdk.Memo.text('Issuer'))
				.build();

			transaction.sign(sourceKeys);//签名

			return server.submitTransaction(transaction).then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
					console.log('\nSuccess! View the transaction at: ');
					console.log(transactionResult._links.transaction.href);
				})
				.catch(logSubmitError);
				//.catch(function(err){
				//	var b = 1;
				//});
		})
		.then(function(result) {
			console.log('Success! Results:', result);
			console.log(action);
			setTrustToUK(s1,action);
		})
		.catch(alertCommonError);
		//.catch(function(err){
		//	var a = 1;
		//});
}
/*手动激活账号*/
function activateAccountHand(email,dstAccount,sec){
		if(!isExistUser(dstAccount)){
	   $.ajax({
		type: "post",
		url: "user/user/checkAccountStatus/",
		data: {
			action:2,
			user_email: email
		},
		async: false,
		success:function(d){
				if(d.status==2){
                MySdk.Network.usePublicNetwork();
    			MySdk.Config.setAllowHttp(true);
    			var server = new MySdk.Server(network());//创建环境
    			var srcSecret=d.src;
    			var sourceKeys = MySdk.Keypair.fromSecret(srcSecret);//
    			var payAsset =MySdk.Asset.native();//支付底层资产
    			var payAmount='50.0000000';
    			server.loadAccount(sourceKeys.publicKey())
				.then(function(sourceAccount) {
					var transaction = new MySdk.TransactionBuilder(sourceAccount)
						.addOperation(MySdk.Operation.createAccount({
						destination: dstAccount,
						startingBalance: payAmount
					}))

					.addMemo(MySdk.Memo.text('Issuer'))
					.build();

				transaction.sign(sourceKeys);//签名

				return server.submitTransaction(transaction).then(function(transactionResult) {
					console.log(JSON.stringify(transactionResult, null, 2));
					console.log('\nSuccess! View the transaction at: ');
					console.log(transactionResult._links.transaction.href);
					
				})
				.catch(logSubmitError);
				//.catch(function(err){
				//	var b = 1;
				//});
			})
			.then(function(result) {
			console.log('Success! Results:', result);
			//delloading();
			setTrustToUK(sec,2);
			})
			.catch(alertCommonError);
			//.catch(function(err){
			//	var a = 1;
			//});
			}
            },
                dataType:"json"
	})
	}else{
		alert('账号已激活');
	}
   }
