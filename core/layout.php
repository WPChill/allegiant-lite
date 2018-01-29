<?php

//Enqueue Google fonts
add_action( 'wp_head', 'cpotheme_styling_fonts', 20 );
function cpotheme_styling_fonts() {
	cpotheme_fonts( apply_filters( 'cpotheme_font_headings', 'Open+Sans' ) );
	cpotheme_fonts( apply_filters( 'cpotheme_font_menu', 'Open+Sans' ) );
	cpotheme_fonts( apply_filters( 'cpotheme_font_body', 'Open+Sans' ), 1 );
}


// Registers all widget areas
add_action( 'widgets_init', 'cpotheme_init_sidebar' );
function cpotheme_init_sidebar() {

	register_sidebar(
		array(
			'name'          => __( 'Default Widgets', 'allegiant' ),
			'id'            => 'primary-widgets',
			'description'   => __( 'Sidebar shown in all standard pages by default.', 'allegiant' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title heading">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Secondary Widgets', 'allegiant' ),
			'id'            => 'secondary-widgets',
			'description'   => __( 'Shown in pages with more than one sidebar.', 'allegiant' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title heading">',
			'after_title'   => '</div>',
		)
	);

	$footer_columns = apply_filters( 'cpotheme_subfooter_columns', 3 );
	if ( '' == $footer_columns ) {
		$footer_columns = 3;
	}
	for ( $count = 1; $count <= $footer_columns; $count++ ) {
		register_sidebar(
			array(
				'id'            => 'footer-widgets-' . $count,
				'name'          => __( 'Footer Widgets', 'allegiant' ) . ' ' . $count,
				'description'   => __( 'Shown in the footer area.', 'allegiant' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title heading">',
				'after_title'   => '</div>',
			)
		);
	}
}


//Registers all menu areas
add_action( 'widgets_init', 'cpotheme_init_menu' );
function cpotheme_init_menu() {
	register_nav_menus(
		array(
			'top_menu'    => __( 'Top Menu', 'allegiant' ),
			'main_menu'   => __( 'Main Menu', 'allegiant' ),
			'footer_menu' => __( 'Footer Menu', 'allegiant' ),
		)
	);
}
