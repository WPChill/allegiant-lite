<?php
/**
 * Actions required
 */
wp_enqueue_style( 'plugin-install' );
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'updates' );
?>

<div class="feature-section action-required demo-import-boxed" id="plugin-filter">

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
					$active = $this->check_active( $allegiant_required_action_value['plugin_slug'] );
					$url    = $this->create_action_link( $active['needs'], $allegiant_required_action_value['plugin_slug'] );
					$label  = '';
					switch ( $active['needs'] ) {
						case 'install':
							$class = 'install-now button';
							$label = __( 'Install', 'allegiant' );
							break;
						case 'activate':
							$class = 'activate-now button button-primary';
							$label = __( 'Activate', 'allegiant' );
							break;
						case 'deactivate':
							$class = 'deactivate-now button';
							$label = __( 'Deactivate', 'allegiant' );
							break;
					}
					?>
					<p class="plugin-card-<?php echo esc_attr( $allegiant_required_action_value['plugin_slug'] ) ?> action_button <?php echo ( $active['needs'] !== 'install' && $active['status'] ) ? 'active' : '' ?>">
						<a data-slug="<?php echo esc_attr( $allegiant_required_action_value['plugin_slug'] ) ?>"
						   class="<?php echo $class; ?>"
						   href="<?php echo esc_url( $url ) ?>"> <?php echo $label ?> </a>
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