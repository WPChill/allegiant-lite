<?php

$class = 'column col2';
$single_class = '';
if ( !has_post_thumbnail() ) {
	$class .= ' without-post-thumbnail';
	$single_class = 'without-post-thumbnail';
}

?>
<article <?php is_singular() ? post_class($single_class) : post_class($class); ?> id="post-<?php the_ID(); ?>"> 
	<div class="post-image">
		<?php cpotheme_postpage_image(); ?>		
	</div>	
	<div class="post-body">
		<?php cpotheme_postpage_title(); ?>
		<?php if(is_singular('post')) { ?>
		<div class="post-byline">
			<?php cpotheme_postpage_date(); ?>
			<?php cpotheme_postpage_author(); ?>
			<?php cpotheme_postpage_categories(); ?>
			<?php cpotheme_edit(); ?>
		</div>
		<?php } ?>
		<div class="post-content">
			<?php cpotheme_postpage_content(); ?>
		</div>
		<?php if(is_singular('post')) cpotheme_postpage_comments(false, '%s'); ?>
		<?php if(is_singular('post')) cpotheme_postpage_tags(false, '', '', ''); ?>
		<?php cpotheme_postpage_readmore('button'); ?>
		<div class="clear"></div>
	</div>
</article>