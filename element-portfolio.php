<div class="portfolio-item dark <?php if(has_excerpt()) echo ' portfolio-item-has-excerpt'; ?>">
	<a class="portfolio-item-image" href="<?php the_permalink(); ?>">
		<div class="portfolio-item-overlay primary-color-bg"></div>
		
		<div class="portfolio-item-description">
			<h3 class="portfolio-item-title">
				<?php the_title(); ?>
			</h3>
			<p>
				<?php the_excerpt(); ?>
			</p>
			<span style="font-family:'fontawesome'">&#xf00e</span>
			<?php //cpotheme_edit(); ?>
		</div>
		<?php the_post_thumbnail('portfolio', array('title' => '')); ?>
	</a>
</div>