<?php
class UserAction extends CommonAction {
    public function userList(){
		$list = M('user')->order('id desc')->select();
		//p($list);die;
		$this->assign('info',$list);
		$this->display();
    }
	public function userDelL(){
		$vo = M('user')->where(array('id'=>$_GET['id']))->getField('display');
		//echo $vo;die;
		$res = ($vo==1)? 0: 1;
		$info = M('user')->where(array('id'=>$_GET['id']))->setField('display',$res);
		if($info){
				$this->success('变更显示成功');
			}else{
				$this->error('变更显示失败');
			}
    }
	public function userDel(){
		$info = M('user')->where(array('id'=>$_GET['id']))->delete();
		if($info){
				$this->success('删除用户成功');
			}else{
				$this->error('删除用户失败');
			}
    }
	public function userAdd(){
		if(IS_POST){
			$data = array(
				'username'=>I('username'),
				'password'=>I('password'),
				'repassword'=>I('repassword'),
				'status'=>I('status'),
				'addIp'=>get_client_ip(),
				'addUser'=>session('username'),
				'addTime'=>time()
			);
			if(empty($data['username'])){
				$this->error('用户名不能为空');
			}
			if(empty($data['password'])){
				$this->error('密码不能为空');
			}
			if($data['password'] !== $data['repassword']){
				$this->error('两次密码不一致');
			}
			unset($data['repassword']);
			
			$info = M('user')->add($data);
			if($info){
				$this->success('添加用户成功');
			}else{
				$this->error('添加用户失败');
			}
		}else{
			$this->display();
		}
		
		
    }
	public function userEdit(){
		$id=$_GET['id'];
		if(IS_POST){
			$data = array(
				'id'=>I('id'),
				'username'=>I('username'),
				'status'=>I('status'),
			);
			if(empty($data['username'])){
				$this->error('用户名不能为空');
			}
			if(!empty($_POST['password']) || !empty($_POST['repassword'])){
				if($_POST['password'] !== $_POST['repassword']){
					$this->error('两次密码不一致');
				}else{
					$data['password']=$_POST['password'];
				}
			}
			
			$info=M('user')->save($data);
			if($info){
				$this->success('修改成功',U(GROUP_NAME.'/User/userList'));
			}else{
				$this->error('修改失败');		
			}
		}else{
			$info=M('user')->where(array('id'=>$id))->find();
			$this->assign('user',$info);
			$this->display();
		}
    }
	public function loginList(){
		$list = M('loginlog')->order('id desc')->select();
		//p($list);die;
		$this->assign('loginlog',$list);
		$this->display();
    }
}