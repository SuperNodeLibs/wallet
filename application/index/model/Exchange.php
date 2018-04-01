<?php
namespace app\index\model;
use think\Session;
use think\Model;

class Exchange extends Model
{
	protected $auto = ['record_datetime'];
	
	protected function setRecordDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
	/**
	 * 获取公开的网关
	 * 
	 * @param $limit 网关数量
	 */
	public function getPublicGateway($limit)
	{
		$allGateway = array();
		$gateway = $this->where("gateway_status", config('gw_status.GW_STATUS_ALLOW'))->limit($limit)->select();
		foreach($gateway as $gw){
			$data = $gw->data;
			$gate_asset = Model('asset')->where('gateway_id', $data['gateway_id'])->select();
			$sub = array();
			foreach($gate_asset as $asset){
				$ass = $asset->data;
				/*信任关系读取区块链内容
				 * $c = Model('trust')->where(array('user_account'=>Session::get('USER_ACCOUNT'), 'asset_id'=>$ass['asset_id']))->count();
				$ass['is_trust'] = $c? 1:0;*/
				$sub[] = $ass;
			}
				
			$data['gateway_asset'] = $sub;
			$service = array();
			$sArray = explode(";", $data['gateway_service']);
			foreach($sArray as $s){
				$group = explode(":", $s);
				$ser['qq'] = $group[0];
				$ser['name'] = $group[1];
				$service[] = $ser;
			}
			$data['gateway_service'] = $service;
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