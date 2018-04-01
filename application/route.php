<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
///15819974718
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
	'login'	=> 'user/user/login',
	'create'=> 'user/user/create',//2017.11.18自动激活失败后，手动激活
	'trust'	=> 'user/user/trust',//2017.11.18自动信任失败后，手动信任
	'register'	=> 'user/user/register',
	'forgetpassword' => 'user/user/forgetpassword',
	'check' => 'user/user/check',
	'checkNew' => 'user/user/checkNew',
	'registerAction' => 'user/user/registerAction',
	'verifyemail' => 'user/user/verifyemail',
	'activate' => 'user/user/activate',
	'payset' => 'user/user/payset',
	'payset2' => 'user/user/payset2',
	'logout' => 'user/user/logout',
	'verifypass' => 'user/user/verifypass',
	'change' => 'user/user/change',
	'changeok' => 'user/user/changeok',
	'changefail' => 'user/user/changefail',
	'paypassAction' => 'user/user/paypassAction',
	'gateway' => 'index/gateway/index',
	'gatewayCenter' => 'index/gatewayCenter/index',
	'assetManage' => 'index/gatewayCenter/assetManage',
	'bankManage' => 'index/gatewayCenter/bankManage',
	'bankdel' => 'index/gatewayCenter/bankdel',
	'czxqData' => 'index/gatewayCenter/czxqData',
	'czxqPay' => 'index/gatewayCenter/czxqPay',
	'txxqData' => 'index/gatewayCenter/txxqData',
	'txxqPay' => 'index/gatewayCenter/txxqPay',
	'exchange' => 'index/exchange/index',
	'esports'=>'index/esports/index',
	'transaction' => 'index/transaction/index',
	'address' => 'index/address/index',
	'deladdress' => 'index/address/del',
	'assetList' => 'index/asset/getAllLimitAsset',
	'help' => 'index/help/index',
	'checkAssetCount' => 'index/gatewayCenter/checkAssetCount',
	'checkAllAssetCount' => 'index/gatewayCenter/checkAllAssetCount',
	'huilv' => 'index/gatewayCenter/huilv',
	'member' => 'index/member/index',
	'changeLoginPassword' => 'user/user/changeLoginPassword',
	'changePayPassword' => 'user/user/changePayPassword',
	'account' => 'index/account/index',
	'setLock' => 'index/error/setlock',
	'lock' => 'user/user/lock',
	'sp' => 'user/user/SavePassword',
];
