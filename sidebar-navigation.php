<?php

/**
 * Template Name:sidebar-navigation
 */

if(is_category()){

$current_cat_id = get_query_var('cat');
$current_cat_name = get_cat_name($current_cat_id);
$parent_cat_id = get_parent_id($current_cat_id);
?>

<div class="sidebar">
	<div class="sidebar-title"><a href="<?php echo get_category_link($parent_cat_id); ?>"><?php echo get_cat_name($parent_cat_id); ?></a></div>
	<ul>
	<?php 
		$args = array('child_of'=>$parent_cat_id,'hide_empty'=>0);
		$cats = get_categories($args);
		foreach ($cats as $cat) {
			?>
			<li class="<?php if($current_cat_name == $cat->name) echo "on"; ?> "><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></li>
			<?php
		}
	?>
	</ul>
</div>
<?php
}elseif(is_page()){
	$current_page_id =get_the_ID();
	$name = get_post($current_page_id)->post_title;
	$parent_page_id = get_parent_post($current_page_id);
	$parent_page = get_post($parent_page_id);
	?>
	<div class="sidebar">
		<div class="sidebar-title"><a href="<?php echo get_page_link($parent_page_id); ?>"><?php echo $parent_page->post_title; ?></a></div>
		<ul>
	<?php
		$args = array('child_of'=>$parent_page_id,'hide_empty'=>0);
		$pages = get_pages($args);
		foreach ($pages as $page) {
		 	# code...
		 	?>
		 	<li class="<?php if($name == $page->post_title) echo "on"; ?> "><a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
		 	<?php
		 } 

	?>
		</ul>
	</div>
	<?php
}
?>