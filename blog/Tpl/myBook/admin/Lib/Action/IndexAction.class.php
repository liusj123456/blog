<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		if( !isset($_SESSION['username']) or !isset($_SESSION['password']) or $_SESSION['username']=='' or $_SESSION['password']==''){
			$this->redirect(('Login/index'));
		}else{
			$this->redirect(('Admin/index'));
		}
    }
}