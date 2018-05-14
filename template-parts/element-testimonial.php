<div class="testimonial">
	<div class="testimonial-content">
		<?php the_content(); ?>
	</div>
	<?php
	the_post_thumbnail(
		array( 150, 150 ), array(
			'title' => '',
			'class' => 'testimonial-image',
		)
	);
?>
	<h4 class="testimonial-name"><?php the_title(); ?></h4>
	<?php cpotheme_edit(); ?>
</div>
