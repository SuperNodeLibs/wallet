<?php

namespace app\wallet\model;

use think\Model;

class Gateway extends Model
{
	
	protected $auto = ['gateway_datetime'];
	
	protected function setGatewayDatetimeAttr()
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
	public function getGatewayStatusAttr($value){
		return config('gateway_status')[$value];
	}
	
	/**
	 * 设置默认网关
	 */
	public function getGatewayDefaultAttr($value)
	{
		return config('gateway_default')[$value];
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
