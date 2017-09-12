<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'=>array(
		'__STATIC__'=>__ROOT__.'/static',
	),	
	'DB_DSN'=>'mysql://root:@localhost:3306/test',
	'DB_PREFIX'=>'blg_',
	'DB_TYPE'=>'mysql',
	'URL_MODE'=>'1',//pathinfo模式
	'APP_GROUP_LIST'=>'Index,Admin',
	'APP_GROUP_MODE'=>'1',//分组模式
	'APP_GROUP_PATH'=>'Modules',//分组模块
	'DEFAULT_GROUP'=>'Index',
	'NOT_AUTH_MODULE'=>'Index',
	'LOAD_EXT_CONFIG'=>'verify',
);
?>