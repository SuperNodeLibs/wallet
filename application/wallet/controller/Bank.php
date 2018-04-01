<?php
namespace app\wallet\controller;
use think\Controller;

class Bank extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/bank', 'R');
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
    	Controller('index/Admin')->checkModulePerm('wallet/bank', 'R');
    	$bank = Model('bank')->select();

    	return json_encode(['total'=>sizeof($bank), 'rows'=>$bank]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/bank', 'C');
    	
    	Model('bank')->allowField(true)->data(input('param.'))->save();
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($bank_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/bank', 'U');
    	
    	$bank = Model('bank')->get($bank_id);

    	return json_encode($bank->getData());
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($bank_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/bank', 'U');
    	
    	Model('bank')->allowField(true)->save(input('param.'), ['bank_id'=>$bank_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/bank', 'D');
    	
    	Model('bank')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
