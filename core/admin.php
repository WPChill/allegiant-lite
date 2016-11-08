<?php

add_action('admin_notices', 'cpotheme_admin_welcome_notice', 90);
function cpotheme_admin_welcome_notice(){	
	if(current_user_can('manage_options')){
		$screen = get_current_screen();
		$welcome_dismissed = trim(cpotheme_get_option(CPOTHEME_ID.'_wizard', 'cpotheme_settings', false));
		
		$display = true;
		if(isset($_GET['action']) && $_GET['action'] == 'edit' || $screen->action == 'add' || $screen->base == 'plugins' || $screen->base == 'widgets') 
			$display = false;
		
		if(current_user_can('manage_options') && $welcome_dismissed != 'dismissed' && $display){
			$welcome_url = '<a href="'.esc_url(admin_url('themes.php?page=cpotheme-welcome')).'">'.__('quickstart guide', 'allegiant').'</a>';
			$plugin_url = '<strong><a href="'.esc_url(admin_url('themes.php?page=cpotheme-welcome')).'">CPO Content Types</a></strong>';
			echo '<div class="updated">';
			echo '<div class="cpotheme-notice">';
			echo '<a href="'.add_query_arg('ctdismiss', CPOTHEME_ID.'_wizard').'" class="cpothemes-notice-dismiss">'.__('Dismiss This Notice', 'allegiant').'</a>';
			echo '<p>'.sprintf(esc_html__('%s is ready! Make sure you install the %s companion plugin and then check the quickstart guide to see how it all works.', 'allegiant'), esc_attr(CPOTHEME_NAME), $plugin_url, $welcome_url).'</p>';
			echo '<p><a href="'.esc_url(admin_url('themes.php?page=cpotheme-welcome')).'" class="button button-primary" style="text-decoration: none;">'.sprintf(__('Start Using %s', 'allegiant'), esc_attr(CPOTHEME_NAME)).'</a></p>';
			echo '</div>';
			echo '</div>';
		}
	}
}

add_action('admin_menu', 'cpotheme_admin_welcome');
function cpotheme_admin_welcome(){
	if(current_user_can('manage_options')){
		add_theme_page(esc_attr(CPOTHEME_NAME), esc_attr(CPOTHEME_NAME), 'read', 'cpotheme-welcome', 'cpotheme_admin_welcome_page');
	}
}


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