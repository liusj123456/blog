<?php
	class NovelAction extends CommonAction{
		public function index(){
			
			$this->assign('checkclass',' active');
			
			//小说分类
			$c=M('class');
			$cls=$c->field('id,classname')->order('id')->select();
			$this->assign('cls',$cls);
			
			//所有小说
			$N=D('Novel');
			import('ORG.UTIL.Page');
			if(isset($_GET['search']) and $_GET['search']=='sub'){
				$this->assign('pagename','关于 "'.$_GET['key'].'" 的搜索结果');
				$dest='novelname LIKE \'%'.$_GET['key'].'%\''.' OR novelauthor LIKE \'%'.$_GET['key'].'%\'';
				$count=$N->where($dest)->count();
				$page=new Page($count,10);
				$pageshow=$page->show();
				
				$Novels=$N->where($dest)->limit($page->firstRow.','.$page->listRows)->select();
				
			}else{
				$this->assign('pagename','所有小说列表');
				$order='update_time desc';	//小说默认排序方式
				
				//按更新时间排序
				if(isset($_GET['ordertime'])){
					if($_GET['ordertime'] =='near')
						$order='update_time desc';
					if($_GET['ordertime'] =='far')
						$order='update_time asc';	
				}
				//按最新推荐排序
				if(isset($_GET['ordertui']) and $_GET['ordertui']=='near'){
					$order='tuitime desc';
				}
				
				//按小说分类显示
				if(isset($_GET['ordercls'])){
					$where['novel_cid']=$_GET['ordercls'];
				}
				
				
				//按小说状态显示
				if(isset($_GET['orderstate'])){
					if($_GET['orderstate'] =='over')
						$where['novelstate']=1;
					if($_GET['orderstate'] =='ing')
						$where['novelstate']=0;
				}
				
				$count=$N->where($where)->count();
				
				$page=new Page($count,10);
				$pageshow=$page->show();
				
				$Novels=$N->relation('Class')->limit($page->firstRow.','.$page->listRows)->order($order)->where($where)->select();
			}
		 	$pageshow=str_replace('<a ','<a class="btn btn-primary" ',$pageshow);
			$this->assign('pageshow',$pageshow);
			
			
			/*$c=M('Class');
			$Novels=$c->query('select __PREFIX__novel.id,__PREFIX__novel.update_time,__PREFIX__novel.novelname,
			__PREFIX__novel.novelauthor,__PREFIX__novel.novelstate,__PREFIX__novel.novel_cid,__PREFIX__class.classname 
			from `__PREFIX__novel`,`__PREFIX__class` where __PREFIX__novel.novel_cid = __PREFIX__class.id 
			order by  __PREFIX__novel.update_time desc');*/
			$this->assign('novels',$Novels);
			
			$this->display();
		}
		
		public function add(){
	
			$this->assign('pagename','添加小说信息');
			$this->assign('checkclass',' active');
			
		
			
			//小说分类
			$c=M('class');
			$cls=$c->field('id,classname')->order('id')->select();
			$this->assign('cls',$cls);
			
			$this->display();
		
		}
		
		public function addnovel(){
			//小说分类
			$c=M('class');
			$cls=$c->field('id,classname')->order('id')->select();
			$this->assign('cls',$cls);
			
		
			$n=D('Novel');
			
			if($_POST['novelpy']==""){
				$py=new PinyinAction;
				$data['novelpy']=$py->output($_POST['novelname']);
			}else{
				$data['novelpy']=$_POST['novelpy'];
			}
			
			
			if ( !$n->create()){
				$this->error($n->getError());
			}
			$n->novelpy=$data['novelpy'];
			
			if(isset($_FILES) and $_FILES['novelimg']['name'] !=""){
				if( ($_FILES['novelimg']['type'] != 'image/gif')  and ($_FILES['novelimg']['type'] != 'image/jpeg') and ($_FILES['novelimg']['type'] != 'image/pjpeg') ){
					$this->error('文件类型只能是JPG或者GIF格式！');
				}else if($_FILES['novelimg']['size'] > 500000){
					$this->error('图片文件过大，请换一张！');
				}else if($_FILES['novelimg']['error'] > 0){
					$this->error('上传中出现了错误！');
				}else{
					$name=$_FILES['novelimg']['name'];//上传文件的文件名 
					$tmp_name=$_FILES['novelimg']["tmp_name"];//上传文件的临时存放路径 		
					if($_FILES['novelimg']['type'] == 'image/gif'){
						$pictureType=".gif";
					}else{
						$pictureType=".jpg";
					}
				}
				$saveFile='./Public/cover/'.$data['novelpy'].$pictureType;
					
				$data['novelimg']=$data['novelpy'].$pictureType;
					
				move_uploaded_file($tmp_name,$saveFile); 
			}else{
				$data['novelimg']="nopic.jpg";
			}
			$n->novelimg=$data['novelimg'];
				
			$isInsert=$n->add();
			if($isInsert > 0){
				$this->success("添加小说成功!",U('Novel/index'));
			}else{
				$this->error("添加小说失败!");
			}
				
			
		}
		
		//删除小说
		public function del(){
			$m=M('Novel');
			$where['id']=$_GET['id'];
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除小说成功！',U('Novel/index'));
			}else{
				$this->error('删除小说失败！',U('Novel/index'));
			}
		}
		
		//批量删除小说
		public function delMany(){
			$m=M('Novel');
			$idArr=trim($_GET['id'],',');
			$where='id in ('.$idArr.')';
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除小说成功！',U('Novel/index'));
			}else{
				$this->error('删除小说失败！',U('Novel/index'));
			}
		}
		
		//修改小说信息
		public function edit(){
			$this->assign('pagename','修改小说信息');
			$this->assign('checkclass',' active');
			
			
			$m=M('Novel');
			$where2['id']=$_GET['id'];
			//修改小说信息
			if(isset($_POST['sub'])){
				if($_POST['novelname'] == null){
					$this->error("小说名称不能为空!");
				}else{
					$data['novelname']=$_POST['novelname'];
				}
				
				if($_POST['novelpy'] != null){
					$data['novelpy']=$_POST['novelpy'];
				}else{
					$py=new PinyinAction;
					$data['novelpy']=$py->output($_POST['novelname']);
				}
				
				if($_POST['novelauthor'] == null){
					$this->error("小说作者不能为空!");
				}else{
					$data['novelauthor']=$_POST['novelauthor'];
				}
				
				$data['clicktoday']=$_POST['clicktoday'];
				$data['clickmonth']=$_POST['clickmonth'];
				$data['clicksum']=$_POST['clicksum'];
				
				$data['novel_cid']=$_POST['novel_cid'];
				$data['noveldes']=$_POST['noveldes'];
				$data['novelstate']=$_POST['novelstate'];
				
				if(isset($_FILES) and $_FILES['novelimg']['name'] !=""){
					if( ($_FILES['novelimg']['type'] != 'image/gif')  and ($_FILES['novelimg']['type'] != 'image/jpeg') and ($_FILES['novelimg']['type'] != 'image/pjpeg') ){
						$this->error('文件类型只能是JPG或者GIF格式！');
					}else if($_FILES['novelimg']['size'] > 500000){
						$this->error('图片文件过大，请换一张！');
					}else if($_FILES['novelimg']['error'] > 0){
						$this->error('上传中出现了错误！');
					}else{
						$name=$_FILES['novelimg']['name'];//上传文件的文件名 
						$tmp_name=$_FILES['novelimg']["tmp_name"];//上传文件的临时存放路径 
						
						if($_FILES['novelimg']['type'] == 'image/gif'){
							$pictureType=".gif";
						}else{
							$pictureType=".jpg";
						}
					}
					$saveFile='./Public/cover/'.$data['novelpy'].$pictureType;
					
					$data['novelimg']=$data['novelpy'].$pictureType;
					
					move_uploaded_file($tmp_name,$saveFile); 
				}else{
					//$data['novelimg']="nopic.jpg";
				}
				
				$isUpdate=$m->where($where2)->save($data); // 根据条件更新记录
				if($isUpdate > 0 ){
					$this->success("修改小说信息成功！",U("Novel/index"));
				}else{
					$this->error("修改小说信息失败！");
				}
			
			
			}else{
				//查询当前要修改的小说信息
				$novelInfo=$m->where($where2)->find();
				$this->assign('novelinfo',$novelInfo);
				
				//小说分类
				$c=M('class');
				$cls=$c->field('id,classname')->order('id')->select();
				$this->assign('cls',$cls);
				$this->display();
				
			
			}
			
			
		}
		
		public function tui(){
			$novel['id']=$_GET['id'];
			$N=M('Novel');
			$novel['tuitime']=time();
			$isUpdate=$N->save($novel);
			if($isUpdate){
				$this->success('推荐成功！');
			}else{
				$this->error('推荐失败！');
			}
		}
		
	}

?>