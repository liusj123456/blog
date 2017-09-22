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
<script type="text/javascript" src="__STATIC__/js/up/jquery.js"></script>
<script type="text/javascript" src="__STATIC__/js/up/js.js"></script>
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
<article>
  <div class="l_box f_l">
    <!-- banner -->
    <div class="topnews weizhi">
       <h2>您现在的位置是：
          <a href="/index/index">首页</a>&nbsp;&gt;&nbsp;
          <a href="/book/index">书屋</a>&nbsp;&gt;&nbsp;
        </h2>
        <div class="news_title">《解忧杂货店》书评</div>
	  	<div class="news_author">
	  		<span class="au01"><?php echo ($blog_info['addUser']); ?></span>
	  		<span class="au02"><?php echo (date('Y-m-d',$blog_info['addTime'])); ?></span>
	  	</div>
		<!-- 内容 S -->
		<div class="news_content">
	  	   	<?php echo (htmlspecialchars_decode($blog_info['content'])); ?>
	  	</div>
		<!--nextpage-->
		<div class="nextpage">
				<p><b>上一篇:</b> <a href="/index/titleinfo/id/439">关于叶子书屋</a></p>
				<p><b>下一篇:</b> <a href="/index/titleinfo/id/438">《中国少了一味药》书评</a></p>
		</div>
		<div id="SOHUCS" sid="<?php echo ($blog_info['id']); ?>"></div>
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
    <div class="moreSelect" id="lp_right_select"> 
      <script>
window.onload = function ()
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
}
</script>
      <div class="ms-top">
        <ul class="hd" id="tab">
          <li class="cur"><a href="/">点击排行</a></li>
          <li><a href="/">最新文章</a></li>
          <li><a href="/">站长推荐</a></li>
        </ul>
      </div>
      <div class="ms-main" id="ms-main">
        <div style="display: block;" class="bd bd-news" >
          <ul>
            <li><a href="/" target="_blank">住在手机里的朋友</a></li>
            <li><a href="/" target="_blank">教你怎样用欠费手机拨打电话</a></li>
            <li><a href="/" target="_blank">原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
            <li><a href="/" target="_blank">手机的16个惊人小秘密，据说99.999%的人都不知</a></li>
            <li><a href="/" target="_blank">你面对的是生活而不是手机</a></li>
            <li><a href="/" target="_blank">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></li>
          </ul>
        </div>
        <div  class="bd bd-news">
          <ul>
            <li><a href="/" target="_blank">原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
            <li><a href="/" target="_blank">手机的16个惊人小秘密，据说99.999%的人都不知</a></li>
            <li><a href="/" target="_blank">住在手机里的朋友</a></li>
            <li><a href="/" target="_blank">教你怎样用欠费手机拨打电话</a></li>
            <li><a href="/" target="_blank">你面对的是生活而不是手机</a></li>
            <li><a href="/" target="_blank">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></li>
          </ul>
        </div>
        <div class="bd bd-news">
          <ul>
            <li><a href="/" target="_blank">手机的16个惊人小秘密，据说99.999%的人都不知</a></li>
            <li><a href="/" target="_blank">你面对的是生活而不是手机</a></li>
            <li><a href="/" target="_blank">住在手机里的朋友</a></li>
            <li><a href="/" target="_blank">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></li>
            <li><a href="/" target="_blank">教你怎样用欠费手机拨打电话</a></li>
            <li><a href="/" target="_blank">原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
          </ul>
        </div>
      </div>
      <!--ms-main end --> 
    </div>
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

<style>
.did{
display:none;
}
</style>
<!-- <script>
$(window).scroll(function(){
	$("#tbox").css("height",'180px');
	$("div[node-type='is-icp']").hide();
	if($(window).scrollTop() > 50){
		//$("tbox").css("height",'100px');
		$("#gotop").fadeIn();
	}else{
		//$("tbox").css("height",'100px');
		$("#gotop").fadeOut();
	}
});
$(function(){
	//alert('123');
	//node-type=is-icp
	//$("div#SOHUCS").firstChild.addClass('did');
	//$("div#SOHUCS").firstChild.getAttribute("class","did"); 
	
});
window.onload = function(){
	//$("div[node-type='is-icp']").hide();
} -->
</script>
</body>
</html>