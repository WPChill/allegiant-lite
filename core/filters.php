<?php

// Adds home link to navigation menus
if ( ! function_exists( 'cpotheme_nav_menu_args' ) ) {
	add_filter( 'wp_page_menu_args', 'cpotheme_nav_menu_args' );
	function cpotheme_nav_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
}

//Turn off inline styles for gallery shortcode
add_filter( 'use_default_gallery_style', '__return_false' );


//Turn off styles in Recent Comments widget
if ( ! function_exists( 'cpotheme_remove_recent_comments_style' ) ) {
	add_action( 'widgets_init', 'cpotheme_remove_recent_comments_style' );
	function cpotheme_remove_recent_comments_style() {
		add_filter( 'show_recent_comments_widget_style', '__return_false' );
	}
}


if ( ! function_exists( 'cpotheme_gallery_lightbox' ) ) {
	add_filter( 'wp_get_attachment_link', 'cpotheme_gallery_lightbox', 10, 4 );
	function cpotheme_gallery_lightbox( $link, $id, $size, $permalink ) {
		global $post;
		wp_enqueue_style( 'cpotheme-magnific' );
		wp_enqueue_script( 'cpotheme-magnific' );
		if ( ! $permalink ) {
			$link = str_replace( '<a ', '<a data-gallery="gallery" ', $link );
		}
		return $link;
	}
}


//Displays an ellipsis on automatic excerpts
add_filter( 'excerpt_more', 'cpotheme_excerpt_more' );
if ( ! function_exists( 'cpotheme_excerpt_more' ) ) {
	function cpotheme_excerpt_more( $more ) {
		$output = '&hellip;';
		return $output;
	}
}


// Limits excerpt length to a certain size
add_filter( 'excerpt_length', 'cpotheme_excerpt_length' );
if ( ! function_exists( 'cpotheme_excerpt_length' ) ) {
	function cpotheme_excerpt_length( $length ) {
		return 80;
	}
}

add_filter( 'post_class', 'cpotheme_has_post_thumbnail' );
if ( ! function_exists( 'cpotheme_has_post_thumbnail' ) ) {
	function cpotheme_has_post_thumbnail( $classes ) {
		global $post;
		if ( has_post_thumbnail( $post->ID ) ) {
			$classes[] = 'post-has-thumbnail';
		}
		return $classes;
	}
}

//Add portfolio thumbnail size to WordPress admin
add_filter( 'image_size_names_choose', 'cpotheme_add_thumbnail' );
if ( ! function_exists( 'cpotheme_add_thumbnail' ) ) {
	function cpotheme_add_thumbnail( $sizes ) {
		return array_merge( $sizes, array( 'portfolio' => __( 'Portfolio Size', 'allegiant' ) ) );
	}
}


//Add a wrapper to embeds so they become responsive
add_filter( 'embed_oembed_html', 'cpotheme_embed_wrapper', 10, 3 );
function cpotheme_embed_wrapper( $html ) {
	if ( strstr( $html, 'youtube.com' ) != false || strstr( $html, 'vimeo.com' ) != false || strstr( $html, 'wordpress.tv' ) != false ) {
		return '<div class="video">' . $html . '</div>';
	} else {
		return $html;
	}
}

