<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

	<head>
		<meta charset="utf-8">
		<title><?php echo C('WEBSITE_TITLE');?></title>
		<meta name="keywords" content="<?php echo ((isset($seo["keywords"]) && ($seo["keywords"] !== ""))?($seo["keywords"]):" "); ?>" />
		<meta name="description" content="<?php echo ((isset($seo["description"]) && ($seo["description"] !== ""))?($seo["description"]):" "); ?>" />
		<meta name="author" content="<?php echo ((isset($cfg["owner"]) && ($cfg["owner"] !== ""))?($cfg["owner"]):" ITBOYE "); ?>" />
	    <meta content="yes" name="apple-mobile-web-app-capable" />
	    <meta content="yes" name="apple-touch-fullscreen" />
	    <meta content="telephone=no,email=no" name="format-detection" />
	    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		
		<!-- 系统基本样式 -->
		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/cdn/amazeui/2.3.0/css/amazeui.min.css" />
		
		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/Home/css/home.css?v=1432705658" />
		
		<!-- 脚本 -->
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/amazeui/2.3.0/js/amazeui.min.js"></script>
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/common/mobile.js?v=1432705658"></script>
		

		
	<link rel="stylesheet" type="text/css" href="/github/2015upgrade/Public/Home/css/login.css?v=1432705658" />


	</head>
	
	<body class="theme-default">

		
	<div class="am-text-center am-cf login am-center">
		<form class="am-form am-form-horizontal am-g am-u-lg-12 am-u-md-12 am-u-sm-12 am-cf loginform validateForm">
			<fieldset>
				<legend>登录</legend>
				<div class="am-form-group am-form-group-sm am-g  am-cf">
					<div class="am-u-sm-12  am-u-lg-12 am-u-md-12 ">
						<i class="am-icon-user"></i>
						<input type="text" name="username" class="am-form-field username" required placeholder="请输入用户名"  />
					</div>
				</div>
				<div class="am-form-group am-form-group-sm am-g  am-cf">
					<div class="am-u-sm-12  am-u-lg-12 am-u-md-12 ">
						<i class="am-icon-lock"></i>
						<input type="password" name="password" class="am-form-field password" required placeholder="请输入密码"  />
					</div>
				</div>
				<div class="am-form-group am-form-group-sm  am-g  am-cf">
					<div class="am-u-sm-12  am-u-lg-12 am-u-md-12 ">
						<i class="am-icon-barcode"></i>
						<input type="text" name="verify" class="am-form-field verify" required placeholder="请输入验证码"  />
					</div>
				</div>
				<div class="am-form-group am-form-group-sm  am-g  am-cf">
					<div class="am-u-sm-12  am-u-lg-12 am-u-md-12 ">
					<img onclick="refresh_verify('.verifyimg');" src="<?php echo U('Home/Index/verify',array('r'=>time()));?>" class="verifyimg"  alt="验证码" title="点击换一张"/>
					</div>
				</div>
				
				<div class="am-form-group am-cf">
						<a target-form="loginform" href="/github/2015upgrade/index.php/Home/Index/login.shtml" class="ajax-post am-btn-block am-btn-primary  am-btn am-u-sm-12  am-u-lg-12 am-u-md-12 ">登录</a>
				</div>
			</fieldset>
		</form>
		
	</div>

		
	<script>
		$(document).ajaxComplete(function(){ refresh_verify(".verifyimg"); });
		
		function refresh_verify(verify){
				verify = verify || ".verify";
				var verifySrc = $(verify).attr("src");
				if (verifySrc && verifySrc.indexOf('?') > 0) {
					$(verify).attr("src", verifySrc + '&r=' + Math.random());
				} else {
					$(verify).attr("src", verifySrc.replace(/\?.*$/, '') + '?' + Math.random());
				}

		}
		
		 $(document).keydown(function(event) {
			if (event.keyCode == 13) {
				$(".ajax-post").click();
			}
		});
	</script>
	<script type="text/javascript">
		$(function() {
		})
	</script>

		
		
		<footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
			<div class="am-footer-switch">
			</div>
			<div class="am-footer-miscs ">
				<p>{__RUNTIME__}</p>
			</div>
		</footer>
		
		<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
		  <a href="#top" title="回到顶部">
		    <span class="am-gotop-title">顶部</span>
		    <i class="am-gotop-icon am-icon-chevron-up"></i>
		  </a>
		</div>
		
	</body>

</html>