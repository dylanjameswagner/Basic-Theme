<!doctype html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width,minimum-scale=0,maximum-scale=10,initial-scale=1,user-scalable=yes"/>

	<title><?php wp_title('|',true,'right'); bloginfo('name'); echo is_front_page() && get_bloginfo('description') ? ' | '.get_bloginfo('description') : null; ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/public/images/favicon.ico"/>
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/public/images/apple-touch-icon-precomposed.png"/>

<!--[if gte IE 9]><!-->
<?php wp_head(); ?>
<!--<![endif]-->

</head>
<body class="<?php echo implode(' ',get_body_class()); ?>">

	<div id="top">

		<section id="header"><div class="inner contain">
			<header class="brand">
				<h1 class="title">
					<a<?php if (!is_front_page()) : ?> href="<?php echo esc_url(home_url('/')); ?>"<?php endif; ?> rel="home">
						<?php bloginfo('name'); ?>
					</a>
				</h1><!--.title-->

<?php if (get_bloginfo('description')) : ?>
				<h2 class="tagline"><?php bloginfo('description'); ?></h2>
<?php endif; // get_bloginfo description ?>

				<?php
					wp_nav_menu(array(
						'container'			=> 'nav',
						'theme_location'	=> 'header',
						'container_id'		=> 'header-menu',
						'menu_id'			=> 'header-menu-list',
						'container_class'	=> 'menu',
						'menu_class'		=> 'list horizontal contain',
					));
				?>
			</header><!--.brand-->
		</div><!--.inner--></section><!--#header-->
