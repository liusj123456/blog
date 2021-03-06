<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blog后台管理首页</title>

		<meta name="description" content="This is page-header (.page-header &gt; h1)" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="__PUBLIC__/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/assets/css/ace.min.css" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="__PUBLIC__/assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="__PUBLIC__/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/assets/css/ace-rtl.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-ie.min.css" />
		<![endif]-->
		<!--[if lte IE 8]>
		<script src="__PUBLIC__/assets/js/html5shiv.min.js"></script>
		<script src="__PUBLIC__/assets/js/respond.min.js"></script>
		<![endif]-->
		<!-- <script src="__PUBLIC__/assets/js/ace-extra.min.js"></script> -->
		<script type="text/javascript" src="__PUBLIC__/assets/js/ace-extra.min.js"></script>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/page.css" />
	</head>
	
	<body class="no-skin" <?php echo (session('bg')); ?>>
		<div id="navbar" class="navbar navbar-default" style="position:fixed;top:0;left:0;width:100%;z-index:222;">
			<div class="navbar-container" id="navbar-container">

				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="index.html" class="navbar-brand">
						<small>
							<img src="__PUBLIC__/assets/avatars/crazy2.png" alt="" />
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									13条未读信息
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<img src="__PUBLIC__/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">B2C:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="__PUBLIC__/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">积分商城:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="__PUBLIC__/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">政府机票采购:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="__PUBLIC__/assets/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">B2B:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="__PUBLIC__/assets/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">货运系统:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										查看全部消息
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="__PUBLIC__/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									欢迎您<br />
									<?php echo ($index['username']); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										系统设置
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										个人信息设置
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo U(GROUP_NAME.'/Login/logout');?>" onclick='return window.confirm("确定注销吗？");'>
										<i class="ace-icon fa fa-power-off"></i>
										登出
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>
<div class="main-container" id="main-container">

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive" style="position:fixed;top:45px;left:0;z-index:1;height:100%;">


				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo U(GROUP_NAME.'/Admin/index');?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> 总控制台 </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php if(is_array($menu_list)): foreach($menu_list as $key=>$vo): ?><li class="open">
							<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa fa-desktop"></i>
								<span class="menu-text"> <?php echo ($vo["name"]); ?> </span>

								<b class="arrow fa fa-angle-down"></b>
							</a>

							<b class="arrow"></b>
								
									<ul class="submenu" style="display: block;">
											<?php if(is_array($vo["son"])): foreach($vo["son"] as $key=>$vi): ?><li class="">
												<a href="<?php echo U(GROUP_NAME.'/'.$vi['url'].'');?>" >
													<i class="menu-icon fa fa-caret-right"></i>
													<?php echo ($vi["name"]); ?>
													
												</a>

												<b class="arrow"></b>
												
													<ul class="submenu">
														<?php if(is_array($vi["son"])): foreach($vi["son"] as $key=>$vii): ?><li class="">
															<a href="<?php echo U(GROUP_NAME.'/'.$vii['url'].'');?>">
																<i class="menu-icon fa fa-caret-right"></i>
																<?php echo ($vii["name"]); ?>
															</a>
														</li><?php endforeach; endif; ?>
													</ul>
												
											</li><?php endforeach; endif; ?>
									</ul>
								
							</li><?php endforeach; endif; ?>
					<!-- <li class="hsub open">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									三级菜单
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu nav-show" style="display: block;">
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-leaf green"></i>
											第一级
										</a>

										<b class="arrow"></b>
									</li>

									<li class="hsub">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											第四级
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													添加商品
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-eye pink"></i>
													查看商品
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> 博客管理 </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu" style="">

								<li class="">
									<a href="menu.html">
										<i class="menu-icon fa fa-caret-right"></i>
										博客列表
									</a>

									<b class="arrow"></b>
								</li>

								<li class="">
									<a href="menu_add.html">
										<i class="menu-icon fa fa-caret-right"></i>
										添加博客
									</a>

									<b class="arrow"></b>
								</li>
						</ul>
					</li>  -->
				</ul>
					<!-- /.nav-list -->
				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

			</div>
<script type="text/javascript" src="__STATIC__/js/jquery.min.js"></script>	
<link rel="stylesheet" type="text/css" href="__STATIC__/js/uploadify/uploadify.css">
<script type="text/javascript" src="__STATIC__/js/uploadify/jquery.uploadify.min.js"></script>
<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs" style="position:fixed;top:45px;height:45px;z-index:111;width:100%;">
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="index.html">首页</a>
						</li>
						<li>
							<a href="javascript:void(0)">标题1</a>
						</li>
						<li>
							<a href="elements.html">标题2</a>
						</li>
					</ul><!-- /.breadcrumb -->

					<!-- #section:basics/content.searchbox -->
					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="请输入关键字 ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->
				</div>
<style>
.uploadify {
position: relative;
}
.uploadify-button {
border: none;
}
.prettyBtn:after {
content: '上传图片';
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 30px;
line-height: 30px;
display: inline-block;
background-color: #fff;
color: #000;
}
</style>
				<script type="text/javascript">
					window.UEDITOR_HOME_URL = '__Ueditor__/';
					/*window.onload = function(){
						 UE.getEditor('edit',{
						//这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
						toolbars:[
							['fullscreen', 'source', '|', 'undo', 'redo', '|',
								'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch','autotypeset','blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist','selectall', 'cleardoc', '|',
								'rowspacingtop', 'rowspacingbottom','lineheight','|',
								'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
								'directionalityltr', 'directionalityrtl', 'indent', '|',
								'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|','touppercase','tolowercase','|',
								'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright','imagecenter', '|',
								'insertimage', 'emotion','scrawl', 'insertvideo','music','attachment', 'map', 'gmap', 'insertframe','highlightcode','webapp','pagebreak','template','background', '|',
								'horizontal', 'date', 'time', 'spechars','snapscreen', 'wordimage', '|',
								'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', '|',
								'print', 'preview', 'searchreplace','help']
						],
							//focus时自动清空初始化时的内容
							autoClearinitialContent:true,
							//关闭字数统计
							wordCount:false,
							//关闭elementPath
							elementPathEnabled:false
							//更多其他参数，请参考editor_config.js中的配置项
						}) 
					}*/
					window.onload = function(){
						//window.UEDITOR_CONFIG.initialFrameWidth=1200;
						//window.UEDITOR_CONFIG.initialFrameHeight=600;
						//window.UEDITOR_CONFIG.imageUrl='';
						//window.UEDITOR_CONFIG.imagePath='';
						 UE.getEditor('edit');
					}
		$(document).ready(function(){
					var obj =["pic"];    
					   //下面使用each进行遍历  
						$.each(obj,function(n,idx) {
							var Ifout=0;
							$("#"+idx).uploadify({
								'height'        : 30,
								'width'         : 60, 
								'buttonText'    : '上传',
								'buttonClass'   : 'prettyBtn', // 给默认的"button"添加className
								'swf'           : '__STATIC__/js/uploadify/uploadify.swf',
								'uploader' 	 	: "<?php echo U('Admin/Login/upload_image');?>",
								'auto'          : true,
								'multi'         : true,
								'cancelImg'     : '__STATIC__/js/uploadify/uploadify-cancel.png',
								'fileTypeExts'  : '*.jpg',
								'fileSizeLimit' : '1MB',
								'removeCompleted':true,
								'onFallback'		:function(){
									alert ('上传图片需要用到flash,请先安装flash');
									Ifout=1;
									
								 },
								'onUploadStart'	:	function(file){
									var fileCount = $("#file_"+idx).val();
									
									if(fileCount>=10){
										alert ('无法继续上传图片，图片数量限制为10');
										$('#'+idx).uploadify('cancel',"*");
									}
								},
								'onUploadSuccess':function(file,data,response){
									pic_url=jQuery.parseJSON(data);
									imgstr = '<a href="__ROOT__'+pic_url+'" target="_blank"><img src="__ROOT__'+pic_url+'" width="25" height="29" /></a>';
									pic_hidden = '<input type="hidden" name="pic" value="'+pic_url+'">'; 
									//pic_hidden = '<input type="hidden" name="pics['+idx+'][]" value="'+pic_url+'">'; 
									//这个地方可能由于ajax的原因实际会被调用两次，所以加判断	
									if (pic_url!=null){
										var fileCount = $("#file_"+idx).val();
										 
										if(fileCount != ''){
										   fileCount = parseInt(fileCount) + 1;
										}else{
										   fileCount = "1";
										}
										$("#file_"+idx).val(fileCount);
										// 插入<div>元素及其子元素
										var fileHtml = '';
										fileHtml += '<div class="div_img" style ="border-bottom: 1px solid #CCC;font-size:12px;float:left;">';
										fileHtml += imgstr+pic_hidden;
										fileHtml +='<a href="javascript:;" onclick="$(this).parent().remove();subfileCount('+"'"+idx+"'"+');">取消</a> &nbsp;&nbsp;'+'  </div>';
									  
										var fileElement = document.getElementById("files_preview_"+idx);
										fileElement.innerHTML = fileElement.innerHTML + fileHtml;    
										
								  
									}
								},
								//加上此句会重写onSelectError方法【需要重写的事件】
								'overrideEvents': ['onSelectError', 'onDialogClose'],
								//返回一个错误，选择文件的时候触发
								'onSelectError':function(file, errorCode, errorMsg){
									switch(errorCode) {
										case -110:
											alert("文件 ["+file.name+"] 大小超出系统限制的(1M=1024kb)大小！");
											break;
										case -120:
											alert("文件 ["+file.name+"] 大小异常！");
											break;
										case -130:
											alert("文件 ["+file.name+"] 类型不正确！");
											break;
									}
								}
							});
							if(Ifout==1){
								return false;
							}
						});
					});
				</script>
				<script type="text/javascript" charset="utf-8" src="__Ueditor__/ueditor.config.js"></script>
				<script type="text/javascript" charset="utf-8" src="__Ueditor__/ueditor.all.min.js"> </script>
				<!-- /section:basics/content.breadcrumbs -->
				
				
				<div class="page-content">

					<div class="page-content-area">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" name='blogAdd' id='blogAdd' action="<?php echo U(GROUP_NAME.'/Blog/blogAdd');?>" method='post'>
									<!-- #section:elements.form -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">文章图片： </label>
									
										<div class="col-sm-9">
											<!-- <input type="text" name='sort' id="form-field-2" placeholder="" class="col-xs-10 col-sm-5" /> -->
										<span id="files_pic">
										  <input id="pic" name="pic" type="file">
									   </span>&nbsp;&nbsp;
									   
									   <div id="files_preview_pic" style="width:auto;height:auto; overflow :auto"></div>
									   <input id="file_pic" value="" type="hidden">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 文章标题：</label>

										<div class="col-sm-9">
											<input type="text" name='title' id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 文章基本配置：</label>

										<div class="col-sm-9">
											<span style="float:left;text-align:center;line-height:34px;">评论次数</span>
											<span style="float:left;text-align:center;line-height:34px;">
											<input type="text" name='talks' id="form-field-1" style="width:75px;height:30px;line-height:30px;" class="col-xs-10 col-sm-5" value=""/>
											</span>
											<span style="float:left;text-align:center;line-height:34px;">浏览次数</span>
											<span style="float:left;text-align:center;line-height:34px;"><input type="text" name='views' id="form-field-1" style="width:75px;height:30px;line-height:30px;" class="col-xs-10 col-sm-5" value=""/>
											</span>
											<span style="float:left;text-align:center;line-height:34px;">点赞次数</span>
											<span style="float:left;text-align:center;line-height:34px;"><input type="text" name='likes' id="form-field-1" style="width:75px;height:30px;line-height:30px;" class="col-xs-10 col-sm-5" value=""/>
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">文章类型： </label>

										<div class="col-sm-2">
											<div class="pos-rel">
												<select class="form-control" name='type' id="form-field-select-1">
																<option value="">====请选择====</option>
																<?php if(is_array($type)): foreach($type as $key=>$type): ?><option value="<?php echo ($type["id"]); ?>"><?php echo ($type["name"]); ?></option><?php endforeach; endif; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">是否推荐： </label>

										<div class="col-sm-2">
											<div class="pos-rel">
												<select class="form-control" name='adup' id="form-field-select-1">
																<option value="0" selected>否</option>
																<option value="1">是</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">显示状态：</label>
										<div class="col-sm-2">
											<div class="pos-rel">
												<select class="form-control" name='display' id="form-field-select-1">
																<option value="0" selected>显示</option>
																<option value="1">不显示</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">文章简介： </label>

										<div class="col-sm-9">
											<textarea name='intro' id='' style="margin: 0px; width: 580px; height: 89px;"/></textarea>
										</div>
									</div>
									<!-- /section:elements.form -->
									<!-- <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">文章摘要： </label>

										<div class="col-sm-9">
											<input type="text" name='intro' id="form-field-2" placeholder="" class="col-xs-10 col-sm-5" />
										</div>
									</div> -->

									<div class="space-4"></div>							
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">文章正文： </label>

										<div class="col-sm-9">
											<textarea name='content' id='edit'></textarea>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												立即提交
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												重置
											</button>
											<button class="btn" type="" onclick='javascript:history.go(-1);'>
												<i class="ace-icon fa fa-undo bigger-110"></i>
												返回
											</button>
										</div>
									</div>
							

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<script language="javascript">

		  function subfileCount(idx)  // 删除当前文件的<div>和<input type=”file”/>元素
		  {
			  var fileCount = $("#file_"+idx).val();
			  if(fileCount != ''){
				  fileCount = parseInt(fileCount) - 1;
			  }else{
				 fileCount = "0";
			  }
			  $("#file_"+idx).val(fileCount);
			  
		  }
		  
		  </script>	
		<!--[if !IE]> -->
			<script type="text/javascript">
				window.jQuery || document.write("<script src='__PUBLIC__/assets/js/jquery.min.js'>"+"<"+"/script>");
			</script>
		<!-- <![endif]-->
		<!--[if IE]>
			<script type="text/javascript">
			 window.jQuery || document.write("<script src='__PUBLIC__/assets/js/jquery1x.min.js'>"+"<"+"/script>");
			</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='__PUBLIC__/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="__PUBLIC__/assets/js/bootstrap.min.js"></script>
		<!--[if lte IE 8]>
		  <script src="__PUBLIC__/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="__PUBLIC__/assets/js/jquery-ui.custom.min.js"></script>
		<script src="__PUBLIC__/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="__PUBLIC__/assets/js/ace-elements.min.js"></script>
		<script src="__PUBLIC__/assets/js/ace.min.js"></script>

	</body>
</html>