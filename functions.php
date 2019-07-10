<?php
/**
 * 这个页面是调用一些php类方法
 */


/*导入基本的wordpress的function设置*/
require( get_template_directory(). '/util/base.php' );


/*导入wordpress中自定义函数的文件*/
require( get_template_directory(). '/util/userdefined.php' );


/*导入wordpress中外观中小工具文件*/
require( get_template_directory(). '/util/widget.php' );


/*导入模版函数*/
require( get_template_directory(). '/util/templeuse.php' );


//插入options framework
if (!function_exists('optionsframework_init')){
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri().'/inc/');
	require_once dirname(__FILE__).'/inc/options-framework.php';
}
?>