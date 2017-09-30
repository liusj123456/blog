<?php
	class LinksModel extends Model{
		//规则
		protected $_validate=array(
			array('linkname','require','链接名称不能为空！',0,'',3),
			array('linkurl','require','链接地址不能为空！',0,'',3),
			array('linkweight','/^([0-9]+)?$/i','链接的权重不是数字！',0,'regex',3),
			
			array('linkurl','/^(http|https|ftp):\/\//','请在前面加上http://或者https://',0,'regex',3),
			array('linkurl','/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i','域名格式不正确！',0,'regex',3),
			
		);
	}

?>