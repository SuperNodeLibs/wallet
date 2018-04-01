<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\user\model\User;

class Account extends Controller
{
    public function index()
    {
    	Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	if(input('post.')){
    		$Address = new Address();
    		$Address->user_id = Session::get('USER_ID');
    		$Address->address_name = input('post.address_name');
    		$Address->address_account = input('post.address_account');
    		if(input('post.address_id')){
    			//更新
    			Model('address')->save($Address, ['address_id'=>input('post.address_id')]);
    		}else{
    			Model('address')->save($Address);
    		}
    	}
    	$address = Model('address')->where('user_id', Session::get('USER_ID'))->paginate(7);
    	
        $this->assign('dir', $dir);
        $this->assign('address', $address);
        $this->assign('page', $address->render());
    	return $this->fetch("Index");	
    }
    
    /*
     * 删除地址本
     */
    public function del($id){
    	Controller("user/user")->checkLoginStatus();
    	Model('address')->where(['address_id'=>$id, 'user_id'=>Session::get('USER_ID')])->delete();
    	$this->redirect('/address');
    }
}