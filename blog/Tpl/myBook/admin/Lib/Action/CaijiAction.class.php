<?php
	class CaijiAction extends CommonAction{
		public function index(){
			$this->assign('pagename','所有采集规则');
			$this->assign('checkcaiji',' active');
			
			$cj=M('Caiji');
			$count=$cj->count();
			import('ORG.UTIL.Page');
			
			$page=new Page($count,10);
			$pageshow=$page->show();
			$pageshow=str_replace('<a ','<a class="btn btn-primary" ',$pageshow);
			$this->assign('pageshow',$pageshow);
			
			$cjArr=$cj->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
			
			foreach($cjArr as $cja){
				//查询所属小说
				$N=M('Novel');
				$novelinfo=$N->field('novelname')->find($cja['novelid']);
				//查询分卷名称
				$V=M('Vol');
				$volinfo=$V->field('volname')->find($cja['novelvolid']);
				//$cjinfos[]=array_merge(array('novelname'=>$novelinfo['novelname'],'volname'=>$volinfo['volname']),$cja);
				$cjinfos[]=array_merge($novelinfo,$volinfo,$cja);
			}
			
			$this->assign('cjinfos',$cjinfos);
			$this->display();
		
		}
		protected function getUrlContent($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 25);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
		}
		
		//多项采集或者全部采集
		public function manycaiji(){
			echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
			//id=234,234 id=all
			$idArr=trim($_GET['id'],',');
			$idArrs=explode(",",$idArr);
			if( isset($_GET['nowid']) and !isset($_GET['pageid']) ){
				$cj=M('Caiji');
				$caijiInfo=$cj->find($_GET['nowid']);	
		
				$where['con_nid']=$caijiInfo['novelid'];
				$where['con_vid']=$caijiInfo['novelvolid'];
				$C=M('Content');
				$newzhang=$C->where($where)->field('con_name')->order('id desc')->find();
			
				//取对方的章节及内容
				$content=$this->getUrlContent($caijiInfo['caijiurl']);
				//$content = @file_get_contents($caijiInfo['caijiurl']);
				$content=mb_convert_encoding($content , "UTF-8", "GBK"); 
				$find=false;

				$reu='/<li><a href="(.*).html">(.*)<\/a><\/li>/U';
				if(preg_match_all($reu,$content,$conArr)){
					$i=0;
					foreach($conArr[2] as $conInfo){
						if($find){
							$nextName=$conInfo;
							break;
						}
						//echo $conInfo."------".$newzhang['con_name'].'<br>';
						if($conInfo == $newzhang['con_name']){
							$find=true;
						}
						if(strstr($newzhang['con_name'],$conInfo)){
							$find=true;
						}
						$i=$i+1;
					}
					
					if($find == false){
						$i=0;
					}
					
					if($conArr[1][$i]){
						$this->success('分析成功对方章节，即将采集！',U('Caiji/manycaiji/')."/id/".$_GET['id']."/nowid/".$_GET['nowid']."/pageid/".$conArr[1][$i]);
						//跳转采集
					}else{
						$last=end($idArrs);
						foreach($idArrs as $ids){
							if($_GET['nowid'] == $ids and $_GET['nowid'] !=$last ){//取下一个ID
								$nextnovelid=current($idArrs);
								$nextUrl=U('Caiji/manycaiji/')."/id/".$_GET['id']."/nowid/".$nextnovelid;
								$this->success("本小说采集已经完成！马上跳到下一本小说继续采集！",$nextUrl,5);
								break;
							}else if($_GET['nowid'] == $last){
								echo "<h1>所有小说采集已经完成！！</h1><a href='".U('Caiji/index')."'><h3>点此返回</h3></a>";
								
								exit();
							}
							
						}
						
					}
				}else{
					echo "<h1>出现错误，传参错误！匹配失败！</h1>";
				}
			}else if( isset($_GET['pageid'])){
				$cj=M('Caiji');
				$caijiInfo=$cj->find($_GET['nowid']);
				
				$caijiInfo['caijiurl']=str_ireplace('index.html','',$caijiInfo['caijiurl']);
				$caijiurl=$caijiInfo['caijiurl'].$_GET['pageid'].".html";
				$content=$this->getUrlContent($caijiurl);
				//$content = @file_get_contents($caijiurl);
				$content=mb_convert_encoding($content , "UTF-8", "GBK");
				
				
				//匹配
				if(preg_match('/<div id="title"><h1>(.*)<\/h1><\/div>/Us',$content,$titles)){
					$title=trim($titles[1]);
				}else{
					echo "<h1>标题匹配不成功!</h1>";exit();
				}
				
				if(preg_match('/<div id="content">(.*)<\/div>/Us',$content,$con)){
					$novelcon=trim($con[1]);
					$novelcon=str_ireplace("39xs",'',$novelcon);
					$novelcon=str_ireplace("39小说网",'',$novelcon);
				}else{
					echo "<h1>内容匹配不成功!</h1>";exit();
				}
				
				
				//入库
				$C=M('Content');
				$where='`con_nid`='.$caijiInfo['novelid'].' and `con_name` LIKE "'.$title.'"';
				$haveThis=$C->where($where)->find();
				if(!is_array($haveThis)){
					$addInfo['con_nid']=$caijiInfo['novelid'];
					$addInfo['con_vid']=$caijiInfo['novelvolid'];
					$addInfo['con_name']=$title;
					$addInfo['con_text']=$novelcon;
					$insert=$C->add($addInfo);
					
					if($insert==false){
						echo "<h1>".$addInfo['con_name']."本条记录插入失败</h1>";exit();
					}else{
						//还要更新时间
						$N=M('Novel');
						$novelin['update_time']=time();
						$novelin['id']=$caijiInfo['novelid'];
						$N->save($novelin);
					
					}
					
				}
				
				//匹配下一页
				if(preg_match('/返回目录<\/a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="(.*)">下一页<\/a>/U',$content,$nexts)){
					$last=end($idArrs);
					$nextid=str_ireplace(".html","",trim($nexts[1]));
					if($nextid=="./"){
						foreach($idArrs as $ids){
							if($_GET['nowid'] == $ids and $_GET['nowid'] !=$last ){//取下一个ID
								$nextnovelid=current($idArrs);
								$nextUrl=U('Caiji/manycaiji/')."/id/".$_GET['id']."/nowid/".$nextnovelid;
								$this->success("本小说采集已经完成！马上跳到下一本小说继续采集！",$nextUrl,5);
								break;
							}else if($_GET['nowid'] == $last){
								echo "<h1>所有小说采集已经完成！！</h1><a href='".U('Caiji/index')."'><h3>点此返回</h3></a>";
								exit();
							}
							
						}
						exit();
					}
					
				}else{
					echo "<h1>下一页ID匹配不成功!</h1>";
					exit();
				}
				$nextUrl=U('Caiji/manycaiji/')."/id/".$_GET['id']."/nowid/".$_GET['nowid']."/pageid/".$nextid;
				
				
				//跳转到下一条
				$this->success($title." 采集成功，即将跳转到下一条",$nextUrl,2);
			
			}
			
			//多项采集
			if(isset($_GET['id']) and $_GET['id']=='all'){	//全部采集
				$idArrs="";
				$CJ=M('caiji');
				$caijis=$CJ->field('id')->select();
				
				foreach($caijis as $caijiID){
					$idArrs=$idArrs.$caijiID['id'].",";
				}
				$this->success('取得所有采集规则！马上跳转',U('Caiji/manycaiji/')."/id/".$idArrs,3);
		
			}else if ( isset($_GET['id']) and !isset($_GET['nowid']) ){	//设置了id但是没有设置现在要采集的小说ID
				$this->success('取得当前要采集的规则！马上跳转',U('Caiji/manycaiji/')."/id/".$_GET['id']."/nowid/".$idArrs[0],3);
			}
			//get传参不能大于2KB，1字节(Byte)=1024位(bit)	1KB=1024Byte 2KB=2048B;那可以传2048个数字一个小说是3位能传上千本小说
		}
		
		//单本书采集
		public function caiji(){
			echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
			
			if(!isset($_GET['pageid'])){
				//比照自己的章节和对方的章节
				$cj=M('Caiji');
				$caijiInfo=$cj->find($_GET['id']);	
				
				$where['con_nid']=$caijiInfo['novelid'];
				$where['con_vid']=$caijiInfo['novelvolid'];
				$C=M('Content');
				$newzhang=$C->where($where)->field('con_name')->order('id desc')->find();
				
				//取对方的章节及内容
				$content=$this->getUrlContent($caijiInfo['caijiurl']);
				//$content = @file_get_contents($caijiInfo['caijiurl']);
				$content=mb_convert_encoding($content , "UTF-8", "GBK"); 
				$find=false;

				$reu='/<li><a href="(.*).html">(.*)<\/a><\/li>/U';
				if(preg_match_all($reu,$content,$conArr)){
					$i=0;
					foreach($conArr[2] as $conInfo){
						if($find){
							$nextName=$conInfo;
							break;
						}
						//echo $conInfo."------".$newzhang['con_name'].'<br>';
						if($conInfo == $newzhang['con_name']){
							$find=true;
						}
						if(strstr($newzhang['con_name'],$conInfo)){
							$find=true;
						}
						$i=$i+1;
					}
					
					if($find == false){
						$i=0;
					}
					
					if($conArr[1][$i]){
						$this->success('分析成功对方章节，即将采集！',U('Caiji/caiji/')."/id/".$_GET['id']."/pageid/".$conArr[1][$i]);
						//跳转采集
					}else{
						echo "<h1>采集完毕！</h1>";
					}
				}else{
					echo "<h1>出现错误，传参错误！匹配失败！</h1>";
				}
			}else{
				$cj=M('Caiji');
				$caijiInfo=$cj->find($_GET['id']);
				
				$caijiInfo['caijiurl']=str_ireplace('index.html','',$caijiInfo['caijiurl']);
				$caijiurl=$caijiInfo['caijiurl'].$_GET['pageid'].".html";
				$content=$this->getUrlContent($caijiurl);
				//$content = @file_get_contents($caijiurl);
				$content=mb_convert_encoding($content , "UTF-8", "GBK");
				
			
				
				//匹配
				if(preg_match('/<div id="title"><h1>(.*)<\/h1><\/div>/Us',$content,$titles)){
					$title=trim($titles[1]);
				}else{
					echo "<h1>标题匹配不成功!</h1>";exit();
				}
				
				if(preg_match('/<div id="content">(.*)<\/div>/Us',$content,$con)){
					$novelcon=trim($con[1]);
					$novelcon=str_ireplace("39xs",'',$novelcon);
					$novelcon=str_ireplace("39小说网",'',$novelcon);
				}else{
					echo "<h1>内容匹配不成功!</h1>";exit();
				}
				
				
				//入库
				$C=M('Content');
				$where='`con_nid`='.$caijiInfo['novelid'].' and `con_name` LIKE "'.$title.'"';
				$haveThis=$C->where($where)->find();
				if(!is_array($haveThis)){
					$addInfo['con_nid']=$caijiInfo['novelid'];
					$addInfo['con_vid']=$caijiInfo['novelvolid'];
					$addInfo['con_name']=$title;
					$addInfo['con_text']=$novelcon;
					$insert=$C->add($addInfo);
					
					if($insert==false){
						echo "<h1>".$addInfo['con_name']."本条记录插入失败</h1>";exit();
					}
				}
				
				//匹配下一页
				if(preg_match('/返回目录<\/a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="(.*)">下一页<\/a>/U',$content,$nexts)){
					
					$nextid=str_ireplace(".html","",trim($nexts[1]));
					if($nextid=="./"){
						echo "<h1>采集已经完成！</h1>";
						exit();
					}
					
				}else{
					echo "<h1>下一页ID匹配不成功!</h1>";
					exit();
				}
				$nextUrl=U('Caiji/caiji/')."/id/".$_GET['id']."/pageid/".$nextid;
				
				//还要更新时间
				$N=M('Novel');
				$novelin['update_time']=time();
				$novelin['id']=$caijiInfo['novelid'];
				$N->save($novelin);
				//跳转到下一条
				$this->success($title." 采集成功，即将跳转到下一条",$nextUrl,2);
				
			}
		}
		
		
		public function del(){
			$CJ=M('Caiji');
			$where['id']=$_GET['id'];
			$isDel=$CJ->where($where)->delete();
			if($isDel){
				$this->success('删除成功！',U('Caiji/index'));
			}else{
				$this->error('删除失败！');
			
			}
		}
		
		//批量删除采集规则操作
		public function delMany(){
			$m=M('Caiji');
			$idArr=trim($_GET['id'],',');
			$where='id in ('.$idArr.')';
			$delstate=$m->where($where)->delete();
			if($delstate > 0){
				$this->success('删除采集规则成功！',U('Caiji/index'));
			}else{
				$this->error('删除采集规则失败！',U('Caiji/index'));
			}
		}
		
		
		public function add(){
			$this->assign('pagename','添加采集规则');
			$this->assign('checkcaiji',' active');
			$this->display();
		}
		public function addcaiji(){
			if(isset($_POST['allid']) and $_POST['allid'] != null ){
				if(preg_match('/\d:\d/',$_POST['allid']) == false){
					$this->error('小说ID和分卷ID格式错误！');
				}else{
					//查询小说和分卷是否对应
					$arrid=split(":",$_POST['allid']);
					$w['vol_nid']=$arrid['0'];
					$w['id']=$arrid['1'];
					$V=M('Vol');
					
					$varr=$V->where($w)->select();
					if(! is_array($varr)){
						$this->error('无此小说或者分卷！');
					}
					
				}
			}else{
				$this->error('小说ID和分卷ID不能为空！');
			}
			
			if(isset($_POST['caijiname']) and $_POST['caijiname'] != null ){
				$cjinfo['caijiname']=$_POST['caijiname'];
			}else{
				$this->error('本条规则不能为空！');
			}
			
			if($_POST['caijiurl'] != null ){
				if(preg_match('/\w+/',$_POST['caijiurl']) == false){
					$this->error('对方小说URL应该为字母或者数字！');
				}
				$cjinfo['caijiurl']=$_POST['caijiurl'];
			}else{
				$this->error('对方小说URL不能为空！');
			}
			
			$cjinfo['novelid']=$w['vol_nid'];
			$cjinfo['novelvolid']=$w['id'];
			
			$caiji=M('Caiji');
			$isInsert=$caiji->add($cjinfo);
			if($isInsert){
				$this->success('添加规则成功！');
			}else{
				$this->error('添加规则失败！');
			}
		}
	
	}

?>