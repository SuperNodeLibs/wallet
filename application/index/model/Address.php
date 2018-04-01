<?php
namespace app\index\model;

use think\Model;

class Address extends Model
{
	protected $auto = ['address_datetime'];
	
	protected function setAddressDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}
	
}