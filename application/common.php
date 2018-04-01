<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Config;
/**
 * 映射字段
 * 
 *@param orgArray 原始字段
 *@param mapArray 对应字段
 *@param fieldArray 映射后的key字段必须在当前字段中，如果为空则不处理
 *@return 返回新的数组
 */
function mapField($orgArray, $mapArray, $fieldArray=Array())
{
	$ret = array();
	while(list($k, $v) = each($orgArray))
	{
		if(array_key_exists($k, $mapArray))
		{
			if(!empty($fieldArray) && in_array($mapArray[$k], $fieldArray))
				$ret[$mapArray[$k]] = $v;
			else if(empty($fieldArray))
				$ret[$mapArray[$k]] = $v;
		}else if(!empty($fieldArray) && in_array($k, $fieldArray))
			$ret[$k] = $v;
		else if(empty($fieldArray))
			$ret[$k] = $v;
	}
	
	return $ret;
}


/**
 * 根据当前模块路径计算资源的相对位置
 * 
 *@return 返回资源相对位置，如../
 */
function getRelativePath(){
	$request = request();
	$path = explode("/", $request->pathinfo());
	$reldir = "./";
	for($i = 0; $i < sizeof($path); $i++)
		$reldir .= "../";
		
	return $reldir;
}

