<?php
namespace app\wallet\controller;
use think\Controller;

class Exchangerecord extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/exchangerecord', 'R');
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
    	Controller('index/Admin')->checkModulePerm('wallet/exchangerecord', 'R');
    	$record = Model('exchange_record')->select();

    	return json_encode(['total'=>sizeof($record), 'rows'=>$record]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/exchangerecord', 'C');
    	
    	Model('exchange_record')->allowField(true)->data(input('param.'))->save();
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($record_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/exchangerecord', 'U');
    	
    	$record = Model('exchange_record')->get($record_id);

    	return json_encode($record->getData());
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($record_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/exchangerecord', 'U');
    	
    	Model('exchange_record')->allowField(true)->save(input('param.'), ['record_id'=>$record_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/exchangerecord', 'D');
    	
    	Model('exchange_record')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
