<?php
class AdminAction extends CommonAction {
    public function index(){
		//echo '12';
		//echo C('codelen');
		
		$this->display();
    }
	public function user(){
		$this->display();
	}
	//验证码配置修改
	public function form(){
		if(IS_POST){	
			unset($_POST['__RequestVerificationToken']);
			//print_r($_POST);exit;
			if(empty($_POST)){
				$this->error('数据不能为空');exit;
			}
			
			//exit;
			if(F('verify',$_POST,CONF_PATH)){
					$this->success('修改成功');
			}else{
					$this->error('修改失败');
			}
		}else{
			
			$this->display();
		}
		
	}
}