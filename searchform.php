<?php
/**
 * Template Name:searchform
 */

?>

<form role="search" action="<?php echo esc_url(home_url()); ?>" method="get">
	<div class="input-group">
        <input type="text" class="form-control" placeholder="输入关键字" name="s" id="s">
        <span class="input-group-btn">
        	<button class="btn btn-info" type="submit">
        		<span class="glyphicon glyphicon-search">搜索</span>
        	</button>
        </span>
	</div>
</form>