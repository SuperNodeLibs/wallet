<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\user\model\User;

class Exchange extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	if(input('post.')){
    		Model('gateway')->allowField(true)->save(input('post.'));
    		$this->redirect('/gateway');
    	}
    	$gateway = Model('gateway')->getPublicGatewaySelf(true);
    	$allExchange = Model('exchange_record')->getAllExchange(Session::get('USER_ACCOUNT'));
    	
        $this->assign('dir', $dir);
        $this->assign('gateway', $gateway);
		$this->assign('allExchange', $allExchange['data']);
		$this->assign('page', $allExchange['page']);
    	return $this->fetch("Index");	
    }
    
    /**
     *获取网关发行的资产列表
     * @param  $account 网关账号 
     */
    public function data($account)
    {
    	Controller("user/user")->checkLoginStatus();
    	$ass = Model('asset')->where('asset_issuer', $account)->select();
    	
    	return json_encode($ass);
    }
    
    /**
     * 检查网关名称是否存在
     */
    public function checkGatewayName($name){
    	Controller("user/user")->checkLoginStatus();
    	return Model('gateway')->getByGatewayName($name)? "true":"false";
    }
    
    /**
     * 根据指定的资产获取充值类型
     */
    public function cxtype($account, $asset){
    	Controller("user/user")->checkLoginStatus();
    
    	return json_encode(Model('gateway')->getCZType($account, $asset));	
    }
    
    /**
     * 根据指定的资产获取提现类型
     */
    public function txtype($account, $asset){
    	Controller("user/user")->checkLoginStatus();
    
    	return json_encode(Model('gateway')->getTXType($account, $asset));	
    }
    
    /**
     * 获取充值信息 
     */
    public  function cxinfo($account, $bank){
    	Controller("user/user")->checkLoginStatus();
    
    	return json_encode(Model('exchange_info')->getCZInfo($account, $bank));	
    }
    
    /**
     * 提交充值申请
     */
    public function czsave(){
    	if(input('post.')){
    		//查询资产ID
    		$assetInfo = Model('asset')->where(array('asset_code'=>input('post.asset'), 'asset_issuer'=>input('post.gateway_account')))->find();
    		//查询信息ID
    		$exchangeInfo = Model('exchange_info')->where(array('user_account'=>input('post.gateway_account'), 'bank_id'=>input('post.type')))->find();
    		$info = new ExchangeRecord();
			$info->user_account_src = input('post.gateway_account');
			$info->user_account_obj = input('post.account_obj');
			$info->user_account = Session::get('USER_ACCOUNT');
			$info->info_id = $exchangeInfo['info_id'];
			$info->asset_id = $assetInfo['asset_id'];
			$info->record_amount = input('post.amount');
			$info->record_status = 0;
			$info->record_start =date("Y-m-d H:i:s");
    		Model('exchange_record')->save($info);
    		return json_encode(['status'=>'y']);
    	}else{
    		return json_encode(['status'=>'n']);
    	}
    }
    
    /**
     * 提交提现申请
     */
    public function txsave(){
    	if(input('post.')){
    		//查询资产ID
    		$assetInfo = Model('asset')->where(array('asset_code'=>input('post.asset'), 'asset_issuer'=>input('post.issuer')))->find();
    		//写入信息ID
    		$einfo = new ExchangeInfo();
    		$einfo->user_account = input('post.account');
    		$einfo->bank_id = input('post.bank_id');
    		$einfo->bank_member = input('post.bank_member');
    		$einfo->bank_account = Session::get('USER_ACCOUNT');
    		$einfo->bank_ext = input('post.bank_ext');
    		$einfo->asset_id = $assetInfo['asset_id'];
    		Model('exchange_info')->save($einfo);

			$id = Model('exchange_info')->db()->getLastInsID();
			
    		$info = new ExchangeRecord();
			$info->user_account_src = input('post.account_src');
			$info->user_account_obj = input('post.gateway_account');
			$info->user_account = Session::get('USER_ACCOUNT');
			$info->info_id = $id;
			$info->asset_id = $assetInfo['asset_id'];
			$info->record_amount = input('post.amount');
			$info->record_status = 1;//处理中
			
    		Model('exchange_record')->save($info);
    		return json_encode(['status'=>'y']);
    	}else{
    		return json_encode(['status'=>'n']);
    	}
    }
}