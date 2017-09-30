<?php
	$arr1=require './config.php';

	$arr2=array(
		'DEFAULT_THEME'=>'novel',//设置默认模板主题
		'HTML_CACHE_ON'=>true,
		'HTML_FILE_SUFFIX'  =>  '.html', // 设置静态缓存后缀
		'HTML_CACHE_RULES'=>array(
			'index:look'=>array('{:action}/{name}/{$_SERVER.REQUEST_URI|md5}',600),	//目录和内容页缓存10分钟
			'index:index'=>array('{:action}/{$_SERVER.REQUEST_URI|md5}',600),	//首页缓存10分钟{:module}/
			'index:cls'=>array('{:action}/{$_SERVER.REQUEST_URI|md5}',1200),	//栏目页缓存20分钟
			//'index:search'=>array('',false),	//搜索页不进行缓存
			//'*'=>array('{:action}/{$_SERVER.REQUEST_URI|md5}',600),	//缓存10分钟{:module}/
		)
	);
	
	return array_merge($arr1,$arr2);
?>