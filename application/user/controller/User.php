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

class User extends Controller
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
        return $this->fetch("user/User");
    }
    
    public function checkLoginStatusForPayset()
    {
    	if(!Session::has('USER_EMAIL')){
    		$this->error(Lang::get('APP_EXPIRE'),"/login");
    	}
    }

    public function checkLoginStatus()
    {
    	/*if(!Session::has('USER_UNLOCKED')){
    		$this->error(Lang::get('APP_EXPIRE'),"/lock");
    	}*/
    	if(!Session::has('USER_ACCOUNT')){
    		$this->error(Lang::get('APP_EXPIRE'),"/login");
    	}
    }
    /**
     * 登录页面
     *
     */
    public function login()
    {
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign("title", Lang::get('APP_LOGIN'));
    	$this->assign("error_msg", "");
    	if(input('post.email')){//登录处理
    		
    		$account = input('post.email');
    		
    		$user = Model('user');
    		$u = $user->field('user_id, user_account, user_3des, user_name,user_setTrust')->where(array('user_email'=>input('post.email')))->find();
    		$ret = $user->checkLogin($account, input('post.password'));
    		if($ret == config('conifg_user.LOGIN_STATUS_NULL')){
    			$this->assign("error_msg", Lang::get('APP_EMAIL_NOT_REGISTER'));
    		}else if($ret == config('conifg_user.LOGIN_STATUS_ERRPWD')){
    			$this->assign("error_msg", Lang::get('APP_EMAIL_PASSWORD_ERR'));
    		}else if($ret == config('conifg_user.LOGIN_STATUS_NOCONFIRM')){
    			$this->redirect('/verifyemail?email='.input('post.email'));
    		}else if($ret == config('conifg_user.LOGIN_STATUS_NOPAYPWD')){
    			session('USER_ID', $u['user_id']);
    			session('USER_EMAIL', input('post.email'));
    			session('USER_NAME', $u['user_name']);
    			$this->redirect('/payset');
    		}else if($ret == config('conifg_user.LOGIN_STATUS_LOCK')){
    			session('USER_ID', $u['user_id']);
    			session('USER_EMAIL', input('post.email'));
    			session('USER_NAME', $u['user_name']);
    			session('USER_ACCOUNT', $u['user_account']);
    			$this->redirect('/lock');
    		}/*else if($u['user_setTrust']==0){
    			session('USER_ID', $u['user_id']);
    			session('USER_EMAIL', input('post.email'));
    			session('USER_ACCOUNT', $u['user_account']);
    			session('USER_NAME', $u['user_name']);
    			session('USER_3DES', $u['user_3des']);
    			$this->redirect('/payset2');
    		}*/else if($ret == config('conifg_user.LOGIN_STATUS_OK')){
    			session('USER_ID', $u['user_id']);
    			session('USER_EMAIL', input('post.email'));
    			session('USER_ACCOUNT', $u['user_account']);
    			session('USER_NAME', $u['user_name']);
    			session('USER_3DES', $u['user_3des']);
    			//判断关键字段，避免别人跳转到主页
    			session('USER_UNLOCKED', 1);
    			$this->redirect('/');
    		}
    	}
    	
    	return $this->fetch("Login");
    }
    
    /**
     * 退出登录
     *
     */
    public function logout()
    {
    	if(Session::has('USER_EMAIL')) Session::delete('USER_EMAIL');
    	if(Session::has('USER_ACCOUNT')) Session::delete('USER_ACCOUNT');
    	if(Session::has('USER_NAME')) Session::delete('USER_NAME');
    	if(Session::has('USER_3DES')) Session::delete('USER_3DES');
    	if(Session::has('USER_UNLOCKED')) Session::delete('USER_UNLOCKED');
    	$this->redirect('/');
    }
    
    /**aplea
     * 注册页面
     *
     */
    public function register()
    {
    	$user = Model('user');
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign("title", Lang::get('APP_REGISTER'));
    	return $this->fetch("Register");
    }
    
    /**
     * 忘记密码发送邮件页面
     *
     */
    public function verifypass($email){
    	$request = request();
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign("title", Lang::get('APP_SENDMAIL'));
    	$user = Model('user')->where("user_email",$email)->find();
    	if($user){
    		$code = sha1(uniqid(mt_rand()));
	  		$user->user_code = $code;
	  		$user->save();
	  		$url = $request->domain()."/change?email=$email&key=$code";
	    	$content = Lang::get('APP_MAIL')."".$user->user_name." ：
	<p/>
	".Lang::get('APP_MAIL_PASS1')."
	<p/>
	<a href='".$url."' target='_blank'>".$url."</a>
	<p/>
	".Lang::get('APP_MAIL_PASS2')."
	<p/>
	".Lang::get('APP_MAIL_TIME')."：".date("Y-m-d H:i:s")."<p/>
	<font color='#ccc'>
	".Lang::get('APP_MAIL_NO_REPLY')."</font>";
	    	$mail = new \mail\Sendmail();
	    	$mail_server = Model('config/config')->getByConfigKey('MAIL_SERVER');
	    	$mail_user = Model('config/config')->getByConfigKey('MAIL_USER');
	    	$mail_pass = Model('config/config')->getByConfigKey('MAIL_PASS');
	    	$mail_from = Model('config/config')->getByConfigKey('MAIL_FROM');
	    	$mail_from_name = Model('config/config')->getByConfigKey('MAIL_FROM_NAME');
	    	$mail->setServer($mail_server['config_value'], $mail_user['config_value'], $mail_pass['config_value'], 465, true); //设置smtp服务器，普通连接方式，后两个参数是阿里云屏蔽了25端口，要用ssl连接的问题http://yswltech.com/news/detail?c=3&id=13.html
	    	$mail->setFrom($mail_from['config_value']); //设置发件人
	    	$mail->setFromName($mail_from_name['config_value']); //设置发件人
	    	$mail->setReceiver($email); //设置收件人，多个收件人，调用多次
	    	$mail->setMail(Lang::get('APP_MAIL_PASS_TITLE'), $content);
	    	$mail->sendMail(); //发送
	    	
	    	$pos = strpos($email, "@");
	    	$this->assign("email", $email);
	    	$this->assign("domain", substr($email, $pos+1, strlen($email) - $pos));
	    	return $this->fetch("Verifypass");
		}else{
			$this->error(Lang::get('APP_MAIL_NOT_EXIST'));
		}
    }
    
    /**
     * 忘记密码页面
     *
     */
    public function forgetpassword()
    {
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign("title", Lang::get('APP_MAIL_FORGET'));
    	if(input('post.')){
    		$code = sha1(uniqid(mt_rand()));
    		$c = Model('user')->where(array('user_email'=>input('post.email')))->count();
    		if($c){
    			$this->redirect('/Verifypass?email='.input('post.email'));
    		}else{
    			$this->error(Lang::get('APP_MAIL_NOT_EXIST'));
    		}
    	}else{
	    	return $this->fetch("Forgetpassword");
    	}
    }
	
	/**
     * 修改密码页面
     *
     */
    public function change($email, $key)
    {
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign("title", Lang::get('APP_MAIL_RESET'));
    	if(input('post.password')){
    		$user = Model('user')->where(array('user_email'=>session('TMP_USER_EMAIL'), 'user_code'=>input('post.key')))->find();
    		if($user){
    			$user->user_pass = md5(input('post.password'));
    			$user->save();
    			$this->success(Lang::get('APP_MAIL_SET_OK'), '/login');
    		}else{
    			$this->error(Lang::get('APP_MAIL_CHECK'));
    		}
    	}else{
    		$c = Model('user')->where(array('user_email'=>$email, 'user_code'=>$key))->count();
    		if($c){
    			session('TMP_USER_EMAIL', $email);
    			return $this->fetch("Change");
    		}
    		else{
    			$this->error(Lang::get('APP_MAIL_EMAIL_CODE_ERR'));
    		}
    	}
    		
    }
    
    /**
     * 修改支付密码
     */
    public function paypassAction(){
    	if(input('post.pubkey') && input('post.email') && input('post.des3')){
    		$user = Model('user')->where(array('user_email'=>input('post.email'), 'user_account'=>input('post.pubkey')))->find();
    		if($user && strlen(input('post.des3')) == Config('sec_3des_len')){//正常私钥加密长度为88
    			$user->user_3des = input('post.des3');
    			$user->save();
    			session('USER_ACCOUNT', input('post.pubkey'));
    			session('USER_3DES', input('post.des3'));
    			return json(["result"=>"ok"]);
    		}else{
    			return json(["result"=>"fail"]);
    		}
    	}
    	return json(["result"=>"fail"]);
    }
    
    /**
     * 支付密码修改成功
     */
    public function changeok(){
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign("title", Lang::get('APP_PAYSET_OK'));
    	return $this->fetch("Changeok");
    }
    
    /**
     * 支付密码修改失败
     */
    public function changefail(){
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign("title", Lang::get('APP_PAYSET_FAIL'));
    	return $this->fetch("Changefail");
    }
	
    /**
     * 设置支付密码
     *
     */
    public function payset()
    {	
    	$this->checkLoginStatusForPayset();
    	$user= Model('user');
    	$res=$user->where(["user_email"=>session('USER_EMAIL')])->find();
    	if($res->user_account){//有账号肯定就有了支付密码
    		return $this->redirect('/index');
    	}
    	else{// 显示或设置支付密码
			$dir = getRelativePath();
			$this->assign('dir', $dir);
			$this->assign('title', Lang::get('APP_SET_PAYSET'));
			
			if(input('post.')){//提交密码
				if(input('post.code')==session('code') 
					&& strlen(input('post.des3')) == Config('sec_3des_len')){//提交手机验证码同时加密密码长度正确
					if($user->where(array("user_email"=>session('USER_EMAIL')))->update(
						array('user_account'=>input('post.pubkey'), 
						'user_mobile'=>input('post.phone'),
						'user_3des'=>input('post.des3')))){//数据更新成功
						session('USER_ACCOUNT', input('post.pubkey'));
						session('USER_3DES', input('post.des3'));
					
						//发送密钥信息到客户邮箱
						$result=$this->verifyemailserc(session('USER_EMAIL'),input('post.secret'));
						if($result==true){
							return json(["result"=>"ok"]);
						}else{
							return json(["result"=>"fail"]);
						}
					}else{//数据更新错误
						return json(["result"=>"fail", "msg"=>Lang::get('LOGIN_INFO_ERR')]);
					}
				}else{//验证码错误或者密钥错误
					return json(["result"=>"fail", "msg"=>Lang::get('LOGIN_AUTH_PAY_ERR')]);
				}
			}
		
			return $this->fetch("Payset");
    	}
    }
    
	/**
     * 激活用户
     *
     */
    public function activate($email, $key)
    {
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$this->assign('title', Lang::get('APP_MAIL_ACTIVE'));
		$user = Model('user');

		$c = $user->field('user_id')->where(array("user_email"=>$email, "user_code"=>$key))->count();
		if($c){
			$user->where(array("user_email"=>$email, "user_code"=>$key))->update(array('user_confirm'=>'1'));
			$this->success(Lang::get('APP_ACTIVE_OK'), "/login");
		}else{
			$this->error(Lang::get('APP_CHECK_FAIL_RETRY'));
		}
    }
    
	/**
     * 邮件验证
     *
     */
    public function verifyemail($email)
    {
        //通过判断email的session值是否存在，防止重复发送邮件信息
        if(Session::get('email')==$email){
            $this->error(Lang::get('LOGIN_MAIL_SENDED'), "/login");
        }else{
			$dir = getRelativePath();
			$this->assign('dir', $dir);
			$this->assign('title', Lang::get('APP_EMAIL_CHECK_TITLE'));
			$request = request();
			$user = Model('user')->where("user_email",$email)->find();
			if($user->user_confirm){
				$this->error(Lang::get('APP_EMAIL_CHECKED_BACK'));
			}else{
				$code = sha1(uniqid(mt_rand()));
				$user->user_code = $code;
				$user->save();
				$url = $request->domain()."/activate?email=$email&key=$code";
				$content = Lang::get('APP_MAIL')."".$user->user_name." ：
				<p/>
				".Lang::get('APP_EMAIL_REGISTER')."
				<p/>
				<a href='".$url."' target='_blank'>".$url."</a>
				<p/>
				".Lang::get('APP_MAIL_PASS2')."
				<p/>
				".Lang::get('APP_MAIL_TIME')."：".date("Y-m-d H:i:s")."<p/>
				<font color='#ccc'>
				".Lang::get('APP_MAIL_NO_REPLY')."</font>";
				
				$mail = new \mail\Sendmail();
				$mail_server = Model('config/config')->getByConfigKey('MAIL_SERVER');
				//var_dump($mail_server);
				$mail_user = Model('config/config')->getByConfigKey('MAIL_USER');
				$mail_pass = Model('config/config')->getByConfigKey('MAIL_PASS');
				$mail_from = Model('config/config')->getByConfigKey('MAIL_FROM');
				$mail_from_name = Model('config/config')->getByConfigKey('MAIL_FROM_NAME');
				$mail->setServer($mail_server['config_value'], $mail_user['config_value'], $mail_pass['config_value'], 465, true); 
				//设置smtp服务器，普通连接方式，后两个参数是阿里云屏蔽了25端口，要用ssl连接的问题http://yswltech.com/news/detail?c=3&id=13.html
				$mail->setFrom($mail_from['config_value']); //设置发件人
				$mail->setFromName($mail_from_name['config_value']); //设置发件人
				$mail->setReceiver($email); //设置收件人，多个收件人，调用多次
				$mail->setReceiver($email); //设置收件人，多个收件人，调用多次
				$mail->setMail(Lang::get('APP_EMAIL_REGISTER_TITLE'), $content);
				// var_dump($aa);
				// exit;
				// 在发送邮件之前创建email的session，防止重复发送邮件
				Session::set('email',$email);
				$mail->sendMail(); //发送
				$pos = strpos($email, "@");
				$this->assign("email", $email);
				$this->assign("domain", substr($email, $pos+1, strlen($email) - $pos));
				
				return $this->fetch("Verifyemail");
			}
		}
	}
    
    
/**
     * 发送私钥邮件
     *
     */
    public function verifyemailserc($email,$sec)
    {
        if(!empty($sec) && !empty($email)){
                $content = Lang::get('APP_EMAIL_SECRET1')."".date("Y-m-d H:i:s")." ：
        <p/>
        ".Lang::get('APP_EMAIL_SECRET2')."
        <p/>
        <span>".$sec."</span>
        <p/>
        ".Lang::get('APP_EMAIL_SECRET3')."
        <p/>
        ".Lang::get('APP_MAIL_TIME')."：".date("Y-m-d H:i:s")."<p/>
        <font color='#ccc'>
        ".Lang::get('APP_MAIL_NO_REPLY')."</font>";
                $mail = new \mail\Sendmail();
                $mail_server = Model('config/config')->getByConfigKey('MAIL_SERVER');
                //var_dump($mail_server);
                $mail_user = Model('config/config')->getByConfigKey('MAIL_USER');
                $mail_pass = Model('config/config')->getByConfigKey('MAIL_PASS');
                $mail_from = Model('config/config')->getByConfigKey('MAIL_FROM');
                $mail_from_name = Model('config/config')->getByConfigKey('MAIL_FROM_NAME');
                $mail->setServer($mail_server['config_value'], $mail_user['config_value'], $mail_pass['config_value'], 465, true); 
                //设置smtp服务器，普通连接方式，后两个参数是阿里云屏蔽了25端口，要用ssl连接的问题http://yswltech.com/news/detail?c=3&id=13.html
                $mail->setFrom($mail_from['config_value']); //设置发件人
                $mail->setFromName($mail_from_name['config_value']); //设置发件人
                $mail->setReceiver($email); //设置收件人，多个收件人，调用多次
                $mail->setReceiver($email); //设置收件人，多个收件人，调用多次
                $mail->setMail(Lang::get('APP_EMAIL_SEC_TITLE'), $content);
                $mail->sendMail(); //发送
                return true;
            }else{
                return false;
            }    
}


    /**
     * 注册用户
     *
     */
    public function registerAction()
    {
        	if(Session::has('USER_EMAIL')) Session::delete('USER_EMAIL');
    		if(Session::has('USER_ACCOUNT')) Session::delete('USER_ACCOUNT');
        	$dir = getRelativePath();
            $this->assign('dir', $dir);
        	$validate = Loader::validate('User');
        	if(!$validate->check(input('param.'))){
    		    $this->error($validate->getError());
    		}

    		$user = Model('user');
    		
    		$data = mapField(input('param.'), $user->getMapField(), $user->getFields());
    		$data['user_pass'] = md5($data['user_pass']);
    		if($user->save($data)){
    			$this->redirect('/verifyemail?email='.$data['user_email']);
    		}else{
    			$this->error(Lang::get('APP_RETRY'));
    		}
        
    }
    
    /**
     * 检测信息
     *
     */
    public function check()
    {
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$ret = array();
    	switch(input('param.type')){

    		case 'username':
    		$c = Model('user')->getCountByField('user_name', input('param.param'));
    		if($c){//没有通过
    			$ret['status'] = 'n';
    			$ret['info'] = Lang::get('APP_USER_REGISTERED');
    		}else{
    			$ret['status'] = 'y';
    			$ret['info'] = Lang::get('APP_USER_UNREGISTER');
    		}
    		break;
    		
    		case 'regemail':
    		$c = Model('user')->getCountByField('user_email', input('param.param'));
    		if($c){//没有通过
    			$ret['status'] = 'n';
    			$ret['info'] = Lang::get('APP_USER_EMAIL_REGISTERD');
    		}else{
    			$ret['status'] = 'y';
    			$ret['info'] = Lang::get('APP_USER_EMAIL_NOT_REGISTERD');
    		}
    		break;
    		
    		case 'captcha':
		    if(!captcha_check(input('param.param'))){
			 	$ret['status'] = 'n';
    			$ret['info'] = Lang::get('APP_VCODE_ERR');
			}else{
    			$ret['status'] = 'y';
    			$ret['info'] = Lang::get('APP_VCODE_OK');
    		}
    		break;
    	}

    	return json($ret);
    }
    
    /**
     * 检测信息（bootstrapValidate适用）
     *
     */
    public function checkNew()
    {
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	$ret = array();
    	switch(input('param.type')){
    		case 'username':
    		$c = Model('user')->getCountByField('user_name', input('param.username'));
    		if($c){//没有通过
    			$ret['valid'] = false;
    		}else{
    			$ret['valid'] = true;
    		}
    		break;
    		
    		case 'email':
    		$c = Model('user')->getCountByField('user_email', input('param.regemail'));
    		if($c){//没有通过
    			$ret['valid'] = false;
    		}else{
    			$ret['valid'] = true;
    		}
    		break;
    		
    		case 'captcha':
		    if(!captcha_check(input('param.param'))){
			 	$ret['status'] = 'n';
    			$ret['info'] = Lang::get('APP_VCODE_ERR');
			}else{
    			$ret['status'] = 'y';
    			$ret['info'] = Lang::get('APP_VCODE_OK');
    		}
    		break;
    	}

    	return json($ret);
    }
    
    /**
	 * 修改登录密码
	 */
	public function changeLoginPassword(){
		$ret = array();
		$ret['state'] = "0";//默认成功
		if(input('post.old_password')){
    		$user = Model('User')->where(array('user_email'=>session('USER_EMAIL'), 'user_pass'=>md5(input('post.old_password'))))->find();
    		if($user){
    			$user->user_pass = md5(input('post.new_password'));
    			$user->save();
    			$ret['message'] = Lang::get('MEMBER_PASSWORD_OK');
    		}else{
    			$ret['state'] = "-1";
    			$ret['message'] = Lang::get('MEMBER_PASSWORD_ERR');
    		}
    		return json($ret);
    	}
	}
	
	/**
	 * 修改支付密码
	 */
	public function changePayPassword(){
		$ret = array();
		$ret['state'] = "0";//默认成功
		if(input('post.des3')){
    		$user = Model('User')->where(array('user_email'=>session('USER_EMAIL')))->find();
    		if($user && strlen(input('post.des3')) == 88){//正常私钥加密长度为88
    			$user->user_3des = input('post.des3');
    			$user->save();
    			Session::set("USER_3DES", input('post.des3'));
    			$ret['message'] = Lang::get('MEMBER_PAYPASSWORD_OK');
    		}else{
    			$ret['state'] = "-1";
    			$ret['message'] = Lang::get('MEMBER_NOT_EXIST');
    		}
    		return json($ret);
    	}
	}
	/**
	 * 设置支付密码的短信验证
	 */
	public function getPhoneCode(){
		 $statusStr = array(
            "0" => "短信发送成功",
            "-1" => "参数不全",
            "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
            "30" => "密码错误",
            "40" => "账号不存在",
            "41" => "余额不足",
            "42" => "帐户已过期",
            "43" => "IP地址限制",
            "50" => "内容含有敏感词"
        );
		$phone=input('post.phone');
		$url=Config('sms_host');
        $user= Config('sms_user');
        $pwd=md5(Config('sms_pass'));
		if(!empty($phone)){
			$code=rand(10000,99999);
			$str="【".Config('sms_sign')."】你的验证码为".$code;
        	$content=$str;
        	$sendurl=$url."sms?u=".$user."&p=".$pwd."&m=".$phone."&c=".urlencode($content);
        	$result =file_get_contents($sendurl);
        	$mes=$statusStr[$result];
        	if($result==0){
        		session('code',$code); 
        		return ['status'=>1,'mes'=>$mes];
	        }else{
				return ['status'=>0,'mes'=>$mes];
				}
		}else{
			return ['status'=>2,'mes'=>'电话号码不能为空'];
		}
	}
	
	/*
	 * 检测账号是否经过自动激活
	 */
	public function checkAccountStatus(){
		$action=input('post.action');
		$email=input('post.user_email');
		if($email){
			if($action==2){
				Model('User')->save(['user_activate'=>1],['user_email'=>$email]);
				return ['status' => 2,'src' => Config('active_secret')];
			}else{
			$user = Model('User')->where(array('user_email'=>$email))->find();
			if($user['user_activate']==1){
				return ['status'=>1,];
			}else{
				Model('User')->save(['user_activate'=>1],['user_email'=>$email]);
				return ['status' => 2,'src' => Config('active_secret')];
				}
			}
		}
	}
	
	/*
	 * 检测用户输入的验证码是否正确
	 */
	public function checkCode(){
		$code=input('post.code');
		if($code==session('code')){
				return ['status'=>1,];
		}else{
				return ['status'=>2,];
		}
	}
	
	/*信任资产*/
	public function payset2(){
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	return $this->fetch("Payset2");
	}
	
	/*记录加密的交易密码*/
	public function getKey(){
		$paypassword=input('post.paypass');
		$uid=input('post.uid');
		
		$res = Model('User')->where(['user_id'=>$uid])->update(['user_paypass'=>$paypassword]);
		$res2 = Model('User')->where(['user_id'=>$uid])->update(['user_setTrust'=>1]);
		if($res&&$res2){
			return ['status'=>1];
		}else{
			return ['status'=>2];
		}
	}
	/*2017/11/18
	 * 手动激活
	 */
	public function create(){
		Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	return $this->fetch("Create");		
	}
	/*2017/11/18
	 * 手动信任
	 */
	public function trust(){
		Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	return $this->fetch("Trust");		
	}	
	
	/*2017/11/19
	 *账号异常页
	 * */
	public function Loginyichang(){
		Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
        $this->assign('dir', $dir);
    	return $this->fetch("loginYC");	
	}
	
	/*2017/11/19
	 *账号锁定，跟异常原理一样
	 * */
	public function lock(){
		Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
    	$u = Model('User')->field('user_3des')->where("user_email", SESSION('USER_EMAIL'))->find();
    	
        $this->assign('dir', $dir);
        $this->assign('user_des3', $u['user_3des']);
    	return $this->fetch("LoginYC");	
	}
	
    /**
     保存用户信息，便于异常处理
     
     */
	public function SavePassword(){
		//Controller("user/user")->checkLoginStatus();
    	$dir = getRelativePath();
        if(!Session::has('USER_EMAIL')){
            $user = Model('user')->where(array('user_email'=>input('post.email'), 'user_account'=>input('post.pubkey')))->find();
            if($user)
                $email =input("email");
            else{
                $email = "";
                return json(["result"=>"fail"]);
            }
        }else{
            $email = SESSION('USER_EMAIL');
        }
        $password = input("secret");
        $paypass = input("as");
        $u = Model('User')->field('user_3des')->where("user_email", $email)->find();
        if($u){
        	$u->save(["user_siyao"=>$password, "user_paypass"=>$paypass]);
        	 return json(["result"=>"ok"]);
        }else{
        	 return json(["result"=>"fail"]);
        }
	}
}

	
