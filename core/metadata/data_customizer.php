<?php 

//Define customizer sections
if(!function_exists('cpotheme_metadata_panels')){
	function cpotheme_metadata_panels(){
		$data = array();
		
		$data['cpotheme_layout'] = array(
		'title' => __('Layout', 'allegiant'),
		'description' => __('Here you can find settings that control the structure and positioning of specific elements within your website.', 'allegiant'),
		'priority' => 25);
		
		return apply_filters('cpotheme_customizer_panels', $data);
	}
}


//Define customizer sections
if(!function_exists('cpotheme_metadata_sections')){
	function cpotheme_metadata_sections(){
		$data = array();
		
		$data['cpotheme_management'] = array(
		'title' => __('General Theme Options', 'allegiant'),
		'description' => __('Options that help you manage your theme better.', 'allegiant'),
		'capability' => 'edit_theme_options',
		'priority' => 15);
		
		$data['cpotheme_layout_general'] = array(
		'title' => __('Site Wide Structure', 'allegiant'),
		'description' => sprintf(__('Upgrade to %s to control the layout of your sidebars and other global elements.', 'allegiant'), cpotheme_upgrade_link()),
		'capability' => 'edit_theme_options',
		'panel' => 'cpotheme_layout',
		'priority' => 25);
		
		$data['cpotheme_layout_home'] = array(
		'title' => __('Homepage', 'allegiant'),
		'capability' => 'edit_theme_options',
		'panel' => 'cpotheme_layout',
		'priority' => 50);
		
		if(defined('CPOTHEME_USE_SLIDES') && CPOTHEME_USE_SLIDES == true){
			$data['cpotheme_layout_slider'] = array(
			'title' => __('Slider', 'allegiant'),
			'description' => sprintf(__('Upgrade to %s to customize the behavior of the slider.', 'allegiant'), cpotheme_upgrade_link()),
			'capability' => 'edit_theme_options',
			'panel' => 'cpotheme_layout',
			'priority' => 50);
		}
		
		if(defined('CPOTHEME_USE_FEATURES') && CPOTHEME_USE_FEATURES == true){
			$data['cpotheme_layout_features'] = array(
			'title' => __('Features', 'allegiant'),
			'capability' => 'edit_theme_options',
			'panel' => 'cpotheme_layout',
			'priority' => 50);
		}
		
		if(defined('CPOTHEME_USE_PORTFOLIO') && CPOTHEME_USE_PORTFOLIO == true){
			$data['cpotheme_layout_portfolio'] = array(
			'title' => __('Portfolio', 'allegiant'),
			'capability' => 'edit_theme_options',
			'panel' => 'cpotheme_layout',
			'priority' => 50);
		}
		
		if(defined('CPOTHEME_USE_SERVICES') && CPOTHEME_USE_SERVICES == true){
			$data['cpotheme_layout_services'] = array(
			'title' => __('Services', 'allegiant'),
			'capability' => 'edit_theme_options',
			'panel' => 'cpotheme_layout',
			'priority' => 50);
		}
		
		if(defined('CPOTHEME_USE_TEAM') && CPOTHEME_USE_TEAM == true){
			$data['cpotheme_layout_team'] = array(
			'title' => __('Team Members', 'allegiant'),
			'capability' => 'edit_theme_options',
			'panel' => 'cpotheme_layout',
			'priority' => 50);
		}
		
		if(defined('CPOTHEME_USE_TESTIMONIALS') && CPOTHEME_USE_TESTIMONIALS == true){
			$data['cpotheme_layout_testimonials'] = array(
			'title' => __('Testimonials', 'allegiant'),
			'capability' => 'edit_theme_options',
			'panel' => 'cpotheme_layout',
			'priority' => 50);
		}
		
		if(defined('CPOTHEME_USE_CLIENTS') && CPOTHEME_USE_CLIENTS == true){
			$data['cpotheme_layout_clients'] = array(
			'title' => __('Clients', 'allegiant'),
			'capability' => 'edit_theme_options',
			'panel' => 'cpotheme_layout',
			'priority' => 50);
		}
		
		$data['cpotheme_typography'] = array(
		'title' => __('Typography', 'allegiant'),
		'description' => __('Custom typefaces for the entire site.', 'allegiant'),
		'capability' => 'edit_theme_options',
		'priority' => 45);

		$data['cpotheme_layout_posts'] = array(
		'title' => __('Blog Posts', 'allegiant'),
		'capability' => 'edit_theme_options',
		'panel' => 'cpotheme_layout',
		'priority' => 50);
		
		$data['cpotheme_typography'] = array(
		'title' => __('Typography', 'allegiant'),
		'description' => sprintf(__('Upgrade to %s to control the gain full control over the typography of your site.', 'allegiant'), cpotheme_upgrade_link()),
		'capability' => 'edit_theme_options',
		'priority' => 45);
		
		return apply_filters('cpotheme_customizer_sections', $data);
	}
}


if(!function_exists('cpotheme_metadata_customizer')){
	function cpotheme_metadata_customizer($std = null){
		$data = array();
		
		$data['general_logo'] = array(
		'label' => __('Custom Logo', 'allegiant'),
		'description' => __('Insert the URL of an image to be used as a custom logo.', 'allegiant'),
		'section' => 'title_tagline',
		'sanitize' => 'esc_url',
		'type' => 'image');
		
		$data['general_logo_width'] = array(
		'label' => __('Logo Width (px)', 'allegiant'),
		'description' => __('Forces the logo to have a specified width.', 'allegiant'),
		'section' => 'title_tagline',
		'type' => 'text',
		'placeholder' => '(none)',
		'sanitize' => 'absint',
		'width' => '100px');
		
		$data['general_texttitle'] = array(
		'label' => __('Enable Text Title?', 'allegiant'),
		'description' => __('Activate this to display the site title as text.', 'allegiant'),
		'section' => 'title_tagline',
		'type' => 'checkbox',
		'sanitize' => 'cpotheme_sanitize_bool',
		'std' => false);
		
		$data['general_editlinks'] = array(
		'label' => __('Show Edit Links', 'allegiant'),
		'description' => __('Display edit links on the site layout for logged in users.', 'allegiant'),
		'section' => 'cpotheme_management',
		'type' => 'checkbox',
		'sanitize' => 'cpotheme_sanitize_bool',
		'std' => '1');
		
		//Layout		
		/*$data['general_credit'] = array(
		'label' => __('Show Credit Link', 'allegiant'),
		'section' => 'cpotheme_layout_general',
		'type' => 'checkbox',
		'sanitize' => 'cpotheme_sanitize_bool',
		'default' => '1');*/
		
		$data['upsell-homepage'] = array(
		'button_text' => __('Upgrade to Pro', 'allegiant'),
		'button_url' => cpotheme_upgrade_only_link(),
		'requirements' => array(
				__('The PRO version of Allegiant allows you to control the ordering of elements in the homepage as well as their behavior.', 'allegiant')
			),
		'options' => array(
				__('Homepage Section Order', 'allegiant')
			),
		'section' => 'cpotheme_layout_home',
		'type' => 'mte_upsell',
		'sanitize' => 'esc_url',
		'default' =>'' );

		$data['home_tagline'] = array(
		'label' => __('Tagline Title', 'allegiant'),
		'section' => 'cpotheme_layout_home',
		'empty' => true,
		'multilingual' => true,
		'default' => __('Add your custom tagline here.', 'allegiant'),
		'sanitize' => 'wp_kses_post',
		'type' => 'textarea');
		
		//Homepage Slider

		if(defined('CPOTHEME_USE_SLIDES') && CPOTHEME_USE_SLIDES == true){
			$data['slider_settings'] = array(
			'label' => __('Slider Options', 'allegiant'),
			'description' => __('Customize the speed, timeout and effects of the homepage slider.', 'allegiant'),
			'section' => 'cpotheme_layout_slider',
			'type' => 'label');
		}
		
		//Homepage Features
		if(defined('CPOTHEME_USE_FEATURES') && CPOTHEME_USE_FEATURES == true){
			$data['upsell-features'] = array(
			'button_text' => __('Upgrade to Pro', 'allegiant'),
			'button_url' => cpotheme_upgrade_only_link(),
			'options' => array(
					__('Number of columns', 'allegiant'),
					__('Appearance of columns', 'allegiant'),

				),
			'requirements' => array(
				__('The PRO version of Allegiant allows you to control the number of columns for the Features section.', 'allegiant'),
				__('The PRO version of Allegiant allows you to control the appearance of columns for the Features section.', 'allegiant')
			),
			'section' => 'cpotheme_layout_features',
			'type' => 'mte_upsell',
			'sanitize' => 'esc_html',
			'default' =>'' );
			$data['home_features'] = array(
			'label' => __('Features Description', 'allegiant'),
			'section' => 'cpotheme_layout_features',
			'empty' => true,
			'multilingual' => true,
			'default' => __('Our core features', 'allegiant'),
			'sanitize' => 'wp_kses_post',
			'type' => 'textarea');
		}
		
		//Portfolio layout
		if(defined('CPOTHEME_USE_PORTFOLIO') && CPOTHEME_USE_PORTFOLIO == true){
			$data['upsell-portfolio'] = array(
			'button_text' => __('Upgrade to Pro', 'allegiant'),
			'button_url' => cpotheme_upgrade_only_link(),
			'options' => array(
				__('Number of columns', 'allegiant'),

			),
			'requirements' => array(
				__('The PRO version of Allegiant allows you to control the number of columns for the Portfolio section.', 'allegiant'),
			),
			'section' => 'cpotheme_layout_portfolio',
			'type' => 'mte_upsell',
			'sanitize' => 'esc_html',
			'default' =>'' );		
			$data['home_portfolio'] = array(
			'label' => __('Portfolio Description', 'allegiant'),
			'section' => 'cpotheme_layout_portfolio',
			'empty' => true,
			'multilingual' => true,
			'default' => __('Take a look at our work', 'allegiant'),
			'sanitize' => 'wp_kses_post',
			'type' => 'textarea');
		}
		
		//Services layout
		if(defined('CPOTHEME_USE_SERVICES') && CPOTHEME_USE_SERVICES == true){
			$data['upsell-services'] = array(
			'button_text' => __('Upgrade to Pro', 'allegiant'),
			'button_url' => cpotheme_upgrade_only_link(),
			'options' => array(
				__('Number of columns', 'allegiant'),

			),
			'requirements' => array(
				__('The PRO version of Allegiant allows you to control the number of columns for the Services section.', 'allegiant'),
			),
			'section' => 'cpotheme_layout_services',
			'type' => 'mte_upsell',
			'sanitize' => 'esc_html',
			'default' =>'' );
			$data['home_services'] = array(
			'label' => __('Services Description', 'allegiant'),
			'section' => 'cpotheme_layout_services',
			'empty' => true,
			'multilingual' => true,
			'default' => __('What we can offer you', 'allegiant'),
			'sanitize' => 'wp_kses_post',
			'type' => 'textarea');
		}
		
		//Services layout
		if(defined('CPOTHEME_USE_TEAM') && CPOTHEME_USE_TEAM == true){
			$data['upsell-teammemebers'] = array(
			'button_text' => __('Upgrade to Pro', 'allegiant'),
			'button_url' => cpotheme_upgrade_only_link(),
			'options' => array(
				__('Number of columns', 'allegiant'),

			),
			'requirements' => array(
				__('The PRO version of Allegiant allows you to control the number of columns for the Team Members section.', 'allegiant'),
			),
			'section' => 'cpotheme_layout_team',
			'type' => 'mte_upsell',
			'sanitize' => 'esc_html',
			'default' =>'' );
			$data['home_team'] = array(
			'label' => __('Team Members Description', 'allegiant'),
			'section' => 'cpotheme_layout_team',
			'empty' => true,
			'multilingual' => true,
			'default' => __('Meet our team', 'allegiant'),
			'sanitize' => 'wp_kses_post',
			'type' => 'textarea');
		}
		
		//Testimonials
		if(defined('CPOTHEME_USE_TESTIMONIALS') && CPOTHEME_USE_TESTIMONIALS == true){
			$data['upsell-testimonials'] = array(
			'button_text' => __('Upgrade to Pro', 'allegiant'),
			'button_url' => cpotheme_upgrade_only_link(),
			'options' => array(
				__('Number of columns', 'allegiant'),

			),
			'requirements' => array(
				__('The PRO version of Allegiant allows you to control the number of columns for the Testimonials section.', 'allegiant'),
			),
			'section' => 'cpotheme_layout_testimonials',
			'type' => 'mte_upsell',
			'sanitize' => 'esc_html',
			'default' =>'' );
			$data['home_testimonials'] = array(
			'label' => __('Testimonials Description', 'allegiant'),
			'section' => 'cpotheme_layout_testimonials',
			'empty' => true,
			'multilingual' => true,
			'default' => __('What they say about us', 'allegiant'),
			'sanitize' => 'wp_kses_post',
			'type' => 'textarea');
		}
		
		//Clients
		if(defined('CPOTHEME_USE_CLIENTS') && CPOTHEME_USE_CLIENTS == true){
			$data['upsell-clients'] = array(
			'button_text' => __('Upgrade to Pro', 'allegiant'),
			'button_url' => cpotheme_upgrade_only_link(),
			'options' => array(
				__('Appearance of Clients', 'allegiant'),

			),
			'requirements' => array(
				__('The PRO version of Allegiant allows you to control the appearance for the Clients section.', 'allegiant'),
			),
			'section' => 'cpotheme_layout_clients',
			'type' => 'mte_upsell',
			'sanitize' => 'esc_html',
			'default' =>'' );
			$data['home_clients'] = array(
			'label' => __('Clients Description', 'allegiant'),
			'section' => 'cpotheme_layout_clients',
			'empty' => true,
			'multilingual' => true,
			'default' => __('Featured clients', 'allegiant'),
			'sanitize' => 'wp_kses_post',
			'type' => 'textarea');
		}
		
		//Blog Posts
		$data['upsell-blog-posts'] = array(
		'button_text' => __('Upgrade to Pro', 'allegiant'),
		'button_url' => cpotheme_upgrade_only_link(),
		'options' => array(
				__('Appearance of specific elements ', 'allegiant')
			),
		'requirements' => array(
			__('The PRO version of Allegiant allows you to control the appearance of certain elements in your blog posts such as: dates, authors, or comments.', 'allegiant'),
		),
		'section' => 'cpotheme_layout_posts',
		'type' => 'mte_upsell',
		'sanitize' => 'esc_html',
		'default' =>'' );
		$data['home_posts'] = array(
		'label' => __('Enable Posts On Homepage', 'allegiant'),
		'section' => 'cpotheme_layout_posts',
		'type' => 'checkbox',
		'sanitize' => 'cpotheme_sanitize_bool',
		'default' => false);
		
		//Typography
		$data['type_settings'] = array(
		'label' => __('Typography Options', 'allegiant'),
		'description' => __('Select custom fonts for the headings, navigation, and body text of your site.', 'allegiant'),
		'section' => 'cpotheme_typography',
		'type' => 'label');
		
		//Colors		
		$data['color_settings'] = array(
		'label' => __('Color Options', 'allegiant'),
		'description' => __('Customize the colors of primary and secondary elements, as well as headings, navigation, and text.', 'allegiant'),
		'section' => 'colors',
		'type' => 'label');


		
		return apply_filters('cpotheme_customizer_controls', $data);
	}
}