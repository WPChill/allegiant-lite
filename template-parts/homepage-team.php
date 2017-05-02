<?php $query = new WP_Query('post_type=cpo_team&order=ASC&orderby=menu_order&meta_key=team_featured&meta_value=1&posts_per_page=-1'); ?>
<?php if($query->posts): $feature_count = 0; ?>
<div id="team" class="team">
	<div class="container">
		<?php cpotheme_block('home_team', 'team-heading section-heading dark'); ?>
		<?php cpotheme_grid($query->posts, 'element', 'team', 4, array('class' => 'column-narrow')); ?>
	</div>
</div>
<?php endif; ?>
