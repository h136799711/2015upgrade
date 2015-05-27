<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace Home\Controller;
use Think\Controller;


class TestController extends Controller{
	
	public function index(){
		$auth_key = urlencode('hDE):a&XO"yF<V,>q}|L!nogZ~KfHWJ8MRQjY]7s');
		$version = 999;
		$data = array("auth_key"=>$auth_key,"version"=>$version);//$auth_key/version/$version
		$header = array(
			"Accept-Charset:utf-8",
			"Referer:itboye.com",
		);
		$result = curlPost("http://localhost/github/2015upgrade/index.php/Home/Index/upgrade_check/appid/1.json",$data,$header);
//		dump($result);
		if($result['status']){
			$data = json_decode($result['info']);
		}
		
		if($data->errcode === 1){
			$this->assign("pkglist",$data->info);
		}
		
		if($data->errcode > 0){
			$this->assign("msg",$data->info);
		}
		
		
		$this->assign("data",$data);
		$this->display();
	}
	
	
	
}
