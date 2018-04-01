<?php
namespace app\index\model;
use think\Session;
use think\Model;

class Gateway extends Model
{
	protected $auto = ['gateway_datetime'];
	
	protected function setGatewayDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
	/**
	 * 根据资产获取相应充值方式
	 */
	public function getCZType($account, $asset){
		$asset_info = Model('asset')->where(array('asset_code'=>$asset, 'asset_issuer'=>$account))->find();
		$infolist = Model('exchange_info')->where("FIND_IN_SET(".$asset_info['asset_id'].", `asset_id`)")->select();
		//查询支持的银行
		$bank_ids = array();//银行ID数组
		foreach($infolist as $info){
			$in = $info->data;
			$bank_ids[] = $in['bank_id'];
		}
		//查询银行名称
		$banklist = Model('bank')->where('bank_id', 'in', $bank_ids)->select();
		
		return $banklist;
	}
	
	/**
	 * 根据资产获取相应提现方式
	 */
	public function getTXType($account, $asset){
		$asset_info = Model('asset')->where(array('asset_code'=>$asset, 'asset_issuer'=>$account))->find();
		$infolist = Model('exchange_info')->where("FIND_IN_SET(".$asset_info['asset_id'].", `asset_id`)")->select();
		//查询支持的银行
		$bank_ids = array();//银行ID数组
		foreach($infolist as $info){
			$in = $info->data;
			$bank_ids[] = $in['bank_id'];
		}
		//查询银行名称
		$banklist = Model('bank')->where('bank_id', 'in', $bank_ids)->select();
		
		return $banklist;
	}
	
	/**
	 * 获取网关自己发行的资产供充值、提现使用
	 * @param ifsel 是否只显示自己发行的资产
	 */
	public function getPublicGatewaySelf($ifsel){
		$allGateway = array();
		$gateway = $this->where("gateway_status", config('gw_status.GW_STATUS_ALLOW'))->select();
		foreach($gateway as $gw){
			$data = $gw->data;
			$where = array('gateway_id'=> $data['gateway_id']);
			if($ifsel)
				$where['asset_issuer'] = $data['gateway_account'];
			//获取发行的资产列表
			$gate_asset = Model('asset')->where($where)->select();
			$sub = array();
			foreach($gate_asset as $asset){
				$ass = $asset->data;
				$sub[] = $ass;
			}
			$data['gateway_asset'] = $sub;
			
			$allGateway[] = $data;
		}
		
		return $allGateway;
	}
	/**
	 * 获取公开的网关
	 * 
	 * @param $limit 网关数量，为0获取所有
	 */
	public function getPublicGateway($limit)
	{
		$allGateway = array();
		if($limit >0)
			$gateway = $this->where("gateway_status", config('gw_status.GW_STATUS_ALLOW'))->limit($limit)->select();
		else
			$gateway = $this->where("gateway_status", config('gw_status.GW_STATUS_ALLOW'))->select();
		foreach($gateway as $gw){
			$data = $gw->data;
			$gate_asset = Model('asset')->where('gateway_id', $data['gateway_id'])->select();
			$sub = array();
			foreach($gate_asset as $asset){
				$ass = $asset->data;
				$sub[] = $ass;
			}
				
			$data['gateway_asset'] = $sub;
			$service = array();
			$sArray = explode(";", $data['gateway_service']);

			foreach($sArray as $s){
				$group = explode(":", $s);
				if(sizeof($group) !=2) continue;//没有内容
				$ser['qq'] = $group[0];
				$ser['name'] = $group[1];
				$service[] = $ser;
			}
			$data['gateway_service'] = $service;
			if(sizeof($sub) >0)//只有网关发行有资产时候才显示当前网关
				$allGateway[] = $data;
		}

		return $allGateway;
	}
	
	/**
	 *获取网关以及资产列表 
	 */
	public function getGatewayAsset($account)
	{
		$allData = array();
		$gateway = $this->getByGatewayAccount($account);
		$allData = $gateway->data;
		$asset = Model('asset')->where('asset_issuer', $account)->select();
		$assArray = array();
		foreach($asset as $ass){
			$assArray[] = $ass->data;
		}
		$allData['gateway_asset'] = $assArray;

		return $allData;
	}
	
	/**
	 *获取网关以及资产列表 
	 */
	public function getGatewayAssetById($id)
	{
		$allData = array();
		$gateway = $this->getByGatewayId($id);
		$allData = $gateway->data;
		$asset = Model('asset')->where('gateway_id', $id)->select();
		$assArray = array();
		foreach($asset as $ass){
			$assArray[] = $ass->data;
		}
		$allData['gateway_asset'] = $assArray;

		return $allData;
	}
}