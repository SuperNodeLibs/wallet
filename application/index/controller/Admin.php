<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Lang;
use think\Session;
use think\Request;

class Admin extends Controller
{   
	/**
	 * 退出
	 * 
	 * */ 
    public function logout()
    {
    	Session::delete('ADMIN_ID');
    	Session::delete('ADMIN_NAME');
    	Session::delete('ADMIN_NICKNAME');
    	Session::delete('GROUP_ID');
    	Session::delete('GROUP_NAME');
    	Session::delete('GROUP_PERMISSION');
    	$this->redirect('login');
    }
    
    /**
	 * 登录
	 * 
	 * */
    public function login()
    {
    	$dir = getRelativePath();
  		if(input('param.')){
  			$validate = Loader::validate('Admin');
	    	if(!$validate->check(input('param.'))){
			    $this->error($validate->getError());
			}
			/*if(!captcha_check(input('param.vcode'))){
				$this->error(Lang::get('LANG_INDEX_USER_LOGIN_ERRCODE'));
			}*/
  			$result = Model('admin')->checkLogin(input('param.username'), input('param.password'));
  			switch($result){
  				case config('conifg_admin.LOGIN_STATUS_NULL'):
  					$this->error(Lang::get('LANG_INDEX_USER_LOGIN_NULL'));
  				break;
  				
  				case config('conifg_admin.LOGIN_STATUS_ERRPWD'):
  					$this->error(Lang::get('LANG_INDEX_USER_LOGIN_ERRPASS'));
  				break;
  				
  				case config('conifg_admin.LOGIN_STATUS_GROUPLOCK'):
  					$this->error(Lang::get('LANG_INDEX_USER_LOGIN_GROUPLOCK'));
  				break;
  				
  				case config('conifg_admin.LOGIN_STATUS_USERLOCK'):
  					$this->error(Lang::get('LANG_INDEX_USER_LOGIN_ADMINLOCK'));
  				break;
  				
  				case config('conifg_admin.LOGIN_STATUS_OK'):
  					$AdminArray = Model('admin')->getByAdminNameEx(input('param.username'));
  					Session::set('ADMIN_ID', $AdminArray['admin_id']);
					Session::set('ADMIN_NAME', $AdminArray['admin_name']);
					Session::set('ADMIN_NICKNAME', $AdminArray['admin_nickname']);
					Session::set('GROUP_ID', $AdminArray['group_id']);
					Session::set('GROUP_NAME', $AdminArray['group_name']);
					Session::set('GROUP_PERMISSION', $AdminArray['group_permission']);
  					$this->success(Lang::get('LANG_INDEX_USER_LOGIN_OK'), '/');
  				break;
  			}
  		}
  		$this->assign('dir', $dir);
    	return $this->fetch("Login");
    }

	/**
	 * 登录检查，否则返回登录页面
	 * 
	 * */
	public function checkLogin()
	{
		if(!Session::has('ADMIN_ID')){
			$this->error(Lang::get('LANG_LOGIN_EXPIRE'), 'admin/login');
		}
	}
	
	/**
	 * 检查模块权限
	 * 
	 * @param $module 模块名称
	 * @param $act 可操作动作
	 * 
	 * */
	public function checkModulePerm($module, $act){
		$m = $this->getUserBitPerm($module);
		if($act == "C" && $m['C'] ==0 )
			$this->error(Lang::get('LANG_PAGE_POP_PERM_ADD'));
		if($act == "U" && $m['U'] ==0 )
			$this->error(Lang::get('LANG_PAGE_POP_PERM_EDIT'));
		if($act == "R" && $m['R'] ==0 )
			$this->error(Lang::get('LANG_PAGE_INDEX_PERM_READ'));
		if($act == "D" && $m['D'] ==0 )
			$this->error(Lang::get('LANG_PAGE_POP_PERM_DEL'));
	}
	
	/**
	 * 根据字节位，获得相关权限，mid为菜单的id，act为相关动作，支持字符CURD四个
	 * 
	 * @param $tab 
	 */
	public function getUserBitPerm($tab){
		$r_data = array('C'=>0, 'U'=>0, 'R'=>0, 'D'=>0);
		$find = false;
		$id_list = array();
		$s_menu = Session::get('GROUP_PERMISSION');
		//权限格式：菜单ID:菜单权限位;
		//权限说明：菜单权限位是CURD格式的二进制代码，最高15;
		$s_menu_array = explode(";", $s_menu);
		foreach($s_menu_array as $s_m){
			if(trim($s_m)=="") continue;
			$s_m_a = explode(":", $s_m);
			$menu_id = $s_m_a[0];
			$menu_permission = $s_m_a[1];
			array_push($id_list, array($menu_id, $menu_permission));
		}
		//根据表名，获得菜单ID
		$m = Model('index/Menu')->where('menu_url = "'.$tab.'"')->find();

		foreach($id_list as $id)
			if($id[0] == $m['menu_id']){$find = true; break;}
		if($find)
		{
			
			$r_data['C'] = ($id[1] & 8)>>3;
			$r_data['U'] = ($id[1] & 4)>>2;
			$r_data['R']  = ($id[1] & 2)>>1;
			$r_data['D']  = ($id[1] & 1)>>0;
		}
		return $r_data;
	}
	
	/**
	 * 根据顶级菜单ID获取用户目录
	 * 
	 * @param $topid 父菜单ID 
	 */
	public function getUserMenuAuto($topid){
		$get_menu_array = array();
		$id_list = array();
		$s_menu = Session::get('GROUP_PERMISSION');
		//权限格式：菜单ID:菜单权限位;
		//权限说明：菜单权限位是CURD格式的二进制代码，最高15;
		$s_menu_array = explode(";", $s_menu);
		$Menu = Model('Menu');
		foreach($s_menu_array as $s_m){
			if(trim($s_m)=="") continue;
			$s_m_a = explode(":", $s_m);
			$menu_id = $s_m_a[0];
			$menu_permission = $s_m_a[1];
			array_push($id_list, $menu_id);
		}
		$where_in = sizeof($id_list)>0?join(",", $id_list):0;
		$sel_menu_array = $Menu->where('menu_id in(' . $where_in . ') and menu_hide=0 and menu_parent='.$topid )->order('menu_order desc')->select();
		foreach($sel_menu_array as $sel_menu){
			if($g = $this->getUserMenuAuto($sel_menu['menu_id']))
				$sel_menu['menu_datetime'] = $g;
				
			array_push($get_menu_array, $sel_menu);
		}

		return $get_menu_array;
	}
	/**
	 * 首页
	 * 
	 * */
	public function index()
    {
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/admin', 'R');
		$dir = getRelativePath();
		
		$request = request();
		$group = Model('group')->select();
		
		$this->assign('css_id', $request->module()."_".$request->controller());
		$this->assign('group', $group);
		$this->assign('dir', $dir);
    	return $this->fetch("Index");	
    }
    /**
	 * 首页数据列表
	 * 
	 * */
    public function data()
    {
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/admin', 'R');
    	$admin = Model('Admin')->field(array('admin_pass'), true)->select();
	
    	return json_encode(['total'=>sizeof($admin), 'rows'=>$admin]);
    }
    /**
	 * 添加数据
	 * 
	 * */
    public function addAction(){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/admin', 'C');
    	$data = input('param.');
    	$data['admin_pass'] = md5($data['admin_pass']);
    	Model('Admin')->data($data)->allowField(true)->save();
    	return json_encode(['status'=>'y']);
    }
    /**
	 * 修改数据绑定信息
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function edit($admin_id){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/admin', 'U');
    	
    	$admin = Model('Admin')->get($admin_id);

    	return json_encode($admin->getData());
    }
    /**
	 * 修改数据
	 * 
	 * @param $admin_id 管理员ID
	 * */
    public function editAction($admin_id){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/admin', 'U');
    	
    	$data = input('param.');
    	$data['admin_pass'] = md5($data['admin_pass']);
    	Model('Admin')->allowField(true)->save($data, ['admin_id'=>$admin_id]);
    	return json_encode(['status'=>'y']);
    }
    /**
	 * 删除数据
	 * 
	 * @param $ids 删除数据的列表
	 * */
    public function delAction($ids){
    	Controller('Admin')->checkLogin();
    	Controller('Admin')->checkModulePerm('index/admin', 'D');
    	
    	Model('Admin')->destroy($ids);
    	return json_encode(['status'=>'y']);
    }
}
