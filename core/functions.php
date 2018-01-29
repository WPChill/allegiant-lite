<?php //Contains assorted functions and utilities for themes.

//Calculate sidebar class to load
function cpotheme_get_sidebar_position() {
	$current_id = cpotheme_current_id();
	if ( is_home() ) {
		$sidebar_layout = 'right';
	} elseif ( is_tax() || is_category() || is_tag() ) {
		$sidebar_layout = cpotheme_tax_meta( $current_id, 'layout_sidebar' );
	} else {
		$sidebar_layout = get_post_meta( $current_id, 'layout_sidebar', true );
	}
	if ( '' == $sidebar_layout ) {
		$sidebar_layout = 'right';
	}
	return $sidebar_layout;
}


//Abstracted function for retrieving specific options inside option arrays
if ( ! function_exists( 'cpotheme_get_option' ) ) {
	function cpotheme_get_option( $option_name = '', $option_array = 'cpotheme_settings' ) {

		$option_value = '';

		//Check against option array and see if it is multilingual
		$options = cpotheme_metadata_customizer();
		if ( isset( $options[ $option_name ]['multilingual'] ) && true == $options[ $option_name ]['multilingual'] ) {
			//Determines whether to grab current language, or original language's option
			$option_array = $option_array . cpotheme_wpml_current_language();
		}

		//If options exists and is not empty, get value
		$option_list = get_option( $option_array, false );
		if ( $option_list && isset( $option_list[ $option_name ] ) && ( true === is_bool( $option_list[ $option_name ] ) || '' !== $option_list[ $option_name ] ) ) {
			$option_value = $option_list[ $option_name ];
		}

		//If option is empty, check whether it needs a default value
		if ( '' === $option_value || ! isset( $option_list[ $option_name ] ) ) {
			$options = cpotheme_metadata_customizer();
			//If option cannot be empty, use default value
			if ( ! isset( $options[ $option_name ]['empty'] ) ) {
				if ( isset( $options[ $option_name ]['default'] ) ) {
					$option_value = $options[ $option_name ]['default'];
				}
				//If it can be empty but not set, use default value
			} elseif ( ! isset( $option_list[ $option_name ] ) ) {
				if ( isset( $options[ $option_name ]['default'] ) ) {
					$option_value = $options[ $option_name ]['default'];
				}
			}
		}
		return $option_value;
	}
}

//Abstracted function for updating specific options inside arrays
if ( ! function_exists( 'cpotheme_update_option' ) ) {
	function cpotheme_update_option( $option_name, $option_value, $option_array = 'cpotheme_settings' ) {

		//Check against option array and see if it is multilingual
		$options = cpotheme_metadata_customizer();
		if ( isset( $options[ $option_name ]['multilingual'] ) && true == $options[ $option_name ]['multilingual'] ) {
			//Determines whether to grab current language, or original language's option
			$option_array = $option_array . cpotheme_wpml_current_language();
		}

		$option_list = get_option( $option_array, false );
		if ( ! $option_list ) {
			$option_list = array();
		}
		$option_list[ $option_name ] = $option_value;
		if ( update_option( $option_array, $option_list ) ) {
			return true;
		} else {
			return false;
		}
	}
}

//Returns the current language's code in the event that WPML is active
if ( ! function_exists( 'cpotheme_wpml_current_language' ) ) {
	function cpotheme_wpml_current_language() {
		$language_code = '';
		if ( cpotheme_wpml_active() ) {
			$default_language = cpotheme_wpml_default_language();
			$active_language  = ICL_LANGUAGE_CODE;
			if ( $active_language != $default_language ) {
				$language_code = '_' . $active_language;
			}
		} elseif ( function_exists( 'pll_current_language' ) && function_exists( 'pll_default_language' ) ) {
			$default_language = pll_default_language();
			$active_language  = pll_current_language();
			if ( $active_language != $default_language ) {
				$language_code = '_' . $active_language;
			}
		}
		return $language_code;
	}
}

//Check if WPML is active
if ( ! function_exists( 'cpotheme_wpml_active' ) ) {
	function cpotheme_wpml_active() {
		if ( defined( 'ICL_LANGUAGE_CODE' ) && defined( 'ICL_SITEPRESS_VERSION' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

//Retrieve languages from WPML
if ( ! function_exists( 'cpotheme_wpml_languages' ) ) {
	function cpotheme_wpml_languages() {
		if ( cpotheme_wpml_active() ) {
			global $sitepress;
			return $sitepress->get_active_languages();
		}
	}
}

//Retrieve default WPML language
if ( ! function_exists( 'cpotheme_wpml_default_language' ) ) {
	function cpotheme_wpml_default_language() {
		if ( cpotheme_wpml_active() ) {
			global $sitepress;
			return $sitepress->get_default_language();
		}
	}
}


//Searches for a link inside a string. Used for post formats
if ( ! function_exists( 'cpotheme_find_link' ) ) {
	function cpotheme_find_link( $content, $fallback ) {

		$link_url     = '';
		$link_pattern = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';
		$post_content = $content;
		if ( preg_match( $link_pattern, $post_content, $link_url ) ) {
			return $link_url[0];
		} else {
			return $fallback;
		}
	}
}


//Retrieve page number for the current post or page
if ( ! function_exists( 'cpotheme_current_page' ) ) {
	function cpotheme_current_page() {
		$current_page = 1;
		if ( is_front_page() ) {
			if ( get_query_var( 'page' ) ) {
				$current_page = get_query_var( 'page' );
			} else {
				$current_page = 1;
			}
		} else {
			if ( get_query_var( 'paged' ) ) {
				$current_page = get_query_var( 'paged' );
			} else {
				$current_page = 1;
			}
		}
		return $current_page;
	}
}


//Retrieve current post or taxonomy id
if ( ! function_exists( 'cpotheme_current_id' ) ) {
	function cpotheme_current_id() {
		$current_id = false;
		if ( is_tax() || is_category() || is_tag() ) {
			$current_id = get_queried_object()->term_id;
		} else {
			global $post;
			if ( isset( $post->ID ) ) {
				$current_id = $post->ID;
			} else {
				$current_id = false;
			}
		}
		return $current_id;
	}
}


//Return true if posts should be displayed on homepage
function cpotheme_show_posts() {
	$display = false;
	if ( ! is_front_page() || cpotheme_get_option( 'home_posts' ) === true ) {
		$display = true;
	}
	return $display;
}


//Return true if page title should be displayed
function cpotheme_show_title() {
	$display = false;
	if ( ! is_front_page() && ! is_home() ) {
		$display = true;
	}
	return $display;
}


//Flush rewrite rules on theme activation
add_action( 'after_switch_theme', 'cpotheme_rewrite_flush' );
function cpotheme_rewrite_flush() {
	flush_rewrite_rules();
}


//Sanitize boolean values
function cpotheme_sanitize_bool( $data ) {
	if ( true === $data ) {
		return true;
	}
	return false;
}


//Return the URL to the premium theme page
function cpotheme_upgrade_link( $name = 'Customizer' ) {
	$url  = esc_url_raw( CPOTHEME_PREMIUM_URL . '?utm_source=allegiant&utm_medium=customizer&utm_campaign=upsell' );
	$link = '<a target="_blank" href="' . $url . '">' . esc_attr( CPOTHEME_PREMIUM_NAME ) . '</a>';
	return $url;
}
