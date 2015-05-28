<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016 杭州博也网络科技, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Ucenter\Controller;

class FileController extends UcenterController{
	
	protected function _initialize(){
		parent::_initialize();
	}
	
	
	public function uploadZip(){
		
		if(IS_POST){
			
	        /* 返回标准数据 */
	        $return  = array('status' => 1, 'info' => '上传成功', 'data' => '');
	
	        /* 调用文件上传组件上传文件 */
	        $File = D('File');
	        $file_driver = C('FILE_UPLOAD_DRIVER');
	        $info = $File->upload(
	            $_FILES,
	            C('FILE_UPLOAD'),
	            C('FILE_UPLOAD_DRIVER'),
	            C("UPLOAD_{$file_driver}_CONFIG")
	        ); //TODO:上传到远程服务器
//			dump($info);
	        /* 记录图片信息 */
	        if($info){
	        		
	            $return['status'] = 1;
	            $return = array_merge($info['file'], $return);
	        } else {
	        		
	            $return['status'] = 0;
	            $return['info']   = $File->getError();
	        }
	
	        /* 返回JSON数据 */
	        $this->ajaxReturn($return);
		}
		
	}
}
