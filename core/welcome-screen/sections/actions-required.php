<?php
/**
 * Actions required
 */
?>

<div class="feature-section action-required">

	<?php
	global $allegiant_required_actions;

	if ( ! empty( $allegiant_required_actions ) ):

		/* allegiant_show_required_actions is an array of true/false for each required action that was dismissed */
		$allegiant_show_required_actions = get_option( "allegiant_show_required_actions" );

		foreach ( $allegiant_required_actions as $allegiant_required_action_key => $allegiant_required_action_value ):
			if ( @$allegiant_show_required_actions[ $allegiant_required_action_value['id'] ] === false ) {
				continue;
			}
			if ( @$allegiant_required_action_value['check'] ) {
				continue;
			}
			?>
			<div class="allegiant-action-required-box">
				<span class="dashicons dashicons-no-alt allegiant-dismiss-required-action"
				      id="<?php echo $allegiant_required_action_value['id']; ?>"></span>
				<h3><?php if ( ! empty( $allegiant_required_action_value['title'] ) ): echo $allegiant_required_action_value['title']; endif; ?></h3>
				<p>
					<?php if ( ! empty( $allegiant_required_action_value['description'] ) ): echo $allegiant_required_action_value['description']; endif; ?>
					<?php if ( ! empty( $allegiant_required_action_value['help'] ) ): echo '<br/>' . $allegiant_required_action_value['help']; endif; ?>
				</p>
				<?php
				if ( ! empty( $allegiant_required_action_value['plugin_slug'] ) ) {
					$installed = false;
					$url       = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $allegiant_required_action_value['plugin_slug'] ), 'install-plugin_' . $allegiant_required_action_value['plugin_slug'] );


					if ( file_exists( ABSPATH . 'wp-content/plugins/' . $allegiant_required_action_value['plugin_slug'] . '/' . $allegiant_required_action_value['plugin_slug'] . '.php' ) ) {
						$installed = true;
						$url       = wp_nonce_url( self_admin_url( 'themes.php?page=cpotheme-welcome&tab=recommended_actions&action=activate_plugin&plugin=' . $allegiant_required_action_value['plugin_slug'] . '/' . $allegiant_required_action_value['plugin_slug'] . '.php' ), 'activate_plugin_' . $allegiant_required_action_value['plugin_slug'] );
					}
					?>
					<p>
						<a href="<?php echo esc_url( $url ); ?>"
						   class="button button-primary"><?php if ( ! empty( $allegiant_required_action_value['title'] ) ): echo $allegiant_required_action_value['title']; endif; ?></a>
					</p>
					<?php
				};
				?>
			</div>
			<?php
		endforeach;
	endif;

	$nr_actions_required = 0;

	/* get number of required actions */
	if ( get_option( 'allegiant_show_required_actions' ) ):
		$allegiant_show_required_actions = get_option( 'allegiant_show_required_actions' );
	else:
		$allegiant_show_required_actions = array();
	endif;

	if ( ! empty( $allegiant_required_actions ) ):
		foreach ( $allegiant_required_actions as $allegiant_required_action_value ):
			if ( ( ! isset( $allegiant_required_action_value['check'] ) || ( isset( $allegiant_required_action_value['check'] ) && ( $allegiant_required_action_value['check'] == false ) ) ) && ( ( isset( $allegiant_show_required_actions[ $allegiant_required_action_value['id'] ] ) && ( $allegiant_show_required_actions[ $allegiant_required_action_value['id'] ] == true ) ) || ! isset( $allegiant_show_required_actions[ $allegiant_required_action_value['id'] ] ) ) ) :
				$nr_actions_required ++;
			endif;
		endforeach;
	endif;

	if ( $nr_actions_required == 0 ):
		echo '<span class="hooray">' . __( 'Hooray! There are no required actions for you right now.', 'allegiant' ) . '</span>';
	endif;
	?>

</div>
