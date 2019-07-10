<?php

/**
 * description:这是一些wordpress基础functions设置
 * version:1.0
 * author:yu
 */

//移除wordpress后台顶部左上角图标及链接
function annointed_admin_bar_remove(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
// add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove',0);

//去除wordpress前台顶部管理栏
add_filter( 'show_admin_bar', '__return_false' );


//去除谷歌字体
if (!function_exists('remove_wp_open_sans')){ 
	function remove_wp_open_sans() {
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );
	}
}
add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
add_action('admin_enqueue_scripts', 'remove_wp_open_sans');

//缩列图添加
if(function_exists('add_theme_support')){
	add_theme_support( 'post-thumbnails' );
}


//在外观中添加菜单
// if(function_exists('register_nav_menus')){
//     register_nav_menus();
// }
// 
//在外观中添加小工具和菜单
if(function_exists('register_sidebar')){
	$options = array(
		array(
			'name' => __('首页内页左栏'),
			'description' => '首页中主体部分的左栏',
			'class' => 'column-fluid col-sm-9',
			'id' => 'column-fluid'
		),

		array(
			'name' => __('首页内页右栏'),
			'description' => '首页中主体部分的右栏',
			'class' => 'homebar col-sm-3',
			'id' => 'homebar'
		),

		array(
			'name' => __('页面底部栏'),
			'description' => '请使用底部小工具',
			'class' => 'page_bottom col-sm-3',
			'id' => 'page_bottom'
		),
	);

	register_sidebar($options[0]);
	register_sidebar($options[1]);
	register_sidebar($options[2]);
}



//加载相应js和css
function loadjsANDcss(){
	//加载style.css
	wp_register_style('global',get_stylesheet_uri());
	wp_enqueue_style('global');

	//加载bootstrap.min.css
	// wp_register_style('bootstrap.min.css',dirname(get_stylesheet_uri()).'/css/bootstrap.min.css');
	// wp_enqueue_style('bootstrap.min.css');

	// //加载jquery.slim.min.js
	wp_register_script('jquery.slim.min',dirname(get_stylesheet_uri()).'/js/jquery.slim.min.js');
	wp_enqueue_script('jquery.slim.min');

	// //加载popper.min.js
	wp_register_script('popper.min',dirname(get_stylesheet_uri()).'/js/popper.min.js');
	wp_enqueue_script('popper.min');

	// //加载bootstrap.min.js
	wp_register_script('bootstrap.min.js',dirname(get_stylesheet_uri()).'/js/bootstrap.min.js');
	wp_enqueue_script('bootstrap.min.js');

	// //加载jquery.min.js
	wp_register_script('jquery.min',dirname(get_stylesheet_uri()).'/js/jquery.min.js');
	wp_enqueue_script('jquery.min');

	//加载screen.js
	wp_register_script('screen',dirname(get_stylesheet_uri()).'/js/screen.js',true);
	wp_enqueue_script('screen');
	
}
add_action( 'wp_enqueue_scripts', 'loadjsANDcss' ); 





//清除wordpress前台自动加载的js和css
//提高速度
add_action( 'wp_print_styles',     'my_deregister_styles', 100 );
function my_deregister_styles()    {
	if(!is_user_logged_in()){
		wp_deregister_style( 'amethyst-dashicons-style' );
		wp_deregister_style( 'dashicons' );
		// wp_deregister_script('thickbox');//主题不能取消核心脚本的注解
	}
}


//清理emoji表情的加载
// remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
// remove_action( 'wp_print_styles', 'print_emoji_styles' );
// remove_action( 'admin_print_styles', 'print_emoji_styles' );
// if ( !function_exists( 'disable_embeds_init' ) ) :function disable_embeds_init(){
// 		global $wp;
// 		$wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
// 		remove_action('rest_api_init', 'wp_oembed_register_route');
// 		add_filter('embed_oembed_discover', '__return_false');
// 		remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
// 		remove_action('wp_head', 'wp_oembed_add_discovery_links');
// 		remove_action('wp_head', 'wp_oembed_add_host_js');
// 		add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');
// 		add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
// 	}
// 	add_action('init', 'disable_embeds_init', 9999);
// endif;
// 


//修改后台版权
add_filter('admin_footer_text', '_admin_footer_left_text');
function _admin_footer_left_text($text) {
	$text = '感谢使用<a href="https://wordpress.org">WordPress</a>进行创作<br>主题作者：<a href="https://blog.csdn.net/jiejieyuy">余永建</a>';
	return $text;
}

?>