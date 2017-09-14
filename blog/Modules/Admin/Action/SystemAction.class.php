<?php
class SystemAction extends CommonAction {
    public function menu(){
		$list = M('menu')->select();
		$this->assign('menu',$list);
		$this->display();
    }
	public function menuAdd(){
		
		if(IS_POST){
			$data = array(
				'pid'=>I('pid'),
				'url'=>I('url'),
				'name'=>I('name'),
				'level'=>I('level'),
				'display'=>I('display'),
				'sort'=>I('sort'),
				'addUser'=>session('username'),
				'addTime'=>time()
			);
			if(empty($data['name'])){
				$this->error('名称不为空');
			}
			if(empty($data['sort'])){
				$this->error('排序不为空');
			}
			if(empty($data['url']) && $data['pid']!=0){
				$this->error('地址不为空');
			}
			$info=M('menu')->add($data);
			if($info){
				$this->success('添加成功',U(GROUP_NAME.'/System/menu'));
			}else{
				$this->error('添加失败');		
			}
		}else{
			$this->display();
		}
    }
	public function menuEdit(){
		$id=$_GET['id'];
		if(IS_POST){
			
			$data = array(
				'id'=>I('id'),
				'url'=>I('url'),
				'name'=>I('name'),
				//'level'=>I('level'),
				'display'=>I('display'),
				'sort'=>I('sort'),
				//'addUser'=>session('username'),
				//'addTime'=>time()
			);
			if(empty($data['name'])){
				$this->error('名称不为空');
			}
			if(empty($data['sort'])){
				$this->error('排序不为空');
			}
			if(empty($data['url']) && $data['pid']!=0){
				$this->error('地址不为空');
			}
			$info=M('menu')->save($data);
			//echo M('menu')->getLastSql();die;
			if($info){
				$this->success('修改成功',U(GROUP_NAME.'/System/menu'));
			}else{
				$this->error('修改失败');		
			}
		}else{
			$info=M('menu')->where(array('id'=>$id))->find();
			$this->assign('vo',$info);
			$this->display();
		}
    }
}