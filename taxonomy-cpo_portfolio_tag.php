<?php get_header(); ?>

<?php get_template_part('template-parts/element', 'page-header'); ?>
	
<div id="main" class="main">
	<div class="container">
		<section id="content" class="content">
			<?php do_action('cpotheme_before_content'); ?>
			
			<?php $description = term_description(); ?>
			<?php if($description != ''): ?>
			<div class="page-content">
				<?php echo $description; ?>
			</div>
			<?php endif; ?>
				
			<?php if(have_posts()): $feature_count = 0; ?>
			<div id="portfolio" class="portfolio">
				<?php cpotheme_grid(null, 'element', 'portfolio', 3, array('class' => 'column-fit')); ?>
			</div>
			<?php endif; ?>
			<?php cpotheme_numbered_pagination(); ?>
			
			<?php do_action('cpotheme_after_content'); ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>