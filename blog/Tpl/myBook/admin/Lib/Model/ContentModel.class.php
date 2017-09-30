<?php
	class ContentModel extends RelationModel{
		
		
		//关联模型
		protected $_link=array(
			'Vol'=> array(
				'mapping_type'=>BELONGS_TO,
				//'class_name'=>'class',
				
				'foreign_key'=>'con_vid',
				//'mapping_name'=>'c',
				'mapping_fields'=>'volname',
				'as_fields'=>'volname',
			),
		
		);
		
	
	}

?>