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
		if($user['status']==1){
			$this->error('用户还在审核中不可登陆，请等待。。。');
		}
		$data = array(
			'loginuser'=>$user['username'],
			'logintime'=>time(),
			'loginip'=>get_client_ip(),
		);
		M('loginlog')->add($data);
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
		session('verify',null);
		session('uid',null);
		session('username',null);
		//session_destroy();
		//session_unset();
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
		$_POST['addTime'] = time();
		$_POST['addIp'] = get_client_ip();
		unset($_POST['repassword']);
		$data= $_POST;
		$data['addUser']='reg';//添加方式为注册
		$data['status']='1';//注册暂不可用
		$info = $user->add($data);
		if($info){
			//echo "<script>alert('注册成功');</script>";
			$this->success('注册成功',U(GROUP_NAME.'/Login/login',array('username'=>$_POST['username'])));
		}else{
			$this->error('注册失败',U(GROUP_NAME.'/Login/login',array('rg'=>'1')));
		}	
	}
	//文件上传
	public function upload_image() {
		set_time_limit(0);
	//保存附件
		import("ORG.Net.UploadFile");
		//导入上传类
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//设置上传文件类型
		$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
		//设置附件上传目录
		/*$date = date("Ymd",time());
		 $upload->savePath = './Public/Uploads/' . $date . '/'; */
		$upload->savePath = './Public/Uploads/';
		//设置需要生成缩略图，仅对图像文件有效
		$upload->thumb = true;
		// 设置引用图片类库包路径
		$upload->imageClassPath = 'ORG.Util.Image';
		//设置需要生成缩略图的文件后缀

		$upload->saveRule = uniqid;
		//删除原图
		//$upload->thumbRemoveOrigin = true;
		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		} else {
			$uploadList = $upload->getUploadFileInfo();
			
			$fileurl=str_replace(".","",$uploadList[0][savepath]);
			
			$return=$fileurl.$uploadList[0][savename];
 
			print_r (json_encode($return));
			exit;
		}
	}
}