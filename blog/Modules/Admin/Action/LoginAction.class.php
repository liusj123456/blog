<?php
class LoginAction extends Action {
    public function login(){
		echo $_GET['rg'];
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
			session('verify',null);
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
	public function register(){
		$user = M('user');
		if(empty($_POST)){
			$this->error('提交信息有误',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}
		//if(!IS_POST) halt('页面不存在');
		if(empty($_POST['username'])){
			$this->error('用户名不能为空',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}
		if(empty($_POST['password'])){
			$this->error('密码不能为空');
		}
		if(empty($_POST['repassword'])){
			$this->error('确认密码不能为空',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}
		if($_POST['password'] !== $_POST['repassword']){
			$this->error('两次密码不一致',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}
		$users = $user->where(array('username'=>I('username')))->find();
		if(!empty($users)){
			$this->error('用户已存在',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}
		
		if(empty($_POST['verify']) || (session('verify')!==md5(I('verify','','strtolower')))){
			$this->error('验证码错误',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}
		$_POST['password'] = md5($_POST['password']);
		$_POST['logintime'] = time();
		$_POST['loginip'] = get_client_ip();
		unset($_POST['repassword']);
		$data= $_POST;
		$info = $user->add($data);
		if($info){
			//echo "<script>alert('注册成功');</script>";
			$this->success('注册成功',U(GROUP_NAME.'/Login/login',array('username'=>$_POST['username'])));
		}else{
			$this->error('注册失败',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}	
	}
}