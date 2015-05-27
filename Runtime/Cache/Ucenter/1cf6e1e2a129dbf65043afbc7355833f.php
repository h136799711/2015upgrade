<?php if (!defined('THINK_PATH')) exit();?><!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
<header class="navbar navbar-default navbar-fixed-top admin-header">
	<div class="navbar-header">
		<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span class="sr-only">导航切换</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="<?php echo U('Ucenter/Index/index');?>" class="navbar-brand" ><?php echo C('UCENTER_PLATFORM');?></a>
	</div>
	<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		<ul class="nav navbar-nav">
			<?php if(is_array($topbar_menu)): $i = 0; $__LIST__ = $topbar_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(isset($vo['dynamic_hide'])): else: ?>
				<li class="<?php echo isActiveMenuURL($vo['id']);?>"><a href="<?php echo getURL($vo['url'].'?activemenuid='.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<ul class="nav navbar-nav navbar-right" style="margin-right: 10px;">

			<li>
				<a class="dropdown-toggle btn btn-link avatar" data-toggle="dropdown" href="javascript:;">
					<img class="img-circle " src="<?php echo ((isset($user["avatar"]) && ($user["avatar"] !== ""))?($user["avatar"]):'/github/2015upgrade/Public/cdn/common/avatar.jpg'); ?>" />&nbsp;<?php echo ($user["username"]); ?>&nbsp;<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
<!--    <li><a href="javascript:myUtils.alertTODO();"><i class="fa fa-user"></i> <?php echo L('BTN_MY_CENTER');?></a></li>-->
    <li><a href="<?php echo U('Ucenter/Account/updatepassword');?>"><i class="fa fa-key"></i> <?php echo L('BTN_MODIFY_PWD');?></a></li>
    <li class="divider"></li>
    <li><a href="<?php echo U('Ucenter/Public/logout');?>"><i class="fa fa-power-off"></i> <?php echo L('BTN_EXIT');?></a></li>
  </ul>
			</li>
			<li><a href="javascript:;" id="admin-fullscreen"><i class="fa fa-arrows-alt"></i> <span class="admin-fullText"><?php echo L('BTN_FULLSCREEN');?></span>

			</a>
			</li>

		</ul>

	</nav>
</header>
{__NORUNTIME__}