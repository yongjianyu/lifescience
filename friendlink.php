<?php
/**
 *  Template Name :friendlink
 */


if(of_get_option('is_friendlink') == '2'){
?>

		<div class="footer row">
			<div class="inner">
				<div class="footbar row">

					<div class="widget-column">
						<p><?php echo of_get_option('friendlink1_title'); ?></p>
						<?php echo of_get_option('friendlink1_content'); ?>
					</div>

					<div class="widget-column">
						<p><?php echo of_get_option('friendlink2_title'); ?></p>
						<?php echo of_get_option('friendlink2_content'); ?>
					</div>

					<div class="widget-column">
						<p><?php echo of_get_option('friendlink3_title'); ?></p>
						<?php echo of_get_option('friendlink3_content'); ?>
					</div>

					<div class="widget-column">
						<p><?php echo of_get_option('friendlink4_title'); ?></p>
						<?php echo of_get_option('friendlink4_content'); ?>
					</div>
					
					<?php
						if(of_get_option('friendlink5_title') == null){
							?>
								<style type="text/css">
									.widget-column{width: 25% !important;}
								</style>	
							<?php
						}else{
					?>
					<div class="widget-column-last">
						<p><?php echo of_get_option('friendlink5_title'); ?></p>
						<div><?php echo of_get_option('friendlink5_content'); ?></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
<?php  }elseif(of_get_option('is_friendlink') == '1'){
		if(is_home()){
			?>
			<div class="footer row">
				<div class="inner">
					<div class="footbar row">

						<div class="widget-column">
							<p><?php echo of_get_option('friendlink1_title'); ?></p>
							<?php echo of_get_option('friendlink1_content'); ?>
						</div>

						<div class="widget-column">
							<p><?php echo of_get_option('friendlink2_title'); ?></p>
							<?php echo of_get_option('friendlink2_content'); ?>
						</div>

						<div class="widget-column">
							<p><?php echo of_get_option('friendlink3_title'); ?></p>
							<?php echo of_get_option('friendlink3_content'); ?>
						</div>

						<div class="widget-column">
							<p><?php echo of_get_option('friendlink4_title'); ?></p>
							<?php echo of_get_option('friendlink4_content'); ?>
						</div>
						
						<?php
							if(of_get_option('friendlink5_title') == null){
								?>
									<style type="text/css">
										.widget-column{width: 25% !important;}
									</style>	
								<?php
							}else{
						?>
						<div class="widget-column-last">
							<p><?php echo of_get_option('friendlink5_title'); ?></p>
							<div><?php echo of_get_option('friendlink5_content'); ?></div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>


			<?php
		}
} ?>