<?php

/**
 * Template Name: slidebanner
 */



if(of_get_option('is_banner')=='1'){
?>


<!--网页的轮播图，在后台设置相应的选项-->
<!--begain-->
<?php do_action('banner_begain'); ?>
<div class="row slidebanner">
	<?php
		if(of_get_option('is_spread')==0){
			?>
				<div class="inner slidebanner-inner">
			<?php
		}else{
			?>
				<div class="inner slidebanner-inner" style="width: 100%;">
			<?php
		}
	?>
	

		<div class="banner-lt">
			<img src="<?php echo of_get_option('banner_left',bloginfo('template_directory').'/images/banner-lt.png'); ?>">
		</div>

		<div class="carousel slide col-12" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target=".slide" data-slide-to="0" class="active"></li>
				<li data-target=".slide" data-slide-to="1"></li>
				<li data-target=".slide" data-slide-to="2"></li>
				<li data-target=".slide" data-slide-to="3"></li>
			</ul>


			<div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="<?php echo of_get_option('banner1',bloginfo('template_directory').'/images/banner.jpg'); ?>">
			    </div>

			    <div class="carousel-item">
			      <img src="<?php echo of_get_option('banner2',bloginfo('template_directory').'/images/banner.jpg'); ?>">
			    </div>

			    <div class="carousel-item">
			      <img src="<?php echo of_get_option('banner3',bloginfo('template_directory').'/images/banner.jpg'); ?>">
			    </div>

			    <div class="carousel-item">
			      <img src="<?php echo of_get_option('banner4',bloginfo('template_directory').'/images/banner.jpg'); ?>">
			    </div>
			</div>


			<a class="carousel-control-prev" href=".slide" data-slide="prev">
		    	<span class="carousel-control-prev-icon"></span>
		  	</a>
		  	<a class="carousel-control-next" href=".slide" data-slide="next">
		    	<span class="carousel-control-next-icon"></span>
		  	</a>
		</div>

		<div class="banner-rt">
			<img src="<?php echo of_get_option('banner_right',bloginfo('template_directory').'/images/banner-rt.png'); ?>">
		</div>

	</div>
</div>
<?php do_action('banner_end'); ?>
<!--end-->
		<?php
	}
?>