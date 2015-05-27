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
<link rel="stylesheet" type="text/css" href="/github/2015upgrade/Public/Ucenter/css/common.css?v=1432708078" />
<script type="text/javascript" src="/github/2015upgrade/Public/cdn/common/common.js?v=1432708078"></script>




		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/cdn/theme/fix_<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.css" />
		
		

	<script src="/github/2015upgrade/Public/cdn/jquery-validation/1.13.1/jquery.validate.min.js"></script>
	<script src="/github/2015upgrade/Public/cdn/jquery-validation/1.13.1/localization/messages_zh.min.js"></script>
	<link src="/github/2015upgrade/Public/cdn/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
	<script src="/github/2015upgrade/Public/cdn/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>


	</head>

	<body class="theme theme-<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>">
		
		
	<?php echo W('Menus/topbar');?>
	<div class="admin-main container-fluid">
		<?php echo W('Menus/left');?>
		<div class="admin-main-content">
			<?php echo W('Menus/breadcrumb');?>
			<!-- form -->
			
			<form class="form-horizontal well validateForm">
				<fieldset>
					<legend>
						<?php echo L('C_CONFIG');?>-<?php echo L('BTN_EDIT');?></legend><small class="help-block">
				<?php echo L('TIP_CONFIG_CHANGE_MUST_CLEAR_CACHE');?>
			</small>
					<div class="form-group">
						<label for="inputtitle" class="col-md-2 col-lg-2 control-label"><?php echo L('TITLE');?></label>
						<div class="col-md-10 col-lg-10">
							<input type="text" class="required form-control input-short"  name="title" id="inputtitle" value="<?php echo ($entity["title"]); ?>" placeholder="<?php echo L('PLACEHOLDER_TITLE');?>">
						<div class="help-block">(<?php echo L('M_CONFIG_TITLE_HELP');?>)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputname" class="col-md-2 col-lg-2 control-label"><?php echo L('M_CONFIG_NAME');?></label>
						<div class="col-md-10 col-lg-10">
							<input type="text" class="required form-control input-short"  name="name" value="<?php echo ($entity["name"]); ?>" id="inputname" placeholder="<?php echo L('PLACEHOLDER_NAME');?>">
						<div class="help-block">(<?php echo L('M_CONFIG_NAME_HELP');?>)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="selectgroup" class="col-md-2 col-lg-2 control-label"><?php echo L('M_CONFIG_GROUP');?></label>
						
						<div class="col-md-10 col-lg-10">
							<select id="selecttype" class="form-control input-short"  name="group">
								<option  value="0" <?php if(($entity["group"]) == "0"): ?>selected="selected"<?php endif; ?> >不分组</option>
								<?php if(is_array($config_groups)): $i = 0; $__LIST__ = $config_groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($entity["group"]) == $key): ?>selected="selected"<?php endif; ?> ><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						<div class="help-block">(<?php echo L('M_CONFIG_GROUP_HELP');?>)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="selecttype" class="col-md-2 col-lg-2 control-label"><?php echo L('M_CONFIG_TYPE');?></label>
						<div class="col-md-10 col-lg-10">
							
							<select id="selecttype" class="form-control input-short" name="type">
								<?php if(is_array($config_types)): $i = 0; $__LIST__ = $config_types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"  <?php if(($entity["type"]) == $key): ?>selected="selected"<?php endif; ?> ><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						<div class="help-block">(<?php echo L('M_CONFIG_TYPE_HELP');?>)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputvalue" class="col-md-2 col-lg-2 control-label"><?php echo L('M_CONFIG_VALUE');?></label>
						<div class="col-md-10 col-lg-10">
							<textarea name="value" id="inputvalue" rows="5" class="required form-control input-normal"  ><?php echo ($entity["value"]); ?></textarea>
						<div class="help-block">(<?php echo L('M_CONFIG_VALUE_HELP');?>)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputextra" class="col-md-2 col-lg-2 control-label"><?php echo L('M_CONFIG_EXTRA');?></label>
						<div class="col-md-10 col-lg-10"><textarea rows="5" name="extra" id="inputextra"  class="required form-control input-normal"  ><?php echo ($entity["extra"]); ?></textarea>
						<div class="help-block">(<?php echo L('M_CONFIG_EXTRA_HELP');?>)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputremark" class="col-md-2 col-lg-2 control-label"><?php echo L('M_CONFIG_REMARK');?></label>
						<div class="col-md-10 col-lg-10 ">
							<textarea class="form-control required input-normal" rows="3" name="remark"><?php echo ($entity["remark"]); ?></textarea>
						<div class="help-block">(<?php echo L('M_CONFIG_REMARK_HELP');?>)</div>

						</div>
					</div>
					<div class="form-group">
						<label for="inputsort" class="col-md-2 col-lg-2 control-label"><?php echo L('SORT');?></label>
						<div class="col-md-10 col-lg-10 input-number">
							<input type="text" class="required form-control

							 input-number" id="inputsort" name="sort" value="<?php echo ($entity["value"]); ?>">
							 
						<div class="help-block">(<?php echo L('M_CONFIG_SORT_HELP');?>)</div>
						</div>
					</div>
					<div class="form-group">
						<label for="btns" class="col-md-2 col-lg-2 control-label">&nbsp;</label>
						<div class="col-lg-10 col-md-10">
							<a target-form="validateForm" class="ajax-post btn btn-primary" href="<?php echo U('Ucenter/'.CONTROLLER_NAME.'/save',array('id'=>$entity['id']));?>" autofocus="autofocus"><i class="fa fa-save"></i> <?php echo L('BTN_SAVE');?></a>
							<a class="btn btn-primary" href="<?php echo U('Ucenter'.CONTROLLER_NAME.'/index');?>"><i class="fa fa-times-circle"></i> <?php echo L('BTN_CANCEL');?></a>
						</div>
					</div>
				</fieldset>
			</form>
			<!-- form -->
		</div>

	</div>

		
	<script>
		$(function() {
			$("#inputsort").TouchSpin({
				initval: 0
			});
			$(".validateForm").validate();
		})
	</script>

		
		<div class="admin-footer well text-center">
			<p><?php echo C('WEBSITE_OWNER');?> <a href="http://www.miitbeian.gov.cn"><?php echo C('WEBSITE_ICP');?></a></p>
			<p>&copy;2013-<?php echo date('Y');?> Version <?php echo C('APP_VERSION');?></p>
			<p>{__RUNTIME__}</p>
		</div>
		
	</body>

</html>