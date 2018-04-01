<?php
namespace app\index\controller;
use think\Controller;
use app\user\model\User;
use phpqrcode\qrencode;

class Member extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();

        $this->assign('dir', $dir);
        
    	return $this->fetch("Index");	
    }
    

}