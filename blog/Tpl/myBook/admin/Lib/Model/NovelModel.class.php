<?php
	class NovelModel extends RelationModel{
		//规则
		protected $_validate=array(
			array('novelname','require','小说名称不能为空！',0,'',3),
			array('novelname','','小说已经存在！',0,'unique',3),
			
			array('novelauthor','require','小说作者不能为空！',0,'',3),
			
			array('novelpy','checkpy','拼音化只能填写字母！',0,'callback',3),//regex
			array('novelpy','','拼音化已经存在！',0,'unique',3),
			
			array('clicktoday','/^([0-9]+)?$/i','今日点击不是数字！',0,'regex',3),
			array('clickmonth','/^([0-9]+)?$/i','本月点击不是数字！',0,'regex',3),
			array('clicksum','/^([0-9]+)?$/i','总点击不是数字！',0,'regex',3),
			
			
			
		);
		function checkpy($novelpy){
			
			if($novelpy != null){
				if(preg_match('/^[a-z\d]+$/i',$novelpy) ==false){
					return false;
				}else{
					return true;
				}
			}
		}
		
		//关联模型
		protected $_link=array(
			'Class'=> array(
				'mapping_type'=>BELONGS_TO,
				//'class_name'=>'class',
				
				'foreign_key'=>'novel_cid',
				//'mapping_name'=>'c',
				'mapping_fields'=>'classname',
				'as_fields'=>'classname',
			),
		
		);
		
	
	}

?>