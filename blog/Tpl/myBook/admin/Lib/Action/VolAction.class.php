<?php
	class VolAction extends CommonAction{
		public function index(){
			$this->assign('pagename','分卷列表');
			$this->assign('checkclass',' active');
			
			//所有小说
			$n=M('Novel');
			$where3['id']=$_GET['id'];
			$novelinfo=$n->where($where3)->find();
			$this->assign('novelinfo',$novelinfo);
			
			$v=M('Vol');
			$where2['vol_nid']=$_GET['id'];
			$data=$v->where($where2)->order('id desc')->select();
			$this->assign('data',$data);
			
			
			$this->display();
		}
		
		public function add(){
			if(isset($_POST['sub'])){
				
					$v=D('Vol');
					$data['volname']=$_POST['volname'];
					$data['vol_nid']=$_GET['id'];
					if(!$v->create()){
						$this->error($v->getError());
					}
					$isInsert=$v->data($data)->add();
					if($isInsert > 0){
						$this->success("添加分卷成功!",U('Vol/index')."/id/".$data['vol_nid']);
					}else{
						$this->error("添加分卷失败!");
					}
					
				
			}else{
				$this->assign('pagename','添加分卷信息');
				$this->assign('checkclass',' active');
				
				
				//查询当前小说信息
				$n=M('Novel');
				$where2['id']=$_GET['id'];
				$novelInfo=$n->where($where2)->find();
				$this->assign('novelinfo',$novelInfo);
				
				$this->display();
			}
		}
	
		
		//删除链接操作
		public function del(){
			$v=M('Vol');
			$where['id']=$_GET['v'];
			$novelid=$_GET['id'];
			$delstate=$v->where($where)->delete();
			if($delstate > 0){
				$this->success('删除分卷成功！',U('Vol/index')."/id/".$novelid);
			}else{
				$this->error('删除分卷失败！',U('Vol/index')."/id/".$novelid);
			}
		}
		
		//修改链接信息
		public function edit(){
			$this->assign('pagename','修改小说分卷信息');
			$this->assign('checkclass',' active');
			
			
			$v=D('Vol');
			$vol['id']=$_GET['v'];
			$where2['id']=$_GET['id'];
			//修改分卷信息
			if(isset($_POST['sub'])){
				
				if(!$v->create() ){
					$this->error($v->getError());
				}
				
				$isUpdate=$v->where($vol)->save($data); // 根据条件更新记录
				if($isUpdate > 0 ){
					$this->success("修改分卷信息成功！",U("Vol/index")."/id/".$where2['id']);
				}else{
					$this->error("修改分卷信息失败！");
				}
			
			
			}else{
				//查询当前要修改的小说信息
				$m=M('Novel');
				
				$novelInfo=$m->where($where2)->find();
				$this->assign('novelinfo',$novelInfo);
				
				//当前分卷信息
				
				$volInfo=$v->where($vol)->find();
				$this->assign('volinfo',$volInfo);
				$this->display();
			
			}
		}
		
	}

?>