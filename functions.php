<?php
function wpdocs_filter_wp_title( $title, $sep ) {

    $title = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $title = "$title $sep $site_description";
    $sep = "|";
    return $title;
}
add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );

function my_show_admin_bar() {
	return false;
}

add_filter('show_admin_bar', 'my_show_admin_bar');

function roundabout_style(){
    wp_enqueue_style( 'roundabout-styling', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_script('intersection-observer', get_stylesheet_directory_uri() . '/js/vendor/intersection-observer.js', null,null, true);	
    wp_enqueue_script('lazyload', get_stylesheet_directory_uri() . '/js/vendor/lazyload.min.js',null,null,  true);	
    wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/js/vendor/swiper.min.js',null,null,  true);	
    wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/js/vendor/gsap.min.js',null,null,  true);	
    wp_enqueue_script('ScrollToPlugin', get_stylesheet_directory_uri() . '/js/vendor/ScrollToPlugin.min.js', null,null, true);	
    wp_enqueue_script('ScrollTrigger', get_stylesheet_directory_uri() . '/js/vendor/ScrollTrigger.min.js', null,null, true);	
    wp_enqueue_script('skrollr', get_stylesheet_directory_uri() . '/js/vendor/skrollr.min.js', null,null, true);	
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.js',null,null, true);	
}

add_action( 'wp_enqueue_scripts', 'roundabout_style' );