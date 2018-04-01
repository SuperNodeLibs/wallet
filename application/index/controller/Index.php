<?php
namespace app\index\controller;
use think\Controller;
use think\Lang;
use think\Session;
use app\user\model\User;

class Index extends Controller
{
    public function index()
    {
    	//Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
        // var_dump(Lang::get('MAIN_TITLE'));
        
        $this->assign('dir', $dir);
    	if(!Session::has('USER_ACCOUNT')){
    		return $this->redirect('/login');
    	}else{
    		$this->assign('title', Lang::get('MAIN_TITLE'));
    		return $this->fetch("Index");
    	}	
    }
    
}
