<?php
namespace app\index\controller;
use think\Controller;

class Menu extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/menu', 'R');
		$dir = getRelativePath();
		$menu = Model('Menu')->where(array('menu_parent'=>'0'))->select();

		$request = request();
		$this->assign('css_id', $request->module()."_".$request->controller());
		$this->assign('menu', $menu);
		$this->assign('dir', $dir);
    	return $this->fetch("Index");	
    }
    
    /**
	 * 首页数据列表
	 * 
	 * */
    public function data()
    {
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/menu', 'R');
    	$menu = Model('Menu')->select();

    	return json_encode(['total'=>sizeof($menu), 'rows'=>$menu]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/menu', 'C');
    	Model('menu')->data(input('param.'))->save();
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($menu_id){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/menu', 'U');
    	
    	$menu = Model('menu')->get($menu_id);

    	return json_encode($menu->getData());
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($menu_id){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/menu', 'U');
    	
    	Model('menu')->save(input('param.'), ['menu_id'=>$menu_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/menu', 'D');
    	
    	Model('menu')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
