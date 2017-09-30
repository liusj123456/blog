<?php
	class ChapterAction extends CommonAction{
		public function index(){
			$this->assign('pagename','所有内容');
			$this->assign('checkclass',' active');
			
			
			//查询小说
			$n=M('Novel');
			$novel['id']=$_GET['id'];
			$novelinfo=$n->where($novel)->find();
			$this->assign('novelinfo',$novelinfo);
			
			//所有内容
			$C=D('Content');
			import('ORG.UTIL.Page');
			
			$cont['con_nid']=$_GET['id'];
			$count=$C->where($cont)->count();
				
			$page=new Page($count,10);
			$pageshow=$page->show();
			$contents=$C->limit($page->firstRow.','.$page->listRows)->relation('Vol')->where($cont)->order('id desc')->select();
		
			$pageshow=str_replace('<a ','<a class="btn btn-primary" ',$pageshow);
			$this->assign('pageshow',$pageshow);
			
			/*$c=M('Content');
			$novelid=$_GET['id'];
	
			$contents=$c->query('select __PREFIX__content.id,__PREFIX__content.con_vid,__PREFIX__content.con_nid,__PREFIX__content.con_name,__PREFIX__novel.novelname,__PREFIX__novel.novelname,__PREFIX__vol.volname from `__PREFIX__content`,`__PREFIX__novel`,`__PREFIX__vol` where __PREFIX__content.con_nid='.$novelid.' and __PREFIX__novel.id='.$novelid.' and __PREFIX__vol.id=__PREFIX__content.con_vid order by __PREFIX__content.id desc'  );
			*/
			
			$this->assign('contents',$contents);
			
			$this->display();
		}
		
		//搜索章节
		public function search(){
			
			$this->assign('checkclass',' active');
			$C=D('Content');
			import('ORG.UTIL.Page');
			$N=M('Novel');
			if(isset($_GET['search']) and $_GET['search']=='sub'){
				$this->assign('pagename','关于 "'.$_GET['keyword'].'" 的搜索结果');
				$dest='con_name LIKE \'%'.$_GET['keyword'].'%\'';
				$count=$C->where($dest)->count();
				$page=new Page($count,10);
				$pageshow=$page->show();
				
				$contents=$C->where($dest)->limit($page->firstRow.','.$page->listRows)->select();
				
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
		
		
		public function add(){
			if(isset($_POST['sub'])){
				if($_POST['con_name'] ==null ){
					$this->error("内容标题不能为空！");
				}else{
					$c=M('Content');
					$data['con_name']=$_POST['con_name'];
					
					if($_POST['con_namepy']==""){
						$py=new PinyinAction;
						$data['con_namepy']=$py->output($_POST['con_name']);
					}else{
						$data['con_namepy']=$_POST['con_namepy'];
					}
					
					$data['con_text']=$_POST['con_text'];
					$data['con_vid']=$_POST['con_vid'];
					$data['con_nid']=$_GET['id'];
					
					//更新本小说的更新时间
					date_default_timezone_set('PRC');
					$novel['update_time']=time();
					$novel['novelstate']=$_POST['novelstate'];
					$n=M('Novel');
					$where['id']=$_GET['id'];
					$n->where($where)->save($novel);
					
					$isInsert=$c->add($data);
					$lastID=$c->getLastInsID();
					
					//echo "TXT/".$_GET['id']."/".$lastID.".txt";
					
					if($isInsert > 0){
						$this->success("添加小说内容成功!",U('Chapter/add').'/id/'.$_GET['id']);
					}else{
						$this->error("添加小说内容失败!");
					}
					
				}
			}else{
				$this->assign('pagename','添加小说内容');
				$this->assign('checkclass',' active');
				
				//查询小说信息
				$n=M('Novel');
				$novel['id']=$_GET['id'];
				$novelinfo=$n->where($novel)->find();
				$this->assign('novelinfo',$novelinfo);
				
				//小说所有分卷
				$v=M('Vol');
				$data['vol_nid']=$_GET['id'];
				$volinfo=$v->where($data)->order('id desc')->select();
				if(count ($volinfo) < 1 ) {
					$this->error('好像还没有分卷哦，还是先添加分卷吧!' ,U('Vol/add').'/id/'.$data['vol_nid'],1 );
				}
				$this->assign('volinfo',$volinfo);
				
				$this->display();
			}
		}
		
		
		//删除内容
		public function del(){
			$m=M('Content');
			$where['id']=$_GET['id'];
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除内容成功！',U('Chapter/index').'/id/'.$_GET['novelid']);
			}else{
				$this->error('删除内容失败！',U('Chapter/index').'/id/'.$_GET['novelid']);
			}
		}
		//首页或者搜索内容传过来的批量删除操作
		public function delMore(){
			$m=M('Content');
			$idArr=trim($_GET['id'],',');
			$where='id in ('.$idArr.')';
			
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除内容成功！');
			}else{
				$this->error('删除内容失败！');
			}
		}
		
		//批量删除内容操作
		public function delMany(){
			$m=M('Content');
			$idArr=trim($_GET['id'],',');
			$where='id in ('.$idArr.')';
			
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除内容成功！',U('Chapter/index').'/id/'.$_GET['novelid']);
			}else{
				$this->error('删除内容失败！',U('Link/index').'/id/'.$_GET['novelid']);
			}
		}
		
		//修改内容信息
		public function edit(){
			$this->assign('pagename','修改内容');
			$this->assign('checkclass',' active');
			
			$C=M('Content');
			$where2['id']=$_GET['id'];
			//修改小说信息
			if(isset($_POST['sub'])){
				if($_POST['con_name'] == null){
					$this->error("内容标题不能为空!");
				}else{
					$data['con_name']=$_POST['con_name'];
				}
				
				if($_POST['con_namepy'] != null){
					$data['con_namepy']=$_POST['con_namepy'];
				}else{
					$py=new PinyinAction;
					$data['con_namepy']=$py->output($_POST['con_name']);
				}
				
				//更新本小说的更新时间
				date_default_timezone_set('PRC');
				$novel['update_time']=time();
				$novel['novelstate']=$_POST['novelstate'];
				$n=M('Novel');
				$where['id']=$_GET['novelid'];
				$n->where($where)->save($novel);
				$data['con_text']=$_POST['con_text'];
				$isUpdate=$C->where($where2)->save($data); // 根据条件更新记录
				if($isUpdate > 0 ){
					$this->success("修改内容成功！",U('Chapter/index').'/id/'.$_GET['novelid']);
				}else{
					$this->error("修改内容失败！");
				}
			
			
			}else{
				//查询当前要修改的内容信息
				$conInfo=$C->where($where2)->find();
				$this->assign('conInfo',$conInfo);
				
				//查询小说信息
				$N=M('Novel');
				$novelInfo=$N->find($conInfo['con_nid']);
				$this->assign('novelinfo',$novelInfo);
				
				
				//查询所有分卷供选择
				$V=M('Vol');
				$data['vol_nid']=$novelInfo['id'];
				$VolInfo=$V->where($data)->select();
				$this->assign('volinfo',$VolInfo);
				
				$this->display();
				
			
			}
			
			
			
		}
		
	}

?>