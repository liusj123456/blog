<?php
	class VolModel extends Model{
		//规则
		protected $_validate=array(
			array('volname','require','分卷名称不能为空！',0,'',3),
		);
		
		
	
	}

?>