<?php
/**
 * 一日小成
 * @category Think
 * @author   liusj 
 * @version  2017-09-28
 */
class AdminAction extends CommonAction {
    public function index(){
		$logo = M('logo')->order('id desc')->find();
		$logo['pic'] = unserialize($logo['pic']);
		//p($logo);die;
		$this->assign('logo',$logo);
		$this->display();
    }
	public function main(){
		$this->display();
    }
	public function mainEdit(){
		$id = $_GET['id'];
		if(IS_POST){
			$data = array(
				'id'=>$id,
				'pic'=>serialize(I('pic')),
				'addUser'=>session('username'),
				'addTime'=>time()
			);
			//p($data);die;
			if(empty($data['pic'])){
				$this->error('图片不为空');
			}
			//$id=M('logo')->where(array('id'=>1))->getField('id');
			if(!$id){
				$info=M('logo')->add($data);
			}else{
				$info=M('logo')->where(array('id'=>$id))->save($data);
			}
			
			if($info){
				$this->success('首页logo变更成功',U(GROUP_NAME.'/Admin/index'));
			}else{
				$this->error('首页logo变更失败');		
			}
		}else{
			
			$this->display();
		}
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