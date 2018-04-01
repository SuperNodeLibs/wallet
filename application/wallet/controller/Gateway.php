<?php
namespace app\wallet\controller;
use think\Controller;

class Gateway extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/gateway', 'R');
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
    	Controller('index/Admin')->checkModulePerm('wallet/gateway', 'R');
    	$gateway = Model('gateway')->select();

    	return json_encode(['total'=>sizeof($gateway), 'rows'=>$gateway]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/gateway', 'C');
    	
    	Model('gateway')->allowField(true)->data(input('param.'))->save();
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($gateway_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/gateway', 'U');
    	
    	$gateway = Model('gateway')->get($gateway_id);

    	return json_encode($gateway->getData());
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($gateway_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/gateway', 'U');
    	
    	Model('gateway')->allowField(true)->save(input('param.'), ['gateway_id'=>$gateway_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/gateway', 'D');
    	
    	Model('gateway')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
