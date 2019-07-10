<!--网页的尾部-->
<?php if(of_get_option('is_bottom') == '1'){ ?>
<?php get_template_part('friendlink'); ?>
		<!--网页的版权文字，设置有公众号，微博的二维码放置-->
		<div class="copyright">
			<div class="inner">
				<div class="cp">
					<P><?php  echo of_get_option('content_copyright'); ?></P>
				</div>
				<?php
					//如果右边不存在，则版权信息width展开到100% 
					if(of_get_option('copyright_right') != null){
						?>
						<div class="our-share">
							<p><?php echo of_get_option('copyright_right'); ?></p>
						</div>
						<?php
					}else{
						?>
						<style type="text/css">
							.copyright .cp{width: 100% !important;}
						</style>
						<?php
					}
				?>
				
			</div>
		</div>

	</div>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
