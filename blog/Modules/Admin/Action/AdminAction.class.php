<?php
class AdminAction extends CommonAction {
    public function index(){
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
  public function left(){
		/* $list = M('menu')->order('sort asc')->select();
		$parents = M('menu')->where('pid = 0')->order('sort asc')->select();
		$menu =array();
		foreach($parents as $key=>$val){			
			$child = M('menu')->where(array('pid'=>$val['id']))->order('sort asc')->select();
			foreach($child as $k=>$v){
				$children = M('menu')->where(array('pid'=>$v['id']))->order('sort asc')->select();
					foreach($children as $kk=>$vv){
					}
				$child[$k]['son'] = $children;
			} 
			$parents[$key]['son'] = $child;
		}
		$this->assign('menu',$parents);
		//$this->assign('menus','111111'); */
		$this->display();
	}
}