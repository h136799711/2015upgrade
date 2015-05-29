<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Ucenter\Controller;

class UcenterAppController extends UcenterController{
	
	public function index(){
		$map = null;
		
		$page = array('curpage'=>I('get.p'),C('LIST_ROWS'));
		
		$result = apiCall("Ucenter/UcenterApp/query", array($map,$page));
		if($result['status']){
			$this->assign("list",$result['info']['list']);
			$this->assign("show",$result['info']['show']);
			$this->display();
		}else{
			$this->error($result['info']);
		}
	}
	
	public function add(){
		if(IS_GET){
			$app_id = "itboye".hash("crc32b", time());
			$salt = md5(md5(data_auth_sign(time())),true);
			$this->assign("app_id",$app_id);
			$this->display();
		}else{
			
			$title = I('post.title','');
			$url = I('post.url','');
			$domain = I('post.domain','');
			$version = 1000;
			$sys_login = 1;
			$allow_ip = "";
			$app_id = I("post.app_id","");
			
			$salt = md5(md5(data_auth_sign(time())));
			$salt = hash("crc32b", $salt);
			
			$auth_key = $this->encrypt($app_id,"E", $salt);
			
			$entity = array(
				'title'=>$title,
				"url"=>$url,
				"domain"=>$domain,
				"version"=>$version,
				'sys_login'=>$sys_login,
				"allow_ip"=>$allow_ip,
				"app_id"=>$app_id,
				"auth_key"=>$auth_key,
				"auth_salt"=>$salt
			);
//			dump($entity);
//			exit();
			$result = apiCall("Ucenter/UcenterApp/add", array($entity));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("添加成功",U('Ucenter/UcenterApp/index'));
			
		}
	}
	
	public function edit(){
		$id = I('get.id',0);
		if(IS_GET){
			
			$result = apiCall("Ucenter/UcenterApp/getInfo", array(array("id"=>$id)));
			
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->assign("vo",$result['info']);
			$this->display();		
		}else{
			$title = I('post.title','');
			$url = I('post.url','');
			$domain = I('post.domain','');
			$version = 1000;
			$sys_login = 1;
			$allow_ip = "";
			
			
			$entity = array(
				'title'=>$title,
				"url"=>$url,
				"domain"=>$domain,
				"version"=>$version,
				'sys_login'=>$sys_login,
				"allow_ip"=>$allow_ip,
			);
			
			$result = apiCall("Ucenter/UcenterApp/saveByID", array($id,$entity));
			if(!$result['status']){
				$this->error($result['info']);
			}
			
			$this->success("添加成功",U('Ucenter/UcenterApp/index'));
			
		}
	}
	
	
	
	public function delete(){
		$id = I('get.id',0);
		$app_id = I('get.app_id','');
		
		$result = apiCall("Ucenter/UpgradeInfo/query", array(array("app_id"=>$app_id)));
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		if(count($result['info']['list']) > 0){
			$this->error("不能删除含有升级历史的应用!");
		}
		
		
		
		$result = apiCall("Ucenter/UcenterApp/delete", array(array("id"=>$id)));
		
		
		
		if(!$result['status']){
			$this->error($result['info']);
		}
		
		$this->success("删除成功!");
	}
	
	/*********************************************************************
    函数名称:encrypt
    函数作用:加密解密字符串
    使用方法:
    加密     :encrypt('str','E','nowamagic');
    解密     :encrypt('被加密过的字符串','D','nowamagic');
    参数说明:
    $string   :需要加密解密的字符串
    $operation:判断是加密还是解密:E:加密   D:解密
    $key      :加密的钥匙(密匙);
    *********************************************************************/
    function encrypt($string,$operation,$key='')
    {
        $key=md5($key);
        $key_length=strlen($key);
        $string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,8).$string;
        $string_length=strlen($string);
        $rndkey=$box=array();
        $result='';
        for($i=0;$i<=255;$i++)
        {
            $rndkey[$i]=ord($key[$i%$key_length]);
            $box[$i]=$i;
        }
        for($j=$i=0;$i<256;$i++)
        {
            $j=($j+$box[$i]+$rndkey[$i])%256;
            $tmp=$box[$i];
            $box[$i]=$box[$j];
            $box[$j]=$tmp;
        }
        for($a=$j=$i=0;$i<$string_length;$i++)
        {
            $a=($a+1)%256;
            $j=($j+$box[$a])%256;
            $tmp=$box[$a];
            $box[$a]=$box[$j];
            $box[$j]=$tmp;
            $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
        }
        if($operation=='D')
        {
            if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8))
            {
                return substr($result,8);
            }
            else
            {
                return'';
            }
        }
        else
        {
            return str_replace('=','',base64_encode($result));
        }
    }
	
	
}
