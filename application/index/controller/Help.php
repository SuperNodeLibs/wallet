<?php
namespace app\index\controller;
use think\Controller;
use app\user\model\User;

class Help extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	
    	$type_list = Model('help')->getHelpList();
    	$help_info = Model('help')->getFirstHelp($type_list);

        $this->assign('dir', $dir);
        $this->assign('type_list', $type_list);
        $this->assign('help_info', $help_info);
    	return $this->fetch("Index");	
    }
    
    /**
     * 读取某个帮助信息
     */
    public function read($id)
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	
    	$type_list = Model('help')->getHelpList();
    	$help_info = Model('help')->getByHelpId($id);

        $this->assign('dir', $dir);
        $this->assign('type_list', $type_list);
        $this->assign('help_info', $help_info);
    	return $this->fetch('Help');	
    }
}