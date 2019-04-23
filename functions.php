<?php

/* setup */

function carbon_after_setup_theme() {
    add_theme_support('html5', [
        'search-form',
        'comment-list',
        'comment-form',
        'gallery',
        'caption',
    ]);
}
add_action('after_setup_theme', 'carbon_after_setup_theme');

/* styles & scripts */

function custom_wp_enqueue_scripts() {
    wp_register_style('open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic'); wp_enqueue_style('open-sans');

    wp_register_style('normalize',  get_template_directory_uri() . '/public/styles/vendor/normalize-3.0.3.min.css'); wp_enqueue_style('normalize');

    wp_register_style('base',       get_template_directory_uri() . '/public/styles/base.css'       ); wp_enqueue_style('base');
    wp_register_style('wordpress',  get_template_directory_uri() . '/public/styles/wordpress.css'  ); wp_enqueue_style('wordpress');
    wp_register_style('constructs', get_template_directory_uri() . '/public/styles/constructs.css' ); wp_enqueue_style('constructs');
    wp_register_style('custom',     get_template_directory_uri() . '/public/styles/custom.css'     ); wp_enqueue_style('custom');

    wp_register_script('html5shiv', get_template_directory_uri() . '/public/scripts/vendor/html5shiv-printshiv-3.7.2.min.js'); wp_enqueue_script('html5shiv');
    wp_register_script('prefixfree', get_template_directory_uri() . '/public/scripts/vendor/prefixfree-1.0.7.min.js'          ); wp_enqueue_script('prefixfree');

    // wp_register_script('custom',    get_template_directory_uri() . '/public/scripts/custom.js', ['jquery'),false,true); wp_enqueue_script('custom]);
}
add_action('wp_enqueue_scripts', 'custom_wp_enqueue_scripts');

/**
 * Register Menus
 */
add_action('init', function () {
    register_nav_menus([
        'header' => __('Header Menu', 'custom'),
        'footer' => __('Footer Menu', 'custom'),
    ]);
});

/**
 * Register Sidebars
 */
add_action('widgets_init', function () {
    $sidebars = [
        __('Posts', 'custom'),
        __('Pages', 'custom'),
        // __('Search', 'custom'),
    ];

    foreach ($sidebars as $sidebar) :
        register_sidebar([
            'id'            => sanitize_title($sidebar),
            'name'          => $sidebar,
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget__heading">',
            'after_title'   => '</h2>',
        ]);
    endforeach;
});

/**
 * Register Post Types
 */
add_action('init', function () {
    register_post_type( 'type', [
        'labels' => [
            'name'          => 'Types',
            'menu_name'     => 'Types',
            'singular_name' => 'Type',
        ],
        'public'       => true,
        'hierarchical' => false,
        'menu_icon'    => 'dashicons-star-filled',
        'has_archive'  => 'types',
        'rewrite'      => [
            'slug'       => 'types',
            'front_base' => false,
        ],
        'supports' => [
            'title',
            'editor',
            'excerpt',
            // 'author',
            // 'thumbnail',
            // 'comments',
        ],
        'show_in_rest' => true, // Enable Block Editor
    ]);
});

/**
 * Fix/Fill Menu Classes
 * Add/remove classes for page_for_posts
 * Add/remove classes for custom post types
 */
function custom_menu_classes($classes, $item) {

    // optional - remove superfluous classes, since we are modifying classes anyway
    $remove = [
        'menu-item-type-post_type',
        'menu-item-object-page',
    ];

    // page_for_posts - add missing classes to matching menu url
    if ($item->url == get_the_permalink(get_option('page_for_posts'))) :
        if ((is_archive() && !is_post_type_archive()) || is_singular('post')) :
            $remove[] = 'current_page_parent';
            $classes[] = 'current-menu-item page_item page-item-'.get_option('page_for_posts') . ' current_page_item current_page_parent';
        endif;
    endif;

    // cpt - remove misplaced classes
    if (is_post_type_archive() || is_singular(get_post_types(['_builtin' => false]))) :
        $remove[] = 'current_page_parent';
    endif;

    // cpt - add missing classes to matching menu url
    if ($item->url == home_url(trailingslashit(get_post_type_object(get_post_type())->rewrite['slug']))) :
        if (is_post_type_archive()) :
            $classes[] = 'current-menu-item page_item page-item-5778 current_page_item';
        elseif (is_singular(get_post_types(['_builtin' => false]))) :
            $classes[] = 'current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor';
        endif;
    endif;

    return array_diff($classes, $remove);
}
// add_filter('nav_menu_css_class', 'custom_menu_classes',10,2);
// add_filter('page_css_class', 'custom_menu_classes',10,2);
