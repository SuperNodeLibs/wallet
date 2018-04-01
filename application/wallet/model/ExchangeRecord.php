<?php

namespace app\wallet\model;

use think\Model;

class ExchangeRecord extends Model
{
	
	protected $auto = ['record_datetime'];
	
	protected function setRecordDatetimeAttr()
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
	 * 设置网关状态
	 */
	public function getRecordStatusAttr($value){
		return config('record_status')[$value];
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
