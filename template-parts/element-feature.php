<div class="feature">
	<div class="feature-image primary-color">
		<?php the_post_thumbnail('portfolio'); ?>
		<?php cpotheme_icon(get_post_meta(get_the_ID(), 'feature_icon', true), 'feature-icon'); ?>
	</div>
	<h3 class="feature-title">
		<?php the_title(); ?>
	</h3>
	<div class="feature-content"><?php the_content(); ?><?php cpotheme_edit(); ?></div>
</div>