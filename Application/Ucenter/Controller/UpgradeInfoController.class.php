<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Ucenter\Controller;

class UpgradeInfoController extends UcenterController{
	
	public function index(){
		
		$appid = I('get.appid','');
		$map = array(
			'app_id'=>$appid,
		);
		$page = array('curpage'=>I('get.p',0),'size'=>15);
		$order = "version desc";
		
		$result = apiCall("Ucenter/UpgradeInfo/query", array($map,$page,$order));
		if(!$result['status']){
			$this->error($result['info']);
		}
		
		$this->assign("appid",$appid);
		$this->assign("list",$result['info']['list']);
		$this->assign("show",$result['info']['show']);
		$this->display();
		
	}
	
	/**
	 * 新增升级包
	 */
	public function add(){
		if(IS_GET){
			
			$appid = I('get.appid','');
			
			$result = apiCall("Ucenter/UcenterApp/getInfo", array(array("app_id"=>$appid)));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			if(is_null($result['info'])){
				$this->error("id错误!");
			}
			
			$this->assign("appid",$appid);
			$this->assign("next_version",$result['info']['version']+1);
			
			$this->display();
			
		}else{
			
			$appid = I('get.appid','');
			$version = I('post.version',0);
			$name = I('post.name','');
			$entity = array(
				'version'=>I('post.version',0),
				'name'=>$name,
				'desc'=>I('post.desc',''),
				'upgrade_pkg_url'=>I('post.upload_zip_url',''),
				'app_id'=>$appid,
			);
			
			$result = apiCall("Ucenter/UpgradeInfo/add", array($entity));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$result = apiCall("Ucenter/UcenterApp/save", array(array("appid"=>$appid),array("version"=>$version)));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			$this->success("保存成功!",U('Ucenter/UpgradeInfo/index',array("appid"=>$appid)));
		}
	}
	
	/**
	 * 	删除ID
	 */
	public function delete(){
		if(IS_GET){
			
			$id = I('get.id',0);
			
			$map = array(
				'id'=>$id,
			);
			
			$result = apiCall("Ucenter/UpgradeInfo/delete", array($map));
//			dump($result);
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("删除成功!");
			
		}
	}


	/**
	 * 	查看
	 */
	public function view(){
		if(IS_GET){
			
			$id = I('get.id',0);
			
			$map = array(
				'id'=>$id,
			);
			
			$result = apiCall("Ucenter/UpgradeInfo/getInfo", array($map));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->assign("vo",$result['info']);
			$this->display();
			
		}
	}


	/**
	 * 	编辑
	 */
	public function edit(){
		if(IS_GET){
			
			$id = I('get.id',0);
			
			$map = array(
				'id'=>$id,
			);
			
			$result = apiCall("Ucenter/UpgradeInfo/getInfo", array($map));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->assign("vo",$result['info']);
			$this->display();
			
		}else{
			$id = I('post.id',0);
			$app_id = I('post.app_id','');
			$version = I('post.version',0);
			$name = I('post.name','');
			$entity = array(
				'version'=>I('post.version',0),
				'name'=>$name,
				'desc'=>I('post.desc',''),
				'upgrade_pkg_url'=>I('post.upload_zip_url',''),
			);
			
			$result = apiCall("Ucenter/UpgradeInfo/saveByID", array($id,$entity));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$result = apiCall("Ucenter/UcenterApp/save", array(array("appid"=>$appid),array("version"=>$version)));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("保存成功!",U('Ucenter/UpgradeInfo/index',array("appid"=>$app_id)));
		}
	}

	/**
	 * 	开放下载
	 */
	public function publish(){
		if(IS_GET){
			
			$id = I('get.id',0);
			
			$map = array(
				'status'=>1,
			);
			
			$result = apiCall("Ucenter/UpgradeInfo/saveByID", array($id,$map));
//			dump($result);
			if(!$result['status']){
				$this->error($result['info']);
			}
			$this->success("操作成功!");
			
		}
	}
	/**
	 * 	未开放下载
	 */
	public function draft(){
		if(IS_GET){
			
			$id = I('get.id',0);
			
			$map = array(
				'status'=>0,
			);
			
			$result = apiCall("Ucenter/UpgradeInfo/saveByID", array($id,$map));
//			dump($result);
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("操作成功!");
			
		}
	}
	
}
