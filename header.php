<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="outer" id="top">
		<?php do_action('cpotheme_before_wrapper'); ?>
		<div class="wrapper">
			<div id="topbar" class="topbar">
				<div class="container">
					<?php do_action('cpotheme_top'); ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php

			$class = '';
			if ( cpotheme_get_option('transparent_header') ) {
				$class = ' header-with-slider';
				if(has_nav_menu('top_menu')) {
					$class .= ' with-top-menu';
				}
			}

			?>
			<header id="header" class="header<?php echo $class ?>">
				<div class="container">
					<?php do_action('cpotheme_header'); ?>
					<div class='clear'></div>
				</div>
			</header>
			<?php do_action('cpotheme_before_main'); ?>
			<div class="clear"></div>