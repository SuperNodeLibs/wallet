<?php
namespace app\wallet\controller;
use think\Controller;

class Help extends Controller
{
	/**
	 * 首页
	 * 
	 * */
    public function index()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/help', 'R');
		$dir = getRelativePath();
		$request = request();
		
		$this->assign('css_id', $request->module()."_".$request->controller());
		$this->assign('dir', $dir);

    	return $this->fetch("Index");	
    }
    
    /**
     * 添加页面
     */
    public function add(){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/help', 'R');
		$dir = getRelativePath();
		$request = request();
    	$typeList = Model('help_type')->where('parent_type_id', '0')->select();
    	
    	$this->assign('typeList', $typeList);
    	$this->assign('css_id', $request->module()."_".$request->controller());
    	$this->assign('dir', $dir);
    	return $this->fetch("Add");
    }
    /**
	 * 首页数据列表
	 * 
	 * */
    public function data()
    {
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/help', 'R');
    	$help = Model('help')->select();

    	return json_encode(['total'=>sizeof($help), 'rows'=>$help]);
    }
    
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/help', 'C');
    	
    	$help = new Help();
    	$help->type_id = input('post.type_id');
    	$help->help_title = input('post.help_title');
    	$help->help_content = input('post.content');
    	Model('help')->save($help);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($help_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/help', 'U');
		$dir = getRelativePath();
		$request = request();
    	$typeList = Model('help_type')->where('parent_type_id', '0')->select();
    	$help = Model('help')->getByHelpId($help_id);
    	
    	$this->assign('typeList', $typeList);
    	$this->assign('css_id', $request->module()."_".$request->controller());
    	$this->assign('dir', $dir);
    	$this->assign('help', $help);
    	return $this->fetch("Edit");
    }
    
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($help_id){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/help', 'U');
    	
    	$help = new Help();
    	$help->type_id = input('post.type_id');
    	$help->help_title = input('post.help_title');
    	$help->help_content = input('post.content');
    	Model('help')->save($help, ['help_id'=>$help_id]);
    	return json_encode(['status'=>'y']);
    }
    
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('index/Admin')->checkLogin();
    	Controller('index/Admin')->checkModulePerm('wallet/help', 'D');
    	
    	Model('help')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
