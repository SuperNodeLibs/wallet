<?php
namespace app\index\validate;

use think\validate;

class Admin extends Validate
{
	protected $rule = [
        'username'  => 'require',
        'password' 	=> 'require',
        //'vcode' 	=> 'require|length:5',
    ];
    
    protected $message  =   [
        'username.require'	=> '请输入用户名',  
        'password.require'	=> '请输入密码',
        //'vcode.require'		=> '请输入验证码',
        //'vcode.length'		=> '验证码长度为5位',
    ];
}
?>