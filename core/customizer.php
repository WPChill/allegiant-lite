<?php

//Generate settings
add_action( 'customize_register', 'cpotheme_customizer' );
function cpotheme_customizer( $customize ) {

	//Add panels to the customizer
	$settings = cpotheme_metadata_panels();
	foreach ( $settings as $setting_id => $setting_data ) {
		$customize->add_panel( $setting_id, $setting_data );

	}

	//Add sections to the customizer
	$settings = cpotheme_metadata_sections();
	foreach ( $settings as $setting_id => $setting_data ) {

		if ( isset( $setting_data['type'] ) ) {

			switch ( $setting_data['type'] ) {
				case 'epsilon-section-pro':
					$customize->add_section(
						new Epsilon_Section_Pro(
							$customize,
							$setting_id,
							$setting_data
						)
					);
					break;

				default:
					$customize->add_section( $setting_id, $setting_data );
					break;
			}
		} else {
			$customize->add_section( $setting_id, $setting_data );
		}
	}

	$customize->get_section( 'title_tagline' )->panel     = 'cpotheme_management';
	$customize->get_section( 'header_image' )->panel      = 'cpotheme_management';
	$customize->get_section( 'background_image' )->panel  = 'cpotheme_management';
	$customize->get_section( 'static_front_page' )->panel = 'cpotheme_management';

	//Add settings & controls
	$settings = cpotheme_metadata_customizer();
	foreach ( $settings as $setting_id => $setting_data ) {
		$multilingual = isset( $setting_data['multilingual'] ) && $setting_data['multilingual'] ? true : false;
		$default      = isset( $setting_data['default'] ) ? $setting_data['default'] : '';

		$optionsets = array( 'default' => 'default' );
		if ( $multilingual ) {
			if ( function_exists( 'icl_object_id' ) && class_exists( 'SitePress' ) ) {
				$languages = icl_get_languages();
				global $sitepress;
				$default_language = $sitepress->get_default_language();
				foreach ( $languages as $current_language ) {
					if ( $current_language['language_code'] != $default_language ) {
						$optionsets[ $current_language['language_code'] ] = $current_language['translated_name'];
					}
				}
			} elseif ( function_exists( 'pll_languages_list' ) ) {
				$languages        = pll_languages_list( array( 'hide_if_empty' => 0 ) );
				$default_language = pll_default_language();
				if ( ! empty( $languages ) ) {
					foreach ( $languages as $current_language ) {
						if ( $current_language != $default_language ) {
							$optionsets[ $current_language ] = strtoupper( $current_language );
						}
					}
				}
			}
		}

		$setting_args = array(
			'type'       => 'option',
			'default'    => $default,
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		);
		if ( isset( $setting_data['sanitize'] ) && '' != $setting_data['sanitize'] ) {
			$setting_args['sanitize_callback'] = $setting_data['sanitize'];
		}

		foreach ( $optionsets as $current_language => $current_language_name ) {

			//If language is not the default one
			$args         = $setting_data;
			$option_array = 'cpotheme_settings';
			$control_id   = $setting_id;
			if ( 'default' != $current_language ) {
				$option_array .= '_' . $current_language;
				$control_id   .= '_' . $current_language;
				$args['label'] = $setting_data['label'] . ' (' . $current_language_name . ')';
			}

			//Add setting to the customizer
			$customize->add_setting( $option_array . '[' . $setting_id . ']', $setting_args );

			//Define control metadata
			$args['settings'] = $option_array . '[' . $setting_id . ']';
			if ( ! isset( $args['priority'] ) ) {
				$args['priority'] = 10;
			}
			$partial_selector = '';
			if ( ! isset( $args['type'] ) ) {
				$args['type'] = 'text';
			}
			if ( isset( $args['partials'] ) ) {
				$partial_selector = $args['partials'];
				unset( $args['partials'] );
			}

			switch ( $args['type'] ) {
				case 'text':
				case 'textarea':
				case 'select':
					$customize->add_control( 'cpotheme_' . $control_id, $args );
					break;
				case 'color':
					$customize->add_control( new WP_Customize_Color_Control( $customize, 'cpotheme_' . $control_id, $args ) );
					break;
				case 'image':
					$customize->add_control( new WP_Customize_Image_Control( $customize, 'cpotheme_' . $control_id, $args ) );
					break;
				case 'collection':
					$customize->add_control( new CPO_Customize_Collection_Control( $customize, 'cpotheme_' . $control_id, $args ) );
					break;
				case 'epsilon-upsell':
					$customize->add_control( new Epsilon_Control_Upsell( $customize, 'cpotheme_' . $control_id, $args ) );
					break;
				case 'checkbox':
					$args['type'] = 'epsilon-toggle';
					$customize->add_control( new Epsilon_Control_Toggle( $customize, 'cpotheme_' . $control_id, $args ) );
					break;

			}

			if ( '' != $partial_selector ) {
				$customize->selective_refresh->add_partial(
					'cpotheme_' . $control_id, array(
						'selector' => $partial_selector,
						'settings' => array( $option_array . '[' . $setting_id . ']' ),
					)
				);
			}
		}
	}

	$customize->selective_refresh->add_partial(
		'blogname', array(
			'selector' => '#logo .site-title a',
			'settings' => array( 'blogname' ),
		)
	);

}


add_action( 'customize_preview_init', 'allegiant_customizer_live_preview' );

function allegiant_customizer_live_preview() {
	wp_enqueue_script( 'allegiant-scrollto', get_template_directory_uri() . '/core/scripts/jquery.scrollTo.js', array(), '1.0', true );
	wp_enqueue_script( 'allegiant-customizer-live-preview', get_template_directory_uri() . '/core/scripts/customizer-preview.js', array( 'customize-preview' ), '1.0', true );
}


add_action( 'customize_controls_enqueue_scripts', 'allegiant_customizer_scripts' );

function allegiant_customizer_scripts() {
	wp_enqueue_script( 'allegiant-customizer', get_template_directory_uri() . '/core/scripts/customizer.js', array( 'customize-controls' ), '1.0', true );
}
