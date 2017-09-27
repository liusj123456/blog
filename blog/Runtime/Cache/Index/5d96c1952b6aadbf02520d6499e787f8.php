<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>crazy-x个人博客</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="__STATIC__/css/base.css" rel="stylesheet">
<link href="__STATIC__/css/index.css" rel="stylesheet">
<script type="text/javascript" src="__STATIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/sliders.js"></script>
<!--[if lt IE 9]>
<script src="__STATIC__/js/modernizr.js"></script>
<![endif]-->
<!-- 返回顶部调用 begin -->
<!-- <script type="text/javascript" src="__STATIC__/js/up/jquery.js"></script>
<script type="text/javascript" src="__STATIC__/js/up/js.js"></script> -->
<script type="text/javascript">
	var action = "<?php echo ($action); ?>";		
</script>
<!-- 返回顶部调用 end-->

</head>
<body>
<header>
<?php $menus = M('index')->where(array('display'=>1))->order('sort asc')->select(); $logo = M('logo')->order('id desc')->getField('pic'); $logo = unserialize($logo); ?>
  <div class="logo f_l"> <a href="/"><!-- <img src="__STATIC__/images/logo1.png"> --><img src="<?php echo ($logo); ?>"></a> </div>
  <nav id="topnav" class="f_r" style="width:60%;background: #424441;border-radius: 46px;margin-left: 0px;float:right;">
    <ul>
	<?php if(is_array($menus)): foreach($menus as $key=>$menu): ?><a href="<?php echo U(GROUP_NAME.'/'.$menu['url'].'');?>" <?php if($menu['url'] == $action): ?>id="topnav_current"<?php endif; ?>><?php echo ($menu["name"]); ?></a><?php endforeach; endif; ?><a href="<?php echo U('Admin/Login/login');?>" target='_blank'>登录</a><!--  <a href="news.html" target="_blank">关于我</a> <a href="p.html" target="_blank">文章</a> <a href="a.html" target="_blank">心情</a> <a href="c.html" target="_blank">相册</a> <a href="b.html" target="_blank">留言</a> -->
    </ul>
    <script src="__STATIC__/js/nav.js"></script> 
  </nav>
 <!--  <nav id="topnav1" class="f_r">
    <ul>
      <a href="<?php echo U('Admin/Login/login');?>" id="topnav_current">登录</a>
    </ul>
  </nav> -->
</header>
<script>
$(function(){
	var ids='<?php echo ($blog_info[id]); ?>';
	$.ajax({  
		url:'<?php echo U(GROUP_NAME . "/Index/views",array("id"=>"$blog_info[id]"));?>',  
		type:"get",  
		async:true,  
		//data:{'id':ids},
		dataType : "json",
		error:function(){alert("服务加载出错");},  
		success:function(data){
			if(data.info='成功'){
				$('#views').html(data.res);
			}
		}
	 });
});
 
</script>
<article>
  <div class="l_box f_l">
    <!-- banner -->
    <div class="topnews weizhi">
       <h2>您现在的位置是：
          <a href="<?php echo U(GROUP_NAME.'/Index/lists');?>">文章</a>&nbsp;&gt;&nbsp;
          <a href="<?php echo U(GROUP_NAME.'/Index/lists',array('id'=>$blog_info['type']));?>"><?php echo ($blog_info['types']); ?></a>&nbsp;&gt;&nbsp;
        </h2>
        <div class="news_title"><?php echo ($blog_info['title']); ?></div>
	  	<div class="news_author">
	  		<span class="au01"><?php echo ($blog_info['addUser']); ?></span>
	  		<span class="au02"><?php echo (date('Y-m-d',$blog_info['addTime'])); ?></span>
			<span class="viewnum" id="views"><?php echo ($blog_info['views']); ?></span>
	  	</div>
		<!-- 内容 S -->
		<div class="news_content">
	  	   	<?php echo (htmlspecialchars_decode($blog_info['content'])); ?>
	  	</div>
		<!--nextpage-->
		<div class="nextpage"><a name="talk" id="talk" >&nbsp;</a> 
				<?php if(!empty($blog_info['before'])): ?><p><b>上一篇:</b> <a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$blog_info['before']['id']));?>"><?php echo ($blog_info['before'][title]); ?></a></p><?php endif; ?>
				<?php if(!empty($blog_info['after'])): ?><p><b>下一篇:</b> <a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$blog_info['after']['id']));?>"><?php echo ($blog_info['after'][title]); ?></a></p><?php endif; ?>
		</div>
		<div id="SOHUCS" sid="<?php echo ($talkId); ?>"></div>
<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
appid: 'cytdKBBn2',
conf: 'prod_90ade4411b1bf73ffde8e72219233576'
});
</script>
  </div>
 </div>
  
  <div class="r_box f_r">	
    <?php $clicks = M('blogs')->where('display=0')->limit('6')->select(); $news = M('blogs')->where('display=0')->order('id desc')->limit('6')->select(); $ups = M('blogs')->where('display=0 and adup=1')->order('id desc')->limit('6')->select(); ?>
<div class="moreSelect" id="lp_right_select"> 
      <div class="ms-top">
        <ul class="hd" id="tab">
          <li class="cur"><a href="/">点击排行</a></li>
          <li><a href="<?php echo U(GROUP_NAME.'/Index/lists');?>">最新文章</a></li>
          <li><a href="<?php echo U(GROUP_NAME.'/Index/lists',array('adup'=>1));?>">站长推荐</a></li>
        </ul>
      </div>
      <div class="ms-main" id="ms-main">
        <div style="display: block;" class="bd bd-news" >
          <ul>
		  <?php if(is_array($clicks)): foreach($clicks as $key=>$clicks): ?><li><a href="/" target="_blank"><?php echo ($clicks['title']); ?></a></li><?php endforeach; endif; ?>
          </ul>
        </div>
        <div  class="bd bd-news">
          <ul>
		  <?php if(is_array($news)): foreach($news as $key=>$news): ?><li><a href="/" target="_blank"><?php echo ($news['title']); ?></a></li><?php endforeach; endif; ?>
          </ul>
        </div>
        <div class="bd bd-news">
          <ul>
		  <?php if(is_array($ups)): foreach($ups as $key=>$ups): ?><li><a href="/" target="_blank"><?php echo ($ups['title']); ?></a></li><?php endforeach; endif; ?>
          </ul>
        </div>
      </div>
      <!--ms-main end --> 
    </div>
<script>
$(function ()
{
	var oLi = document.getElementById("tab").getElementsByTagName("li");
	var oUl = document.getElementById("ms-main").getElementsByTagName("div");
	
	for(var i = 0; i < oLi.length; i++)
	{
		oLi[i].index = i;
		oLi[i].onmouseover = function ()
		{
			for(var n = 0; n < oLi.length; n++) oLi[n].className="";
			this.className = "cur";
			for(var n = 0; n < oUl.length; n++) oUl[n].style.display = "none";
			oUl[this.index].style.display = "block"
		}	
	}
});
</script>
	 <div class="links">
      <h3><span>[<a href="/">申请友情链接</a>]</span>友情链接</h3>
      <ul>
	  <?php $info = M('friends')->order('sort asc,id desc')->select(); ?>
		<?php if(is_array($info)): foreach($info as $key=>$friends): ?><li><a href="<?php echo ($friends["url"]); ?>" target='_blanket'><?php echo ($friends["title"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
  <!--高速版-->
	
  <!--r_box end --> 
</article>
<footer style=''>
  <p class="ft-copyright"></p>
  <div id="tbox"> <a id="togbook" href="/"></a> <a id="gotop" href="javascript:void(0)" onclick="$('html,body').animate({scrollTop:0},200);" style='display:none;'></a> </div>
</footer>
<script>
$(window).scroll(function(){
	$("#tbox").css("height",'180px');
	//$("div[node-type='is-icp']").hide();
	if($(window).scrollTop() > 50){
		//$("tbox").css("height",'100px');
		$("#gotop").fadeIn();
	}else{
		//$("tbox").css("height",'100px');
		$("#gotop").fadeOut();
	}
});
</script>

</body>
</html>