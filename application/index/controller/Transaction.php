<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\user\model\User;

class Transaction extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();

    	$gateway = Model('gateway')->getPublicGateway(10);
    	$mygateway = Model('gateway')->getByGatewayAccount(Session::get('USER_ACCOUNT'));//查询我的网关状态

        $this->assign('dir', $dir);
        $this->assign('gateway', $gateway);
        $this->assign('mygateway', $mygateway);
    	return $this->fetch("Index");	
    }
    
    /*
     * 获取相应资产的网关信息
     */
    public function convert(){
    	Controller("user/user")->checkLoginStatus();
    	$assetArray = input('post.asset/a');
    	$issuerArray = input('post.issuer/a');
    	$typeArray = input('post.type/a');

    	$all = Model('asset')->getGatewayInfo($assetArray, $issuerArray, $typeArray);

    	return json_encode($all);
    }

    /*
     * 获取相应资产的网关信息
     */
    public function getMyissueAsset(){
        Controller("user/user")->checkLoginStatus();
        $issuer=input('post.issuer');
        $asset=Model('asset')->where(array('asset_issuer'=>$issuer))->select();
        if($asset){
        $gateway=Model('gateway')->where(array('gateway_account'=>$issuer))->select();
        $getway_name=$gateway[0]['gateway_name'];
        $assetArray[]="";
        for($i=0;$i<count($asset);$i++){
             $assetArray[$i]['getway_name']=$getway_name;
             $assetArray[$i]['asset_code']=$asset[$i]['asset_code'];
        }
        return json_encode($assetArray); 
        }else{
            return;
        }
    }
    /*
     * 通过接口获得私钥
     */
    public function getSrc(){
    	$account=input('post.dstAccount');
    	$url='http://www.superiex.com/api/getSrc?account='.$account;
    	//通过api获得私钥
    	$ch=  curl_init();//初始化
    	//设置选项
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	$output=curl_exec($ch);
    	curl_close($ch);
    	$result=$output;
    	if($result){
    		return json_decode($result,true);
    	}else{
    		return [];
    	}
    }

    
}