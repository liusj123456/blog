<?php
	class AdminModel extends Model{
		//规则
		protected $_validate=array(
			array('username','require','用户名不能为空！',0,'',3),
			array('password','require','密码不能为空！',0,'',3),
			array('nickname','require','昵称不能为空！',0,'',3),
			
			array('username','','用户名已经存在！',0,'unique',3),
		);
	
	}

?>