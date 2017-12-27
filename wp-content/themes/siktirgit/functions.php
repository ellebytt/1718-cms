<?php
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style( 'style', get_stylesheet_uri() . '/style.css', array(), time() );

?>