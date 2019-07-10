<?php
/**
 * Template Name:complexloop
 */

do_action('complexloop begain');
$cat = get_query_var('cat');
$result = get_categories("child_of=".$cat."&hide_empty=0");
if($result){
	$flag = 0;
	foreach ($result as $re) {
		# code...
		$id = $re->term_id;
		require('simpleloop.php');

	}
}else{
	$flag = 1;
	$id = $cat;
	?>
	<style type="text/css">
		.art{width:100%;}
	</style>
	<?php
	require('simpleloop.php');
}
do_action('complexloop end');

?>