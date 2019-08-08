<?php $query = new WP_Query( 'post_type=cpo_slide&posts_per_page=-1&order=ASC&orderby=menu_order' ); ?>
<?php
if ( $query->posts ) :
	$slide_count = 0;
?>
<?php wp_enqueue_script( 'cpotheme_cycle' ); ?>
<div id="slider" class="slider">
	<div class="slider-slides cycle-slideshow" data-cycle-pause-on-hover="true" data-cycle-slides=".slide" data-cycle-prev=".slider-prev" data-cycle-next=".slider-next" data-cycle-pager=".slider-pages" data-cycle-timeout="8000" data-cycle-speed="1000" data-cycle-fx="fade">
		<?php
		foreach ( $query->posts as $post ) :
			setup_postdata( $post );
?>
		<?php $slide_count++; ?>
		<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( 1500, 7000 ), false, '' ); ?>
		<div id="slide_<?php echo $slide_count; ?>" class="slide cycle-slide-active" style="background-image:url(<?php echo $image_url[0]; ?>);">
			<div class="slide-body">
				<div class="container">
					<div class="slide-caption">
						<div class="slide-content">
							<?php the_content(); ?>
						</div>
						<h2 class="slide-title">
							<?php the_title(); ?>
						</h2>
						<?php cpotheme_edit(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php if ( count( $query->posts ) > 1 ) : ?>
		<button class="slider-prev" data-cycle-cmd="pause"></button>
		<button class="slider-next" data-cycle-cmd="pause"></button>
	<?php endif; ?>
</div>
<?php endif; ?>
