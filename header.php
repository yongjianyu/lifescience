<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		$options = get_SEO();
	?>
	<meta name="description" content="<?php echo$options['description']; ?>" />
	<meta name="keywords" content="<?php echo $options['keywords']; ?>" />
	<!--css的CDN-->
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<?php wp_head(); ?>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
</head>
<?php flush(); ?>
<body>
	<div class="container-fluid">

		<!--网页头部隔断，在后台设置中，有对应的文本进行编辑-->
		<div class="row topbar">
			<div class="inner row">
				<div class="col-md-3 topbar-left">
					<?php echo of_get_option('topbar_left'); ?>
				</div>
				<div class="col-md-6 topbar-mid"></div>
				<div class="col-md-3 topbar-right" style="text-align-last: right;">
					<?php echo of_get_option('topbar_right'); ?>
				</div>
			</div>
		</div>


		<!--网页头部，里面设置有头部，搜索框，还有其他自定义的选项-->
		<div class="row header">
			<div class="inner row">
				<div class="logo col-sm-7">
					<!--logo开始，在主题设置中可以设置logo图片-->
					<a href="#"> 
						<img src="<?php echo of_get_option('logo',get_bloginfo('template_directory').'/images/logo.png'); ?>">
					
					</a>
					<!---->
				</div>

				<!--主题设置中设置文本为logo右侧内容-->
				<div class="logo-rt col-sm-2">
				</div>
				<!---->


				<!--搜索框，之后会替换成wp的搜索框-->
				<div class="search col-sm-3">
					<?php get_search_form();  ?>
				</div>
				<!---->



			</div>
		</div>

		<!--移动端导航-->
		<?php 
			// echo_phone_menu();
			get_template_part('phone_menu'); 
		?>
		<!---->



		<!--网页的导航栏，应该设置移动端的匹配-->
		<?php echo_pc_menu(); ?>
