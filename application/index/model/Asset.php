<?php
namespace app\index\model;

use think\Model;

class Asset extends Model
{
	protected $auto = ['asset_datetime'];
	
	protected function setAssetDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
	/*
	 * 获取相关资产的网关信息以及资产信息
	 */
	public function getGatewayInfo($assetArray, $issuerArray, $typeArray){
		$allData = array();
		for($i = 0; $i < sizeof($assetArray); $i++){
			$a = $this->where(array('asset_issuer'=>$issuerArray[$i], 'asset_code'=>$assetArray[$i]))->find();
			
			$gw = Model('gateway')->getByGatewayId($a['gateway_id']);
			$allData[] = $gw;
		}
		return array('asset'=>$assetArray, 'issuer'=>$issuerArray, 'type'=>$typeArray, 'gateway'=>$allData);
	}
	
	/*
	 * 获取相关资产的网关信息以及资产信息
	 */
	public function getGatewayAndAsset($assetArray, $issuerArray, $balanceArray){
		$allData = array();
		for($i = 0; $i < sizeof($assetArray); $i++){
			$a = $this->where(array('asset_issuer'=>$issuerArray[$i], 'asset_code'=>$assetArray[$i]))->find();
			
			if($a){
				$gw = Model('gateway')->getByGatewayId($a['gateway_id']);
				if(!array_key_exists($a['gateway_id'], $allData))
					$allData[$a['gateway_id']] = $gw->data;
				$allData[$a['gateway_id']]['asset'][] = $assetArray[$i];
				$allData[$a['gateway_id']]['issuer'][] = $issuerArray[$i];
				$allData[$a['gateway_id']]['balance'][] = $balanceArray[$i];
			}
			else{
				$allData['0']['asset'][] = $assetArray[$i];
				$allData['0']['issuer'][] = $issuerArray[$i];
				$allData['0']['balance'][] = $balanceArray[$i];
			}
		}
		// 去掉网关ID
		$retData = array();
		foreach($allData as $val){
			$retData[] = $val;
		}
		return $retData;
	}
}