<?php
class BlogAction extends CommonAction {
    public function blogList(){
		$this->display();
    }
	public function blogAdd(){
		if(IS_POST){
			p($_POST);die;
		}else{
			$this->display();
		}
		
		
    }
}