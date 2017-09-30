<?php
	class CommonAction extends Action{
		public function _initialize(){
			if( !isset($_SESSION['username']) or !isset($_SESSION['password']) or $_SESSION['username']=='' or $_SESSION['password']==''){
				$this->error("你还未登陆!",U('Login/index'));
				exit();
			}
			
			//查询当前用户信息
			$m=M('Admin');
			$where['username']=$_SESSION['username'];
			$nicks=$m->field('nickname,id')->where($where)->find();
			$this->assign('mynickname',$nicks['nickname']);
			$this->assign('userid',$nicks['id']);
			
			//查询小说数量
			$n=M('Novel');
			$NovelCount=$n->count();
			$this->assign('NovelCount',$NovelCount);
			
			//查询小说页面数量
			$c=M('Content');
			$ConCount=$c->count();
			$this->assign('ConCount',$ConCount);
			
			//查询小说总访问量
			$ClickCount=$n->sum('clicksum');
			$this->assign('ClickCount',$ClickCount);
			
			//查询小说今日访问量
			$ClickCountToday=$n->sum('clicktoday');
			$this->assign('ClickCountToday',$ClickCountToday);
			
			//查询小说本月访问量
			$ClickCountMonth=$n->sum('clickmonth');
			$this->assign('ClickCountMonth',$ClickCountMonth);
			
		}
	}

?>