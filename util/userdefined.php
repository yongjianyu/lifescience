<?php
/**
 * desciption:这里自定义了许多自定义函数
 * version:1.0
 * author:yu
 */


/**
 * 获取内容的第一张图
 */
function catch_first_pic(){
	global $post,$posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $post->post_content, $matches);
	if(empty($matches[1])) {
		$first_img = "http://pdlmhfn5b.bkt.clouddn.com/01.jpg";
	}else {
		$first_img = $matches[1][0];
	}
	return $first_img;
	
}

/**
 * 设置摘要字数
 */
function custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * 获取pc端菜单代码
 */
function echo_pc_menu(){ 
	$array = array(
				'menu'=>'HeaderMenu',
				'depth'=>'2',
				'container_class'=>'nav',	
			);
	echo "<div class='row main-menu'><div class='inner'>";
	wp_nav_menu($array);
	echo "</div></div>";
}

/**
 * 获取移动端菜单代码
 */
function echo_phone_menu(){
	$array = array(
				'menu'=>'HeaderMenu',
				'depth'=>'1',
				'container_class'=>'mobile-sidenav',	
			);
	echo "<div class='mobile-nav'>
			<button class='menubtn' onclick='MenuClick()''>菜单</button>
			<button class='searchbtn' onclick='SearchClick()''>搜索</button>
			<style type='text/css'>
				.mobile-sidenav{display: none;}
			</style>";
	wp_nav_menu($array);
	echo "<div class='mobile-search' style='display:none;'>
				<form action='#' method='post'>
					<div class='input-group'>
		                <input type='text' class='form-control' placeholder='输入关键字'>
		                <span class='input-group-btn'>
		                	<button class='btn btn-info' type='button'>
		                		<span class='glyphicon glyphicon-search'>搜索</span>
		                	</button>
		                </span>
		       		 </div>
				</form>
			</div>
		</div>";
}


/**
 * 获取指定数字的文章内容
 */
function get_limitcontent($num=55){
	$content = get_the_content();
	$limitcontent = wp_trim_words($content,$num,'....');
	echo $limitcontent;
}


/*获取顶级分类id*/
function get_parent_id($current_cat_id){

	while($current_cat_id){
		$cat = get_category($current_cat_id);
		$current_cat_id = $cat->parent;
		$parent_cat_id = $cat->term_id;
	}
	return $parent_cat_id;
}

/*获取顶级页面post*/
function get_parent_post($current_page_id){
  while($current_page_id){
    $page = get_post($current_page_id);
    $current_page_id = $page->post_parent;
    $parent_page_id = $page->ID;
  }
  return $parent_page_id;

}

//分页
function pagination($show=10,$rang=3){
	global $wp_query,$paged;
  $show = of_get_option('cat_num',10);
  $rang = of_get_option('pagination_num',3);
	if(!isset($max_page)) $max_page = $wp_query->max_num_pages;
  if(!$paged) $paged = 1;
  $srart_disabled = ' ';
  $end_disabled = ' ';
  if($paged == 1) {
    $srart_disabled = 'disabled';
  }

  if($paged == $max_page){
    $end_disabled = 'disabled';
  }

  echo '<li class="page-item '.$srart_disabled.'"><a class="page-link" href="'.get_pagenum_link(1).'">首页</a></li>';
  echo '<li class="page-item '.$srart_disabled.'"><a class="page-link" href="'.get_pagenum_link($paged-1).'">上一页</a></li>';
  if($max_page <= $rang){
    for($i=1;$i<=$max_page;$i++){
      echo '<li class="page-item';
      if($i == $paged){
        echo '  active';
      }
      echo '"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
    }
  }

  if($max_page>$rang){
    if($paged == 1){
      for($i=1;$i<=$rang;$i++){
        echo '<li class="page-item';
        if($i == $paged){
          echo '  active';
        }
        echo '"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
      }
    }else{
      for($i=$paged-1;$i<=$rang;$i++){
        echo '<li class="page-item';
        if($i == $paged){
          echo '  active';
        }
        echo '"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
      }
    }
  }
  echo '<li class="page-item '.$end_disabled.'"><a class="page-link" href="'.get_pagenum_link($paged+1).'">下一页</a></li>';
  echo '<li class="page-item '.$end_disabled.'"><a class="page-link" href="'.get_pagenum_link($max_page).'">尾页</a></li>';
  
}


function crumbs(){
  if(!is_home() && !is_front_page() || is_paged()){
    echo "test";
  }
}
//面包屑导航
function cmp_breadcrumbs() {
  $delimiter = '»'; // 分隔符
  $before = '<span class="current">'; // 在当前链接前插入
  $after = '</span>'; // 在当前链接后插入

  if ( !is_home() && !is_front_page() || is_paged() ) {
    echo '<span>'.__( '当前位置:' , 'cmp' ).'</span>';
    global $post;
    $homeLink = home_url();
    echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( '首页' , 'cmp' ) . '</a> ' . $delimiter . ' ';
    if ( is_category() ) { // 分类 存档
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0){
        $cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
        echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
      }
      echo $before . '' . single_cat_title('', false) . '' . $after;
    }elseif ( is_day() ) { // 天 存档
      echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
    } elseif ( is_month() ) { // 月 存档
      echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
    } elseif ( is_year() ) { // 年 存档
      echo $before . get_the_time('Y') . $after;
    } elseif ( is_single() && !is_attachment() ) { // 文章
      if ( get_post_type() != 'post' ) { // 自定义文章类型
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else { // 文章 post
        $cat = get_the_category(); $cat = $cat[0];
        $cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
        echo $before . get_the_title() . $after;
      }
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
    } elseif ( is_attachment() ) { // 附件
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
    } elseif ( is_page() && !$post->post_parent ) { // 页面
      echo $before . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) { // 父级页面
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif ( is_search() ) { // 搜索结果
      echo $before ;
      printf( __( '搜索词: %s', 'cmp' ),  get_search_query() );
      echo  $after;
    } elseif ( is_tag() ) { //标签 存档
      echo $before ;
      printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
      echo  $after;
    } elseif ( is_author() ) { // 作者存档
      global $author;
      $userdata = get_userdata($author);
      echo $before ;
      printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
      echo  $after;
    } elseif ( is_404() ) { // 404 页面
      echo $before;
      _e( 'Not Found', 'cmp' );
      echo  $after;
    }
      if ( get_query_var('paged') ) { // 分页
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
      echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
    }
  }
}




?>