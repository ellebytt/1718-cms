<?php
function ferry_scripts() {
	
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	
	wp_enqueue_style( 'ferry-style', get_stylesheet_uri() );

	wp_enqueue_style('ferry_color', get_template_directory_uri() . '/css/colors/default.css');
	
	wp_enqueue_style('smartmenus',get_template_directory_uri().'/css/jquery.smartmenus.bootstrap.css');

    wp_enqueue_style('font-awesome-min',get_template_directory_uri().'/css/font-awesome.min.css');
	
	wp_enqueue_style('carousel',get_template_directory_uri().'/css/owl.carousel.css');

    wp_enqueue_style('owl_transitions',get_template_directory_uri().'/css/owl.transitions.css');

	wp_enqueue_style('animate',get_template_directory_uri().'/css/animate.css');
	

	
	/* Js script */
    
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
	
	wp_enqueue_script( 'ferry-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'));
	
	wp_enqueue_script('smartmenus-js', get_template_directory_uri() . '/js/jquery.smartmenus.js' , array('jquery'));

    wp_enqueue_script('smartmenus_bootstrap', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js' , array('jquery'));

    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));
	
	wp_enqueue_script('ferry_custom', get_template_directory_uri() . '/js/custom.js' , array('jquery'));
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'ferry_scripts');
?>