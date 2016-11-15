<?php $content_types_url = add_query_arg(array('tab' => 'plugin-information', 'plugin' => 'cpo-content-types', 'TB_iframe' => 'true', 'width' => '640', 'height' => '500'), admin_url('plugin-install.php')); ?>
<?php $content_types = '<strong><a class="thickbox" href="'.$content_types_url.'">CPO Content Types</a></strong>'; ?>
<div class="feature-section three-col">

	<div class="col">
		<h3><i class="dashicons dashicons-sos"></i><?php esc_html_e( 'Contact Support', 'allegiant' ); ?></h3>
		<p>
			<i><?php esc_html_e( 'We offer excellent support through our advanced ticketing system. Make sure to register your purchase before contacting support!', 'allegiant' ) ?></i>
		</p>
		<p><a target="_blank"  class="button button-primary"
		      href="<?php echo esc_url( 'https://cpothemes.com/support' ); ?>"><?php esc_html_e( 'Contact Support', 'allegiant' ); ?></a>
		</p>
	</div><!--/.col-->

	<div class="col">
		<h3><i class="dashicons dashicons-book-alt"></i><?php esc_html_e( 'Documentation', 'allegiant' ); ?></h3>
		<p>
			<i><?php esc_html_e( 'This is the place to go to reference different aspects of the theme. Our online documentation is an incredible resource for learning the ins and outs of using Allegiant.', 'allegiant' ) ?></i>
		</p>
		<p>
			<a target="_blank" href="<?php echo esc_url( 'https://cpothemes.com/documentation' ); ?>"><?php esc_html_e( 'See our full documentation', 'allegiant' ); ?></a>
		</p>
	</div><!--/.col-->

	<div class="col">
		<h3><i class="dashicons dashicons-portfolio"></i><?php esc_html_e( 'Changelog', 'allegiant' ); ?></h3>
		<p>
			<i><?php esc_html_e( 'Want to get the gist on the latest theme changes? Just consult our changelog below to get a taste of the recent fixes and features implemented.', 'allegiant' ) ?></i>
		</p>
		<p>
			<a target="_blank"  href="<?php echo esc_url( admin_url( 'themes.php?page=cpotheme-welcome&tab=changelog' ) ); ?>"><?php esc_html_e( 'See changelog', 'allegiant' ); ?></a>
		</p>
	</div><!--/.col-->

	</div>

	<div class="feature-section three-col">
		<div class="col">
			<h3>1. <?php _e('Install CPO Content Types', 'allegiant'); ?></h3>
			<p>
				<?php _e('It is highly recommended that you install the CPO Content Types plugin. It will help you manage all the special content types that this theme supports.', 'allegiant'); ?>
			</p>
			
			<?php $plugin_url = add_query_arg(array('tab' => 'plugin-information', 'plugin' => 'cpo-content-types', 'TB_iframe' => 'true', 'width' => '640', 'height' => '500'), admin_url('plugin-install.php')); ?>
			<a class="cpotheme-welcome-task thickbox" href="<?php echo $plugin_url; ?>"><span class="cpotheme-welcome-icon dashicons-before dashicons-admin-plugins"></span> <strong><?php _e('Install CPO Content Types', 'allegiant'); ?></strong></a>
		</div>
		<div class="col">
			<h3>2. <?php _e('Add Custom Content Types', 'allegiant'); ?></h3>
			<p>
				<?php $plugin_url = add_query_arg(array('tab' => 'plugin-information', 'plugin' => 'cpo-content-types', 'TB_iframe' => 'true', 'width' => '640', 'height' => '500'), admin_url('plugin-install.php')); ?>
				<?php _e('This theme supports special content types. Populate the following and your site will take shape.', 'allegiant'); ?> 
				<?php printf(__('You will need the %s plugin.', 'allegiant'), $content_types); ?>
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
			<h3>3. <?php _e('Configure The Theme', 'allegiant'); ?></h3>
			<p>
				<?php _e('Add the finishing touch. Customize your theme using the theme options page, add your menus, and create your sidebar widgets.', 'allegiant'); ?>
			</p>
			<a class="cpotheme-welcome-task" href="customize.php"><span class="cpotheme-welcome-icon dashicons-before dashicons-admin-appearance"></span><?php _e('Customize the appearance of your site', 'allegiant'); ?></a>
			<a class="cpotheme-welcome-task" href="nav-menus.php"><span class="cpotheme-welcome-icon dashicons-before dashicons-menu"></span><?php _e('Set up the main navigation menu', 'allegiant'); ?></a>
			<a class="cpotheme-welcome-task" href="widgets.php"><span class="cpotheme-welcome-icon dashicons-before dashicons-welcome-widgets-menus"></span><?php _e('Add some widgets to your sidebar', 'allegiant'); ?></a>
		</div>
		<div class="cpotheme-welcome-clear"></div>

</div><!--/.feature-section-->
