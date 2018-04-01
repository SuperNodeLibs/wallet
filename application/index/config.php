<?php
return [
	'gw_status' => [
		//网关状态0为申请，1处理中，2审核通过，3审核不通过
		'GW_STATUS_APPLY' => 0,
		'GW_STATUS_DEALING' => 1,
		'GW_STATUS_ALLOW' => 2,
		'GW_STATUS_DENY' => 3,
	],
	
	'record_status' =>[
		//充值提现状态0为申请，1为审核中，2为已支付
		'0'	=> '申请中',
		'1'	=> '审核中',
		'2' => '已处理'
	],
];
?>