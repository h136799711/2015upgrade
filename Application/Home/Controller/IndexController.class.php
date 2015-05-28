<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Home\Controller;

use Think\Controller;
use Think\Controller\RestController;

class IndexController extends RestController{
	protected $allowMethod    = array('get','post'); // REST允许的请求类型列表
	
	public function _empty(){
		
		$data = array(
			'status'=>false,
			"info"=>"禁止访问!",
		);
		$this->response($data,"json");
	}
	
	/**
	 * 查询应用是否有更新包
	 * errcode= 100 错误的appid
	 * errcode= 101 错误的auth_key
	 * errcode= 102 未授权的域名
	 * errcode= 103 非法版本号
	 * errcode= 0 正常
	 * @return 
	 */
	public function upgrade_check_post_json(){
		
		$app_id = I('get.appid',0);//APPID
		
		$auth_key = I("post.auth_key","","urldecode");//auth_key 
		$version = I("post.version",100000000,'intval');//当前在用版本 
		addWeixinLog(I('server.'),"升级检测记录!");
		
		$map = array(
			'id'=>$app_id,
		);
		
		$result = apiCall("Home/UcenterApp/getInfo", array($map));
		
		if(!$result['status']){
			LogRecord($result['info'], __FILE__.__LINE__);
		}
		
		//检测APPID
		if(is_null($result['info'])){
			$data = array(
				'errcode'=>100,
				'info'=> '错误的APPID!',
			);
			$this->response($data,"json");
		}
		$appinfo = $result['info'];
		//检测Auth_key
		if($auth_key != $appinfo['auth_key']){
			$data = array(
				'errcode'=>101,
				'info'=>'错误的auth_key!',
			);
			$this->response($data,"json");
		}
		
		$domain = $this->refererDomain();
		
		//检测域名
		if($domain != $appinfo['domain']){
			$data = array(
				'errcode'=>102,
				'info'=>'未授权的域名!',
			);
			$this->response($data,"json");
		}
		
		if($version > intval($appinfo['version'])){
			$data = array(
				'errcode'=>103,
				'info'=>"非法版本号!",
			);
			$this->response($data,"json");
		}
		
		if($version < intval($appinfo['version'])){
			$map = array("id"=>$app_id);
			
			$map['version'] = array('gt',$version);
			
			//TODO: 从更新包表中获取待更新包记录
			$result = apiCall("Home/UpgradeInfo/queryNoPaging", array($map));
			if(!$result['status']){
				LogRecord($result['info'], __FILE__.__LINE__);
				$this->response("系统发生错误!","json");
			}
			
			//根据appid,version
			$pkgList = $result['info'];
			$data = array(
				'errcode'=>1,
				'info'=>$pkgList,
			);
			$this->response($data,"json");
		}
		
		
		//TODO: 检测IP的合法性
		
//		$ip = get_client_ip();
		
		
		$data = array(
			'errcode'=>0,
			"info"=>"",
		);
		$this->response($data,"json");
	}
	
	public function upgrade_get_json(){
		echo ("POST方法");
	}
	
	/**
	 * 获取来路domain
	 */
	private function refererDomain(){
		
		$referer = I('server.HTTP_REFERER','');
//		
//		$this->response(I('server.',''),"json");
		//TODO: 去数据库中查询$referer 是否被允许访问
		
		$str = preg_replace("/http:\/\/|https:\/\//u","",$referer);  //去掉http://
		
		$strdomain = explode("/",$str);               // 以“/”分开成数组
		$domain    = $strdomain[0];
		
		return $domain;
	}
	
}


