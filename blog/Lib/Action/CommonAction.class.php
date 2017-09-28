<?php
/**
 * 一日小成
 * @category Think
 * @author   liusj 
 * @version  2017-09-28
 */
class CommonAction extends Action {
	public function _initialize(){
		//header("Content-type:text/html;charset=utf-8");
		header("content-type:text/html;charset=utf-8");
		import('Class.page',APP_PATH);
		if(!isset($_SESSION['uid'])){
			$this->redirect('/Admin/Login/login');
		}
		$con=array('id'=>session('uid'));
		$info=M('user')->where($con)->find();
		/* if(!empty($info)){
			echo "<script>alert('请重新登录成功');window.location.href='".__APP__."/Admin/Login/login.html';</script>";
		} */
		$sessid=session_id();
		if($sessid !== $info['sessid']  && $info['username'] != 'liusj'){
			session('verify',null);
			session('uid',null);
			session('username',null);
			echo "<script>alert('您的账号已在其他地方登陆,如非本人操作,请尽快修改密码!');window.location.href='".__APP__."/Admin/Login/login.html';</script>";
			exit;
		}
		$this->assign('index',$info);
		
		$list = M('menu')->order('sort asc')->select();
		$parents = M('menu')->where('display = 1')->order('sort asc')->select();
		$this->menu_list = $this->unlimitMenu($parents);
		//p($this->menu_list);die;
		/*$menu =array();
		foreach($parents as $key=>$val){			
			$child = M('menu')->where(array('pid'=>$val['id'],'display'=>1))->order('sort asc')->select();
			foreach($child as $k=>$v){
				$children = M('menu')->where(array('pid'=>$v['id'],'display'=>1))->order('sort asc')->select();
					foreach($children as $kk=>$vv){
					}
				$child[$k]['son'] = $children;
			} 
			$parents[$key]['son'] = $child;
		} 
		$this->assign('menu_list',$parents);
		*/
		
		
	}
    /* public function index(){
	$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    } */
	public function unlimitMenu($list,$pid=0){
		$arr = array();
		foreach($list as $v){
			if($v['pid'] == $pid){				
				$v['son']=$this->unlimitMenu($list,$v['id']);	
				$arr[] = $v;
			}
		}
		return $arr;
	}
	public function loginlogs($data=array()){
		$datas = array(
			'loginuser'=>$data['loginuser'],
			'loginerror'=>$data['loginerror'],
			'logintime'=>time(),
			'loginip'=>get_client_ip(),
		);
		M('loginlog')->add($datas);
	}
}