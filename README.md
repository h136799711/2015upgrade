# 2015upgrade
upgrade，Web在线升级   

1. 对每个网站、app等都作为一个应用实体application   

2. 每个application 都有唯一ID（永久、不可变的）、以及一个通用的密钥永久的app_key[可重新生成，但只有一个可用,包含所有应用开放的权限]. (后期考虑多个通信密钥app_key,不同密钥有不同权限)   

3.    


===涉及到实体
[app_id]表示[app_id]将被application_info的app_id替换。指的是每个应用都有他自己的authority表(单独的，以app_id来区分)

一个应用不能分割为小应用。只能拆分，

1. app_info 应用基本信息
	app_id ,app_key ,version,author,desc, 
	
2. app_[app_id]_authority 应用中的权限节点
	
	auth_rule,
	
3. app_[app_id]_user 应用中的用户账号信息，只包含登录账号，密码，注册时间、IP，手机号,邮箱,等少量关键信息
	
4. 登录、注册、获取用户信息

4. 资源定义
	1. 名词-表示一个资源, url通常作为资源标示
	2. 动词-表示一个权限, 拥有与被拥有,删除、添加、更新、查看、下载、导出、