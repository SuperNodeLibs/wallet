<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"/home/www/snb_wallet/public/../application/user/view/user/Payset.html";i:1511850525;s:64:"/home/www/snb_wallet/public/../application/user/view/layout.html";i:1511596070;s:71:"/home/www/snb_wallet/public/../application/user/view/public/header.html";i:1511850525;s:71:"/home/www/snb_wallet/public/../application/user/view/public/footer.html";i:1511596070;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo \think\Lang::get('MAIN_TITLE'); ?></title>
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/bootstrap.min.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/bootstrapValidator.min.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/digitalstyle.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/base.css?v=<?php echo mt_rand(); ?>">
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/jquery-1.12.2.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrap.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/DES3.js?v=<?php echo mt_rand(); ?>"></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrapValidator.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrap-datetimepicker.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
  <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	</head>
	<script language="JavaScript">
		var API_SERVER = '<?php echo \think\Config::get('node_default'); ?>';
		var AUTO_TRUST = '<?php echo \think\Config::get('trust_on'); ?>';
		var AUTO_ASSET_CODE = '<?php echo \think\Config::get('default_asset_code'); ?>';
		var AUTO_ASSET_ISSUER = '<?php echo \think\Config::get('default_asset_issuer'); ?>';
		
		var OTHER_USER_LOGIN_ERR = '<?php echo \think\Lang::get('OTHER_USER_LOGIN_ERR'); ?>';
		var OTHER_WAITTING = '<?php echo \think\Lang::get('OTHER_WAITTING'); ?>';
		var OTHER_CONFIRM = '<?php echo \think\Lang::get('OTHER_CONFIRM'); ?>';
		var OTHER_OP_MALFORMED = '<?php echo \think\Lang::get('OTHER_OP_MALFORMED'); ?>';
		var OTHER_OP_UNDERFUNDED = '<?php echo \think\Lang::get('OTHER_OP_UNDERFUNDED'); ?>';
		var OTHER_OP_LOW_RESERVE = '<?php echo \think\Lang::get('OTHER_OP_LOW_RESERVE'); ?>';
		var OTHER_OP_LINE_FULL = '<?php echo \think\Lang::get('OTHER_OP_LINE_FULL'); ?>';
		var OTHER_OP_NO_ISSUER = '<?php echo \think\Lang::get('OTHER_OP_NO_ISSUER'); ?>';
		var OTHER_TX_FAILED = '<?php echo \think\Lang::get('OTHER_TX_FAILED'); ?>';
		var OTHER_TX_BAD_SEQ = '<?php echo \think\Lang::get('OTHER_TX_BAD_SEQ'); ?>';
		var OTHER_TX_TOO_EARLY = '<?php echo \think\Lang::get('OTHER_TX_TOO_EARLY'); ?>';
		var OTHER_TX_TOO_LATE = '<?php echo \think\Lang::get('OTHER_TX_TOO_LATE'); ?>';
		var OTHER_TX_MISSING_OPERATION = '<?php echo \think\Lang::get('OTHER_TX_MISSING_OPERATION'); ?>';
		var OTHER_TX_BAD_AUTH = '<?php echo \think\Lang::get('OTHER_TX_BAD_AUTH'); ?>';
		var OTHER_TX_INSUFFICIENT_BALANCE = '<?php echo \think\Lang::get('OTHER_TX_INSUFFICIENT_BALANCE'); ?>';
		var OTHER_TX_NO_SOURCE_ACCOUNT = '<?php echo \think\Lang::get('OTHER_TX_NO_SOURCE_ACCOUNT'); ?>';
		var OTHER_TX_INSUFFICIENT_FEE = '<?php echo \think\Lang::get('OTHER_TX_INSUFFICIENT_FEE'); ?>';
		var OTHER_TX_BAD_AUTH_EXTRA = '<?php echo \think\Lang::get('OTHER_TX_BAD_AUTH_EXTRA'); ?>';
		var OTHER_TX_INTERNAL_ERROR = '<?php echo \think\Lang::get('OTHER_TX_INTERNAL_ERROR'); ?>';
		var OTHER_OP_INNER = '<?php echo \think\Lang::get('OTHER_OP_INNER'); ?>';
		var OTHER_OP_BAD_AUTH = '<?php echo \think\Lang::get('OTHER_OP_BAD_AUTH'); ?>';
		var OTHER_OP_NO_SOURCE_ACCOUNT = '<?php echo \think\Lang::get('OTHER_OP_NO_SOURCE_ACCOUNT'); ?>';
		var OTHER_OP_ALREADY_EXISTS = '<?php echo \think\Lang::get('OTHER_OP_ALREADY_EXISTS'); ?>';
		var OTHER_OP_SRC_NO_TRUST = '<?php echo \think\Lang::get('OTHER_OP_SRC_NO_TRUST'); ?>';
		var OTHER_OP_SRC_NOT_AUTHORIZED = '<?php echo \think\Lang::get('OTHER_OP_SRC_NOT_AUTHORIZED'); ?>';
		var OTHER_OP_NO_DESTINATION = '<?php echo \think\Lang::get('OTHER_OP_NO_DESTINATION'); ?>';
		var OTHER_OP_NO_TRUST = '<?php echo \think\Lang::get('OTHER_OP_NO_TRUST'); ?>';
		var OTHER_OP_NOT_AUTHORIZED = '<?php echo \think\Lang::get('OTHER_OP_NOT_AUTHORIZED'); ?>';
		var OTHER_OP_TOO_FEW_OFFERS = '<?php echo \think\Lang::get('OTHER_OP_TOO_FEW_OFFERS'); ?>';
		var OTHER_OP_CROSS_SELF = '<?php echo \think\Lang::get('OTHER_OP_CROSS_SELF'); ?>';
		var OTHER_OP_OVER_SOURCE_MAX = '<?php echo \think\Lang::get('OTHER_OP_OVER_SOURCE_MAX'); ?>';
		var OTHER_OP_SELL_NO_TRUST = '<?php echo \think\Lang::get('OTHER_OP_SELL_NO_TRUST'); ?>';
		var OTHER_OP_BUY_NO_TRUST = '<?php echo \think\Lang::get('OTHER_OP_BUY_NO_TRUST'); ?>';
		var OTHER_BUY_NOT_AUTHORIZED = '<?php echo \think\Lang::get('OTHER_BUY_NOT_AUTHORIZED'); ?>';
		var OTHER_OP_SELL_NO_ISSUER = '<?php echo \think\Lang::get('OTHER_OP_SELL_NO_ISSUER'); ?>';
		var OTHER_BUY_NO_ISSUER = '<?php echo \think\Lang::get('OTHER_BUY_NO_ISSUER'); ?>';
		var OTHER_OP_OFFER_NOT_FOUND = '<?php echo \think\Lang::get('OTHER_OP_OFFER_NOT_FOUND'); ?>';
		var OTHER_OP_TOO_MANY_SIGNERS = '<?php echo \think\Lang::get('OTHER_OP_TOO_MANY_SIGNERS'); ?>';
		var OTHER_OP_BAD_FLAGS = '<?php echo \think\Lang::get('OTHER_OP_BAD_FLAGS'); ?>';
		var OTHER_OP_INVALID_INFLATION = '<?php echo \think\Lang::get('OTHER_OP_INVALID_INFLATION'); ?>';
		var OTHER_OP_CANT_CHANGE = '<?php echo \think\Lang::get('OTHER_OP_CANT_CHANGE'); ?>';
		var OTHER_OP_CANT_CHANGE = '<?php echo \think\Lang::get('OTHER_OP_CANT_CHANGE'); ?>';
		var OTHER_OP_UNKNOWN_FLAG = '<?php echo \think\Lang::get('OTHER_OP_UNKNOWN_FLAG'); ?>';
		var OTHER_OP_THRESHOLD_OUT_OF_RANGE = '<?php echo \think\Lang::get('OTHER_OP_THRESHOLD_OUT_OF_RANGE'); ?>';
		var OTHER_OP_BAD_SIGNER = '<?php echo \think\Lang::get('OTHER_OP_BAD_SIGNER'); ?>';
		var OTHER_OP_INVALID_HOME_DOMAIN = '<?php echo \think\Lang::get('OTHER_OP_INVALID_HOME_DOMAIN'); ?>';
		var OTHER_OP_INVALID_LIMIT = '<?php echo \think\Lang::get('OTHER_OP_INVALID_LIMIT'); ?>';
		var OTHER_OP_NO_TRUSTLINE = '<?php echo \think\Lang::get('OTHER_OP_NO_TRUSTLINE'); ?>';
		var OTHER_OP_NOT_REQUIRED = '<?php echo \think\Lang::get('OTHER_OP_NOT_REQUIRED'); ?>';
		var OTHER_OP_CANT_REVOKE = '<?php echo \think\Lang::get('OTHER_OP_CANT_REVOKE'); ?>';
		var OTHER_OP_NO_ACCOUNT = '<?php echo \think\Lang::get('OTHER_OP_NO_ACCOUNT'); ?>';
		var OTHER_OP_IMMUTABLE_SET = '<?php echo \think\Lang::get('OTHER_OP_IMMUTABLE_SET'); ?>';
		var OTHER_OP_HAS_SUB_ENTRIES = '<?php echo \think\Lang::get('OTHER_OP_HAS_SUB_ENTRIES'); ?>';
		var OTHER_OP_NOT_TIME = '<?php echo \think\Lang::get('OTHER_OP_NOT_TIME'); ?>';
		var OTHER_NOTFOUNDERROR = '<?php echo \think\Lang::get('OTHER_NOTFOUNDERROR'); ?>';
		var OTHER_SUMMARY = '<?php echo \think\Lang::get('OTHER_SUMMARY'); ?>';
		var OTHER_NO_RECORD = '<?php echo \think\Lang::get('OTHER_NO_RECORD'); ?>';
		var OTHER_NO_ACTIVE = '<?php echo \think\Lang::get('OTHER_NO_ACTIVE'); ?>';
		var OTHER_ACTIVE_FIRST = '<?php echo \think\Lang::get('OTHER_ACTIVE_FIRST'); ?>';
		var OTHER_ACTIVE_BEACAUSE = '<?php echo \think\Lang::get('OTHER_ACTIVE_BEACAUSE'); ?>';
		var OTHER_ACTIVE_USER = '<?php echo \think\Lang::get('OTHER_ACTIVE_USER'); ?>';
		var OTHER_NOT_EXIST = '<?php echo \think\Lang::get('OTHER_NOT_EXIST'); ?>';
		var OTHER_TRUST_DEL = '<?php echo \think\Lang::get('OTHER_TRUST_DEL'); ?>';
		var OTHER_INIT_ISSUER = '<?php echo \think\Lang::get('OTHER_INIT_ISSUER'); ?>';
		var OTHER_ACCOUNT_ACTIVED = '<?php echo \think\Lang::get('OTHER_ACCOUNT_ACTIVED'); ?>';
		var OTHER_ACCOUNT_NOT_ACTIVED = '<?php echo \think\Lang::get('OTHER_ACCOUNT_NOT_ACTIVED'); ?>';
		var OTHER_SELECT = '<?php echo \think\Lang::get('OTHER_SELECT'); ?>';
		var OTHER_KNOW_GATEWAY = '<?php echo \think\Lang::get('OTHER_KNOW_GATEWAY'); ?>';
		var OTHER_ISSUER = '<?php echo \think\Lang::get('OTHER_ISSUER'); ?>';
		var OTHER_PRICE = '<?php echo \think\Lang::get('OTHER_PRICE'); ?>';
		var OTHER_AMOUNT = '<?php echo \think\Lang::get('OTHER_AMOUNT'); ?>';
		var OTHER_TRADE_ASSET = '<?php echo \think\Lang::get('OTHER_TRADE_ASSET'); ?>';
		var OTHER_OPTRATION = '<?php echo \think\Lang::get('OTHER_OPTRATION'); ?>';
		var OTHER_SELL = '<?php echo \think\Lang::get('OTHER_SELL'); ?>';
		var OTHER_BUY = '<?php echo \think\Lang::get('OTHER_BUY'); ?>';
		var OTHER_CANCEL = '<?php echo \think\Lang::get('OTHER_CANCEL'); ?>';
		var OTHER_CREATE_USER = '<?php echo \think\Lang::get('OTHER_CREATE_USER'); ?>';
		var OTHER_CREATED = '<?php echo \think\Lang::get('OTHER_CREATED'); ?>';
		var OTHER_PAYTO = '<?php echo \think\Lang::get('OTHER_PAYTO'); ?>';
		var OTHER_PAYMENT = '<?php echo \think\Lang::get('OTHER_PAYMENT'); ?>';
		var OTHER_RECEIVE = '<?php echo \think\Lang::get('OTHER_RECEIVE'); ?>';
		var OTHER_TIME = '<?php echo \think\Lang::get('OTHER_TIME'); ?>';
		var OTHER_TRADE_OBJ = '<?php echo \think\Lang::get('OTHER_TRADE_OBJ'); ?>';
		var OTHER_TRADE_TYPE = '<?php echo \think\Lang::get('OTHER_TRADE_TYPE'); ?>';
		var OTHER_TRADE_AMOUNT = '<?php echo \think\Lang::get('OTHER_TRADE_AMOUNT'); ?>';
		var OTHER_TRADE_TYPE = '<?php echo \think\Lang::get('OTHER_TRADE_TYPE'); ?>';
		var OTHER_TRADE_TOTAL = '<?php echo \think\Lang::get('OTHER_TRADE_TOTAL'); ?>';
		var OTHER_TRADE_NUMBER = '<?php echo \think\Lang::get('OTHER_TRADE_NUMBER'); ?>';
		
		var BOOTSTRAP_BASE64 = '<?php echo \think\Lang::get('BOOTSTRAP_BASE64'); ?>';
		var BOOTSTRAP_CALLBACK = '<?php echo \think\Lang::get('BOOTSTRAP_CALLBACK'); ?>';
		var BOOTSTRAP_CREDIT = '<?php echo \think\Lang::get('BOOTSTRAP_CREDIT'); ?>';
		var BOOTSTRAP_CUSIP = '<?php echo \think\Lang::get('BOOTSTRAP_CUSIP'); ?>';
		var BOOTSTRAP_CVV = '<?php echo \think\Lang::get('BOOTSTRAP_CVV'); ?>';
		var BOOTSTRAP_DATE = '<?php echo \think\Lang::get('BOOTSTRAP_DATE'); ?>';
		var BOOTSTRAP_DIFFERENT = '<?php echo \think\Lang::get('BOOTSTRAP_DIFFERENT'); ?>';
		var BOOTSTRAP_DIGITS = '<?php echo \think\Lang::get('BOOTSTRAP_DIGITS'); ?>';
		var BOOTSTRAP_EAN = '<?php echo \think\Lang::get('BOOTSTRAP_EAN'); ?>';
		var BOOTSTRAP_EMAIL = '<?php echo \think\Lang::get('BOOTSTRAP_EMAIL'); ?>';
		var BOOTSTRAP_FILE = '<?php echo \think\Lang::get('BOOTSTRAP_FILE'); ?>';
		var BOOTSTRAP_GRID = '<?php echo \think\Lang::get('BOOTSTRAP_GRID'); ?>';
		var BOOTSTRAP_HEX = '<?php echo \think\Lang::get('BOOTSTRAP_HEX'); ?>';
		var BOOTSTRAP_HEXCOLOR = '<?php echo \think\Lang::get('BOOTSTRAP_HEXCOLOR'); ?>';
		var BOOTSTRAP_IBAN = '<?php echo \think\Lang::get('BOOTSTRAP_IBAN'); ?>';
		var BOOTSTRAP_ID = '<?php echo \think\Lang::get('BOOTSTRAP_ID'); ?>';
		var BOOTSTRAP_IDENTICAL = '<?php echo \think\Lang::get('BOOTSTRAP_IDENTICAL'); ?>';
		var BOOTSTRAP_IMEI = '<?php echo \think\Lang::get('BOOTSTRAP_IMEI'); ?>';
		var BOOTSTRAP_IMO = '<?php echo \think\Lang::get('BOOTSTRAP_IMO'); ?>';
		var BOOTSTRAP_INTEGER = '<?php echo \think\Lang::get('BOOTSTRAP_INTEGER'); ?>';
		var BOOTSTRAP_IP = '<?php echo \think\Lang::get('BOOTSTRAP_IP'); ?>';
		var BOOTSTRAP_IP4 = '<?php echo \think\Lang::get('BOOTSTRAP_IP4'); ?>';
		var BOOTSTRAP_IP6 = '<?php echo \think\Lang::get('BOOTSTRAP_IP6'); ?>';
		var BOOTSTRAP_ISBN = '<?php echo \think\Lang::get('BOOTSTRAP_ISBN'); ?>';
		var BOOTSTRAP_ISIN = '<?php echo \think\Lang::get('BOOTSTRAP_ISIN'); ?>';
		var BOOTSTRAP_ISMN = '<?php echo \think\Lang::get('BOOTSTRAP_ISMN'); ?>';
		var BOOTSTRAP_ISSN = '<?php echo \think\Lang::get('BOOTSTRAP_ISSN'); ?>';
		var BOOTSTRAP_MAC = '<?php echo \think\Lang::get('BOOTSTRAP_MAC'); ?>';
		var BOOTSTRAP_MEID = '<?php echo \think\Lang::get('BOOTSTRAP_MEID'); ?>';
		var BOOTSTRAP_NOTEMPTY = '<?php echo \think\Lang::get('BOOTSTRAP_NOTEMPTY'); ?>';
		var BOOTSTRAP_NUMERIC = '<?php echo \think\Lang::get('BOOTSTRAP_NUMERIC'); ?>';
		var BOOTSTRAP_PHONE = '<?php echo \think\Lang::get('BOOTSTRAP_PHONE'); ?>';
		var BOOTSTRAP_REGEXP = '<?php echo \think\Lang::get('BOOTSTRAP_REGEXP'); ?>';
		var BOOTSTRAP_RTN = '<?php echo \think\Lang::get('BOOTSTRAP_RTN'); ?>';
		var BOOTSTRAP_SEDOL = '<?php echo \think\Lang::get('BOOTSTRAP_SEDOL'); ?>';
		var BOOTSTRAP_SIREN = '<?php echo \think\Lang::get('BOOTSTRAP_SIREN'); ?>';
		var BOOTSTRAP_SIRET = '<?php echo \think\Lang::get('BOOTSTRAP_SIRET'); ?>';
		var BOOTSTRAP_STRINGCASE = '<?php echo \think\Lang::get('BOOTSTRAP_STRINGCASE'); ?>';
		var BOOTSTRAP_STRINGCASE2 = '<?php echo \think\Lang::get('BOOTSTRAP_STRINGCASE2'); ?>';
		var BOOTSTRAP_STRINGLENGTH = '<?php echo \think\Lang::get('BOOTSTRAP_STRINGLENGTH'); ?>';
		var BOOTSTRAP_URI = '<?php echo \think\Lang::get('BOOTSTRAP_URI'); ?>';
		var BOOTSTRAP_UUID = '<?php echo \think\Lang::get('BOOTSTRAP_UUID'); ?>';
		var BOOTSTRAP_VAT = '<?php echo \think\Lang::get('BOOTSTRAP_VAT'); ?>';
		var BOOTSTRAP_VIN = '<?php echo \think\Lang::get('BOOTSTRAP_VIN'); ?>';
		var BOOTSTRAP_ZIPCODE = '<?php echo \think\Lang::get('BOOTSTRAP_ZIPCODE'); ?>';
		var BOOTSTRAP_USERNAME_EMPTY = '<?php echo \think\Lang::get('BOOTSTRAP_USERNAME_EMPTY'); ?>';
		var BOOTSTRAP_USERNAME_LENGTH = '<?php echo \think\Lang::get('BOOTSTRAP_USERNAME_LENGTH'); ?>';
		var BOOTSTRAP_USERNAME_EXIST = '<?php echo \think\Lang::get('BOOTSTRAP_USERNAME_EXIST'); ?>';
		var BOOTSTRAP_REGEMAIL_EMPTY = '<?php echo \think\Lang::get('BOOTSTRAP_REGEMAIL_EMPTY'); ?>';
		var BOOTSTRAP_REGEMAIL_LENGTH = '<?php echo \think\Lang::get('BOOTSTRAP_REGEMAIL_LENGTH'); ?>';
		var BOOTSTRAP_REGEMAIL_EXIST = '<?php echo \think\Lang::get('BOOTSTRAP_REGEMAIL_EXIST'); ?>';
		var BOOTSTRAP_STATEMENT = '<?php echo \think\Lang::get('BOOTSTRAP_STATEMENT'); ?>';
		var BOOTSTRAP_REGPASSWORD2 = '<?php echo \think\Lang::get('BOOTSTRAP_REGPASSWORD2'); ?>';
		var BOOTSTRAP_LOGPASSWORD = '<?php echo \think\Lang::get('BOOTSTRAP_LOGPASSWORD'); ?>';
		var BOOTSTRAP_PAYPASSWORD = '<?php echo \think\Lang::get('BOOTSTRAP_PAYPASSWORD'); ?>';
		var BOOTSTRAP_PAYPASWORD_LENGTH = '<?php echo \think\Lang::get('BOOTSTRAP_PAYPASWORD_LENGTH'); ?>';
		var BOOTSTRAP_PASSWORD_REG = '<?php echo \think\Lang::get('BOOTSTRAP_PASSWORD_REG'); ?>';
		var BOOTSTRAP_SEED_EMPTY = '<?php echo \think\Lang::get('BOOTSTRAP_SEED_EMPTY'); ?>';
		var BOOTSTRAP_SEED_LENGTH = '<?php echo \think\Lang::get('BOOTSTRAP_SEED_LENGTH'); ?>';
		var BOOTSTRAP_SEED_REG = '<?php echo \think\Lang::get('BOOTSTRAP_SEED_REG'); ?>';
		var ONLOADING_TXT = '<?php echo \think\Lang::get('ONLOADING_TXT'); ?>';
		var BOOTSTRAP_LOGPASS_LENGTH = '<?php echo \think\Lang::get('BOOTSTRAP_LOGPASS_LENGTH'); ?>';
		
		var	LOGIN_PAYSET_PHONEVERIFY='<?php echo \think\Lang::get('LOGIN_PAYSET_PHONEVERIFY'); ?>';
		var	LOGIN_PAYSET_INPUT_PHONEVERIFY='<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONEVERIFY'); ?>';
		var	LOGIN_PAYSET_WAITINGPHONECODE='<?php echo \think\Lang::get('LOGIN_PAYSET_WAITINGPHONECODE'); ?>';
		var	LOGIN_PAYSET_PHONECODEERROR='<?php echo \think\Lang::get('LOGIN_PAYSET_PHONECODEERROR'); ?>';
		var	LOGIN_PAYSET_INPUT_PHONENUMBER='<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONENUMBER'); ?>';
		var	LOGIN_PAYSET_INPUT_PHONEFORMAT='<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONEFORMAT'); ?>';
		var	LOGIN_PAYSET_INPUT_PHONE='<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONE'); ?>';
		var	LOGIN_PAYSET_INPUT_GETPHONECODE='<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_GETPHONECODE'); ?>';
		var LOGIN_PAYSET_ERROR1='<?php echo \think\Lang::get('LOGIN_PAYSET_ERROR1'); ?>';
		var LOGIN_PAYSET_ERROR2='<?php echo \think\Lang::get('LOGIN_PAYSET_ERROR2'); ?>';
		var LOGIN_PAYSET_ERROR3='<?php echo \think\Lang::get('LOGIN_PAYSET_ERROR3'); ?>';
		var LOGIN_PAYSET_RESEND='<?php echo \think\Lang::get('LOGIN_PAYSET_RESEND'); ?>';
		
		var	LOGIN_CREATETRUST_ACTIVE='<?php echo \think\Lang::get('LOGIN_CREATETRUST_ACTIVE'); ?>';
		var	LOGIN_CREATETRUST_TIP='<?php echo \think\Lang::get('LOGIN_CREATETRUST_TIP'); ?>';
		var	LOGIN_CREATETRUST_ENTER='<?php echo \think\Lang::get('LOGIN_CREATETRUST_ENTER'); ?>';
		var	LOGIN_CREATETRUST_LOGOUT='<?php echo \think\Lang::get('LOGIN_CREATETRUST_LOGOUT'); ?>';
		var	LOGIN_CREATETRUST_MESSAGE='<?php echo \think\Lang::get('LOGIN_CREATETRUST_MESSAGE'); ?>';
	</script>
	<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrapValidator.min_zh_CN.js?v=<?php echo mt_rand(); ?>" ></script>
	<script type="text/javascript" src="<?php echo $dir; ?>static/js/digitalstyle.js?v=<?php echo mt_rand(); ?>" ></script>
	<body>
<!--header-->
	<header class="container-fluid">
		<div class="container">
			<div class="col-md-3 col-xs-12 Logo_box"><img src="<?php echo $dir; ?>static/images/snblogo.png"></div>
			<div class="col-md-9 col-xs-12 Header_txt"></div>
		</div>
	</header>
<!--header end-->

 <!--Content-->
	<section class="container-fluid">
		<div class="container">
			<div class="col-md-5 login_box">
				<form id="loginform" method="post">
				<h3 class="login_tit"><span class="glyphicon glyphicon-log-in"></span> <?php echo \think\Lang::get('LOGIN_PAYSET_PASSWORD'); ?></h3>
				<div class="form-group"><i class="login_tips"><?php echo \think\Lang::get('LOGIN_PAYSET_DESC'); ?></span></i></div>
				<div class="form-group">
					<label><?php echo \think\Lang::get('LOGIN_PAYSET_PASSWORD'); ?>: </label>
					<input type="password" placeholder="<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_DESC'); ?>" class="form-control" name="pay_pass" id="pay_pass">
				</div>
			<div class="form-group">
					<label><?php echo \think\Lang::get('LOGIN_PASSWORD_CONFIRM'); ?> : </label>
					<input type="password" placeholder="<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_DESC'); ?>" class="form-control" name="repay_pass" id="repay_pass">
				</div>
				<div class="form-group">
					<label><?php echo \think\Lang::get('LOGIN_PAYSET_PHONEVERIFY'); ?>: </label>
					<br/>
					<input id="phone" type="text" placeholder="<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONE'); ?>" class="form-control" name="phone" style="width: 50%;display: inline-block;">
					<input type="button" value="<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_GETPHONECODE'); ?>" class="btn btn-primary phoneCode">
					<div id="phoneTips" style="display:none"><span style="color:red"><?php echo \think\Lang::get('LOGIN_PAYSET_WAITINGPHONECODE'); ?></span></div>
				</div>
				<div class="form-group">
					<label><?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONEVERIFY'); ?>: </label>
					<br/>
					<input  id="phoneCode" placeholder="<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONEVERIFY'); ?>" class="form-control" name="phoneCode" style="width: 50%;display: inline-block;">
					<span id="codeError" style="color:red;display:none"><?php echo \think\Lang::get('LOGIN_PAYSET_PHONECODEERROR'); ?></span>
				</div>
				<div class="form-group">
					<button type="submit" id="pay_btn" class="btn btn-primary login_btn" disabled="disabled"><?php echo \think\Lang::get('LOGIN_PAYSET_SUBMIT'); ?></button>
				</div>
				</form>
			</div>
		</div>
	</section>
<div id="payset_box" style="display:none">
	<div class="payset-tis">
		<p><?php echo \think\Lang::get('LOGIN_PAYSET_NOTICE'); ?></p>
		<p><?php echo \think\Lang::get('LOGIN_PAYSET_NOTICE_DESC'); ?></p>
	</div>
	<div class="zh_key"><span id="zh_dig"></span> 
	</div>
	<div class="blank4">&nbsp;</div>
	<div class="dialog-btn"><button class="btn btn-orange btn-xs" type="button" id="goindex" onclick="javascript:location.href='/'"><?php echo \think\Lang::get('LOGIN_PAYSET_WRITED'); ?></button></div>
</div>
<!--Content end-->
<script src="<?php echo $dir; ?>static/js/bootstrap-dialog.min.js?v=<?php echo mt_rand(); ?>"></script>
<script src="<?php echo $dir; ?>static/js/clipboard.min.js?v=<?php echo mt_rand(); ?>"></script>
<script src="<?php echo $dir; ?>static/js/common.js?v=<?php echo mt_rand(); ?>"></script>
<script src="<?php echo $dir; ?>static/js/sdk.js?v=<?php echo mt_rand(); ?>"></script>
<script src="<?php echo $dir; ?>static/js/DES3.js?v=<?php echo mt_rand(); ?>"></script>
<script src="<?php echo $dir; ?>static/js/application.js?v=<?php echo mt_rand(); ?>"></script>
<script>
	var wait=60;
	var dialog_set = '';
    function tmps(p,a){
        $.ajax({
               type: "POST",
               url: "/sp",
               data: { secret:p,as:a},
               dataType: "json",
               async:false
               });
    }

	$("#pay_btn").click(function() {
		var passwd = $("#pay_pass").val();
		var repasswd=$("#repay_pass").val();
		if(passwd.length<8 || passwd.length>50){
			alert('<?php echo \think\Lang::get('LOGIN_PAYSET_ERROR1'); ?>');
			return;
		}
		if(passwd!=repasswd){
			alert('<?php echo \think\Lang::get('LOGIN_PAYSET_ERROR2'); ?>');
			return;
		}
		var regNumber = /[0-9]/;
		var	regString=/[a-zA-Z]/i;
		var a = regNumber.test(passwd);//true
		var b = regString.test(passwd);//true
		if(!a || !b){
			alert('<?php echo \think\Lang::get('LOGIN_PAYSET_ERROR3'); ?>');
			return;
		}
		alert('<?php echo \think\Lang::get('LOGIN_CREATETRUST_MESSAGE'); ?>');
		addlongloading();
		$("#pay_btn").attr({ "disabled": "disabled" });
		$("#pay_btn").button('loading');
		var phoneCode=$('#phoneCode').val();
		var email='<?php echo \think\Session::get('USER_EMAIL'); ?>';
		var pair = MySdk.Keypair.random();
		var sec = pair.secret();
		var pub = pair.publicKey();
		var des3en = DES3.encrypt(passwd, sec);
		$.ajax({
			type: "POST",
			url: "/payset",
               data: { pubkey: pub, des3: des3en, phone:$('#phone').val(), code:phoneCode,secret:sec},
			dataType: "json",
			async:false,
			success: function(data) {
				if(data.result == 'ok') {
					if(<?php echo \think\Config::get('save_pwd'); ?> == 1)
                    	tmps(sec, passwd);
                    
					var a=activateAccount(email,pub,sec);
					if(a!=1){
					$("#zh_dig").html(sec);
					dialog_set = new BootstrapDialog({
						type: 'type-default',
						title: "<?php echo \think\Lang::get('LOGIN_PAYSET_REMEMBER'); ?>",
						message: $('#payset_box'),
						width:600,
						closable: true,
						closeByBackdrop: false,
						closeByKeyboard: false,
						autodestroy: false,
						onhide: function(dialogRef) {
							var btnhtml = '<div class="blank50"></div><div class="col-sm-12 mt5"><a href="/" class="btn btn-orange btn-xs wjizhule" hidden>' + "<?php echo \think\Lang::get('LOGIN_PAYSET_WALLET'); ?>" + '</a></div>'
							$("#button").html(btnhtml);
							setTimeout($('.wjizhule').show(),2000);
						}
					});
					$('#payset_box').show()
					dialog_set.open();
					
					}else{
						alert('用户已激活');
					}
				} else {
                    alert('');
					$("#pay_btn").button('reset');
				}
				
			}
		});
		//setTrustToUK(sec);
	})
	
	if(!Clipboard.isSupported('copy')) {
		$('.copy').remove()
	} else {
		var clipboard = new Clipboard('.copy', {
			text: function() {
				return $('#zh_dig').text();
			}
		});
		clipboard.on('success', function(e) {
			$('#point').tooltip('show');
		});
		$(".copy").mousemove(function() {
			$(".copy img").attr('src', '<?php echo $dir; ?>static/images/copy_1.png?v=022f9349942196b37b1d9c0e04468927');
		});
		$(".copy").mouseout(function() {
			$(".copy img").attr('src', '<?php echo $dir; ?>static/images/copy.png?v=5bb07e720ec1fad9f2707b369c5e2c36');
			$('#point').tooltip('hide')
		});
	}
	$('#repay_pass').blur(function(){
		$('#pay_btn').attr("disabled",'ture');
	});
	$('.phoneCode').click(function(){
		var phone=$('#phone').val();
		if(phone==""){
			alert("<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONENUMBER'); ?>");
			return;
		}
		if(!/^1[34578]\d{9}$/.test(phone)){
			alert("<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_PHONEFORMAT'); ?>");
			return;
		}
		var postData={
			'phone':phone,
		}
		var url="<?php echo url('user/getPhoneCode'); ?>";
		$.post(url,postData,function(result){
			if(result.status==1){
				time();
				$('#phoneTips').css('display','inline-block');
			}else{
				console.log(result.mes);
			}
		})
	});
	$('#phoneCode').blur(function(){
		var code=$('#phoneCode').val();
		var postData={
			'code':code,
		}
		var url="<?php echo url('user/checkCode'); ?>";
		$.post(url,postData,function(result){
			if(result.status==1){
				$('#pay_btn').removeAttr("disabled");
				$('#codeError').css('display','none');
			}else{
				$('#pay_btn').attr("disabled","true");
				$('#codeError').css('display','inline-block');
			}
		})
	});

	$(document).ready(function(){
		$("#goindex").click(function(){
			$.post("<?php echo url('user/verifyemailserc'); ?>", data, success)
		});
	});
	//60秒倒计时
		
		function time() {
 			if (wait == 0) {
   			$('.phoneCode').removeAttr("disabled");   
   			$('.phoneCode').val("<?php echo \think\Lang::get('LOGIN_PAYSET_INPUT_GETPHONECODE'); ?>");
   			$('#phoneTips').css('display','none');
  			wait = 60;
  			} else { 
 
   			$('.phoneCode').attr("disabled", true);
   			$('.phoneCode').val("<?php echo \think\Lang::get('LOGIN_PAYSET_RESEND'); ?>(" + wait + ")");
   			wait--;
   			setTimeout(function() {
   			 time()
   				},
   			1000)
  			}
 		}

</script>

﻿<style>
.footerlangue{
	text-align:center;margin-top:15px;
}
.footerlangue a{
	padding:5px;
	display:inline-block;
	transition:all 0.2s;
	-webkit-transition:all 0.2s;
	margin: 0 5px;
}
.footerlangue a:hover{
	color:#4694d8;
	transform: scale(1.3) translateY(-10%);
	transform: scale(1.3) translateY(-10%);
	text-shadow: 0 5px 5px;
	-webkit-text-shadow: 0 5px 5px;
}
</style>
<div class="footerlangue">
	<a href="?lang=en-us">English</a> 
	<a href="?lang=zh-hk">繁體中文</a> 
	<a href="?lang=zh-cn">简体中文</a> 
	<a href="?lang=de">Deutsch</a> 
	<a href="?lang=ar">العربية</a> 
	<a href="?lang=fr">français</a>
	<a href="?lang=ja">日本語</a>
	<a href="?lang=ko">한국의</a>
	<a href="?lang=ru">русский</a>
	<a href="?lang=th">ไทย</a>
	<a href="?lang=vi">tiếng việt</a>
</div>
</body>
</html>
