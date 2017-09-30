<?php	
	class UserAction extends CommonAction{
		public function index(){
			$this->isLogin();
			$this->assign('checkuser',' active');
			$this->assign('pagename','管理用户');
			$this->assign('checkindex','');
			
			//所有用户
			$m=M('Admin');
			$users=$m->order('id')->select();
			$this->assign('users',$users);
			
			$this->display();
		}
		
		
		//删除用户操作
		public function del(){
			$m=M('Admin');
			$where['id']=$_GET['id'];
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除用户成功！',U('User/index'));
			}else{
				$this->error('删除用户失败！',U('User/index'));
			}
		}
		
		
		//添加用户
		public function add(){
			$this->assign('pagename','添加用户信息');
			$this->assign('checkuser',' active');
			
			$this->display();
			
		}
		
		public function adduser(){
			$a=D('Admin');
			
			if( !$a->create()){
				$this->error($a->getError());
			}
			$a->password=md5($_POST['password']);
			$a->regdate=date('Y-m-d');
			$isInsert=$a->add();
			if($isInsert > 0){
				$this->success("添加用户成功!",U('User/index'));
			}else{
				$this->error("添加用户失败!");
			}
	
		}
		
		
		//修改用户
		public function edit(){
		
			$this->assign('pagename','修改用户信息');
			$this->assign('checkuser',' active');
			
			$m=M('Admin');
			
			$where2['id']=$_GET['id'];
			//修改用户信息
			if(isset($_POST['sub'])){
				if($_POST['password'] ==null){
					$this->error('密码不能为空！');
				}else if($_POST['repassword']==null){
					$this->error('确认密码不能为空！');
				}else if($_POST['password'] !== $_POST['repassword']){
					$this->error('两次密码输入不一致！');
				}else if ($_POST['nickname'] ==null ){
					$this->error('昵称不能为空！');
				}else{
					$data['password']=md5($_POST['password']);
					$data['nickname']=$_POST['nickname'];
					
					$isUpdate=$m->where($where2)->save($data); // 根据条件更新记录
					if($isUpdate > 0 ){
						$this->success("修改用户信息成功！",U("User/index"));
					}else{
						$this->error("修改用户信息失败!");
					}
				}
				
			
			}else{
				//查询当前要修改的用户信息
				$userinfo=$m->where($where2)->find();
				$this->assign('userinfo',$userinfo);
				$this->display();
			
			}
			
			
			
		}
		
		public function isLogin(){
			if( !isset($_SESSION['username']) or !isset($_SESSION['password']) ){
				$this->error("你还未登陆!",U('Login/index'));
				exit();
			}
		
		}
	}

?>