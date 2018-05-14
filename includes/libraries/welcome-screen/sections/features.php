<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Features
 */

$features = array(
	'slider-options'    => array(
		'label'   => esc_html__( 'Improved Slider Options', 'allegiant' ),
		'sub'     => esc_html__( 'Add more slides, control the appearance & position of slides.', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'woocommerce'       => array(
		'label'   => esc_html__( 'WooCommerce Support', 'allegiant' ),
		'sub'     => esc_html__( 'Create a WooCommerce powered shop. Supports WooCommerce v3.x and upwards', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'reorder-sections'  => array(
		'label'   => esc_html__( 'Reorder Homepage Sections', 'allegiant' ),
		'sub'     => esc_html__( 'Re-order your site\'s front-page sections in any way you want.', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'custom-colors'     => array(
		'label'   => esc_html__( 'Custom Color Schemes & Color Controls', 'allegiant' ),
		'sub'     => esc_html__( 'Easily change your site\'s color schemes.', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'typography'        => array(
		'label'   => esc_html__( 'Custom Typography Controls', 'allegiant' ),
		'sub'     => esc_html__( 'Want a different font family? No problem. Just an upgrade away.', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'tagline'           => array(
		'label'   => esc_html__( 'Tagline', 'allegiant' ),
		'sub'     => esc_html__( 'Re-order your site\'s front-page sections in any way you want.', 'allegiant' ),
		'cpo'     => esc_html__( 'Minimal', 'allegiant' ),
		'cpo-pro' => esc_html__( 'Improved', 'allegiant' ),
	),
	'features'          => array(
		'label'   => esc_html__( 'Extend the Features Section', 'allegiant' ),
		'sub'     => esc_html__( 'By upgrading to the PRO version you\'ll be able to add a: Section Description & Features Columns', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'portfolio'         => array(
		'label'   => esc_html__( 'Extend the Portfolio Section ', 'allegiant' ),
		'sub'     => esc_html__( 'By upgrading to the PRO version you\'ll be able to add a: Section Description, Portfolio Columns & Related Portfolio Images', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'services'          => array(
		'label'   => esc_html__( 'Extend the Services Section ', 'allegiant' ),
		'sub'     => esc_html__( 'By upgrading to the PRO version you\'ll be able to add a: Section Description and Services Columns', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'team'              => array(
		'label'   => esc_html__( 'Extend the Team Members Section', 'allegiant' ),
		'sub'     => esc_html__( 'By upgrading to the PRO version you\'ll be able to add a: Section Description and Team Columns', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'testimonials'      => array(
		'label'   => esc_html__( 'Extend the Testimonials Section ', 'allegiant' ),
		'sub'     => esc_html__( 'By upgrading to the PRO version you\'ll be able to add a: Section Description and Testimonials Columns', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'clients'           => array(
		'label'   => esc_html__( 'Extend the Clients Section ', 'allegiant' ),
		'sub'     => esc_html__( 'By upgrading to the PRO version you\'ll be able to add a: Description and Clients Columns', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'dedicated-support' => array(
		'label'   => esc_html__( 'Dedicated Support Team', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-yes"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
	'security-updates'  => array(
		'label'   => esc_html__( 'Critical security updates ', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-yes"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),

	'featured-updates'  => array(
		'label'   => esc_html__( 'Future feature updates ', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>',
	),
);
?>
<div class="featured-section features">
	<table class="free-pro-table">
		<thead>
		<tr>
			<th></th>
			<th><?php _e( 'Lite', 'allegiant' ); ?></th>
			<th><?php _e( 'PRO', 'allegiant' ); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( $features as $feature ) : ?>
			<tr>
				<td class="feature">
					<h3><?php echo $feature['label']; ?></h3>
					<?php if ( isset( $feature['sub'] ) ) : ?>
						<p><?php echo $feature['sub']; ?></p>
					<?php endif ?>
				</td>
				<td class="cpo-feature">
					<?php echo $feature['cpo']; ?>
				</td>
				<td class="cpo-pro-feature">
					<?php echo $feature['cpo-pro']; ?>
				</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td></td>
			<td colspan="2" class="text-right">
				<a href="//www.cpothemes.com/theme/allegiant?utm_source=allegiant&utm_medium=about-page&utm_campaign=upsell" target="_blank" class="button button-primary button-hero"><span class="dashicons dashicons-cart"></span><?php _e( 'Get The Pro Version Now!', 'allegiant' ); ?>
				</a></td>
		</tr>
		</tbody>
	</table>
</div>
