<?php
	class LinkAction extends CommonAction{
		public function index(){
			$this->assign('pagename','友情链接列表');
			$this->assign('checklink',' active');
			
			
			$c=M('Links');
			import('ORG.UTIL.Page');
			//如果是搜索的
			
			if(isset($_GET['search'])){
				$dest='linkname LIKE \'%'.$_GET['key'].'%\''.' OR linkurl LIKE \'%'.$_GET['key'].'%\'';
				$count=$c->where($dest)->count();
				
				$page=new Page($count,10);
				$pageshow=$page->show();
				
				$Links=$c->where($dest)->limit($page->firstRow.','.$page->listRows)->select();
				
			}else{
			
				//所有链接
				
				$order='linkweight desc';	//链接默认排序方式
				
				//按添加时间排序
				if(isset($_GET['ordertime'])){
					if($_GET['ordertime'] =='near')
						$order='times desc';
					if($_GET['ordertime'] =='far')
						$order='times asc';	
				}
				
				//按链接权重排序
				if(isset($_GET['orderweight'])){
					if($_GET['orderweight'] =='max')
						$order='linkweight desc';
					if($_GET['orderweight'] =='min')
						$order='linkweight asc';	
				}
				
				
				//按id排序
				if(isset($_GET['orderid'])){
					if($_GET['orderid'] =='max')
						$order='id desc';
					if($_GET['orderid'] =='min')
						$order='id asc';	
				}
				
				
				
				$count=$c->count();
				$page=new Page($count,10);
				$pageshow=$page->show();
				
				$Links=$c->limit($page->firstRow.','.$page->listRows)->order($order)->select();
			}
		 	$pageshow=str_replace('<a ','<a class="btn btn-primary" ',$pageshow);
			$this->assign('pageshow',$pageshow);
			
			
			$this->assign('links',$Links);
			
			
			$this->display();
		}
		
		
		public function add(){
			$this->assign('pagename','添加友情链接');
			$this->assign('checklink',' active');
			
			
			$this->display();
		
		}
		
		public function addlink(){
				$m=D('Links');
				if( !$m->create() ){
					$this->error($m->getError());
				}
				date_default_timezone_set('PRC');
				$m->times=time();
				
				$isInsert=$m->add();
				if($isInsert > 0){
					$this->success("添加友情链接成功!",U('Link/index'));
				}else{
					$this->error("添加友情链接失败!");
				}
				
		}
		
		//删除链接操作
		public function del(){
			$m=M('Links');
			$where['id']=$_GET['id'];
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除链接成功！',U('Link/index'));
			}else{
				$this->error('删除链接失败！',U('Link/index'));
			}
		}
		
		//批量删除链接操作
		public function delMany(){
			$m=M('Links');
			$idArr=trim($_GET['id'],',');
			$where='id in ('.$idArr.')';
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除链接成功！',U('Link/index'));
			}else{
				$this->error('删除链接失败！',U('Link/index'));
			}
		}
		
		
		//修改链接信息
		public function edit(){
			$this->assign('pagename','修改链接信息');
			$this->assign('checklink',' active');
			
			
			$where2['id']=$_GET['id'];
			//修改链接信息
			if(isset($_POST['sub'])){
				$l=D('Links');
				
				
				$l->linkname=$_POST['linkname'];
				$l->linkurl=$_POST['linkurl'];
				$l->remarks=$_POST['remarks'];
				$l->linkweight=$_POST['linkweight'];
			
				if( !$l->create()){
					$this->error($l->getError());
				}
				$isUpdate=$l->where($where2)->save(); // 根据条件更新记录
				
				if($isUpdate > 0 ){
					$this->success("修改链接信息成功！",U("Link/index"));
				}else{
					$this->error("修改链接信息失败!");
				}
			
			}else{
				//查询当前要修改的用户信息
				$m=M('Links');
				$linkInfo=$m->where($where2)->find();
				$this->assign('linkInfo',$linkInfo);
				$this->display();
			
			}
			
			
		}
		
	}

?>