

<?php get_header(); ?>
		<!--page页面菜单下面的图片-->
		<?php get_template_part('pic'); ?>
		<!---->

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
					<?php get_template_part('crumbs'); ?>
					
					<div class="single-content">
					<?php
						$posts=query_posts($query_string .'&posts_per_page=15');
						if(have_posts()){
							?>
							<div class="art" style="width: 100%;">
								<div class="art-title">
									<span><a href="">搜索结果</a></span>
								</div>

								<div class="art-content">
									<ul>
							<?php
							while(have_posts()):the_post();
							?>
								<li>
									<span><?php the_time('Y-n-j日'); ?></span>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</li>
							<?php
							endwhile;
							?>
									</ul>
								</div>
							</div>
					<?php
						}
					?>

					</div>
				</div>
			</div>
		</div>

<?php get_footer(); ?>