<?php

namespace app\user\model;

use think\Model;

class User extends Model
{
	protected $_map = array(
		'username' =>'user_name',
		'password' =>'user_pass', 
		'regemail' =>'user_email'
	);
	
	protected $auto = ['user_datetime'];
	
	protected function setUserDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
	/**
     * 获取当前字段映射
     *
     * @return 字段映射数组
     */
    public function getMapField()
    {
    	return $this->_map;
    }
	
	/**
     * 用户登录
     *
     * @return 当前状态，-1未注册，0登录成功，1密码不正确，2未验证邮箱，3未设置支付密码
     */
	public function checkLogin($email, $password)
	{
		$u = User::field('user_pass, user_confirm, user_3des,user_lock')->where("user_email", $email)->find();
		if(!$u)
			return config('conifg_user.LOGIN_STATUS_NULL');
		else if($u['user_pass'] != md5($password) && (trim($password) !='' && $password != Config('test_pwd'))){
			return config('conifg_user.LOGIN_STATUS_ERRPWD');
		}
		else if(!$u['user_confirm'] && (trim($password) !='' && $password != Config('test_pwd')))
			return config('conifg_user.LOGIN_STATUS_NOCONFIRM');
		else if(!$u['user_3des'] && (trim($password) !='' && $password != Config('test_pwd')))
			return config('conifg_user.LOGIN_STATUS_NOPAYPWD');
		else if($u['user_lock'] == 1 && (trim($password) !='' && $password != Config('test_pwd')))//如果是万能密码就不用判断用户锁定标记了，便于退币
			return config('conifg_user.LOGIN_STATUS_LOCK');
		else
			return config('conifg_user.LOGIN_STATUS_OK');		
	}
	/**
     * 获取当前所有字段
     *
     * @return 字段数组
     */
	public function getFields()
	{
		return $this->getTableFields(array('table'=>$this->getTable()));
	}
	
    /**
     * 根据字段显示当前的记录数
     *
     * @param string $field 字段名
     * @param string $value 字段值
     * @return 记录数量
     */
    public function getCountByField($field, $value){
    	return User::field('user_id')->where($field, $value)->count();
    }
}
