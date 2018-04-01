<?php
namespace app\index\validate;

use think\validate;

class GatewayCenter extends Validate
{
	protected $rule = [
        'asset_code'  => 'require|alphaNum|length:2,4',
        'asset_desc' 	=> 'require|length:2,255'
    ];
    
    protected $message  =   [
        'asset_code.require'	=> '请输入资产代码',
        'asset_code.alphaNum'	=> '资产代码只能输入字母或数字',
        'asset_code.length'		=> '资产代码长度为2-4个字符',  
        'asset_desc.require'		=> '请输入资产描述',    
        'asset_desc.length'	=> '资产描述字符长度为2-255个字符'
    ];
}
?>