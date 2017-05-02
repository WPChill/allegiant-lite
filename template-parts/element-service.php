<div class="service">
	<a href="<?php the_permalink(); ?>">
		<?php cpotheme_icon(get_post_meta(get_the_ID(), 'service_icon', true), 'primary-color service-icon'); ?>
	</a>
	<div class="service-body">
		<h3 class="service-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="service-content">
			<?php the_excerpt(); ?>
		</div>
		<?php cpotheme_edit(); ?>
	</div>
</div>