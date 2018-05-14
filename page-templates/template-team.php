<?php /* Template Name: Team */ ?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/element', 'page-header' ); ?>

<div id="main" class="main">
	<div class="container">
		<section id="content" class="content">
			<?php do_action( 'cpotheme_before_content' ); ?>
			
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) :
					the_post();
				?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page-content">
					<?php the_content(); ?>
				</div>
			</div>
			<?php
			endwhile;
			};
?>
			
			<?php $query = new WP_Query( 'post_type=cpo_team&posts_per_page=-1&order=ASC&orderby=menu_order' ); ?>
			<?php
			if ( $query->posts ) :
				$feature_count = 0;
?>
			<section id="team" class="team">
				<?php cpotheme_grid( $query->posts, 'element', 'team', 4, array( 'class' => 'column-narrow' ) ); ?>
			</section>
			<?php cpotheme_numbered_pagination( $query ); ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			
			<?php do_action( 'cpotheme_after_content' ); ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>
