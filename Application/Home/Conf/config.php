<?php

//客户端需要与这个一致

return array(
	//自定义配置
	"DEFAULT_THEME"=>"default",
	'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
	'SHOW_PAGE_TRACE'=>false,
	'TMPL_PARSE_STRING'  =>array(
     	'__CDN__' => __ROOT__.'/Public/cdn', // 更改默认的/Public 替换规则
		'__JS__'     => __ROOT__.'/Public/'.MODULE_NAME.'/js', // 增加新的JS类库路径替换规则
     	'__CSS__'     => __ROOT__.'/Public/'.MODULE_NAME.'/css', // 增加新的JS类库路径替换规则
     	'__IMG__'     => __ROOT__.'/Public/'.MODULE_NAME.'/imgs', // 增加新的JS类库路径替换规则	
     
	),	
	
);
