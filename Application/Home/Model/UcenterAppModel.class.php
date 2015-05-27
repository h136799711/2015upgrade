<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY 杭州博也网络科技有限公司
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2016, http://www.itboye.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Home\Model;

use Think\Model;

class UcenterAppModel extends Model{
	
	protected $_auto = array(
		array('update_time',"time",self::MODEL_BOTH,"function"),
		array('create_time',NOW_TIME,self::MODEL_INSERT),
		array('status',1,self::MODEL_INSERT),
	);
	
}
