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
		if ( defined( 'KALIFORMS_VERSION' ) ) {
			return true;
		}
		return false;
	}

	public function is_cf7_active() {
		if ( class_exists( 'WPCF7' ) ) {
			return true;
		}
		return false;
	}

	public function is_wpforms_active() {
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

	public function get_kaliforms() {
		$contact_forms = array();

		$args = array(
			'post_type'      => 'kaliforms_forms',
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

	public function render_content() {}

	public function content_template() {

		$plugin_select = cpotheme_get_option( 'plugin_select' );
		$form_id = cpotheme_get_option( 'form_id' );
		?>

		<?php if ( $this->is_wpforms_active() && $this->is_cf7_active() ) { ?>
			<span class="customize-control-title"><?php esc_html_e( 'Select contact form plugin', 'allegiant' ); ?></span>
			<select>
				<option><?php esc_html_e( 'please select a contact form plugin', 'allegiant' ); ?></option>
				<option value="wpforms" <?php echo $plugin_select === 'wpforms' ? 'selected' : ''; ?> >wpforms</option>
				<option value="cf7" <?php echo $plugin_select === 'cf7' ? 'selected' : ''; ?> >contact form 7</option>
				<option value="kaliforms" <?php echo $plugin_select === 'kaliforms' ? 'selected' : ''; ?> >kaliforms</option>
			</select>
		<?php } ?>

		<?php if ( ! $this->is_wpforms_active() && ! $this->is_cf7_active() && ! $this->is_kaliforms_active()  ) { ?>
			<p><?php esc_html_e( 'There are no contact form plugins activated. Please activate WPForms / Contact Form 7 / Kaliforms', 'allegiant' ); ?></p>
		<?php } ?>

		<?php if ( $this->is_wpforms_active() ) { ?>
			<div class="cpotheme_contact_control__wpforms">
				<?php $forms = $this->get_wpforms(); ?>
				<?php if ( ! empty( $forms ) ) { ?>
					<span class="customize-control-title"><?php esc_html_e( 'Select form', 'allegiant' ); ?></span>
					<select>
						<option><?php esc_html_e( 'please select a contact form', 'allegiant' ); ?></option>
						<?php foreach ( $forms as $id => $form_title ) { ?>
							<option value="<?php echo esc_attr( $id ); ?>" <?php echo $form_id === $id ? 'selected' : ''; ?>><?php echo esc_html( $form_title ); ?></option>
						<?php } ?>
					</select>
				<?php } else { ?>
					<?php printf( '<p>%s <a target="_blank" href="%s">%s</a></p>', esc_html__( 'please', 'allegiant' ), esc_url( admin_url( 'admin.php?page=wpforms-builder' ) ), esc_html__( 'add a new form', 'allegiant' ) ); ?>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if ( $this->is_cf7_active() ) { ?>
			<div class="cpotheme_contact_control__cf7forms">
				<?php $forms = $this->get_cf7_forms(); ?>
				<?php if ( ! empty( $forms ) ) { ?>
					<span class="customize-control-title"><?php esc_html_e( 'Select form', 'allegiant' ); ?></span>
					<select>
						<option><?php esc_html_e( 'please select a contact form', 'allegiant' ); ?></option>
						<?php foreach ( $forms as $id => $form_title ) { ?>
							<option value="<?php echo esc_attr( $id ); ?>" <?php echo $form_id == $id ? 'selected' : ''; ?>><?php echo esc_html( $form_title ); ?></option>
						<?php } ?>
					</select>
				<?php } else { ?>
					<?php printf( '<p>%s <a target="_blank" href="%s">%s</a></p>', esc_html__( 'please', 'allegiant' ), esc_url( admin_url( 'admin.php?page=wpcf7-new' ) ), esc_html__( 'add a new form', 'allegiant' ) ); ?>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if ( $this->is_kaliforms_active() ) { ?>
			<div class="cpotheme_contact_control__kaliforms">
				<?php $forms = $this->get_kaliforms(); ?>
				<span class="customize-control-title"><?php esc_html_e( 'Select a contact form', 'allegiant' ); ?></span>
				<?php if ( ! empty( $forms ) ) { ?>
					<select>
						<option><?php esc_html_e( 'please select a contact form', 'allegiant' ); ?></option>
						<?php foreach ( $forms as $id => $form_title ) { ?>
							<option value="<?php echo esc_attr( $id ); ?>" <?php echo $form_id == $id ? 'selected' : ''; ?>><?php echo esc_html( $form_title ); ?></option>
						<?php } ?>
					</select>
				<?php } else { ?>
					<?php printf( '<p>%s <a target="_blank" href="%s">%s</a></p>', esc_html__( 'In order to use contact section you need to', 'allegiant' ), esc_url( admin_url( 'post-new.php?post_type=kaliforms_forms' ) ), esc_html__( 'add a contact form', 'allegiant' ) ); ?>
				<?php } ?>
			</div>
		<?php } ?>

		<?php
	}

}
