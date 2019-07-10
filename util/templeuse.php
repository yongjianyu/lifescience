<?php
/**
 * 本文件主要编写页面调用的一些函数
 */



function get_bannner_img(){
	$banner = "";
	

	return $banner;

}



function get_SEO(){
	//设置SEO关键字
		$options = array('description'=>'','keywords'=>'');
		$description = '';
		$keywords = '';

		if (is_home() || is_page()) {
		   // 将以下引号中的内容改成你的主页description
		   $description = of_get_option('description');;

		   // 将以下引号中的内容改成你的主页keywords
		   $keywords = of_get_option('keywords');;
		}
		// elseif (is_single()) {
		//    $description1 = get_post_meta($post->ID, "description", true);
		//    $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

		//    // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
		//    $description = $description1 ? $description1 : $description2;
		   
		//    // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
		//    $keywords = get_post_meta($post->ID, "keywords", true);
		//    if($keywords == '') {
		//       $tags = wp_get_post_tags($post->ID);    
		//       foreach ($tags as $tag ) {        
		//          $keywords = $keywords . $tag->name . ", ";    
		//       }
		//       $keywords = rtrim($keywords, ', ');
		//    }
		// }
		// elseif (is_category()) {
		//    // 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
		//    $description = category_description();
		//    $keywords = single_cat_title('', false);
		// }
		// elseif (is_tag()){
		//    // 标签的description可以到后台 - 文章 - 标签，修改标签的描述
		//    $description = tag_description();
		//    $keywords = single_tag_title('', false);
		// }
		// $description = trim(strip_tags($description));
		// $keywords = trim(strip_tags($keywords));
		$options['description'] = $description;
		$options['keywords'] = $keywords;
		return $options;
}


function echo_title(){
	if ( is_home() ) {
		bloginfo('name'); echo " - "; bloginfo('description');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		echo "搜索结果"; echo " - "; bloginfo('name');
	} elseif (is_404() ) {
		echo '页面未找到!';
	} else {
		wp_title('',true);
	}
}

?>