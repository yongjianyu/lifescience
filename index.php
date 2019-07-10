<?php get_header(); ?>
		
		<?php get_template_part('slidebanner'); ?>
		<!--网页的主体，两栏设计，进行活动式设计-->
		<div class="row container-home ">
			<div class="inner row">
				<div class="column-fluid col-sm-9">
					<?php
						if(function_exists('dynamic_sidebar')) {
					        dynamic_sidebar('column-fluid');
					    }

					?>

				</div>

				<div class="homebar col-sm-3">
					
					<?php
						if(function_exists('dynamic_sidebar')) {
					        dynamic_sidebar('homebar');
					    }

					?>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>

<?php get_footer(); ?>