<?php

add_action( 'customize_register', 'a_customize_register' );

function a_customize_register($wp_customize){

	require_once get_template_directory() . '/core/welcome-screen/custom-recommend-action-section.php';
		$wp_customize->register_section_type( 'Allegiant_Customize_Section_Recommend' );

		// Recomended Actions
		$wp_customize->add_section(
			new Allegiant_Customize_Section_Recommend(
				$wp_customize,
				'allegiant_recomended-section',
				array(
					'title'    => esc_html__( 'Recomended Actions', 'allegiant' ),
					'succes_text'	=> esc_html__( 'Follow us on :', 'allegiant' ),
					'facebook' => 'https://www.facebook.com/colorlib',
					'twitter' => 'https://twitter.com/colorlib',
					'wp_review' => true,
					'priority' => 0
				)
			)
		);

}

add_action( 'customize_controls_enqueue_scripts', 'allegiant_welcome_scripts_for_customizer', 0 );

function allegiant_welcome_scripts_for_customizer(){
	wp_enqueue_style( 'cpotheme-welcome-screen-customizer-css', get_template_directory_uri() . '/core/welcome-screen/css/welcome_customizer.css' );
	wp_enqueue_script( 'cpotheme-welcome-screen-customizer-js', get_template_directory_uri() . '/core/welcome-screen/js/welcome_customizer.js', array( 'customize-controls' ), '1.0', true );
}

// Load the system checks ( used for notifications )
require get_template_directory() . '/core/welcome-screen/notify-system-checks.php';

// Welcome screen
if ( is_admin() ) {
	global $allegiant_required_actions, $allegiant_recommended_plugins;
	$allegiant_recommended_plugins = array(
		'kiwi-social-share' => array( 'recommended' => false ),
		'cpo-widgets' => array( 'recommended' => false )
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
			"title"       => MT_Notify_System::create_plugin_requirement_title( __( 'Install: CPO Content Types', 'allegiant' ), __( 'Activate: CPO Content Types', 'allegiant' ), 'cpo-content-types' ),
			"description" => __( 'It is highly recommended that you install the CPO Content Types plugin. It will help you manage all the special content types that this theme supports.', 'allegiant' ),
			"check"       => MT_Notify_System::has_import_plugin( 'cpo-content-types' ),
			"plugin_slug" => 'cpo-content-types'
		),
		array(
			"id"          => 'allegiant-req-ac-install-wp-import-plugin',
			"title"       => MT_Notify_System::wordpress_importer_title(),
			"description" => MT_Notify_System::wordpress_importer_description(),
			"check"       => MT_Notify_System::has_import_plugin( 'wordpress-importer' ),
			"plugin_slug" => 'wordpress-importer'
		),
		array(
			"id"          => 'allegiant-req-ac-install-wp-import-widget-plugin',
			"title"       => MT_Notify_System::widget_importer_exporter_title(),
			'description' => MT_Notify_System::widget_importer_exporter_description(),
			"check"       => MT_Notify_System::has_import_plugin( 'widget-importer-exporter' ),
			"plugin_slug" => 'widget-importer-exporter'
		),
		array(
			"id"          => 'allegiant-req-ac-download-data',
			"title"       => esc_html__( 'Download theme sample data', 'allegiant' ),
			"description" => esc_html__( 'Head over to our website and download the sample content data.', 'allegiant' ),
			"help"        => '<a target="_blank"  href="https://www.machothemes.com/sample-data/allegiant-lite-posts.xml">' . __( 'Posts', 'allegiant' ) . '</a>, 
							   <a target="_blank"  href="https://www.machothemes.com/sample-data/allegiant-lite-widgets.wie">' . __( 'Widgets', 'allegiant' ) . '</a>',
			"check"       => MT_Notify_System::has_content(),
		),
		array(
			"id"    => 'allegiant-req-ac-install-data',
			"title" => esc_html__( 'Import Sample Data', 'allegiant' ),
			"help"  => '<a class="button button-primary" target="_blank"  href="' . self_admin_url( 'admin.php?import=wordpress' ) . '">' . __( 'Import Posts', 'allegiant' ) . '</a> 
							   <a class="button button-primary" target="_blank"  href="' . self_admin_url( 'tools.php?page=widget-importer-exporter' ) . '">' . __( 'Import Widgets', 'allegiant' ) . '</a>',
			"check" => MT_Notify_System::has_import_plugins(),
		),
	);
	require get_template_directory() . '/core/welcome-screen/welcome-screen.php';
}