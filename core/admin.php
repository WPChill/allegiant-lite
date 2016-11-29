<?php

function cpotheme_admin_welcome_page(){
	echo '<div class="wrap about-wrap">';
	$core_path = get_template_directory().'/core/';
	if(defined('CPOTHEME_CORELITE')) $core_path = CPOTHEME_CORELITE;
	require_once($core_path.'/templates/welcome.php');
	echo '</div>';
}


//Notice display and dismissal
if(!function_exists('cpotheme_admin_notice_control')){
	add_action('admin_init', 'cpotheme_admin_notice_control');
	function cpotheme_admin_notice_control(){
		//Display a notice
		if(isset($_GET['ctdisplay']) && $_GET['ctdisplay'] != ''){
			cpotheme_update_option(htmlentities($_GET['ctdisplay']), 'display');
			wp_redirect(remove_query_arg('ctdisplay'));
		}
		//Dismiss a notice
		if(isset($_GET['ctdismiss']) && $_GET['ctdismiss'] != ''){
			cpotheme_update_option(htmlentities($_GET['ctdismiss']), 'dismissed');
			wp_redirect(remove_query_arg('ctdismiss'));
		}
	}
}