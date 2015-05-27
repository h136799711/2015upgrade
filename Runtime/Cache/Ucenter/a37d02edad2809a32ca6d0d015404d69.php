<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

	<head>
		<meta charset="utf-8">
		<title><?php echo ((isset($seo["title"]) && ($seo["title"] !== ""))?($seo["title"]):L('TITLE')); ?>-<?php echo C('WEBSITE_TITLE');?></title>
		<meta name="viewport" content="target-densitydpi=device-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="keywords" content="<?php echo ((isset($seo["keywords"]) && ($seo["keywords"] !== ""))?($seo["keywords"]):" "); ?>" />
		<meta name="description" content="<?php echo ((isset($seo["description"]) && ($seo["description"] !== ""))?($seo["description"]):" "); ?>" />
		<meta name="author" content="<?php echo ((isset($cfg["owner"]) && ($cfg["owner"] !== ""))?($cfg["owner"]):" Gooraye "); ?>" />
		<!-- 系统基本样式 -->
		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/cdn/bootstrap/3.3.0/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/cdn/fontawesome/4.2.0/css/font-awesome.min.css" />
		<!-- 自定义主题 -->
		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/cdn/theme/<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.min.css" />
		
		<!-- 脚本 -->
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/bootstrap/3.3.0/js/bootstrap.min.js"></script>

		
<!-- nprogress plugin -->
<link rel="stylesheet" type="text/css" href="/github/2015upgrade/Public/cdn/nprogress/nprogress.css" />
<script type="text/javascript" src="/github/2015upgrade/Public/cdn/nprogress/nprogress.js"></script>
<!-- scojs plugin -->
<link rel="stylesheet" type="text/css" href="/github/2015upgrade/Public/cdn/sco1.0.2-8/css/scojs.css" />
<script type="text/javascript" src="/github/2015upgrade/Public/cdn/sco1.0.2-8/js/sco.modal.js"></script>
<script type="text/javascript" src="/github/2015upgrade/Public/cdn/sco1.0.2-8/js/sco.confirm.js"></script>
<script type="text/javascript" src="/github/2015upgrade/Public/cdn/sco1.0.2-8/js/sco.message.js"></script>

<!-- 自定义模块通用样式 -->
<link rel="stylesheet" type="text/css" href="/github/2015upgrade/Public/Ucenter/css/common.css?v=1432708090" />
<script type="text/javascript" src="/github/2015upgrade/Public/cdn/common/common.js?v=1432708090"></script>




		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/cdn/theme/fix_<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.css" />
		
		



	</head>

	<body class="theme theme-<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>">
		
		
	<?php echo W('Menus/topbar');?>
	<div class="admin-main container-fluid">
		<?php echo W('Menus/left');?>
		<div class="admin-main-content">
			<?php echo W('Menus/breadcrumb');?>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist" id="configTab">
				
				<?php if(is_array($config_groups)): foreach($config_groups as $key=>$vo): ?><li role="presentation" class="">
					  	<a href="#tab<?php echo ($key); ?>" role="tab" data-toggle="tab"><?php echo ($vo); ?></a>
					  </li><?php endforeach; endif; ?>
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content ">				
				<?php if(is_array($config_groups)): foreach($config_groups as $key=>$vo): ?><div role="tabpanel" class="tab-pane fade clearfix" id="tab<?php echo ($key); ?>">
			  			<?php echo W('Partials/config_set',array($key));?>
			  		</div><?php endforeach; endif; ?>
			</div>

		</div>

	</div>

		
<script>
  $(function () {
  		
      	$('#configTab a:first').tab('show');
      
  })
</script>

		
		<div class="admin-footer well text-center">
			<p><?php echo C('WEBSITE_OWNER');?> <a href="http://www.miitbeian.gov.cn"><?php echo C('WEBSITE_ICP');?></a></p>
			<p>&copy;2013-<?php echo date('Y');?> Version <?php echo C('APP_VERSION');?></p>
			<p>{__RUNTIME__}</p>
		</div>
		
	</body>

</html>