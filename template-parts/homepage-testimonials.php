<?php $query = new WP_Query( 'post_type=cpo_testimonial&posts_per_page=-1&order=ASC&orderby=menu_order' ); ?>
<?php
if ( $query->post_count > 0 ) :
	$feature_count = 0;
?>
<div id="testimonials" class="testimonials">
	<div class="container">
		<?php cpotheme_block( 'home_testimonials', 'testimonials-heading section-heading' ); ?>
		<?php cpotheme_grid( $query->posts, 'element', 'testimonial', 3 ); ?>
	</div>
</div>
<?php endif; ?>
