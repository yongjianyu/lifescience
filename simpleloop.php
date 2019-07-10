<?php
/**
 * Template Name：simpleloop
 */
$category_num = of_get_option('cat_num',10);
$args = array('cat'=>$id,'posts_per_page'=>$category_num,'paged'=>$paged);
global $wp_query;
$wp_query = new WP_Query($args);
if($wp_query->have_posts()){
	?>
	<div class="art">
		<div class="art-title">
			<span><a href="<?php echo get_category_link($id); ?>"><?php echo get_cat_name($id); ?></a></span>
			<a href="<?php echo get_category_link($id); ?>">+更多</a>
		</div>

		<div class="art-content">
			<ul>
	<?php
	while($wp_query->have_posts()):$wp_query->the_post();
		?>
		<li>
			<?php
				if(of_get_option('is_cat_date',1) == 1){
					echo '<span>'; 
					the_time('Y-n-j');
					echo '</span>';
				}
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</li>
		<?php
	endwhile;
	?>
			</ul>
		</div>
		<?php
			wp_reset_query();
			if($flag == 1){
				get_template_part('pagination');
				?>
				<style type="text/css">
					.single-content .art{margin-bottom: 20%;}
				</style>
				<?php
			}
		?>
	</div>
	<?php
}

?>