<?php
class BlogAction extends CommonAction {
    public function blogList(){
		$list = M('blogs')->select();
		foreach($list as $key=>$val){
			$list[$key]['pic']=unserialize($val['pic']);
		}
		$this->assign('info',$list);
		$this->display();
    }
	public function blogDel(){
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
	public function blogAdd(){
		if(IS_POST){
			//p($_POST);die;
			$data = array(
				'pic'=>serialize(I('pic')),
				'title'=>I('title'),
				'type'=>I('type'),
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
			$this->display();
		}
		
		
    }
	public function blogEdit(){
		$id=$_GET['id'];
		if(IS_POST){		
			$data = array(
				'id'=>I('id'),
				'pic'=>serialize(I('pic')),
				'title'=>I('title'),
				'type'=>I('type'),
				'content'=>I('content')
			);
			if(empty($data['pic'])){
				$this->error('名称不为空');
			}
			if(empty($data['title'])){
				$this->error('排序不为空');
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
			$this->assign('be',$info);
			$this->display();
		}
    }
}