<?php $url = get_post_meta(get_the_ID(), 'client_url', true); ?>
<div class="client">
	<?php if($url != ''): ?>
	<a href="<?php echo esc_url($url); ?>" rel="nofollow" target="_blank">
	<?php endif; ?>
	
	<?php the_post_thumbnail('portfolio', array('class' => 'client-image')); ?>
	
	<?php if($url != ''): ?>
	</a>
	<?php endif; ?>
	
	<?php cpotheme_edit(); ?>
</div>