<?php
/**
 * Template Name:phone_menu
 */

$array = array(
				'menu'=>'HeaderMenu',
				'depth'=>'1',
				'container_class'=>'mobile-sidenav',	
			);
?>
<div class="mobile-nav">
	<button class="menubtn" onclick="MenuClick2()">菜单</button>
	<button class="searchbtn" onclick="SearchClick2()">搜索</button>
	<style type="text/css">
		.mobile-sidenav{display: none;}
	</style>
</div>
<?php wp_nav_menu($array); ?>
<div class='mobile-search' style='display:none;'>
		<?php get_search_form();?>
</div>