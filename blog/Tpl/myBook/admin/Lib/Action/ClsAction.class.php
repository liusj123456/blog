<?php
	
	class ClsAction extends CommonAction{
		public function index(){
			$this->assign('pagename','小说分类列表');
			$this->assign('checkclass',' active');
			
			
			//所有分类
			$c=M('Class');
			$classs=$c->order('id')->select();
			$this->assign('noveclass',$classs);
			
			$this->display();
		}
		
		//删除用户操作
		public function del(){
			$m=M('Class');
			$where['id']=$_GET['id'];
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除小说分类成功！',U('Cls/index'));
			}else{
				$this->error('删除小说分类失败！',U('Cls/index'));
			}
		}
		
		
		public function edit(){
			$this->assign('pagename','修改分类信息');
			$this->assign('checkclass',' active');
			
			$c=M('Class');
			if(isset($_POST['sub'])){
				if($_POST['classname'] != ''){
					$data['classname']=$_POST['classname'];
				}
				if($_POST['classpy'] != ''){
					$data['classpy']=$_POST['classpy'];
				}
				$Update=$c->where('id=%d',$_GET['id'])->save($data);
				if($Update > 0 ){
						$this->success("修改分类信息成功！",U("Cls/index"));
					}else{
						$this->error("修改分类信息失败!");
					}
				
			}else{
				
				$where['id']=$_GET['id'];
				$classInfo=$c->where($where)->find();
				$this->assign('classinfo',$classInfo);
				
				$this->display();
			}
		}
		
		//添加分类
		public function add(){
			$this->assign('pagename','添加小说分类信息');
			$this->assign('checkclass',' active');
			
			
			$this->display();
			
		}
		
		public function addclass(){
			
			if($_POST['classname'] =="" ){
				$this->error("分类名称不能为空！");
			}else{
				$c=M('Class');
				$data['classname']=$_POST['classname'];
				if($_POST['classpy']==''){
					$py=new PinyinAction;
					$data['classpy']=$py->output($_POST['classname']);
				}else{
					$data['classpy']=$_POST['classpy'];
				}
				$isInsert=$c->data($data)->add();
				if($isInsert > 0){
					$this->success("添加小说分类成功!",U('Cls/index'));
				}else{
					$this->error("添加小说分类失败!");
				}
				
			}
		}
	}

?>