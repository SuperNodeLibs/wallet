<?php
namespace app\index\controller;
use think\Controller;
use think\Lang;
use think\Session;
use app\user\model\User;

class GatewayCenter extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	
		if(input('post.')){
			$account = Session::get('USER_ACCOUNT');
    		Model('gateway')->allowField(true)->save(input('post.'), ['gateway_account'=>$account]);
    		$this->redirect('/gatewayCenter');
    	}
    	$mygateway = Model('gateway')->getByGatewayAccount(Session::get('USER_ACCOUNT'));//查询我的网关状态
    	//获取网关的资产
    	$assetlist = Model('asset')->where('gateway_id', $mygateway->gateway_id)->paginate(7, false, ['var_page'=>'assetpage']);
    	//获取充值，充值是网关作为源，将相应资产发给相关用户
    	$incharge = Model('exchange_record')->getInCharge(Session::get('USER_ACCOUNT'));
    	//获取提现，提现是网关作为目标，接收相应用户的资产
    	$outcharge = Model('exchange_record')->getOutCharge(Session::get('USER_ACCOUNT'));
    	//获取银行列表
    	$banklist = Model('bank')->select();
    	//获得我的账户列表
    	$accountlist = Model('exchange_info')->getBankInfoList(Session::get('USER_ACCOUNT'));
    	//获取我发行的资产
    	$myassetlist = Model('asset')->where('asset_issuer', Session::get('USER_ACCOUNT'))->select();

        $this->assign('dir', $dir);
        $this->assign('mygateway', $mygateway);
        $this->assign('assetlist', $assetlist);
        $this->assign('page0', $assetlist->render());
        $this->assign('incharge', $incharge['data']);
        $this->assign('total1', $incharge['total']);
        $this->assign('undeal1', $incharge['undeal']);
        $this->assign('page1', $incharge['render']);
        $this->assign('outcharge', $outcharge['data']);
        $this->assign('total2', $outcharge['total']);
        $this->assign('undeal2', $outcharge['undeal']);
        $this->assign('page2', $outcharge['render']);
        $this->assign('banklist', $banklist);
        $this->assign('accountlist', $accountlist);
        $this->assign('myassetlist', $myassetlist);
    	return $this->fetch("Index");	
    }
    
    /**
     * 支付信息内容提交
     */
    public function bankManage(){
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	if(input('post.')){
			$account = Session::get('USER_ACCOUNT');
			$info = new ExchangeInfo();
			$info->user_account =Session::get('USER_ACCOUNT');
			$info->bank_id = input('post.bank_id');
			$info->bank_account = input('post.bank_account');
			$info->bank_member =input('post.bank_member');
			$info->bank_ext = input('post.bank_ext');
			$info->info_comment = input('post.info_comment');
			$info->asset_id	= join(',', input('post.asset_id/a'));//接收数组需要加/a参数
    		Model('exchange_info')->save($info);
    		$this->redirect('/gatewayCenter');
    	}

    	$this->redirect('/gatewayCenter');
    }
    
    /**
     * 判断当前资产名称是否重复，同一个网关即使给不同客户发行资产也不能代码重复
     */
    public function checkAssetCount($assetCode){
    	Controller("user/user")->checkLoginStatus();
    	$gateway = Model('gateway')->getByGatewayAccount(Session::get('USER_ACCOUNT'));
		//检查当前网关是否发行了同名资产
		$c = Model('asset')->where(array('asset_code'=>strtoupper($assetCode), 'gateway_id'=>$gateway['gateway_id']))->count();
		return json_encode(['count'=>$c]);
    }
    
    /**
     * 判断当前资产名称是否重复，所有网关不能重复
     */
    public function checkAllAssetCount($assetCode){
    	Controller("user/user")->checkLoginStatus();
		//检查当前网关是否发行了同名资产
		$c = Model('asset')->where(array('asset_code'=>strtoupper($assetCode)))->count();
		return json_encode(['count'=>$c]);
    }
    
    /**
     * 资产发行
     */
    public function assetManage(){
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	if(input('post.')){
    		$gateway = Model('gateway')->getByGatewayAccount(Session::get('USER_ACCOUNT'));
    		//检查当前网关是否发行了同名资产
    		$c = Model('asset')->where(array('asset_code'=>strtoupper(input('post.asset_code')), 'gateway_id'=>$gateway['gateway_id']))->count();
    		if($c >0){
    			//具有同名资产
    			$this->error(Lang::get('APP_GATEWAY_MULT_ASSET'));
    		}else{
    			$account = Session::get('USER_ACCOUNT');
				$asset = new Asset();
				$asset->asset_issuer = input('post.asset_issuer')? input('post.asset_issuer') : Session::get('USER_ACCOUNT');
				$asset->asset_code = strtoupper(input('post.asset_code'));
				$asset->asset_amount = input('post.zc')=="1"?input('post.asset_amount'):0;
				$asset->asset_price = input('post.zc')=="0"?input('post.asset_price'):0;
				$asset->asset_date = date('Y-m-d H:i:s');
				$asset->asset_desc = input('post.asset_desc');
				
				$asset->gateway_id	= $gateway['gateway_id'];
	    		Model('asset')->save($asset);
	    		$this->redirect('/gatewayCenter');
    		}
			
    	}

    	$this->redirect('/gatewayCenter');
    }
    
    /**
     * 获取指定网关特定资产的价格
     * @param code 资产代码
     * @param issuer 发行方（网关）
     */
    public function huilv($code, $issuer){
    	Controller("user/user")->checkLoginStatus();
    	$asset = Model('asset')->where(array('asset_issuer'=>$issuer, 'asset_code'=>$code))->find();
    	return json_encode($asset);
    }
    
    /**
     * 支付信息删除
     */
    public function bankdel($id){
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	Model('exchange_info')->where(array('user_account'=>Session::get('USER_ACCOUNT'), 'info_id'=>$id))->delete();
    	$this->redirect('/gatewayCenter');
    }
    
    /*
     * 获取充值详情
     * @param id 充值的ID
     */
    public function czxqData($id){
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	$data = Model('exchange_record')->getInDetail(Session::get('USER_ACCOUNT'), $id);
    
    	return json_encode($data);
    }
    
    /*
     * 获取提现详情
     * @param id 充值的ID
     */
    public function txxqData($id){
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	$data = Model('exchange_record')->getOutDetail(Session::get('USER_ACCOUNT'), $id);
    
    	return json_encode($data);
    }
    
    /**
     * 设置支付
     */
    public function czxqPay($id){
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	Model('exchange_record')->save(array('record_status'=>2), array('record_id'=>$id, 'user_account_src'=>Session::get('USER_ACCOUNT')));
    	
    }
    
    /**
     * 设置提现
     */
    public function txxqPay($id){
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	Model('exchange_record')->save(array('record_status'=>2), array('record_id'=>$id, 'user_account_obj'=>Session::get('USER_ACCOUNT')));
    	
    }
}
?>