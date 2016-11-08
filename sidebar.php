<?php $sidebar_config = cpotheme_get_sidebar_position(); ?>
<?php if($sidebar_config != 'none'): ?>

<aside id="sidebar" class="sidebar sidebar-primary">
	<?php dynamic_sidebar('primary-widgets'); ?>
</aside>

<?php endif; ?>