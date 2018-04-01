<?php
namespace app\index\model;

use think\Model;

class Help extends Model
{
	protected $auto = ['help_datetime'];
	
	protected function setHelpDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
	/**
	 * 获取所有的帮助类型和列表
	 */
	public function getHelpList(){
		$typeArray = array();
		
		$typeList = Model('help_type')->where('parent_type_id', 0)->select();
		foreach($typeList as $type){
			$data = $type->data;
			$helpList = Model('help')->where('type_id', $data['type_id'])->select();
			$subHelp = array();
			foreach($helpList as $help){
				$subHelp[] = $help->data;
			}
			$data['helpList'] = $subHelp;
			$typeArray[] = $data;
		}
		
		return $typeArray;
	}
	
	/**
	 * 获取第一个标题
	 * @param $typeArray 类型数组
	 */
	public function getFirstHelp($typeArray){
		foreach($typeArray as $type){
			if(sizeof($type['helpList']) >0){
				return $type['helpList'][0];
			}
		}
	}
}