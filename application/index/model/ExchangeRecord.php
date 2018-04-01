<?php
namespace app\index\model;

use think\Model;

class ExchangeRecord extends Model
{
	protected $auto = ['record_datetime'];
	
	protected function setRecordDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}

	public function asset(){
		return $this->hasOne('asset','asset_id','asset_id');
	}
	
	public function info(){
		return $this->hasOne('exchange_info', 'info_id', 'info_id');
	}
	
	public function bank($id){
		return Model('bank')->get($id);
	}
	public function getRecordStatusAttr($value)
	{
		return config('record_status')[$value];
	}
	
	/**
	 * 获得充值详情
	 */
	public function getInDetail($account, $id)
	{
		$allArray = array();
		$data = $this->where(array('user_account_src'=>$account, 'record_id'=>$id))->find();
		$allArray = $data->data;
		$allArray['asset'] = $data->asset->data;
		$allArray['status'] = $this->getRecordStatusAttr($allArray['record_status']);
		$allArray['info'] = $data->info->data;
		$allArray['bank'] = $this->bank($data->info->bank_id);
		return $allArray;
	}
	
	/*
	 * 根据用户获取所有记录信息
	 */
	public function getAllExchange($account)
	{
		$allArray = array();
		$data = $this->where('user_account_obj|user_account_src|user_account', $account)->order('record_datetime desc')->paginate(8);
		foreach($data as $d){
			$m = $d->data;
			if($d->asset)
				$m['asset'] = $d->asset->data;
			$m['status'] = $this->getRecordStatusAttr($m['record_status']);
			$m['dir'] = $m['user_account_obj'] == $account? "充值" : "提现";
			$m['dt'] = explode(" ", $m['record_datetime']);
			$allArray[] = $m;
		}
		return array('page'=>$data->render(), 'data'=>$allArray);
	}
	/**
	 * 获得提现详情
	 */
	public function getOutDetail($account, $id)
	{
		$allArray = array();
		$data = $this->where(array('user_account_obj'=>$account, 'record_id'=>$id))->find();
		$allArray = $data->data;
		$allArray['asset'] = $data->asset->data;
		$allArray['status'] = $this->getRecordStatusAttr($allArray['record_status']);
		$allArray['info'] = $data->info->data;
		$allArray['bank'] = $this->bank($data->info->bank_id);
		return $allArray;
	}
	
	/**
	 * 获取充值列表
	 * @param $gw_account 网关账号
	 */
	public function getInCharge($gw_account)
	{
		$allArray = array();
		$data = Model('exchange_record')->where('user_account_src', $gw_account)->paginate(8, false, ['var_page'=>'inpage']);
		$undeal = Model('exchange_record')->where(array('user_account_src'=>$gw_account, 'record_status'=>0))->count();

		foreach($data as $d){
			$m = $d->data;
			if($d->asset)
				$m['asset'] = $d->asset->data;
			$m['status'] = $this->getRecordStatusAttr($m['record_status']);
			$allArray[] = $m;
		}

		return array('render'=>$data->render(), 'data'=>$allArray, 'total'=>$data->total(), 'undeal'=>$undeal);
	}
	
	/**
	 * 获取提现列表
	 * @param $gw_account 网关账号
	 */
	public function getOutCharge($gw_account)
	{
		$allArray = array();
		$data = Model('exchange_record')->where('user_account_obj', $gw_account)->paginate(8, false, ['var_page'=>'outpage']);
		$undeal = Model('exchange_record')->where(array('user_account_obj'=>$gw_account, 'record_status'=>0))->count();
		
		foreach($data as $d){
			$m = $d->data;
			if($d->asset)
				$m['asset'] = $d->asset->data;
			$m['status'] = $this->getRecordStatusAttr($m['record_status']);
			$allArray[] = $m;
		}

		return array('render'=>$data->render(), 'data'=>$allArray, 'total'=>$data->total(), 'undeal'=>$undeal);
	}
}