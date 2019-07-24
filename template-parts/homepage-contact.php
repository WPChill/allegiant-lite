<div id="contact" class="contact">
	<div class="container">
		<?php cpotheme_block( 'home_contact', 'contact-heading section-heading' ); ?>

		<div class="row">
			<div class="column col4"><p></p></div>
			<div class="column col4x2">
				<?php
			 	$contact_form_plugin = cpotheme_get_option('plugin_select');
				$form_id = cpotheme_get_option( 'form_id' );

				if ( $contact_form_plugin === 'wpforms' ) {
					$shortcode_tag = 'wpforms';
				} elseif ( $contact_form_plugin === 'cf7' ) {
					$shortcode_tag = 'contact-form-7';
				} elseif ( $contact_form_plugin === 'kali-forms' ) {
					$shortcode_tag = 'kaliform';
				}

				if ( $shortcode_tag !== '' && $form_id !== '' && $form_id !== 'default' ) {
					echo do_shortcode( '[' . esc_html( $shortcode_tag ) . ' id="' . absint( $form_id ) . '"]' );
				}

				?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
