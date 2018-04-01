<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\user\model\User;

class Esports extends Controller{
	public function index(){
		Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	$this->assign('dir', $dir);
		return $this->fetch("Index");
	}
}
?>