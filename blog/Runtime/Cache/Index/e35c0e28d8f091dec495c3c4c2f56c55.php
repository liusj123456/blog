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
<?php $menus = M('index')->where(array('display'=>1))->order('sort asc')->select(); ?>
  <div class="logo f_l"> <a href="/"><img src="__STATIC__/images/logo1.png"></a> </div>
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
    <div class="banner">
<?php $bannerss = M('banner')->order('sort asc,id desc')->where('display=0')->select(); foreach($bannerss as $key=>$val){ $bannerss[$key]['pic']=unserialize($val['pic']); } ?>
      <div id="slide-holder">
        <div id="slide-runner"> 
		<?php if(is_array($bannerss)): foreach($bannerss as $key=>$banners): ?><a href="/" target="_blank"><img id="slide-img-<?php echo ($banners["id"]); ?>" src="<?php echo ($banners["pic"]); ?>"  alt="" /></a><?php endforeach; endif; ?>
          <div id="slide-controls">
            <p id="slide-client" class="text"><strong></strong><span></span></p>
            <p id="slide-desc" class="text"></p>
            <p id="slide-nav"></p>
          </div>
        </div>
      </div>
<script>
	if(!window.slider) {
		var slider={};
	}

	slider.data= [
   <?php if(is_array($bannerss)): foreach($bannerss as $key=>$banners): ?>{
        "id":"slide-img-<?php echo ($banners["id"]); ?>", // 与slide-runner中的img标签id对应
        "client":"<?php echo ($banners["title"]); ?>",
        "desc":"<?php echo ($banners["desc"]); ?>" //这里修改描述
    },<?php endforeach; endif; ?>
   /*  {
        "id":"slide-img-2",
        "client":"标题2",
        "desc":"add your description here"
    },
   {
        "id":"slide-img-3",
        "client":"标题3",
        "desc":"add your description here"
    },
    {
        "id":"slide-img-4",
        "client":"标题4",
        "desc":"add your description here"
    } */
	];

	  </script> 
    </div>
    <!-- banner代码 结束 -->
    <div class="topnews">
      <h2><span><a href="/" target="_blank">栏目标题</a><a href="/" target="_blank">栏目标题</a><a href="/" target="_blank">栏目标题</a></span><b>文章</b>推荐</h2>
      <?php if(is_array($blog_list)): foreach($blog_list as $key=>$indexlist): ?><div class="blogs">
        <figure><img src="__STATIC__/images/01.jpg"></figure>
        <ul>
          <h3><a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$indexlist['id']));?>"><?php echo ($indexlist["title"]); ?></a></h3>
          <p><?php echo (htmlspecialchars_decode($indexlist["intro"])); ?> ...<a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$indexlist['id']));?>" target="_blank" style="color: #759b08;padding-left:5px;">[详情]</a></p>
          <p class="autor"><span class="lm f_l"><a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$indexlist['id']));?>"><?php echo ($indexlist["type"]); ?></a></span><span class="dtime f_l"><?php echo (date($indexlist["addTime"],'Y-m-d')); ?></span>
		  <input class="zan_cookie" type="hidden" value="2">
			<input class="zan_newsid" type="hidden" value="442">
			<span class="label_bottom f_r" style="padding-left: 0;">
				<a href="javascript:void(0)" onclick="return false;" class="yz_zan" style="">2</a>
			</span>
		  <span class="viewnum f_r">浏览（<a href="/">459</a>）</span><span class="pingl f_r">评论（<a href="/">30</a>）</span></p>
        </ul>
      </div><?php endforeach; endif; ?>
    </div>
  </div>
  <div class="r_box f_r">
    <div class="tit01">
      <h3>关注我</h3>
      <div class="gzwm">
        <ul>
          <li><a class="xlwb" href="#" target="_blank">新浪微博</a></li>
          <li><a class="txwb" href="#" target="_blank">腾讯微博</a></li>
          <li><a class="rss" href="portal.php?mod=rss" target="_blank">RSS</a></li>
          <li><a class="wx" href="mailto:admin@admin.com">邮箱</a></li>
        </ul>
      </div>
    </div>
    <!--tit01 end-->
	    <div class="ad300x100"> <img src="__STATIC__/images/ad300x100.jpg"> </div>	
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
    <!--切换卡 moreSelect end -->  
    <div class="cloud">
      <h3>标签云</h3>
      <ul>
        <li><a href="/">个人博客</a></li>
        <li><a href="/">web开发</a></li>
        <li><a href="/">前端设计</a></li>
        <li><a href="/">Html</a></li>
        <li><a href="/">CSS3</a></li>
        <li><a href="/">Html5+css3</a></li>
        <li><a href="/">百度</a></li>
        <li><a href="/">Javasript</a></li>
        <li><a href="/">web开发</a></li>
        <li><a href="/">前端设计</a></li>
        <li><a href="/">Html</a></li>
        <li><a href="/">CSS3</a></li>
        <li><a href="/">Html5+css3</a></li>
        <li><a href="/">百度</a></li>
      </ul>
    </div>
	 <div class="tuwen">
      <h3>图文推荐</h3>
      <ul>
        <li><a href="/"><img src="__STATIC__/images/01.jpg"><b>住在手机里的朋友</b></a>
          <p><span class="tulanmu"><a href="/">手机配件</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="__STATIC__/images/02.jpg"><b>教你怎样用欠费手机拨打电话</b></a>
          <p><span class="tulanmu"><a href="/">手机配件</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/" title="手机的16个惊人小秘密，据说99.999%的人都不知"><img src="__STATIC__/images/03.jpg"><b>手机的16个惊人小秘密，据说...</b></a>
          <p><span class="tulanmu"><a href="/">手机配件</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="__STATIC__/images/06.jpg"><b>住在手机里的朋友</b></a>
          <p><span class="tulanmu"><a href="/">手机配件</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="__STATIC__/images/04.jpg"><b>教你怎样用欠费手机拨打电话</b></a>
          <p><span class="tulanmu"><a href="/">手机配件</a></span><span class="tutime">2015-02-15</span></p>
        </li>
      </ul>
    </div>
    <div class="ad"> <img src="__STATIC__/images/03.jpg"> </div>
	 <div class="links">
      <h3><span>[<a href="/">申请友情链接</a>]</span>友情链接</h3>
      <ul>
		<?php if(is_array($friends)): foreach($friends as $key=>$friends): ?><li><a href="<?php echo ($friends["url"]); ?>"><?php echo ($friends["title"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
  <!--高速版-->
  <!--r_box end --> 
</article>
<footer>
  <p class="ft-copyright"></p>
  <div id="tbox"> <a id="togbook" href="/"></a> <a id="gotop" href="javascript:void(0)" onclick="$('html,body').animate({scrollTop:0},200);" style='display:none;'></a> </div>
</footer>
<style>
.did{
display:none;
}
</style>
<script>
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
}
</script>
</body>
</html>