<?php if (!defined('THINK_PATH')) exit();?> <div class="links">
      <h3><span>[<a href="/">申请友情链接</a>]</span>友情链接</h3>
      <ul>
	  <?php  ?>
		<?php if(is_array($info)): foreach($info as $key=>$friends): ?><li><a href="<?php echo ($friends["url"]); ?>"><?php echo ($friends["title"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>