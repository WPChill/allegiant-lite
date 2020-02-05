<?php

//Print HTML for an icon
//TODO: Icon value should be in the format 'fontawesome-\f001'
if ( ! function_exists( 'cpotheme_icon' ) ) {
	function cpotheme_icon( $value, $wrapper = '', $echo = true ) {
		if ( '0' === $value || 0 === $value || '' === $value ) {
			return;
		}

		$icon_pack = cpotheme_metadata_icons();

		if ( false === strpos( $value, '-' ) ) {

			if( isset( $icon_pack['fontawesomefree']['icons'][html_entity_decode($value)] ) ){

				$font_library = 'fontawesomefree';
				$font_value   = $value;
	
			}else if( isset($icon_pack['fontawesomebrands']['icons'][html_entity_decode($value)]) ){
	
				$font_library = 'fontawesomebrands';
				$font_value   = $value;
			}else {
	
				$font_library = 'fontawesome';
				$font_value   = $value;
			}
	
		} else {
			$icon_data    = explode( '-', $value);
			$icon_data[1] = html_entity_decode( $icon_data[1]);
			$font_library = $icon_data[0];
			$font_value   = $icon_data[1];

		if( $icon_data[0] == 'fontawesome' ){

			if( isset( $icon_pack['fontawesomebrands']['icons'][$icon_data[1]] ) ){
				$font_library = 'fontawesomebrands';

			}else if ( isset( $icon_pack['fontawesomefree']['icons'][$icon_data[1]] ) ){
				
				$font_library = 'fontawesomefree';
			}else {

				$font_library = 'fontawesome';
			}
		}


	}

		$output = '';
		if ( '' != $wrapper ) {
			$output .= '<div class="' . $wrapper . '">';
		}
		$output .= cpotheme_get_icon( $font_library, html_entity_decode( $font_value ) );
		if ( '' != $wrapper ) {
			$output .= '</div>';
		}

		if ( false == $echo ) {
			return $output;
		} else {
			echo $output;
		}
	}
}

//Retrieve the correct library
function cpotheme_get_icon( $library, $value ) {
	$result = '';

	switch ( $library ) {
		case 'fontawesome':
			$result = cpotheme_icon_library_fontawesome_exceptions( $value );
			break;
		case 'fontawesomebrands' :
			$result = cpotheme_icon_library_fontawesome_brands( $value );
			break;
		case 'fontawesomefree' : 
			$result = cpotheme_icon_library_fontawesome( $value );
			break;
		default:
			$result = cpotheme_icon_library_fontawesome( $value );
			break;
	}
	return $result;
}



//Icon library for fontawesome
function cpotheme_icon_library_fontawesome_exceptions( $value ) {
	wp_enqueue_style( 'cpotheme-fontawesome' );
	return '<span style="font-family:\'fontawesome\'">' . $value . '</span>';
}

function cpotheme_icon_library_fontawesome_brands( $value ) {
	wp_enqueue_style( 'cpotheme-fontawesome-new' );
	return '<span style="font-family:\'Font Awesome 5 Brands\' ; font-weight: 900">' . $value . '</span>';
}

function cpotheme_icon_library_fontawesome( $value ) {
	wp_enqueue_style( 'cpotheme-fontawesome-new' );
	return '<span style="font-family:\'Font Awesome 5 Free\'; font-weight: 900">' . $value . '</span>';
}
