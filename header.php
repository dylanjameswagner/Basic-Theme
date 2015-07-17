<!doctype html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,user-scalable=yes"/-->

    <title><?php
        if (is_front_page()) :
            echo get_bloginfo('name');
            echo get_bloginfo('description') ? ' | '.get_bloginfo('description') : null;
        elseif (is_404() || (is_search() && empty($_GET['s']))) :
            echo __('Search','carbon').' | ';
            echo get_bloginfo('name');
        else :
            wp_title('|',true,'right');
        endif;
    ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/public/images/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/public/images/apple-touch-icon.png"/>

<!--[if gte IE 9]><!-->
<?php wp_head(); ?>
<!--<![endif]-->

</head>
<body class="<?php echo implode(' ',get_body_class()); ?>">

    <div id="top">

        <section id="header"><div class="inner contain">
            <header class="header">
                <h1 class="heading">
                    <a<?php if (!is_front_page()) : ?> href="<?php echo esc_url(home_url('/')); ?>"<?php endif; ?> rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1><!--.heading-->

<?php if (get_bloginfo('description')) : ?>
                <h2 class="tagline"><?php bloginfo('description'); ?></h2>
<?php endif; // get_bloginfo description ?>

<?php
    wp_nav_menu(array(
        'container'       => 'nav',
        'theme_location'  => 'header',
        'container_id'    => 'header-menu',
        'menu_id'         => 'header-menu-list',
        'container_class' => 'menu',
        'menu_class'      => 'list horizontal contain',
    ));
?>
            </header><!--.header-->
        </div><!--.inner--></section><!--#header-->
