<?php
namespace app\user\controller;

use think\Controller;
use think\Request;
use think\View;
use think\Loader;
use think\Lang;
use mail\Sendmail;
use think\Session;
use app\config\Config;

class Myget extends Controller
{

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $dir = getRelativePath();
        $this->assign('dir', $dir);
        return $this->fetch("user/Myget");
    }
    
	
}

	