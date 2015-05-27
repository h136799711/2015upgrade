<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Common\Facade;
/**
 * 外观模式
 */
abstract class Facade {
	
	//保存类实例的静态成员变量
	private static $_instance;
	 
	//private标记的构造方法
	private function __construct(){
		echo 'This is a Constructed method;';
		$this -> _init();
	}
	
	//创建__clone方法防止对象被复制克隆
	public function __clone(){
		trigger_error('Clone is not allow!',E_USER_ERROR);
	}
	
	//单例方法,用于访问实例的公共的静态方法
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	
	
	/**
	 * 抽象方法，用于初始化
	 */
	abstract protected function _init();
	
	/**
	 * 返回错误结构
	 * @return array('status'=>boolean,'info'=>Object)
	 */
	protected function returnErr($info) {
		return array('status' => false, 'info' => $info);
	}

	/**
	 * 返回成功结构
	 * @return array('status'=>boolean,'info'=>Object)
	 */
	protected function returnSuc($info) {
		return array('status' => true, 'info' => $info);
	}

	
}
