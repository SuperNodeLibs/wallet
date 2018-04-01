<?php
namespace app\index\model;
use think\Model;

class Menu extends Model{
	protected $_auto = array(
		array('menu_datetime', 'get_time', '3', 'callback'),
	);
	
	
	public function menu_parent()
	{
		return $this->hasOne('menu','menu_parent','menu_id')->field('menu_name');
	}
	
	protected function get_time()
	{
		return date("Y-m-d H:i:s");
	}

	public function getMenuHideAttr($value)
	{
		$flag = [0=>'正常', 1=>'隐藏'];
		return $flag[$value];
	}

	public function getMenuParentAttr($value)
	{
		$parent = $this->field('menu_name')->where(array('menu_id'=>$value))->find();
		$parent['menu_name'] = empty($parent['menu_name'])? "[根菜单]" : $parent['menu_name'];
		return $parent['menu_name'];
	}
	/**
	 * 根据树状关系获取所有的菜单
	 * */
	public function getAllMenu()
	{
		$menuArray = array();
		$parent = $this->where('menu_parent', 0)->select();
		foreach($parent as $p){
			$subMenuArray = array();
			$data = $p->data;
			
			$child = $this->where('menu_parent', $data['menu_id'])->select();
			foreach($child as $c)
				$subMenuArray[] = $c->data;
			$data['sub_menu'] =$subMenuArray;
			$menuArray[] = $data;
		}
		return $menuArray;
	}
};
?>