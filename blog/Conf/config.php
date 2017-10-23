<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'=>array(
		'__STATIC__'=>__ROOT__.'/Static',
		'__Ueditor__'=>__ROOT__.'/Ueditor',
	),	
	'DB_DSN'=>'mysql://root:@localhost:3306/blog',
	'DB_PREFIX'=>'blg_',
	'DB_TYPE'=>'mysql',
	'URL_MODEL'=>'1',//1pathinfo模式2rewrite
	'APP_GROUP_LIST'=>'Index,Admin',
	'APP_GROUP_MODE'=>'1',//分组模式
	'APP_GROUP_PATH'=>'Modules',//分组模块
	'DEFAULT_GROUP'=>'Index',
	'NOT_AUTH_MODULE'=>'Index',
	'LOAD_EXT_CONFIG'=>'verify',
	//'SHOW_PAGE_TRACE' =>true,
	//'ACTION_SUFFIX'=>'run',
	//'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
	//'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
	//'URL_HTML_SUFFIX'=>'html',
	//'URL_ROUTER_ON'=>true,                           // 开启路由
   // 'URL_ROUTE_RULES'=>array(                          // 路由规则
    //    'index/:p\d'=>'Index/Index/index'//首页路由
	//	),
	);
?>