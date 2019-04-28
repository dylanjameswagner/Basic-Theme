<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_theme_file_uri('/public/images/favicon.ico'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_file_uri('/public/images/apple-touch-icon.png'); ?>">

	<!-- bof wp_head -->
	<?php wp_head(); ?>
	<!-- eof wp_head -->

</head>
<body class="<?php echo implode(' ', get_body_class(is_front_page() ? 'front' : '')); ?>">

	<div id="top" class="site"><!-- Closed in footer.php -->

		<section role="banner" class="header">
			<header class="header__header">
				<h1 class="header__heading">
					<?php if (is_front_page()) : ?>
						<?php bloginfo('name'); ?>
					<?php else : ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<?php bloginfo('name'); ?>
						</a>
					<?php endif; ?>
				</h1>

				<?php if (get_bloginfo('description')) : ?>
					<h2 class="header__description"><?php bloginfo('description'); ?></h2>
				<?php endif; ?>

				<?php
				if (has_nav_menu('header')) :
					wp_nav_menu([
						'theme_location'  => 'header',
						'container'       => 'nav',
						'container_class' => 'header-menu menu horizontal',
						'container_id'    => false,
						'menu_class'      => 'header-menu__list menu__list',
						'menu_id'         => 'IGNORE',
					]);
				else :
					wp_page_menu([
						'show_home'  => true,
						'container'  => 'nav', // Undocumented // Default 'div'
						'menu_class' => 'header-menu menu horizontal',
						'menu_id'    => false,
						'before'     => '<ul class="header-menu__list menu__list">', // Default '<ul>'
					]);
				endif;
				?>
			</header>
		</section>
