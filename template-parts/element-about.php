<div class="about__content">
	<?php if ( has_post_thumbnail() ): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'medium_large', array( 'class' => 'about__image' ) ); ?>
		</a>
	<?php endif; ?>
	<h3 class="about__title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>
	<?php the_excerpt(); ?>
	<?php cpotheme_edit(); ?>
</div>
