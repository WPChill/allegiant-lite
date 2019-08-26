<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class CPOTheme_Contact_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'cpotheme_contact_control';

	public function __construct( WP_Customize_Manager $manager, $id, array $args = array() ) {
		parent::__construct( $manager, $id, $args );
		$manager->register_control_type( 'cpotheme_contact_control' );
	}

	public function is_kaliforms_active() {
		return defined( 'KALIFORMS_VERSION' );
	}

	public function get_kaliforms() {
		$contact_forms = array();

		$args       = array(
			'post_type'      => 'kaliforms_forms',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);
		$kali_forms = new WP_Query( $args );
		if ( $kali_forms->have_posts() ) {
			foreach ( $kali_forms->posts as $kali_form ) {
				$contact_forms[ $kali_form->ID ] = $kali_form->post_title;
			}
		}
		return $contact_forms;
	}

	public function render_content() {}

	public function content_template() {

		$form_id       = cpotheme_get_option( 'form_id' );
		$plugin_data  = array(
			'label'      => 'Kali Forms',
			'slug'       => 'kali-forms',
			'backendUrl' => 'post-new.php?post_type=kaliforms_forms',
		);
		?>

		<?php if ( ! $this->is_kaliforms_active() ) : ?>
			<p><?php _e( 'There are no contact form plugins activated. Please activate Kali Forms.', 'allegiant' ); ?></p>
		<?php else: ?>
			<?php $forms = $this->get_kaliforms(); ?>
			<div class="cpotheme_contact_control__<?php echo $plugin_data['slug']; ?>">
				<?php if ( ! empty( $forms ) ) { ?>
					<span class="customize-control-title"><?php _e( 'Select form', 'allegiant' ); ?></span>
					<select>
						<option value="default"><?php _e( 'Select form', 'allegiant' ); ?></option>
						<?php foreach ( $forms as $id => $form_title ) : ?>
							<option value="<?php echo $id; ?>" <?php echo $form_id == $id ? 'selected' : ''; ?>><?php echo $form_title; ?></option>
						<?php endforeach; ?>
					</select>
				<?php } else { ?>
					<?php printf( '<p>%s <a target="_blank" href="%s">%s</a></p>', esc_html__( 'In order to use contact section you need to', 'allegiant' ), esc_url( admin_url( 'post-new.php?post_type=kaliforms_forms' ) ), esc_html__( 'add a contact form', 'allegiant' ) ); ?>
				<?php } ?>
			</div>
		<?php endif; ?>

		<?php
	}

}
