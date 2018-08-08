<?php if ( ! isset( $content_width ) ) {
	$content_width = 640;
}
define( 'CPOTHEME_ID', 'allegiant' );
define( 'CPOTHEME_NAME', 'Allegiant' );
define( 'CPOTHEME_VERSION', '1.2.0' );
//Other constants
define( 'CPOTHEME_LOGO_WIDTH', '215' );
define( 'CPOTHEME_USE_SLIDES', true );
define( 'CPOTHEME_USE_FEATURES', true );
define( 'CPOTHEME_USE_PORTFOLIO', true );
define( 'CPOTHEME_USE_SERVICES', true );
define( 'CPOTHEME_USE_TESTIMONIALS', true );
define( 'CPOTHEME_USE_TEAM', true );
define( 'CPOTHEME_USE_CLIENTS', true );
define( 'CPOTHEME_PREMIUM_NAME', 'Allegiant Pro' );
define( 'CPOTHEME_PREMIUM_URL', '//www.cpothemes.com/theme/allegiant' );

// Add epsilon framework
if ( ! class_exists( 'CPO_Theme' ) ) {
	require get_template_directory() . '/includes/class-cpo-theme.php';
}

//Load Core; check existing core or load development core
$core_path = get_template_directory() . '/core/';
if ( defined( 'CPOTHEME_CORELITE' ) ) {
	$core_path = CPOTHEME_CORELITE;
}
require_once $core_path . 'init.php';
$include_path = get_template_directory() . '/includes/';
//Main components
require_once( $include_path . 'setup.php' );

if ( ! defined( 'SHORTPIXEL_AFFILIATE_CODE' ) ) {
	define( 'SHORTPIXEL_AFFILIATE_CODE', '3AXNUKA28044' );
}
