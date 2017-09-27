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
var url = "<?php echo U(GROUP_NAME.'/Index/likes');?>"; 
</script>
<script type="text/javascript" src="__STATIC__/js/like.js"></script>
<link rel="stylesheet" type="text/css" href="__STATIC__/css/pages.css" />
<article>
  <div class="l_box f_l">
    <!-- banner代码 结束 -->
    <div class="topnews">
      <h2><span><?php if(is_array($type)): foreach($type as $key=>$type): ?><a href="<?php echo U(GROUP_NAME.'/Index/lists',array('id'=>$type['id']));?>"><?php echo ($type["name"]); ?></a><?php endforeach; endif; ?></span><a href='<?php echo U(GROUP_NAME."/Index/lists");?>'><b>文章</b>列表</a></h2>
      <?php if(is_array($blog_list)): foreach($blog_list as $key=>$blog): ?><div class="blogs">
        <figure><img src="<?php echo ($blog['pic']); ?>"></figure>
        <ul>
          <!-- <h3><a href="__URL__/Index/content/id/<?php echo ($blog['id']); ?>"><?php echo ($blog['title']); ?></a></h3> -->
		  <h3><a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$blog['id']));?>"><?php echo ($blog['title']); ?></a></h3>
          <p><?php echo (htmlspecialchars_decode($blog['intro'])); ?><a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$blog['id']));?>" target="_blank" style="color: #759b08;padding-left:5px;">[详情]</a></p>
          <p class="autor">
			<span class="lm f_l"><a href="/"><?php echo ($blog['type']); ?></a></span><span class="dtime f_l" style="margin-left:10px;"><?php echo (date('Y-m-d',$blog['addTime'])); ?></span>
			<input class="zan_newsid" type="hidden" value="<?php echo ($blog['id']); ?>">
			<span class="label_bottom f_r" style="padding-left: 0;margin-left:10px;">
				<a href="javascript:void(0)" onclick="return false;" class="yz_zan dianzan" <?php if($_COOKIE[$blog['id']] != ''): ?>style="cursor: default; color: rgb(64, 108, 169); text-decoration: none; background-position: -47px -327px;"<?php endif; ?>><?php echo ($blog['likes']); ?></a>
			</span><span class="viewnum f_r" style="margin-right: 10px;">浏览（<a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$blog['id']));?>"><?php echo ($blog['views']); ?></a>）</span><span class="pingl f_r" style="margin-right: 10px;">评论（<a href="<?php echo U(GROUP_NAME.'/Index/content',array('id'=>$blog['id']));?>#talk"><span id = "sourceId::<?php echo ($blog["talkId"]); ?>" class = "cy_cmt_count" style="padding: 0;"></span></a>）</span></p>
        </ul>
      </div><?php endforeach; endif; ?>
	  <div><span style='float:right'><?php echo ($page); ?></span></div>
    </div>
  </div>
 
  <script id="cy_cmt_num" src="https://changyan.sohu.com/upload/plugins/plugins.list.count.js?clientId=cytdKBBn2">
	</script>
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
	<?php $gzad = M('banner')->order('id desc')->where('type="gzad" and display=0')->select(); foreach($gzad as $key=>$val){ $gzad[$key]['pic']=unserialize($val['pic']); } ?>  
<div class="ad300x100"><?php if(is_array($gzad)): foreach($gzad as $key=>$gzad): ?><img src="<?php echo ($gzad["pic"]); ?>"><?php endforeach; endif; ?></div>	
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
    <!--切换卡 moreSelect end -->  
    <?php $tag = M('tags')->where('display=0')->order('sort asc')->select(); ?>
<div class="cloud">
      <h3>标签云</h3>
      <ul>
	  <?php if(is_array($tag)): foreach($tag as $key=>$tag): ?><li><a href="<?php echo ($tag["url"]); ?>"><?php echo ($tag["title"]); ?></a></li><?php endforeach; endif; ?>
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
</script>
</body>
</html>