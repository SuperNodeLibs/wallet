<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"/home/www/snb_wallet/public/../application/index/view/transaction/Index.html";i:1511679017;s:65:"/home/www/snb_wallet/public/../application/index/view/layout.html";i:1511596070;s:72:"/home/www/snb_wallet/public/../application/index/view/public/header.html";i:1511850525;s:72:"/home/www/snb_wallet/public/../application/index/view/public/footer.html";i:1511596070;}*/ ?>
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
			<a href="#TAB1" aria-controls="TAB1" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRANSFER'); ?></a>
		</li>
		<li role="presentation">
			<a href="#TAB3" aria-controls="TAB3" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE'); ?></a>
		</li>
		<li role="presentation">
			<a href="#TAB4" aria-controls="TAB4" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_ADV'); ?></a>
		</li>
		<li role="presentation">
			<a href="#TAB5" aria-controls="TAB5" role="tab" data-toggle="tab"><?php echo \think\Lang::get('INDEX_TRANSACTION_RECORD'); ?></a>
		</li>
		<li role="presentation">
			<a href="#TAB6" aria-controls="TAB6" role="tab" data-toggle="tab">兑换记录</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content JY_content">
		<div role="tabpanel" class="tab-pane active" id="TAB1">
			<form name="payment" id="payment">
				<div class="lr_mode_group">
					<label><?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_OBJ'); ?></label>
					<span class="r_control" style="vertical-align: middle;">
				    			<div>
				    				<input type="text" class="form-control" id="payment_obj"  datatype="*56" nullmsg="<?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_OBJ_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_OBJ_RULE'); ?>" placeholder="<?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_OBJ_RULE2'); ?>" value="<?php echo \think\Request::instance()->get('payment'); ?>"/>
				    				<span class="input-group-btn">
				    					<!--检测账号按钮-->
				    					<!--<button type="button" class="btn btn-success" id="payment_check"><?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_CHECK'); ?></button>-->
				    					<!--<button type="button" class="btn btn-success">地址本</button>-->
				    				</span>
				</div>
				</span>
				<!--<div class="s_tips_box">显示提示信息</div>提示信息显示框-->
		</div>
		<div class="lr_mode_group">
    		<label><?php echo \think\Lang::get('INDEX_TRANSACTION_PAYASSET'); ?></label>
    		<span class="r_control">
    			<select class="form-control" id="simple_convert_src">
    						<option value="">请选择资产</option>
                             <option value="native">超级票</option>

    			</select>
    		</span>
    	</div>
		<div class="form-group lr_mode_group">
			<label><?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_AVL'); ?></label><!--显示可用余额-->
			<span class="r_control" id="payment_avl">
				    			--
				    		</span>
		</div>
                <!--<div class="form-group lr_mode_group">
                    <label><?php echo \think\Lang::get('INDEX_TRANSACTION_MAXACCPET'); ?></label>-->
                    <!--显示对方可接受该资产最大值-->
			<!--<span class="r_control" id="maxAccpetAmount">
				    		</span>
		</div>-->
		<div class="form-group lr_mode_group">
			<label><?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_AMOUNT'); ?></label>
			<span class="r_control">
				    			<input type="text" class="form-control has_txt" id="payment_amount" datatype="f" nullmsg="<?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_AMOUNT_INPUT'); ?>" errormsg="<?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_AMOUNT_ERR'); ?>" />
				    			
				    		</span>
		</div>
		<div class="form-group lr_mode_group">
			<label><?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_REMARK'); ?></label>
			<span class="r_control">
					    			<input type="text" class="form-control" placeholder="<?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_REMARK_RULE'); ?>" id="payment_comment" />
					    		</span>
		</div>

		<div class="form-group  text-center">
			<button type="button" class="btn btn-primary wg_btn" id="payment_submit"><?php echo \think\Lang::get('INDEX_TRANSACTION_PAYMENT_SUBMIT'); ?></button>
		</div>
		</form>
	</div>
	<!-- end TAB1 -->
	
<div role="tabpanel" class="tab-pane" id="TAB3">
	<form>
		<!--<div class="lr_mode_group">
				    		<label>支付资产</label>
				    		<span class="r_control">
				    			<select class="form-control" id="simple_convert_src">
				    			</select>
				    		</span>
				    	</div>-->
		<div class="form-group lr_mode_group">
			<label style="width:25%"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_AVL'); ?></label>
			<span class="r_control" id="simple_convert_avl" style="width:70%">
				    			--
				    		</span>
		</div>
		<div class="form-group lr_mode_group">
			<label><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_TYPE'); ?></label>
			<span class="r_control" style="vertical-align: top;">
				    			<label style="max-width: none;width:100%"><input type="radio" name="optype" value="0" checked="checked"/><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY'); ?></label>
				    			<label style="max-width: none;width:100%"><input type="radio" name="optype" value="1"/><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SELL'); ?></label>
				    		</span>
		</div>
		<div class="form-group lr_mode_group">
			<label id="simple_convert_name"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_ASSET'); ?></label>
			<span class="r_control">
				    			<select class="form-control" id="simple_convert_obj">
				    			</select>
				    		</span>
		</div>
		<div class="form-group lr_mode_group">
			<label><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_ASSET_AMOUNT'); ?></label>
			<span class="r_control" id="simple_convert_num">
				    			--
				    		</span>
		</div>
		<div class="form-group lr_mode_group">
			<label id="simple_convert_price_name"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_PRICE'); ?></label>
			<span class="r_control">
				    			<input type="text" class="form-control has_txt" id="simple_convert_price" value="0"/>
				    			
				    		</span>
		</div>
		<div class="form-group lr_mode_group">
			<label id="simple_convert_name_percent"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_SCALE'); ?></label>
			<span class="r_control" style="vertical-align: top;">
				    			<label style="max-width: none;width:30%"><input type="radio" name="buy_percent" value="0" checked="checked"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_ALL'); ?></label>
				    			<label style="max-width: none;width:30%"><input type="radio" name="buy_percent" value="1">1/2</label>
				    			<label style="max-width: none;width:30%"><input type="radio" name="buy_percent" value="2">1/3</label>
				    			<label style="max-width: none;width:30%"><input type="radio" name="buy_percent" value="3">1/4</label>
				    			<label style="max-width: none;width:30%"><input type="radio" name="buy_percent" value="4">1/6</label>
				    		</span>
		</div>

		<div class="form-group lr_mode_group">
			<label id="simple_convert_name_amount"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_AMOUNT'); ?></label>
			<span class="r_control">
				    			<input type="text" class="form-control has_txt" name="buy_amount" id="simple_convert_amount" /><label style="max-width: none;width:40%">（100<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_DOUBLE'); ?>）</label>
				    		</span>
		</div>
		<div class="form-group  text-center">
			<button type="button" class="btn btn-primary wg_btn" id="simple_convert_submit"><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SUBMIT'); ?></button>
		</div>
	</form>
</div>
<!-- end TAB3 -->
<div role="tabpanel" class="tab-pane" id="TAB4">
	<div class="col-md-12">
		<div class="lr_mode_group">
			<lable><?php echo \think\Lang::get('INDEX_EXCHANGE_SELGATEWAY'); ?></lable>
			<span class="r_control">
				    			<select class="form-control" id="trade_convert_obj">
				    			</select>
				    			</span>
		</div>
		<div class="col-md-4">
			<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_PRICE1'); ?>：<span id="buy_price">-</span>
		</div>
		<div class="col-md-4">
			<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SELL_PRICE1'); ?>：<span id="sell_price">-</span>
		</div>
		<div class="col-md-4">
			<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_NEWEST_PRICE'); ?>：<span id="current_price">-</span>
		</div>
	</div>
	<div class="col-md-7">
		<div class="col-md-6 nopadding">
			<h4><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SELL_LIST'); ?></h4>
			<table class="table table-bordered text-center" id="sell_list">
				<tr>
					<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_PRICE'); ?></td>
					<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_AMOUNT'); ?></td>
				</tr>

			</table>
		</div>
		<div class="col-md-6 nopadding">
			<h4><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_LIST'); ?></h4>
			<table class="table table-bordered text-center" id="buy_list">
				<tr>
					<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_PRICE'); ?></td>
					<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_AMOUNT'); ?></td>
				</tr>

			</table>
		</div>
	</div>
	<div class="col-md-5" style="overflow-x:auto;">
		<h4><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_MYORDER'); ?></h4>
		<table class="table table-bordered text-center" id="my_order">
			<tr>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_ASSET'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_PRICE'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_AMOUNT'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_OPT'); ?></td>
			</tr>
		</table>

		<ul class="pagination">
			<li>
				<a href="javascript:getOrderBook('<?php echo \think\Session::get('USER_ACCOUNT'); ?>',order_paging_start, 'desc');"><?php echo \think\Lang::get('INDEX_TRANSACTION_PREV_PAGE'); ?></a>
			</li>
			<li>
				<a href="javascript:getOrderBook('<?php echo \think\Session::get('USER_ACCOUNT'); ?>',order_paging_end, 'asc');"><?php echo \think\Lang::get('INDEX_TRANSACTION_NEXT_PAGE'); ?></a>
			</li>
		</ul>

	</div>
</div>
<!-- end TAB4 -->
<div role="tabpanel" class="tab-pane" id="TAB5">
	<div class="col-md-12" style="overflow-x:auto;">
		<h4><?php echo \think\Lang::get('INDEX_TRANSACTION_RECORD'); ?></h4>
		<table class="table table-bordered text-center" id="all_payment_record">
			<tr>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_RECORD_TIME'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_RECORD_OBJ'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_RECORD_ASSET'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_RECORD_AMOUNT'); ?></td>
			</tr>
		</table>
		<div class="pagesbox">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<li>
						<a href="javascript:getPayment('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', payment_paging_start, 'asc');"><?php echo \think\Lang::get('INDEX_TRANSACTION_PREV_PAGE'); ?></a>
					</li>
					<li>
						<a href="javascript:getPayment('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', payment_paging_end, 'desc');"><?php echo \think\Lang::get('INDEX_TRANSACTION_NEXT_PAGE'); ?></a>
					</li>
				</ul>
			</nav>
		</div>
		<!--end pagebox-->
	</div>
	
</div>
<!-- end WG5 -->
<!-- end TAB6 -->
<div role="tabpanel" class="tab-pane" id="TAB6">
	
	<div class="col-md-12" style="overflow-x:auto;">
		<h4><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_LIST'); ?></h4>
		<table class="table table-bordered text-center" id="all_trade_record">
			<tr>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_RECORD_TIME'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_MYTYPE'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_MYAMOUNT'); ?></td>
				<td><?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_AMOUNT'); ?></td>
			</tr>
		</table>
		<div class="pagesbox">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<li>
						<a href="javascript:getTrades('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', trade_paging_start, 'asc');"><?php echo \think\Lang::get('INDEX_TRANSACTION_PREV_PAGE'); ?></a>
					</li>
					<li>
						<a href="javascript:getTrades('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', trade_paging_end, 'desc');"><?php echo \think\Lang::get('INDEX_TRANSACTION_NEXT_PAGE'); ?></a>
					</li>
				</ul>
			</nav>
		</div>
		<!--end pagebox-->
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
				<b class="text-danger">*<?php echo \think\Lang::get('MAIN_INPUT_DESC'); ?>！</b>
				<br>
				<div class="form-group">
					<label><?php echo \think\Lang::get('MAIN_INPUT_PASSWORD'); ?>：</label>
					<input type="password" class="form-control" id="paypass" />
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary pull-right" id="paybtn_ok"><?php echo \think\Lang::get('MAIN_INPUT_OK'); ?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--支付密码弹框 end-->
<script>
	/*
	 * 验证转账表单
	 */
	var form = $("#payment").Validform({
		tiptype: function(msg, o, cssctl) {
			if(!o.obj.is("form")) {
				o.obj.parents('.form-group').find('.s_tips_box').remove();
				if(o.type == 3) {
					//alert(msg);
					o.obj.parents('.form-group').append('<div class="s_tips_box" style="padding-left:40px">*'+msg+'</div>');
				}
			}
		},
		datatype: {
			"ns6-30": /^(?=.*\d.*)(?=.*[a-zA-Z].*).{6,30}$/,
			"*56": /^G[A-Z|0-9]{55,55}$/,
			"f": /^[0-9\.]+$/,
			"z2-4": /^[\u4E00-\u9FA5\uf900-\ufa2d]{2,4}$/
		}
	});

	/*
	 * 操作方向
	 */
	$("input[name='optype']").click(function() {
		if($("input[name='optype']:checked").val() == "0") {
			//买入资产
			$('#simple_convert_name').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_ASSET'); ?>');
			$('#simple_convert_price_name').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_PRICE'); ?>');
			$('#simple_convert_name_amount').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_AMOUNT'); ?>');
			$('#simple_convert_name_percent').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_BUY_SCALE'); ?>');
		} else {
			//卖出资产
			$('#simple_convert_name').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SELL_ASSET'); ?>');
			$('#simple_convert_price_name').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SELL_PRICE'); ?>');
			$('#simple_convert_name_amount').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SELL_AMOUNT'); ?>');
			$('#simple_convert_name_percent').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_TRADE_SELL_SCALE'); ?>');
		}
		calcPrice();
		calcPriceOrVolume();
	});

	/**
	 * 比例
	 */
	$("input[name='buy_percent']").click(function() {

		calcPriceOrVolume();
	});

	var order_dir; //订单方向
	var order_paging_start; //订单分页
	var order_paging_end; //订单分页
	var payment_dir; //交易方向
	var payment_paging_start; //交易记录分页
	var payment_paging_end; //交易记录分页
	var trade_dir; //兑换方向
	var trade_paging_start; //兑换记录分页
	var trade_paging_end; //兑换记录分页
	/*
	 * 获取账户余额
	 */
	$(document).ready(function() {
		var asset = getAvlBalance('<?php echo \think\Session::get('USER_ACCOUNT'); ?>');
		$('#payment_avl').text('---');
		$('#simple_convert_avl').text(asset);
		$('#simple_convert_amount').val(asset);
		//alert(asset);
		getAllTrustAsset('<?php echo \think\Session::get('USER_ACCOUNT'); ?>');
        getMyIssueAsset('<?php echo \think\Session::get('USER_ACCOUNT'); ?>');
		getOrderBook('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', '', 'asc');
		getPayment('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', '', 'desc');
		getTrades('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', '', 'desc');
	});
	var g_action; //当前动作
	$(function() {
		g_callbackPayment = function() {
			$('#myModal').modal('hide');
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_OPT_OK'); ?>');
			location.reload();
		}
		g_callbackMakeOffer = function(){
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_OPT_OK'); ?>');
			$('#myModal').modal('hide');
			getOrderBook('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', '', 'asc');
			getTrades('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', '', 'desc');
			getTradeList();
		}
		g_callbackPaymentAsset =function(){
			var assetAndIssur=$('#simple_convert_src').val();
            var asset=assetAndIssur.split('.')[0];
            var issuer=assetAndIssur.split('.')[1];
			paymentAsset($('#paypass').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', $('#payment_obj').val(),issuer, asset, $('#payment_amount').val());				
		}
	});

	/*
	 * 计算最优的价格
	 * @param srcAsset 原始资产
	 * @param srcIssuer 原始资产发行人
	 * @param objAssset 目标资产
	 * @param objIssuer 目标资产发行人
	 */
	function calcPrice() {
		if($('#simple_convert_obj').val() == "") return;
		var srcAsset, srcIssuer, objAsset, objIssuer;
		if($("input[name='optype']:checked").val() == "0") {
			//买入
			srcAsset = "";
			srcIssuer = "";
			objAsset = $('#simple_convert_obj').val();
			objIssuer = $("#simple_convert_obj option:selected").attr("data-issuer");
		} else {
			//卖出
			srcAsset = $('#simple_convert_obj').val();
			srcIssuer = $("#simple_convert_obj option:selected").attr("data-issuer");
			objAsset = "";
			objIssuer = "";
		}
		getPrice(srcAsset, srcIssuer, objAsset, objIssuer);
	}

	/**
	 * 计算金额或数量
	 */
	function calcPriceOrVolume() {
		var bili = 1;
		var val = 0;
		if($("input[name='buy_percent']:checked").val() == "0") {
			bili = 1;
		} else if($("input[name='buy_percent']:checked").val() == "1") {
			bili = 0.5;
		} else if($("input[name='buy_percent']:checked").val() == "2") {
			bili = 0.333;
		} else if($("input[name='buy_percent']:checked").val() == "3") {
			bili = 0.25;
		} else if($("input[name='buy_percent']:checked").val() == "4") {
			bili = 0.167;
		}
		if($("input[name='optype']:checked").val() == "0") {
			//买入 
			var p = parseFloat($('#simple_convert_price').val());
			if(p >0){
				val = parseFloat(parseFloat($('#simple_convert_avl').text())/p).toFixed(2);
			}
			
		} else {
			val = parseFloat($('#simple_convert_num').text());
		}
		var total = parseInt(bili * val/100)*100;
		$('#simple_convert_amount').val(total);
	}
	/*
	 * 转账
	 */
	function doPay() {
		addlongloading();
		if(g_action == 1) {
			if(!isExistUser($('#payment_obj').val())) {
				var dstAccount=$('#payment_obj').val();
				
				$.ajax({
					type: "post",
					url: "index/transaction/getSrc/",
					async:false,
					data: {
						dstAccount: dstAccount
					},
					async: false,
					success:function(d){
						if(d.data && <?php echo \think\Config::get('auto_active'); ?>==1){
							var action="1";
							var s1=d.data['s1'];
							var s2=d.data['s2'];
							transactionCreateUser(dstAccount,s1,s2,action);
						}else{
							if(confirm('<?php echo \think\Lang::get('INDEX_TRANSACTION_ACTIVE_ASK'); ?>')) {
								g_callbackCreateUser = function() {
									alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ACTIVE_OK'); ?>');
									location.reload();
								}
								startCreateUser($('#paypass').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', $('#payment_obj').val(), '', '', $('#payment_amount').val());
							} else {
								alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ACTIVE_CANCEL'); ?>');
								$('#myModal').modal('hide');
							}	
						}
					}
				});
                           	//var assetAndIssur=$('#simple_convert_src').val();
                            //var asset=assetAndIssur.split('.')[0];
                            //var issuer=assetAndIssur.split('.')[1];
				//paymentAsset($('#paypass').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', $('#payment_obj').val(),issuer, asset, $('#payment_amount').val());				
			} else {
				//转账
                            var assetAndIssur=$('#simple_convert_src').val();
                            var asset=assetAndIssur.split('.')[0];
                            var issuer=assetAndIssur.split('.')[1];
				paymentAsset($('#paypass').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', $('#payment_obj').val(),issuer, asset, $('#payment_amount').val());
			}

		} else if(g_action == 2) {
			//兑换
			if($("input[name='optype']:checked").val() == "0") {
				var sell_amount = parseFloat($('#simple_convert_amount').val()  * $('#simple_convert_price').val()).toFixed(0);
				var datD = parseInt(parseFloat($('#simple_convert_price').val() * 100).toFixed(0));//取整
				convertAsset2($('#paypass').val(), '<?php echo \think\Session::get('USER_3DES'); ?>',
					"", "",
					$('#simple_convert_obj').val(), $("#simple_convert_obj option:selected").attr("data-issuer"),
					sell_amount,
					100, datD
				);
			} else {
				//卖出
				var sell_amount = parseFloat($('#simple_convert_amount').val()).toFixed(0);

				convertAsset2($('#paypass').val(), '<?php echo \think\Session::get('USER_3DES'); ?>',
					$('#simple_convert_obj').val(), $("#simple_convert_obj option:selected").attr("data-issuer"),
					"", "",
					sell_amount,
					parseInt(parseFloat($('#simple_convert_price').val() * 100).toFixed(0)), 100
				);
			}
		} else if(g_action == 3) {
			//取消订单
			doCancelOrder($('#paypass').val(), '<?php echo \think\Session::get('USER_3DES'); ?>', cancel_srcAsset, cancel_srcIssuer, cancel_objAsset, cancel_objIssuer, cancel_price, cancel_id);
		}
	}

	/*
	 * 点击确定
	 */
	$('#paybtn_ok').click(function() {
		doPay();
	});

	$('#payment_check').click(function() {
		if($('#payment_obj').val().length != 56) {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_PAYMENT_FORMAT_ERR'); ?>！');
			return;
		}
		if($('#payment_obj').val().substring(0, 1) != 'G') {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_PAYMENT_RULE'); ?>！');
			return;
		}
		checkUser($('#payment_obj').val());
	});
	/*
	 * 转账提交
	 */
	$('#payment_submit').click(function() {
		if($('#simple_convert_src').val()==''){
			alert('请先选择转账资产');
			return;
		}
		
		if('<?php echo \think\Session::get('USER_ACCOUNT'); ?>' == $('#payment_obj')) {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_PAYMENT_SELF'); ?>！');
			return;
		}
		if($('#payment_obj').val().length != 56) {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_PAYMENT_FORMAT_ERR'); ?>！');
			return;
		}
		if($('#payment_obj').val().substring(0, 1) != 'G') {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_PAYMENT_RULE'); ?>！');
			return;
		}

		g_action = 1; //支付
		$('#myModal').modal('show');
	});

	/*
	 * 获取指定资产余额
	 */
	$('#simple_convert_obj').change(function() {
		if($('#simple_convert_obj').val() != "") {
			var ass = $('#simple_convert_obj').val();
			
			var issuer = $("#simple_convert_obj option:selected").attr("data-issuer");
			var asset = getBalance('<?php echo \think\Session::get('USER_ACCOUNT'); ?>', issuer, ass);
			$('#simple_convert_num').text(asset.balance);
			calcPrice();
			calcPriceOrVolume();
		}

	});

	/**
	 * 获取交易列表
	 */
	function getTradeList() {
		if($('#trade_convert_obj').val() != "") {
			var ass = $('#trade_convert_obj').val();
			var issuer = $("#trade_convert_obj option:selected").attr("data-issuer");
			getCurrentPrice("", "", ass, issuer);
		}
	}
	/**
	 * 查询指定交易现价
	 */
	$('#trade_convert_obj').change(function() {
		getTradeList();
	});
	/*
	 * 简单兑换
	 */
	$('#simple_convert_submit').click(function() {
		if($('#simple_convert_src').val() == $('#simple_convert_obj').val()) {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_TRADE_SAME_ASSET'); ?>！');
			return;
		}
		if(parseFloat($('#simple_convert_price').val()) <= 0) {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_TRADE_PRICE_LARGE'); ?>0！');
			return;
		}
		if(parseFloat($('#simple_convert_amount').val()) < 100) {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_TRADE_AMOUNT_LESS'); ?>100！');
			return;
		}
		if(parseInt($('#simple_convert_amount').val())%100) {
			alert('<?php echo \think\Lang::get('INDEX_TRANSACTION_ALT_TRADE_DOUBLE100'); ?>！');
			return;
		}
		g_action = 2; //兑换
		$('#myModal').modal('show');
	});

	var cancel_id;
	var cancel_srcAsset;
	var cancel_srcIssuer;
	var cancel_objAsset;
	var cancel_objIssuer;
	var cancel_price;
	/*
	 * 取消订单
	 */
	function cancelOrder(id, srcAsset, srcIssuer, objAsset, objIssuer, price) {
		g_action = 3; //取消订单
		cancel_id = id;
		cancel_srcAsset = srcAsset;
		cancel_srcIssuer = srcIssuer;
		cancel_objAsset = objAsset;
		cancel_objIssuer = objIssuer;
		cancel_price = price;
		$('#myModal').modal('show');
	}
        /*
	 * 判断对方是否信任该资产
         * 
	 */
        function ifTrustThisAsset(asset,issuer){
            if($('#payment_obj').val()){
             var acceptAddress=$('#payment_obj').val();
             var canAccept=getAssetHaveAndTurst(acceptAddress,asset,issuer);
             if(canAccept){
             $('#maxAccpetAmount').text(canAccept);
            }else{
             $('#maxAccpetAmount').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_NOTTRUST'); ?>'); 
                    }
                }
             }
 
        /*
	 * 查看本账号的特定资产余额，及可转给对方最大数量
         * 
	 */
        $('#simple_convert_src').change(function(){
            var address='<?php echo \think\Session::get('USER_ACCOUNT'); ?>';
            var assetAndIssur=$('#simple_convert_src').val();
            var asset=assetAndIssur.split('.')[0];
            var issuer=assetAndIssur.split('.')[1];
            if(asset=='native'){
                var asset = getAvlBalance('<?php echo \think\Session::get('USER_ACCOUNT'); ?>');
		$('#payment_avl').text(asset);
                $('#maxAccpetAmount').text('---');
            }else if(address==issuer){
                $('#payment_avl').text('<?php echo \think\Lang::get('INDEX_TRANSACTION_IAMTHEISSUER'); ?>');
                ifTrustThisAsset(asset,issuer);
            }else
            {
            var avl=getassetAvlBalance(address,asset,issuer);
             $('#payment_avl').text(avl);
             ifTrustThisAsset(asset,issuer);
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