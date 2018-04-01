<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"/home/www/snb_wallet/public/../application/index/view/gateway/Index.html";i:1511622541;s:65:"/home/www/snb_wallet/public/../application/index/view/layout.html";i:1511596070;s:72:"/home/www/snb_wallet/public/../application/index/view/public/header.html";i:1511850525;s:72:"/home/www/snb_wallet/public/../application/index/view/public/footer.html";i:1511596070;}*/ ?>
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
	<div class="col-md-8 mian_left gate_list">
		<ul class="list-unstyled scroll_main">
			<?php if(is_array($gateway) || $gateway instanceof \think\Collection || $gateway instanceof \think\Paginator): $i = 0; $__LIST__ = $gateway;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gw): $mod = ($i % 2 );++$i;?>
				<li>
					<h3><?php echo $gw['gateway_name']; ?></h3>
					<p class="netgate">
						<?php echo $gw['gateway_account']; ?>
					</p>
					<p><?php echo \think\Lang::get('INDEX_GATEWAY_SUPPLY'); ?> : <?php echo $gw['gateway_company']; ?></p>
					<p><?php echo \think\Lang::get('INDEX_CONTACT_PHONE'); ?> : <?php echo $gw['gateway_phone']; ?></p>
					<p><?php echo \think\Lang::get('INDEX_CONTACT_EMAIL'); ?> : <?php echo $gw['gateway_email']; ?></p>
					<p><?php echo \think\Lang::get('INDEX_TRADE_ASSET'); ?> : <i><?php echo \think\Lang::get('INDEX_CLICK_TO_TRUST'); ?></i>
						<span class="form-group comp_btn_group" id="gw_<?php echo $gw['gateway_account']; ?>">
									<?php if(is_array($gw['gateway_asset']) || $gw['gateway_asset'] instanceof \think\Collection || $gw['gateway_asset'] instanceof \think\Paginator): $i = 0; $__LIST__ = $gw['gateway_asset'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$asset): $mod = ($i % 2 );++$i;?>
										<button type="button" class="btn btn-default" onclick="loadXRWG();setGatewayData('<?php echo $asset['asset_issuer']; ?>', '<?php echo $asset['asset_code']; ?>');" id="btn-<?php echo $asset['asset_code']; ?>-<?php echo $asset['asset_issuer']; ?>"><?php echo $asset['asset_code']; ?></button>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</span>
					</p>

					<!--<p class="wg_custom"><?php echo \think\Lang::get('INDEX_SERVICE_ONLINE'); ?> :
						<span class="wallet_kf inline_kf">
									<?php if(is_array($gw['gateway_service']) || $gw['gateway_service'] instanceof \think\Collection || $gw['gateway_service'] instanceof \think\Paginator): $i = 0; $__LIST__ = $gw['gateway_service'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$serv): $mod = ($i % 2 );++$i;?>
										<a href="/?qq=<?php echo $serv['qq']; ?>"><img src="<?php echo $dir; ?>static/images/qq.jpg"> <?php echo $serv['name']; ?></a>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</span>
					</p>-->
				</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>

		</ul>
	</div>

	<div class="col-md-4 main_right">
		<div class="asset_control" style="display: block;">
			<!--edit-->
			<div class="asset_edit_box">
				<h3 class="asset_h3tit"><span class="glyphicon glyphicon-pencil"></span><?php echo \think\Lang::get('INDEX_TRUST_SET'); ?>
							</h3>
				<ul class="list-unstyled">
					<li>
						<h5><?php echo \think\Lang::get('INDEX_ASSET_ISSUER'); ?></h5><span class="xr_wg">--</span></li>
					<li>
						<h5><?php echo \think\Lang::get('INDEX_GATEWAY_NAME'); ?></h5><span class="xr_mc">--</span><input type="hidden" value="" id="current_gwaccount" /></li>
					<li>
						<h5><?php echo \think\Lang::get('INDEX_CONTACT_PHONE'); ?></h5><span class="xr_dh">--</span></li>
					<li><b class="edit_tips"><?php echo \think\Lang::get('INDEX_TRUST_DESC'); ?></b></li>
					<li>
						<form>
							<div class="form-group xr_input">
								<label><?php echo \think\Lang::get('INDEX_TRUST_ASSET'); ?></label>
								<select class="xr_hb" id="trust_list">
								</select>
								<br>
								<label><?php echo \think\Lang::get('INDEX_MAX_VALUE'); ?></label>
								<input type="text" id="trustAmount" />
								<button type="button" class="btn btn-primary" id="btn_trust_ok" data-toggle="modal" data-target="#myModal"><?php echo \think\Lang::get('INDEX_TRUST_OK'); ?></button>
							</div>
						</form>
					</li>
				</ul>
			</div>
			<div class="trusted_table">
				<h4><?php echo \think\Lang::get('INDEX_ASSET_TRUSTED'); ?><span class="showall"><?php echo \think\Lang::get('INDEX_TRUST_SHOWALL'); ?><span class="glyphicon glyphicon-triangle-bottom showall_icon"></span></span></h4>
				<table class="table table-bordered" id="trusted_list">
					<tr>
						<td><?php echo \think\Lang::get('INDEX_ASSET'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_MAX_VALUE'); ?></td>
						<td><?php echo \think\Lang::get('INDEX_OPTRATION'); ?></td>
					</tr>
				</table>
			</div>
		</div>
		<!--create-->
		<div class="asset_create_box">
			<?php if(($mygateway !='') AND ($mygateway['gateway_status'] == '2')): ?>
				<h3 class="asset_h3tit"><span class="glyphicon glyphicon-pencil"></span><?php echo \think\Lang::get('INDEX_IAM_GATEWAY'); ?></h3>
				<?php elseif(($mygateway == '') OR ($mygateway['gateway_status'] == '3')): if($mygateway['gateway_status'] == '3'): ?>
						<label><?php echo \think\Lang::get('INDEX_APPLY_DENY'); ?>!</label>
					<?php endif; ?>
					<!--<form name="appGateway" id="appGateway" method="post">
						<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_ACCOUNT_ADDRESS'); ?></label>
							<textarea rows="2" readonly="readonly" class="form-control" name="gateway_account"><?php echo \think\Session::get('USER_ACCOUNT'); ?></textarea>
						</div>
						<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_NAME'); ?></label>
							<input type="text" class="form-control" id="gateway_name" name="gateway_name" datatype="gwname" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_INPUT_NAME'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_EXIST'); ?>！" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_INPUT_NAME'); ?>">-->
							<!--<div class="input-group">
								    <input type="text" class="form-control" name="gateway_name">
								    <button type="button" class="btn btn-success">检测</button>
							    </div>-->
						<!--</div>

						<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_CORP'); ?></label>
							<input type="text" class="form-control" name="gateway_company" datatype="*30" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CORP_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CORP_RULE'); ?>">
						</div>

						<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_AREA'); ?></label>
							<select class="form-control" name="gateway_area">
								<option selected="selected"><?php echo \think\Lang::get('INDEX_GATEWAY_AREA_CHINA'); ?></option>
							</select>
						</div>

						<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_CONTACT'); ?></label>
							<input type="text" class="form-control" name="gateway_contacts" datatype="*10" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CONTACT_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_CONTACT_RULE'); ?>">
						</div>

						<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_PHONE'); ?></label>
							<input type="text" class="form-control" name="gateway_phone" datatype="m" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_PHONE_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_PHONE_ERR'); ?>">
						</div>

						<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_CONTACT_EMAIL'); ?></label>
							<input type="text" class="form-control" name="gateway_email" datatype="e" nullmsg="<?php echo \think\Lang::get('INDEX_GATEWAY_EMAIL_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_GATEWAY_EMAIL_ERR'); ?>">
						</div>-->

						<!--<div class="form-group">
							<label><?php echo \think\Lang::get('INDEX_GATEWAY_SERVICES'); ?></label>
							<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_GATEWAY_SERVICES_FORMAT'); ?>" name="gateway_service">
						</div>-->

						<!--<div class="form-group">
							<button type="submit" class="btn btn-primary create_submit"><?php echo \think\Lang::get('INDEX_GATEWAY_SUBMIT'); ?></button>
						</div>

					</form>-->
					<?php else: if($mygateway['gateway_status'] == '0'): ?>
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_APPLYING'); ?>!</label>
					<?php endif; if($mygateway['gateway_status'] == '1'): ?>
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_VERIFY'); ?>!</label>
					<?php endif; if($mygateway['gateway_status'] == '2'): ?>
						<label><?php echo \think\Lang::get('INDEX_GATEWAY_APPLIED'); ?>!</label>
					<?php endif; endif; ?>
		</div>
		<!--成为网关-->
		<div class="cwwg_box">
			<span><?php echo \think\Lang::get('INDEX_GATEWAY_ASK'); ?></span>
			<?php if($mygateway['gateway_status'] != '2'): ?>
				<button type="button" class="btn btn-primary" onclick="createWG()"><?php echo \think\Lang::get('INDEX_GATEWAY_BECOME_GATEWAY'); ?></button>
				<?php else: ?>
				<a class="btn btn-primary" href="/gatewayCenter"><span class="glyphicon glyphicon-hdd"></span> <?php echo \think\Lang::get('INDEX_GATEWAY_CENTER'); ?></a>
			<?php endif; ?>
		</div>
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
				<b class="text-danger">*<?php echo \think\Lang::get('MAIN_INPUT_DESC'); ?>！</b>
				<br>
				<div class="form-group">
					<label><?php echo \think\Lang::get('MAIN_INPUT_PASSWORD'); ?>：</label>
					<input type="password" class="form-control" id="pwd" />
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary pull-right" onclick="javascript:setTrustInfo()"><?php echo \think\Lang::get('MAIN_INPUT_OK'); ?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--支付密码弹框 end-->
<script>
	/**
	 * 获取资产最大值以便信任
	 */
	function updateTrust(assetCode, assetIssuer){
		$.ajax({
			type:"get",
			url:"index/asset/getIssuerAmount/code/" + assetCode + "/issuer/" + assetIssuer,
			async:true,
			success: function(data){
				$('#trustAmount').val(data.asset_amount);
			}
		});
	}
	/**
	 * 设置信任
	 */
	function setTrustInfo(){
		g_callbackSetTrust = function(seckey){
			$('#myModal').modal('hide');
			getTrust(seckey.publicKey());
		}
		setTrustLine($('#pwd').val(), '<?php echo \think\Session::get('USER_3DES'); ?>');
	}
	/**
	 * 资产改变
	 */
	$('#trust_list').change(function() {
			var gateway = $('#current_gwaccount').val();
			var allBtn = $('#gw_' + gateway + ' button');
			for(var i = 0; i < allBtn.length; i++) {
				var btn = allBtn[i];
				var sp = btn.id.split("-");
				if(sp[1] == $('#trust_list').val()) {
					setGatewayData(sp[2], sp[1]);
				}
			}
			
		});

	var form = $("#appGateway").Validform({
		tiptype: function(msg, o, cssctl) {
			if(!o.obj.is("form")) {
				if(o.type == 3) {
					alert(msg);
				}
			}
		},
		datatype: {
			"*10": /^.{2,10}$/,
			"*30": /^.{2,30}$/,
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
	$(document).ready(function() {
		getTrust('<?php echo \think\Session::get('USER_ACCOUNT'); ?>');
		$('#'+'btn-<?php echo $asset['asset_code']; ?>-<?php echo $asset['asset_issuer']; ?>').click();
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