<?php
	class AdminAction extends CommonAction{
		public function index(){
			$this->assign('pagename','最新更新的所有内容');
			$this->assign('checkindex',' class="active"');
			$this->assign('checkuser','');
			$this->assign('checkclass','');
			
			$C=D('Content');
			import('ORG.UTIL.Page');
			$N=M('Novel');
			
			$count=$C->count();
			$page=new Page($count,10);
			$pageshow=$page->show();
				
			$contents=$C->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
				
			//查询所属小说
			foreach($contents as $cc){
				$nowNovelId=$cc['con_nid'];
				$novelInfo=$N->field('novelname')->find($nowNovelId);
					
				$newcon[]=array_merge($cc,$novelInfo);
					
			}
			$pageshow=str_replace('<a ','<a class="btn btn-primary" ',$pageshow);
			$this->assign('pageshow',$pageshow);
			$this->assign('contents',$newcon);
				
			$this->display();
			
		}
	}
?>