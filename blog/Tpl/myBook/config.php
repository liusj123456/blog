<?php
return array(
	'TMPL_L_DELIM'=>'<{', //修改左定界符
	'TMPL_R_DELIM'=>'}>', //修改右定界符
	
	'DB_TYPE'=>'mysql',   //设置数据库类型
	'DB_HOST'=>'localhost',//设置主机
	'DB_NAME'=>'test1',//设置数据库名
	'DB_USER'=>'root',    //设置用户名
	'DB_PWD'=>'1314521',        //设置密码
	'DB_PORT'=>'3306',   //设置端口号
	'DB_PREFIX'=>'ccc_',  //设置表前缀
	'SHOW_PAGE_TRACE'=>false,//开启页面Trace
	'URL_CASE_INSENSITIVE'=>true,//url不区分大小写	
	'URL_ROUTER_ON'=>true,	//开启路由
	
	/*'URL_ROUTE_RULES'=>array(
	
		'/^\/book\/(\w+)\/(\w+)\/$/'=>'index.php/Index/look?name=:1&id=:2',
		'/^book\/(\w+)\/$/'=>'index.php/Index/look?name=:1',
		
		
		),*/
);
?>