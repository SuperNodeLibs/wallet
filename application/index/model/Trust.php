<?php
namespace app\index\model;

use think\Model;

class Trust extends Model
{
	protected $auto = ['trust_datetime'];
	
	protected function setTrustDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}

}