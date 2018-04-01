<?php
namespace app\index\model;

use think\Model;

class HelpType extends Model
{
	protected $auto = ['type_datetime'];
	
	protected function setTypeDatetimeAttr()
	{
		return date("Y-m-d H:i:s");
	}

}