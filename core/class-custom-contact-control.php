<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

function cpo_theme_customizer($wp_customize) {

	class Custom_Contact_Control extends WP_Customize_Control {

		public function is_cf7_active(){
			if ( class_exists( 'WPCF7' ) ) {
				return true;
			}
			return false;
		}

		public function is_wpforms_active(){
			if ( class_exists( 'WPForms' ) ) {
				return true;
			}
			return false;
		}

		public function get_cf7_forms() {
			$contact_forms = array();

			$args = array(
				'post_type'      => 'wpcf7_contact_form',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			);
			$cf7forms = new WP_Query( $args );
			if ( $cf7forms->have_posts() ) {
				foreach ( $cf7forms->posts as $cf7form ) {
					$contact_forms[ $cf7form->ID ] = $cf7form->post_title;
				}
			} 
			
			return $contact_forms;
		}

		public function get_wpforms() {
			$contact_forms = array();

			$args = array(
				'post_type'      => 'wpforms',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			);
			$cf7forms = new WP_Query( $args );
			if ( $cf7forms->have_posts() ) {
				foreach ( $cf7forms->posts as $cf7form ) {
					$contact_forms[ $cf7form->ID ] = $cf7form->post_title;
				}
			}
			
			return $contact_forms;
		}

		public function render_content() {
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		
			<?php
			if( $this->is_cf7_active() && $this->is_wpforms_active() ) {
				echo '<label>Which plugin would you like to use?</label>';
				echo '<select id="cpotheme-customizer-plugin-select">';
					echo '<option>contact form 7</option>';
					echo '<option>wpforms</option>';
				echo '</select>';
			}
			else{
				echo '<p>no contact form plugins installed</p>';
			}
			
			if( $this->is_cf7_active() ) {
				$forms = $this->get_cf7_forms();
			
				echo '<div class="contact-forms">';
				if ( ! empty( $forms ) ) {
					echo '<label>Select form</label>';
					echo '<select>';
					foreach ( $forms as $form_id => $form_title ) {
						echo '<option value="' . sanitize_key( $form_id ) . '">' . esc_html( $form_title ) . '</option>';
					} 	
					echo '</select>';
				}
				else{
					echo '<p>no forms created, please <a href="' . admin_url( 'admin.php?page=wpcf7-new' ) . '">add new form</a></p>';
				}
				echo '</div>';
			
			}

			if( $this->is_wpforms_active() ){
				$forms = $this->get_wpforms();
			
				echo '<div class="contact-forms">';
				if ( ! empty( $forms ) ) {
					echo '<label>Select form</label>';
					echo '<select>';
					foreach ( $forms as $form_id => $form_title ) {
						echo '<option option value="' . sanitize_key( $form_id ) . '">' . esc_html( $form_title ) . '</option>';
					} 	
					echo '</select>';
				}
				else{
					echo '<p>no forms created, please <a href="' . admin_url( 'admin.php?page=wpforms-builder' ) . '">add new form</a></p>';
				}
				echo '</div>';
			}

			?>
			<script>
			//adding this inline script just for demonstration purposes
			( function( $ ) {
				$select = jQuery( "#cpotheme-customizer-plugin-select" );
				$select.siblings('.contact-forms').eq(1).hide();
				$select.change( function() {
					var selectedIndex = $select.prop('selectedIndex');
					$select.siblings('.contact-forms').hide().eq(selectedIndex).show();
				});  
			} )( jQuery );	
			</script>
			<?php			
		}
	}
}
add_action( 'customize_register', 'cpo_theme_customizer') ;