<?php

namespace app\index\model;

use think\Model;

class Group extends Model
{
	
	protected $auto = ['group_datetime'];
	
	protected function setAdminDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
	public function getGroupLockAttr($value)
	{
		$flag = [0=>'正常', 1=>'锁定'];
		return $flag[$value];
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
		return $this->hasOne('group')->field('group_name, group_lock, group_permission');
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
