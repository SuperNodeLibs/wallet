<?php
namespace app\com\controller;
use think\Controller;

class Common Extends Controller
{
	public function captcha()
	{
		
	}
	
	/**
	 * 获取多语言信息，生成js
	 */
	public function lang(){
		$this->fetch("Lang");
	}
}
?>