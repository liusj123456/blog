<?php
class SystemAction extends CommonAction {
    public function menu(){
		if(ACTION_NAME=='menu'){
			$list = M('menu')->order('sort asc')->select();
			$parents = M('menu')->where('pid = 0')->order('sort asc')->select();
			//$menu = selectParents($list['id'],);
			//$list = M('menu')->where('pid = 0')->order('sort asc')->select();
			$menu =array();
			//var_dump($list);die;
			foreach($parents as $key=>$val){			
				$child = M('menu')->where(array('pid'=>$val['id']))->order('sort asc')->select();
				/* foreach($child as $kk=>$vv){
					$parents[$key][] = $child;
				} */
				
				foreach($child as $k=>$v){//二级
					$child[$k]['name'] = '----'.$v['name'];
					$children = M('menu')->where(array('pid'=>$v['id']))->order('sort asc')->select();
						foreach($children as $kk=>$vv){//三级
							$children[$kk]['name'] = '--------'.$vv['name'];
						}
					$child[$k]['son'] = $children;
				} 
				$parents[$key]['son'] = $child;
			}
			//echo "<pre>".print_r($parents,true)."<pre>";die;
			$this->assign('menu',$parents);
		}
		$this->display();
    }
	public function menuDel(){
		$info=M('menu')->where(array('id'=>$_GET['id']))->delete();
		if($info){
			$this->success('删除成功',U(MODULE_NAME.'/menu'));
		}else{
			$this->error('删除失败',U(MODULE_NAME.'/menu'));		
		}
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
			if(M('menu')->where(array('name'=>$data['name']))->find()){
				$this->error('名称已存在');
			}
			$info=M('menu')->add($data);
			if($info){
				$this->success('添加成功',U(GROUP_NAME.'/System/menu'));
			}else{
				$this->error('添加失败');		
			}
		}else{
			$level = !empty($_GET['level'])?($_GET['level']+1):1;
			$pid = !empty($_GET['id'])?$_GET['id']:0;
			$this->assign('level',$level);
			$this->assign('pid',$pid);
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