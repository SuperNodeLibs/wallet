<?php
namespace app\wallet\controller;
use think\Controller;

class Helptype extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/helptype', 'R');
		$dir = getRelativePath();
		$request = request();
		
		$typeList = Model('help_type')->where('parent_type_id', 0)->select();
		
		$this->assign('typeList', $typeList);
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
    	Controller('index/Admin')->checkModulePerm('wallet/helptype', 'R');
    	$helptype = Model('help_type')->select();

    	return json_encode(['total'=>sizeof($helptype), 'rows'=>$helptype]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/helptype', 'C');
    	
    	Model('help_type')->allowField(true)->data(input('param.'))->save();
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($type_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/helptype', 'U');
    	
    	$helptype = Model('help_type')->get($type_id);

    	return json_encode($helptype->getData());
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($type_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/helptype', 'U');
    	
    	Model('help_type')->allowField(true)->save(input('param.'), ['type_id'=>$type_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/helptype', 'D');
    	
    	Model('help_type')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
