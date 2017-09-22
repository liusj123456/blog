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
			$types = M('blogs_type')->where("id = {$val['type']}")->getField('name');
			$list[$key]['type']=$types;
		}
		$type = M('blogs_type')->where('pid=0 and display=0')->select();//标题类型
		
		$this->assign('type',$type);
		$this->assign('blog_list',$list);
		$this->display();
    }
	public function top(){
		$this->menus = M('index')->where(array('display'=>1))->order('sort asc')->select();
		//p($this->menus);die;
		$this->display();
    }
	public function lists(){
		$id = empty($_GET['id'])?'':$_GET['id'];
		if(!empty($id)){
			$condition['type']=$id;
		}
		$condition['display']=0;
		$list = M('blogs')->where($condition)->order('id desc')->select();
		$types='';
		foreach($list as $key=>$val){
			$list[$key]['pic']=unserialize($val['pic']);
			$types = M('blogs_type')->where("id = {$val['type']}")->getField('name');
			$list[$key]['type']=$types;
		}
		$type = M('blogs_type')->where('pid=0 and display=0')->select();//标题类型
		
		$this->assign('type',$type);
		$this->assign('blog_list',$list);
		$this->assign('action','Index/lists');
		$this->display();
    }
	public function content(){
		$info = M('blogs')->where(array('id'=>I('id')))->find();
		$this->assign('action','Index/lists');
		$this->assign('blog_info',$info);
		$this->display();
    }
	public function youlian(){
		$info = M('friends')->order('sort asc,id desc')->select();
		//p($info);die;
		$this->assign('info',$info);
		$this->display();
    }
}