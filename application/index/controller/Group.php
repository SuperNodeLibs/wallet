<?php
namespace app\index\controller;
use think\Controller;

class Group extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/group', 'R');
		$dir = getRelativePath();
		$request = request();
		
		$this->assign('css_id', $request->module()."_".$request->controller());
		$this->assign('dir', $dir);
		$this->assign('menu', Model('menu')->getAllMenu());
    	return $this->fetch("Index");	
    }
    
    /**
	 * 首页数据列表
	 * 
	 * */
    public function data()
    {
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/group', 'R');
    	$group = Model('group')->select();

    	return json_encode(['total'=>sizeof($group), 'rows'=>$group]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/group', 'C');
    	
    	Model('group')->allowField(true)->data(input('param.'))->save();
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($group_id){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/group', 'U');
    	
    	$group = Model('group')->get($group_id);

    	return json_encode($group->getData());
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($group_id){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/group', 'U');
    	
    	Model('group')->allowField(true)->save(input('param.'), ['group_id'=>$group_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/group', 'D');
    	
    	Model('group')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
