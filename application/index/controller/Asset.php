<?php
namespace app\index\controller;
use think\Controller;
use app\user\model\User;

class Asset extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	
    	$gateway = Model('gateway')->getPublicGateway(10);
    	
        $this->assign('dir', $dir);
        $this->assign('gateway', $gateway);
    	return $this->fetch("Index");	
    }
    
    /**
     * 获取所有限量发行的资产列表
     */
    public function getAllLimitAsset(){
    	header('Access-Control-Allow-Origin:*');  //便于行情跨站访问
    	$allData = Model('asset')->where('asset_amount', '>', '0')->select();
    	return json($allData);
    }
    
    /**
     * 获取指定资产的发行量
     * @param code 资产代码
     * @param issuer 发行方
     */
    public function getIssuerAmount($code, $issuer){
    	$allData = Model('asset')->where(array('asset_issuer'=>$issuer, 'asset_code'=>$code))->find();
    	return json($allData);
    }
}