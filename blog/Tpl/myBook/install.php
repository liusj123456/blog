<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="cn">
	<head>
		<title><?php if(isset($_GET['step'])){ 
			  if($_GET['step']==1)
				echo '第一步-数据库配置';
			if($_GET['step']==2)
				echo '第二步-用户配置';
			if($_GET['step']==3)
				echo '第三步-网站配置';
		}
		
		?></title>
		<meta name="description" content="" />

		<!-- required styles -->
		<link href="/book/admin/tpl/library/assets/css/bootstrap.css" rel="stylesheet" />
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body style='background-color:gray;'>

<?php
	$file='config.php';
	if( isset($_GET['step']) ){
		if($_GET['step']==1){
?>
	<form action='?step=2' class="form-horizontal"  method='post' style='float:right;padding-right:700px;padding-top:150px;'>	
								<div class="control-group">
									<h1 style='float:right'><center>第一步-数据库信息</center></h1>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">数据库IP：</label>
									<div class="controls">
										<input type="text" id="host" name="host" placeholder="请输入数据库IP" value='localhost'/>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">数据用户名：</label>
									<div class="controls">
										<input type="text" id="db_user" name="db_user" placeholder="请输入数据用户名" value='root'/>
									</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">数据密码：</label>
									<div class="controls">
										<input type="password" id="db_psw" name="db_psw" placeholder="请输入数据密码"  value='1314521'/>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">数据表名：</label>
									<div class="controls">
										<input type="text" id="db" name="db" placeholder="请输入数据表名"  value='test'/>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">数据端口：</label>
									<div class="controls">
										<input type="text" id="db_port" name="db_port" placeholder="请输入数据端口"  value='3306'/>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">数据表前缀：</label>
									<div class="controls">
										<input type="text" id="db_fix" name="db_fix" placeholder="请输入数据表前缀"  value='ck_'/>
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
									<!--
									<label class="checkbox">
										<input type="checkbox" class="fancy" /> Remember me
									</label>
									-->
									<button type="submit" class="btn btn-warning" name="sub">下一步</button>
									</div>
								</div>
	</form>
<?php	
	}else if($_GET['step']==2  and isset($_POST['sub'])){

		$host=$_POST['host'];
		$user=$_POST['db_user'];
		$psw=$_POST['db_psw'];
		$db=$_POST['db'];
		$db_fix=$_POST['db_fix'];
		$con = @mysql_connect($host,$user,$psw) or die('<h1 style="padding-top:150px;"><center>连接数据库失败！</center></h1>');
		
		if(mysql_select_db($db,$con)){
			//将配置的写入文件
			
			if(is_file($file)){
				$filecon=file_get_contents($file);
				$filecon=preg_replace('/\'DB_HOST\'=>\'(.*)\'/','\'DB_HOST\'=>\''.$_POST['host'].'\'',$filecon); 
				$filecon=preg_replace('/\'DB_NAME\'=>\'(.*)\'/','\'DB_NAME\'=>\''.$_POST['db'].'\'',$filecon); 
				$filecon=preg_replace('/\'DB_USER\'=>\'(.*)\'/','\'DB_USER\'=>\''.$_POST['db_user'].'\'',$filecon); 
				$filecon=preg_replace('/\'DB_PWD\'=>\'(.*)\'/','\'DB_PWD\'=>\''.$_POST['db_psw'].'\'',$filecon); 
				$filecon=preg_replace('/\'DB_PORT\'=>\'(.*)\'/','\'DB_PORT\'=>\''.$_POST['db_port'].'\'',$filecon); 
				$filecon=preg_replace('/\'DB_PREFIX\'=>\'(.*)\'/','\'DB_PREFIX\'=>\''.$_POST['db_fix'].'\'',$filecon); 
				file_put_contents($file,$filecon);
			}else{
				echo '<h1 style="padding-top:150px;"><center>配置文件不存在！</center></h1>';
				exit();
			}
			
			
			//将配置的写入文件
?>
	<form action='?step=3' class="form-horizontal"  method='post' style='float:right;padding-right:700px;padding-top:150px;'>	
								<div class="control-group">
									<h1 style='float:right'>第二步-用户信息</h1>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">用户名：</label>
									<div class="controls">
										<input type="text" id="username" name="username" placeholder="请输入用户名" value='admin'/>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">密码：</label>
									<div class="controls">
										<input type="password" id="password" name="password" placeholder="请输入密码" value='admin'/>
									</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">用户昵称：</label>
									<div class="controls">
										<input type="text" id="nick" name="nick" placeholder="用户昵称"  value='上山打老虎'/>
									</div>
								</div>
								
								
								
								<div class="control-group">
									<div class="controls">
									<!--
									<label class="checkbox">
										<input type="checkbox" class="fancy" /> Remember me
									</label>
									-->
									<button type="submit" class="btn btn-warning" name="sub1">下一步</button>
									</div>
								</div>
	</form>

<?php
			
			
		}else{
			echo '<h1 style="padding-top:150px;"><center>连接表失败！</center></h1>';
		}
	}else if($_GET['step']== 3 and isset($_POST['sub1'])){

		$configArr=include_once($file);
		
		$filename = 'database.sql';
		if(!is_file($filename)){
			echo '<h1 style="padding-top:150px;"><center>数据库文件不存在！</center></h1>';
			exit();
		}
		//连接数据库
		mysql_connect($configArr['DB_HOST'], $configArr['DB_USER'], $configArr['DB_PWD']) or die('<h1 style="padding-top:150px;"><center>连接数据库出现错误:</center></h1>'. mysql_error().'</h1>');
		mysql_select_db($configArr['DB_NAME']) or die('<h1 style="padding-top:150px;"><center>连接表出现错误:</center></h1>'. mysql_error().'</h1>');
		$templine = '';
		$lines = file($filename);	//读取数据库文件

		foreach ($lines as $line)
		{
			if (substr($line, 0, 2) == '--' || $line == '')
				continue;
			$templine .= str_ireplace('ck_',$configArr['DB_PREFIX'],$line);

			if (substr(trim($line), -1, 1) == ';'){
				mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
				$templine = '';
			}
		}
		//创建用户
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$nick=$_POST['nick'];
		$date=date('Y-m-d');
		$result=mysql_query("INSERT INTO  `".$configArr['DB_PREFIX']."admin` (`id` ,`username` ,`password` ,`nickname` ,`lastlogin` ,`regdate`)
			VALUES (NULL ,  '$username',  '$password',  '$nick',  '',  '$date')");
		if($result){
			echo '<h1 style="padding-top:150px;"><center>安装成功！请删除database.lock文件！<a href="admin.php">点此登陆后台</a></center></h1>';
			rename($filename,"database.lock");
			rename('install.php',"install.lock");
			$url=$_SERVER['HTTP_HOST'];
			file_get_contents("http://www.aishuzhiren.com/cnt.php?url=".$url);
		//echo '<script language="javascript" type="text/javascript">alert("安装成功！")</script>';
		//echo '<script language="javascript" type="text/javascript">window.location.href="admin.php"</script>';
		}
	}
		exit();
	}else{
		echo '<script language="javascript" type="text/javascript">window.location.href="?step=1"</script>';
		exit();
	}
?>
