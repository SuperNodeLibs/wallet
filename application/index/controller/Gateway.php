<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\user\model\User;

class Gateway extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	if(input('post.')){
    		Model('gateway')->allowField(true)->save(input('post.'));
    		$this->redirect('/gateway');
    	}
    	$gateway = Model('gateway')->getPublicGateway(10);
    	$mygateway = Model('gateway')->getByGatewayAccount(Session::get('USER_ACCOUNT'));//查询我的网关状态
        $this->assign('dir', $dir);
        $this->assign('gateway', $gateway);
        $this->assign('mygateway', $mygateway);
    	return $this->fetch("Index");	
    }
    
    /**
     *获取网关信息
     * @param  $account 网关账号 
     */
    public function data($account)
    {
    	Controller("user/user")->checkLoginStatus();
    	$ass = Model('asset')->getByAssetIssuer($account);

    	$asset = Model('gateway')->getGatewayAssetById($ass->gateway_id);
    	
    	return json_encode($asset);
    }
    
    /**
     *根据所有账号获取网关信息
     * @param  $account 网关账号，多个以，号分割 
     */
    public function alldata()
    {
    	Controller("user/user")->checkLoginStatus();
    	$allIssuer = input('post.issuer/a');
    	$allAsset = input('post.asset/a');
    	$allBalance = input('post.balance/a');
    	$gateway_list = Model('asset')->getGatewayAndAsset($allAsset, $allIssuer, $allBalance);
    	
    	
    	return json_encode($gateway_list);
    }
    
    /**
     * 检查网关名称是否存在
     */
    public function checkGatewayName($name){
    	Controller("user/user")->checkLoginStatus();
    	return Model('gateway')->getByGatewayName($name)? "true":"false";
    }
    

}