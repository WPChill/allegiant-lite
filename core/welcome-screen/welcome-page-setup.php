<?php

add_action( 'customize_controls_enqueue_scripts', 'allegiant_welcome_scripts_for_customizer', 0 );
function allegiant_welcome_scripts_for_customizer(){
	wp_enqueue_style( 'cpotheme-welcome-screen-customizer-css', get_template_directory_uri() . '/core/welcome-screen/css/welcome_customizer.css' );
}

// Load the system checks ( used for notifications )
require get_template_directory() . '/core/welcome-screen/notify-system-checks.php';

// Welcome screen
if ( is_admin() ) {
	global $allegiant_required_actions, $allegiant_recommended_plugins;
	$allegiant_recommended_plugins = array(
		'kiwi-social-share' 		=> array( 'recommended' => true ),
		'modula-best-grid-gallery' 	=> array( 'recommended' => true ),
		'uber-nocaptcha-recaptcha'	=> array( 'recommended' => false ),
		'cpo-shortcodes' 			=> array( 'recommended' => false ),
	);
	/*
	 * id - unique id; required
	 * title
	 * description
	 * check - check for plugins (if installed)
	 * plugin_slug - the plugin's slug (used for installing the plugin)
	 *
	 */


	$allegiant_required_actions = array(
		array(
			"id"          => 'allegiant-req-ac-install-cpo-content-types',
			"title"       => Allegiant_Notify_System::create_plugin_requirement_title( __( 'Install: CPO Content Types', 'allegiant' ), __( 'Activate: CPO Content Types', 'allegiant' ), 'cpo-content-types' ),
			"description" => __( 'It is highly recommended that you install the CPO Content Types plugin. It will help you manage all the special content types that this theme supports.', 'allegiant' ),
			"check"       => Allegiant_Notify_System::has_plugin( 'cpo-content-types' ),
			"plugin_slug" => 'cpo-content-types'
		),
		array(
			"id"          => 'allegiant-req-ac-install-cpo-widgets',
			"title"       => Allegiant_Notify_System::create_plugin_requirement_title( __( 'Install: CPO Widgets', 'allegiant' ), __( 'Activate: CPO Widgets', 'allegiant' ), 'cpo-widgets' ),
			"description" => __( 'It is highly recommended that you install the CPO Widgets plugin. It will help you manage all the special widgets that this theme supports.', 'allegiant' ),
			"check"       => Allegiant_Notify_System::has_plugin( 'cpo-widgets' ),
			"plugin_slug" => 'cpo-widgets'
		),
		array(
			"id"          => 'allegiant-req-ac-install-wp-import-plugin',
			"title"       => Allegiant_Notify_System::wordpress_importer_title(),
			"description" => Allegiant_Notify_System::wordpress_importer_description(),
			"check"       => Allegiant_Notify_System::has_import_plugin( 'wordpress-importer' ),
			"plugin_slug" => 'wordpress-importer'
		),
		array(
			"id"          => 'allegiant-req-ac-install-wp-import-widget-plugin',
			"title"       => Allegiant_Notify_System::widget_importer_exporter_title(),
			'description' => Allegiant_Notify_System::widget_importer_exporter_description(),
			"check"       => Allegiant_Notify_System::has_import_plugin( 'widget-importer-exporter' ),
			"plugin_slug" => 'widget-importer-exporter'
		),
		array(
			"id"          => 'allegiant-req-ac-download-data',
			"title"       => esc_html__( 'Download theme sample data', 'allegiant' ),
			"description" => esc_html__( 'Head over to our website and download the sample content data.', 'allegiant' ),
			"help"        => '<a target="_blank"  href="https://www.cpothemes.com/sample-data/allegiant-lite-posts.xml">' . __( 'Posts', 'allegiant' ) . '</a>, 
							   <a target="_blank"  href="https://www.cpothemes.com/sample-data/allegiant-widgets.wie">' . __( 'Widgets', 'allegiant' ) . '</a>',
			"check"       => Allegiant_Notify_System::has_content(),
		),
		array(
			"id"    => 'allegiant-req-ac-install-data',
			"title" => esc_html__( 'Import Sample Data', 'allegiant' ),
			"help"  => '<a class="button button-primary" target="_blank"  href="' . self_admin_url( 'admin.php?import=wordpress' ) . '">' . __( 'Import Posts', 'allegiant' ) . '</a> 
									   <a class="button button-primary" target="_blank"  href="' . self_admin_url( 'tools.php?page=widget-importer-exporter' ) . '">' . __( 'Import Widgets', 'allegiant' ) . '</a>',
			"check" => Allegiant_Notify_System::has_import_content(),
		),
	);
	require get_template_directory() . '/core/welcome-screen/welcome-screen.php';
}

add_action( 'customize_register', 'allegiant_customize_register' );
function allegiant_customize_register( $wp_customize ){
	global $allegiant_required_actions, $allegiant_recommended_plugins;
	$theme_slug = 'allegiant';
	$customizer_recommended_plugins = array();
	if ( is_array( $allegiant_recommended_plugins ) ) {
		foreach ( $allegiant_recommended_plugins as $k => $s ) {
			if( $s['recommended'] ) {
				$customizer_recommended_plugins[$k] = $s;
			}
		}
	}
	
	$wp_customize->add_section(
	  new Epsilon_Section_Recommended_Actions(
	    $wp_customize,
	    'epsilon_recomended_section',
	    array(
	      'title'                        => esc_html__( 'Recomended Actions', 'allegiant' ),
	      'social_text'                  => esc_html__( 'We are social', 'allegiant' ),
	      'plugin_text'                  => esc_html__( 'Recomended Plugins', 'allegiant' ),
	      'actions'                      => $allegiant_required_actions,
	      'plugins'                      => $customizer_recommended_plugins,
	      'theme_specific_option'        => $theme_slug . '_show_required_actions',
	      'theme_specific_plugin_option' => $theme_slug . '_show_recommended_plugins',
	      'facebook'                     => 'https://www.facebook.com/cpothemes',
	      'twitter'                      => 'https://twitter.com/cpothemes',
	      'wp_review'                    => true,
	      'priority'                     => 0
	    )
	  )
	);

}