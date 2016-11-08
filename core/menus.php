<?php

//Change the default walker for custom menu widgets
add_filter('wp_nav_menu_args', 'cpotheme_menu_walker');
function cpotheme_menu_walker($args){
	//Widgets do not use a theme_location
	if($args['theme_location'] == ''){
		$args = array_merge($args, array('walker' => new Cpotheme_Menu_Walker()));
	}
	return $args;
}