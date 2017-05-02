<article <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
	<div class="post-image">
		<?php cpotheme_postpage_image(); ?>		
	</div>	
	<div class="post-body">
		<?php cpotheme_postpage_title(); ?>
		<div class="post-byline">
			<?php cpotheme_postpage_date(); ?>
			<?php cpotheme_postpage_author(); ?>
			<?php cpotheme_postpage_categories(); ?>
			<?php cpotheme_edit(); ?>
		</div>
		<div class="post-content">
			<?php cpotheme_postpage_content(); ?>
		</div>
		<?php cpotheme_postpage_comments(false, '%s'); ?>
		<?php if(is_singular('post')) cpotheme_postpage_tags(false, '', '', ''); ?>
		<?php cpotheme_postpage_readmore('button'); ?>
		<div class="clear"></div>
	</div>
</article>