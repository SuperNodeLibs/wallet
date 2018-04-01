<?php
namespace app\index\model;

use think\Model;

class ExchangeInfo extends Model
{
	protected $auto = ['info_datetime'];
	
	protected function setInfoDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
	/**
	 * 一对一关联银行信息
	 */
	public function bank(){
		return $this->hasOne('bank', 'bank_id', 'bank_id')->field('bank_name');
	}
	
	/**
	 * 获取充值信息
	 */
	public function getCZInfo($account, $bank){
		$info = $this->where(array('user_account'=>$account, 'bank_id'=>$bank))->find();
		
		return $info;
	}
	
	/**
	 * 获取银行账户信息
	 * @param $account 账号
	 */
	public function getBankInfoList($account){
		$allArray = array();
		$mainList = $this->where('user_account', $account)->select();
		foreach($mainList as $m){
			$data = $m->data;
			$data['bank_name'] = $m->bank->bank_name;
			
			$assetList = Model('asset')->where('asset_id', 'in', $data['asset_id'])->select();
			$assetArray = array();
			foreach($assetList as $a){
				$assetArray[] = $a['asset_code'];
			}
			$data['asset_list'] = join(',', $assetArray);
			$allArray[] = $data;
		}
		
		return $allArray;
	}
}