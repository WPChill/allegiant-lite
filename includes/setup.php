<?php

//Add layout pieces
add_action( 'wp_head', 'cpotheme_theme_layout' );
function cpotheme_theme_layout( $data ) {
	add_action( 'cpotheme_top', 'cpotheme_top_menu' );
	add_action( 'cpotheme_header', 'cpotheme_logo' );
	add_action( 'cpotheme_header', 'cpotheme_menu_toggle' );
	add_action( 'cpotheme_header', 'cpotheme_menu' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_slider' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_features' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_about' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_tagline' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_portfolio' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_services' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_testimonials' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_clients' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_team' );
	add_action( 'cpotheme_before_main', 'cpotheme_home_contact' );
	add_action( 'cpotheme_title', 'cpotheme_page_title' );
	add_action( 'cpotheme_title', 'cpotheme_breadcrumb' );
	add_action( 'cpotheme_subfooter', 'cpotheme_subfooter' );
	add_action( 'cpotheme_footer', 'cpotheme_footer_menu' );
	add_action( 'cpotheme_footer', 'cpotheme_footer' );
}

//Add homepage slider
function cpotheme_home_slider() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'slider' );
	}
}

//Add homepage features
function cpotheme_home_features() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'features' );
	}
}

//Add homepage tagline
function cpotheme_home_tagline() {
	if ( is_front_page() ) {
		cpotheme_block( 'home_tagline', 'tagline dark', 'container' );
	}
}

//Add homepage about
function cpotheme_home_about() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'about' );
	}
}

//Add homepage portfolio
function cpotheme_home_portfolio() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'portfolio' );
	}
}

//Add homepage services
function cpotheme_home_services() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'services' );
	}
}

//Add homepage team
function cpotheme_home_team() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'team' );
	}
}

//Add homepage testimonials
function cpotheme_home_testimonials() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'testimonials' );
	}
}

//Add homepage clients
function cpotheme_home_clients() {
	if ( is_front_page() ) {
		get_template_part( 'template-parts/homepage', 'clients' );
	}
}

//Add homepage contact
function cpotheme_home_contact() {
	if ( is_front_page() && cpotheme_get_option( 'home_contact_show' ) ) {
		get_template_part( 'template-parts/homepage', 'contact' );
	}
}

add_filter( 'cpotheme_font_headings', 'cpotheme_theme_fonts' );
add_filter( 'cpotheme_font_menu', 'cpotheme_theme_fonts' );
add_filter( 'cpotheme_font_body', 'cpotheme_theme_fonts' );
function cpotheme_theme_fonts( $data ) {
	return 'Source+Sans+Pro';
}


add_filter( 'cpotheme_customizer_controls', 'cpotheme_theme_settings' );
function cpotheme_theme_settings( $data ) {
	$data['home_clients']['default'] = '';
	$data['home_posts']['default']   = true;

	return $data;
}

add_filter( 'cpotheme_background_args', 'cpotheme_background_args' );
function cpotheme_background_args( $data ) {
	$data = array(
		'default-color'      => 'eeeeee',
		'default-image'      => get_template_directory_uri() . '/images/background.jpg',
		'default-repeat'     => 'no-repeat',
		'default-position-x' => 'center',
		'default-attachment' => 'fixed',
		'default-size'       => 'cover',
	);

	return $data;
}
