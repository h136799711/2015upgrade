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
		
		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/Home/css/home.css?v=1432705173" />
		
		<!-- 脚本 -->
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/amazeui/2.3.0/js/amazeui.min.js"></script>
		<script type="text/javascript" src="/github/2015upgrade/Public/cdn/common/mobile.js?v=1432705173"></script>
		

		
	


	</head>
	
	<body class="theme-default">

		
	<div class="admin-header">
	
	<header class="am-topbar">
  <h1 class="am-topbar-brand">
    <a href="<?php echo U('Home/TestSys/index');?>">测评系统</a>
  </h1>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li <?php if(($$active=0) == "0"): ?>class="am-active"<?php endif; ?> ><a href="<?php echo U('Home/TestSys/index');?>">测评中心</a></li>
      <li <?php if(($$active=1) == "0"): ?>class="am-active"<?php endif; ?> ><a href="<?php echo U('Home/Index/index');?>">返回网站</a></li>
    </ul>
	
    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
    		<li class="am-dropdown" data-am-dropdown>
      	<a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;">
          <span class="am-icon-users"></span> <?php echo ($login_userinfo['username']); ?>  <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="<?php echo U('Home/TestSys/modifyPwd');?>"><i class="am-icon-key am-margin-right-sm"></i>修改密码</a></li>
          <li><a class="ajax-get" href="<?php echo U('Home/Index/logout');?>"><i class=" am-icon-power-off am-margin-right-sm"></i>退出系统</a></li>
        </ul>
    		
    		</li>
    </ul>

    <div class="am-topbar-right">
      <div class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
      </div>
    </div>

  </div>
</header>

	
</div>
	<!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li class="admin-parent">
          <a href="<?php echo U('Home/TestSys/index');?>" class="am-cf" ><span class="am-icon-file"></span> 测评中心<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        </li>
        <li><a href="<?php echo U('Home/TestSys/historyReport');?>"><span class="am-icon-table"></span> 测评报告<span class="am-icon-angle-right am-fr am-margin-right"></span></a></li>
        
        <li><a href="<?php echo U('Home/Index/logout');?>" class="ajax-get"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>


      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span>最新公告</p>
          <p>欢迎进入测评中心!</p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end -->
  	
  	<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
  
	
	<div class="admin-content am-padding-sm"> 
		<div class="am-text-primary">您隶属于：<?php echo ($orgnames); ?></div>
		<div class="am-alert am-alert-secondary" data-am-alert>
			1. 进入测评 2. 开始答题 3. 提交所有答案 4. 等候审核 5. 进入测评报告查询报告
		</div>
		<div class="am-text-center">
			<table class="am-table am-table-bordered am-table-striped am-table-hover">
			    <thead>
			        <tr>
			            <th class="am-text-center">序号</th>
			            <th class="am-text-center">测评标题</th>
			            <th class="am-text-center">测评时间段</th>
			            <th class="am-text-center">操作</th>
			        </tr>
			    </thead>
			    <tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<?php echo ($key+1); ?>
								</td>
								<td class="am-text-left">
									<?php echo ($vo['title']); ?>:<?php echo ($vo['_eval']['title']); ?>
								</td>
								<td>
									<?php echo (date("Y-m-d",$vo["start_time"])); ?>至
									<?php echo (date("Y-m-d",$vo["end_time"])); ?>
								</td>
								<td>
									<?php if(in_array(($vo['_eval']['id']), is_array($doneEval_ids[$vo['id']])?$doneEval_ids[$vo['id']]:explode(',',$doneEval_ids[$vo['id']]))): ?>[已提交]
									<?php else: ?>
									<a href="<?php echo U('Home/TestSys/answer',array('eval_type'=>$vo['_eval']['type'],'test_id'=>$vo['id'],'eval_id'=>$vo['_eval']['id']));?>" class="am-btn am-btn-sm am-btn-primary"><i class="am-icon-edit"></i>进入测评</a><?php endif; ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			    </tbody>
			</table>
		</div>
	</div>

		
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