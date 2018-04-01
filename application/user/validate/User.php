<?php
namespace app\user\Validate;

use think\Validate;

class User extends Validate
{
	protected $rule = [
        'username'  => 'require|length:2,30',
        'regemail' 	=> 'require|email',
        'password' 	=> 'require|length:6,30',
        'statement'	=> 'accepted'
    ];
    
    protected $message  =   [
        'username.require'	=> '请输入用户名',
        'username.length'	=> '用户名长度为2-30个字符',
        'regemail.require'		=> '请输入邮箱',  
        'regemail.email'		=> '邮箱格式错误',    
        'password.require'	=> '请输入密码',
        'password.length'	=> '密码长度为6-30个字符',
        'statement.accepted'=> '请同意服务条款'
    ];
}
?>