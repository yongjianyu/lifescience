<?php
/**
 * Template Name:crumbs
 */

?>
<div class="page-title">
	<?php
		if(function_exists('cmp_breadcrumbs'))
			cmp_breadcrumbs();
	?>
</div>
<?php

?>