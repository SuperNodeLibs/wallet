<?php
namespace app\index\model;

use think\Model;

class Bank extends Model
{
	protected $auto = ['bank_datetime'];
	
	protected function setBankDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}

}