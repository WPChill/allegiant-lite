<?php get_header(); ?>

<?php get_template_part('template-parts/element', 'page-header'); ?>

<?php if(cpotheme_show_posts()): ?>
<div id="main" class="main">
	<div class="container">		
		<section id="content" class="content">
			<?php do_action('cpotheme_before_content'); ?>
			<?php if(have_posts()) while(have_posts()): the_post(); ?>
			<?php get_template_part('template-parts/element', 'blog'); ?>
			<?php endwhile; ?>
			<?php cpotheme_numbered_pagination(); ?>
			<?php do_action('cpotheme_after_content'); ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>
<?php endif; ?>


<?php get_footer(); ?>