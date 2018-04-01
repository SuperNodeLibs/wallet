<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"/home/www/snb_wallet/public/../application/index/view/gateway_center/Index.html";i:1511596070;s:65:"/home/www/snb_wallet/public/../application/index/view/layout.html";i:1511596070;s:72:"/home/www/snb_wallet/public/../application/index/view/public/header.html";i:1511850525;s:72:"/home/www/snb_wallet/public/../application/index/view/public/footer.html";i:1511596070;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo \think\Lang::get('MAIN_TITLE'); ?></title>
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/bootstrap.min.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/bootstrapValidator.min.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/bootstrap-datetimepicker.min.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="<?php echo $dir; ?>static/css/digitalstyle.css?v=<?php echo mt_rand(); ?>" />
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/jquery-1.12.2.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrap.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrapValidator.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrap-datetimepicker.min.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/bootstrap-datetimepicker.zh-CN.js?v=<?php echo mt_rand(); ?>" ></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/sdk.js?v=<?php echo mt_rand(); ?>"></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/sdk-base.min.js?v=<?php echo mt_rand(); ?>"></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/DES3.js?v=<?php echo mt_rand(); ?>"></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/application.js?v=<?php echo mt_rand(); ?>"></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/wallet.js?v=<?php echo mt_rand(); ?>"></script>
		<script type="text/javascript" src="<?php echo $dir; ?>static/js/Validform_v5.3.2_min.js?v=<?php echo mt_rand(); ?>"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
  <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- <script>
    // window.__lc = window.__lc || {};
    // window.__lc.license = 8413431;
    // window.__lc.hostname = 'secure-lc.livechatinc.com';
</script> -->

<!-- <script src="https://cdn.livechatinc.com/staging/tracking.js"></script> -->
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
		
		var JSAPP_YOU_FOR = '<?php echo \think\Lang::get('JSAPP_YOU_FOR'); ?>';
		var JSAPP_CREATE_SUPPER_TICKET = '<?php echo \think\Lang::get('JSAPP_CREATE_SUPPER_TICKET'); ?>';
		var JSAPP_CREATE_SUPPER_FOR_YOU = '<?php echo \think\Lang::get('JSAPP_CREATE_SUPPER_FOR_YOU'); ?>';
		var JSAPP_YOU_DIR = '<?php echo \think\Lang::get('JSAPP_YOU_DIR'); ?>';
		var JSAPP_PAY_SUPPER_TICKET = '<?php echo \think\Lang::get('JSAPP_PAY_SUPPER_TICKET'); ?>';
		var JSAPP_UNKNOW_GATEWAY_NAME = '<?php echo \think\Lang::get('JSAPP_UNKNOW_GATEWAY_NAME'); ?>';
		var JSAPP_AMOUNT_LIMIT = '<?php echo \think\Lang::get('JSAPP_AMOUNT_LIMIT'); ?>';
		var JSAPP_AMOUNT_UNLIMIT = '<?php echo \think\Lang::get('JSAPP_AMOUNT_UNLIMIT'); ?>';
		var JSAPP_ASSET_AMOUNT = '<?php echo \think\Lang::get('JSAPP_ASSET_AMOUNT'); ?>';
		var JSAPP_ASSET_ISSUER = '<?php echo \think\Lang::get('JSAPP_ASSET_ISSUER'); ?>';
		var INDEX_GATEWAY_ASSET_CODE_INPUT = '<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_CODE_INPUT'); ?>';
		
		var JSAPP_ = '<?php echo \think\Lang::get('JSAPP_'); ?>';
		var APP_GATEWAY_MULT_ASSET ='<?php echo \think\Lang::get('APP_GATEWAY_MULT_ASSET'); ?>';
        var APP_EXPIRE ='<?php echo \think\Lang::get('APP_EXPIRE'); ?>';
        var APP_LOGIN ='<?php echo \think\Lang::get('APP_LOGIN'); ?>';
        var APP_EMAIL_NOT_REGISTER ='<?php echo \think\Lang::get('APP_EMAIL_NOT_REGISTER'); ?>';
        var APP_EMAIL_PASSWORD_ERR = '<?php echo \think\Lang::get('APP_EMAIL_PASSWORD_ERR'); ?>';
        var APP_REGISTER ='<?php echo \think\Lang::get('APP_REGISTER'); ?>';
        var APP_SENDMAIL = '<?php echo \think\Lang::get('APP_SENDMAIL'); ?>';
        var APP_MAIL = '<?php echo \think\Lang::get('APP_MAIL'); ?>';
        var APP_MAIL_PASS1 = '<?php echo \think\Lang::get('APP_MAIL_PASS1'); ?>';
        var APP_MAIL_PASS2 = '<?php echo \think\Lang::get('APP_MAIL_PASS2'); ?>';
	    var APP_MAIL_TIME = '<?php echo \think\Lang::get('APP_MAIL_TIME'); ?>';
        var APP_MAIL_NO_REPLY = '<?php echo \think\Lang::get('APP_MAIL_NO_REPLY'); ?>';
        var APP_MAIL_PASS_TITLE = '<?php echo \think\Lang::get('APP_MAIL_PASS_TITLE'); ?>';
        var APP_MAIL_NOT_EXIST = '<?php echo \think\Lang::get('APP_MAIL_NOT_EXIST'); ?>';
        var APP_MAIL_FORGET = '<?php echo \think\Lang::get('APP_MAIL_FORGET'); ?>';
        var APP_MAIL_RESET ='<?php echo \think\Lang::get('APP_MAIL_RESET'); ?>';
       	var APP_MAIL_SET_OK ='<?php echo \think\Lang::get('APP_MAIL_SET_OK'); ?>';
        var APP_MAIL_CHECK ='<?php echo \think\Lang::get('APP_MAIL_CHECK'); ?>';
        var APP_MAIL_EMAIL_CODE_ERR = '<?php echo \think\Lang::get('APP_MAIL_EMAIL_CODE_ERR'); ?>';
        var APP_PAYSET_OK ='<?php echo \think\Lang::get('APP_PAYSET_OK'); ?>';
        var APP_PAYSET_FAIL = '<?php echo \think\Lang::get('APP_PAYSET_FAIL'); ?>';
        var APP_SET_PAYSET = '<?php echo \think\Lang::get('APP_SET_PAYSET'); ?>';
        var APP_MAIL_ACTIVE ='<?php echo \think\Lang::get('APP_MAIL_ACTIVE'); ?>';
        var APP_ACTIVE_OK = '<?php echo \think\Lang::get('APP_ACTIVE_OK'); ?>';
        var APP_CHECK_FAIL_RETRY = '<?php echo \think\Lang::get('APP_CHECK_FAIL_RETRY'); ?>';
        var APP_EMAIL_CHECK_TITLE ='<?php echo \think\Lang::get('APP_EMAIL_CHECK_TITLE'); ?>';
        var APP_EMAIL_CHECKED_BACK ='<?php echo \think\Lang::get('APP_EMAIL_CHECKED_BACK'); ?>';
        var APP_EMAIL_REGISTER = '<?php echo \think\Lang::get('APP_EMAIL_REGISTER'); ?>';
        var APP_EMAIL_REGISTER_TITLE = '<?php echo \think\Lang::get('APP_EMAIL_REGISTER_TITLE'); ?>';
        var APP_RETRY = '<?php echo \think\Lang::get('APP_RETRY'); ?>';
        var APP_USER_REGISTERED = '<?php echo \think\Lang::get('APP_USER_REGISTERED'); ?>';
        var APP_USER_UNREGISTER = '<?php echo \think\Lang::get('APP_USER_UNREGISTER'); ?>';
        var APP_USER_EMAIL_REGISTERD = '<?php echo \think\Lang::get('APP_USER_EMAIL_REGISTERD'); ?>';
        var APP_USER_EMAIL_NOT_REGISTERD = '<?php echo \think\Lang::get('APP_USER_EMAIL_NOT_REGISTERD'); ?>';
        var APP_VCODE_ERR ='<?php echo \think\Lang::get('APP_VCODE_ERR'); ?>';
        var APP_VCODE_OK = '<?php echo \think\Lang::get('APP_VCODE_OK'); ?>';
		
        var INDEX_EXCHANG_AMOUNT ='<?php echo \think\Lang::get('INDEX_EXCHANG_AMOUNT'); ?>';
        var INDEX_EXCHANG_NOTCHOICEASSET ='<?php echo \think\Lang::get('INDEX_EXCHANG_NOTCHOICEASSET'); ?>';
        var INDEX_EXCHANG_NOTTRUSHASSET ='<?php echo \think\Lang::get('INDEX_EXCHANG_NOTTRUSHASSET'); ?>';
        var INDEX_MEMBER_SHOWPAYTIP ='<?php echo \think\Lang::get('INDEX_MEMBER_SHOWPAYTIP'); ?>';
        var INDEX_MEMBER_SHOWPAYTIP2 ='<?php echo \think\Lang::get('INDEX_MEMBER_SHOWPAYTIP2'); ?>';
        var LOGIN_PAYSET_TIP = '<?php echo \think\Lang::get('LOGIN_PAYSET_TIP'); ?>';
        var LOGIN_PAYSET_TIP2='<?php echo \think\Lang::get('LOGIN_PAYSET_TIP2'); ?>';
        var INDEX_TRANSACTION_TRANSFER ='<?php echo \think\Lang::get('INDEX_TRANSACTION_TRANSFER'); ?>';
        var INDEX_TRANSACTION_PAYASSET='<?php echo \think\Lang::get('INDEX_TRANSACTION_PAYASSET'); ?>';
        var INDEX_TRANSACTION_SUPERTICKET='<?php echo \think\Lang::get('INDEX_TRANSACTION_SUPERTICKET'); ?>';
        var INDEX_TRANSACTION_MAXACCPET='<?php echo \think\Lang::get('INDEX_TRANSACTION_MAXACCPET'); ?>';
        var INDEX_TRANSACTION_TRANSFERTIP='<?php echo \think\Lang::get('INDEX_TRANSACTION_TRANSFERTIP'); ?>';
        var INDEX_MEMBER_NOMSG='<?php echo \think\Lang::get('INDEX_MEMBER_NOMSG'); ?>';
        var INDEX_TRANSACTION_NOTTRUST='<?php echo \think\Lang::get('INDEX_TRANSACTION_NOTTRUST'); ?>';
        var INDEX_TRANSACTION_IAMTHEISSUER='<?php echo \think\Lang::get('INDEX_TRANSACTION_IAMTHEISSUER'); ?>';
        
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
		<div class="container nopadding">
			<div class="col-md-3 col-xs-12 nopadding Logo_box"><img src="<?php echo $dir; ?>static/images/snblogo.png"></div>
			<div class="col-md-9 col-xs-12 nopadding Header_txt">
				<p><?php echo \think\Lang::get('INDEX_ADDRESS'); ?> : <b id="current_account"><?php echo \think\Session::get('USER_ACCOUNT'); ?></b></p>
				<p><?php echo \think\Lang::get('INDEX_HEIGHT'); ?> : <span id="seqnumber">--</span>  <?php echo \think\Lang::get('INDEX_BILL_TOTAL'); ?> : <span id="total">--</span>   <?php echo \think\Lang::get('INDEX_FEE_TOTAL'); ?> : <span id="fee_pool">--</span></p>
				<a href="/logout" class="loginout"><span class="glyphicon glyphicon-log-out"></span></a>
			</div>
		</div>
		<!--手机端导航-->
		<div class="mobile_navshow">
			<button type="button" class="btn navbar-toggle mnav_show" onclick="$('.Mwallet_nav').toggleClass('on')">
	            <span class="sr-only"><?php echo \think\Lang::get('INDEX_SWITCH_NAV'); ?></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
		</div>
		<div class="Mwallet_nav mobile_navshow">
			<button type="button" class="btn close_mnav" onclick="$('.Mwallet_nav').toggleClass('on')">&times;</button>
			<div class="mnav_txt">
				<p><?php echo \think\Lang::get('INDEX_ADDRESS'); ?> : <b id="current_account"><?php echo \think\Session::get('USER_ACCOUNT'); ?></b></p>
				<p><?php echo \think\Lang::get('INDEX_HEIGHT'); ?> : <span id="seqnumber_m">--</span>  <?php echo \think\Lang::get('INDEX_BILL_TOTAL'); ?> : <span id="total_m">--</span>   <?php echo \think\Lang::get('INDEX_FEE_TOTAL'); ?> : <span id="fee_pool_m">--</span></p>
			</div>
			<div class="list-group mnav_list">
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "/")): ?>active<?php endif; ?>" href="/"><span class="glyphicon glyphicon-home"></span> <?php echo \think\Lang::get('INDEX_HOME_PAGE'); ?></a>
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "gateway") OR (\think\Request::instance()->path() == "gatewayCenter")): ?>active<?php endif; ?>" href="/gateway"><span class="glyphicon glyphicon-list-alt"></span> <?php echo \think\Lang::get('INDEX_GATEWAY'); ?></a>
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "exchange")): ?>active<?php endif; ?>" href="/exchange"><span class="glyphicon glyphicon-piggy-bank"></span> <?php echo \think\Lang::get('INDEX_EXCHANGE'); ?></a>
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "transaction")): ?>active<?php endif; ?>" href="/transaction"><span class="glyphicon glyphicon-retweet"></span> <?php echo \think\Lang::get('INDEX_TRANSACTION'); ?></a>
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "address")): ?>active<?php endif; ?>" href="/address"><span class="glyphicon glyphicon-book"></span> <?php echo \think\Lang::get('INDEX_ADDRESS_BOOK'); ?></a>
				<!--<a class="list-group-item <?php if((\think\Request::instance()->path() == "help")): ?>active<?php endif; ?>" href="/help"><span class="glyphicon glyphicon-question-sign"></span> <?php echo \think\Lang::get('INDEX_HELP'); ?></a>-->
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "member")): ?>active<?php endif; ?>" href="/member"><span class="glyphicon glyphicon-user"></span> <?php echo \think\Lang::get('INDEX_MEMBER'); ?></a>
			</div>
			<div class="my_ewmbox mobile_navshow">
				<div class="media">
				</div>
			</div>
			<a href="/logout" class="loginout"><span><?php echo \think\Lang::get('INDEX_EXIT'); ?> </span><span class="glyphicon glyphicon-log-out"></span></a>
		</div>
		<!--手机端导航end-->
	</header>
<!--header end-->
<!--Content-->
<section class="container-fluid">
	<div class="container walletbox">
		<div class="col-md-2 wallet_nav">
			<div class="list-group">
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "/")): ?>active<?php endif; ?>" href="/"><span class="glyphicon glyphicon-home"></span> <?php echo \think\Lang::get('INDEX_HOME_PAGE'); ?></a>
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "gateway") OR (\think\Request::instance()->path() == "gatewayCenter")): ?>active<?php endif; ?>" href="/gateway"><span class="glyphicon glyphicon-list-alt"></span> <?php echo \think\Lang::get('INDEX_GATEWAY'); ?></a>
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "exchange")): ?>active<?php endif; ?>" href="/exchange"><span class="glyphicon glyphicon-piggy-bank"></span> <?php echo \think\Lang::get('INDEX_EXCHANGE'); ?></a>
				<!--<a class="list-group-item <?php if((\think\Request::instance()->path() == "esports")): ?>active<?php endif; ?>" href="/esports"><span class="glyphicon glyphicon-knight"></span>电竞活动</a>-->
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "transaction")): ?>active<?php endif; ?>" href="/transaction"><span class="glyphicon glyphicon-retweet"></span> <?php echo \think\Lang::get('INDEX_TRANSACTION'); ?></a>
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "address")): ?>active<?php endif; ?>" href="/address"><span class="glyphicon glyphicon-book"></span> <?php echo \think\Lang::get('INDEX_ADDRESS_BOOK'); ?></a>
				<!--<a class="list-group-item <?php if((\think\Request::instance()->path() == "help")): ?>active<?php endif; ?>" href="/help"><span class="glyphicon glyphicon-question-sign"></span> <?php echo \think\Lang::get('INDEX_HELP'); ?></a>-->
				<a class="list-group-item <?php if((\think\Request::instance()->path() == "member")): ?>active<?php endif; ?>" href="/member"><span class="glyphicon glyphicon-user"></span> <?php echo \think\Lang::get('INDEX_MEMBER'); ?></a>
			</div>
			<div class="my_ewmbox">
				<div class="media">
				</div>
			</div>
		</div>

 <div class="col-md-10 wallet_min">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#WG1" aria-controls="WG1" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_GATEWAY_OVERVIEW'); ?></a>
		</li>
		<li role="presentation">
			<a href="#WG2" aria-controls="WG2" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_GATEWAY_INFOMATION'); ?></a>
		</li>
		<li role="presentation">
			<a href="#WG3" aria-controls="WG3" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_MANAGE'); ?></a>
		</li>
		<li role="presentation">
			<a href="#WG4" aria-controls="WG4" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE'); ?></a>
		</li>
		<li role="presentation">
			<a href="#WG5" aria-controls="WG5" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE'); ?></a>
		</li>
		<li role="presentation">
			<a href="#WG6" aria-controls="WG6" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_GATEWAY_BANKINFO'); ?></a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="WG1">
			<h2 class="wg_h2tit">
					    	<?php echo \think\Lang::get('INDEX_GATEWAY_ACCOUNT'); ?>：<?php echo $mygateway['gateway_account']; ?>
					    	<br>
					    	<?php echo \think\Lang::get('INDEX_GATEWAY_NAME'); ?>：<?php echo $mygateway['gateway_name']; ?>
				    	</h2>
			<div class="wg1_info">
				<ul class="list-unstyled">
					<li>
						<div class="wg1_info_box wg1_box">
							<h4><?php echo \think\Lang::get('INDEX_GATEWAY_PERMISSION_LIST'); ?></h4>
							<p><?php echo \think\Lang::get('INDEX_GATEWAY_LOW_PERMISSION'); ?>：<span id="low_threshold" class="glyphicon"></span></p>
							<p><?php echo \think\Lang::get('INDEX_GATEWAY_MIDDLE_PERMISSION'); ?>：<span id="med_threshold" class="glyphicon"></span></p>
							<p><?php echo \think\Lang::get('INDEX_GATEWAY_HIGH_PERMISSION'); ?>：<span id="high_threshold" class="glyphicon"></span></p>
						</div>
					</li>
					<li>
						<div class="wg1_info_box">
							<h4><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_APPLY'); ?></h4>
							<p><?php echo \think\Lang::get('INDEX_GATEWAY_UNDEAL'); ?>：<?php echo $undeal1; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?></p>
							<p><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_ALL'); ?>：<?php echo $total1; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?></p>
						</div>
					</li>
					<li>
						<div class="wg1_info_box">
							<h4><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_APPLY'); ?></h4>
							<p><?php echo \think\Lang::get('INDEX_GATEWAY_UNDEAL'); ?>：<?php echo $undeal2; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?></p>
							<p><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_ALL'); ?>：<?php echo $total2; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?></p>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- end WG1 -->
		<div role="tabpanel" class="tab-pane" id="WG2">
			<h2 class="wg_h2tit">
					    	<?php echo \think\Lang::get('INDEX_GATEWAY_ACCOUNT'); ?>：<?php echo $mygateway['gateway_account']; ?>
					    	<br>
					    	<?php echo \think\Lang::get('INDEX_GATEWAY_NAME'); ?>：<?php echo $mygateway['gateway_name']; ?>
				    	</h2>
			<div class="reset_wginfo">
				<form name="appGateway" method="post" id="appGateway">
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_CORP'); ?>：</label>
						<input type="text" class="form-control" name="gateway_company" value="<?php echo $mygateway['gateway_company']; ?>" datatype="*30" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CORP_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CORP_RULE'); ?>">
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_AREA'); ?>：</label>
						<select class="form-control" name="gateway_area">
							<option><?php echo \think\Lang::get('INDEX_GATEWAY_AREA_CHINA'); ?></option>
						</select>
					</div>
					<div class="cb"></div><!--清除浮动-->
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_CONTACT'); ?>：</label>
						<input type="text" class="form-control" name="gateway_contacts" value="<?php echo $mygateway['gateway_contacts']; ?>" datatype="*10" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CONTACT_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CONTACT_RULE'); ?>">
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_PHONE'); ?>：</label>
						<input type="text" class="form-control" name="gateway_phone" value="<?php echo $mygateway['gateway_phone']; ?>" datatype="m" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_PHONE_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_PHONE_ERR'); ?>">
					</div>
					<div class="form-group cb">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_ADDRESS'); ?>：</label>
						<input type="text" class="form-control" style="width:95%;" name="gateway_address" value="<?php echo $mygateway['gateway_address']; ?>" datatype="*60" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ADDRESS_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ADDRESS_RULE'); ?>">
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_CONTACT_EMAIL'); ?>：</label>
						<input type="text" class="form-control" name="gateway_email" value="<?php echo $mygateway['gateway_email']; ?>" datatype="e" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_EMAIL_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_EMAIL_ERR'); ?>">
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_SERVICES'); ?>：</label>
						<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_SERVICES_FORMAT'); ?>" name="gateway_service" value="<?php echo $mygateway['gateway_service']; ?>">
					</div>
					<div class="form-group cb">
						<button type="submit" class="btn btn-primary wg_btn"><?php echo \think\Lang::get('INDEX_GATEWAY_MODIFY'); ?></button>
					</div>
				</form>
			</div>
		</div>
		<!-- end WG2 -->
		<div role="tabpanel" class="tab-pane" id="WG3">
			<div class="zcguanli">
				<form name="assetManage" method="post" id="assetManage" action="assetManage">
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_CODE'); ?>：</label>
						<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_CODE_RULE'); ?>" name="asset_code" id="asset_code" datatype="*3" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_CODE_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_CODE_RULE'); ?>" />
						<input type="hidden" class="form-control" name="asset_issuer" id="asset_issuer" value="<?php echo \think\Session::get('USER_ACCOUNT'); ?>" />
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_DESC'); ?>：</label>
						<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_MEAN'); ?>" name="asset_desc" id="asset_desc" datatype="*32" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_MEAN_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_MEAN_RULE'); ?>" />
					</div>
					<div class="cb"></div><!--清除浮动-->
					<div class="form-group">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_ISSUER_AMOUNT'); ?>：</label>
						<label style="margin-right: 20px;"  onclick="$('#wg_amount').hide();$('#wg_price').show();"><input type="radio" name="zc" id="zc" checked="checked" value="0"><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_UNLIMIT'); ?></label>
						<label onclick="$('#wg_amount').show();$('#wg_price').hide();"><input type="radio" name="zc" id="zc" value="1"><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_LIMIT'); ?></label>
					</div>
					<div class="wg3_gdzc" id="wg_price" style="display: block;">
						<div class="form-group group_50">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_PRICE'); ?>：</label>
							<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_PRICE_DESC'); ?>" name="asset_price" id="asset_price" datatype="amount" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_PRICE_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_PRICE_INPUT'); ?>" />
						</div>
						<span class="group_50"><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_PRICE_IMPORTENT'); ?>！</span>
						<div class="form-group cb">
							
						</div>
					</div>
					<div class="wg3_gdzc" id="wg_amount">
						<div class="form-group group_50">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_ISSUER_AMOUNT'); ?>：</label>
							<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_MAX'); ?>1000000000" name="asset_amount" id="asset_amount" datatype="amount" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_AMOUNT_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_AMOUNT_INPUT'); ?>" />
						</div>
						<span class="group_50"><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_NOTICE'); ?></span>
						<div class="form-group cb">
							<span class="group_50"><font color="red"><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_ISSUER_DESC'); ?></font></span>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="button" id="btnIssuer" class="btn btn-success"><?php echo \think\Lang::get('INDDEX_GATEWAY_ISSUER_SUBMIT'); ?></button>
					</div>
				</form>
				<div class="zcgl_table">
					<table class="table table-bordered">
						<thead>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_CODE'); ?></td>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_DESC'); ?></td>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_ISSUER_AMOUNT'); ?></td>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_ISSUER'); ?></td>
						</thead>
						<tbody>
							<?php if(is_array($assetlist) || $assetlist instanceof \think\Collection || $assetlist instanceof \think\Paginator): $i = 0; $__LIST__ = $assetlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$al): $mod = ($i % 2 );++$i;?>
								<tr>
									<td><?php echo $al['asset_code']; ?></td>
									<td><?php echo $al['asset_desc']; ?></td>
									<td><?php echo $al['asset_amount']; ?></td>
									<td><?php echo $al['asset_issuer']; ?></td>
								</tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
					<div class="pagesbox">
						<?php echo $page0; ?>
					</div>
					<!--end pagebox-->
				</div>
			</div>
		</div>
		<!-- end WG3 -->
		<div role="tabpanel" class="tab-pane" id="WG4">
			<div class="wg_gl_table cz_table">
				<h2 class="wg_h2tit"><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_TOTAL'); ?>:<?php echo $total1; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?> <?php echo \think\Lang::get('INDEX_GATEWAY_UNDEAL'); ?>:<?php echo $undeal1; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?> </h2>
				<table class="table table-bordered">
					<thead>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_ASSET'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_TIME'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_AMOUNT'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_ACCOUNT'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_STATUS'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_OPTRATION'); ?></td>
					</thead>
					<tbody>
						<?php if(is_array($incharge) || $incharge instanceof \think\Collection || $incharge instanceof \think\Paginator): $i = 0; $__LIST__ = $incharge;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?>
							<tr>
								<td><?php if((array_key_exists('asset', $in))): ?><?php echo $in['asset']['asset_code']; else: ?>[<?php echo \think\Lang::get('INDEX_GATEWAY_KNOWN'); ?>]<?php endif; ?></td>
								<td><?php echo $in['record_start']; ?></td>
								<td><?php echo $in['record_amount']; ?></td>
								<td><span class="simp_address"><?php echo $in['user_account_obj']; ?></span></td>
								<td><span class="text-success"><?php echo $in['status']; ?></span></td>
								<td><button type="button" class="btn btn-default" onclick="showCZXQ(this);getCZXQData('<?php echo $in['record_id']; ?>')"><?php echo \think\Lang::get('INDEX_GATEWAY_DETAIL'); ?></button></td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<div class="pagesbox">
					<?php echo $page1; ?>
				</div>
				<!--end pagebox-->
			</div>

			<div class="table_cz_xx">
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_CODE'); ?>：<span id="czxq_asset">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_APPLY_TIME'); ?>：<span id="czxq_datetime">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_ACCOUNT'); ?>：<span id="czxq_account">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_ACCOUNT_IS_EXIST'); ?>：<span id="czxq_exist"><?php echo \think\Lang::get('INDEX_GATEWAY_ACCOUNT_EXIST'); ?></span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_AMOUNT'); ?>：<span id="czxq_amount">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_INFO'); ?>：
					<div class="dz_info">
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_TYPE'); ?><b id="czxq_type">--</b></p>
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_BANK_MEMBER'); ?><b id="czxq_member">--</b></p>
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_BANK_NAME'); ?><b id="czxq_bank">--</b></p>
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_BANK_ACCOUNT'); ?><b id="czxq_bankaccount">--</b></p>
					</div>
				</p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_DEAL'); ?>：<span class="text-danger" id="czxq_status">--</span></p>
				<div class="form-group text-center">
					<button type="button" class="btn btn-success" id="czxq_btn_status" data-toggle="modal"><?php echo \think\Lang::get('INDEX_GATEWAY_INCHARGE_DEALED'); ?></button>
					<button type="button" class="btn btn-default" onclick="hideCZXQ()"><?php echo \think\Lang::get('MAIN_BACK'); ?></button>
				</div>
			</div>
			<!--end 充值详细信息-->
		</div>
		<!-- end WG4 -->
		<div role="tabpanel" class="tab-pane" id="WG5">
			<div class="wg_gl_table tx_table">
				<h2 class="wg_h2tit"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_TOTAL'); ?>:<?php echo $total2; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?> <?php echo \think\Lang::get('INDEX_GATEWAY_UNDEAL'); ?>:<?php echo $undeal2; ?><?php echo \think\Lang::get('INDEX_GATEWAY_BI'); ?></h2>
				<table class="table table-bordered">
					<thead>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_ASSET'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_TIME'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_AMOUNT'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_ACCOUNT'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_STATUS'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_OPTRATION'); ?></td>
					</thead>
					<tbody>
						<?php if(is_array($outcharge) || $outcharge instanceof \think\Collection || $outcharge instanceof \think\Paginator): $i = 0; $__LIST__ = $outcharge;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?>
							<tr>
								<td><?php if((array_key_exists('asset', $in))): ?><?php echo $in['asset']['asset_code']; else: ?>[<?php echo \think\Lang::get('INDEX_GATEWAY_KNOWN'); ?>]<?php endif; ?></td>
								<td><?php echo $in['record_start']; ?></td>
								<td><?php echo $in['record_amount']; ?></td>
								<td><span class="simp_address"><?php echo $in['user_account_src']; ?></span></td>
								<td><span class="text-success"><?php echo $in['status']; ?></span></td>
								<td><button type="button" class="btn btn-default" onclick="showTXXQ(this);getTXXQData('<?php echo $in['record_id']; ?>')"><?php echo \think\Lang::get('INDEX_GATEWAY_DETAIL'); ?></button></td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<div class="pagesbox">
					<?php echo $page2; ?>
				</div>
				<!--end pagebox-->
			</div>

			<div class="table_tx_xx">
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_ASSET'); ?>：<span id="txxq_asset">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_APPLY_TIME'); ?>：<span id="txxq_datetime">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_ACCOUNT'); ?>：<span id="txxq_account">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_AMOUNT'); ?>：<span id="txxq_amount">--</span></p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_INFO'); ?>：
					<div class="dz_info">
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_TYPE'); ?><b id="txxq_bank">--</b></p>
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_BANK_MEMBER'); ?><b id="txxq_member">--</b></p>
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_BANK_NAME'); ?><b id="txxq_ext">--</b></p>
						<p class="col-md-6"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_BANK_ACCOUNT'); ?><b id="txxq_bankaccount">--</b></p>
					</div>
				</p>
				<p><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_DEAL'); ?>：<span class="text-danger" id="txxq_status"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_UNDEALED'); ?></span></p>
				<div class="form-group text-center">
					<button type="button" class="btn btn-success" id="txxq_btn_status" onclick="javascript:setTXXQStatus()"><?php echo \think\Lang::get('INDEX_GATEWAY_OUTCHARGE_DEALED'); ?></button>
					<button type="button" class="btn btn-default" onclick="hideTXXQ()"><?php echo \think\Lang::get('MAIN_BACK'); ?></button>
				</div>
			</div>
			<!--end 充值详细信息-->
		</div>
		<!-- end WG5 -->
		<div role="tabpanel" class="tab-pane" id="WG6">
			<div class="zcguanli">
				<form name="bankManage" method="post" id="bankManage" action="bankManage">
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_NAME'); ?>：</label>
						<select class="form-control" name="bank_id">
							<?php if(is_array($banklist) || $banklist instanceof \think\Collection || $banklist instanceof \think\Paginator): $i = 0; $__LIST__ = $banklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bl): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $bl['bank_id']; ?>"><?php echo $bl['bank_name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_MEMBER'); ?>：</label>
						<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_MEMBER_INPUT'); ?>" name="bank_member" id="bank_member" datatype="*32" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_MEMBER_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_MEMBER_RULE'); ?>" />
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_ACCOUNT'); ?>：</label>
						<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_ACCOUNT_INPUT'); ?>" name="bank_account" id="bank_account" datatype="*32" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_ACCOUNT_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_ACCOUNT_RULE'); ?>" />
					</div>
					<div class="form-group group_50">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_EXT'); ?>：</label>
						<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_EXT_INPUT'); ?>" name="bank_ext" id="bank_ext" />
					</div>
					<div class="cb"></div><!--清除浮动-->
					<div class="form-group group_100">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_ASSET_LIST'); ?>：</label>
						<?php if(is_array($myassetlist) || $myassetlist instanceof \think\Collection || $myassetlist instanceof \think\Paginator): $i = 0; $__LIST__ = $myassetlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?>
							<input type="checkbox" id="all_asset" name="asset_id[]" value="<?php echo $ml['asset_id']; ?>" /><?php echo $ml['asset_code']; endforeach; endif; else: echo "" ;endif; ?>

					</div>
					<div class="form-group group_100">
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_REMARK'); ?>：</label>
						<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_BANK_REMARK_INPUT'); ?>" name="info_comment" id="info_comment" />
					</div>
					<div class="form-group text-center">
						<button type="submit" id="btnIssuer" class="btn btn-success"><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_SAVE'); ?></button>
					</div>
				</form>
				<div class="zcgl_table">
					<table class="table table-bordered">
						<thead>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_NAME'); ?></td>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_MEMBER'); ?></td>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_ACCOUNT'); ?></td>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_ASSET_SUPPORT'); ?></td>
							<td><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_DEL'); ?></td>
						</thead>
						<tbody>
							<?php if(is_array($accountlist) || $accountlist instanceof \think\Collection || $accountlist instanceof \think\Paginator): $i = 0; $__LIST__ = $accountlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$al): $mod = ($i % 2 );++$i;?>
								<tr>
									<td><?php echo $al['bank_name']; ?></td>
									<td><?php echo $al['bank_member']; ?></td>
									<td><?php echo $al['bank_account']; ?></td>
									<td><?php echo $al['asset_list']; ?></td>
									<td>
										<a href="javascript:doDelBankInfo(<?php echo $al['info_id']; ?>);"><?php echo \think\Lang::get('INDEX_GATEWAY_BANK_DEL'); ?></a>
									</td>
								</tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
					<div class="pagesbox">

					</div>
					<!--end pagebox-->
				</div>
			</div>
		</div>
		<!-- end WG6 -->
	</div>
</div>
</div>
</section>
<!--Content end-->
<!--支付密码弹框-->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo \think\Lang::get('MAIN_INPUT_PAYSET'); ?></h4>
			</div>
			<div class="modal-body">
				<b class="edit_tips">*<?php echo \think\Lang::get('MAIN_INPUT_DESC'); ?>！</b>
				<br>
				<div class="form-group">
					<label><?php echo \think\Lang::get('MAIN_INPUT_PASSWORD'); ?>：</label>
					<input type="password" class="form-control" id="pwd" />
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary pull-right" onclick="javascript:doPay()"><?php echo \think\Lang::get('MAIN_INPUT_OK'); ?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--支付密码弹框 end-->
<script>
	var g_recordID;
	var g_dstAccount;
	var g_assetCode;
	var g_assetIssuer;
	var g_assetAmount;
	var g_action; //当前的动作

	/**
	 * 删除支付信息
	 */
	function doDelBankInfo(id){
		if(confirm("<?php echo \think\Lang::get('INDEX_GATEWAY_DEL_CONFIRM'); ?>")){
			location.href='/bankdel/id/'+id;
		}
	}
	/**
	 * 输入密码后的支付
	 */
	function doPay() {
		addlongloading();//调出loading
		if(g_action == 1) {
			//发行资产
			g_callbackPayment = function() {
				
			}
			g_callbackKillme = function(){
				$('#myModal').modal('hide');
				$('#assetManage')[0].submit();
			}
			g_callbackCreateUser = function(){
				
			}
			assetManage($('#pwd').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', $('#asset_code').val(), $('#asset_amount').val(), '<?php echo \think\Session::get('USER_ACCOUNT'); ?>');
		} else if(g_action == 2) {
			
			if($('#czxq_exist').text() == "<?php echo \think\Lang::get('INDEX_GATEWAY_NOT_EXIST'); ?>"){
				//创建账号
				g_callbackCreateUser = function() {
					$('#myModal').modal('hide');
					//提交结果
					$.ajax({
						type: "get",
						url: "/czxqPay/id/" + g_recordID,
						async: true,
						success: function() {
							//返回
							location.reload();
							//hideCZXQ();
						}
					});
	
				}
				startCreateUser($('#pwd').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', g_dstAccount, g_assetIssuer, g_assetCode, g_assetAmount);
			}else{
				//充值
				g_callbackPayment = function() {
					$('#myModal').modal('hide');
					delloading();//关闭loading
					//提交结果
					$.ajax({
						type: "get",
						url: "/czxqPay/id/" + g_recordID,
						async: true,
						success: function() {
							//返回
							location.reload();
							//hideCZXQ();
						}
					});
	
				}
				paymentAsset($('#pwd').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', g_dstAccount, g_assetIssuer, g_assetCode, g_assetAmount);
			}
			
		}
	}
	/*
	 * 修改支付状态
	 */
	function setTXXQStatus() {
		$.ajax({
			type: "get",
			url: "/txxqPay/id/" + g_recordID,
			async: true,
			success: function() {
				//返回
				location.reload();
				//hideCZXQ();
			}
		});
	}
	/**
	 * 获取提现详情
	 */
	function getTXXQData(id) {
		$.ajax({
			type: "get",
			url: "txxqData/id/" + id,
			async: true,
			success: function(data) {
				var data = JSON.parse(data);
				$('#txxq_asset').text(data.asset.asset_code.replace(/(^\s*)|(\s*$)/g, ""));
				$('#txxq_datetime').text(data.record_datetime);
				$('#txxq_account').text(data.user_account_src.replace(/(^\s*)|(\s*$)/g, ""));
				$('#txxq_amount').text(data.record_amount);
				$('#txxq_bank').text(data.bank.bank_name);
				$('#txxq_member').text(data.info.bank_member);
				$('#txxq_ext').text(data.info.bank_ext);
				$('#txxq_bankaccount').text(data.info.bank_account);
				$('#txxq_status').text(data.status);
				g_recordID = data.record_id;

				if(data.record_status == 2) {
					//已确认
					$('#txxq_btn_status').hide();
				} else {
					$('#txxq_btn_status').show();
				}
			}
		});
	}
	/***
	 * 获取充值详情
	 * @param {Object} id 信息ID
	 */
	function getCZXQData(id) {
		$.ajax({
			type: "get",
			url: "czxqData/id/" + id,
			async: false,
			success: function(data) {
				var data = JSON.parse(data);
				$('#czxq_asset').text(data.asset.asset_code.replace(/(^\s*)|(\s*$)/g, ""));
				$('#czxq_datetime').text(data.record_datetime);
				$('#czxq_account').text(data.user_account_obj.replace(/(^\s*)|(\s*$)/g, ""));
				$('#czxq_amount').text(data.record_amount);
				$('#czxq_type').text(data.bank.bank_name);
				$('#czxq_member').text(data.info.bank_member);
				$('#czxq_bank').text(data.info.bank_ext);
				$('#czxq_bankaccount').text(data.info.bank_account);
				$('#czxq_status').text(data.status);
				g_recordID = data.record_id;
				g_dstAccount = data.user_account_obj.replace(/(^\s*)|(\s*$)/g, "");
				g_assetCode = data.asset.asset_code.replace(/(^\s*)|(\s*$)/g, "");
				g_assetIssuer = data.asset.asset_issuer.replace(/(^\s*)|(\s*$)/g, "");
				g_assetAmount = data.record_amount;
				if(data.record_status == 2) {
					//已确认
					$('#czxq_btn_status').hide();
				} else {
					$('#czxq_btn_status').show();
				}
			}
		});
		//判断账号是否存在
		address($('#czxq_account').text());
	}

	/*
	 * 获取网关信息
	 */
	$(document).ready(function() {
		gateway('<?php echo $mygateway['gateway_account']; ?>');
	});

	/*
	 * 充值审核
	 */
	$('#czxq_btn_status').click(function() {
		g_action = 2; //充值
		$('#myModal').modal('show');
	});

	/**
	 * 发行资产
	 */
	$('#btnIssuer').click(function() {
		addloading();
		if($('input[name="zc"]').get(1).checked) {
			//限量资产，资产名称在所有网关之间不能重复
			if($('#asset_amount').val() == ''){
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_EMPTY'); ?>！');
				delloading();
				return;
			}
			if(!isNumber($('#asset_amount').val())){
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_ERR'); ?>！');
				delloading();
				return;
			}
			if(parseFloat($('#asset_amount').val())<=0){
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_AMOUNT_LARGE'); ?>！');
				delloading();
				return;
			}
			var d = $.ajax({
				type:"get",
				url:"/checkAllAssetCount/assetCode/"+$('#asset_code').val(),
				async:false,
				success: function(data){
					return data;
				}
			});
			var data = JSON.parse(d.responseJSON);
			if(data.count>0){
				//该资产名称已经存在
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_EXISTS'); ?>！');
				delloading();
				return;
			}
			g_action = 1; //发行资产
			$('#myModal').modal('show');
		} else {
			//货币资产，资产名称在当前网关之间不能重复，网管之间可以
			if($('#asset_price').val() == ''){
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_PRICE_EMPTY'); ?>！');
				delloading();
				return;
			}
			if(!isNumber($('#asset_price').val())){
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_FORMAT_ERR'); ?>！');
				delloading();
				return;
			}
			if(parseFloat($('#asset_price').val())<=0){
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_AMOUNT_LARGE'); ?>！');
				delloading();
				return;
			}
			var d = $.ajax({
				type:"get",
				url:"/checkAssetCount/assetCode/"+$('#asset_code').val(),
				async:false,
				success: function(data){
					return data;
				}
			});
			var data = JSON.parse(d.responseJSON);
			if(data.count>0){
				//该资产名称已经存在
				alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_EXISTS'); ?>！');
				delloading();
				return;
			}
			$('#assetManage')[0].submit();
		}
	});
	var form = $("#appGateway").Validform({
		tiptype: function(msg, o, cssctl) {
			if(!o.obj.is("form")) {
				o.obj.parent().find('.s_tips_box').remove();
				if(o.type == 3) {
					//alert(msg);
					o.obj.after('<div class="s_tips_box">*'+msg+'</div>');
				}
			}
		},
		datatype: {
			"*10": /^.{2,10}$/,
			"*30": /^.{2,30}$/,
			"*60": /^.{2,60}$/,
			"gwname": function(gets, obj, curform, datatype) {
				var param = $('#gateway_name').val()
				if(param == '') {
					return false;
				}
				$.ajax({
					type: "get",
					async: false,
					cache: false,
					url: "index/gateway/checkGatewayName/name/" + param,
					success: function(result) {
						s = result;
					},
					error: function() {}
				});
				if(s == "false") {
					return true;
				} else {
					return false;
				}
			}
		}
	});
	var form = $("#assetManage").Validform({
		tiptype: function(msg, o, cssctl) {
			if(!o.obj.is("form")) {
				o.obj.parent().find('.s_tips_box').remove();
				if(o.type == 3) {
					//alert(msg);
					//console.log(o.obj);
					o.obj.after('<div class="s_tips_box">*'+msg+'</div>');
				}
			}
		},
		datatype: {
			"*3": /^[A-Z0-9]{3,6}$/,
			"*32": /^.{2,32}$/,
			"amount": function(gets, obj, curform, datatype) {
				if($('input[name="zc"]').get(1).checked) {
					if($('#asset_amount').val() == "")
						return false;
					else if(parseInt($('#asset_amount').val()) <= 0)
						return false;
					else
						return true;
				} else {
					return true;
				}
			}
		}
	});
	
	/**
	 * 支付信息提交时候判断有无选择资产
	 */
	$('#bankManage').submit(function(){
		var checked = $(":checkbox").is(":checked");
		if(!checked){
			alert('<?php echo \think\Lang::get('INDEX_GATEWAY_ASSET_ATLEAST'); ?>');
			return false;
		}
	});
	var form = $("#bankManage").Validform({
		tiptype: function(msg, o, cssctl) {
			if(!o.obj.is("form")) {
				o.obj.parent().find('.s_tips_box').remove();
				if(o.type == 3) {
					//alert(msg);
					o.obj.after('<div class="s_tips_box">*'+msg+'</div>');
				}
			}
		},
		datatype: {
			"*4": /^.{2,4}$/,
			"*32": /^.{2,32}$/,
			"amount": function(gets, obj, curform, datatype) {
				if($('input[name="zc"]').get(1).checked) {
					if($('#asset_amount').val() == "")
						return false;
					else if(parseInt($('#asset_amount').val()) <= 0)
						return false;
					else
						return true;
				} else {
					return true;
				}
			}
		}
	});
</script>
	<script>
		$(document).ready(function(){
			home();
		});
	</script>
<!--foot-->
	<footer class="container-fluid">
<!--		<div class="container nopadding">
			<div class="wallet_kf">
				<span><?php echo \think\Lang::get('INDEX_CONTACT_SERVICE'); ?> : </span>
				<a href="##"><img src="<?php echo $dir; ?>static/images/qq.jpg"> <?php echo \think\Lang::get('INDEX_SERVICE_FELLOW'); ?></a>
			</div>
		 	<div class="copyright"> <?php echo \think\Lang::get('INDEX_COPYRIGHT'); ?>&copy;2016~2020</div>
		</div>-->
	</footer>
<!--foot end-->
	</body>
</html>