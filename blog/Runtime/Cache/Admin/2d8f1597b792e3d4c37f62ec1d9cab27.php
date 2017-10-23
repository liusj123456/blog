<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>登录</title>
		<link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="__PUBLIC__/css/login.css" />
		<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
	</head>

	<body><!-- class="beg-login-bg" -->
		<div class="beg-login-box">
			<header>
				<h1>后台登录</h1>
			</header>
			<div class="beg-login-main">
				<form action="<?php echo U(GROUP_NAME.'/Login/checkLogin');?>" id='loginForm' class="layui-form" method="POST">
				<input name="__RequestVerificationToken" type="hidden" value="fkfh8D89BFqTdrE2iiSdG_L781RSRtdWOH411poVUWhxzA5MzI8es07g6KPYQh9Log-xf84pIR2RIAEkOokZL3Ee3UKmX0Jc8bW8jOdhqo81" />
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe612;</i>
                    </label>
						<input type="text" name="username" lay-verify="userName" autocomplete="off" placeholder="登录名" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
						<input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="密码" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
						<input type="text" name="verify" lay-verify="verify" autocomplete="off" placeholder="验证码" style='width:110px;height:38px;line-height:38px'>
					    <img src="<?php echo U(GROUP_NAME.'/Login/verify','','');?>" id='verify' onclick="change(this.src);" style="cursor:pointer;"/>
					</div>
					<div class="layui-form-item">
						<div class="beg-pull-left beg-login-remember">
							<label>记住帐号？</label>
							<input type="checkbox" name="rememberMe" value="true" lay-skin="switch" checked title="记住帐号">
						</div>
						<div class="beg-pull-right">
							<button class="layui-btn layui-btn-primary" lay-submit lay-filter="login">
                            <i class="layui-icon">&#xe650;</i> 登录
                        </button>
						</div>
						<div class="beg-clear"></div>
					</div>
				</form>
			</div>
			<footer>
				<p>Beginner © www.zhengjinfan.cn</p>
			</footer>
		</div>
		<script>
			window.onload=function(){
				document.getElementById('verify').src='<?php echo U(GROUP_NAME.'/Login/verify','','');?>/'+Math.random();
			}
			function change(obj){
					document.getElementById('verify').src=obj+'/'+Math.random();
				}
			layui.use(['layer', 'form'], function() {
				var layer = layui.layer,
					$ = layui.jquery,
					form = layui.form();
					
				form.on('submit(login)',function(data){
					
					document.getElementById('loginForm').submit();
					return false;
				});
			});
		</script>
	</body>

</html>