<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Home\Controller;

use Think\Controller;

class FileController extends Controller{
	public function download(){
		
		$md5 = I('get.key1','');
		$sha1 = I('get.key2','');
		$map = array(
			'md5'=>$md5,
			'sha1'=>$sha1,
		);
		$fileModel =  M("File");
		$result = $fileModel->where($map)->find();
//		dump($result);
		
		if($result === false){
			LogRecord($fileModel->getDbError(), __FILE__.__LINE__);
			$this->error("发生错误!");
		}
		
		if(is_null($result)){
			$this->error("没有相关文件!");
		}
		
		$mime = $result['mime'];
		
		$url = 	C("FILE_UPLOAD.rootPath"). $result['savepath'].$result['savename'];
		
//		dump(C("FILE_UPLOAD.rootPath"));
		import("Org.Net.Http");
		
		$showName = date("Y_m_d_H_i_s",time());
		
		\Org\Net\Http::download(($url),$showName);

	}
}
