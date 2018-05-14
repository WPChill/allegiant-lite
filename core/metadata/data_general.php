<?php

if ( ! function_exists( 'cpotheme_metadata_fonts_weight' ) ) {
	function cpotheme_metadata_fonts_weight( $name ) {
		$font_weight = explode( ':', $name );
		if ( sizeof( $font_weight ) > 1 ) {
			return $font_weight[1];
		} else {
			return '400';
		}
	}
}


function cpotheme_metadata_sidebarposition() {
	$core_path = get_template_directory_uri() . '/core/';
	if ( defined( 'CPOTHEME_CORELITE_URL' ) ) {
		$core_path = CPOTHEME_CORELITE_URL;
	}
	$cpotheme_data = array(
		'right' => $core_path . '/images/admin/sidebar_position_right.gif',
		'none'  => $core_path . '/images/admin/sidebar_position_none.gif',
	);

	return $cpotheme_data;
}

if ( ! function_exists( 'cpotheme_metadata_layoutstyle' ) ) {
	function cpotheme_metadata_layoutstyle() {
		$data = array(
			'fixed' => __( 'Full Width', 'allegiant' ),
			'boxed' => __( 'Boxed', 'allegiant' ),
		);
		return $data;
	}
}

function cpotheme_metadata_featured_page() {
	$data = array(
		'none'     => __( 'None', 'allegiant' ),
		'slider'   => __( 'In The Slider', 'allegiant' ),
		'features' => __( 'In The Featured Boxes', 'allegiant' ),
	);
	return apply_filters( 'cpotheme_metadata_featured_page', $data );
}
