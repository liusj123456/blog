<?php
	class LoginAction extends Action{
		public function index(){
			$this->display();
		}
		
		public function Logincheck(){
			date_default_timezone_set('PRC');
			
			$_SESSION['trytime']=$_SESSION['trytime']+1;
			if($_SESSION['trytime'] > 5 and ( time()-$_SESSION['t'] < 1800 ) ){
				$this->error("偿试超过5次，请半小时后再试！");
			}else{
				if( time()-$_SESSION['t'] > 1800 ){
					$_SESSION['trytime']=0;
				}
			}
			
			$User = M('Admin'); 
			$where['username']=$_POST['username'];
			$where['password']=md5($_POST['password']);
			$isUser=$User->field('id')->where($where)->find();
			if($isUser){
				session_start();
				$_SESSION['username']=$_POST['username'];
				$_SESSION['password']=md5($_POST['password']);
				//记录登录时间
				$data['lastlogin']=time();
				$User->where($where)->save($data);
				
				$this->success("登录成功！",U('Admin/index'));
			}else{
				$_SESSION['t']=time();
				$this->error("用户名或者密码错误！");
			}
			
		}
		
		public function logout(){
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			$this->success("退出成功！","index");
		}
	}

?>