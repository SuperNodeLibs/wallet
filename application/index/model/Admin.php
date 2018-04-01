<?php

namespace app\index\model;
use think\Model;

class Admin extends Model
{
	protected $_map = array(
		'username' =>'admin_name',
		'password' =>'admin_pass',
	);
	
	protected $auto = ['admin_datetime'];
	
	protected function setAdminDatetimeAttr()
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
	
	public function group()
	{
		return $this->hasOne('group','group_id','group_id')->field('group_name, group_lock, group_permission');
	}
	
	public function getByAdminNameEx($username){
		$admin = $this->getByAdminName($username)->getData();
		$group = Group::get($admin['group_id']);

		return array_merge($admin, $group->getData());
	}
	
	public function getAdminLockAttr($value)
	{
		$flag = [0=>'正常', 1=>'锁定'];
		return $flag[$value];
	}

	/**
	 *获取组ID的名称，由于用了一对一关联，会导致系统自动使用转化后的结果，所以采用Ex方法 
	 */
	public function getGroupIdAttr($value){
		$group = Model('group')->field('group_name')->where(array('group_id'=>$value))->find();
		$group['group_name'] = empty($group['group_name'])? "[未知角色]" : $group['group_name'];
		return $group['group_name'];
	}
	
	/**
     * 用户登录
     *
     * @return 用户登录状态,-1未注册，0登录成功，1密码不正确，2组锁定，3用户锁定
     */
	public function checkLogin($admin, $password)
	{
		$u = Admin::field('admin_pass, admin_name, admin_nickname, group_id, admin_lock')->where("admin_name", $admin)->find();
		$adminData = $u->getData();//原始数据
		//$groupData = $u->group->group_lock;//由于已经对groupid做了属性修改，所以这里会错误
		$group = Group::get($u['group_id']);

		if(!$u)
			return config('conifg_admin.LOGIN_STATUS_NULL');
		else if($adminData['admin_pass'] != md5($password))
			return config('conifg_admin.LOGIN_STATUS_ERRPWD');
		else if($group['group_lock'])
			return config('conifg_admin.LOGIN_STATUS_GROUPLOCK');
		else if($adminData['admin_lock'])
			return config('conifg_admin.LOGIN_STATUS_USERLOCK');
		else
			return config('conifg_admin.LOGIN_STATUS_OK');		
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
    	return User::field('admin_id')->where($field, $value)->count();
    }
}
