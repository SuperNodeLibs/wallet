<?php

namespace app\wallet\model;

use think\Model;

class Bank extends Model
{
	
	protected $auto = ['bank_datetime'];
	
	protected function setBankDatetimeAttr()
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
     * 获取当前所有字段
     *
     * @return 字段数组
     */
	public function getFields()
	{
		return $this->getTableFields(array('table'=>$this->getTable()));
	}

}
