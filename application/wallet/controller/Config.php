<?php
namespace app\wallet\controller;
use think\Controller;

class Config extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/config', 'R');
		$dir = getRelativePath();
		$request = request();
		
		$this->assign('css_id', $request->module()."_".$request->controller());
		$this->assign('dir', $dir);

    	return $this->fetch("Index");	
    }
    
    /**
	 * 首页数据列表
	 * 
	 * */
    public function data()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/config', 'R');
    	$config = Model('config')->select();

    	return json_encode(['total'=>sizeof($config), 'rows'=>$config]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/config', 'C');
    	
    	Model('config')->allowField(true)->data(input('param.'))->save();
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($config_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/config', 'U');
    	
    	$config = Model('config')->get($config_id);

    	return json_encode($config->getData());
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($config_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/config', 'U');
    	
    	Model('config')->allowField(true)->save(input('param.'), ['config_id'=>$config_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/config', 'D');
    	
    	Model('config')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
