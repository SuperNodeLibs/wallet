<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\user\model\User;
use des3\Crypt3Des;

class Error extends Controller
{
    /**
	 * 根据错误表yuan_errpay20171119设置账号的lock标记，不让用户登录
	 */   
	public function setLock(){
		$error = Model('errpay20171119');
		$all = $error->select();
		foreach($all as $a){
			$user = Model('user/User')->where(['user_account'=>$a['account']])->find();
			//$user->save(['user_lock'=>"1"]);//不能再锁定，因为部分已经解锁
			
		}
	} 
	
	/**
	 * 测试3DES函数
	 * @param dir 测试方向，1为解密，否则为加密
	 * @param key 输入的密钥
	 * @param des 加密后或者需要加密的值
	 * */
	public function test3DES($dir, $key, $des){
		$des = new \des3\Crypt3Des($key);
		if($dir == 1){
			echo $des->decrypt($des);
		}else{
			echo $des->encrypt($des);
		}
	}
}