


<?php

	if(is_category()){
		if(of_get_option('is_sidebarnavigation') == '1'){
			get_template_part('sidebar-navigation');
		}

		if(of_get_option('is_sidebarrandom')){
			get_template_part('sidebar-random');
		}

		if(of_get_option('is_sidebarlastest')){
			get_template_part('sidebar-laster');
		}
		
	}else if(is_page()){
		if(of_get_option('is_sidebarnavigation') == '1'){
			get_template_part('sidebar-navigation');
		}
		
		if(of_get_option('is_sidebarrandom')){
			get_template_part('sidebar-random');
		}

		if(of_get_option('is_sidebarlastest')){
			get_template_part('sidebar-laster');
		}
	}else if(is_single()){		
		if(of_get_option('is_sidebarrandom')){
			get_template_part('sidebar-random');
		}

		if(of_get_option('is_sidebarlastest')){
			get_template_part('sidebar-laster');
		}
	}else if(is_search()){
		if(of_get_option('is_sidebarrandom')){
			get_template_part('sidebar-random');
		}

		if(of_get_option('is_sidebarlastest')){
			get_template_part('sidebar-laster');
		}
	}else{
		if(of_get_option('is_sidebarnavigation') == '1'){
			get_template_part('sidebar-navigation');
		}
		
		if(of_get_option('is_sidebarrandom')){
			get_template_part('sidebar-random');
		}

		if(of_get_option('is_sidebarlastest')){
			get_template_part('sidebar-laster');
		}
	}
	
?>