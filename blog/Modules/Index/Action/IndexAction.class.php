<?php
class IndexAction extends Action {
    public function index(){
		//echo dirname($_SERVER['PHP_SELF']).'1';die;
		/* echo "__URL__:".__URL__;
		echo "<br>";
		echo "GROUP_NAME:".GROUP_NAME;
		echo "<br>"; */
		//$this->menus = M('index')->order('sort asc')->select();
		//p($this->menus);die;
		//echo "APP_PATH:".APP_PATH;
		//echo dirname(APP_PATH);
		//die;
		$list = M('blogs')->where(array('display'=>0))->order('id desc')->limit('8')->select();
		
		foreach($list as $key=>$val){
			$list[$key]['pic']=unserialize($val['pic']);
			$types = M('blogs_type')->where("id = {$val['type']}")->getField('name');
			$list[$key]['type']=$types;
			$list[$key]['talkId']=$val['id'];
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
		//echo $_COOKIE['id'];die;
		
		$id = empty($_GET['id'])?'':$_GET['id'];
		$adup = empty($_GET['adup'])?'':$_GET['adup'];
		if(!empty($id)){
			$condition['type']=$id;
		}
		if(!empty($adup)){
			$condition['adup']=$adup;
		}
		$condition['display']=0;
		import('Class.pages',APP_PATH);
		$count = M('blogs')->where($condition)->count();
		$page = new page($count,8,'1','?page={page}',3);
		$show = $page->myde_write();
		$this->assign('page',$show);
		$list = M('blogs')->where($condition)->limit($page->limit,$page->myde_size)->order('id desc')->select();
		$types='';
		foreach($list as $key=>$val){
			$list[$key]['pic']=unserialize($val['pic']);
			$types = M('blogs_type')->where("id = {$val['type']}")->getField('name');
			$list[$key]['type']=$types;
			$list[$key]['talkId']=$val['id'];
		}
		$type = M('blogs_type')->where('pid=0 and display=0')->select();//标题类型
		$this->assign('talkId',$info['id']);
		$this->assign('type',$type);
		$this->assign('blog_list',$list);
		$this->assign('action','Index/lists');
		$this->display();
    }
	public function content(){
		$id=I('id');
		$info = M('blogs')->where(array('id'=>$id))->find();
		$type='';
		$type = M('blogs_type')->where("id = {$info['type']}")->getField('name');//获取当前iD文章类型名称
		$info['types']=$type;//当前文章类型

		/* $condition['id']=array('in',array($id-1,$id+1));
		$res = M('blogs')->where($condition)->select();
		//echo M('blogs')->getLastSql();die;
		//p($res);die;
		$info['before']=$res[0];		
		$info['after']=$res[1];
		p($info);die; */
		$res1 = M('blogs')->where("id < {$id} and display=0 and type={$info['type']}")->order('sort asc,id desc')->find();//上一篇
		//echo M('blogs')->getLastSql();die;
		$res2 = M('blogs')->where("id > {$id} and display=0 and type={$info['type']}")->order('sort asc,id desc')->find();//下一篇
		$info['before']=$res1;		
		$info['after']=$res2;
		//p($info);die;
		$this->assign('talkId',$info['id']);
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
	public function about(){
		$id = empty($_GET['id'])?'':$_GET['id'];
		$adup = empty($_GET['adup'])?'':$_GET['adup'];
		if(!empty($id)){
			$condition['type']=$id;
		}
		if(!empty($adup)){
			$condition['adup']=$adup;
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
		$this->assign('action','Index/about');
		$this->display();
    }
	public function message(){
		$this->assign('talkId','message');
		$this->display();
    }
	public function views(){
		$id=I('id');
		M('blogs')->where(array('id'=>$id))->setInc('views');//浏览数加1
		$info = M('blogs')->where(array('id'=>$id))->find();
		exit(json_encode(array('info'=>'成功','res'=>$info['views'])));
    }
	public function likes(){
		$id=I('id');
		if(empty($_COOKIE[$id])){
			$res=M('blogs')->where(array('id'=>$id))->setInc('likes');
		}else{
			exit(json_encode(array('info'=>'2','resinfo'=>'今天已经点赞过了，请明天再来')));
		}
		$info = M('blogs')->where(array('id'=>$id))->find();
		if($info && $res){
			if(empty($_COOKIE['id'])){
				cookie($id,'aaaaaaaaaaa',86400);
				exit(json_encode(array('info'=>'1','res'=>$info['likes'])));
			}else{
				exit(json_encode(array('info'=>'2','res'=>$info['likes'])));
			}			
		}else{
			exit(json_encode(array('info'=>'2','resinfo'=>'今天已经点赞过了，请明天再来')));
		}
		
    }
}