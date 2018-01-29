<?php

//Standard text field
if ( ! function_exists( 'cpotheme_form_text' ) ) {
	function cpotheme_form_text( $name, $value, $args = null ) {
		$name = esc_attr( $name );
		if ( isset( $args['width'] ) ) {
			$field_width = ' style="width:' . esc_attr( $args['width'] ) . ';"';
		} else {
			$field_width = '';
		}
		if ( isset( $args['placeholder'] ) ) {
			$field_placeholder = ' placeholder="' . esc_attr( $args['placeholder'] ) . '"';
		} else {
			$field_placeholder = '';
		}

		$output = '<input type="text" value="' . esc_attr( $value ) . '" name="' . $name . '" id="' . $name . '"' . $field_width . $field_placeholder . '/>';

		return $output;
	}
}

//Yes/No radio selection field
if ( ! function_exists( 'cpotheme_form_yesno' ) ) {
	function cpotheme_form_yesno( $name, $value, $args = null ) {
		$name = esc_attr( $name );

		$checked_yes = '';
		$checked_no  = ' checked';
		if ( '1' == $value ) {
			$checked_yes = ' checked';
			$checked_no  = '';
		}

		$output  = '';
		$output .= '<label for="' . $name . '_yes">';
		$output .= '<input type="radio" name="' . $name . '" id="' . $name . '_yes" value="1" ' . $checked_yes . '/>';
		$output .= __( 'Yes', 'allegiant' ) . '</label>';
		$output .= '&nbsp;&nbsp;&nbsp;&nbsp;';

		$output .= '<label for="' . $name . '_no">';
		$output .= '<input type="radio" name="' . $name . '" id="' . $name . '_no" value="0" ' . $checked_no . '/>';
		$output .= __( 'No', 'allegiant' ) . '</label>';

		return $output;
	}
}


//Dropdown list field
if ( ! function_exists( 'cpotheme_form_select' ) ) {
	function cpotheme_form_select( $name, $value, $list, $args = null ) {

		$name = esc_attr( $name );

		if ( isset( $args['width'] ) ) {
			$field_width = ' style="width:' . esc_attr( $args['width'] ) . ';"';
		} else {
			$field_width = '';
		}

		$field_class = isset( $args['class'] ) ? esc_attr( $args['class'] ) : '';

		$output = '<select class="cpometabox_field_select ' . $field_class . '" name="' . $name . '" id="' . $name . '"' . $field_width . '>';
		if ( sizeof( $list ) > 0 ) {
			foreach ( $list as $list_key => $list_value ) {
				if ( is_array( $list_value ) ) {
					$disabled = '';
					if ( isset( $list_value['type'] ) && 'separator' == $list_value['type'] ) {
						$disabled = ' disabled';
					}
					$output .= '<option value="' . esc_attr( $list_key ) . '"' . $disabled . '>' . esc_attr( $list_value['name'] ) . '</option>';
				} else {
					$output .= '<option value="' . esc_attr( $list_key ) . '">' . esc_attr( $list_value ) . '</option>';
				}
			}
		}
		$output .= '</select>';
		return $output;
	}
}


//Image list selection
if ( ! function_exists( 'cpotheme_form_imagelist' ) ) {
	function cpotheme_form_imagelist( $name, $value, $list, $args = null ) {

		$name   = esc_attr( $name );
		$output = '<div id="' . $name . '_wrap">';

		foreach ( $list as $list_key => $list_value ) {

			$list_key = esc_attr( $list_key );

			$checked  = '';
			$selected = '';
			if ( $list_key == $value ) {
				$checked  = ' checked="checked"';
				$selected = ' class="cpotheme-imagelist-selected"';
			}
			$output .= '<label class="cpotheme-imagelist-item" for="' . $name . '_' . $list_key . '"><img ' . $selected . ' src="' . esc_url( $list_value ) . '" alt="' . $list_key . '"/><br/>';
			$output .= '<input type="radio" name="' . $name . '" id="' . $name . '_' . $list_key . '" value="' . $list_key . '" ' . $checked . '/>';
			$output .= '</label>';
		}

		$output .= '</div>';
		return $output;
	}
}


//Icon list selection
if ( ! function_exists( 'cpotheme_form_iconlist' ) ) {
	function cpotheme_form_iconlist( $name, $value, $args = null ) {
		$name = esc_attr( $name );

		$output = '<div id="' . $name . '_wrap" class="cpotheme-iconlist">';

		$list = cpotheme_metadata_icons();
		foreach ( $list as $library_key => $library_value ) {
			$output .= '<div class="cpotheme-iconlist-heading">' . $library_value['name'] . '</div>';
			foreach ( $library_value['icons'] as $list_key => $list_value ) {
				$checked       = null;
				$selected      = '';
				$current_value = esc_attr( $library_key . '-' . $list_key );
				if ( $current_value === $value && '' != $value ) {
					$checked  = ' checked="checked"';
					$selected = ' cpotheme-iconlist-selected';
				}
				$output .= '<label class="cpotheme-iconlist-item' . $selected . '" style="font-family:\'' . esc_attr( $library_key ) . '\';" for="' . $name . '_' . htmlentities( stripslashes( $list_key ) ) . '">';
				if ( '0' == $list_key ) {
					$output .= ' ';
				} else {
					$output .= $list_key;
				}
				$output .= '<input type="radio" name="' . $name . '" id="' . $name . '_' . esc_attr( $list_key ) . '" value="' . $current_value . '" ' . $checked . '/>';
				$output .= '</label>';
			}
		}
		$output .= '</div>';
		return $output;
	}
}
