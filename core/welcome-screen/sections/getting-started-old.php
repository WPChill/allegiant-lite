<?php
/**
 * Getting started template
 */

wp_enqueue_style( 'plugin-install' );
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'updates' );

$customizer_url = admin_url() . 'customize.php';
$count = $this->count_actions();

$content_types_url = add_query_arg(array('tab' => 'plugin-information', 'plugin' => 'cpo-content-types', 'TB_iframe' => 'true', 'width' => '640', 'height' => '500'), admin_url('plugin-install.php'));
$content_types = '<strong><a class="thickbox" href="'.$content_types_url.'">CPO Content Types</a></strong>';

?>


<div class="feature-section three-col" id="plugin-filter">
	<div class="col">
		<h3><?php _e('Install CPO Content Types', 'allegiant'); ?></h3>
		<p>
			<?php _e('It is highly recommended that you install the CPO Content Types plugin. It will help you manage all the special content types that this theme supports.', 'allegiant'); ?>
		</p>

		<?php 

			$plugin_url = add_query_arg(array('tab' => 'plugin-information', 'plugin' => 'cpo-content-types', 'TB_iframe' => 'true', 'width' => '640', 'height' => '500'), admin_url('plugin-install.php'));
			$active = $this->check_active( 'cpo-content-types' );
			$url    = $this->create_action_link( $active['needs'], 'cpo-content-types' );

			switch ( $active['needs'] ) {
				case 'install':
					$class = 'install-now button';
					$label = __( 'Install CPO Content Types', 'allegiant' );
					break;
				case 'activate':
					$class = 'activate-now button button-primary';
					$label = __( 'Activate CPO Content Types', 'allegiant' );
					break;
				case 'deactivate':
					$class = 'deactivate-now button';
					$label = __( 'Deactivate CPO Content Types', 'allegiant' );
					break;
			}

		if ( $active['needs'] != 'deactivate' ) { ?>
			<p class="plugin-card-cpo-content-types action_button"><a data-slug="cpo-content-types" class="<?php echo $class; ?>" href="<?php echo esc_url( $url ) ?>"> <?php echo $label; ?> </a><p>
		<?php } ?>
		<br />
		<hr />

		<h3><?php esc_html_e( 'Implement recommended actions', 'allegiant' ); ?></h3>
		<p><?php esc_html_e( 'We\'ve compiled a list of steps for you, to take make sure the experience you\'ll have using one of our products is very easy to follow.', 'allegiant' ); ?></p>
		<?php if ( $count == 0 ) { ?>
			<p><span class="dashicons dashicons-yes"></span>
				<a target="_blank"
				   href="<?php echo admin_url( 'themes.php?page=cpotheme-welcome&tab=recommended_actions' ); ?>"><?php esc_html_e( 'No recommended actions left to perform', 'allegiant' ); ?></a>
			</p>
		<?php } else { ?>
			<p><span class="dashicons dashicons-no-alt"></span> <a target="_blank"
			                                                       href="<?php echo admin_url( 'themes.php?page=cpotheme-welcome&tab=recommended_actions' ); ?>"><?php esc_html_e( 'Check recommended actions', 'allegiant' ); ?></a>
			</p> <?php
		}; ?>

	</div>
	<div class="col">
		<h3><?php _e('Add Custom Content Types', 'allegiant'); ?></h3>
		<p>
			<?php _e('This theme supports special content types. Populate the following and your site will take shape.', 'allegiant'); ?>
		</p>

		<?php if(!defined('CPOTHEME_USE_SLIDES') && !defined('CPOTHEME_USE_FEATURES') && !defined('CPOTHEME_USE_PORTFOLIO') && !defined('CPOTHEME_USE_PRODUCTS') && !defined('CPOTHEME_USE_SERVICES') && !defined('CPOTHEME_USE_TESTIMONIALS') && !defined('CPOTHEME_USE_TEAM')): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=post"><span class="cpotheme-welcome-icon dashicons-before dashicons-admin-post"></span> <?php _e('Start creating posts', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_SLIDES') && CPOTHEME_USE_SLIDES == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_slide"><span class="cpotheme-welcome-icon dashicons-before dashicons-images-alt2"></span> <?php _e('Add slides to the homepage', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_FEATURES') && CPOTHEME_USE_FEATURES == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_feature"><span class="cpotheme-welcome-icon dashicons-before dashicons-star-filled"></span> <?php _e('Add feature blocks to the homepage', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_PORTFOLIO') && CPOTHEME_USE_PORTFOLIO == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_portfolio"><span class="cpotheme-welcome-icon dashicons-before dashicons-portfolio"></span> <?php _e('Create your portfolio items', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_PRODUCTS') && CPOTHEME_USE_PRODUCTS == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_product"><span class="cpotheme-welcome-icon dashicons-before dashicons-cart"></span> <?php _e('Showcase your products', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_SERVICES') && CPOTHEME_USE_SERVICES == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_service"><span class="cpotheme-welcome-icon dashicons-before dashicons-archive"></span> <?php _e('List your services', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_TESTIMONIALS') && CPOTHEME_USE_TESTIMONIALS == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_testimonial"><span class="cpotheme-welcome-icon dashicons-before dashicons-format-chat"></span> <?php _e('Add some testimonials', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_TEAM') && CPOTHEME_USE_TEAM == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_team"><span class="cpotheme-welcome-icon dashicons-before dashicons-universal-access"></span> <?php _e('Add your team members', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_CLIENTS') && CPOTHEME_USE_CLIENTS == true): ?>
			<a class="cpotheme-welcome-task" href="edit.php?post_type=cpo_client"><span class="cpotheme-welcome-icon dashicons-before dashicons-businessman"></span> <?php _e('Add your clients', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_PORTFOLIO') && CPOTHEME_USE_PORTFOLIO == true): ?>
			<a class="cpotheme-welcome-task" href="post-new.php?post_type=page"><span class="cpotheme-welcome-icon dashicons-before dashicons-welcome-add-page"></span> <?php _e('Create a page with the Portfolio template', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_PRODUCTS') && CPOTHEME_USE_PRODUCTS == true): ?>
			<a class="cpotheme-welcome-task" href="post-new.php?post_type=page"><span class="cpotheme-welcome-icon dashicons-before dashicons-welcome-add-page"></span> <?php _e('Create a page with the Products template', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_SERVICES') && CPOTHEME_USE_SERVICES == true): ?>
			<a class="cpotheme-welcome-task" href="post-new.php?post_type=page"><span class="cpotheme-welcome-icon dashicons-before dashicons-welcome-add-page"></span> <?php _e('Create a page with the Services template', 'allegiant'); ?></a>
		<?php endif; ?>
		<?php if(defined('CPOTHEME_USE_TEAM') && CPOTHEME_USE_TEAM == true): ?>
			<a class="cpotheme-welcome-task" href="post-new.php?post_type=page"><span class="cpotheme-welcome-icon dashicons-before dashicons-welcome-add-page"></span> <?php _e('Create a page with the Team template', 'allegiant'); ?></a>
		<?php endif; ?>
	</div>
	<div class="col">
		<h3><?php _e('Configure The Theme', 'allegiant'); ?></h3>
		<p>
			<?php _e('Add the finishing touch. Customize your theme using the theme options page, add your menus, and create your sidebar widgets.', 'allegiant'); ?>
		</p>
		<a class="cpotheme-welcome-task" href="customize.php"><span class="cpotheme-welcome-icon dashicons-before dashicons-admin-appearance"></span> <?php _e('Customize the appearance of your site', 'allegiant'); ?></a>
		<a class="cpotheme-welcome-task" href="nav-menus.php"><span class="cpotheme-welcome-icon dashicons-before dashicons-menu"></span> <?php _e('Set up the main navigation menu', 'allegiant'); ?></a>
		<a class="cpotheme-welcome-task" href="widgets.php"><span class="cpotheme-welcome-icon dashicons-before dashicons-welcome-widgets-menus"></span> <?php _e('Add some widgets to your sidebar', 'allegiant'); ?></a>
	</div>
	<div class="cpotheme-welcome-clear"></div>

</div><!--/.feature-section-->