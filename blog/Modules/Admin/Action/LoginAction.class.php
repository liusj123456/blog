<?php
/**
 * 一日小成
 * @category Think
 * @author   liusj 
 * @version  2017-09-28
 */
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
		
		$data['logintime']=time();
		$data['loginip']=get_client_ip();
		if(session('verify')!==md5(I('verify','','strtolower'))){
			$data['loginuser']=I('username');
			$data['status']="失败";
			$data['loginerror']="验证码错误";
			$this->loginlogs($data);
			session('verify',null);
			$this->error('验证码错误');
		}
		$user = M('user')->where(array('username'=>I('username'),'password'=>I('password','','md5')))->find();
		/* if(!user || ($user['password']!==I('password','','md5'))){
			$data['loginuser']=$user['username'];
			$data['status']="失败";
			$data['loginerror']="账号或密码错误";
			$this->loginlogs($data);
			$this->error('账号或密码错误');
		} */
		$sessid = session_id();
		$wrongs  = M('login_wrong')->where(array('username'=>I('username'),'sessid'=>$sessid))->find();
		if(!empty($wrongs) and $wrongs['times']>=5 and (time()>$wrongs['expire'])){			
			M('login_wrong')->where(array('username'=>I('username'),'sessid'=>$sessid))->delete();
		}
		$wrong = M('login_wrong')->where(array('username'=>I('username'),'sessid'=>$sessid))->find();
		//echo $sessid;
		//p($wrong);die;
		if(!$user){
				if(!empty($wrong)){
					if($wrong['times']>=5){
						$this->error('账号密码错误已过5次，请3分钟后重试');
					}
					if($wrong['times']>=4){
						M('login_wrong')->where(array('username'=>I('username'),'sessid'=>$sessid))->save(array('times'=>5,'expire'=>strtotime('+3 minute')));
						$this->error('账号密码错误已过5次，请3分钟后重试');
					}else{
						M('login_wrong')->where(array('username'=>I('username'),'sessid'=>$sessid))->save(array('times'=>$wrong['times']+1));
						$this->error('账号密码错误，您还剩'.(5-($wrong['times']+1)).'次机会');
					}
				}else{
					$info = array(
						'username'=>I('username'),
						'sessid'=>$sessid,
						'times'=>1,
					);
					M('login_wrong')->add($info);
					$this->error('账号密码错误，您还剩4次机会');
				}
		}else{
			if(!empty($wrong) and $wrong['times']>=5 and time()<$wrong['times']){
				$this->error('账号密码错误已过5次，请'.($wrong['times']-time()).'分钟后重试');
			}else{
				if(!empty($wrong)){
					M('login_wrong')->where(array('username'=>$user['username'],'sessid'=>$sessid))->delete();
				}
			}
		}
		if($user['status']==1){
			$data['loginuser']=$user['username'];
			$data['status']="失败";
			$data['loginerror']="用户还在审核中不可登陆";
			$this->loginlogs($data);
			$this->error('用户还在审核中不可登陆，请等待。。。');
		}
		$data['loginuser']=$user['username'];
		$data['status']="成功";
		//$data['loginerror']="验证码错误";
		$this->loginlogs($data);
		$datas = array(
			'id'=>$user['id'],
			'sessid'=>session_id(),
		);
		M('user')->save($datas);
		session('uid',$user['id']);
		session('username',$user['username']);
		$this->redirect('/Admin/Admin/index');
	}
	public function loginlogs($data=array()){
		$datas = array(
			'loginuser'=>$data['loginuser'],
			'status'=>$data['status'],
			'loginerror'=>$data['loginerror'],
			'logintime'=>time(),
			'loginip'=>get_client_ip(),
		);
		M('loginlog')->add($datas);
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