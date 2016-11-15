<?php
/**
 * Changelog
 */

$allegiant = wp_get_theme( 'allegiant' );

?>
<div class="featured-section changelog">
	

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$allegiant_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/changelog.txt' );
	$allegiant_changelog_lines = explode( PHP_EOL, $allegiant_changelog );
	foreach ( $allegiant_changelog_lines as $allegiant_changelog_line ) {
		if ( substr( $allegiant_changelog_line, 0, 3 ) === "###" ) {
			echo '<h4>' . substr( $allegiant_changelog_line, 3 ) . '</h4>';
		} else {
			echo $allegiant_changelog_line, '<br/>';
		}


	}

	echo '<hr />';


	?>

</div>