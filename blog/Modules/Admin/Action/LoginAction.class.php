<?php
class LoginAction extends Action {
    public function login(){
		if(isset($_SESSION['uid']))
			$this->redirect(GROUP_NAME ."/Admin/index");
		else
			$this->display();	
    }
	public function checkLogin(){
		//if(!IS_POST) halt('页面不存在');
		$user = M('user')->where(array('username'=>I('username')))->find();
		if(!user || ($user['password']!==I('password','','md5'))){
			$this->error('账号或密码错误');
		}
		if(session('verify')!==md5(I('verify','','strtolower'))){
			$this->error('验证码错误');
		}		
		session('uid',$user['id']);
		session('username',$user['username']);
		$this->redirect('/Admin/Admin/index');
	}
	public function verify(){
		//import('ORG.Util.Image');
		//image::buildImageVerify();
		//import('ORG.Util.Validate');
		import('Class.Validate',APP_PATH);
		$_vc = new Validate();  //实例化一个对象
		$_vc->doimg();  
		//$_SESSION['verify'] = $_vc->getCode();//验证码保存到SESSION中
		//Validate::doimg();
	}
	public function logout(){
		//session(null);
		session_destroy();
		session_unset();
		$this->redirect('/Admin/Login/login');
	}
}