<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class CPOTheme_Customize_Selectize_Control extends WP_Customize_Control {

	public function enqueue() {
		wp_enqueue_script( 'cpotheme-selectize-control', get_template_directory_uri() . '/core/scripts/customizer-controls/selectize-control.js', array( 'jquery', 'customize-controls', 'cpotheme_script_selectize' ), false, true );
	}

	public function to_json() {
		parent::to_json();
		$this->json['attributes'] = $this->input_attrs;
	}

	public function render_content() {
		?>

		<span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>

		<?php
		$options = array();

		if ( $this->choices === 'all' ) {

			$options = array(
				'all'                 => __( 'All', 'cpotheme' ),
				'homepage'            => __( 'Homepage', 'cpotheme' ),
				'all_posts'           => __( 'All posts', 'cpotheme' ),
				'all_pages'           => __( 'All pages', 'cpotheme' ),
				'all_portfolio_items' => __( 'All portfolio items', 'cpotheme' ),
				'all_services'        => __( 'All services', 'cpotheme' ),
				'404_page'            => __( '404 page', 'cpotheme' ),
				'archive'             => __( 'Archive page', 'cpotheme' ),
				'search'              => __( 'Search page', 'cpotheme' ),
			);

			foreach ( $this->value() as $value ) :
				if ( ! isset( $options[ $value ] ) ) {
					$options[ $value ] = '#' . $value;
				}
			endforeach;
		}

		if ( $this->choices === 'pages' ) {

			$posts = wp_cache_get( 'allegiant_pages' );
			if ( $posts === false ) {
				$args = array(
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'posts_per_page' => -1,
				);
				$query = new WP_Query( $args );

				wp_cache_set( 'allegiant_pages', $query->posts );
				$posts = $query->posts;
			}

			foreach ( $posts as $post ) :
				$options[ $post->ID ] = $post->post_title;
			endforeach;
		}
		?>

		<select id="<?php echo esc_attr( $this->id ); ?>" multiple class="demo-default" placeholder="<?php esc_html_e( 'select pages...', 'cpotheme' ); ?>">
			<?php foreach ( $options as $value => $name ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php echo in_array( $value, $this->value() ) ? 'selected' : ''; ?> ><?php echo esc_html( $name ); ?></option>
			<?php endforeach; ?>
		</select>

		<?php
	}
}
