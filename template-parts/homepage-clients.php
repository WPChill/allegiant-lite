<?php $query = new WP_Query('post_type=cpo_client&posts_per_page=-1&order=ASC&orderby=menu_order'); ?>
<?php if($query->posts): $feature_count = 0; ?>
<div id="clients" class="clients">
	<div class="container">		
		<?php cpotheme_block('home_clients', 'clients-heading section-heading'); ?>
		<?php cpotheme_grid($query->posts, 'element', 'client', 5, array('class' => 'column-narrow')); ?>
	</div>
</div>
<?php endif; ?>
