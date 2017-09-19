<?php
class IndexAction extends Action {
    public function index(){
		//echo "前台";die;
		//$this->error('成功');die;
		$this->menus = M('index')->order('sort asc')->select();
		//p($this->menus);die;
		$this->display();
    }
}