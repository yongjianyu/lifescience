<?php
/**
 * Template Name:sidebar-random
 */
?>

<div class="recommendart">
	<div class="recommendart-title">
		<span>随机文章</span>
	</div>

	<div class="recommendart-content">
		<ul>
		<?php 
			$args = array('ignore_sticky_posts'=>1,'showposts'=>6,'orderby'=>'rand');
			global $wp_query;
			$wp_query = new WP_Query($args);
			if($wp_query->have_posts()){
				while($wp_query->have_posts()):$wp_query->the_post();
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php
				endwhile;
			}
			wp_reset_query();
		?>
		</ul>
	</div>
</div>