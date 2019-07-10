<?php get_header(); ?>
	<?php get_template_part('pic'); ?>
	<!--page的主体，两栏设计,-->
	<div class=" row page-home">
		<div class="inner row">
			<div class="page-home-left col-md-3">
				
				<!--page sidebar begain-->
				<?php get_sidebar(); ?>
				<!--page sidebar end-->


			</div>

			<?php the_post(); ?>
			<div class="page-home-right col-md-9">
				<!--page内容-->
				<?php get+get_template_part('crumbs'); ?>
				<div class="page-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>