<?php
	class EmptyAction extends Action{
		public function index(){
			$this->error('错误的访问！！');
		}
		public function _empty(){
			$this->error('错误的访问方法！！');
		}
	}
?>