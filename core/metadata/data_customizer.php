<?php

//Define customizer sections
if ( ! function_exists( 'cpotheme_metadata_panels' ) ) {
	function cpotheme_metadata_panels() {
		$data = array();

		$data['cpotheme_management'] = array(
			'title'       => __( 'General Theme Options', 'allegiant' ),
			'description' => __( 'Options that help you manage your theme better.', 'allegiant' ),
			'priority'    => 15,
		);

		$data['cpotheme_layout'] = array(
			'title'       => __( 'Layout', 'allegiant' ),
			'description' => __( 'Here you can find settings that control the structure and positioning of specific elements within your website.', 'allegiant' ),
			'priority'    => 25,
		);

		return apply_filters( 'cpotheme_customizer_panels', $data );
	}
}


//Define customizer sections
if ( ! function_exists( 'cpotheme_metadata_sections' ) ) {
	function cpotheme_metadata_sections() {
		$data = array();

		$data['epsilon-section-pro'] = array(
			'type'        => 'epsilon-section-pro',
			'title'       => esc_html__( 'LITE vs PRO comparison', 'allegiant' ),
			'button_text' => esc_html__( 'Learn more', 'allegiant' ),
			'button_url'  => esc_url_raw( admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
			'priority'    => 0,
		);

		$data['cpotheme_layout_general'] = array(
			'title'      => __( 'Site Wide Structure', 'allegiant' ),
			'capability' => 'edit_theme_options',
			'panel'      => 'cpotheme_layout',
			'priority'   => 25,
		);

		$data['cpotheme_layout_home'] = array(
			'title'      => __( 'Homepage', 'allegiant' ),
			'capability' => 'edit_theme_options',
			'panel'      => 'cpotheme_layout',
			'priority'   => 50,
		);

		if ( defined( 'CPOTHEME_USE_SLIDES' ) && CPOTHEME_USE_SLIDES == true ) {
			$data['cpotheme_layout_slider'] = array(
				'title'      => __( 'Slider', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_FEATURES' ) && CPOTHEME_USE_FEATURES == true ) {
			$data['cpotheme_layout_features'] = array(
				'title'      => __( 'Features', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_PORTFOLIO' ) && CPOTHEME_USE_PORTFOLIO == true ) {
			$data['cpotheme_layout_portfolio'] = array(
				'title'      => __( 'Portfolio', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_SERVICES' ) && CPOTHEME_USE_SERVICES == true ) {
			$data['cpotheme_layout_services'] = array(
				'title'      => __( 'Services', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_ABOUT' ) && CPOTHEME_USE_ABOUT == true ) {
			$data['cpotheme_layout_about'] = array(
				'title'       => __( 'About', 'allegiant' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_TEAM' ) && CPOTHEME_USE_TEAM == true ) {
			$data['cpotheme_layout_team'] = array(
				'title'      => __( 'Team Members', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_TESTIMONIALS' ) && CPOTHEME_USE_TESTIMONIALS == true ) {
			$data['cpotheme_layout_testimonials'] = array(
				'title'      => __( 'Testimonials', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_CLIENTS' ) && CPOTHEME_USE_CLIENTS == true ) {
			$data['cpotheme_layout_clients'] = array(
				'title'      => __( 'Clients', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_CONTACT' ) && CPOTHEME_USE_CONTACT == true ) {
			$data['cpotheme_layout_contact'] = array(
				'title'      => __( 'Contact', 'allegiant' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'cpotheme_layout',
				'priority'   => 50,
			);
		}

		$data['cpotheme_typography'] = array(
			'title'       => __( 'Typography', 'allegiant' ),
			'description' => __( 'Custom typefaces for the entire site.', 'allegiant' ),
			'capability'  => 'edit_theme_options',
			'priority'    => 45,
		);

		$data['cpotheme_layout_posts'] = array(
			'title'      => __( 'Blog Posts', 'allegiant' ),
			'capability' => 'edit_theme_options',
			'panel'      => 'cpotheme_layout',
			'priority'   => 50,
		);

		$data['cpotheme_typography'] = array(
			'title'      => __( 'Typography', 'allegiant' ),
			'capability' => 'edit_theme_options',
			'priority'   => 45,
		);

		return apply_filters( 'cpotheme_customizer_sections', $data );
	}
}


if ( ! function_exists( 'cpotheme_metadata_customizer' ) ) {
	function cpotheme_metadata_customizer( $std = null ) {
		$data = array();

		$data['general_logo'] = array(
			'label'       => __( 'Custom Logo', 'allegiant' ),
			'description' => __( 'Insert the URL of an image to be used as a custom logo.', 'allegiant' ),
			'section'     => 'title_tagline',
			'sanitize'    => 'esc_url',
			'type'        => 'image',
			'partials'    => '#logo .site-logo',
		);

		$data['general_logo_width'] = array(
			'label'       => __( 'Logo Width (px)', 'allegiant' ),
			'description' => __( 'Forces the logo to have a specified width.', 'allegiant' ),
			'section'     => 'title_tagline',
			'type'        => 'text',
			'placeholder' => '(none)',
			'sanitize'    => 'absint',
			'width'       => '100px',
		);

		$data['general_texttitle'] = array(
			'label'       => __( 'Enable Text Title', 'allegiant' ),
			'description' => __( 'Activate this to display the site title as text.', 'allegiant' ),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
			'sanitize'    => 'cpotheme_sanitize_bool',
			'std'         => false,
		);

		//Layout
		$data['home_upsell']  = array(
			'section'            => 'cpotheme_layout_home',
			'type'               => 'epsilon-upsell',
			'options'            => array(
				esc_html__( 'Improved Tagline', 'allegiant' ),
				esc_html__( 'Reorder Sections', 'allegiant' ),
			),
			'requirements'       => array(
				esc_html__( 'In the PRO version of Allegiant, the tagline transforms in a CTA section with buttons and descriptions.', 'allegiant' ),
				esc_html__( 'You can order Homepage sections anyway you want', 'allegiant' ),
			),
			'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
			'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
			'second_button_url'  => cpotheme_upgrade_link(),
			'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
			'separator'          => '- or -',
		);
		$data['home_tagline'] = array(
			'label'        => __( 'Tagline Title', 'allegiant' ),
			'section'      => 'cpotheme_layout_home',
			'empty'        => true,
			'multilingual' => true,
			'default'      => __( 'Add your custom tagline here.', 'allegiant' ),
			'sanitize'     => 'wp_kses_post',
			'type'         => 'textarea',
			'partials'     => '#tagline .container',
		);

		//Homepage Slider
		if ( defined( 'CPOTHEME_USE_SLIDES' ) && CPOTHEME_USE_SLIDES == true ) {
			$data['slider_settings'] = array(
				'label'       => __( 'Slider Options', 'allegiant' ),
				'description' => __( 'Customize the speed, timeout and effects of the homepage slider.', 'allegiant' ),
				'section'     => 'cpotheme_layout_slider',
				'type'        => 'label',
			);
		}

		//Homepage Features
		if ( defined( 'CPOTHEME_USE_FEATURES' ) && CPOTHEME_USE_FEATURES == true ) {
			$data['features_upsell'] = array(
				'section'            => 'cpotheme_layout_features',
				'type'               => 'epsilon-upsell',
				'options'            => array(
					esc_html__( 'Section Description', 'allegiant' ),
					esc_html__( 'Features Columns', 'allegiant' ),
				),
				'requirements'       => array(
					esc_html__( 'For each section, apart from title one you can also add a description for users to better understand your sections content', 'allegiant' ),
					esc_html__( 'You can select on how many Columns you want to show your features.', 'allegiant' ),
				),
				'button_url'         => cpotheme_upgrade_link(),
				'button_text'        => esc_html__( 'Get the PRO version!', 'allegiant' ),
				'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
				'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
				'second_button_url'  => cpotheme_upgrade_link(),
				'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
				'separator'          => '- or -',
			);
			$data['home_features']   = array(
				'label'        => __( 'Features Description', 'allegiant' ),
				'section'      => 'cpotheme_layout_features',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Our core features', 'allegiant' ),
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#features #features-heading',
			);
		}

		//Portfolio layout
		if ( defined( 'CPOTHEME_USE_PORTFOLIO' ) && CPOTHEME_USE_PORTFOLIO == true ) {
			$data['portfolio_upsell'] = array(
				'section'            => 'cpotheme_layout_portfolio',
				'type'               => 'epsilon-upsell',
				'options'            => array(
					esc_html__( 'Section Description', 'allegiant' ),
					esc_html__( 'Portfolio Columns', 'allegiant' ),
					esc_html__( 'Related Portfolios', 'allegiant' ),
				),
				'requirements'       => array(
					esc_html__( 'For each section, apart from title one you can also add a description for users to better understand your sections content', 'allegiant' ),
					esc_html__( 'You can select on how many Columns you want to show your portfolio.', 'allegiant' ),
					esc_html__( 'You can enable related portfolio.', 'allegiant' ),
				),
				'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
				'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
				'second_button_url'  => cpotheme_upgrade_link(),
				'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
				'separator'          => '- or -',
			);
			$data['home_portfolio']   = array(
				'label'        => __( 'Portfolio Description', 'allegiant' ),
				'section'      => 'cpotheme_layout_portfolio',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Take a look at our work', 'allegiant' ),
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#portfolio #portfolio-heading',
			);
		}

		//Services layout
		if ( defined( 'CPOTHEME_USE_SERVICES' ) && CPOTHEME_USE_SERVICES == true ) {
			$data['services_upsell'] = array(
				'section'            => 'cpotheme_layout_services',
				'type'               => 'epsilon-upsell',
				'options'            => array(
					esc_html__( 'Section Description', 'allegiant' ),
					esc_html__( 'Services Columns', 'allegiant' ),
				),
				'requirements'       => array(
					esc_html__( 'For each section, apart from title one you can also add a description for users to better understand your sections content', 'allegiant' ),
					esc_html__( 'You can select on how many Columns you want to show your services.', 'allegiant' ),
				),
				'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
				'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
				'second_button_url'  => cpotheme_upgrade_link(),
				'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
				'separator'          => '- or -',
			);
			$data['home_services']   = array(
				'label'        => __( 'Services Description', 'allegiant' ),
				'section'      => 'cpotheme_layout_services',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'What we can offer you', 'allegiant' ),
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#services #services-heading',
			);
		}

		//About section
		if ( defined( 'CPOTHEME_USE_ABOUT' ) && CPOTHEME_USE_ABOUT == true ) {

			$data['about_upsell'] = array(
				'section'            => 'cpotheme_layout_about',
				'type'               => 'epsilon-upsell',
				'options'            => array(
					esc_html__( 'Section Description', 'allegiant' ),
				),
				'requirements'       => array(
					esc_html__( 'For each section, apart from title one you can also add a description for users to better understand your sections content', 'allegiant' ),
				),
				'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
				'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
				'second_button_url'  => cpotheme_upgrade_link(),
				'second_button_text' => esc_html__( 'Get PRO!', 'allegiant' ),
				'separator'          => '- or -',
			);

			$data['home_about'] = array(
				'label'        => __( 'Section Title', 'allegiant' ),
				'section'      => 'cpotheme_layout_about',
				'empty'        => true,
				'multilingual' => true,
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#about .section-title',
			);

			$data['about_pages'] = array(
				'label'        => __( 'About Pages', 'allegiant' ),
				'description'  => __( 'Select the pages that will be displayed as columns', 'allegiant' ),
				'section'      => 'cpotheme_layout_about',
				'type'         => 'selectize',
				'choices' => 'pages',
				'input_attrs' => array(
					'maxItems' => 4
				),
				'default'      => array(),
				'partials'     => '#about .about__content',
			);

		}

		//Services layout
		if ( defined( 'CPOTHEME_USE_TEAM' ) && CPOTHEME_USE_TEAM == true ) {
			$data['team_upsell'] = array(
				'section'            => 'cpotheme_layout_team',
				'type'               => 'epsilon-upsell',
				'options'            => array(
					esc_html__( 'Section Description', 'allegiant' ),
					esc_html__( 'Team Columns', 'allegiant' ),
				),
				'requirements'       => array(
					esc_html__( 'For each section, apart from title one you can also add a description for users to better understand your sections content', 'allegiant' ),
					esc_html__( 'You can select on how many Columns you want to show your team members.', 'allegiant' ),
				),
				'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
				'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
				'second_button_url'  => cpotheme_upgrade_link(),
				'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
				'separator'          => '- or -',
			);
			$data['home_team']   = array(
				'label'        => __( 'Team Members Description', 'allegiant' ),
				'section'      => 'cpotheme_layout_team',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Meet our team', 'allegiant' ),
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#team #team-heading',
			);
		}

		//Testimonials
		if ( defined( 'CPOTHEME_USE_TESTIMONIALS' ) && CPOTHEME_USE_TESTIMONIALS == true ) {
			$data['testimonials_upsell'] = array(
				'section'            => 'cpotheme_layout_testimonials',
				'type'               => 'epsilon-upsell',
				'options'            => array(
					esc_html__( 'Section Description', 'allegiant' ),
					esc_html__( 'Testimonials Columns', 'allegiant' ),
				),
				'requirements'       => array(
					esc_html__( 'For each section, apart from title one you can also add a description for users to better understand your sections content', 'allegiant' ),
					esc_html__( 'You can select on how many Columns you want to show your testimonials.', 'allegiant' ),
				),
				'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
				'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
				'second_button_url'  => cpotheme_upgrade_link(),
				'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
				'separator'          => '- or -',
			);
			$data['home_testimonials']   = array(
				'label'        => __( 'Testimonials Description', 'allegiant' ),
				'section'      => 'cpotheme_layout_testimonials',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'What they say about us', 'allegiant' ),
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#testimonials #testimonials-heading',
			);
		}

		//Clients
		if ( defined( 'CPOTHEME_USE_CLIENTS' ) && CPOTHEME_USE_CLIENTS == true ) {
			$data['clients_upsell'] = array(
				'section'            => 'cpotheme_layout_clients',
				'type'               => 'epsilon-upsell',
				'options'            => array(
					esc_html__( 'Section Description', 'allegiant' ),
					esc_html__( 'Clients Columns', 'allegiant' ),
				),
				'requirements'       => array(
					esc_html__( 'For each section, apart from title one you can also add a description for users to better understand your sections content', 'allegiant' ),
					esc_html__( 'You can select on how many Columns you want to show your clients.', 'allegiant' ),
				),
				'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
				'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
				'second_button_url'  => cpotheme_upgrade_link(),
				'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
				'separator'          => '- or -',
			);
			$data['home_clients']   = array(
				'label'        => __( 'Clients Description', 'allegiant' ),
				'section'      => 'cpotheme_layout_clients',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Featured clients', 'allegiant' ),
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#clients #clients-heading',
			);
		}

		//Contact
		if ( defined( 'CPOTHEME_USE_CONTACT' ) && CPOTHEME_USE_CONTACT == true ) {
			$data['home_contact_show'] = array(
				'label'    => __( 'Show Contact Section', 'allegiant' ),
				'section'  => 'cpotheme_layout_contact',
				'type'     => 'checkbox',
				'sanitize' => 'cpotheme_sanitize_bool',
				'default'  => false,
			);

			$data['home_contact']   = array(
				'label'        => __( 'Contact Description', 'allegiant' ),
				'section'      => 'cpotheme_layout_contact',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Contact us', 'allegiant' ),
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#contact #contact-heading',
			);

			$data['home_contact_custom_control']   = array(
				'section'  => 'cpotheme_layout_contact',
				'type'     => 'custom_contact_control',
			);
		}

		//Blog Posts
		$data['home_posts'] = array(
			'label'    => __( 'Enable Posts On Homepage', 'allegiant' ),
			'section'  => 'cpotheme_layout_posts',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => false,
		);

		//Typography
		$data['type_settings'] = array(
			'label'       => __( 'Typography Options', 'allegiant' ),
			'description' => __( 'Select custom fonts for the headings, navigation, and body text of your site.', 'allegiant' ),
			'section'     => 'cpotheme_typography',
			'type'        => 'label',
		);

		//Colors
		$data['colors_upsell']  = array(
			'section'            => 'colors',
			'type'               => 'epsilon-upsell',
			'priority'           => 0,
			'options'            => array(
				esc_html__( 'Custom Colors', 'allegiant' ),
			),
			'requirements'       => array(
				esc_html__( 'You can change your site\'s colors directly from Customizer. Changes happen in real time.', 'allegiant' ),
			),
			'button_url'         => esc_url_raw( get_admin_url() . 'themes.php?page=allegiant-welcome&tab=features' ),
			'button_text'        => esc_html__( 'See PRO vs Lite', 'allegiant' ),
			'second_button_url'  => cpotheme_upgrade_link(),
			'second_button_text' => esc_html__( 'Get the PRO version!', 'allegiant' ),
			'separator'          => '- or -',
		);
		$data['color_settings'] = array(
			'label'       => __( 'Color Options', 'allegiant' ),
			'description' => __( 'Customize the colors of primary and secondary elements, as well as headings, navigation, and text.', 'allegiant' ),
			'section'     => 'colors',
			'type'        => 'label',
		);

		return apply_filters( 'cpotheme_customizer_controls', $data );
	}
}
