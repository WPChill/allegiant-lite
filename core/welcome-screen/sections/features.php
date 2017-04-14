<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Features
 */

$features = array(
	'slider-options' => array(
		'label'   	=> __( 'Slider options', 'allegiant' ),
		'cpo'     	=> '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro'	=> '<span class="dashicons dashicons-yes"></span></i>'
	),
	'woocommerce' => array(
		'label'  	=> __( 'WooCommerce Integration', 'allegiant' ),
		'cpo'     	=> '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' 	=> '<span class="dashicons dashicons-yes"></span></i>'
	),
	'reorder-sections' => array(
		'label'       => __( 'Reorder Homepage Sections', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>'
	),
	'custom-colors'    => array(
		'label'       => __( 'Custom Colors', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>'
	),
	'typography'       => array(
		'label'       => __( 'Custom Typography', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>'
	),
	'tagline' => array(
		'label'   	=> __( 'Tagline', 'allegiant' ),
		'cpo'    	=> __( 'Minimal', 'allegiant' ),
		'cpo-pro' 	=> __( 'Improved', 'allegiant' )
	),
	'dedicated-support' => array(
		'label'       => __( 'Dedicated Support Team', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>'
	),
	'security-updates' => array(
		'label'       => __( 'Security updates & feature releases', 'allegiant' ),
		'cpo'     => '<span class="dashicons dashicons-no-alt"></span>',
		'cpo-pro' => '<span class="dashicons dashicons-yes"></span></i>'
	),
);
?>
<div class="featured-section features">
    <table class="free-pro-table">
        <thead>
        <tr>
            <th></th>
            <th><?php _e( 'Lite', 'allegiant' ) ?></th>
            <th><?php _e( 'PRO', 'allegiant' ) ?></th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ( $features as $feature ): ?>
            <tr>
                <td class="feature">
                    <h3>
						<?php echo $feature['label']; ?>
                    </h3>
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
            <td colspan="2" class="text-right"><a href="//www.cpothemes.com/theme/allegiant?utm_source=upsell&utm_medium=theme&utm_campaign=upsell" target="_blank"
                               class="button button-primary button-hero"><span class="dashicons dashicons-cart"></span><?php _e( 'Get Pro Now!', 'allegiant' ) ?></a></td>
        </tr>
        </tbody>
    </table>
</div>