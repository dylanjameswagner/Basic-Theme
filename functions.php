<?php

/* register styles and scripts */

	function custom_wp_enqueue_scripts(){
		wp_register_style('open-sans'	,'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic'); wp_enqueue_style('open-sans');

		wp_register_style('reset'		,get_stylesheet_directory_uri().'/public/styles/reset.css'		); wp_enqueue_style('reset');
		wp_register_style('constructs'	,get_stylesheet_directory_uri().'/public/styles/constructs.css'	); wp_enqueue_style('constructs');
		wp_register_style('custom'		,get_stylesheet_directory_uri().'/public/styles/custom.css'		); wp_enqueue_style('custom');

		wp_register_script('html5shiv'	,get_stylesheet_directory_uri().'/public/scripts/html5shiv.printshiv-3.6.2.min.js'	); wp_enqueue_script('html5shiv');
		wp_register_script('prefixfree'	,get_stylesheet_directory_uri().'/public/scripts/prefixfree-1.0.7.min.js'			); wp_enqueue_script('prefixfree');

		wp_register_script('custom'		,get_stylesheet_directory_uri().'/public/scripts/custom.js',array('jquery'),false,true); wp_enqueue_script('custom');
	}
	add_action('wp_enqueue_scripts','custom_wp_enqueue_scripts');

/* register menus */

	function custom_register_nav_menus(){
		register_nav_menus(array(
			'header' => __('Header Navigation','custom'),
			'footer' => __('Footer Navigation','custom'),
		));
	}
	add_action('init','custom_register_nav_menus');

/* register sidebars */

	function custom_register_sidebars(){
		$sidebars = array(
			__('Pages'	,'custom'),
			__('Posts'	,'custom'),
//			__('Search'	,'custom'),
		);

		foreach ($sidebars as $sidebar) :
			register_sidebar(array(
				'name'			=> $sidebar,
				'id'			=> sanitize_title($sidebar),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">'.PHP_EOL,
				'after_widget'	=> '</aside>'.PHP_EOL,
				'before_title'	=> '<h3 class="title">',
				'after_title'	=> '</h3>'.PHP_EOL,
			));
		endforeach;
	}
	add_action('widgets_init','custom_register_sidebars');

/* posts_per_page */

	function custom_pre_get_posts($query){
		if (!is_admin() && (is_search() || is_archive())) : // is_tax() do i need this for custom tax?
				if (is_search() || is_archive())		: $per = 12;
//			elseif (is_post_type_archive('products'))	: $per = 9;
			else										: $per = get_option('posts_per_page');
			endif;

			$query->set('posts_per_page',$per);
//			$query->set('orderby','menu_order');
//			$query->set('order','ASC');
		endif;
	}
	add_action('pre_get_posts','custom_pre_get_posts');
