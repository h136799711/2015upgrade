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
<link rel="stylesheet" type="text/css" href="/github/2015upgrade/Public/Ucenter/css/common.css?v=1432716591" />
<script type="text/javascript" src="/github/2015upgrade/Public/cdn/common/common.js?v=1432716591"></script>




		<link type="text/css" rel="stylesheet" href="/github/2015upgrade/Public/cdn/theme/fix_<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>.css" />
		
		
	<style type="text/css">
		
	.app-list{
		min-height:360px;
	}
	.app-list .dropdown-menu {
		background-color: rgba(40, 36, 36, 0.2);
	}
	.app-list .dropdown-menu>li>a {
	  display: block;
	  padding: 5px 0px;
	  margin: 0px 0px 5px 0px;
	  clear: both;
	  font-weight: normal;
	  line-height: 1.42857143;
	  color: #FFFFFF;
	  white-space: nowrap;
	}
	</style>


	</head>

	<body class="theme theme-<?php echo ((isset($cfg["theme"]) && ($cfg["theme"] !== ""))?($cfg["theme"]):"simplex"); ?>">
		
		
	<?php echo W('Menus/topbar');?>
	<div class="admin-main container-fluid">
		<?php echo W('Menus/left');?>
		<div class="admin-main-content">
			<?php echo W('Menus/breadcrumb');?>
			<div class="table-responsive app-list">
				<table class="table table-bordered table-condensed">
					<tr>
						<th>
							应用ID
						</th>
						<th>
							应用名称
						</th>
						<th>
							当前版本
						</th>
						<th>
							应用KEY
						</th>
						<th>
							应用域名
						</th>
						<th>
							操作
						</th>
					</tr>
					<tbody>
						<?php if(empty($list)): ?><tr>
								<td colspan="5">无相关应用信息!</td>
							</tr>
						<?php else: ?>
						
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<th>
									<?php echo ($vo["id"]); ?>
								</th>
								<th>
									<a href="<?php echo U('Ucenter/AdminApp/view',array('id'=>$vo['id']));?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i><?php echo ($vo["title"]); ?></a></th>
								<th>
									<?php echo ($vo["cur_version"]); ?>
								</th>
								<th>
									<pre><code><?php echo htmlspecialchars($vo['auth_key']);?></code></pre>
									<a href="javascript:void(0)" data-clipboard-text="<?php echo htmlspecialchars($vo['auth_key']);?>"  class="js_copy btn btn-sm btn-primary"><i class="fa fa-copy"></i>复制</a>
								</th>
								<th>
									<?php echo ($vo["domain"]); ?>
								</th>								
								<th>
									<div class="clearfix">
										<div class="">
										<a href="<?php echo U('Ucenter/AdminApp/addUpgradePkg',array('id'=>$vo['id']));?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-o-up"></i>添加升级包</a>
										<a href="<?php echo U('Ucenter/AdminApp/viewUpgradeHistory',array('id'=>$vo['id']));?>" class="btn btn-sm btn-primary"><i class="fa fa-history"></i>查看升级历史</a>
										</div>
										<br />
										<div class="dropdown">
									  	<button id="dLabel" type="button" class="btn btn-sm btn-primary"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    更多操作
									    <span class="caret"></span>
									 	</button>
									  		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									  	
												<li><a href="<?php echo U('Ucenter/AdminApp/edit',array('id'=>$vo['id']));?>" class="btn btn-default btn-sm" ><i class="fa fa-edit"></i>编辑</a></li>
												<li><a href="<?php echo U('Ucenter/AdminApp/delete',array('id'=>$vo['id']));?>" class="ajax-get btn btn-danger btn-sm"><i class="fa fa-trash"></i>删除</a></li>
									
									
									 		</ul>
									  	</div>
									  </div>
								</th>
							</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END admin-main-content -->
	</div>
		<!-- END admin-main-->

		
	<script type="text/javascript" src="/github/2015upgrade/Public/cdn/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
	
    <script >
    	var client = new ZeroClipboard( $(".js_copy") );

			client.on( "ready", function( readyEvent ) {
			  // alert( "ZeroClipboard SWF is ready!" );
			
			  client.on( "aftercopy", function( event ) {
			    // `this` === `client`
			    // `event.target` === the element that was clicked
//			    event.target.style.display = "none";
			    console.log("Copied text to clipboard: " + event.data["text/plain"] );
			    $.scojs_message("复制成功!",$.scojs_message.TYPE_OK);
			  } );
			} );
    	
    </script>
	<script type="text/javascript">
		
	$(function(){
		$('.dropdown-toggle').dropdown();
	})
	</script>

		
		<div class="admin-footer well text-center">
			<p><?php echo C('WEBSITE_OWNER');?> <a href="http://www.miitbeian.gov.cn"><?php echo C('WEBSITE_ICP');?></a></p>
			<p>&copy;2013-<?php echo date('Y');?> Version <?php echo C('APP_VERSION');?></p>
			<p>{__RUNTIME__}</p>
		</div>
		
	</body>

</html>