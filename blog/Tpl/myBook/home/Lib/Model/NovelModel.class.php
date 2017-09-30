<?php
	class NovelModel extends RelationModel{
		//关联模型
		protected $_link=array(
			'Class'=> array(
				'mapping_type'=>BELONGS_TO,
				//'class_name'=>'class',
				
				'foreign_key'=>'novel_cid',
				//'mapping_name'=>'c',
				//'mapping_fields'=>'classname',
				'as_fields'=>'classname,classpy',
			),
	
	
		);
		
		
	}

?>