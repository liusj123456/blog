<?php
class BlogAction extends CommonAction {
    public function blogList(){
		
		$count = M('blogs')->count();
		$page = new page($count, 10);
		$show = $page->myde_write();
		$this->assign('page',$show);
		$list = M('blogs')->order('id desc')->limit($page->limit,$page->myde_size)->select();
		$types='';
		foreach($list as $key=>$val){
			$list[$key]['pic']=unserialize($val['pic']);
			$types = M('blogs_type')->where("id = {$val['type']}")->getField('name');
			$list[$key]['type']=$types;
		}
		//p($list);die;
		$this->assign('info',$list);
		$this->display();
    }
	public function blogDelL(){
		$vo = M('blogs')->where(array('id'=>$_GET['id']))->getField('display');
		//echo $vo;die;
		$res = ($vo==1)? 0: 1;
		$info = M('blogs')->where(array('id'=>$_GET['id']))->setField('display',$res);
		if($info){
				$this->success('变更显示成功');
			}else{
				$this->error('变更显示失败');
			}
    }
	public function blogDel(){
		//$vo = M('blogs')->where(array('id'=>$_GET['id']))->getField('display');
		//echo $vo;die;
		//$res = ($vo==1)? 0: 1;
		$info = M('blogs')->where(array('id'=>$_GET['id']))->delete();
		if($info){
				$this->success('删除博客成功');
			}else{
				$this->error('删除博客失败');
			}
    }
	public function blogAdd(){
		if(IS_POST){
			//p($_POST);die;
			$data = array(
				'pic'=>serialize(I('pic')),
				'title'=>I('title'),
				'type'=>I('type'),
				'intro'=>I('intro'),
				'display'=>I('display'),
				'adup'=>I('adup'),
				'talks'=>I('talks'),
				'views'=>I('views'),
				'likes'=>I('likes'),
				'content'=>I('content'),
				'addUser'=>session('username'),
				'addTime'=>time()
			);
			$info = M('blogs')->add($data);
			if($info){
				$this->success('发布成功');
			}else{
				$this->error('发布失败');
			}
		}else{
			$this->type = M('blogs_type')->where('display=0')->order('id asc')->select();
			$this->display();
		}
		
		
    }
	public function blogEdit(){
		$id=$_GET['id'];
		if(IS_POST){
			//p($_POST);die;
			$data = array(
				'id'=>I('id'),
				'pic'=>serialize(I('pic')),
				'title'=>I('title'),
				'display'=>I('display'),
				'type'=>I('type'),
				'adup'=>I('adup'),
				'talks'=>I('talks'),
				'views'=>I('views'),
				'likes'=>I('likes'),
				'intro'=>I('intro'),
				'content'=>I('content')
			);
			if(empty($data['pic'])){
				$this->error('图片不为空');
			}
			if(empty($data['title'])){
				$this->error('标题不为空');
			}
			if(empty($data['type']) && empty($data['content'])){
				$this->error('类型或内容不为空');
			}
			$info=M('blogs')->save($data);
			//echo M('blogs')->getLastSql();die();
			if($info){
				$this->success('修改成功',U(GROUP_NAME.'/Blog/blogList'));
			}else{
				$this->error('修改失败');		
			}
		}else{
			$info=M('blogs')->where(array('id'=>$id))->find();
			$info['pic']=unserialize($info['pic']);
			//p($info);die;
			$this->type = M('blogs_type')->where('display=0')->order('id asc')->select();
			$this->assign('be',$info);
			$this->display();
		}
    }
	//文章类型
	public function blogTypeList(){
		$count = M('blogs_type')->count();
		$page = new page($count, 10);
		$show = $page->myde_write();
		$this->assign('page',$show);
		$type = M('blogs_type')->order('id desc')->limit($page->limit,$page->myde_size)->select();
		$this->type = $this->unlimit($type);
		//p($this->type);die;
		$this->display();
	}
	public function unlimit($list,$pid=0,$html='----',$level=1){
		$arr = array();
		foreach($list as $val){
			if($val['pid']==$pid){
				$val['html']=str_repeat($html,$level-1);
				$val['level']=$level+1;
				$arr[]=$val;
				$arr = array_merge($arr,$this->unlimit($list,$val['id'],$html,$val['level']));
			}
		}
		return $arr;
	}
	public function blogTypeDel(){
		$info=M('blogs_type')->where(array('id'=>$_GET['id']))->delete();
		if($info){
			$this->success('删除成功',U(GROUP_NAME.'/Blog/blogTypeList'));
		}else{
			$this->error('删除失败',U(GROUP_NAME.'/Blog/blogTypeList'));		
		}
    }
	public function blogTypeAdd(){
		
		if(IS_POST){
			$data = array(
				'pid'=>I('pid'),
				'name'=>I('name'),
				'url'=>I('url'),
				'display'=>I('display'),
				'sort'=>I('sort'),
				'addUser'=>session('username'),
				'addTime'=>time()
			);
			if(empty($data['name'])){
				$this->error('名称不为空');
			}
			if(empty($data['sort'])){
				$this->error('排序不为空');
			}
			if(M('blogs_type')->where(array('name'=>$data['name']))->find()){
				$this->error('名称已存在');
			}
			$info=M('blogs_type')->add($data);
			if($info){
				$this->success('添加成功',U(GROUP_NAME.'/Blog/blogTypeList'));
			}else{
				$this->error('添加失败');		
			}
		}else{
			$pid = !empty($_GET['id'])?$_GET['id']:0;
			if($pid!=0){
				$name = M('blogs_type')->where(array('id'=>$pid))->getField('name');
				$this->assign('parents',$name);
			}
			$this->assign('pid',$pid);
			$this->display();
		}
    }
	public function blogTypeEdit(){
		$id=$_GET['id'];
		if(IS_POST){
			
			$data = array(
				'id'=>I('id'),
				'name'=>I('name'),
				'url'=>I('url'),
				'display'=>I('display'),
				'sort'=>I('sort'),
			);
			if(empty($data['name'])){
				$this->error('名称不为空');
			}
			if(empty($data['sort'])){
				$this->error('排序不为空');
			}
			$info=M('blogs_type')->save($data);
			//echo M('blogs_type')->getLastSql();die;
			if($info){
				$this->success('修改成功',U(GROUP_NAME.'/Blog/blogTypeList'));
			}else{
				$this->error('修改失败');		
			}
		}else{
			$info=M('blogs_type')->where(array('id'=>$id))->find();
			$this->assign('t',$info);
			$this->display();
		}
    }
}