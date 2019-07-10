<?php get_header(); ?>
		<!--page页面菜单下面的图片-->
		<?php get_template_part('pic'); ?>
		<!---->
		<?php get_template_part('page_phone_menu'); ?>
		<!--page的主体，两栏设计,-->
		<div class=" row page-home">
			<div class="inner row">
				<div class="page-home-left col-md-3">					
					<!--page sidebar begain-->
					<?php get_sidebar(); ?>
					<!--page sidebar end-->
				</div>


				<div class="page-home-right col-md-9">
					<!--page内容-->
					<!-- <div class="page-title">
						<span>当前位置：首页>学校概况>学校简介</span>
					</div>
					 -->
					 <?php get_template_part('crumbs'); ?>
					<div class="single-content">
					<?php get_template_part('complexloop'); ?>
					</div>
				</div>
			</div>
		</div>

<?php get_footer(); ?>