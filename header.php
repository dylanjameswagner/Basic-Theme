<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,user-scalable=yes"/-->

    <title><?php
        if (is_front_page()) :
            bloginfo('name');
            echo get_bloginfo('description') ? ' | '.get_bloginfo('description') : null;
        elseif (is_404() || (is_search() && empty($_GET['s']))) :
            echo __('Search','carbon').' | ';
            bloginfo('name');
        else :
            wp_title('|',true,'right');
            bloginfo('name');
        endif;
    ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/public/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/public/images/apple-touch-icon.png">

    <!-- bof wp_head -->
    <?php wp_head(); ?>
    <!-- eof wp_head -->

</head>
<body class="<?php echo implode(' ', get_body_class()); ?>">

    <div id="top">

        <section class="header">
            <header class="header__header">
                <h1 class="header__heading">
                    <?php if (!is_front_page()) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php else : ?>
                        <?php bloginfo('name'); ?>
                    <?php endif; ?>
                </h1>

                <?php if (get_bloginfo('description')) : ?>
                    <h2 class="header__tagline"><?php bloginfo('description'); ?></h2>
                <?php endif; // get_bloginfo description ?>

                <?php
                if (has_nav_menu('header')) :
                    wp_nav_menu(array(
                        'container'       => 'nav',
                        'theme_location'  => 'header',
                        'container_id'    => 'header-menu',
                        'menu_id'         => 'header-menu-list',
                        'container_class' => 'menu horizontal',
                        'menu_class'      => 'contain',
                    ));
                else :
                    wp_page_menu(array(
                        'menu_class' => 'menu horizontal',
                        'show_home'  => true,
                        'depth'      => 0,
                    ));
                endif;
                ?>
            </header>
        </section>
