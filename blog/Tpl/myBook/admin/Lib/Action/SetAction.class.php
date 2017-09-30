<?php
	class SetAction extends CommonAction{
		public function index(){
			$s=M('site');
			if(isset($_POST['sub'])){
				$isUpdate=$s->where(1)->save($_POST);
				if($isUpdate){
					$this->success('修改网站信息成功！');
				}else{
					$this->error('修改网站信息失败！');
				}
			}else{
				$this->assign('pagename','网站设置');
				$this->assign('checkset',' active');
				$siteInfo=$s->find(1);
				$this->assign('siteinfo',$siteInfo);
				$this->display();
			}
		}
		
		public function ad(){
			$ggfile='Public/js/gg.js';
			$ggcon=file_get_contents($ggfile);
			if(isset($_POST['sub'])){	//修改广告
				$ggcon=preg_replace('/top\(\){(.*)}/Us','top(){'.$_POST['top'].'}',$ggcon);
				$ggcon=preg_replace('/bottom\(\){(.*)}/Us','bottom(){'.$_POST['bottom'].'}',$ggcon);
				file_put_contents($ggfile,$ggcon);
				$this->success('修改广告成功');
			}else{
				$this->assign('pagename','网站广告设置');
				$this->assign('checkset',' active');
				if( preg_match('/top\(\){(.*)}/Us',$ggcon,$topad) ){
					$ads['top']=$topad[1];
				}
				if( preg_match('/bottom\(\){(.*)}/Us',$ggcon,$topad) ){
					$ads['bottom']=$topad[1];
				}
				$this->assign('ads',$ads);
				$this->display();
			}
		}
	
	}

?>