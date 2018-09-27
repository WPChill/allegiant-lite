<div id="contact" class="contact">
	<div class="container">		
		<?php cpotheme_block( 'home_contact', 'contact-heading section-heading' ); ?>

		<div class="row">
			<div class="column col4"><p></p></div>
			<div class="column col4x2">
				<?php
				$contact_form_plugin = get_theme_mod( 'cpotheme_plugin_select' ); 
				$form_id = get_theme_mod( 'cpotheme_form_id' );

				if ( $contact_form_plugin === 'wpforms' ) {
					$shortcode_tag = 'wpforms';
				} elseif ( $contact_form_plugin === 'cf7' ) {
					$shortcode_tag = 'contact-form-7';
				} else {
					$shortcode_tag = '';
				}

				if ( $shortcode_tag !== '' && $form_id !== '' ) {
					echo do_shortcode( '[' . $shortcode_tag . ' id="' . $form_id . '"]' );
				}
				
				?>
			</div>
			<div class="clear">
		</div>
	</div>
</div>