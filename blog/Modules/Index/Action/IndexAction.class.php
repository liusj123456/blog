<?php
class IndexAction extends Action {
    public function index(){
		//$this->menus = M('index')->order('sort asc')->select();
		//p($this->menus);die;
		//echo APP_PATH;
		//ECHO "<BR>"; 
		//echo dirname(APP_PATH);
		//die;
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
}