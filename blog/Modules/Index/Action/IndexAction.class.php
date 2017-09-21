<?php
class IndexAction extends Action {
    public function index(){
		//echo dirname($_SERVER['PHP_SELF']).'1';die;
		/* echo __URL__;
		echo "<br>";
		echo GROUP_NAME;
		die; */
		//$this->menus = M('index')->order('sort asc')->select();
		//p($this->menus);die;
		//echo APP_PATH;
		//ECHO "<BR>"; 
		//echo dirname(APP_PATH);
		//die;
		$list = M('blogs')->where(array('display'=>0))->order('id desc')->limit('8')->select();
		foreach($list as $key=>$val){
			$list[$key]['pic']=unserialize($val['pic']);
		}
		$this->assign('blog_list',$list);
		$this->display();
    }
	public function top(){
		$this->menus = M('index')->where(array('display'=>1))->order('sort asc')->select();
		//p($this->menus);die;
		$this->display();
    }
	public function lists(){
		$list = M('blogs')->where(array('display'=>0))->order('id desc')->select();
		foreach($list as $key=>$val){
			$list[$key]['pic']=unserialize($val['pic']);
		}
		$this->assign('blog_list',$list);
		$this->display();
    }
	public function content(){
		$info = M('blogs')->where(array('id'=>I('id')))->find();
		$this->assign('action','Index/lists');
		$this->assign('blog_info',$info);
		$this->display();
    }
}