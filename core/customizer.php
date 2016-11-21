<?php

//Generate settings
add_action('customize_register', 'cpotheme_customizer');
function cpotheme_customizer($customize){
	
	wp_enqueue_style( 'epsilon-style', get_template_directory_uri() . '/core/css/customizer.css' );
	$customize->register_control_type( 'Epsilon_Control_Upsell' );
	// $customize->register_control_type( 'Epsilon_Control_Toggle' );

	//Add panels to the customizer
	$settings = cpotheme_metadata_panels();
	foreach($settings as $setting_id => $setting_data){
		$customize->add_panel($setting_id, $setting_data);
		
	}
	
	//Add sections to the customizer
	$settings = cpotheme_metadata_sections();
	foreach($settings as $setting_id => $setting_data){
		$customize->add_section($setting_id, $setting_data);
	}

	// Change background color section
	$customize->get_control('background_color')->section = 'background_image';
	$customize->get_section('background_image')->title = __( 'Background', 'allegiant' );
	
	//Add settings & controls
	$settings = cpotheme_metadata_customizer();
	foreach($settings as $setting_id => $setting_data){
		$multilingual = isset($setting_data['multilingual']) && $setting_data['multilingual'] ? true : false;
		$default = isset($setting_data['default']) ? $setting_data['default'] : '';
		
		$optionsets = array('default' => 'default');
		if($multilingual && function_exists('icl_get_languages')){
			$languages = icl_get_languages();
			global $sitepress;
			$default_language = $sitepress->get_default_language();
			foreach($languages as $current_language){
				if($current_language['language_code'] != $default_language){
					$optionsets[$current_language['language_code']] = $current_language['translated_name'];
				}
			}
		}
		
		$setting_args = array(
		'type' => 'option',
		'default' => $default,
		'capability' => 'edit_theme_options',
		'transport' => 'refresh');
		if(isset($setting_data['sanitize']) && $setting_data['sanitize'] != ''){
			$setting_args['sanitize_callback'] = $setting_data['sanitize'];
		}
		
		foreach($optionsets as $current_language => $current_language_name){
			
			//If language is not the default one
			$args = $setting_data;
			$option_array = 'cpotheme_settings';
			$control_id = $setting_id;
			if($current_language != 'default'){
				$option_array .= '_'.$current_language;
				$control_id .= '_'.$current_language;
				$args['label'] = $setting_data['label'].' ('.$current_language_name.')';
			}
			
			//Add setting to the customizer
			$customize->add_setting($option_array.'['.$setting_id.']', $setting_args); 
			
			//Define control metadata
			$args['settings'] = $option_array.'['.$setting_id.']';
			$args['priority'] = 10;
			if(!isset($args['type'])) $args['type'] = 'text';
			
			switch($args['type']){
				case 'text': 
				case 'textarea': 
				case 'select': 
				$customize->add_control('cpotheme_'.$control_id, $args); break;
				case 'checkbox': 
					$args['type'] = 'mte-toggle';
					$customize->add_control(new Epsilon_Control_Toggle($customize, 'cpotheme_'.$control_id, $args)); break;
				break;
				case 'color': 
				$customize->add_control(new WP_Customize_Color_Control($customize, 'cpotheme_'.$control_id, $args)); break;
				case 'image': 
				$customize->add_control(new WP_Customize_Image_Control($customize, 'cpotheme_'.$control_id, $args)); break;
				case 'collection': 
				$customize->add_control(new CPO_Customize_Collection_Control($customize, 'cpotheme_'.$control_id, $args)); break;
				case 'mte_upsell': 
				$customize->add_control(new Epsilon_Control_Upsell($customize, 'cpotheme_'.$control_id, $args)); break;
			}
		}		
	}
}